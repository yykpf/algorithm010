<?php
// 剑指 Offer 32 - III. 从上到下打印二叉树 III
// 请实现一个函数按照之字形顺序打印二叉树，即第一行按照从左到右的顺序打印，第二层按照从右到左的顺序打印，第三行再按照从左到右的顺序打印，其他行以此类推。

// 例如:
// 给定二叉树: [3,9,20,null,null,15,7],

//     3
//    / \
//   9  20
//     /  \
//    15   7
// 返回其层次遍历结果：

// [
//   [3],
//   [20,9],
//   [15,7]
// ]


// 提示：

// 节点总数 <= 1000
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
     * @return Integer[][]
     */
    function levelOrder($root) {
        if ($root == null) return [];
        $queue = new \SplQueue();
        $queue->enqueue($root);
        $ret = [];
        $odd = 1;
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            $tmp = [];
            for ($i=0; $i < $count; $i++) {
                $node = $queue->dequeue();
                $tmp[] = $node->val;
                if ($node->left) $queue->enqueue($node->left);
                if ($node->right) $queue->enqueue($node->right);
            }
            if (($odd&1) == 0) {
                $tmp = array_reverse($tmp);
            }
            $ret[] = $tmp;
            $odd++;
        }
        return $ret;

    }
}
