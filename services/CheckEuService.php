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
        // array list
        $arr = ['AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI',
            'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL',
            'PO', 'PT', 'RO', 'SE', 'SI', 'SK'];

        $output = 'no';
        if ( in_array( $c, $arr )) { $output = 'yes'; }

        // return output
        return $output;
    }

}