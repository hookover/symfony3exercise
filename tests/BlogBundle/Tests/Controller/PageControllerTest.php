<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/25
 * Time: 下午3:56
 */

namespace Tests\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{
    public function testAbout()
    {
        $client = static::createClient();
        $crawler=$client->request('GET','/blog/about');

        $this->assertEquals(1,$crawler->filter('h1:contains("About symblog")')->count());
    }
    public function testIndex()
    {
        $client = static::createClient();
        $crawler=$client->request('GET','/blog');

        $this->assertTrue($crawler->filter('article.blog')->count()>0);

        $blogLink=$crawler->filter('article.blog h2 a')->first();
        $blogTitle=$blogLink->text();
        $crawler =$client->click($blogLink->link());

        $this->assertEquals(1,$crawler->filter('h2:contains("'.$blogTitle.'")')->count());
    }
    public function testCountact()
    {
        $client=static::createClient();
        $crawler=$client->request('GET','/blog/contact');

        $this->assertEquals(1,$crawler->filter('h1:contains("Contact symblog")')->count());

        $form=$crawler->selectButton('提交')->form();
        $form['enquiry[name]']       = 'name';
        $form['enquiry[email]']      = 'test@qq.com';
        $form['enquiry[subject]']    = 'Subject';
        $form['enquiry[body]']       = 'The comment body must be at least 50 characters long as there is a validation constrain on the Enquiry entity';

        $client->submit($form);

        if($profile=$client->getProfile())
        {
            $swiftMailerProfiler = $profile->getCollector('swiftmailer');
            $this->assertEquals(1,$swiftMailerProfiler->getMessageCount());
            $messages=$swiftMailerProfiler->getMessages();
            $message=array_shift($messages);

            $symblogEmail = $client->getContainer()->getParameter('blogger_blog.comments.latest_comment_limit');
            $this->assertArrayHasKey($symblogEmail,$message->getTo());
        }

        $crawler=$client->followRedirect();
        $this->assertEquals(1,$crawler->filter('.alert-success:contains("Your contact enquiry was successfully sent. Thank you!")')->count());
    }
}