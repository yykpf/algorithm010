<?php
// 24. 两两交换链表中的节点
// 给定一个链表，两两交换其中相邻的节点，并返回交换后的链表。

// 你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。



// 示例 1：


// 输入：head = [1,2,3,4]
// 输出：[2,1,4,3]
// 示例 2：

// 输入：head = []
// 输出：[]
// 示例 3：

// 输入：head = [1]
// 输出：[1]


// 提示：

// 链表中节点的数目在范围 [0, 100] 内
// 0 <= Node.val <= 100

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
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    // function swapPairs($head) {
    //     if ($head == null || $head->next == null) return $head;
    //     $oddList = $head;
    //     $evenList = $head->next;
    //     $curr = $head->next->next;
    //     $i = 1;
    //     $currOddList = null;
    //     $currEvenList = null;
    //     while ($curr != null) {
    //         if (1 == $i&1) {
    //             if ($currOddList == null) {
    //                 $currOddList = $oddList;
    //             } else {
    //                 $currOddList = $currOddList->next;
    //             }
    //             $currOddList->next = new ListNode($curr->val);
    //         } else {
    //             if ($currEvenList == null) {
    //                 $currEvenList = $evenList;
    //             } else {
    //                 $currEvenList = $currEvenList->next;
    //             }
    //             $currEvenList->next = new ListNode($curr->val);
    //         }
    //         $i++;
    //         $curr = $curr->next;
    //     }

    //     $resList = new ListNode($evenList->val);;
    //     $currResList = null;
    //     while ($oddList && $evenList) {
    //         if ($currResList == null) {
    //             $currResList = $resList;
    //         } else {
    //             $currResList = $currResList->next = new ListNode($evenList->val);
    //         }
    //         $currResList->next = new ListNode($oddList->val);
    //         $currResList = $currResList->next;

    //         $oddList = $oddList->next;
    //         $evenList = $evenList->next;
    //     }
    //     while ($oddList) {
    //         $currResList->next = new ListNode($oddList->val);
    //         $currResList = $currResList->next;

    //         $oddList = $oddList->next;
    //     }
    //     while ($evenList) {
    //         $currResList->next = new ListNode($evenList->val);
    //         $currResList = $currResList->next;

    //         $evenList = $evenList->next;
    //     }
    //     return $resList;
    // }
    // function swapPairs($head)
    // {
    //     $dummyHead = new ListNode(0);
    //     $dummyHead->next = $head;
    //     $temp = $dummyHead;
    //     while ($temp->next !== null && $temp->next->next !== null) {
    //         $node1 = $temp->next;
    //         $node2 = $temp->next->next;
    //         $temp->next = $node2;
    //         $node1->next = $node2->next;
    //         $node2->next = $node1;

    //         $temp = $node1;
    //     }
    //     return $dummyHead->next;
    // }

    function swapPairs($head)
    {
        if ($head == null || $head->next == null) return $head;

        $newHead = $head->next;
        $head->next = $this->swapPairs($newHead->next);
        $newHead->next = $head;

        return $newHead;
    }
}