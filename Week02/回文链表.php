<?php
// 234. 回文链表
// 请判断一个链表是否为回文链表。

// 示例 1:

// 输入: 1->2
// 输出: false
// 示例 2:

// 输入: 1->2->2->1
// 输出: true
// 进阶：
// 你能否用 O(n) 时间复杂度和 O(1) 空间复杂度解决此题？

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head) {
        if ($head == null) return true;

        // 查找中间节点
        $firstHalfEnd  = $this->middleNode($head);
        $secondHalfStart  = $this->reverseList($firstHalfEnd->next);

        $result = true;
        $firstPostion = $head;
        $secondPostion = $secondHalfStart;
        while ($result && $secondPostion != null) {
            if ($firstPostion->val != $secondPostion->val) $result = false;
            $firstPostion = $firstPostion->next;
            $secondPostion = $secondPostion->next;
        }

        //还原链表
        $firstHalfEnd->next = $this->reverseList($secondHalfStart);

        return $result;
    }
    private function middleNode($head)
    {
        $slow = $head;
        $fast = $head;
        while ($slow->next != null && $fast->next->next != null) {
            $slow = $slow->next;
            $fast =$fast->next->next;
        }

        return $slow;
    }

    private function reverseList($head)
    {
        if ($head == null || $head->next == null) return $head;
        $cur = $this->reverseList($head->next);

        $head->next->next = $head;
        $head->next = null;

        return $cur;
    }
}