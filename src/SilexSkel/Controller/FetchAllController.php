<?php

namespace SilexSkel\Controller;

use Silex\Application;
use SilexSkel\Service\Results;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class FetchAllController
{
    /**
     * @var \SilexSkel\Service\Results
     */
    private $resultsService;
    
    public function fetchAll(Request $request, Application $app)
    {
        $this->resultsService = new Results($request->get('username'));
        $content = new \ArrayObject();
        
        try {
            $content['status'] = 200;
            
            if (is_null($request->query->get('orderBy', null))) {
                $content['content'] = $this->resultsService->fetchAll();
            } else {
                $content['content'] = $this->resultsService->orderBy($request->query->get('orderBy'));
            }
        } catch (\Github\Exception\ApiLimitExceedException $exception) {
            $content['status'] = 502;
            $content['content'] = 'GitHub API limit has been reached :(';
        } catch (\Exception $exception) {
            $content['status'] = 500;
            $content['content'] = 'OUCH!';
        }
        
        return new JsonResponse($content);
    }
}
