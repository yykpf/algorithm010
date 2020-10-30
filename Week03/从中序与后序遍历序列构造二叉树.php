<?php
// 106. 从中序与后序遍历序列构造二叉树
// 根据一棵树的中序遍历与后序遍历构造二叉树。

// 注意:
// 你可以假设树中没有重复的元素。

// 例如，给出

// 中序遍历 inorder = [9,3,15,20,7]
// 后序遍历 postorder = [9,15,7,20,3]
// 返回如下的二叉树：

//     3
//    / \
//   9  20
//     /  \
//    15   7

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
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        if ($postorder == null) return null;
        $root = new TreeNode($postorder[count($postorder)-1]); // 根节点
        $i = 0;
        foreach ($inorder as  $value) {
            if ($value == $postorder[count($postorder)-1]) break;
            $i++;
        }
        $root->left = $this->buildTree(array_slice($inorder, 0,$i),array_slice($postorder, 0,$i));
        $root->right = $this->buildTree(array_slice($inorder, $i+1),array_slice($postorder, $i,count($postorder)-1-$i));

        return $root;
    }
}
