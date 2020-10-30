<?php
// 61. 旋转链表
// 给定一个链表，旋转链表，将链表每个节点向右移动 k 个位置，其中 k 是非负数。

// 示例 1:

// 输入: 1->2->3->4->5->NULL, k = 2
// 输出: 4->5->1->2->3->NULL
// 解释:
// 向右旋转 1 步: 5->1->2->3->4->NULL
// 向右旋转 2 步: 4->5->1->2->3->NULL
// 示例 2:

// 输入: 0->1->2->NULL, k = 4
// 输出: 2->0->1->NULL
// 解释:
// 向右旋转 1 步: 2->0->1->NULL
// 向右旋转 2 步: 1->2->0->NULL
// 向右旋转 3 步: 0->1->2->NULL
// 向右旋转 4 步: 2->0->1->NULL

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
     * @param Integer $k
     * @return ListNode
     */
    // 1、形成循环链表 2、找到需要断开的节点的位置
    function rotateRight($head, $k) {
        if ($head == null) return null;
        if ($head->next == null) return $head;
        $n = 1;
        $oldTail = $head;
        while ($oldTail->next != null) { // 找到末尾
            $oldTail = $oldTail->next;
            $n++;
        }
        $oldTail->next = $head; // 形成循环链表

        $newTail = $oldTail;
        for ($i=0; $i <= $n-$k%$n-1; $i++) {
            $newTail = $newTail->next;
        }
        $newHead = $newTail->next;
        $newTail->next = null;

        return $newHead;
    }
}
