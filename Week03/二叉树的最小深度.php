<?php
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        // 比较左树和右树的深度
        if ($root == null) return 0;
        if ($root->left == null &&  $root->right == null) return 1;
        $min = 2 << 32;
        if ($root->left) {
            $min = min($this->minDepth($root->left),$min);
        }
        if ($root->right) {
            $min = min($this->minDepth($root->right),$min);
        }

        return $min+1;
    }
}