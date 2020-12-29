<?php

class CreateMatrix
{
    protected $range = [];
    public $matrix = [];
    
    function __construct (int $start=0, int $end=100) {
       for ($i = $start; $i <= $end; $i++) {
           array_push($this->range,$i);
       }
    }

    public function getMatrix (int $sizeSide=10) {
        for ($x = 0; $x <= $sizeSide-1;$x++) {
            for ($y = 0; $y <= $sizeSide-1;$y++) {
                $randomKey = array_rand($this->range,1);
                $this->matrix[$x][$y] = $this->range[$randomKey];
                unset($this->range[$randomKey]);
            }
        }
    }
}

$matrix = new CreateMatrix(0,100);
$matrix->getMatrix(10);

echo '<table border=1 cellspacing=4 cellpadding=0>'.PHP_EOL;
foreach ($matrix->matrix as $row) {
    echo '<tr>'.PHP_EOL;
    foreach ($row as $column) {
        echo '<td>'.$column.'</td>'.PHP_EOL;
    }
    echo '</tr>'.PHP_EOL;
}
echo '</table>'.PHP_EOL;
