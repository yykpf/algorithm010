<?php
// 143. 重排链表
// 给定一个单链表 L：L0→L1→…→Ln-1→Ln ，
// 将其重新排列后变为： L0→Ln→L1→Ln-1→L2→Ln-2→…

// 你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。

// 示例 1:

// 给定链表 1->2->3->4, 重新排列为 1->4->2->3.
// 示例 2:

// 给定链表 1->2->3->4->5, 重新排列为 1->5->2->4->3.

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return NULL
     */
    function reorderList($head)
    {
        if ($head == null) return $head;

        $mid =  $this->middleNode($head);
        $l1 = $head;
        $l2 = $mid->next;
        $mid->next = null;
        $l2 = $this->reverseList($l2);
        $this->mergeList($l1, $l2);
        return $l1;
    }

    private function middleNode($head)
    {
        $slow = $head;
        $fast = $head;
        while ($fast->next != null && $fast->next->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }

    // private function reverseList($head)
    // {
    //     if ($head == null) return $head;
    //     $tail = $head;
    //     $head = $head->next;
    //     $tail->next = null;

    //     while ($head != null) {
    //         $temp = $head->next;
    //         $head->next = $tail;
    //         $tail = $head;
    //         $head = $temp;
    //     }

    //     return $tail;
    // }

    private function reverseList($head)
    {
        if ($head == null || $head->next == null) return $head;
        $cur = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $cur;
    }

    private function mergeList($l1,$l2)
    {
        $l1Temp = null;
        $l2Temp = null;
        while ($l1 != null && $l2 != null) {
            $l1Temp = $l1->next;
            $l2Temp = $l2->next;

            $l1->next = $l2;
            $l1 = $l1Temp;

            $l2->next = $l1;
            $l2 = $l2Temp;
        }
    }
}