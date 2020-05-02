<?php
/**
 * App
 * Selim Reza
 */

require_once 'Common.php';
$common = new Common;

# $list = file_get_contents($argv[1]);
$list = file_get_contents('input.txt');
$inputData = explode("\n", trim($list));

/**
 *  app
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
    $res = $common->getResult($bin, $amount, $currency);

    echo $res;
    print "\n";
}

/**
 * @param $p
 * @return string
 */
function getBin($p)
{
    $p2 = explode(':', $p[0]);
    return trim($p2[1], '"');
}

/**
 * @param $p
 * @return string
 */
function getAmount($p)
{
    $p2 = explode(':', $p[1]);
    return trim($p2[1], '"');
}

/**
 * @param $p
 * @return string
 */
function getCurrency($p)
{
    $p2 = explode(':', $p[2]);
    return trim($p2[1], '"}');
}


