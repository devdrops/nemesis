<?php

use Silex\WebTestCase;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class FetchAllControllerTest extends WebTestCase
{
    public function createApplication()
    {
        $app = new Silex\Application();
        
        require __DIR__.'/../../../../app/config/dev.php';
        require __DIR__.'/../../../../app/app.php';
        require __DIR__.'/../../../../app/routes.php';
        
        return $app;
    }

    public function testListAllReposUrl()
    {
        $client = $this->createClient();
        $client->request('GET', '/repos/devdrops');
        
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
