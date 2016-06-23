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
        $list = $this->fetchAll();
        
        $sorted = [];
        $other = [];
        foreach ($list as $repository) {
            if (strtolower($repository['language']) === strtolower($language)) {
                $sorted[] = $repository;
            } else {
                $other[] = $repository;
            }
        }
        
        return array_merge($sorted, $other);
    }
    
    /**
     * @param string $criteria
     */
    public function orderBy($criteria)
    {
        $orderBy = null;
        switch (strtolower($criteria)) {
            case 'nameasc':
                $orderBy = '';

                break;
            case 'namedesc':
                $orderBy = '';

                break;
            case 'starasc':
                $orderBy = '';

                break;
            case 'stardesc':
                $orderBy = '';

                break;
            case 'issueasc':
                $orderBy = '';

                break;
            case 'issuedesc':
                $orderBy = '';

                break;
        }
        
            
    }
    
    private function fetchByOrder()
    {
        
    }
}
