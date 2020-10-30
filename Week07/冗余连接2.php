<?php
// 685. 冗余连接 II
// 在本问题中，有根树指满足以下条件的有向图。该树只有一个根节点，所有其他节点都是该根节点的后继。每一个节点只有一个父节点，除了根节点没有父节点。

// 输入一个有向图，该图由一个有着N个节点 (节点值不重复1, 2, ..., N) 的树及一条附加的边构成。附加的边的两个顶点包含在1到N中间，这条附加的边不属于树中已存在的边。

// 结果图是一个以边组成的二维数组。 每一个边 的元素是一对 [u, v]，用以表示有向图中连接顶点 u 和顶点 v 的边，其中 u 是 v 的一个父节点。

// 返回一条能删除的边，使得剩下的图是有N个节点的有根树。若有多个答案，返回最后出现在给定二维数组的答案。

// 示例 1:

// 输入: [[1,2], [1,3], [2,3]]
// 输出: [2,3]
// 解释: 给定的有向图如下:
//   1
//  / \
// v   v
// 2-->3
// 示例 2:

// 输入: [[1,2], [2,3], [3,4], [4,1], [1,5]]
// 输出: [4,1]
// 解释: 给定的有向图如下:
// 5 <- 1 -> 2
//      ^    |
//      |    v
//      4 <- 3
// 注意:

// 二维数组大小的在3到1000范围内。
// 二维数组中的每个整数在1到N之间，其中 N 是二维数组的大小。
class UnionFind {
    public $parent;
    public function __construct($n) {
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
        }
    }
    public function find($p) {
        while ($p != $this->parent[$p]) {
            $this->parent[$p] = $this->parent[$this->parent[$p]];
            $p = $this->parent[$p];
        }
        return $p;
    }
    public function union($p, $q) {
        $rootP = $this->find($p);
        $rootQ = $this->find($q);
        if ($rootP == $rootQ) return;
        $this->parent[$rootP] = $rootQ;
    }
}
class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantDirectedConnection($edges) {
        $nodesCount = count($edges);
        $uf = new UnionFind($nodesCount + 1);
        $parent = [];
        for ($i = 1; $i <= $nodesCount; ++$i) {
            $parent[$i] = $i;
        }
        $conflict = -1;
        $cycle = -1;
        for ($i = 0; $i < $nodesCount; ++$i) {
            $edge = $edges[$i];
            $node1 = $edge[0]; $node2 = $edge[1];
            if ($parent[$node2] != $node2) {
                $conflict = $i;
            } else {
                $parent[$node2] = $node1;
                if ($uf->find($node1) == $uf->find($node2)) {
                    $cycle = $i;
                } else {
                    $uf->union($node1, $node2);
                }
            }
        }
        if ($conflict < 0) {
            $redundant = [$edges[$cycle][0], $edges[$cycle][1]];
            return $redundant;
        } else {
            $conflictEdge = $edges[$conflict];
            if ($cycle >= 0) {
                $redundant = [$parent[$conflictEdge[1]], $conflictEdge[1]];
                return $redundant;
            } else {
                $redundant = [$conflictEdge[0], $conflictEdge[1]];
                return $redundant;
            }
        }
    }
}
$n = new Solution();
// ($n->findRedundantDirectedConnection([[1,2], [1,3], [2,3]]));
var_dump($n->findRedundantDirectedConnection([[1,2], [2,3], [3,4], [4,1], [1,5]]));