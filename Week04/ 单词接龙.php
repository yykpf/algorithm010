<?php
// 27. 单词接龙
// 给定两个单词（beginWord 和 endWord）和一个字典，找到从 beginWord 到 endWord 的最短转换序列的长度。转换需遵循如下规则：

// 每次转换只能改变一个字母。
// 转换过程中的中间单词必须是字典中的单词。
// 说明:

// 如果不存在这样的转换序列，返回 0。
// 所有单词具有相同的长度。
// 所有单词只由小写字母组成。
// 字典中不存在重复的单词。
// 你可以假设 beginWord 和 endWord 是非空的，且二者不相同。
// 示例 1:

// 输入:
// beginWord = "hit",
// endWord = "cog",
// wordList = ["hot","dot","dog","lot","log","cog"]

// 输出: 5

// 解释: 一个最短转换序列是 "hit" -> "hot" -> "dot" -> "dog" -> "cog",
//      返回它的长度 5。
// 示例 2:

// 输入:
// beginWord = "hit"
// endWord = "cog"
// wordList = ["hot","dot","dog","lot","log"]

// 输出: 0

// 解释: endWord "cog" 不在字典中，所以无法进行转换。

// //  广度优先
// class Solution {
//     /**
//      * @param String $beginWord
//      * @param String $endWord
//      * @param String[] $wordList
//      * @return Integer
//      */
//     function ladderLength($beginWord, $endWord, $wordList) {
//         if ($beginWord == $endWord) return 1;
//         $hashList = array_flip($wordList);
//         if (!isset($hashList[$endWord])) return 0; //不存在
//         unset($hashList[$beginWord]);
//         $letters = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
//         $visited[$beginWord] = true;
//         $level = 1; // 默认1次
//         $queue = new \SplQueue;
//         $queue->enqueue($beginWord);
//         $wordLen = strlen($beginWord);
//         while (!$queue->isEmpty()) {
//             $count = $queue->count();
//             for ($i=0; $i < $count; $i++) {
//                 $word = $queue->dequeue();
//                 if ($word == $endWord) return $level;
//                 // 修改每一个字符
//                 for ($j=0; $j < $wordLen; $j++) {
//                     // 一轮以后应该重置，否则结果不正确
//                     $old = $word[$j];
//                     foreach ($letters as  $value) {
//                         if ($old == $value) continue;
//                         $word[$j] = $value;
//                         if (isset($hashList[$word])) {
//                             if ($word == $endWord) return $level+1;
//                             if (empty($visited[$word])) {
//                                 $queue->enqueue($word);
//                                 $visited[$word] = true;
//                             }
//                         }
//                     }
//                     $word[$j] = $old;
//                 }

//             }
//             $level++;
//         }
//         return 0;
//     }
// }
//  双向广度优先
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
        if (!isset($hashList[$endWord])) return 0; //不存在
        unset($hashList[$beginWord]);

        $beginVisited[$beginWord] = true;  // 需要从开始和结尾开始进行遍历
        $endVisited[$endWord] = true;
        $visited = [];

        $step = 1; // 默认1步
        $wordLen = strlen($beginWord);

        while (!empty($beginVisited) && !empty($endVisited)) {
            // 查找较小的数组，这样可以省去一些遍历时间
            if (count($beginVisited) > count($endVisited)) {
                list($beginVisited,$endVisited) = [$endVisited,$beginVisited]; // 数组交换
            }
            // nextLevelVisited 在扩散完成以后，会成为新的 beginVisited
            $nextLevelVisited = [];
            foreach ($beginVisited as $word=>$value) {
                if ($word == $endWord) return $level;
                // 修改每一个字符
                for ($j=0; $j < $wordLen; $j++) {
                    // 一轮以后应该重置，否则结果不正确
                    $old = $word[$j];
                    for ($k=97; $k <= 122; $k++) {
                        if ($old == chr($k)) continue;
                        $word[$j] = chr($k);
                        if (isset($hashList[$word])) {
                            if (isset($endVisited[$word])) return $step+1;
                            if (empty($visited[$word])) {
                                $nextLevelVisited[$word] = true;
                                $visited[$word] = true;
                            }
                        }
                    }
                    $word[$j] = $old;
                }
            }
            $beginVisited = $nextLevelVisited;
            $step++;
        }
        return 0;
    }
}
$n = new Solution();
echo $n->ladderLength("ymain","oecij",["ymann","yycrj","oecij","ymcnj","yzcrj","yycij","xecij","yecij","ymanj","yzcnj","ymain"]);