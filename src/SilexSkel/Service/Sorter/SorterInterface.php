<?php

namespace SilexSkel\Service\Sorter;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
interface SorterInterface
{
    const SORT_ASC = 'asc';
    const SORT_DESC = 'desc';
    
    public static function sort($input, $pattern, $sortBy);
}
