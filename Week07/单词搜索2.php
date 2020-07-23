<?php
// 字典树(Trie)
// 给定一个二维网格 board 和一个字典中的单词列表 words，找出所有同时在二维网格和字典中出现的单词。

// 单词必须按照字母顺序，通过相邻的单元格内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。同一个单元格内的字母在一个单词中不允许被重复使用。

// 示例:

// 输入:
// words = ["oath","pea","eat","rain"] and board =
// [
//   ['o','a','a','n'],
//   ['e','t','a','e'],
//   ['i','h','k','r'],
//   ['i','f','l','v']
// ]

// 输出: ["eat","oath"]
// 说明:
// 你可以假设所有输入都由小写字母 a-z 组成。

// 提示:

// 你需要优化回溯算法以通过更大数据量的测试。你能否早点停止回溯？
// 如果当前单词不存在于所有单词的前缀中，则可以立即停止回溯。什么样的数据结构可以有效地执行这样的操作？散列表是否可行？为什么？ 前缀树如何？如果你想学习如何实现一个基本的前缀树，请先查看这个问题： 实现Trie（前缀树）。
class Trie
{
    public $tree;
    function __construct(){
        $this->tree = new TrieNode(null);
    }

    // 插入
    function insert($word) {
        $n = strlen($word);
        if ($n == 0) return;
        $curNode = $this->tree;
        for ($i = 0; $i < $n; ++$i) {
            $char = $word[$i];
            if (!isset($curNode->subs[$char])) {
                $curNode->subs[$char] = new TrieNode($char);
            }
            $curNode = $curNode->subs[$char];
        }

        $curNode->isWord = true;
    }
}

class TrieNode
{
    public $val;
    public $subs;
    public $isWord;
    public function __construct($val = null)
    {
        $this->val = $val;
        $this->subs = [];
        $this->isWord = false;
    }
}

class Solution {

    public $dx = [0,0,-1,1]; // 上下左右
    public $dy = [-1,1,0,0];
    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    public function findWords($board, $words) {
        // 1、遍历 words，去board里面查找 时间复杂度 O(N*m*m*4^k)
        // 2、使用 Trie, 首先构建根据 words构建prefix，其次在board中使用DFS进行前缀查找
        // 构建 Trie 时间复杂度 O(N*k)
        $trie = new Trie();
        foreach ($words as $word) {
            $trie->insert($word);
        }
        $tree = json_decode(json_encode($trie),TRUE);
        // 循环查找 O(N)
        $self = [];
        foreach ($board as $x => $line) {
            foreach ($line as $y => $v) {
                $this->DFS($self,$board,$x,$y,'',$tree['tree']['subs']);
            }
        }
        return $self;
    }

    // 深度优先遍历
    public function DFS(&$self,$board,$x,$y,$cutWord,$curDict) {
        $cutWord .= $board[$x][$y];
        $curDict = isset($curDict[$board[$x][$y]])?$curDict[$board[$x][$y]]:[];
        if (!empty($curDict['isWord'])) {
            if (!in_array($cutWord,$self)) $self[] = $cutWord;
        }
        $tmp = $board[$x][$y];
        $board[$x][$y] = '@'; // 防止重复
        for ($i=0; $i < count($this->dx); $i++) {
            $x1 = $this->dx[$i]+$x;
            $y1 = $this->dy[$i]+$y;
            if ($x1 >= 0 && $x1 < count($board) && $y1 >= 0 && $y1 < count($board[0]) && $board[$x1][$y1] != '@' && isset($curDict['subs'][$board[$x1][$y1]])) {
                $this->DFS($self,$board,$x1,$y1,$cutWord,$curDict['subs']);
            }
        }
        $board[$x][$y] = $tmp;
    }
}

$board = [
  ["a","a"]
];
$n = new Solution();
var_dump($n->findWords($board,['a']));