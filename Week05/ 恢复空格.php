<?php

// 面试题 17.13. 恢复空格
// 哦，不！你不小心把一个长篇文章中的空格、标点都删掉了，并且大写也弄成了小写。像句子"I reset the computer. It still didn’t boot!"已经变成了"iresetthecomputeritstilldidntboot"。在处理标点符号和大小写之前，你得先把它断成词语。当然了，你有一本厚厚的词典dictionary，不过，有些词没在词典里。假设文章用sentence表示，设计一个算法，把文章断开，要求未识别的字符最少，返回未识别的字符数。

// 注意：本题相对原题稍作改动，只需返回未识别的字符数
// 示例：

// 输入：
// dictionary = ["looked","just","like","her","brother"]
// sentence = "jesslookedjustliketimherbrother"
// 输出： 7
// 解释： 断句后为"jess looked just like tim her brother"，共7个未识别字符。
// 提示：

// 0 <= len(sentence) <= 1000
// dictionary中总字符数不超过 150000。
// 你可以认为dictionary和sentence中只包含小写字母。

class Solution {
    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return Integer
     */
    function respace($dictionary, $sentence) {
        // 动态规划
        $sentenceHash = array_flip($dictionary);
        $n = strlen($sentence);
        $dp = array_fill(0, $n+1, 0); // 填充数组
        for ($i=1; $i <= $n; $i++) { // 第一层循环控制次数和方向
            $dp[$i] = $dp[$i-1]+1;
            for ($j=0; $j < $i; $j++) { // 第二层循环查找最小值
                if (isset($sentenceHash[substr($sentence, $j,$i-$j)])) {
                    $dp[$i] = min($dp[$i],$dp[$j]);
                }
            }
        }
        return $dp[$n];
    }
}

// $dictionary = ["potimzz"];
// $sentence = "potimzzpotimzz";
$dictionary = ["abcd","abc","f"];
$sentence ="abcdef";
// $dictionary = ["looked","just","like","her","brother"];
// $sentence = "jesslookedjustliketimherbrother";
$n = new Solution();
echo $n->respace($dictionary,$sentence);