<?php
// 1、删除数组的重复项
// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @return Integer
//      */
//     function removeDuplicates(&$nums) {
//         $count = count($nums);
//         if ($count < 2) return $count;
//         list($left,$right) = [1,1];
//         while ($right < $count) {
//             if ($nums[$right] != $nums[$right-1]) {
//                 $nums[$left] = $nums[$right];
//                 $left++;
//             }
//             $right++;
//         }
//         return $left;
//     }
// }

// 2、旋转数组
// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @param Integer $k
//      * @return NULL
//      */
//     function rotate(&$nums, $k) {
//         $len = count($nums);
//         if ($len > 1 && $k != 0 && $len != $k){
//             $k %= $len;
//             $nums = array_merge(array_slice($nums, 0 - $k, $len - 1), array_slice($nums, 0, $len - $k));
//         }
//     }
// }

// 3、合并两个有序链表
// class Solution {

//     /**
//      * @param ListNode $l1
//      * @param ListNode $l2
//      * @return ListNode
//      */
//     function mergeTwoLists($l1, $l2) {
//         if ($l1 == null) return $l2;
//         if ($l2 == null) return $l1;
//         if ($l1->val < $l2->val) {
//             $l1->next = $this->mergeTwoLists($l1->next,$l2);
//             return $l1;
//         } else {
//             $l2->next = $this->mergeTwoLists($l1,$l2->next);
//             return $l2;
//         }
//     }
// }

// 4、合并两个有序数组
// class Solution {

//     /**
//      * @param Integer[] $nums1
//      * @param Integer $m
//      * @param Integer[] $nums2
//      * @param Integer $n
//      * @return NULL
//      */
//     function merge(&$nums1, $m, $nums2, $n) {
//         // 查找 p1(nums1不是0的最优一个元素)和p2(nums2的最后一个元素)和p(nums需要插入到nums1的位置)
//         $p1  = $m-1;
//         $p = $m+$n-1;
//         $p2 = $n-1;
//         while ($p1 >= 0 && $p2>= 0) {
//             $nums1[$p--] = ($nums1[$p1] < $nums2[$p2])?$nums2[$p2--]:$nums1[$p1--];
//         }
//         if ($a = array_slice($nums2,0,$p2+1)) array_splice($nums1,0,$p+1,$a);
//     }
// }

// 5、两数之和
// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @param Integer $target
//      * @return Integer[]
//      */
//   function twoSum($nums,$target) {
//       $count = count($nums);
//       $numTwo = array_flip($nums);
//       for ($i=0; $i < $count; $i++) {
//           $diff = $target-$nums[$i];
//           if (isset($numTwo[$diff]) && $numTwo[$diff] != $i ) {
//               return [$i,$numTwo[$diff]];
//           }
//       }
//       return [];
//   }
// }

// 6、移动零
// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @return NULL
//      */
//     function moveZeroes(&$nums) {
//         $count = count($nums);
//         if ($count <= 1) return $nums;
//         for ($j=0,$i=0; $i < $count; $i++) {
//              if (0 != $nums[$i]) {
//                 $nums[$j] = $nums[$i];
//                 if ($j != $i) {
//                     $nums[$i] = 0;
//                 }
//                 $j++;
//              }
//          }
//     }
// }

// 7、加1 https://leetcode-cn.com/problems/plus-one/
// class Solution {

//     /**
//      * @param Integer[] $digits
//      * @return Integer[]
//      */
//     function plusOne($digits) {
//         // 通过给最后一个数进位
//         $len = count($digits)-1;
//         $carry = 1;
//         while ($len >= 0 && $carry) {
//             $v = $digits[$len];
//             ((int)$v+1 >= 10)?$carry=1:$carry=0;
//             $digits[$len--] = ((int)$v+1)%10;
//         }
//         if ($carry == 1) array_unshift($digits, 1);
//         return $digits;
//     }
// }

// 8、双端循环队列 https://leetcode.com/problems/design-circular-deque/
// class MyCircularDeque {
//     private $size = 0;
//     private $maxSize = 0;
//     public  $list = [];
//     /**
//      * Initialize your data structure here. Set the size of the deque to be k.
//      * @param Integer $k
//      */
//     function __construct($k) {
//         $this->maxSize = $k;
//     }

//     /**
//      * Adds an item at the front of Deque. Return true if the operation is successful.
//      * @param Integer $value
//      * @return Boolean
//      */
//     function insertFront($value) {
//         if ($this->isFull()) return false;
//         array_unshift($this->list,$value);
//         $this->size++;
//         return true;
//     }

//     /**
//      * Adds an item at the rear of Deque. Return true if the operation is successful.
//      * @param Integer $value
//      * @return Boolean
//      */
//     function insertLast($value) {
//         if ($this->isFull()) return false;
//         array_push($this->list,$value);
//         $this->size++;
//         return true;
//     }

//     /**
//      * Deletes an item from the front of Deque. Return true if the operation is successful.
//      * @return Boolean
//      */
//     function deleteFront() {
//         if ($this->isEmpty()) return false;
//         array_shift($this->list);
//         $this->size--;
//         return true;
//     }

//     /**
//      * Deletes an item from the rear of Deque. Return true if the operation is successful.
//      * @return Boolean
//      */
//     function deleteLast() {
//         if ($this->isEmpty()) return false;
//         array_pop($this->list);
//         $this->size--;
//         return true;
//     }

//     /**
//      * Get the front item from the deque.
//      * @return Integer
//      */
//     function getFront() {
//         if ($this->isEmpty()) return -1;
//         return $this->list[0];
//     }

//     /**
//      * Get the last item from the deque.
//      * @return Integer
//      */
//     function getRear() {
//         if ($this->isEmpty()) return -1;
//         return $this->list[$this->size-1];
//     }

//     /**
//      * Checks whether the circular deque is empty or not.
//      * @return Boolean
//      */
//     function isEmpty() {
//         return ($this->size == 0)? true:false;
//     }

//     /**
//      * Checks whether the circular deque is full or not.
//      * @return Boolean
//      */
//     function isFull() {
//         return ($this->size == $this->maxSize)? true:false;
//     }
// }

// 9、接雨水 https://leetcode-cn.com/problems/trapping-rain-water/
// class Solution {

//     /**
//      * @param Integer[] $height
//      * @return Integer
//      */
//     function trap($height) {
//         // 初始化左右两个指针，移动高度较小的指针知道遍历完成
//         // $leftMax 左边最大值 $left 左下标 $right 右边界 $rightMax 右边最大值
//         list($leftMax,$left,$right,$rightMax,$ans) = [0,0,count($height)-1,0,0];
//         while ($left < $right) {
//             if ($height[$left] < $height[$right]) {
//                 ($height[$left] > $leftMax)?$leftMax = $height[$left]:$ans += ($leftMax-$height[$left]);
//                 $left++;
//             } else {
//                 ($height[$right] > $rightMax)?$rightMax = $height[$right]:$ans += ($rightMax-$height[$right]);
//                 $right--;
//             }
//         }
//         return $ans;
//     }
// }

// lru删除
// class LRUCache
// {
//     protected $totalSize;
//     public $hash = [];
//     public $list = [];
//     /**
//      * @param Integer $capacity
//      */
//     public function __construct($capacity)
//     {
//         $this->totalSize = $capacity;
//     }

//     /**
//      * @param Integer $key
//      * @return Integer
//      */
//     public function get($key)
//     {
//         if (isset($this->hash[$key])) {
//             $index = array_search($key, $this->list);
//             unset($this->list[$index]);
//             array_unshift($this->list, $key);
//             return $this->hash[$key];
//         }
//         return -1;
//     }

//     /**
//      * @param Integer $key
//      * @param Integer $value
//      * @return NULL
//      */
//     public function put($key, $value)
//     {
//         if (isset($this->hash[$key])) {
//             $index = array_search($key, $this->list);
//             unset($this->list[$index]);
//         } else {
//             if (count($this->hash) == $this->totalSize) {
//                 $index = end($this->list);
//                 array_pop($this->list);
//                 unset($this->hash[$index]);
//             }
//         }
//         $this->hash[$key] = $value;
//         array_unshift($this->list, $key);

//     }
// }

// 第k大元素
class Solution {

    function findKthLargest($nums,$k) {
        $count = count($nums);
        if ($count < $k) return false;
        $r = $this->quickSort($nums,0,$count-1,$k-1);
        return $r;
    }

    // 快排
    private function quickSort(&$nums,$l,$r,$k) {
        if ($l < $r) {
            $p = $this->partition($nums,$l,$r);
            if ($p == $k) {
                return $nums[$p];
            } elseif ($p < $k) {
                return $this->quickSort($nums,$p+1,$r,$k);
            } else {
                return $this->quickSort($nums,$l,$p-1,$k);
            }
        }
        return $nums[$l];
    }

    // 分区
    private function partition(&$nums,$l,$r) {
        $rand = rand($l,$r); // 解决退化的时间复杂度(已经是排好序的，每次选择固定值)
        list($nums[$l],$nums[$rand]) = [$nums[$rand],$nums[$l]];
        $v = $nums[$l];
        $j = $l;
        for($i = $l+1; $i<= $r;$i++) {
            if ($nums[$i] > $v) {
                $j++;
                list($nums[$j],$nums[$i]) = [$nums[$i],$nums[$j]];
            }
        }
        $nums[$l] = $nums[$j];
        $nums[$j] = $v;
        return $j;
    }
}
$n = new Solution();
echo $n->findKthLargest([3,2,1,5,6,4],3);

// 两个数组的中位数
// class Solution {

//     /**
//      * @param Integer[] $nums1
//      * @param Integer[] $nums2
//      * @return Float
//      */
//   function findMedianSortedArrays($nums1,$nums2) {
//       // 需要满足中位数的规则
//       // 找到两个数组的分割线
//       if (count($nums1) > count($nums2)) {
//           $temp = $nums1;
//           $nums1 = $nums2;
//           $nums2 = $temp;
//       }
//       $m = count($nums1);
//       $n = count($nums2);
//       // 分隔点左边的所有元素需要满足的个数
//       // $totalLeft = $n+($n-$m+1)/2;
//       $totalLeft = floor(($m+$n+1)/2);
//       // 在nums1的区间[0,m] 里找到合适的分割线
//       // 使得 $nums1[i-1] <= $nums2[j] && $nums[j-1] <= $nums1[i]
//       $left = 0;
//       $right = $m;
//       while ($left < $right) {
//           $i = floor($left+($right-$left+1)/2);
//           $j = $totalLeft-$i;
//           if ($nums1[$i-1] > $nums2[$j]) {
//               $right = $i-1;
//           } else {
//               $left = $i;
//           }
//       }
//       $i = $left;
//       $j = $totalLeft-$i;
//       $nums1LeftMax = $i == 0? -2 << 32:$nums1[$i-1]; // 给一个无穷小的数，保证不会选中
//       $nums1RightMin = $i == $m? 2 << 32:$nums1[$i]; // 给一个无穷大的数 保证不会选中
//       $nums2LeftMax = $j == 0? -2 << 32:$nums2[$j-1];
//       $nums2RightMin = $j == $n? 2 << 32:$nums2[$j]; // 给一个无穷大的数 保证不会选中
//       if (($m+$n)%2 == 1) {
//           return max($nums1LeftMax,$nums2LeftMax);
//       } else{
//           return (max($nums1LeftMax,$nums2LeftMax)+min($nums1RightMin,$nums2RightMin))/2;
//       }
//   }
// }

// 小偷能够偷到的总金额
// function rob($nums) {
//     $curr = 0; // 前一个总金额 (k-1)
//     $pre  = 0; // 当前元素前两个的总金额 (k-2)
//     foreach ($nums as $key => $value) {
//         $temp = max($curr,($value+$pre));
//         $pre = $curr;
//         $curr = $temp;
//     }
//     return $curr;
// }

// 删除数组中的重复项 k是可以重复的次数
// function removeDuplicates(&$nums,$k) {
//     $j = 0; // 前一个不重复的数
//     foreach ($nums as $i => $value) {
//         if ($i<$k || $value > $nums[$i-$k]) {
//             $nums[$j] = $value;
//             $j++;
//         }
//     }
//     return $j;
// }
// function removeDuplicates(&$nums) {
//     // 两个指针，left指针是当前不重复的数，right指针是遍历的指针
//     $count = count($nums);
//     if ($count < 2) return $count;
//     list($left,$right) = [1,1];
//     while ($right < $count) {
//          if ($nums[$right] != $nums[$right-1]) {
//             $nums[$left] = $nums[$right];
//             $left++;
//          }
//          $right++;
//      }
//      return $left;
// }
// $nums = [1,1,2];
// var_dump(removeDuplicates($nums,1));
// var_dump($nums);

// 最大公约数
// function maxCommonDivisor($a,$b) {
//   if ($b == 0) return $a;
//   return  maxCommonDivisor($b,($a%$b));
// }

// echo maxCommonDivisor(4,6);

// 最小公倍数
//求最小公倍数 满足的答案(最大公约数)*[最小公倍数]=a*b (a,b)*[a,b]=a*b
//如果要求多个数的最小公倍数，可以先求出前两个数的最小公倍数，在依次与后面进行求
// function min_multiple($a,$b) {
//   return ($a*$b)/maxCommonDivisor($a,$b);
// }

// echo min_multiple(4,6);

// 链表反转
// class Solution {

//     /**
//      * @param ListNode $head
//      * @return ListNode
//      */
//     function reverseList($head) {
//         if ($head == null || $head->next == null) return $head;

//         $curr = $this->reverseList($head->next);
//         $head->next->next=$head;
//         $head->next=null;

//         return $curr;
//     }
// }

// 反转二叉树
// class Solution {

//     /**
//      * @param TreeNode $root
//      * @return TreeNode
//      */
//     function invertTree($root) {
//         if ($root == null) return $root;
//         $left = $this->invertTree($root->left);
//         $right = $this->invertTree($root->right);

//         $temp = $left;
//         $root->left = $right;
//         $root->right = $temp;

//         return $root;
//     }
// }

//有效的括号
// class Solution {

//     /**
//      * @param String $s
//      * @return Boolean
//      */
//     function isValid($s) {
//         $right = ['('=>')','{'=>'}','['=>']']; // map关系
//         $stack = []; //入栈
//         for($i=0;$i<strlen($s);$i++) {
//             if (array_search($s[$i],$right)) {
//                 $l = array_pop($stack);
//                 if (empty($l)) return false;
//                 if ($right[$l] != $s[$i]) return false;
//             } else {
//                 array_push($stack,$s[$i]);
//             }
//         }
//         if ($stack) return false;
//         return true;
//     }
// }

// $n = new Solution;
// echo $n->isValid("{[]}");

//滑动窗口最大值
// class Solution {

//     /**
//      * @param Integer[] $nums
//      * @param Integer $k
//      * @return Integer[]
//      */
//     // function maxSlidingWindow($nums, $k) {
//     //     $max = [];
//     //     for($i=0;$i<=count($nums)-$k;$i++) {
//     //         $max[] = max(array_slice($nums,$i,$k));
//     //     }
//     //     return $max;
//     // }
//     function maxSlidingWindow($nums, $k) {
//         $queue = []; // 双向队列维持在k个元素，以索引为值
//         $ret   = []; // 结果
//         for ($i=0; $i < count($nums); $i++) {
//             while (!empty($queue) && ($nums[end($queue)] < $nums[$i])) array_pop($queue); // 删除小的元素
//             $queue[] = $i;
//             if ($queue[0] < $i+1-$k) array_shift($queue); // 删除不在窗口内的元素
//             if ($i+1 >= $k) $ret[] = $nums[$queue[0]];
//         }
//         return $ret;
//     }
// }
// $n = new Solution;
// var_dump($n->maxSlidingWindow([7,2,4,5,6],2));