<?php
/**
 * App
 * Selim Reza
 */

require_once 'Common.php';
$common = new Common;


// Get file or Receive file from args
$file = __DIR__ . "/input.txt";
$list = file_get_contents($file);
# $list = file_get_contents($argv[1]);
$inputData = explode("\n", trim($list));


/**
 *  main
 */
foreach ($inputData as $row) {
    if (empty($row)) break;

    //explode row
    $p = explode(",", $row);

    // retrieve bin, amount and currency
    $bin = getBin($p);
    $amount = getAmount($p);
    $currency = getCurrency($p);

    //get result
    $res = $common->getFinalResult($bin, $amount, $currency);
    echo $res;
    print "\n";
}

/**
 * @param $p array
 * @return string
 */
function getBin($p)
{
    $p2 = explode(':', $p[0]);
    return trim($p2[1], '"');
}

/**
 * @param $p array
 * @return string
 */
function getAmount($p)
{
    $p2 = explode(':', $p[1]);
    return trim($p2[1], '"');
}

/**
 * @param $p array
 * @return string
 */
function getCurrency($p)
{
    $p2 = explode(':', $p[2]);
    return trim($p2[1], '"}');
}


