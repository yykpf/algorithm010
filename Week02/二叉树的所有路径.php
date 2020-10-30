<?php
// 257. 二叉树的所有路径
// 给定一个二叉树，返回所有从根节点到叶子节点的路径。

// 说明: 叶子节点是指没有子节点的节点。

// 示例:

// 输入:

//    1
//  /   \
// 2     3
//  \
//   5

// 输出: ["1->2->5", "1->3"]

// 解释: 所有根节点到叶子节点的路径为: 1->2->5, 1->3


  class TreeNode {
      public $val = null;
      public $left = null;
      public $right = null;
      function __construct($value) { $this->val = $value; }
  }

class Solution {

    private $result = [];
    /**
     * @param TreeNode $root
     * @return String[]
     */
    function binaryTreePaths($root) {
        $this->DFS($root,'');
        return $this->result;
    }

    private function DFS($root,$path) {
        if ($root == null) {
            return;
        }
        $path .= $root->val;
        if ($root->left == null && $root->right == null) {
            $this->result[] = $path;
        } else {
            $path .= '->';
            $this->DFS($root->left,$path);
            $this->DFS($root->right,$path);
        }
    }
}
// $n = new Solution();
// $new = new TreeNode(1);
// $new->left = new TreeNode(12);
// $new->left->right = new TreeNode(15);
// $new->left->left = new TreeNode(15);
// $new->right = new TreeNode(13);
// var_dump($n->binaryTreePaths($new));
