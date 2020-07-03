<?php
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
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            $tmp = [];
            for ($i=0; $i < $count; $i++) {
                $node = $queue->dequeue();
                $tmp[] = $node->val;
                if ($node->left) $queue->enqueue($node->left);
                if ($node->right) $queue->enqueue($node->right);
            }
            $ret[] = $tmp;
        }
        return $ret;
    }
}