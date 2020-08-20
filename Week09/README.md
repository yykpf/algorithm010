高级动态规划
    分治淘汰次优解就能形成动态规划
    1、将一个复杂的问题分治为简单的子问题
    2、分治+最优子结构
    3、顺推顺序：动态递推，从下往上
    DP顺推模板
        function DP() {
            dp = [][]; // 二维情况
            for i=0..M{
                for j=0..N {
                    dp[i][j] = _Function(dp[i'][j']...)
                }
            }
            return dp[M][N]
        }


字符串算法

    最长回文子串解法
        1、暴力 O(N^3)
        2、中间向两边扩张 O(n^2)
            两种情况 奇数和偶数
        3、动态规划
            i 起始位置
            j 终点
            首先定义 P(i,j)
                    true s[i,j] 是回文串
            P(i,j) =
                    false s[i,j] 不是回文串

            接下来
                P(i,j) = (P(i+1,j-1) && S[i] == S[j])

    字符串匹配算法
        1、暴力法 - O(MN)
            https://shimo.im/docs/8G0aJqNL86wWrPUE/read
        2、Rabin-Karp 算法
            利用 找出子串的 hash() 是否相等来进行加速
            1、假设子串的长度为 M (pat),目标串的长度为 N(txt)
            2、计算子串的 hash 值hash_pat
            3、计算目标字符串txt中每个长度为M的子串的hash值(共需要计算 N-M+1次)
            4、比较hash值：如果hash值不同，字符串必然不匹配；如果hash值相同，还需要使用朴素算法再次判断
            https://shimo.im/docs/1wnsM7eaZ6Ab9j9M/read
        3、KMP 算法
            用来找已经匹配的这一个片段，最大的前缀和最大的后缀最长有多长
            利用匹配前缀和后缀计算出公共前缀表
            https://www.bilibili.com/video/av11866460?from=search&seid=17425875345653862171
            http://www.ruanyifeng.com/blog/2013/05/Knuth%E2%80%93Morris%E2%80%93Pratt_algorithm.html
        4、Boyer-Moore 算法
            https://www.ruanyifeng.com/blog/2013/05/boyer-moore_string_search_algorithm.html
        5、Sunday 算法
            https://blog.csdn.net/u012505432/article/details/52210975