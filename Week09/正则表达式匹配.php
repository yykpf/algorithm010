<?php

// 10. 正则表达式匹配
// 给你一个字符串 s 和一个字符规律 p，请你来实现一个支持 '.' 和 '*' 的正则表达式匹配。

// '.' 匹配任意单个字符
// '*' 匹配零个或多个前面的那一个元素
// 所谓匹配，是要涵盖 整个 字符串 s的，而不是部分字符串。

// 说明:

// s 可能为空，且只包含从 a-z 的小写字母。
// p 可能为空，且只包含从 a-z 的小写字母，以及字符 . 和 *。
// 示例 1:

// 输入:
// s = "aa"
// p = "a"
// 输出: false
// 解释: "a" 无法匹配 "aa" 整个字符串。
// 示例 2:

// 输入:
// s = "aa"
// p = "a*"
// 输出: true
// 解释: 因为 '*' 代表可以匹配零个或多个前面的那一个元素, 在这里前面的元素就是 'a'。因此，字符串 "aa" 可被视为 'a' 重复了一次。
// 示例 3:

// 输入:
// s = "ab"
// p = ".*"
// 输出: true
// 解释: ".*" 表示可匹配零个或多个（'*'）任意字符（'.'）。
// 示例 4:

// 输入:
// s = "aab"
// p = "c*a*b"
// 输出: true
// 解释: 因为 '*' 表示零个或多个，这里 'c' 为 0 个, 'a' 被重复一次。因此可以匹配字符串 "aab"。
// 示例 5:

// 输入:
// s = "mississippi"
// p = "mis*is*p*."
// 输出: false

class Solution {

    public $memo = [];
    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
        return $this->dp($s,0,$p,0);
    }

    /* 计算 p[j..] 是否匹配 s[i..] */
    private function dp($s, $i, $p, $j) {
        $m = strlen($s); $n = strlen($p);
        // base case
        if ($j == $n) return $i == $m;
        if ($i == $m) {
            // 当 s 结束之后 ，p 后面的数量必须还是正对出现
            if (($n - $j) % 2 == 1) {
                return false;
            }
            while ($j + 1 < $n) {
                if ($p[$j + 1] != '*') {
                    return false;
                }
                $j += 2;
            }
            return true;
        }

        // 记录状态 (i, j)，消除重叠子问题
        $key = (string)$i.",".(string)$j;
        if (isset($this->memo[$key])) return $this->memo[$key];

        $res = false;

        if ($s[$i] == $p[$j] || $p[$j] == '.') {
            if ($j < $n - 1 && $p[$j + 1] == '*') {
                $res = $this->dp($s, $i, $p, $j + 2)
                   || $this->dp($s, $i + 1, $p, $j);
            } else {
                $res = $this->dp($s, $i + 1, $p, $j + 1);
            }
        } else {
            if ($j < $n - 1 && $p[$j + 1] == '*') {
                $res = $this->dp($s, $i, $p, $j + 2);
            } else {
                $res = false;
            }
        }
        // 将当前结果记入备忘录
        $this->memo[$key] = $res;

        return $res;
    }

}

$n = new Solution();
echo $n->isMatch("abc","b*abc");

