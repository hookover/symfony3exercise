<?php

namespace Scourgen\PersonFinderBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Scourgen\PersonFinderBundle\Entity\Note;
////use Scourgen\PersonFinderBundle\Form\NoteType;

class NoteController extends Controller
{
    /**
     * @Route("/note",name="note_index")
     * @Template()
     */
    public function indexAction()
    {

    }
    /**
     * @Route("/note/post_new/person_id/{person_id}",name="note_post_new")
     * @Template
     */
    public function postNewNoteAction($person_id,Request $request)
    {
        $note = new Note();

        $form=$this->createFormBuilder($note)
            ->add("author_name",TextType::class)
            ->add("text",TextType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $note->setSourceDate(new \DateTime('now'));
            $note->setPerson($em->getRepository('ScourgenPersonFinderBundle:Person')->find($person_id));
            $em->persist($note);
            $em->flush();

            return $this->redirectToRoute('person_detail', array('person_id' => $person_id));
        }else{

        }

        return $this->render('note/new.html.twig', array(
            'note' => $note,
            'form' => $form->createView(),
        ));
    }
}
///**
// * Note controller.
// *
// * @Route("/note")
// */
//class NoteController extends Controller
//{
//    /**
//     * Lists all Note entities.
//     *
//     * @Route("/", name="note_index")
//     * @Method("GET")
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $notes = $em->getRepository('ScourgenPersonFinderBundle:Note')->findAll();
//
//        return $this->render('note/index.html.twig', array(
//            'notes' => $notes,
//        ));
//    }
//
//    /**
//     * Creates a new Note entity.
//     *
//     * @Route("/new", name="note_new")
//     * @Method({"GET", "POST"})
//     */
//    public function newAction(Request $request)
//    {
//        $note = new Note();
//        $form = $this->createForm('Scourgen\PersonFinderBundle\Form\NoteType', $note);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($note);
//            $em->flush();
//
//            return $this->redirectToRoute('note_show', array('id' => $note->getId()));
//        }
//
//        return $this->render('note/new.html.twig', array(
//            'note' => $note,
//            'form' => $form->createView(),
//        ));
//    }
//
//    /**
//     * Finds and displays a Note entity.
//     *
//     * @Route("/{id}", name="note_show")
//     * @Method("GET")
//     */
//    public function showAction(Note $note)
//    {
//        $deleteForm = $this->createDeleteForm($note);
//
//        return $this->render('note/show.html.twig', array(
//            'note' => $note,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Displays a form to edit an existing Note entity.
//     *
//     * @Route("/{id}/edit", name="note_edit")
//     * @Method({"GET", "POST"})
//     */
//    public function editAction(Request $request, Note $note)
//    {
//        $deleteForm = $this->createDeleteForm($note);
//        $editForm = $this->createForm('Scourgen\PersonFinderBundle\Form\NoteType', $note);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($note);
//            $em->flush();
//
//            return $this->redirectToRoute('note_edit', array('id' => $note->getId()));
//        }
//
//        return $this->render('note/edit.html.twig', array(
//            'note' => $note,
//            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Deletes a Note entity.
//     *
//     * @Route("/{id}", name="note_delete")
//     * @Method("DELETE")
//     */
//    public function deleteAction(Request $request, Note $note)
//    {
//        $form = $this->createDeleteForm($note);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($note);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('note_index');
//    }
//
//    /**
//     * Creates a form to delete a Note entity.
//     *
//     * @param Note $note The Note entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(Note $note)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('note_delete', array('id' => $note->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
//}
