<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/23
 * Time: 下午3:30
 */
namespace Blogger\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function showAction($id,$slug=null,$comments=null)
    {
        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if(!$blog){
            throw $this->createNotFoundException('Unable to find blog post.');
        }

        $comments=$em->getRepository('BloggerBlogBundle:Comment')
            ->getCommentsForBlog($blog->getId());

        return $this->render('BloggerBlogBundle:Blog:show.html.twig',array(
            'blog'=>$blog,
            'comments'=>$comments
        ));
    }
}