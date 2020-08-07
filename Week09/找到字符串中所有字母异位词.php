<?php

// 438. 找到字符串中所有字母异位词
// 给定一个字符串 s 和一个非空字符串 p，找到 s 中所有是 p 的字母异位词的子串，返回这些子串的起始索引。

// 字符串只包含小写英文字母，并且字符串 s 和 p 的长度都不超过 20100。

// 说明：

// 字母异位词指字母相同，但排列不同的字符串。
// 不考虑答案输出的顺序。
// 示例 1:

// 输入:
// s: "cbaebabacd" p: "abc"

// 输出:
// [0, 6]

// 解释:
// 起始索引等于 0 的子串是 "cba", 它是 "abc" 的字母异位词。
// 起始索引等于 6 的子串是 "bac", 它是 "abc" 的字母异位词。
//  示例 2:

// 输入:
// s: "abab" p: "ab"

// 输出:
// [0, 1, 2]

// 解释:
// 起始索引等于 0 的子串是 "ab", 它是 "ab" 的字母异位词。
// 起始索引等于 1 的子串是 "ba", 它是 "ab" 的字母异位词。
// 起始索引等于 2 的子串是 "ab", 它是 "ab" 的字母异位词。

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
   function findAnagrams($s, $p) {
        $sLen = strlen($s);
        $pLen = strlen($p);
        if (empty($p) || $pLen > $sLen) return [];
        $pHash = [];
        $sHash = [];
        $resArr = [];
        //先取得p中的字符统计，同时拿到第一个窗口中的字符统计。
        for ($i = 0; $i< $pLen; $i ++) {
            !isset($pHash[$p[$i]])?$pHash[$p[$i]] = 1:$pHash[$p[$i]]++;
            !isset($sHash[$s[$i]])?$sHash[$s[$i]] = 1:$sHash[$s[$i]]++;
        }
        $start = 0;
        while ($start < $sLen - $pLen+1) {
            if ($this->same($pHash, $sHash)) $resArr[] = $start;
            // 去除已经验证的数据
            $sHash[$s[$start]] --;
            if ($sHash[$s[$start]] == 0) unset($sHash[$s[$start]]);
            $start++;
            // 始终保持有相等 p 的数据
            if (isset($s[$start + $pLen - 1])) {
                $eTmp = $s[$start + $pLen - 1];
                if (!isset($sHash[$eTmp])) {
                    $sHash[$eTmp] = 1;
                } else {
                    $sHash[$eTmp] ++;
                }
            }
        }
        return $resArr;
    }

    function same($arr1, $arr2) {
        if (count($arr1) != count($arr2)) return false;

        foreach ($arr1 as $key => $v) {
            if (!isset($arr2[$key]) || $arr2[$key] != $v) return false;
        }

        return true;
    }
}

$n = new Solution();
var_dump($n->findAnagrams("baa","aa"));