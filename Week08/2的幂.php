<?php
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n) {
        //二进制位有且仅有1个1
       return $n != 0 && (($n&($n-1))==0);
    }
}
// $n = new Solution();
// var_dump($n->isPowerOfTwo(8));
$a = [
    'topic' => [
        '1' => 'aa',
        '2' => 'bb',
    ],
];

$chapterIdColumn[0] =  [1,2];
$chapterIdColumn[1] =  [3,4];
foreach ($chapterIdColumn as $value) {
     echo (string)$knowledge['topic'][$value]['first_level_name']??'';
}