<?php

// 841. 钥匙和房间
// 有 N 个房间，开始时你位于 0 号房间。每个房间有不同的号码：0，1，2，...，N-1，并且房间里可能有一些钥匙能使你进入下一个房间。

// 在形式上，对于每个房间 i 都有一个钥匙列表 rooms[i]，每个钥匙 rooms[i][j] 由 [0,1，...，N-1] 中的一个整数表示，其中 N = rooms.length。 钥匙 rooms[i][j] = v 可以打开编号为 v 的房间。

// 最初，除 0 号房间外的其余所有房间都被锁住。

// 你可以自由地在房间之间来回走动。

// 如果能进入每个房间返回 true，否则返回 false。

// 示例 1：

// 输入: [[1],[2],[3],[]]
// 输出: true
// 解释:
// 我们从 0 号房间开始，拿到钥匙 1。
// 之后我们去 1 号房间，拿到钥匙 2。
// 然后我们去 2 号房间，拿到钥匙 3。
// 最后我们去了 3 号房间。
// 由于我们能够进入每个房间，我们返回 true。
// 示例 2：

// 输入：[[1,3],[3,0,1],[2],[0]]
// 输出：false
// 解释：我们不能进入 2 号房间。
// 提示：

// 1 <= rooms.length <= 1000
// 0 <= rooms[i].length <= 1000
// 所有房间中的钥匙数量总计不超过 3000。

// 深度优先
// class Solution {
//     private $count = 0;
//     private $num = 0;
//     private $vis = [];

//     /**
//      * @param Integer[][] $rooms
//      * @return Boolean
//      */
//     function canVisitAllRooms($rooms)
//     {
//         $this->count = count($rooms);
//         if ($this->count <= 0) return true;
//         $this->DFS($rooms,0);
//         return $this->num == $this->count;
//     }

//     private function DFS($rooms,$x)
//     {
//         $this->vis[$x] = true;
//         $this->num++;
//         if ($this->num == $this->count) return;
//         foreach ($rooms[$x] as $value) {
//             if (empty($this->vis[$value])) $this->DFS($rooms,$value);
//         }
//     }
// }

// 广度优先
class Solution {

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms)
    {
        $count = count($rooms);
        $num = 0;
        $queue = [0]; // 模拟队列
        $vis[0] = true; // 不需要的数据
        while (!empty($queue)) {
            $x = array_shift($queue);
            $num++;
            if ($num == $count) break;
            foreach ($rooms[$x] as $value) {
                if (empty($vis[$value])){
                    $vis[$value] = true;
                    array_push($queue, $value);
                }
            }
        }
        return $num == $count;
    }

}
$n = new Solution();
echo $n->canVisitAllRooms([[1],[2],[3],[]]);