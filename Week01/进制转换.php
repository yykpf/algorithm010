<?php
class Test
{
    function convertNumber($n){
        $base52 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $s = '';
        if($n == 0) $s = $base52{0};
        while($n>0){
            $m = $n%62; // 取余数
            $s = $s.$base52{$m};
            $n = ($n-$m) / 62; // 剩下的数继续计算
        }
        return $s;
    }
}
$n = new Test();
// echo $n->convertNumber(1152921504606846976);
echo time();