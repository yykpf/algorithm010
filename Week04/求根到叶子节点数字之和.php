<?php
// 129. 求根到叶子节点数字之和
// 给定一个二叉树，它的每个结点都存放一个 0-9 的数字，每条从根到叶子节点的路径都代表一个数字。

// 例如，从根到叶子节点路径 1->2->3 代表数字 123。

// 计算从根到叶子节点生成的所有数字之和。

// 说明: 叶子节点是指没有子节点的节点。

// 示例 1:

// 输入: [1,2,3]
//     1
//    / \
//   2   3
// 输出: 25
// 解释:
// 从根到叶子节点路径 1->2 代表数字 12.
// 从根到叶子节点路径 1->3 代表数字 13.
// 因此，数字总和 = 12 + 13 = 25.
// 示例 2:

// 输入: [4,9,0,5,1]
//     4
//    / \
//   9   0
//  / \
// 5   1
// 输出: 1026
// 解释:
// 从根到叶子节点路径 4->9->5 代表数字 495.
// 从根到叶子节点路径 4->9->1 代表数字 491.
// 从根到叶子节点路径 4->0 代表数字 40.
// 因此，数字总和 = 495 + 491 + 40 = 1026.
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
     * @return Integer
     */
    function sumNumbers($root) {
        $num = 0;
        if ($root == null) return $num;
        $queue = new \SplQueue();
        $queue->enqueue([$root,$root->val]);
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            for($i=0;$i<$count;$i++) {
                $node  = $queue->dequeue();
                if (!$node[0]->left && !$node[0]->right) {
                    $num+=$node[1];
                } elseif($node[0]->left && $node[0]->right) {
                    $queue->enqueue([$node[0]->left,$node[1].$node[0]->left->val]);
                    $queue->enqueue([$node[0]->right,$node[1].$node[0]->right->val]);
                }elseif($node[0]->left) {
                    $queue->enqueue([$node[0]->left,$node[1].$node[0]->left->val]);
                }elseif($node[0]->right) {
                    $queue->enqueue([$node[0]->right,$node[1].$node[0]->right->val]);
                }
            }
        }
        return $num;
    }
}