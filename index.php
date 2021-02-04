<?php
function bubleSort($arr, bool $order = true, &$iterations = 0) {
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
function replace ( &$a, &$b ) {
    $c = $a;
    $a = $b;
    $b = $c;
}
function quickSortIteration (&$arr, &$iterations, $leftIndex, $rightIndex, $order) {
    $pivotPoint = $arr[$rightIndex];
    $i = ($leftIndex - 1);
    for ($j = $leftIndex; $j <= $rightIndex- 1; $j++) {
        if (($arr[$j] > $pivotPoint) != $order) {
            $i++;
            replace ($arr[$i], $arr[$j]);
            $iterations++;
        }
    }
    replace ($arr[$i + 1], $arr[$rightIndex]);
    $iterations++;
    return ($i + 1);
}
function quickSort ($arr, $order = true, &$iterations = 0) {
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
        $pivot = quickSortIteration( $arr, $iterations, $leftIndex, $rightIndex, $order );
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
const SORT_ORDER_ASC  = 'ASC';
const SORT_ORDER_DESC = 'DESC';
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