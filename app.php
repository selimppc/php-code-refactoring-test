<?php
/**
 * App
 * Selim Reza
 */

require_once __DIR__."/services/DataExploreService.php";
require_once __DIR__.'/Common.php';

$exploreData = new DataExploreService();
$common = new Common;


// Get file or Receive file from args
$file = isset($argv) && $argv[1] == 'input.txt' ?
    $argv[1] : __DIR__ . "/input.txt";
$list = file_get_contents($file);
$inputData = explode("\n", trim($list));

/**
 *  main
 */
foreach ($inputData as $row) {
    if (empty($row)) break;

    //explode row
    $p = explode(",", $row);

    // retrieve bin, amount and currency
    $bin = $exploreData->getBin($p);
    $amount = $exploreData->getAmount($p);
    $currency = $exploreData->getCurrency($p);

    //get result
    $res = $common->getFinalResult($bin, $amount, $currency);
    echo $res;
    print "\n";
}

