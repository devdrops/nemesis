<?php

namespace SilexSkel\Service\Sorter;

/**
 * @author Davi Marcondes Moreira (@devdrops) <davi.marcondes.moreira@gmail.com>
 */
final class Selection implements SorterInterface
{
    /**
     * @param array $input
     * @param string $pattern
     * @param string $sortBy
     * @return array
     */
    public static function sort($input, $pattern, $sortBy)
    {
        if ($sortBy === self::SORT_ASC) {
            return self::ascending($input, $pattern);
        } elseif ($sortBy === self::SORT_DESC) {
            return self::descending($input, $pattern);
        }
    }
    
    /**
     * @param array $input
     * @param string $pattern
     * @return array
     */
    private static function ascending($input, $pattern)
    {
        for ($counter = 0; $counter < count($input); $counter++) {
            $min = null;
            $subject = null;
            $key = null;

            for ($secondCounter = $counter; $secondCounter < count($input); $secondCounter++) {
                if (is_null($min) || $input[$secondCounter][$pattern] < $min) {
                    $key = $secondCounter;
                    $min = $input[$secondCounter][$pattern];
                    $subject = $input[$secondCounter];
                }
            }

            $input[$key] = $input[$counter];
            $input[$counter] = $subject;
        }

        return $input;
    }
    
    /**
     * @param array $input
     * @param string $pattern
     * @return array
     */
    private static function descending($input, $pattern)
    {
        for ($counter = 0; $counter < count($input); $counter++) {
            $max = null;
            $subject = null;
            $key = null;

            for ($secondCounter = $counter; $secondCounter < count($input); $secondCounter++) {
                if (is_null($max) || $input[$secondCounter][$pattern] > $max) {
                    $key = $secondCounter;
                    $max = $input[$secondCounter][$pattern];
                    $subject = $input[$secondCounter];
                }
            }

            $input[$key] = $input[$counter];
            $input[$counter] = $subject;
        }

        return $input;
    }
}
