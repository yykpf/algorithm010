<?php
// 501. 二叉搜索树中的众数
// 给定一个有相同值的二叉搜索树（BST），找出 BST 中的所有众数（出现频率最高的元素）。

// 假定 BST 有如下定义：

// 结点左子树中所含结点的值小于等于当前结点的值
// 结点右子树中所含结点的值大于等于当前结点的值
// 左子树和右子树都是二叉搜索树
// 例如：
// 给定 BST [1,null,2,2],

//    1
//     \
//      2
//     /
//    2
// 返回[2].

// 提示：如果众数超过1个，不需考虑输出顺序

// 进阶：你可以不使用额外的空间吗？（假设由递归产生的隐式调用栈的开销不被计算在内）

// https://leetcode-cn.com/problems/find-mode-in-binary-search-tree/solution/501-er-cha-sou-suo-shu-zhong-de-zhong-shu-bao-li-t/
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    private $count = $maxCount = 0;
    private $answer = [];
    private $pre = null;
    public function findMode($root) {
        $this->searchBST($root);

        return $this->answer;
    }

    private function searchBST($cur) {
        if ($cur == null) return;
        $this->searchBST($cur->left); // 左
        // 中
        if ($this->pre == null) { // 第一个节点
            $this->count = 1;
        } elseif($this->pre->val == $cur->val) {
            $this->count++;
        } else {
            $this->count = 1;
        }

        $this->pre = $cur;

        if ($this->count == $this->maxCount) {
            $this->answer[] = $cur->val;
        }

        if ($this->count > $this->maxCount) {
            $this->maxCount = $this->count;
            $this->answer = [];
            $this->answer[] = $cur->val;
        }

        $this->searchBST($cur->right); // 右

        return;
    }

}