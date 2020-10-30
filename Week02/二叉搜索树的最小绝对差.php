<?php
// 给你一棵所有节点为非负值的二叉搜索树，请你计算树中任意两节点的差的绝对值的最小值。

//  

// 示例：

// 输入：

//    1
//     \
//      3
//     /
//    2

// 输出：
// 1

// 解释：
// 最小绝对差为 1，其中 2 和 1 的差的绝对值为 1（或者 2 和

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/minimum-absolute-difference-in-bst
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
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
    function getMinimumDifference($root) {
        if ($root == null) return [];
        $stack = new \SplStack();
        $curr = $root;
        $prev = PHP_INT_MAX;
        $ans = PHP_INT_MAX;
        while ($curr != null || !$stack->isEmpty()) {
            while ($curr) {
                $stack->push($curr);
                $curr = $curr->left;
            }
            $node = $stack->pop();
            $ans = min($ans,abs($prev - $node->val));
            $prev = $node->val;

            $curr = $node->right;
        }
        return $ans;
    }
}
echo .1 + .2;