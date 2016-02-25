<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/25
 * Time: 下午11:03
 */

namespace Tests\BlogBundle\Repository;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogRepository extends WebTestCase
{
    /**
     * @var \Blogger\BlogBundle\Repository\BlogRepository
     */
    private $blogRepository;

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->blogRepository=$kernel->getContainer()
            ->get('doctrine.orm.default_entity_manager')
            ->getRepository('BloggerBlogBundle:Blog');
    }
    public function testGetTagWeights()
    {
        $tagsWeight=$this->blogRepository->getTagWeights(
            array('php','code','code','symblog','blog')
        );
        $this->assertTrue(count($tagsWeight)>1);

        $tagsWeight=$this->blogRepository->getTagWeights(
            array_fill(0,10,'php')
        );

        $this->assertTrue(count($tagsWeight)>=1);

        $tagsWeight=$this->blogRepository->getTagWeights(
            array_merge(array_fill(0,10,'php'),array_fill(0,1,'html'),array_fill(0,6,'js'))
        );

        $this->assertEquals(10,$tagsWeight['php']);
        $this->assertEquals(6,$tagsWeight['js']);
        $this->assertEquals(1,$tagsWeight['html']);

        $tagsWeight=$this->blogRepository->getTagWeights(array());
        $this->assertEmpty($tagsWeight);
    }
}