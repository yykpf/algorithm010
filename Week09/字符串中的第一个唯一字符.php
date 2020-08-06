<?php
// 387. 字符串中的第一个唯一字符
// 给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。

// 示例：

// s = "leetcode"
// 返回 0

// s = "loveleetcode"
// 返回 2


// 提示：你可以假定该字符串只包含小写字母。

class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        if ($s == '') return -1;
        $sArr = str_split($s);
        $cArr = array_count_values($sArr);
        for ($i=0; $i < strlen($s); $i++) {
            if ($cArr[$s[$i]] == 1) return $i;
        }
        return -1;
    }
}

$n = new Solution();
echo $n->firstUniqChar("lleetcode");