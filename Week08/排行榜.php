<?php
// 设计排行榜

// 请你帮忙来设计这个 Leaderboard 类，使得它有如下 3 个函数：

// addScore(playerId, score)：
// 假如参赛者已经在排行榜上，就给他的当前得分增加 score 点分值并更新排行。
// 假如该参赛者不在排行榜上，就把他添加到榜单上，并且将分数设置为 score。

// top(K)：返回前 K 名参赛者的得分总和。

// reset(playerId)：将指定参赛者的成绩清零。题目保证在调用此函数前，该参赛者已有成绩，并且在榜单上。

// 初始状态下，排行榜是空的。

// 示例 1：

// 输入：
// ["Leaderboard","addScore","addScore","addScore","addScore","addScore","top","reset","reset","addScore","top"]
//  [[],[1,73],[2,56],[3,39],[4,51],[5,4],[1],[1],[2],[2,51],[3]]

// 输出：
//  [null,null,null,null,null,null,73,null,null,null,141]

// 解释：
//  Leaderboard leaderboard = new Leaderboard ();
//  leaderboard.addScore(1,73);   // leaderboard = [[1,73]];
//  leaderboard.addScore(2,56);   // leaderboard = [[1,73],[2,56]];
//  leaderboard.addScore(3,39);   // leaderboard = [[1,73],[2,56],[3,39]];
//  leaderboard.addScore(4,51);   // leaderboard = [[1,73],[2,56],[3,39],[4,51]];
//  leaderboard.addScore(5,4);    // leaderboard = [[1,73],[2,56],[3,39],[4,51],[5,4]];
//  leaderboard.top(1);           // returns 73;
//  leaderboard.reset(1);         // leaderboard = [[2,56],[3,39],[4,51],[5,4]];
//  leaderboard.reset(2);         // leaderboard = [[3,39],[4,51],[5,4]];
//  leaderboard.addScore(2,51);   // leaderboard = [[2,51],[3,39],[4,51],[5,4]];
//  leaderboard.top(3);           // returns 141 = 51 + 51 + 39;
// 提示：

// 1 <= playerId, K <= 10000
// 题目保证 K 小于或等于当前参赛者的数量。
// 1 <= score <= 100
// 最多进行 1000 次函数调用。
class Solution{

    private $ranking = []; // 排行榜
    // 添加排行榜
    public function addScore($playerId, $score) {
        if (!isset($this->ranking[$playerId])) $this->ranking[$playerId] = 0;
        $this->ranking[$playerId] += $score;
        // 添加就重新一个排序
        uasort($this->ranking, function($a,$b){
            if ($a < $b) return 1;
        });
    }

    // 返回前几名的综合
    public function top($K) {
        return array_sum(array_slice($this->ranking, 0,$K));
    }

    // 重置分数
    public function reset($playerId) {
        unset($this->ranking[$playerId]);
    }

    // 获取排行榜
    public function getRanking() {
        return $this->ranking;
    }
}
$leaderboard = new Solution();
 $leaderboard->addScore(1,73);
 $leaderboard->addScore(2,56);
 $leaderboard->addScore(3,39);
 $leaderboard->addScore(4,51);
 $leaderboard->addScore(5,4);
 $leaderboard->getRanking();
 $leaderboard->top(1);
 $leaderboard->reset(1);
 $leaderboard->getRanking();
 $leaderboard->reset(2);
 $leaderboard->getRanking();
 $leaderboard->addScore(2,51);
 $leaderboard->getRanking();
 $leaderboard->top(3);