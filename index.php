<?php

/*
* Constansts for storing strings with order definition
*/
const SORT_ORDER_ASC  = 'ASC';
const SORT_ORDER_DESC = 'DESC';

/**
 * Transform order string into boolean default order - ASC
 * Returns
 * ASC -> true
 * DESC -> false
 * @param string order
 * @return bool
 */
function checkOrder(string $order):bool {
    switch($order) {
        case SORT_ORDER_ASC:

            return true;
        case SORT_ORDER_ASC:

            return false;
        default:

            return true;
    }
}

/**
 * Buble sort realisation
 * Returns sorted array and change iteration count
 * @param array arr
 * @param string order
 * @param int iterations 
 * @return array
 */
function bubleSort(array $arr, string $order = SORT_ORDER_ASC, &$iterations = 0):array {
    $isAscOrder = checkOrder($order);
    $iterations = 0;
    $lenght = count($arr);
    for($i = 0; $i < $lenght; $i++) {
        for($j = 0; $j < $lenght; $j++) {
            if(($arr[$i] > $arr[$j]) != $order) {
                $value = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $value;
            }
            $iterations++;
        }
    }

    return $arr;
}
/**
 * Replace values of two variables
 */
function replace ( &$a, &$b ) {
    $c = $a;
    $a = $b;
    $b = $c;
}

/**
 * Transforms one sub array in a time
 * Returns new index of pivot point after sorting sub array arround it 
 * Updates iteration variable to
 * @param array arr
 * @param int iterations
 * @param int leftIndex
 * @param int rightIndex
 * @param bool isAscOrder
 * @return int
 */
function quickSortIteration (array &$arr, &$iterations, int $leftIndex, int $rightIndex, bool $isAscOrder):int {
    $pivotPoint = $arr[$rightIndex];
    $i = ($leftIndex - 1);
    for ($j = $leftIndex; $j <= $rightIndex- 1; $j++) {
        if (($arr[$j] > $pivotPoint) != $isAscOrder) {
            $i++;
            replace ($arr[$i], $arr[$j]);
            $iterations++;
        }
    }
    replace ($arr[$i + 1], $arr[$rightIndex]);
    $iterations++;

    return ($i + 1);
}

/**
 * Quick sort realisation iterative
 * Returns sorted array and change iteration count
 * @param array arr
 * @param string order
 * @param int iterations
 * @return array
 */
function quickSort (array $arr, string $order = SORT_ORDER_ASC, &$iterations = 0):array {
    $isAscOrder = checkOrder($order);
    $iterations=0;
    $lenght = count($arr);
    if($lenght == 0) {

        return $arr;
    }
    $indexesStack = [0, $lenght - 1];
    $top = 1;
    $iterations = 0;
    while ( $top >= 0 ) {
        $rightIndex = $indexesStack[ $top-- ];
        $leftIndex = $indexesStack[ $top-- ];
        $pivot = quickSortIteration( $arr, $iterations, $leftIndex, $rightIndex, $isAscOrder);
        if ( $pivot-1 > $leftIndex ) {
            $indexesStack[ ++$top ] = $leftIndex;
            $indexesStack[ ++$top ] = $pivot - 1;
        }
        if ( $pivot+1 < $rightIndex ) {
            $indexesStack[ ++$top ] = $pivot + 1;
            $indexesStack[ ++$top ] = $rightIndex;
        }
    }

    return $arr;
}

/**
 * @param array $array
 * @return string
 */
function arrayToString(array $array)
{
    return implode(', ', $array);
}
/**
 * @param array $arr
 * @param string $order
 */
function tryBubble(array $arr, $order = SORT_ORDER_ASC)
{
    $result = bubleSort($arr, ($order === SORT_ORDER_ASC), $iterations);
    echo "Bubble sorted:" . arrayToString($result) . PHP_EOL;
    echo "          Iterations : " . $iterations . PHP_EOL;
}
/**
 * @param array $arr
 * @param string $order
 */
function tryQuickSort(array $arr, $order = SORT_ORDER_ASC)
{
    $result = quickSort($arr, ($order === SORT_ORDER_ASC), $iterations);
    echo "QuickSort sorted:" . arrayToString($result) . PHP_EOL;
    echo "          Iterations : " . $iterations . PHP_EOL;
}
$arr = [2, 7, 3, 1, 0, -10, 9, 5, 4, 19, 1, 0, 8, 8, 8];
echo str_repeat('-', 80) .PHP_EOL;
echo "Random input array:" .  arrayToString($arr). PHP_EOL . PHP_EOL;
tryBubble($arr);
tryQuickSort($arr);
echo str_repeat('-', 80) .PHP_EOL;
$arrSorted = [-10, 0, 0, 1, 1, 2, 3, 4, 5, 7, 8, 8, 8, 9, 19];
echo "Sorted input array:" .  arrayToString($arrSorted). PHP_EOL . PHP_EOL ;
tryBubble($arrSorted);
tryQuickSort($arrSorted);
echo str_repeat('-', 80) .PHP_EOL;
$arrWorst = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,];
echo "Equal value input array:" .  arrayToString($arrWorst). PHP_EOL . PHP_EOL ;
tryBubble($arrWorst);
tryQuickSort($arrWorst);
echo str_repeat('-', 80) .PHP_EOL;
$arrEmpty = [];
echo "Equal value input array:" .  arrayToString($arrEmpty). PHP_EOL . PHP_EOL ;
tryBubble($arrEmpty);
tryQuickSort($arrEmpty);