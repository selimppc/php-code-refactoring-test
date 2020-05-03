<?php

/**
 * Class BinListService
 */
class BinListService
{
    const LOOK_UP_URL = 'https://lookup.binlist.net/';

    /**
     * @param $bin
     * @return bool|string
     */
    public function getBinResult( $bin ) {
        return $this->getContents( $bin );
    }

    /**
     * @param $bin
     * @return bool|string
     */
    public function getContents( $bin ) {
        return file_get_contents( self::LOOK_UP_URL .$bin );
    }

}