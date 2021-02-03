<?php

    function bubleSort($arr, bool $order = true, $log = false) {
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

    
    function replace ( &$a, &$b ) {  
        $c = $a;  
        $a = $b;  
        $b = $c;  
    }  
  
    function quickSortIteration (&$arr, &$iterations, $leftIndex, $rightIndex, $order, $log) {  
        $pivotPoint = $arr[$rightIndex];  
        $i = ($leftIndex - 1);  
  
        for ($j = $leftIndex; $j <= $rightIndex- 1; $j++) {  
            if (($arr[$j] > $pivotPoint) != $order) {  
                $i++;  
                replace ($arr[$i], $arr[$j]);  
                $iterations++;
                if($log) {
                    echo $iterations . ': ';
                    print_r($arr);
                }
            }  
        }  
        replace ($arr[$i + 1], $arr[$rightIndex]);  
        $iterations++;
        if($log) {
            echo $iterations . ': ';
            print_r($arr);
        }

        return ($i + 1);  
    }  

    function quickSort ($arr, $order = true, $log = false) { 
        echo 'Quick Sort, ' . ($order ? 'ASC' : 'DESC') . ' ';
        echo ' - ';
        echo 'Input array:';
        print_r($arr);
        $lenght = count($arr); 
        $indexesStack = [0, $lenght-1]; 
        $top = 1;
        $iterations = 0;
  
        while ( $top >= 0 ) {  
            $rightIndex = $indexesStack[ $top-- ];  
            $leftIndex = $indexesStack[ $top-- ];  
  
            $pivot = quickSortIteration( $arr, $iterations, $leftIndex, $rightIndex, $order, $log );  
  
            if ( $pivot-1 > $leftIndex ) {  
                $indexesStack[ ++$top ] = $leftIndex;  
                $indexesStack[ ++$top ] = $pivot - 1;  
            }  
  
            if ( $pivot+1 < $rightIndex ) {  
                $indexesStack[ ++$top ] = $pivot + 1;  
                $indexesStack[ ++$top ] = $rightIndex;  
            }  
        }  

        echo 'Result in ' . $iterations . ' iterations : ';
        print_r($arr);

        return $arr;
    }  
  
    
    $arr = [2, 7, 3, 1, 0, -10, 9, 5, 4, 19, 1, 0, 8, 8, 8];

    $bubleSortResult = bubleSort($arr);
    $quickSortResult = quickSort($arr);

    $arrSorted = [-10, 0, 0, 1, 1, 2, 3, 4, 5, 7, 8, 8, 8, 9, 19];

    $bubleSortResult = bubleSort($arrSorted, false);
    $quickSortResult = quickSort($arrSorted, false);

    $arrSortedWorst = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];

    $bubleSortResult = bubleSort($arrSortedWorst);
    $quickSortResult = quickSort($arrSortedWorst);
?>