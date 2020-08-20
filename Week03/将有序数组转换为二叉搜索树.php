<?php
// 108. 将有序数组转换为二叉搜索树
// 将一个按照升序排列的有序数组，转换为一棵高度平衡二叉搜索树。

// 本题中，一个高度平衡二叉树是指一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过 1。

// 示例:

// 给定有序数组: [-10,-3,0,5,9],

// 一个可能的答案是：[0,-3,9,-10,null,5]，它可以表示下面这个高度平衡二叉搜索树：

//       0
//      / \
//    -3   9
//    /   /
//  -10  5

class Solution {
    public $globalNums;
    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        $this->globalNums = $nums;
        $length = count($nums);
        return $this->buildTree(0, $length-1);
    }

    // 分治调用
    public function buildTree($left, $right) {
        if ($left > $right) {
            return null;
        }
        $mid = floor(($left + $right + 1) / 2); // 根节点

        $root = new TreeNode();
        $root->left = $this->buildTree($left, $mid - 1);
        $root->val = $this->globalNums[$mid];
        $root->right = $this->buildTree($mid + 1, $right);

        return $root;
    }
}

$n = new Solution();

$list = [0,2];
var_dump($n->sortedArrayToBST($list));

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}