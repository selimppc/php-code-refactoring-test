<?php
/**
 * App
 * Selim Reza
 */

require_once __DIR__."/services/DataExploreService.php";
require_once __DIR__.'/Common.php';


// Get file or Receive file from args
$file = isset($argv) && $argv[1] == 'input.txt' ?
    $argv[1] : null;
$list = null;
if ( $file != null ) { $list = file_get_contents($file); }
$inputData = explode("\n", trim($list));


// call the function for desire result
$obj = new App();
$obj->main($inputData);


/**
 * Class App
 */
class App {
    /**
     * This function is to get the output
     * @param $inputData
     */
    function main ( $inputData ) {
        foreach ($inputData as $row) {
            if (empty($row)) break;

            //explode row
            $p = explode(",", $row);

            // retrieve bin, amount and currency
            $exploreData = new DataExploreService();
            $bin = $exploreData->getBin($p);
            $amount = $exploreData->getAmount($p);
            $currency = $exploreData->getCurrency($p);

            //get result
            $res = $this->getResult($bin, $amount, $currency);
            echo $res;
            print "\n";
        }
    }

    // call to Common Class
    function getResult( $bin, $amount, $currency ) {
        //get result
        $common = new Common;
        return $common->getFinalResult($bin, $amount, $currency);
    }
}



