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
        $crawler=$client->request('GET','/contact');

        $this->assertEquals(1,$crawler->filter('h1:contains("Contact symblog")')->count());

        $form=$crawler->selectButton('Submit')->form();
        $form['blogger_blogbundle_enquirytype[name]']='name';
        $form['blogger_blogbundle_enquirytype[email]']      = 'email@email.com';
        $form['blogger_blogbundle_enquirytype[subject]']    = 'Subject';
        $form['blogger_blogbundle_enquirytype[body]']       = 'The comment body must be at least 50 characters long as there is a validation constrain on the Enquiry entity';

        $crawler=$client->submit($form);

        $this->assertEquals(1,$crawler->filter('.blogger-note:contains("Your contact enquiry was successfully sent. Thank you!")')->count());
    }
}