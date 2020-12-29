<?php

/**
 * 
 */
class CreateMatrix
{
    
    function __construct()
    {
        
    }

    public function getBaseArray($startNumber, $endNumber)
    {
        $count = $startNumber;

        for ($i = $startNumber; $i <= $endNumber; $i++) {
            $result[] = ($i);
        }
        
        return $result;
    }

    public function getMatrix($sizeMatrix, $source, $matrix)
    {
        $row = array();

        for ($i = 1; $i <= $sizeMatrix; $i++) {
            $rand_keys = array_rand($source, 1);
            $row[] = ($source[$rand_keys]);
            unset($source[$rand_keys]);
        }

        $matrix[] = $row;

        if(!empty($source)) 
        {
            $matrix = $this->getMatrix($sizeMatrix, $source, $matrix);
        }

        return $matrix;
    }

}

$matrix = new CreateMatrix;

$source = $matrix->getBaseArray(1, 100);
$result =  $matrix->getMatrix(10, $source, array());


echo '<table border=1 cellspacing=4 cellpadding=0>'.PHP_EOL;
foreach ($result as $row) {
    echo '<tr>'.PHP_EOL;
    foreach ($row as $column) {
        echo '<td>'.$column.'</td>'.PHP_EOL;
    }
    echo '</tr>'.PHP_EOL;
}
echo '</table>'.PHP_EOL;
