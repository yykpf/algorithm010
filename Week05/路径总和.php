<?php

// 112. 路径总和
// 给定一个二叉树和一个目标和，判断该树中是否存在根节点到叶子节点的路径，这条路径上所有节点值相加等于目标和。

// 说明: 叶子节点是指没有子节点的节点。

// 示例:
// 给定如下二叉树，以及目标和 sum = 22，
//               5
//              / \
//             4   8
//            /   / \
//           11  13  4
//          /  \      \
//         7    2      1
// 返回 true, 因为存在目标和为 22 的根节点到叶子节点的路径 5->4->11->2。

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

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    // function hasPathSum($root, $sum) {
    //     if ($root == null) return false;
    //     $queue = new \SplQueue(); // 队列
    //     $queue->enqueue([$root,0]);
    //     while (!$queue->isEmpty()) {
    //         $count = $queue->count();
    //         for ($i=0; $i < $count; $i++) {
    //             $node = $queue->dequeue();
    //             $n = $node[0]->val+$node[1];
    //             if (($n) == $sum && !$node[0]->left && !$node[0]->right) return true;
    //             if ($node[0]->left) $queue->enqueue([$node[0]->left,$n]);
    //             if ($node[0]->right)  $queue->enqueue([$node[0]->right,$n]);
    //         }
    //     }
    //     return false;
    // }

    // 递归
    function hasPathSum($root, $sum) {
        if ($root == null) return false;
        if (!$root->left && !$root->right) return $sum == $root->val;

        return $this->hasPathSum($root->left,$sum-($root->val)) || $this->hasPathSum($root->right,$sum-($root->val));
    }
}