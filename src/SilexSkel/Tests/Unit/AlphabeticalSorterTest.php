<?php

use SilexSkel\Service\Sorter\Alphabetical;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class AlphabeticalSorterTest extends \PHPUnit_Framework_TestCase
{
    private $input;
    
    public function setUp()
    {
        $this->input = [
            [ 'phrase' => 'is', 'criteria' => 9 ],
            [ 'phrase' => 'Winter', 'criteria' => 2 ],
            [ 'phrase' => 'coming.', 'criteria' => 1001 ]
        ];
    }
    
    public function testAscendingSort()
    {
        $result = Alphabetical::sort($this->input, 'phrase', Alphabetical::SORT_ASC);
        
        $this->assertTrue(is_array($result));
        $this->assertEquals($result[0]['phrase'], 'coming.');
        $this->assertEquals($result[1]['phrase'], 'is');
        $this->assertEquals($result[2]['phrase'], 'Winter');
    }
    
    public function testDescendingSort()
    {
        $result = Alphabetical::sort($this->input, 'phrase', Alphabetical::SORT_DESC);
        
        $this->assertTrue(is_array($result));
        $this->assertEquals($result[0]['phrase'], 'Winter');
        $this->assertEquals($result[1]['phrase'], 'is');
        $this->assertEquals($result[2]['phrase'], 'coming.');
    }
}
