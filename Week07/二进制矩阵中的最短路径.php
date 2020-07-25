<?php
// BFS
class Solution {
    // 定义八联通
    private $dx = [0,0,-1,1,-1,-1,1,1]; // 上下左右 左上 左下 右上 右下
    private $dy = [-1,1,0,0,-1,1,-1,1];
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function shortestPathBinaryMatrix($grid) {
        $q = [
            [0,0] // 定义 i j
        ];
        $n = count($grid)-1;
        $m = count($grid[0])-1;
        // 开始和结尾是 1 不存在路径
        if ($grid[0][0] || $grid[$n][$m]) return -1;
        if (count($grid) <= 2) return count($grid);

        $d = 1;
        while (!empty($q)) {
            $count = count($q);
            for ($c=0; $c < $count; $c++) {
                $value = array_shift($q);
                if($grid[$value[0]][$value[1]] == 1) continue;
                if($value[0] == $n && $value[1] == $m) return $d;
                $grid[$value[0]][$value[1]] = 1;
                for ($i=0; $i < 8; $i++) {
                    $x = $this->dx[$i]+$value[0];
                    $y = $this->dy[$i]+$value[1];
                    if ($x >= 0 && $x <= $n && $y >= 0 && $y <= $m && !$grid[$x][$y]) {
                        array_push($q, [$x,$y]);
                    }
                }
            }
            $d++;
        }
        return -1;
    }
}
// $m =[
// [0,1,0,1,0],
// [1,0,0,0,1],
// [0,0,1,1,1],
// [0,0,0,0,0],
// [1,0,1,0,0]
// ];
$m = [[0,0,0],[1,1,0],[1,1,0]];
$n = new Solution();
echo $n->shortestPathBinaryMatrix($m);