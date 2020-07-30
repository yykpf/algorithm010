<?php
class Solution{

    public $counter = [];
    function radixSort($arr, $maxDigit) {
        $mod = 10;
        $dev = 1;
        for($i = 0; $i < $maxDigit; $i++, $dev *= 10, $mod *= 10) {
            for($j = 0; $j < count($arr); $j++) {
                $bucket = ($arr[$j] % $mod) / $dev;
                if(empty($this->counter[$bucket])) {
                    $this->counter[$bucket] = [];
                }
                array_push($this->counter[$bucket], $arr[$j]);
            }
            $pos = 0;
            for($j = 0; $j < count($this->counter); $j++) {
                $value = null;
                if(!empty($this->counter[$j])) {
                    while(($value = array_shift($this->counter[$j])) != null) {
                          $arr[$pos++] = $value;
                    }
              }
            }
        }
        return $arr;
    }
}
$n = new Solution();
var_dump($n->radixSort([2,3,4,5,1,2,10],10));
