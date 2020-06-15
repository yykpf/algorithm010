<?php
// 预习
// 1、有效的字母异位词
// 直接排序然后进行比较
// hashMAP 统计字符的频次
//
// class Solution {
//     /**
//      * @param String $s
//      * @param String $t
//      * @return Boolean
//      */
//     function isAnagram($s, $t) {
//         if (strlen($s) != strlen($t)) return false;
//         return count_chars($s,1) == count_chars($t,1);
//     }
// }
// $n = new Solution();
// echo $n->isAnagram("anagram","nagaram");

// 2、二叉树的中序遍历
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
// class Solution {

    /**
     * 递归实现
     * @param TreeNode $root
     * @return Integer[]
     */
    // function inorderTraversal($root) {
    //     $left = [];
    //     $right = [];
    //     $v = $root->val;
    //     if ($root->left) {
    //         $left = $this->inorderTraversal($root->left);
    //     }
    //     if ($root->right) {
    //         $right = $this->inorderTraversal($root->right);
    //     }
    //     return array_merge($left,[$v],$right);
    // }

    /**
     * 栈实现 深度优先遍历
     * @param TreeNode $root
     * @return Integer[]
     */
    // function inorderTraversal($root) {
//         if (null == $root) return [];
//         $curr  = $root;
//         $res   = [];
//         $stack = [];
//         while ($curr != null || !empty($stack)) {
//             while ($curr != null) {
//                 array_push($stack,$curr);
//                 $curr = $curr->left;
//             }
//             $r = array_pop($stack);
//             $res[] = $r->val;
//             $curr = $r->right;
//         }
//         return $res;
//     }
// }

// 3、最小的k个数
// class Solution {

//     /**
//      * @param Integer[] $arr
//      * @param Integer $k
//      * @return Integer[]
//      */
//     function getLeastNumbers($arr, $k) {
//         if (count($arr) < $k) return false;
//         sort($arr);
//         return array_slice($arr, 0,$k-1);
//     }
// }

// 最长公共前缀
// 编写一个函数来查找字符串数组中的最长公共前缀。
// class Solution {
//     /**
//      * @param String[] $strs
//      * @return String
//      */
//     function longestCommonPrefix($strs) {
//         $count = count($strs);
//         if ($count < 1) return '';
//         if ($count == 1) return $strs[0];
//         $start = $strs[0];
//         $len = strlen($start);
//         $i = 0;
//         while ($i < $len) {
//             for ($j=1; $j < $count; $j++) {
//                 if ($start[$i] != $strs[$j][$i]) {
//                     return substr($start, 0,$i);
//                 }
//             }
//             $i++;
//         }
//         return $start;
//     }
// }
// $n = new Solution();
// echo $n->longestCommonPrefix(["flower","flow","flight"]);

// 字母异位词分组 https://leetcode-cn.com/problems/group-anagrams/
class Solution {
    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        // 算术基本定理可表述为：任何一个大于1的自然数 N,如果N不为质数，那么N可以唯一分解成有限个质数的乘积N=P1a1P2a2P3a3......Pnan，这里P1<P2<P3......<Pn均为质数，其中指数ai是正整数
        if (count($strs) <= 1)  return [$strs];
        $hash = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];
        $ret = [];
        foreach ($strs as $value) {
            $strlen = 1;
            for ($i=0; $i < strlen($value); $i++) {
                $strlen *= $hash[ord($value[$i])-97];
            }
            $ret[$strlen][] = $value;
        }
        return array_values($ret);
    }
}
$n = new Solution();
var_dump($n->groupAnagrams([""]));