位运算
    异或：相同为0，不同为1.也可用"不进位加法"来理解

    异或操作的一些特点：
    x^0 = x
    x ^ 1s=~x // 注意 1s=~0 (简称 全1)
    x^(~x)=1s
    x^x=0
    c = a^b => a^c=b,b^c=a // 交换两个数
    a^b^c = a^(b^c)=(a^b)^c  //

    指定位置的位运算：
        1、将x最右边的n位清零：x & (~0<<n)
        2、获取x的第n位值 (0或者1)：(x>>n)&1
        3、获取x的第n位的幂值：x&(1<<n)
        4、仅将第n位置为1：x|(1<<n)
        5、仅将第n位置为0：x&(~(1<<n))
        6、将x最高位至第n位(含)清零：x&((1<<n)-1)

    实战位运算要点
        1、判断奇偶
            x%2 == 1 -> (x&1) == 1
            x%2 == 0 -> (x&1) == 0
        2、x >> 1 -> x/2
            即： x=x/2; -> x = x >>1
             mid = (left+right)/2 -> mid=(left+right) >> 1
        3、x=x&(x-1) 清零最低位的1
        4、x & -x => 得到最低位1
        5、x&~x => 0
    多皇后模板：
        https://shimo.im/docs/YzWa5ZZrZPYWahK2/read

    布隆过滤器
        它由一个bit数组和一组Hash算法构成。可用于判断一个元素是否在一个集合中，查询效率很高（1-N，最优能逼近于1）
        一个很长的 二进制向量和一系列随机映射函数。布隆过滤器用于检索一个元素是否在一个集合中
        优点：
            空间效率和查询时间都远远超过一般算法
        缺点：
            有一定的误识别率和删除困难
    LRU CACHE
        1、记忆
        2、钱包-储物柜
        3、代码模板


        两个要素：大小、替换
        Hash Table + Double LinkdList
        O(1)查询
        O(1)修改。更新

        CPU CACHE
            三级缓存

    排序
        https://www.cnblogs.com/onepixel/p/7674659.html
        1、比较类排序
            时间复杂度不能突破 O(nlogn)
            交换排序
            插入排序
            选择排序
            归并排序
        2、非比较类排序
            对于整型
            可以达到 O(n+k)
            计数排序
            桶排序
                与计数排序的区别，计数排序是对应的下标是有序的连续的下标的桶排序
                桶排序是有一个函数要计算桶的下标，可以理解为计数排序的升级版
            基数排序
        初级排序O(n^2)
            1、选择排序
                每次找最小值，然后放到待排序数组的起始位置
            2、插入排序
                从前到后逐步构建有序序列；对于未排序数据，在已排序序列中从后向前扫描，找到响应位置并插入
            3、冒泡排序
                嵌套循环，每次查看相邻的元素如果逆序，则交换
        高级排序 O(nlogn)
            快速排序
                数组取标杆pivot，将小元素放pivot左边，大元素方右侧，然后依次对右边和左边子数组继续排序；以达到整个序列有序
            归并排序 --分治
                1、把长度为n的输入序列分成两个长度为n/2的子序列
                2、对这两个子序列分别采用归并排序
                3、将两个排好序的子序列合并成一个最终的排序序列
            归并和快排具有相似性，但步骤顺序相反
                归并：先排序左右子数组，然后合并两个有序子数组
                快排：想调配出左右子数组，然后对左右子数组进行排序
            堆排序：
                堆插入 O(logn),取最大值/小值 O(1)
                1、数组元素依次建立小顶堆
                2、依次取堆顶元素，并删除