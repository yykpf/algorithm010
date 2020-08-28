<?php
// 332. 重新安排行程
// 给定一个机票的字符串二维数组 [from, to]，子数组中的两个成员分别表示飞机出发和降落的机场地点，对该行程进行重新规划排序。所有这些机票都属于一个从 JFK（肯尼迪国际机场）出发的先生，所以该行程必须从 JFK 开始。

// 说明:

// 如果存在多种有效的行程，你可以按字符自然排序返回最小的行程组合。例如，行程 ["JFK", "LGA"] 与 ["JFK", "LGB"] 相比就更小，排序更靠前
// 所有的机场都用三个大写字母表示（机场代码）。
// 假定所有机票至少存在一种合理的行程。
// 示例 1:

// 输入: [["MUC", "LHR"], ["JFK", "MUC"], ["SFO", "SJC"], ["LHR", "SFO"]]
// 输出: ["JFK", "MUC", "LHR", "SFO", "SJC"]
// 示例 2:

// 输入: [["JFK","SFO"],["JFK","ATL"],["SFO","ATL"],["ATL","JFK"],["ATL","SFO"]]
// 输出: ["JFK","ATL","JFK","SFO","ATL","SFO"]
// 解释: 另一种有效的行程是 ["JFK","SFO","ATL","JFK","ATL","SFO"]。但是它自然排序更大更靠后。

class Solution {
    /**
     * @param String[][] $tickets
     * @return String[]
     */
    function findItinerary($tickets) {
        $m = [];
        foreach ($tickets as $ticket) {
            list($src,$dst) = [$ticket[0],$ticket[1]];
            isset($m[$src])? $m[$src][] = $dst:$m[$src] = [$dst];
        }
        foreach ($m as $key => $value) {
            sort($m[$key]); // 自然排序
        }
        $res = [];
        $this->DFS($m,'JFK',$res);
        for ($i=0; $i < count($res)/2; $i++) {
            list($res[$i],$res[count($res)-1-$i]) = [$res[count($res)-1-$i],$res[$i]];
        }

        return $res;
    }

    private function DFS(&$m,$curr,&$res)
    {
         while (!empty($m[$curr])) {
            $tmp = $m[$curr][0];
            array_shift($m[$curr]);
            $this->DFS($m,$tmp,$res);
        }
        $res[] = $curr;
    }
}
$n = new Solution();
var_dump($n->findItinerary([["MUC", "LHR"], ["JFK", "MUC"], ["SFO", "SJC"], ["LHR", "SFO"]]));