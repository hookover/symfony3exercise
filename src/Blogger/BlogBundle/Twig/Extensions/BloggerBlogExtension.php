<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/25
 * Time: 上午8:42
 */

namespace Blogger\BlogBundle\Twig\Extensions;

class BloggerBlogExtension extends \Twig_Extension
{
    public function getFilters()
    {
//        return array(
//            'created_ago'=>new \Twig_Filter_Method($this,'createdAgo'),
//        );
        return array(
            new \Twig_SimpleFilter('created_ago',array($this,'createdFilters'))
        );
    }
    public function createdFilters(\DateTime $dateTime)
    {
        $dalte = time() - $dateTime->getTimestamp();

        if($dalte<0)
            throw new \InvalidArgumentException("createAgo is unable to handle dates in the future");

        $duration="";
        if($dalte<60)
        {
            //seconds
            $time=$dalte;
            $duration=floor($time)." second".(($time>1) ? "s" : "")." ago";
        }
        else if($dalte<3600)
        {
            //mins
            $time=($dalte/60);
            $duration=floor($time)." minute".(($time>1)?"s":"")." ago";
        }
        else if($dalte<86400)
        {
            //hours
            $time=($dalte/3600);
            $duration=floor($time)." hour".(($time>1)?"s":"")." ago";
        }
        else if($dalte<86400*30)
        {
            //Days
            $time=($dalte/86400);
            $duration=floor($time)." day".(($time>1)?"s":"")." ago";

        }else
        {
            //Years
            $time=($dalte/(86400*365));
            $duration=floor($time)." year".(($time>1)?"s":"")." ago";
        }
        return $duration;
    }
    public function getName()
    {
        return 'blogger_blog_extension';
    }
}