<?php
// 双向BFS
class Solution {
    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        if ($beginWord == $endWord) return 1;

        $hashList = array_flip($wordList);
        if (!isset($hashList[$endWord])) return 0;
        unset($hashList[$beginWord]);

        $beginVisited[$beginWord] = true;  // 需要从开始和结尾开始进行遍历
        $endVisited[$endWord] = true;
        $visited = [];

        $step = 1; // 默认1步
        $wordLen = strlen($beginWord);

        while (!empty($beginVisited) && !empty($endVisited)) {
            if (count($beginVisited) > count($endVisited)) {
                list($beginVisited,$endVisited) = [$endVisited,$beginVisited]; // 数组交换
            }
            $nextLevelVisited = [];
            foreach ($beginVisited as $word => $value) {
                for ($i=0; $i < $wordLen; $i++) {
                    $old = $word[$i];
                    for ($k=97; $k <= 122; $k++) {
                        if ($old == chr($k)) continue;
                        $word[$i] = chr($k);
                        if (isset($hashList[$word])) {
                            if (isset($endVisited[$word])) return $step+1;
                            if (empty($visited[$word])) {
                                $nextLevelVisited[$word] = true;
                                $visited[$word] = true;
                            }
                        }
                    }
                    $word[$i] = $old;
                }
            }
            $beginVisited = $nextLevelVisited;
            $step++;
        }
        return 0;
    }
}
$n = new Solution();
echo $n->ladderLength("hit","cog",
["hot","dot","dog","lot","log","cog"]);