<?php

// 105. 从前序与中序遍历序列构造二叉树
// 根据一棵树的前序遍历与中序遍历构造二叉树。

// 注意:
// 你可以假设树中没有重复的元素。

// 例如，给出

// 前序遍历 preorder = [3,9,20,15,7]
// 中序遍历 inorder = [9,3,15,20,7]
// 返回如下的二叉树：

//     3
//    / \
//   9  20
//     /  \
//    15   7

 class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Solution {
    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        if ($preorder == null) return null;
        $root = new TreeNode($preorder[0]); //根节点
        $i = 0; //查找中序的根节点的位置
        foreach ($inorder as  $value) {
            if ($value == $preorder[0]) break;
            $i++;
        }
        $root->left = $this->buildTree(array_slice($preorder, 1,$i),array_slice($inorder, 0,$i)); // 分割左节点
        $root->right = $this->buildTree(array_slice($preorder, $i+1),array_slice($inorder, $i+1)); // 分割右节点
        return $root;
    }
}