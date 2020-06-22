<?php
class Solution {
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        if ($root == null || $root == $p || $root == $q) return $root;
        $left = $this->lowestCommonAncestor($root->left,$p, $q);
        $right = $this->lowestCommonAncestor($root->right,$p, $q);
        if (empty($left)) {
            return $right;
        } elseif(empty($right)) {
            return $left;
        } elseif ($left && $right) {
            return $root;
        }
        return null;
    }
}