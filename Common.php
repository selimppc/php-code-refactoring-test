<?php

require_once __DIR__."/BaseInterface.php";
require_once __DIR__."/services/CheckEu.php";
require_once __DIR__."/services/BinList.php";
require_once __DIR__."/services/Rates.php";

/**
 * Class Common
 */
class Common implements BaseInterface
{
    /**
     * @param $bin
     * @param $amount
     * @param $currency
     * @return float|int
     */
    public function getFinalResult( $bin, $amount, $currency ) {
        $rat = $this->getRateByCurrency( $currency, $amount );
        $amnt = ( $this->getIsEuByBin( $bin ) == 'yes' ? 0.01 : 0.02 );
        return $rat * $amnt;
    }


    /**
     * @param $bin
     * @return string
     */
    public function getIsEuByBin( $bin ) {
        $r = $this->getBinResultByBin( $bin );
        // call an object
        $checkEu = new CheckEu();
        return $checkEu->isEu( $r->country->alpha2 );
    }

    /**
     * @param $bin
     * @return mixed
     */
    public function getBinResultByBin( $bin ) {
        // call an object
        $binList = new BinList();
        $binResults = $binList->getBinResult( $bin );
        if ( !$binResults ) die( 'error!' );
        return json_decode( $binResults );
    }

    /**
     * @param $currency
     * @param $amount
     * @return float|int|null
     */
    public function getRateByCurrency( $currency, $amount ) {
        // call an object
        $rates = new Rates();
        $rate = $rates->getRate( $currency );
        return $this->getFixedAmount( $rate, $currency, $amount );
    }

    /**
     * @param $rate
     * @param $currency
     * @param $amount
     * @return float|int|null
     */
    public function getFixedAmount( $rate, $currency, $amount ) {
        $amntFixed = null;
        if ( $currency == 'EUR' or $rate == 0 ) $amntFixed = $amount;
        if ( $currency != 'EUR' or $rate > 0 ) $amntFixed = $amount / $rate;
        return $amntFixed;
    }


}