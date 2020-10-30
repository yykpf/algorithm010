<?php
// 662. 二叉树最大宽度
// 给定一个二叉树，编写一个函数来获取这个树的最大宽度。树的宽度是所有层中的最大宽度。这个二叉树与满二叉树（full binary tree）结构相同，但一些节点为空。

// 每一层的宽度被定义为两个端点（该层最左和最右的非空节点，两端点间的null节点也计入长度）之间的长度。

// 示例 1:

// 输入:

//            1
//          /   \
//         3     2
//        / \     \
//       5   3     9

// 输出: 4
// 解释: 最大值出现在树的第 3 层，宽度为 4 (5,3,null,9)。
// 示例 2:

// 输入:

//           1
//          /
//         3
//        / \
//       5   3

// 输出: 2
// 解释: 最大值出现在树的第 3 层，宽度为 2 (5,3)。
// 示例 3:

// 输入:

//           1
//          / \
//         3   2
//        /
//       5

// 输出: 2
// 解释: 最大值出现在树的第 2 层，宽度为 2 (3,2)。
// 示例 4:

// 输入:

//           1
//          / \
//         3   2
//        /     \
//       5       9
//      /         \
//     6           7
// 输出: 8
// 解释: 最大值出现在树的第 4 层，宽度为 8 (6,null,null,null,null,null,null,7)。

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

class AnnotatedNode {
    public $node = null;  // 当前节点
    public $depth; // 当前节点深度
    public $pos;   // 当前节点位置
    public function __construct($n,$d,$p) {
        $this->node  = $n;
        $this->depth = $d;
        $this->pos   = $p;
    }
}

// 在php中大数的传递可以先转成 string，在用bc系列函数计算
class Solution {
    public function widthOfBinaryTree($root) {
        $queue = new SplQueue();
        $queue->enqueue(new AnnotatedNode($root, 0, 0));
        $curDepth = 0;
        $left = 0;
        $ans = 0;
        while (!$queue->isEmpty()) {
            $a = $queue->dequeue();
            if ($a->node != null) {
                $queue->enqueue(new AnnotatedNode($a->node->left, $a->depth+1, (string)(bcmul($a->pos,2))));
                $queue->enqueue(new AnnotatedNode($a->node->right, $a->depth+1, (string)(bcadd(bcmul($a->pos,2),1))));
                if ($curDepth != $a->depth) { // 记录最左节点
                    $curDepth = $a->depth;
                    $left = $a->pos;
                }
                $ans = max($ans, bcadd(bcsub($a->pos,$left),1));
            }
        }
        return $ans;
    }
}