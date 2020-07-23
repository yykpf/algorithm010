<?php

// 433. 最小基因变化
// 一条基因序列由一个带有8个字符的字符串表示，其中每个字符都属于 "A", "C", "G", "T"中的任意一个。

// 假设我们要调查一个基因序列的变化。一次基因变化意味着这个基因序列中的一个字符发生了变化。

// 例如，基因序列由"AACCGGTT" 变化至 "AACCGGTA" 即发生了一次基因变化。

// 与此同时，每一次基因变化的结果，都需要是一个合法的基因串，即该结果属于一个基因库。

// 现在给定3个参数 — start, end, bank，分别代表起始基因序列，目标基因序列及基因库，请找出能够使起始基因序列变化为目标基因序列所需的最少变化次数。如果无法实现目标变化，请返回 -1。

// 注意:

// 起始基因序列默认是合法的，但是它并不一定会出现在基因库中。
// 所有的目标基因序列必须是合法的。
// 假定起始基因序列与目标基因序列是不一样的。
// 示例 1:

// start: "AACCGGTT"
// end:   "AACCGGTA"
// bank: ["AACCGGTA"]

// 返回值: 1
// 示例 2:

// start: "AACCGGTT"
// end:   "AAACGGTA"
// bank: ["AACCGGTA", "AACCGCTA", "AAACGGTA"]

// 返回值: 2
// 示例 3:

// start: "AAAAACCC"
// end:   "AACCCCCC"
// bank: ["AAAACCCC", "AAACCCCC", "AACCCCCC"]

// 返回值: 3


class Solution {

    /**
     *  双向广度优先
     * @param String $start
     * @param String $end
     * @param String[] $bank
     * @return Integer
     */
    function minMutation($start, $end, $bank) {
        if ($start == $end) return 1;

        $hashBank = array_flip($bank);
        if (!isset($hashBank[$end])) return -1;
        unset($hashBank[$start]);

        $beginVisited[$start] = true;  // 需要从开始和结尾开始进行遍历
        $endVisited[$end] = true;
        $visited = [];

        $step = 0; // 默认1步
        $wordLen = strlen($start);

        $chars = ['A', 'C', 'G', 'T'];

        while (!empty($beginVisited) && !empty($endVisited)) {
            if (count($beginVisited) > count($endVisited)) {
                list($beginVisited,$endVisited) = [$endVisited,$beginVisited]; // 数组交换
            }
            $nextLevelVisited = [];
            foreach ($beginVisited as $node => $value) {
                for ($i=0; $i < $wordLen; $i++) {
                    $old = $node[$i];
                    foreach ($chars as $char) {
                        $node[$i] = $char;
                        if (isset($hashBank[$node])) {
                            if (isset($endVisited[$node])) return $step+1;
                            if (empty($visited[$node])) {
                                $nextLevelVisited[$node] = true;
                                $visited[$node] = true;
                            }
                        }
                    }
                    $node[$i] = $old;
                }
            }
            $beginVisited = $nextLevelVisited;
            $step++;
        }
        return -1;
    }
}

$start = "AAAACCCC";
$end   = "CCCCCCCC";
$bank  = ["AAAACCCA","AAACCCCA","AACCCCCA","AACCCCCC","ACCCCCCC","CCCCCCCC","AAACCCCC","AACCCCCC"];

$n = new Solution();
echo $n->minMutation($start,$end,$bank);