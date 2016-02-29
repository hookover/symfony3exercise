<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\News;
use AppBundle\Form\NewsType;

/**
 * News controller.
 *
 * @Route("/news")
 */
class NewsController extends Controller
{
    /**
     * Lists all News entities.
     *
     * @Route("/", name="news_index",methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

//        $news = $em->getRepository('AppBundle:News')->findAll();

        $qb=$em->getRepository('AppBundle:News')->createQueryBuilder('n');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($qb,$request->query->getInt('page',1));

        return $this->render('news/index.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    /**
     * Creates a new News entity.
     *
     * @Route("/new", name="news_new",methods={"GET","POST"})
     */
    public function newAction(Request $request)
    {
        $news = new News();
        $form = $this->createForm('AppBundle\Form\NewsType', $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('news_show', array('id' => $news->getId()));
        }

        return $this->render('news/new.html.twig', array(
            'news' => $news,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a News entity.
     *
     * @Route("/{id}", name="news_show",methods={"GET"})
     */
    public function showAction(News $news)
    {
//        $deleteForm = $this->createDeleteForm($news);
        return $this->render('news/show.html.twig', array(
            'news' => $news,
//            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing News entity.
     *
     * @Route("/{id}/edit", name="news_edit",methods={"GET", "POST"})
     */
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:News')->find($id);

        if(!$entity)
        {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $editForm = $this->createForm('AppBundle\Form\NewsType',$entity);
        $editForm->handleRequest($request);

        if($editForm->isValid()){
            $em->flush();
            return $this->redirect($this->generateUrl('news_edit',['id'=>$id]));
        }

       return $this->render('news/edit.html.twig',[
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
       ]);

    }



//    public function editAction(Request $request, News $news)
//    {
////        $deleteForm = $this->createDeleteForm($news);
//        $editForm = $this->createForm('AppBundle\Form\NewsType', $news);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($news);
//            $em->flush();
//
//            return $this->redirectToRoute('news_edit', array('id' => $news->getId()));
//        }
//
//        return $this->render('news/edit.html.twig', array(
//            'news' => $news,
//            'edit_form' => $editForm->createView(),
////            'delete_form' => $deleteForm->createView(),
//        ));
//    }

//    /**
//     * Deletes a News entity.
//     *
//     * @Route("/{id}", name="news_delete",methods={"DELETE"})
//     */
//    public function deleteAction(Request $request, News $news)
//    {
//        $form = $this->createDeleteForm($news);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($news);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('news_index');
//    }
//
//    /**
//     * Creates a form to delete a News entity.
//     *
//     * @param News $news The News entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(News $news)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('news_delete', array('id' => $news->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}
