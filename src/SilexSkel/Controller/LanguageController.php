<?php

namespace SilexSkel\Controller;

use Silex\Application;
use SilexSkel\Service\Results;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
class LanguageController
{
    /**
     * @var \SilexSkel\Service\Results
     */
    private $resultsService;
    
    public function fetch(Request $request, Application $app)
    {
        $this->resultsService = new Results($request->get('username'));
        $content = new \ArrayObject();
        
        try {
            $content['status'] = 200;
            $content['content'] = $this->resultsService->filterByLanguage($request->get('language'));
        } catch (\Exception $exception) {
            $content['status'] = 500;
            $content['content'] = 'OUCH!';
        }
        
        return new JsonResponse($content);
    }
}
