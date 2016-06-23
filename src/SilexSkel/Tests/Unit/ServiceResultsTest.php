<?php

use SilexSkel\Service\Results;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class ServiceResultsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \SilexSkel\Service\Results
     */
    private $subject;
    
    public function setUp()
    {
        $this->subject = new Results('devdrops');
    }
    
    public function testFetchAll()
    {
        $response = $this->subject->fetchAll();
        
        $this->assertTrue(is_array($response));
        $this->assertTrue(count($response) == 30);
        
        $this->assertEquals($response[0]['id'], 61253445);
        $this->assertEquals($response[0]['name'], 'lemonade-stand');
        $this->assertEquals($response[0]['full_name'], 'nayafia/lemonade-stand');
    }
    
    public function testFetchbyLanguage()
    {
        $response = $this->subject->filterByLanguage('php');
        
        $this->assertTrue(is_array($response));
        $this->assertTrue(count($response) == 30);
        
        $this->assertEquals($response[0]['id'], 3482588);
        $this->assertEquals($response[0]['name'], 'SecLists');
        $this->assertEquals($response[0]['full_name'], 'danielmiessler/SecLists');
        $this->assertEquals($response[0]['language'], 'PHP');
    }
    
    public function testAlphabeticalAscendingOrder()
    {
        $response = $this->subject->orderBy('nameAsc');
        
        $this->assertTrue(is_array($response));
        $this->assertTrue(count($response) == 30);
    }
    
    public function testStargazersAscendingOrder()
    {
        
    }
}
