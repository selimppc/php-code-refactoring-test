<?php

/**
 * Class DataExploreService
 */
class DataExploreService
{
    /**
     * @param $p array
     * @return string
     */
    public function getBin($p)
    {
        $p2 = explode(':', $p[0]);
        return trim($p2[1], '"');
    }

    /**
     * @param $p array
     * @return string
     */
    public function getAmount($p)
    {
        $p2 = explode(':', $p[1]);
        return trim($p2[1], '"');
    }

    /**
     * @param $p array
     * @return string
     */
    public function getCurrency($p)
    {
        $p2 = explode(':', $p[2]);
        return trim($p2[1], '"}');
    }

}