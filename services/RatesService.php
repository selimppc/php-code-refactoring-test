<?php

/**
 * Class RatesService
 */
class RatesService
{
    const API_URL = 'https://api.exchangeratesapi.io/latest';
    const RATE_TYPE = 'rates';

    /**
     * @param $currency
     * @return mixed|null
     */
    public function getRate( $currency ) {
        return $this->setRate( $currency );
    }

    /**
     * @param $currency
     * @return mixed|null
     */
    public function setRate( $currency ) {
        $res = $this->getJson();
        if ( isset( $res[$currency] ) ) return $res[$currency];
        return null;
    }

    /**
     * @return mixed
     */
    public function getJson(){
        return json_decode( file_get_contents( self::API_URL ), true )[self::RATE_TYPE];
    }

}