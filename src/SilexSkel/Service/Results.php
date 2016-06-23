<?php

namespace SilexSkel\Service;

use Github\Client;
use Github\HttpClient\CachedHttpClient;
use SilexSkel\Service\Sorter\Selection;

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
                return Selection::sort($response, 'stargazers_count', Selection::SORT_ASC);
            case 'stardesc':
                return Selection::sort($response, 'stargazers_count', Selection::SORT_DESC);
            case 'issueasc':
                return Selection::sort($response, 'open_issues_count', Selection::SORT_ASC);
            case 'issuedesc':
                return Selection::sort($response, 'open_issues_count', Selection::SORT_DESC);
        }
    }
}
