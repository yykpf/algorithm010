<?php

// 109. 有序链表转换二叉搜索树
// 给定一个单链表，其中的元素按升序排序，将其转换为高度平衡的二叉搜索树。

// 本题中，一个高度平衡二叉树是指一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过 1。

// 示例:

// 给定的有序链表： [-10, -3, 0, 5, 9],

// 一个可能的答案是：[0, -3, 9, -10, null, 5], 它可以表示下面这个高度平衡二叉搜索树：

//       0
//      / \
//    -3   9
//    /   /
//  -10  5

class Solution {
    public $globalHead;

    // 入口
    public function sortedListToBST($head) {
        $this->globalHead = $head;
        $length = $this->getLength($head);
        return $this->buildTree(0, $length-1);
    }

    // 获取总长度
    public function getLength($head) {
        $ret = 0;
        while ($head != null) {
            ++$ret;
            $head = $head->next;
        }
        return $ret;
    }

    // 分治调用
    public function buildTree($left, $right) {
        if ($left > $right) {
            return null;
        }
        $mid = floor(($left + $right + 1) / 2); // 根节点

        $root = new TreeNode();
        $root->left = $this->buildTree($left, $mid - 1);

        $root->val = $this->globalHead->val;
        $this->globalHead = $this->globalHead->next;

        $root->right = $this->buildTree($mid + 1, $right);

        return $root;
    }
}
$n = new Solution();

$list = new ListNode(-10,new ListNode(-3,new ListNode(0,new ListNode(5,new ListNode(9)))));
var_dump($n->sortedListToBST($list));
  class ListNode {
      public $val = 0;
      public $next = null;
      function __construct($val = 0, $next = null) {
          $this->val = $val;
          $this->next = $next;
      }
  }

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
