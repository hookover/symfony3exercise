<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Comment;
use Blogger\BlogBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    public function newAction($blog_id)
    {
        $blog=$this->getBlog($blog_id);

        $comment=new Comment();
        $comment->setBlog($blog);
        $form=$this->createForm('Blogger\BlogBundle\Form\CommentType',$comment);


        return $this->render('BloggerBlogBundle:Comment:form.html.twig', array(
            'comment'=>$comment,
            'form'=>$form->createView()
        ));
    }

    public function createAction($blog_id,Request $request)
    {
        $blog = $this->getBlog($blog_id);


        $comment  = new Comment();
        $comment->setBlog($blog);
        $form    = $this->createForm('Blogger\BlogBundle\Form\CommentType', $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // TODO: Persist the comment entity
            $em=$this->getDoctrine()
                ->getEntityManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerBlogBundle_blog_show', array(
                    'id' => $comment->getBlog()->getId(),
                    'slug'=>$comment->getBlog()->getSlug()
                    )) .
                '#comment-' . $comment->getId()
            );
        }

        return $this->render('BloggerBlogBundle:Comment:create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }
    public function getBlog($blog_id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $blog=$em->getRepository('BloggerBlogBundle:Blog')->find($blog_id);
        if(!$blog)
            throw $this->createNotFoundException('Unable to find Blog post');

        return $blog;

    }
}
