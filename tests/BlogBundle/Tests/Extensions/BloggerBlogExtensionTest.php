<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/25
 * Time: 上午11:31
 */

namespace Tests\BlogBundle\Extensions;

use Blogger\BlogBundle\Twig\Extensions\BloggerBlogExtension;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BloggerBlogExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatedAgo()
    {
        $blog = new BloggerBlogExtension();

        $this->assertEquals("0 second ago", $blog->createdFilters(new \DateTime()));
        $this->assertEquals("34 seconds ago", $blog->createdFilters($this->getDateTime(-34)));
        $this->assertEquals("1 minute ago", $blog->createdFilters($this->getDateTime(-60)));
        $this->assertEquals("2 minutes ago", $blog->createdFilters($this->getDateTime(-123)));
        $this->assertEquals("1 hour ago", $blog->createdFilters($this->getDateTime('-3600')));
        $this->assertEquals("2 hours ago", $blog->createdFilters($this->getDateTime('-7300')));
        $this->assertEquals("1 day ago", $blog->createdFilters($this->getDateTime('-86400')));
        $this->assertEquals("1 days ago", $blog->createdFilters($this->getDateTime('-86402')));
        $this->assertEquals("1 year ago", $blog->createdFilters($this->getDateTime('-31536000')));

//        $this->setExpectedException('\InvalidArgumentException');
//        $this->expectException('\InvalidArgumentExtension');
//        $blog->createdAgo($this->getDateTime(60));
    }
    public function getDateTime($delta)
    {
        return new \DateTime(date('Y-m-d H:i:s',time()+$delta));
    }
}