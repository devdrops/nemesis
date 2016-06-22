<?php

/**
 * Application's routes.
 */

$app->get('/repos/{username}', 'SilexSkel\Controller\FetchAllController::fetchAll')->bind('fetch_all');
$app->get('/repos/{username}/{language}', 'SilexSkel\Controller\LanguageController::fetch')->bind('fetch_language');
