<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 10:46
 *                                  php/Mysql汉字按拼音首字母检索
 */


//按拼音首字母检索来的直接，点一下自己想要的信息不就出来了嘛！进入正题，怎么实现呢，先百度吧：建个编码表，比如以F读音开头所有汉字会有一个编码范围，把这个事先存好，每次取姓名的第一个汉字然后去跟编码表匹配上编码表：
//[html] view plain copy
//CREATE TABLE tcosler(
//    `fPY` char(1) NOT NULL,
//  `cBegin` int(11) NOT NULL,
//  `cEnd` int(11) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8;
//然后往表里边插数据：
//[php] view plain copy
//INSERT INTO `tcosler` (`fPY`, `cBegin`, `cEnd`) VALUES
//('A', 45217, 45252),
//('B', 45253, 45760),
//('C', 45761, 46317),
//('D', 46318, 46825),
//('E', 46826, 47009),
//('F', 47010, 47296),
//('G', 47297, 47613),
//('H', 47614, 48118),
//('J', 48119, 49061),
//('K', 49062, 49323),
//('L', 49324, 49895),
//('M', 49896, 50370),
//('N', 50371, 50613),
//('O', 50614, 50621),
//('P', 50622, 50905),
//('Q', 50906, 51386),
//('R', 51387, 51445),
//('S', 51446, 52217),
//('T', 52218, 52697),
//('W', 52698, 52979),
//('X', 52980, 53640),
//('Y', 53689, 54480),
//('Z', 54481, 55289);

//注意：此表是按gbk编码的字母范围对照表，而刚才建表的的时候用到的是utf-8的编码方式，由于没找到utf-8的编码表，所以只能上这个，一会写sql查询的时候需要做个编码转换（这个问题好久才发现的，好多帖子都没写编码方式，直接导致查询结果为空），当然如果你要检索的汉字是gbk编码的，那么直接查询即可
//然后呢，就可以写sql语句查询啦...、、、、
//比如你要查以F开头的汉字，假设你的汉字存在users表里的userName字段里，那么sql就是：
//[html] view plain copy
//SELECT p. * , c. *
//       FROM users p, tcosler c
//       WHERE CONV( HEX( LEFT( CONVERT( userName
//       USING gbk ) , 1 ) ) , 16, 10 )
//       BETWEEN c.cBegin
//AND c.cEnd
//AND fPY = 'F'

//解释一下：CONVERT是将userName转换成gbk编码（上面已经解释过了），如果你本来就是gbk编码的汉字，那CONVERT这个就可以省略了
//LEFT("",1)是取第一个汉字，HEX是把汉字转换成16进制编码数，CONV("",16,10)就是把16进制转换成10进制，
//整个过程就是：将汉字编码改为gbk，然后取第一个汉字，然后把这个汉字转换成16进制编码，然后把16进制转换成10进制，这样就可以在编码表里查询了（编码表存的明显是10进制）

//js对ABCDEFG点击时可以考虑事件捕获机制（IE不支持）
//[html] view plain copy
//<ul id="manage-ul">
//    <?php
//        for($i=0;$i<26;$i++)
//            echo "<li>".chr($i+65)."</li>";
//
//</ul>
//<script type="text/javascript">
//    var manageUl = document.getElementById("manage-ul");
//    manageUl.addEventListener("click",function(){
//        var selectElement = event.target;
//        selectElement.style.fontWeight="900";
//        selectKey = selectElement.innerHTML;
//        inputData(selectKey);//inputData是用ajax请求数据函数，参数就是要检索的字母，如：F
//    },true);
//</script>
//
//
//[php] view plain copy
//<pre></pre>
//<pre></pre>
//<pre></pre>
//
