<?php

use Silex\WebTestCase;

class ApplicationTest extends WebTestCase
{
    public function createApplication()
    {
        $app = new Silex\Application();
        
        require __DIR__.'/../../../../app/config/dev.php';
        require __DIR__.'/../../../../app/app.php';
        require __DIR__.'/../../../../app/routes.php';
        
        return $app;
    }
    
    public function testPageNotFound()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/pagenotfound');
        
        $this->assertTrue($client->getResponse()->isNotFound());
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertContains('Sorry, the page you are looking for could not be found.', $crawler->html());
    }
}
