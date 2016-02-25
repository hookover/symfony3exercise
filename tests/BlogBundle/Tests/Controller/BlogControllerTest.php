<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/25
 * Time: 下午6:48
 */

namespace Tests\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testAddBlogComment()
    {
        $client = static::createClient();

        $crawler=$client->request('GET','/blog/11/a-day-with-symfony2');
        $this->assertEquals(1,$crawler->filter('h2:contains("A day with Symfony2")')->count());

        $form=$crawler->selectButton('提交')->form();

        $crawler=$client->submit($form,array(
            'comment[user]'=>'name',
            'comment[comment]'=>'hello world comment',
        ));

        $crawler=$client->followRedirect();

        $articleCrawler = $crawler->filter('section.previous-comments article')->last();
        $this->assertEquals('name',$articleCrawler->filter('header span.highlight')->text());

        $this->assertEquals('hello world comment',$articleCrawler->filter('p')->last()->text());

        $this->assertEquals(10,$crawler->filter('.sidebar section')->last()
            ->filter('article')->count()
        );

        $this->assertEquals('name',$crawler->filter('.sidebar section')->last()
                                ->filter('article')->first()
                                ->filter('header span.highlight')->text()
        );
    }
}