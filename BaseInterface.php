<?php

/**
 * Interface BaseInterface
 */
interface BaseInterface
{
    /**
     * @param $bin
     * @param $amount
     * @param $currency
     * @return mixed
     */
    public function getFinalResult( $bin, $amount, $currency );

    /**
     * @param $bin
     * @return mixed
     */
    public function getIsEuByBin( $bin );

    /**
     * @param $bin
     * @return mixed
     */
    public function getBinResultByBin( $bin );

    /**
     * @param $currency
     * @param $amount
     * @return mixed
     */
    public function getRateByCurrency( $currency, $amount );

    /**
     * @param $rate
     * @param $currency
     * @param $amount
     * @return mixed
     */
    public function getFixedAmount( $rate, $currency, $amount );


}