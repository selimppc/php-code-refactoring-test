<?php

/**
 * Class Rates
 */
class Rates
{
    const API_URL = 'https://api.exchangeratesapi.io/latest';
    const RATE_TYPE = 'rates';

    /**
     * @param $value
     * @return mixed|null
     */
    public function getRate( $value ) {
        return $this->setRate( $value );
    }

    /**
     * @param $value
     * @return mixed|null
     */
    public function setRate( $value ) {
        $res = $this->getJson();
        if ( isset( $res[$value] ) ) return $res[$value];
        return null;
    }

    /**
     * @return mixed
     */
    public function getJson(){
        return json_decode( file_get_contents( self::API_URL ), true )[self::RATE_TYPE];
    }

}