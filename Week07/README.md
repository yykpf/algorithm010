字典树和并查集
    字典树(Trie)
        数据结构：
            单词查找树或键树，是一种树形结构。典型应用是用于统计和排序大量字符串(但不限于字符串)，所以经常被搜索引擎系统用于文本词频统计
        优点：
            最大限度地减少无谓的字符串比较，查询效率比哈希表高
        核心思想：
        基本性质：
            1、节点本身不存完整单词
            2、从根节点到某一节点，路径上经过的字符串连接起来，为该节点对应的字符串
            3、每个节点的所有子节点路径代表的字符串不相同

    并查集
        使用场景：
            组团、配对问题
            Group or not?
        基本操作：
            makeSet(s)：建立一个新的并查集，其中包含s个单元素集合
            unionSet(x,y): 把元素x和元素y所在的集合合并，要求x和y所在的集合不相交，如果相交则不合并
            find(x): 找到元素x所在的集合的代表，该操作也可用于判断两个元素是否位于同一个集合，只要将它们各自的代表比较一下就可以了。

    高级搜索
        剪枝
        双向BFS
        启发式搜索(A*)
    初级搜索
        1、朴素搜索
        2、优化方式：不重复、剪枝(括号生成)
        3、搜索方向：
            BFS：广度优先搜索
            DFS：深度优先搜索

    双向BFS模板实现
class Solution {
    function ladderLength($beginWord, $endWord, $wordList) {

        //1、设置set查找
        $hashList = array_flip($wordList);
        if (!isset($hashList[$endWord])) return 0;
        unset($hashList[$beginWord]);

        //2、初始值 模拟队列
        $beginVisited[$beginWord] = true;
        $endVisited[$endWord] = true;
        $visited = [];
        $step = 1; // 默认1步
        $wordLen = strlen($beginWord);

        //3、循环查找
        while (!empty($beginVisited) && !empty($endVisited)) {
            //4、大小交换，只循环小的元素
            if (count($beginVisited) > count($endVisited)) {
                list($beginVisited,$endVisited) = [$endVisited,$beginVisited]; // 数组交换
            }
            //5、循环逻辑处理
            $nextLevelVisited = [];
            foreach ($beginVisited as $word => $value) {
                for ($i=0; $i < $wordLen; $i++) {
                    $old = $word[$i];
                    for ($k=97; $k <= 122; $k++) { // 条件逻辑
                        if ($old == chr($k)) continue;
                        $word[$i] = chr($k);
                        if (isset($hashList[$word])) {
                            if (isset($endVisited[$word])) return $step+1; // 判断是否存在
                            if (empty($visited[$word])) {
                                $nextLevelVisited[$word]
                                = true;
                                $visited[$word] = true;
                            }
                        }
                    }
                    $word[$i] = $old; // 恢复值
                }
            }
            // 6、进行下一次循环
            $beginVisited = $nextLevelVisited;
            $step++;
        }
        return 0;
    }
}

    启发式搜索

        A* search
            https://shimo.im/docs/8CzMlrcvbWwFXA8r/read
            BFS 队列改成优先级队列，有一个估价函数
            估价函数：
                启发式函数：h(n),它用来评价那些结点最有希望的是一个我们要找的结点，h(n)会返回一个非负实数，也可以认为是从结点n的目标结点路径的估计成本
                启发式函数是一种告知搜索方向的方法。它提供了一种明智的方法来猜测那个邻居结点会导向一个目标