<?php

// 968. 监控二叉树
// 给定一个二叉树，我们在树的节点上安装摄像头。

// 节点上的每个摄影头都可以监视其父对象、自身及其直接子对象。

// 计算监控树的所有节点所需的最小摄像头数量。

//  

// 示例 1：



// 输入：[0,0,null,0,0]
// 输出：1
// 解释：如图所示，一台摄像头足以监控所有节点。
// 示例 2：



// 输入：[0,0,null,0,null,0,null,null,0]
// 输出：2
// 解释：需要至少两个摄像头来监视树的所有节点。 上图显示了摄像头放置的有效位置之一。

// 提示：

// 给定树的节点数的范围是 [1, 1000]。
// 每个节点的值都是 0。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/binary-tree-cameras
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

// https://leetcode-cn.com/problems/binary-tree-cameras/solution/968-jian-kong-er-cha-shu-di-gui-shang-de-zhuang-ta/

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
    private $result = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minCameraCover($root) {
        if ($this->traversal($root) == 0) {
            $this->result++;
        }

        return $this->result;
    }

    private function traversal($cur) {
        if ($cur == null) return 2; // 空节点 改节点已覆盖

        $left = $this->traversal($cur->left);
        $right = $this->traversal($cur->right);

        // 1、左右节点都有覆盖
        if ($left == 2 && $right == 2) return 0;

        // 2、左右节点有一个没有覆盖
        if ($left == 0 || $right == 0) {
            $this->result++;
            return 1;
        }

        // 3、左右节点有一个有摄像头
        if ($left == 1 || $right == 1) return 2;

        return -1; // 为了健壮性
    }
}