<?php

/**
 * Application's settings.
 */

use Symfony\Component\HttpFoundation\JsonResponse;

$app->error(function (\Exception $exception, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    switch ($code) {
        case 404:
            $message = ['status' => 404, 'content' => 'Resource not found.'];
            break;
        default:
            $message = ['status' => 500, 'content' => 'Application error :/'];
    }

    return new JsonResponse($message, $code);
});

return $app;
