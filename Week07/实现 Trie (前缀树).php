<?php
// 字典树(Trie)
class Trie
{
    private $tree;
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

    // 查找
    function search($word) {
        $n = strlen($word);

        $curNode = $this->tree;
        for ($i = 0; $i < $n; ++$i) {
            $char = $word[$i];
            if (!isset($curNode->subs[$char])) {
                return false;
            }
            $curNode = $curNode->subs[$char];
        }
        return $curNode->isWord;
    }

    // 前缀
    function startsWith($prefix) {
        $n = strlen($prefix);
        $curNode = $this->tree;
        for ($i = 0; $i < $n; ++$i) {
            $char = $prefix[$i];
            if (!isset($curNode->subs[$char])) {
                return false;
            }
            $curNode = $curNode->subs[$char];
        }

        return true;
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

$n = new Trie();
$n->insert("abc");
$n->insert("abd");
$n->insert("abb");
var_dump($n);