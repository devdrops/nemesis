<?php

namespace SilexSkel\Service;

use Github\Client;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class Results {
    
    /**
     * @var \Github\Client 
     */
    private $githubClient;
    
    /**
     * @var string
     */
    private $userName;
    
    public function __construct($username)
    {
        $this->githubClient = new Client();
        $this->userName = $username;
    }
    
    public function fetchAll()
    {
        return $this->githubClient->api('user')->starred($this->userName);
    }
    
    /**
     * @param string $language
     * @param string $order
     */
    public function filterByLanguage($language, $order = 'asc')
    {
        //return $this->githubClient->api('search')->repositories('user:'.$this->userName);
        $raw = $this->fetchAll();
        
        
    }
    
    /**
     * @param string $criteria
     */
    public function orderBy($criteria)
    {
        
    }
}
