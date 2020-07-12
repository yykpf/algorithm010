<?php
// 预习
// 1、有效的字母异位词 https://leetcode-cn.com/problems/valid-anagram/description/
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

// 2、二叉树的中序遍历 https://leetcode-cn.com/problems/binary-tree-inorder-traversal/submissions/
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
    //     if ($root == null) return [];
    //     $stack = new \SplStack();
    //     $curr = $root;
    //     $ret = [];
    //     while ($curr != null || !$stack->isEmpty()) {
    //         while ($curr != null) {
    //             $stack->push($curr);
    //             $curr = $curr->left;
    //         }
    //         $node = $stack->pop();
    //         $ret[] = $node->val;
    //         $curr = $node->right;
    //     }
    //     return $ret;
    // }
// }

//  二叉树的前序遍历 https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
// class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    // function preorderTraversal($root) {
    //     if ($root == null) return [];
    //     $r = $root->val;
    //     $left = [];
    //     $right = [];
    //     if ($root->left) $left = $this->preorderTraversal($root->left);
    //     if ($root->right) $right = $this->preorderTraversal($root->right);
    //     return array_merge([$r],$left,$right);
    // }
    //  迭代实现 根、左、右
//     function preorderTraversal($root) {
//         if ($root == null) return [];
//         $stack = new \SplStack();
//         $stack->push($root);
//         $ret = [];
//         while (!$stack->isEmpty()) {
//             $node = $stack->pop();
//             $ret[] = $node->val;
//             if ($node->right) $stack->push($node->right);
//             if ($node->left) $stack->push($node->left);
//         }
//         return $ret;
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

// 两数之和 https://leetcode-cn.com/problems/two-sum/description/
// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @param Integer $target
//      * @return Integer[]
//      */
//     function twoSum($nums,$target)
//     {
//         if (count($nums) <=1) return [];
//         $flipNums = array_flip($nums);
//         for($i=0;$i<count($nums);$i++) {
//             $diff = $target-$nums[$i];
//             if (isset($flipNums[$diff]) && $flipNums[$diff] != $i) {
//                 return [$i,$flipNums[$diff]];
//             }
//         }
//         return [];
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
// class Solution {
//     /**
//      * @param String[] $strs
//      * @return String[][]
//      */
//     function groupAnagrams($strs) {
//         // 算术基本定理可表述为：任何一个大于1的自然数 N,如果N不为质数，那么N可以唯一分解成有限个质数的乘积N=P1a1P2a2P3a3......Pnan，这里P1<P2<P3......<Pn均为质数，其中指数ai是正整数
//         if (count($strs) <= 1)  return [$strs];
//         $hash = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];
//         $ret = [];
//         foreach ($strs as $value) {
//             $strlen = 1;
//             for ($i=0; $i < strlen($value); $i++) {
//                 $strlen *= $hash[ord($value[$i])-97];
//             }
//             $ret[$strlen][] = $value;
//         }
//         return array_values($ret);
//     }
// }
// $n = new Solution();
// var_dump($n->groupAnagrams([""]));


// 验证二叉搜索树
// class Solution {

//     /**
//      * @param TreeNode $root
//      * @return Boolean
//      */
//     function isValidBST($root) {
//         $this->help($root,-2 << 32,2 << 32);
//     }
//     function help($root,$min,$max) {
//         if ($root == null) return true;
//         if ($root->val <= $min || $root->val >= $max) return false;
//         return $this->help($root->left,$min,$root->val) && $this->help($root->right,$root->val,$max);
//     }
// }

// N叉树的最大深度
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer
//      */
//     function maxDepth($root) {
//         if ($root == null) {
//             return 0;
//         } elseif(empty($root->children)) {
//             return 1;
//         }else {
//             $res = 0;
//             for($i=0;$i<count($root->children);$i++) {
//                 $temp = $this->maxDepth($root->children[$i]);
//                 $res = max($temp,$res);
//             }
//             return $res;
//         }
//     }
// }

// N叉树的后序遍历 https://leetcode-cn.com/problems/n-ary-tree-postorder-traversal/
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer[]
//      */
//     function postorder($root) {
//         $res = [];
//         $this->post($root,$res)
//         $res[] = $root->val;
//         return $res;
//     }
//     function post($root,&$res) {
//         if ($root == null) return $res;
//         for($i=count($root->children)-1;$i>=0;--$i) {
//             $res = $this->post($root->children[$i],$res);
//             $res[] = $root->children[$i]->val;
//         }
//     }
// }

// N叉树的前序遍历 https://leetcode-cn.com/problems/n-ary-tree-preorder-traversal/description/
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer[]
//      */
//     function preorder($root) {
//         $res = [];
//         $this->pre($root,$res);
//         return $res;
//     }
//     function pre($root,&$res) {
//         if ($root == null) return;
//         $res[] = $root->val;
//         for($i=0;$i<=count($root->children)-1;$i++) {
//             $this->pre($root->children[$i],$res);
//         }
//     }

// }

// N叉树的前序遍历
// class Solution {
//     function preorder($root) {
//         if ($root == null) return [];
//         $stack = new \SplStack();
//         $stack->push($root);
//         $ret = [];
//         while (!$stack->isEmpty()) {
//             $node = $stack->pop();
//             $ret[] = $node->val;
//             for ($i=count($node->children)-1; $i >=0 ; $i--) {
//                 $stack->push($node->children[$i]);
//             }
//         }
//         return $ret;
//     }
// }
// N叉树的层序遍历 https://leetcode-cn.com/problems/n-ary-tree-level-order-traversal/
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer[][]
//      * 迭代实现
//      * 一层一层入队
//      */
//     function levelOrder($root) {
//         if ($root == null) return [];
//         $queue = new \SplQueue();
//         $queue->enqueue($root);
//         $ret = [];
//         while (!$queue->isEmpty()) {
//             $num = [];
//             $count = $queue->count();
//             for ($i=0; $i < $count; $i++) {
//                 $node = $queue->dequeue();
//                 $num[] = $node->val;
//                 foreach ($node->children as  $children) {
//                     $queue->enqueue($children);
//                 }
//             }
//             $ret[] = $num;
//         }
//         return $ret;
//     }
// }

//二叉树的层序遍历
// class Solution {
//     /**
//      * @param TreeNode $root
//      * @return Integer[][]
//      */
//     function levelOrder($root) {
//         if ($root == null) return [];
//         $queue = new \SplQueue();
//         $queue->enqueue($root);
//         $ret = [];
//         while (!$queue->isEmpty()) {
//             $count = $queue->count();
//             $tmp   = [];
//             for($i=0;$i<$count;$i++) {
//                 $node  = $queue->dequeue();
//                 $tmp[] = $node->val;
//                 if ($node->left) $queue->enqueue($node->left);
//                 if ($node->right) $queue->enqueue($node->right);
//             }
//             $ret[] = $tmp;
//         }
//         return $ret;
//     }
// }

// 第n个丑数 https://leetcode-cn.com/problems/chou-shu-lcof/
// class Solution {
//     /**
//      * @param Integer $n
//      * @return Integer<?php
// 预习
// 1、有效的字母异位词 https://leetcode-cn.com/problems/valid-anagram/description/
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

// 2、二叉树的中序遍历 https://leetcode-cn.com/problems/binary-tree-inorder-traversal/submissions/
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
    //     if ($root == null) return [];
    //     $stack = new \SplStack();
    //     $curr = $root;
    //     $ret = [];
    //     while ($curr != null || !$stack->isEmpty()) {
    //         while ($curr != null) {
    //             $stack->push($curr);
    //             $curr = $curr->left;
    //         }
    //         $node = $stack->pop();
    //         $ret[] = $node->val;
    //         $curr = $node->right;
    //     }
    //     return $ret;
    // }
// }

//  二叉树的前序遍历 https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
// class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    // function preorderTraversal($root) {
    //     if ($root == null) return [];
    //     $r = $root->val;
    //     $left = [];
    //     $right = [];
    //     if ($root->left) $left = $this->preorderTraversal($root->left);
    //     if ($root->right) $right = $this->preorderTraversal($root->right);
    //     return array_merge([$r],$left,$right);
    // }
    //  迭代实现 根、左、右
//     function preorderTraversal($root) {
//         if ($root == null) return [];
//         $stack = new \SplStack();
//         $stack->push($root);
//         $ret = [];
//         while (!$stack->isEmpty()) {
//             $node = $stack->pop();
//             $ret[] = $node->val;
//             if ($node->right) $stack->push($node->right);
//             if ($node->left) $stack->push($node->left);
//         }
//         return $ret;
//     }
// }

//  二叉树的后序遍历 https://leetcode-cn.com/problems/binary-tree-postorder-traversal
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    //  迭代实现 左、右、跟
    function postorderTraversal($root) {
        if ($root == null) return [];
        $stack = new \SplStack();
        $stack->push($root);
        $ret = [];
        while (!$stack->isEmpty()) {
            $node = $stack->pop();
            array_unshift($ret,$node->val);
            if ($node->left) $stack->push($node->left);
            if ($node->right) $stack->push($node->right);
        }
        return $ret;
    }
}

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

// 两数之和 https://leetcode-cn.com/problems/two-sum/description/
// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @param Integer $target
//      * @return Integer[]
//      */
//     function twoSum($nums,$target)
//     {
//         if (count($nums) <=1) return [];
//         $flipNums = array_flip($nums);
//         for($i=0;$i<count($nums);$i++) {
//             $diff = $target-$nums[$i];
//             if (isset($flipNums[$diff]) && $flipNums[$diff] != $i) {
//                 return [$i,$flipNums[$diff]];
//             }
//         }
//         return [];
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
// class Solution {
//     /**
//      * @param String[] $strs
//      * @return String[][]
//      */
//     function groupAnagrams($strs) {
//         // 算术基本定理可表述为：任何一个大于1的自然数 N,如果N不为质数，那么N可以唯一分解成有限个质数的乘积N=P1a1P2a2P3a3......Pnan，这里P1<P2<P3......<Pn均为质数，其中指数ai是正整数
//         if (count($strs) <= 1)  return [$strs];
//         $hash = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];
//         $ret = [];
//         foreach ($strs as $value) {
//             $strlen = 1;
//             for ($i=0; $i < strlen($value); $i++) {
//                 $strlen *= $hash[ord($value[$i])-97];
//             }
//             $ret[$strlen][] = $value;
//         }
//         return array_values($ret);
//     }
// }
// $n = new Solution();
// var_dump($n->groupAnagrams([""]));


// 验证二叉搜索树
// class Solution {

//     /**
//      * @param TreeNode $root
//      * @return Boolean
//      */
//     function isValidBST($root) {
//         $this->help($root,-2 << 32,2 << 32);
//     }
//     function help($root,$min,$max) {
//         if ($root == null) return true;
//         if ($root->val <= $min || $root->val >= $max) return false;
//         return $this->help($root->left,$min,$root->val) && $this->help($root->right,$root->val,$max);
//     }
// }

// N叉树的最大深度
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer
//      */
//     function maxDepth($root) {
//         if ($root == null) {
//             return 0;
//         } elseif(empty($root->children)) {
//             return 1;
//         }else {
//             $res = 0;
//             for($i=0;$i<count($root->children);$i++) {
//                 $temp = $this->maxDepth($root->children[$i]);
//                 $res = max($temp,$res);
//             }
//             return $res;
//         }
//     }
// }

// N叉树的后序遍历 https://leetcode-cn.com/problems/n-ary-tree-postorder-traversal/
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer[]
//      */
//     function postorder($root) {
//         $res = [];
//         $this->post($root,$res)
//         $res[] = $root->val;
//         return $res;
//     }
//     function post($root,&$res) {
//         if ($root == null) return $res;
//         for($i=count($root->children)-1;$i>=0;--$i) {
//             $res = $this->post($root->children[$i],$res);
//             $res[] = $root->children[$i]->val;
//         }
//     }
// }

// N叉树的前序遍历 https://leetcode-cn.com/problems/n-ary-tree-preorder-traversal/description/
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer[]
//      */
//     function preorder($root) {
//         $res = [];
//         $this->pre($root,$res);
//         return $res;
//     }
//     function pre($root,&$res) {
//         if ($root == null) return;
//         $res[] = $root->val;
//         for($i=0;$i<=count($root->children)-1;$i++) {
//             $this->pre($root->children[$i],$res);
//         }
//     }

// }

// N叉树的前序遍历
// class Solution {
//     function preorder($root) {
//         if ($root == null) return [];
//         $stack = new \SplStack();
//         $stack->push($root);
//         $ret = [];
//         while (!$stack->isEmpty()) {
//             $node = $stack->pop();
//             $ret[] = $node->val;
//             for ($i=count($node->children)-1; $i >=0 ; $i--) {
//                 $stack->push($node->children[$i]);
//             }
//         }
//         return $ret;
//     }
// }
// N叉树的层序遍历 https://leetcode-cn.com/problems/n-ary-tree-level-order-traversal/
// class Solution {
//     /**
//      * @param Node $root
//      * @return integer[][]
//      * 迭代实现
//      * 一层一层入队
//      */
//     function levelOrder($root) {
//         if ($root == null) return [];
//         $queue = new \SplQueue();
//         $queue->enqueue($root);
//         $ret = [];
//         while (!$queue->isEmpty()) {
//             $num = [];
//             $count = $queue->count();
//             for ($i=0; $i < $count; $i++) {
//                 $node = $queue->dequeue();
//                 $num[] = $node->val;
//                 foreach ($node->children as  $children) {
//                     $queue->enqueue($children);
//                 }
//             }
//             $ret[] = $num;
//         }
//         return $ret;
//     }
// }

//二叉树的层序遍历
// class Solution {
//     /**
//      * @param TreeNode $root
//      * @return Integer[][]
//      */
//     function levelOrder($root) {
//         if ($root == null) return [];
//         $queue = new \SplQueue();
//         $queue->enqueue($root);
//         $ret = [];
//         while (!$queue->isEmpty()) {
//             $count = $queue->count();
//             $tmp   = [];
//             for($i=0;$i<$count;$i++) {
//                 $node  = $queue->dequeue();
//                 $tmp[] = $node->val;
//                 if ($node->left) $queue->enqueue($node->left);
//                 if ($node->right) $queue->enqueue($node->right);
//             }
//             $ret[] = $tmp;
//         }
//         return $ret;
//     }
// }

// 第n个丑数 https://leetcode-cn.com/problems/chou-shu-lcof/
// class Solution {
//     /**
//      * @param Integer $n
//      * @return Integer
//      */
//     function nthUglyNumber($n) {
//         // 三个指针走动
//         $num = [1]; // 存储数组
//         [$p1,$p2,$p3] = [0,0,0]; // 三个指针

//         for ($i=1; $i <= $n; $i++) {
//             $p11 = $num[$p1]*2;
//             $p21 = $num[$p2]*3;
//             $p31 = $num[$p3]*5;
//             $num[$i] = min($p11,$p21,$p31);
//             if ($num[$i] == $p11)  $p1++;
//             if ($num[$i] == $p21)  $p2++;
//             if ($num[$i] == $p31)  $p3++;
//         }
//         return $num[$n-1];
//     }
// }
// echo nthUglyNumber(13);

// 数组移位之后的查找
// function search(&$arr,$v){
//     if(empty($arr)  || !is_numeric($v)) return -1;
//     $sta = 0;
//     $end = count($arr)-1;
//     while($sta <= $end){
//         $mid = floor(($sta+$end)/2);
//         if($arr[$mid] == $v) return $mid;
//         if($v == $arr[$sta]) return $sta;
//         if($v == $arr[$end]) return $end;
//         if($arr[$mid]<$arr[$sta]){
//             if($v>$arr[$mid] && $v<$arr[$sta]){
//                 $end = $mid-1;
//             } else {
//                 $sta = $mid+1;
//             }
//         } else if($arr[$mid]>$arr[$end]){
//             if($v<$arr[$mid] && $v>$arr[$end]){
//                 $sta = $mid+1;
//             } else{
//                 $end = $mid-1;
//             }
//         } else if($arr[$mid]>$arr[$sta]) {
//             $end = $mid-1;
//         } else if($arr[$mid] == $arr[$sta]){
//             $sta = $mid+1;
//         }
//     }
//     return -1;
// }

// 前 K 个高频元素 https://leetcode-cn.com/problems/top-k-frequent-elements/
// class Solution {
//     /**
//      * @param Integer[] $nums
//      * @param Integer $k
//      * @return Integer[]
//      */
//     // function topKFrequent($nums, $k) {
//     //     $len = count($nums);
//     //     if ($len == $k) return $nums;
//     //     $hash = array_count_values($nums);
//     //     arsort($hash);
//     //     $ret = [];
//     //     $i = 1;
//     //     foreach ($hash as $key => $value) {
//     //         $ret[] = $key;
//     //         if ($i == $k) break;
//     //         $i++;
//     //     }
//     //     return $ret;
//     // }
//     //
//     function topKFrequent($nums, $k) {
//         if (count($nums) == $k) return $nums;
//         $hash = array_count_values($nums);
//         $priorityQueue = new \SplPriorityQueue();
//         foreach ($hash as $key => $value) {
//             $priorityQueue->insert($key,$value);
//         }
//         $ret = [];
//         for ($i=0; $i < $k; $i++) {
//             $ret[] = $priorityQueue->extract();
//         }
//         return $ret;
//     }
// }
// $n = new Solution();
// var_dump($n->topKFrequent([4,1,-1,2,-1,2,3],1));
//      */
//     function nthUglyNumber($n) {
//         // 三个指针走动
//         $num = [1]; // 存储数组
//         [$p1,$p2,$p3] = [0,0,0]; // 三个指针

//         for ($i=1; $i <= $n; $i++) {
//             $p11 = $num[$p1]*2;
//             $p21 = $num[$p2]*3;
//             $p31 = $num[$p3]*5;
//             $num[$i] = min($p11,$p21,$p31);
//             if ($num[$i] == $p11)  $p1++;
//             if ($num[$i] == $p21)  $p2++;
//             if ($num[$i] == $p31)  $p3++;
//         }
//         return $num[$n-1];
//     }
// }
// echo nthUglyNumber(13);

// 数组移位之后的查找
// function search(&$arr,$v){
//     if(empty($arr)  || !is_numeric($v)) return -1;
//     $sta = 0;
//     $end = count($arr)-1;
//     while($sta <= $end){
//         $mid = floor(($sta+$end)/2);
//         if($arr[$mid] == $v) return $mid;
//         if($v == $arr[$sta]) return $sta;
//         if($v == $arr[$end]) return $end;
//         if($arr[$mid]<$arr[$sta]){
//             if($v>$arr[$mid] && $v<$arr[$sta]){
//                 $end = $mid-1;
//             } else {
//                 $sta = $mid+1;
//             }
//         } else if($arr[$mid]>$arr[$end]){
//             if($v<$arr[$mid] && $v>$arr[$end]){
//                 $sta = $mid+1;
//             } else{
//                 $end = $mid-1;
//             }
//         } else if($arr[$mid]>$arr[$sta]) {
//             $end = $mid-1;
//         } else if($arr[$mid] == $arr[$sta]){
//             $sta = $mid+1;
//         }
//     }
//     return -1;
// }

// 前 K 个高频元素 https://leetcode-cn.com/problems/top-k-frequent-elements/
// class Solution {
//     /**
//      * @param Integer[] $nums
//      * @param Integer $k
//      * @return Integer[]
//      */
//     // function topKFrequent($nums, $k) {
//     //     $len = count($nums);
//     //     if ($len == $k) return $nums;
//     //     $hash = array_count_values($nums);
//     //     arsort($hash);
//     //     $ret = [];
//     //     $i = 1;
//     //     foreach ($hash as $key => $value) {
//     //         $ret[] = $key;
//     //         if ($i == $k) break;
//     //         $i++;
//     //     }
//     //     return $ret;
//     // }
//     //
//     function topKFrequent($nums, $k) {
//         if (count($nums) == $k) return $nums;
//         $hash = array_count_values($nums);
//         $priorityQueue = new \SplPriorityQueue();
//         foreach ($hash as $key => $value) {
//             $priorityQueue->insert($key,$value);
//         }
//         $ret = [];
//         for ($i=0; $i < $k; $i++) {
//             $ret[] = $priorityQueue->extract();
//         }
//         return $ret;
//     }
// }
// $n = new Solution();
// var_dump($n->topKFrequent([4,1,-1,2,-1,2,3],1));