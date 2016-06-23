<?php

/**
 * Project's settings.
 */

$app['cache.path'] = __DIR__ . '/../cache';

$app['twig.options.cache'] = $app['cache.path'] . '/twig';
