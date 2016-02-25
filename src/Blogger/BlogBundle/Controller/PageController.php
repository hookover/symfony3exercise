<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $blogs = $em->getRepository('BloggerBlogBundle:Blog')->getLatestBlogs();


        return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
            'blogs'=>$blogs
        ));
    }

    public function aboutAction()
    {
      return $this->render('BloggerBlogBundle:Page:about.html.twig',array(

      ));
    }

    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(EnquiryType::class,$enquiry);
        if($request->getMethod('POST'))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $message=\Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
                    ->setFrom('baoniu@gmail.com')
                    ->setTo($enquiry->getEmail()) //baoniu@gmail.com
                    ->setBody($this->renderView('@BloggerBlog/Page/contactEmail.txt.twig',array('enquiry'=>$enquiry)));

                $status=$this->get('mailer')->send($message);
                if($status>0)
                    $this->get('session')->getFlashBag()->add('success',"Your contact enquiry was successfully sent. Thank you!");

                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }
        }


        return $this->render('BloggerBlogBundle:Page:contact.html.twig',array(
            'form' => $form->createView()
        ));
    }

    public function sidebarAction()
    {
        $em=$this->getDoctrine()
            ->getManager();
        $tags=$em->getRepository('BloggerBlogBundle:Blog')->getTags();
        $tagWeights=$em->getRepository('BloggerBlogBundle:Blog')->getTagWeights($tags);

        $commentLimit = $this->get('service_container')->getParameter('blogger_blog.comments.latest_comment_limit');

        $lastestComments=$em->getRepository('BloggerBlogBundle:Comment')->getLastestComments($commentLimit);

        return $this->render('BloggerBlogBundle:Page:sidebar.html.twig', array(
            'tags' => $tagWeights,
            'latestComments'=>$lastestComments
        ));
    }
}
