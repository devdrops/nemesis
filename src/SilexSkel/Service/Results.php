<?php

namespace SilexSkel\Service;

use Github\Client;
use Github\HttpClient\CachedHttpClient;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class Results
{
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
        $this->githubClient = new Client(new CachedHttpClient(['cache_dir' => __DIR__.'/../../../app/cache']));
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
    public function filterByLanguage($language)
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
        $response = $this->fetchAll();
        switch (strtolower($criteria)) {
            case 'nameasc':
                $orderBy = null;

                break;
            case 'namedesc':
                $orderBy = '';

                break;
            case 'starasc':
                for ($counter = 0; $counter < count($response); $counter++) {
                    $min = null;
                    $minKey = null;
                    $subject = null;

                    for ($secondCounter = $counter; $secondCounter < count($response); $secondCounter++) {
                        if (is_null($min) || $response[$secondCounter]['stargazers_count'] < $min) {
                            $minKey = $secondCounter;
                            $min = $response[$secondCounter]['stargazers_count'];
                            $subject = $response[$secondCounter];
                        }
                    }

                    $response[$minKey] = $response[$min];
                    $response[$counter] = $min;
                }

                var_dump($response);
                die();
                
                return $response;
                
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
