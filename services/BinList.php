<?php

/**
 * Class BinList
 */
class BinList
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
     * @param $value
     * @return bool|string
     */
    public function getContents( $value ) {
        return file_get_contents( self::LOOK_UP_URL .$value );
    }

}