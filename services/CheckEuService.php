<?php

/**
 * Class CheckEUService
 */
class CheckEuService
{
    /**
     * @param $c
     * @return string
     */
    public function isEu( $c )
    {
        switch ( $c ) {
            case 'AT':
            case 'BE':
            case 'BG':
            case 'CY':
            case 'CZ':
            case 'DE':
            case 'DK':
            case 'EE':
            case 'ES':
            case 'FI':
            case 'FR':
            case 'GR':
            case 'HR':
            case 'HU':
            case 'IE':
            case 'IT':
            case 'LT':
            case 'LU':
            case 'LV':
            case 'MT':
            case 'NL':
            case 'PO':
            case 'PT':
            case 'RO':
            case 'SE':
            case 'SI':
            case 'SK':
                return 'yes';
            default:
                $result = 'no';
        }
        return $result;
    }

}