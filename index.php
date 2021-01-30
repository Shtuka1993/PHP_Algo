<?php
    //$arr - array to be sorted
    //$order - if false - DESC
    //$log - if true - Show execution progress
    function bubbleSort($arr, bool $order = true, $log = false) {
        $lenght = count($arr);
        $iterations = 0;
        echo 'Buble Sort, ' . ($order ? 'ASC' : 'DESC') . ' ';
        echo ' - ';
        echo 'Input array:';
        print_r($arr);
        for($i = 0; $i < $lenght; $i++) {
            for($j = 0; $j < $lenght; $j++) {
                if(($arr[$i] > $arr[$j]) != $order) {
                    $value = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $value;
                }
                $iterations++;
                if($log) {
                    echo $iterations . ': ';
                    print_r($arr);
                }
            }
        }
        echo 'Result in ' . $iterations . ' iterations : ';
        print_r($arr);

        return $arr;
    }
    
    $arr = [2, 7, 3, 1, 0, -10, 9, 5, 4, 19, 1, 0, 8, 8, 8];

    bubbleSort($arr, true);
?>