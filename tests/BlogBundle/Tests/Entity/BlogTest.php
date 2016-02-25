<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/25
 * Time: 上午11:11
 */

namespace Tests\BlogBundle\Entity;

use Blogger\BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogTest extends WebTestCase
{
    public function testSlugify()
    {
        $blog=new Blog();
        $this->assertEquals('hello-world',$blog->slugify('Hello World'));
        $this->assertEquals('a-day-with-symfony2',$blog->slugify('A Day With Symfony2'));
        $this->assertEquals('symblog',$blog->slugify('symblog '));
        $this->assertEquals('symblog',$blog->slugify(' Symblog'));
    }
    public function testSetTitle()
    {
        $blog=new Blog();
        $blog->setTitle('Hello World');
        $this->assertEquals('hello-world',$blog->getSlug());
    }
}