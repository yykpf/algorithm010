<?php
// 222. 完全二叉树的节点个数
// 给出一个完全二叉树，求出该树的节点个数。

// 说明：

// 完全二叉树的定义如下：在完全二叉树中，除了最底层节点可能没填满外，其余每层节点数都达到最大值，并且最下面一层的节点都集中在该层最左边的若干位置。若最底层为第 h 层，则该层包含 1~ 2h 个节点。

// 示例:

// 输入:
//     1
//    / \
//   2   3
//  / \  /
// 4  5 6

// 输出: 6

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
    function countNodes($root) {
        if ($root == null) return 0;
        $queue = new SplQueue();
        $queue->enqueue($root);
        $ans = 0;
        while (!$queue->isEmpty()) {
            $c = $queue->count();
            for ($i=0; $i < $c; $i++) {
                $ans++;
                $node = $queue->dequeue();
                if ($node->left) $queue->enqueue($node->left);
                if ($node->right) $queue->enqueue($node->right);
            }
        }
        return $ans;
    }
}