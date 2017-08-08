<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 11:13
 */
//header("Content-type:text/html;charset=utf8;");
/**
 * PHP加密解密
 */
//function encryptDecrypt($key, $string, $decrypt){
//    if($decrypt){
//        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "12");
//        return $decrypted;
//    }else{
//        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
//        return $encrypted;
//    }
//}
//加密
//echo encryptDecrypt('password','傻逼',0);
//解密
//echo encryptDecrypt('password','Le7YD5t1sDj6g+63QLADFG8WiF9y5/3D+yOsSf0fASA=',1);

/**
 * php生成随机字符串
 */
//function generateRandomString($length = 10) {
//    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//    $randomString = '';
//    for ($i = 0; $i < $length; $i++) {
//        $randomString .= $characters[rand(0, strlen($characters) - 1)];
//    }
//    return $randomString;
//}

/*
 * 获取文件拓展名
 */
//function getExtension($filename){
//    $myext = substr($filename, strrpos($filename, '.'));  //strrpos返回目标字符串最后一次出现的位置
//    return str_replace('.','',$myext);
//}

/**
 *  获取文件大小并格式化
 */
//function formatSize($size) {
//    $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
//    if ($size == 0) {
//        return('n/a');
//    } else {
//        return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
//    }
//}

/**
 * 获取替换标签字符
 */
//function stringParser($string,$replacer){
//    $result = str_replace(array_keys($replacer), array_values($replacer),$string);
//    return $result;
//}
//$string = 'The {b}anchor text{/b} is the {b}actual word{/b} or words used {br}to describe the link {br}itself';
//$replace_array = array('{b}' => '<b>','{/b}' => '</b>','{br}' => '<br />');
//
//echo stringParser($string,$replace_array);

/**
 * 列出目录下的文件名
 */
//function listDirFiles($DirPath){
//    if($dir = opendir($DirPath)){
//        while(($file = readdir($dir))!== false){
//            if(!is_dir($DirPath.$file))
//            {
//                echo "filename: $file<br />";
//            }
//        }
//    }
//}
//echo listDirFiles('E:\wamp\www\phpStudy');

/**
 * 获取当前页面URL
 */
//function curPageURL() {
//    $pageURL = 'http';
//    if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}//https
//    $pageURL .= "://";//https://
//    if ($_SERVER["SERVER_PORT"] != "80") {
//        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
//    } else {
//        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
//    }
//    return $pageURL;
//}

/**
 *  强制下载文件
 */
//function download($filename){
//    if ((isset($filename))&&(file_exists($filename))){
//        header("Content-length: ".filesize($filename));
//        header('Content-Type: application/octet-stream');
//        header('Content-Disposition: attachment; filename="' . $filename . '"');
//        readfile("$filename");
//    } else {
//        echo "Looks like file does not exist!";
//    }
//}

/*
 * 截取字符串的长度
 */
// Utf-8、gb2312都支持的汉字截取函数
//cut_str(字符串, 截取长度, 开始长度, 编码);
//编码默认为 utf-8
// 开始长度默认为 0
//function cutStr($string, $sublen, $start = 0, $code = 'UTF-8'){
//    if($code == 'UTF-8'){
//        $pa = "/[x01-x7f]|[xc2-xdf][x80-xbf]|xe0[xa0-xbf][x80-xbf]|[xe1-xef][x80-xbf][x80-xbf]|xf0[x90-xbf][x80-xbf][x80-xbf]|[xf1-xf7][x80-xbf][x80-xbf][x80-xbf]/";
//        preg_match_all($pa, $string, $t_string);
//
//        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
//        return join('', array_slice($t_string[0], $start, $sublen));
//    }else{
//        $start = $start*2;
//        $sublen = $sublen*2;
//        $strlen = strlen($string);
//        $tmpstr = '';
//
//        for($i=0; $i<$strlen; $i++){
//            if($i>=$start && $i<($start+$sublen)){
//                if(ord(substr($string, $i, 1))>129){
//                    $tmpstr.= substr($string, $i, 2);
//                }else{
//                    $tmpstr.= substr($string, $i, 1);
//                }
//            }
//            if(ord(substr($string, $i, 1))>129) $i++;
//        }
//        if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
//        return $tmpstr;
//    }
//}
//$str = "jQuery插件实现的加载图片和页面效果";
//echo cutStr($str,16);

/*
 * 获取用户真实IP
 */
//function getIp() {
//    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
//        $ip = getenv("HTTP_CLIENT_IP");
//    else
//        if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
//            $ip = getenv("HTTP_X_FORWARDED_FOR");
//        else
//            if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
//                $ip = getenv("REMOTE_ADDR");
//            else
//                if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
//                    $ip = $_SERVER['REMOTE_ADDR'];
//                else
//                    $ip = "unknown";
//    return ($ip);
//}
//echo getIp();

/*
 * PHP页面提示与跳转
 */
//function message($msgTitle,$message,$jumpUrl){
//    $str = '<!DOCTYPE HTML>';
//    $str .= '<html>';
//    $str .= '<head>';
//    $str .= '<meta charset="utf-8">';
//    $str .= '<title>页面提示</title>';
//    $str .= '<style type="text/css">';
//    $str .= '*{margin:0; padding:0}a{color:#369; text-decoration:none;}a:hover{text-decoration:underline}body{height:100%; font:12px/18px Tahoma, Arial,  sans-serif; color:#424242; background:#fff}.message{width:450px; height:120px; margin:16% auto; border:1px solid #99b1c4; background:#ecf7fb}.message h3{height:28px; line-height:28px; background:#2c91c6; text-align:center; color:#fff; font-size:14px}.msg_txt{padding:10px; margin-top:8px}.msg_txt h4{line-height:26px; font-size:14px}.msg_txt h4.red{color:#f30}.msg_txt p{line-height:22px}';
//    $str .= '</style>';
//    $str .= '</head>';
//    $str .= '<body>';
//    $str .= '<div class="message">';
//    $str .= '<h3>'.$msgTitle.'</h3>';
//    $str .= '<div class="msg_txt">';
//    $str .= '<h4 class="red">'.$message.'</h4>';
//    $str .= '<p>系统将在 <span style="color:blue;font-weight:bold">3</span> 秒后自动跳转,如果不想等待,直接点击 <a href="{$jumpUrl}">这里</a> 跳转</p>';
//    $str .=  "<script>setTimeout('location.replace(\'".$jumpUrl."\')',2000)</script>";
//    $str .= '</div>';
//    $str .= '</div>';
//    $str .= '</body>';
//    $str .= '</html>';
//    echo $str;
//}
//message('操作提示','操作成功！','http://www.baidu.com/');

/*
 * PHP计算时长
 */
//我们在处理时间时，需要计算当前时间距离某个时间点的时长，如计算客户端运行时长，通常用hh:mm:ss表示
//function changeTimeType($seconds) {
//    if ($seconds > 3600) {
//        $hours = intval($seconds / 3600);
//        $minutes = $seconds % 3600;
//        $time = $hours . ":" . gmstrftime('%M:%S', $minutes);
//    } else {
//        $time = gmstrftime('%H:%M:%S', $seconds);
//    }
//    return $time;
//}
//$seconds = 5449;
//echo changeTimeType($seconds);

/**
 * 获取客户端IP
 * @return [string] [description]
 */
//function getClientIp() {
//    $ip = NULL;
//    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
//        $pos = array_search('unknown',$arr);
//        if(false !== $pos) unset($arr[$pos]);
//        $ip = trim($arr[0]);
//    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
//        $ip = $_SERVER['HTTP_CLIENT_IP'];
//    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
//        $ip = $_SERVER['REMOTE_ADDR'];
//    }
//    // IP地址合法验证
//    $ip = (false !== ip2long($ip)) ? $ip : '0.0.0.0';
//    return $ip;
//}

/**
 * 获取在线IP
 * @return String
 */
//function getOnlineIp($format=0) {
//    global $S_GLOBAL;
//    if(empty($S_GLOBAL['onlineip'])) {
//        if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
//            $onlineip = getenv('HTTP_CLIENT_IP');
//        } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
//            $onlineip = getenv('HTTP_X_FORWARDED_FOR');
//        } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
//            $onlineip = getenv('REMOTE_ADDR');
//        } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
//            $onlineip = $_SERVER['REMOTE_ADDR'];
//        }
//        preg_match("/[\d\.]{7,15}/", $onlineip, $onlineipmatches);
//        $S_GLOBAL['onlineip'] = $onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';
//    }
//
//    if($format) {
//        $ips = explode('.', $S_GLOBAL['onlineip']);
//        for($i=0;$i<3;$i++) {
//            $ips[$i] = intval($ips[$i]);
//        }
//        return sprintf('%03d%03d%03d', $ips[0], $ips[1], $ips[2]);
//    } else {
//        return $S_GLOBAL['onlineip'];
//    }
//}

/**
 * 获取url
 * @return [type] [description]
 */
//function getUrl(){
//    $pageURL = 'http';
//    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
//        $pageURL .= "s";
//    }
//    $pageURL .= "://";
//    if ($_SERVER["SERVER_PORT"] != "80") {
//        $pageURL .= $_SERVER["HTTP_HOST"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
//    } else {
//        $pageURL .= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//    }
//    return $pageURL;
//}

/**
 * 获取当前站点的访问路径根目录
 * @return [type] [description]
 */
//function getSiteUrl() {
//    $uri = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
//    return 'http://'.$_SERVER['HTTP_HOST'].substr($uri, 0, strrpos($uri, '/')+1);
//}



/**
 * 字符串截取，支持中文和其他编码
 * @param [string] $str  [字符串]
 * @param integer $start [起始位置]
 * @param integer $length [截取长度]
 * @param string $charset [字符串编码]
 * @param boolean $suffix [是否有省略号]
 * @return [type]   [description]
 */
//function msubstr($str, $start=0, $length=15, $charset="utf-8", $suffix=true) {
//    if(function_exists("mb_substr")) {
//        return mb_substr($str, $start, $length, $charset);
//    } elseif(function_exists('iconv_substr')) {
//        return iconv_substr($str,$start,$length,$charset);
//    }
//    $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
//    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
//    $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
//    $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
//    preg_match_all($re[$charset], $str, $match);
//    $slice = join("",array_slice($match[0], $start, $length));
//    if($suffix) {
//        return $slice."…";
//    }
//    return $slice;
//}

/**
 * php 实现js escape 函数
 * @param [type] $string [description]
 * @param string $encoding [description]
 * @return [type]   [description]
 */
//function escape($string, $encoding = 'UTF-8'){
//    $return = null;
//    for ($x = 0; $x < mb_strlen($string, $encoding);$x ++)
//    {
//        $str = mb_substr($string, $x, 1, $encoding);
//        if (strlen($str) > 1) { // 多字节字符
//            $return .= "%u" . strtoupper(bin2hex(mb_convert_encoding($str, 'UCS-2', $encoding)));
//        } else {
//            $return .= "%" . strtoupper(bin2hex($str));
//        }
//    }
//    return $return;
//}

/**
 * php 实现 js unescape函数
 * @param [type] $str [description]
 * @return [type]  [description]
 */
//function unescape($str) {
//    $str = rawurldecode($str);
//    preg_match_all("/(?:%u.{4})|.{4};|&#\d+;|.+/U",$str,$r);
//    $ar = $r[0];
//    foreach($ar as $k=>$v) {
//        if(substr($v,0,2) == "%u"){
//            $ar[$k] = iconv("UCS-2","utf-8//IGNORE",pack("H4",substr($v,-4)));
//        } elseif(substr($v,0,3) == "") {
//            $ar[$k] = iconv("UCS-2","utf-8",pack("H4",substr($v,3,-1)));
//        } elseif(substr($v,0,2) == "&#") {
//            echo substr($v,2,-1)."";
//            $ar[$k] = iconv("UCS-2","utf-8",pack("n",substr($v,2,-1)));
//        }
//    }
//    return join("",$ar);
//}

/**
 * 数字转人民币
 * @param [type] $num [description]
 * @return [type]  [description]
 */
//function num2rmb ($num) {
//    $c1 = "零壹贰叁肆伍陆柒捌玖";
//    $c2 = "分角元拾佰仟万拾佰仟亿";
//    $num = round($num, 2);
//    $num = $num * 100;
//    if (strlen($num) > 10) {
//        return "oh,sorry,the number is too long!";
//    }
//    $i = 0;
//    $c = "";
//    while (1) {
//        if ($i == 0) {
//            $n = substr($num, strlen($num)-1, 1);
//        } else {
//            $n = $num % 10;
//        }
//        $p1 = substr($c1, 3 * $n, 3);
//        $p2 = substr($c2, 3 * $i, 3);
//        if ($n != '0' || ($n == '0' && ($p2 == '亿' || $p2 == '万' || $p2 == '元'))) {
//            $c = $p1 . $p2 . $c;
//        } else {
//            $c = $p1 . $c;
//        }
//        $i = $i + 1;
//        $num = $num / 10;
//        $num = (int)$num;
//        if ($num == 0) {
//            break;
//        }
//    }
//    $j = 0;
//    $slen = strlen($c);
//    while ($j < $slen) {
//        $m = substr($c, $j, 6);
//        if ($m == '零元' || $m == '零万' || $m == '零亿' || $m == '零零') {
//            $left = substr($c, 0, $j);
//            $right = substr($c, $j + 3);
//            $c = $left . $right;
//            $j = $j-3;
//            $slen = $slen-3;
//        }
//        $j = $j + 3;
//    }
//    if (substr($c, strlen($c)-3, 3) == '零') {
//        $c = substr($c, 0, strlen($c)-3);
//    } // if there is a '0' on the end , chop it out
//    return $c . "整";
//}


/**
 * 特殊的字符
 * @param [type] $str [description]
 * @return [type]  [description]
 */
//function makeSemiangle($str) {
//    $arr = array(
//        '０' => '0', '１' => '1', '２' => '2', '３' => '3', '４' => '4',
//        '５' => '5', '６' => '6', '７' => '7', '８' => '8', '９' => '9',
//        'Ａ' => 'A', 'Ｂ' => 'B', 'Ｃ' => 'C', 'Ｄ' => 'D', 'Ｅ' => 'E',
//        'Ｆ' => 'F', 'Ｇ' => 'G', 'Ｈ' => 'H', 'Ｉ' => 'I', 'Ｊ' => 'J',
//        'Ｋ' => 'K', 'Ｌ' => 'L', 'Ｍ' => 'M', 'Ｎ' => 'N', 'Ｏ' => 'O',
//        'Ｐ' => 'P', 'Ｑ' => 'Q', 'Ｒ' => 'R', 'Ｓ' => 'S', 'Ｔ' => 'T',
//        'Ｕ' => 'U', 'Ｖ' => 'V', 'Ｗ' => 'W', 'Ｘ' => 'X', 'Ｙ' => 'Y',
//        'Ｚ' => 'Z', 'ａ' => 'a', 'ｂ' => 'b', 'ｃ' => 'c', 'ｄ' => 'd',
//        'ｅ' => 'e', 'ｆ' => 'f', 'ｇ' => 'g', 'ｈ' => 'h', 'ｉ' => 'i',
//        'ｊ' => 'j', 'ｋ' => 'k', 'ｌ' => 'l', 'ｍ' => 'm', 'ｎ' => 'n',
//        'ｏ' => 'o', 'ｐ' => 'p', 'ｑ' => 'q', 'ｒ' => 'r', 'ｓ' => 's',
//        'ｔ' => 't', 'ｕ' => 'u', 'ｖ' => 'v', 'ｗ' => 'w', 'ｘ' => 'x',
//        'ｙ' => 'y', 'ｚ' => 'z',
//        '（' => '(', '）' => ')', '〔' => '[', '〕' => ']', '【' => '[',
//        '】' => ']', '〖' => '[', '〗' => ']', '｛' => '{', '｝' => '}', '《' => '<',
//        '》' => '>',
//        '％' => '%', '＋' => '+', '—' => '-', '－' => '-', '～' => '-',
//        '：' => ':', '。' => '.', '、' => ',', '，' => '.', '、' => '.',
//        '；' => ';', '？' => '?', '！' => '!', '…' => '-', '‖' => '|',
//        '”' => '"', '“' => '"', "'" => '`', '‘' => '`', '｜' => '|', '〃' => '"',
//  '　' => ' ','．' => '.');
// return strtr($str, $arr);
//}

/**
 * 下载
 * @param [type] $filename [description]
 * @param string $dir  [description]
 * @return [type]   [description]
 */
//function downloads($filename,$dir='./'){
// $filepath = $dir.$filename;
// if (!file_exists($filepath)){
//  header("Content-type: text/html; charset=utf-8");
//  echo "File not found!";
//  exit;
// } else {
//  $file = fopen($filepath,"r");
//  Header("Content-type: application/octet-stream");
//  Header("Accept-Ranges: bytes");
//  Header("Accept-Length: ".filesize($filepath));
//  Header("Content-Disposition: attachment; filename=".$filename);
//  echo fread($file, filesize($filepath));
//  fclose($file);
// }
//}

/**
 * 创建一个目录树
 * @param [type] $dir [description]
 * @param integer $mode [description]
 * @return [type]  [description]
 */
//function mkdirs($dir, $mode = 0777) {
//        if (!is_dir($dir)) {
//            mkdirs(dirname($dir), $mode);
//            return mkdir($dir, $mode);
//        }
//        return true;
//    }


//class GetPingYing {
//    private $pylist = array(
//        'a'=>-20319,
//        'ai'=>-20317,
//        'an'=>-20304,
//        'ang'=>-20295,
//        'ao'=>-20292,
//        'ba'=>-20283,
//        'bai'=>-20265,
//        'ban'=>-20257,
//        'bang'=>-20242,
//        'bao'=>-20230,
//        'bei'=>-20051,
//        'ben'=>-20036,
//        'beng'=>-20032,
//        'bi'=>-20026,
//        'bian'=>-20002,
//        'biao'=>-19990,
//        'bie'=>-19986,
//        'bin'=>-19982,
//        'bing'=>-19976,
//        'bo'=>-19805,
//        'bu'=>-19784,
//        'ca'=>-19775,
//        'cai'=>-19774,
//        'can'=>-19763,
//        'cang'=>-19756,
//        'cao'=>-19751,
//        'ce'=>-19746,
//        'ceng'=>-19741,
//        'cha'=>-19739,
//        'chai'=>-19728,
//        'chan'=>-19725,
//        'chang'=>-19715,
//        'chao'=>-19540,
//        'che'=>-19531,
//        'chen'=>-19525,
//        'cheng'=>-19515,
//        'chi'=>-19500,
//        'chong'=>-19484,
//        'chou'=>-19479,
//        'chu'=>-19467,
//        'chuai'=>-19289,
//        'chuan'=>-19288,
//        'chuang'=>-19281,
//        'chui'=>-19275,
//        'chun'=>-19270,
//        'chuo'=>-19263,
//        'ci'=>-19261,
//        'cong'=>-19249,
//        'cou'=>-19243,
//        'cu'=>-19242,
//        'cuan'=>-19238,
//        'cui'=>-19235,
//        'cun'=>-19227,
//        'cuo'=>-19224,
//        'da'=>-19218,
//        'dai'=>-19212,
//        'dan'=>-19038,
//        'dang'=>-19023,
//        'dao'=>-19018,
//        'de'=>-19006,
//        'deng'=>-19003,
//        'di'=>-18996,
//        'dian'=>-18977,
//        'diao'=>-18961,
//        'die'=>-18952,
//        'ding'=>-18783,
//        'diu'=>-18774,
//        'dong'=>-18773,
//        'dou'=>-18763,
//        'du'=>-18756,
//        'duan'=>-18741,
//        'dui'=>-18735,
//        'dun'=>-18731,
//        'duo'=>-18722,
//        'e'=>-18710,
//        'en'=>-18697,
//        'er'=>-18696,
//        'fa'=>-18526,
//        'fan'=>-18518,
//        'fang'=>-18501,
//        'fei'=>-18490,
//        'fen'=>-18478,
//        'feng'=>-18463,
//        'fo'=>-18448,
//        'fou'=>-18447,
//        'fu'=>-18446,
//        'ga'=>-18239,
//        'gai'=>-18237,
//        'gan'=>-18231,
//        'gang'=>-18220,
//        'gao'=>-18211,
//        'ge'=>-18201,
//        'gei'=>-18184,
//        'gen'=>-18183,
//        'geng'=>-18181,
//        'gong'=>-18012,
//        'gou'=>-17997,
//        'gu'=>-17988,
//        'gua'=>-17970,
//        'guai'=>-17964,
//        'guan'=>-17961,
//        'guang'=>-17950,
//        'gui'=>-17947,
//        'gun'=>-17931,
//        'guo'=>-17928,
//        'ha'=>-17922,
//        'hai'=>-17759,
//        'han'=>-17752,
//        'hang'=>-17733,
//        'hao'=>-17730,
//        'he'=>-17721,
//        'hei'=>-17703,
//        'hen'=>-17701,
//        'heng'=>-17697,
//        'hong'=>-17692,
//        'hou'=>-17683,
//        'hu'=>-17676,
//        'hua'=>-17496,
//        'huai'=>-17487,
//        'huan'=>-17482,
//        'huang'=>-17468,
//        'hui'=>-17454,
//        'hun'=>-17433,
//        'huo'=>-17427,
//        'ji'=>-17417,
//        'jia'=>-17202,
//        'jian'=>-17185,
//        'jiang'=>-16983,
//        'jiao'=>-16970,
//        'jie'=>-16942,
//        'jin'=>-16915,
//        'jing'=>-16733,
//        'jiong'=>-16708,
//        'jiu'=>-16706,
//        'ju'=>-16689,
//        'juan'=>-16664,
//        'jue'=>-16657,
//        'jun'=>-16647,
//        'ka'=>-16474,
//        'kai'=>-16470,
//        'kan'=>-16465,
//        'kang'=>-16459,
//        'kao'=>-16452,
//        'ke'=>-16448,
//        'ken'=>-16433,
//        'keng'=>-16429,
//        'kong'=>-16427,
//        'kou'=>-16423,
//        'ku'=>-16419,
//        'kua'=>-16412,
//        'kuai'=>-16407,
//        'kuan'=>-16403,
//        'kuang'=>-16401,
//        'kui'=>-16393,
//        'kun'=>-16220,
//        'kuo'=>-16216,
//        'la'=>-16212,
//        'lai'=>-16205,
//        'lan'=>-16202,
//        'lang'=>-16187,
//        'lao'=>-16180,
//        'le'=>-16171,
//        'lei'=>-16169,
//        'leng'=>-16158,
//        'li'=>-16155,
//        'lia'=>-15959,
//        'lian'=>-15958,
//        'liang'=>-15944,
//        'liao'=>-15933,
//        'lie'=>-15920,
//        'lin'=>-15915,
//        'ling'=>-15903,
//        'liu'=>-15889,
//        'long'=>-15878,
//        'lou'=>-15707,
//        'lu'=>-15701,
//        'lv'=>-15681,
//        'luan'=>-15667,
//        'lue'=>-15661,
//        'lun'=>-15659,
//        'luo'=>-15652,
//        'ma'=>-15640,
//        'mai'=>-15631,
//        'man'=>-15625,
//        'mang'=>-15454,
//        'mao'=>-15448,
//        'me'=>-15436,
//        'mei'=>-15435,
//        'men'=>-15419,
//        'meng'=>-15416,
//        'mi'=>-15408,
//        'mian'=>-15394,
//        'miao'=>-15385,
//        'mie'=>-15377,
//        'min'=>-15375,
//        'ming'=>-15369,
//        'miu'=>-15363,
//        'mo'=>-15362,
//        'mou'=>-15183,
//        'mu'=>-15180,
//        'na'=>-15165,
//        'nai'=>-15158,
//        'nan'=>-15153,
//        'nang'=>-15150,
//        'nao'=>-15149,
//        'ne'=>-15144,
//        'nei'=>-15143,
//        'nen'=>-15141,
//        'neng'=>-15140,
//        'ni'=>-15139,
//        'nian'=>-15128,
//        'niang'=>-15121,
//        'niao'=>-15119,
//        'nie'=>-15117,
//        'nin'=>-15110,
//        'ning'=>-15109,
//        'niu'=>-14941,
//        'nong'=>-14937,
//        'nu'=>-14933,
//        'nv'=>-14930,
//        'nuan'=>-14929,
//        'nue'=>-14928,
//        'nuo'=>-14926,
//        'o'=>-14922,
//        'ou'=>-14921,
//        'pa'=>-14914,
//        'pai'=>-14908,
//        'pan'=>-14902,
//        'pang'=>-14894,
//        'pao'=>-14889,
//        'pei'=>-14882,
//        'pen'=>-14873,
//        'peng'=>-14871,
//        'pi'=>-14857,
//        'pian'=>-14678,
//        'piao'=>-14674,
//        'pie'=>-14670,
//        'pin'=>-14668,
//        'ping'=>-14663,
//        'po'=>-14654,
//        'pu'=>-14645,
//        'qi'=>-14630,
//        'qia'=>-14594,
//        'qian'=>-14429,
//        'qiang'=>-14407,
//        'qiao'=>-14399,
//        'qie'=>-14384,
//        'qin'=>-14379,
//        'qing'=>-14368,
//        'qiong'=>-14355,
//        'qiu'=>-14353,
//        'qu'=>-14345,
//        'quan'=>-14170,
//        'que'=>-14159,
//        'qun'=>-14151,
//        'ran'=>-14149,
//        'rang'=>-14145,
//        'rao'=>-14140,
//        're'=>-14137,
//        'ren'=>-14135,
//        'reng'=>-14125,
//        'ri'=>-14123,
//        'rong'=>-14122,
//        'rou'=>-14112,
//        'ru'=>-14109,
//        'ruan'=>-14099,
//        'rui'=>-14097,
//        'run'=>-14094,
//        'ruo'=>-14092,
//        'sa'=>-14090,
//        'sai'=>-14087,
//        'san'=>-14083,
//        'sang'=>-13917,
//        'sao'=>-13914,
//        'se'=>-13910,
//        'sen'=>-13907,
//        'seng'=>-13906,
//        'sha'=>-13905,
//        'shai'=>-13896,
//        'shan'=>-13894,
//        'shang'=>-13878,
//        'shao'=>-13870,
//        'she'=>-13859,
//        'shen'=>-13847,
//        'sheng'=>-13831,
//        'shi'=>-13658,
//        'shou'=>-13611,
//        'shu'=>-13601,
//        'shua'=>-13406,
//        'shuai'=>-13404,
//        'shuan'=>-13400,
//        'shuang'=>-13398,
//        'shui'=>-13395,
//        'shun'=>-13391,
//        'shuo'=>-13387,
//        'si'=>-13383,
//        'song'=>-13367,
//        'sou'=>-13359,
//        'su'=>-13356,
//        'suan'=>-13343,
//        'sui'=>-13340,
//        'sun'=>-13329,
//        'suo'=>-13326,
//        'ta'=>-13318,
//        'tai'=>-13147,
//        'tan'=>-13138,
//        'tang'=>-13120,
//        'tao'=>-13107,
//        'te'=>-13096,
//        'teng'=>-13095,
//        'ti'=>-13091,
//        'tian'=>-13076,
//        'tiao'=>-13068,
//        'tie'=>-13063,
//        'ting'=>-13060,
//        'tong'=>-12888,
//        'tou'=>-12875,
//        'tu'=>-12871,
//        'tuan'=>-12860,
//        'tui'=>-12858,
//        'tun'=>-12852,
//        'tuo'=>-12849,
//        'wa'=>-12838,
//        'wai'=>-12831,
//        'wan'=>-12829,
//        'wang'=>-12812,
//        'wei'=>-12802,
//        'wen'=>-12607,
//        'weng'=>-12597,
//        'wo'=>-12594,
//        'wu'=>-12585,
//        'xi'=>-12556,
//        'xia'=>-12359,
//        'xian'=>-12346,
//        'xiang'=>-12320,
//        'xiao'=>-12300,
//        'xie'=>-12120,
//        'xin'=>-12099,
//        'xing'=>-12089,
//        'xiong'=>-12074,
//        'xiu'=>-12067,
//        'xu'=>-12058,
//        'xuan'=>-12039,
//        'xue'=>-11867,
//        'xun'=>-11861,
//        'ya'=>-11847,
//        'yan'=>-11831,
//        'yang'=>-11798,
//        'yao'=>-11781,
//        'ye'=>-11604,
//        'yi'=>-11589,
//        'yin'=>-11536,
//        'ying'=>-11358,
//        'yo'=>-11340,
//        'yong'=>-11339,
//        'you'=>-11324,
//        'yu'=>-11303,
//        'yuan'=>-11097,
//        'yue'=>-11077,
//        'yun'=>-11067,
//        'za'=>-11055,
//        'zai'=>-11052,
//        'zan'=>-11045,
//        'zang'=>-11041,
//        'zao'=>-11038,
//        'ze'=>-11024,
//        'zei'=>-11020,
//        'zen'=>-11019,
//        'zeng'=>-11018,
//        'zha'=>-11014,
//        'zhai'=>-10838,
//        'zhan'=>-10832,
//        'zhang'=>-10815,
//        'zhao'=>-10800,
//        'zhe'=>-10790,
//        'zhen'=>-10780,
//        'zheng'=>-10764,
//        'zhi'=>-10587,
//        'zhong'=>-10544,
//        'zhou'=>-10533,
//        'zhu'=>-10519,
//        'zhua'=>-10331,
//        'zhuai'=>-10329,
//        'zhuan'=>-10328,
//        'zhuang'=>-10322,
//        'zhui'=>-10315,
//        'zhun'=>-10309,
//        'zhuo'=>-10307,
//        'zi'=>-10296,
//        'zong'=>-10281,
//        'zou'=>-10274,
//        'zu'=>-10270,
//        'zuan'=>-10262,
//        'zui'=>-10260,
//        'zun'=>-10256,
//        'zuo'=>-10254
//    );
//    //全部拼音
//    public function getAllPY($chinese, $delimiter = '', $length = 0) {
//        $py = $this->zh_to_pys($chinese, $delimiter);
//        if($length) {
//            $py = substr($py, 0, $length);
//        }
//        return $py;
//    }
//    //拼音首个字母
//    public function getFirstPY($chinese){
//        $result = '' ;
//        for ($i=0; $i<strlen($chinese); $i++) {
//            $p = ord(substr($chinese,$i,1));
//            if ($p>160) {
//                $q = ord(substr($chinese,++$i,1));
//                $p = $p*256 + $q - 65536;
//            }
//            $result .= substr($this->zh_to_py($p),0,1);
//        }
//        return $result ;
//    }
//
//
//    //-------------------中文转拼音--------------------------------//
//    private function zh_to_py($num, $blank = '') {
//        if($num>0 && $num<160 ) {
//            return chr($num);
//        } elseif ($num<-20319||$num>-10247) {
//            return $blank;
//        } else {
//            foreach ($this->pylist as $py => $code) {
//                if($code > $num) break;
//                $result = $py;
//            }
//            return $result;
//        }
//    }
//
//
//    private function zh_to_pys($chinese, $delimiter = ' ', $first=0){
//        $result = array();
//        for($i=0; $i<strlen($chinese); $i++) {
//            $p = ord(substr($chinese,$i,1));
//            if($p>160) {
//                $q = ord(substr($chinese,++$i,1));
//                $p = $p*256 + $q - 65536;
//            }
//            $result[] = $this->zh_to_py($p);
//            if ($first) {
//                return $result[0];
//            }
//        }
//        return implode($delimiter, $result);
//    }
//}
////-------------------------中文转拼音结束--------------------------------//
////中文是双字节，所以需要两个字节连接起来(ASCII码的范围是在161-255)
//
//$c = '齐秦';
//for($i=0; $i<strlen($c); $i++) {
//    echo ord($c[$i]).' ';//198 235 199 216
//}
//echo '<br>',chr(198).chr(235).chr(199).chr(216),'<br>';
//
//
////测试
//header('Content-type:text/html;charset=gb2312;');
//$PingYing = new GetPingYing();
//echo '<br>',$PingYing->getFirstPY('羽泉乐队，歌不错-推荐'),'<br>';//yqldgbc-tj
//echo $PingYing->getAllPY('羽泉乐队，歌不错-推荐'),'<br>';   //yuquanleduigebucuo-tuijian

/**
 * PHP 汉字转拼音
 * @author Jerryli(hzjerry@gmail.com)
 * @version V0.20140715
 * @package SPFW.core.lib.final
 * @global SEA_PHP_FW_VAR_ENV
 * @example
 *  echo CUtf8_PY::encode('阿里巴巴科技有限公司'); //编码为拼音首字母
 *  echo CUtf8_PY::encode('阿里巴巴科技有限公司', 'all'); //编码为全拼音
 */
//class CUtf8_PY {
//    /**
//     * 拼音字符转换图
//     * @var array
//     */
//    private static $_aMaps = array(
//        'a'=>-20319,'ai'=>-20317,'an'=>-20304,'ang'=>-20295,'ao'=>-20292,
//        'ba'=>-20283,'bai'=>-20265,'ban'=>-20257,'bang'=>-20242,'bao'=>-20230,'bei'=>-20051,'ben'=>-20036,'beng'=>-20032,'bi'=>-20026,'bian'=>-20002,'biao'=>-19990,'bie'=>-19986,'bin'=>-19982,'bing'=>-19976,'bo'=>-19805,'bu'=>-19784,
//        'ca'=>-19775,'cai'=>-19774,'can'=>-19763,'cang'=>-19756,'cao'=>-19751,'ce'=>-19746,'ceng'=>-19741,'cha'=>-19739,'chai'=>-19728,'chan'=>-19725,'chang'=>-19715,'chao'=>-19540,'che'=>-19531,'chen'=>-19525,'cheng'=>-19515,'chi'=>-19500,'chong'=>-19484,'chou'=>-19479,'chu'=>-19467,'chuai'=>-19289,'chuan'=>-19288,'chuang'=>-19281,'chui'=>-19275,'chun'=>-19270,'chuo'=>-19263,'ci'=>-19261,'cong'=>-19249,'cou'=>-19243,'cu'=>-19242,'cuan'=>-19238,'cui'=>-19235,'cun'=>-19227,'cuo'=>-19224,
//        'da'=>-19218,'dai'=>-19212,'dan'=>-19038,'dang'=>-19023,'dao'=>-19018,'de'=>-19006,'deng'=>-19003,'di'=>-18996,'dian'=>-18977,'diao'=>-18961,'die'=>-18952,'ding'=>-18783,'diu'=>-18774,'dong'=>-18773,'dou'=>-18763,'du'=>-18756,'duan'=>-18741,'dui'=>-18735,'dun'=>-18731,'duo'=>-18722,
//        'e'=>-18710,'en'=>-18697,'er'=>-18696,
//        'fa'=>-18526,'fan'=>-18518,'fang'=>-18501,'fei'=>-18490,'fen'=>-18478,'feng'=>-18463,'fo'=>-18448,'fou'=>-18447,'fu'=>-18446,
//        'ga'=>-18239,'gai'=>-18237,'gan'=>-18231,'gang'=>-18220,'gao'=>-18211,'ge'=>-18201,'gei'=>-18184,'gen'=>-18183,'geng'=>-18181,'gong'=>-18012,'gou'=>-17997,'gu'=>-17988,'gua'=>-17970,'guai'=>-17964,'guan'=>-17961,'guang'=>-17950,'gui'=>-17947,'gun'=>-17931,'guo'=>-17928,
//        'ha'=>-17922,'hai'=>-17759,'han'=>-17752,'hang'=>-17733,'hao'=>-17730,'he'=>-17721,'hei'=>-17703,'hen'=>-17701,'heng'=>-17697,'hong'=>-17692,'hou'=>-17683,'hu'=>-17676,'hua'=>-17496,'huai'=>-17487,'huan'=>-17482,'huang'=>-17468,'hui'=>-17454,'hun'=>-17433,'huo'=>-17427,
//        'ji'=>-17417,'jia'=>-17202,'jian'=>-17185,'jiang'=>-16983,'jiao'=>-16970,'jie'=>-16942,'jin'=>-16915,'jing'=>-16733,'jiong'=>-16708,'jiu'=>-16706,'ju'=>-16689,'juan'=>-16664,'jue'=>-16657,'jun'=>-16647,
//        'ka'=>-16474,'kai'=>-16470,'kan'=>-16465,'kang'=>-16459,'kao'=>-16452,'ke'=>-16448,'ken'=>-16433,'keng'=>-16429,'kong'=>-16427,'kou'=>-16423,'ku'=>-16419,'kua'=>-16412,'kuai'=>-16407,'kuan'=>-16403,'kuang'=>-16401,'kui'=>-16393,'kun'=>-16220,'kuo'=>-16216,
//        'la'=>-16212,'lai'=>-16205,'lan'=>-16202,'lang'=>-16187,'lao'=>-16180,'le'=>-16171,'lei'=>-16169,'leng'=>-16158,'li'=>-16155,'lia'=>-15959,'lian'=>-15958,'liang'=>-15944,'liao'=>-15933,'lie'=>-15920,'lin'=>-15915,'ling'=>-15903,'liu'=>-15889,'long'=>-15878,'lou'=>-15707,'lu'=>-15701,'lv'=>-15681,'luan'=>-15667,'lue'=>-15661,'lun'=>-15659,'luo'=>-15652,
//        'ma'=>-15640,'mai'=>-15631,'man'=>-15625,'mang'=>-15454,'mao'=>-15448,'me'=>-15436,'mei'=>-15435,'men'=>-15419,'meng'=>-15416,'mi'=>-15408,'mian'=>-15394,'miao'=>-15385,'mie'=>-15377,'min'=>-15375,'ming'=>-15369,'miu'=>-15363,'mo'=>-15362,'mou'=>-15183,'mu'=>-15180,
//        'na'=>-15165,'nai'=>-15158,'nan'=>-15153,'nang'=>-15150,'nao'=>-15149,'ne'=>-15144,'nei'=>-15143,'nen'=>-15141,'neng'=>-15140,'ni'=>-15139,'nian'=>-15128,'niang'=>-15121,'niao'=>-15119,'nie'=>-15117,'nin'=>-15110,'ning'=>-15109,'niu'=>-14941,'nong'=>-14937,'nu'=>-14933,'nv'=>-14930,'nuan'=>-14929,'nue'=>-14928,'nuo'=>-14926,
//        'o'=>-14922,'ou'=>-14921,
//        'pa'=>-14914,'pai'=>-14908,'pan'=>-14902,'pang'=>-14894,'pao'=>-14889,'pei'=>-14882,'pen'=>-14873,'peng'=>-14871,'pi'=>-14857,'pian'=>-14678,'piao'=>-14674,'pie'=>-14670,'pin'=>-14668,'ping'=>-14663,'po'=>-14654,'pu'=>-14645,
//        'qi'=>-14630,'qia'=>-14594,'qian'=>-14429,'qiang'=>-14407,'qiao'=>-14399,'qie'=>-14384,'qin'=>-14379,'qing'=>-14368,'qiong'=>-14355,'qiu'=>-14353,'qu'=>-14345,'quan'=>-14170,'que'=>-14159,'qun'=>-14151,
//        'ran'=>-14149,'rang'=>-14145,'rao'=>-14140,'re'=>-14137,'ren'=>-14135,'reng'=>-14125,'ri'=>-14123,'rong'=>-14122,'rou'=>-14112,'ru'=>-14109,'ruan'=>-14099,'rui'=>-14097,'run'=>-14094,'ruo'=>-14092,
//        'sa'=>-14090,'sai'=>-14087,'san'=>-14083,'sang'=>-13917,'sao'=>-13914,'se'=>-13910,'sen'=>-13907,'seng'=>-13906,'sha'=>-13905,'shai'=>-13896,'shan'=>-13894,'shang'=>-13878,'shao'=>-13870,'she'=>-13859,'shen'=>-13847,'sheng'=>-13831,'shi'=>-13658,'shou'=>-13611,'shu'=>-13601,'shua'=>-13406,'shuai'=>-13404,'shuan'=>-13400,'shuang'=>-13398,'shui'=>-13395,'shun'=>-13391,'shuo'=>-13387,'si'=>-13383,'song'=>-13367,'sou'=>-13359,'su'=>-13356,'suan'=>-13343,'sui'=>-13340,'sun'=>-13329,'suo'=>-13326,
//        'ta'=>-13318,'tai'=>-13147,'tan'=>-13138,'tang'=>-13120,'tao'=>-13107,'te'=>-13096,'teng'=>-13095,'ti'=>-13091,'tian'=>-13076,'tiao'=>-13068,'tie'=>-13063,'ting'=>-13060,'tong'=>-12888,'tou'=>-12875,'tu'=>-12871,'tuan'=>-12860,'tui'=>-12858,'tun'=>-12852,'tuo'=>-12849,
//        'wa'=>-12838,'wai'=>-12831,'wan'=>-12829,'wang'=>-12812,'wei'=>-12802,'wen'=>-12607,'weng'=>-12597,'wo'=>-12594,'wu'=>-12585,
//        'xi'=>-12556,'xia'=>-12359,'xian'=>-12346,'xiang'=>-12320,'xiao'=>-12300,'xie'=>-12120,'xin'=>-12099,'xing'=>-12089,'xiong'=>-12074,'xiu'=>-12067,'xu'=>-12058,'xuan'=>-12039,'xue'=>-11867,'xun'=>-11861,
//        'ya'=>-11847,'yan'=>-11831,'yang'=>-11798,'yao'=>-11781,'ye'=>-11604,'yi'=>-11589,'yin'=>-11536,'ying'=>-11358,'yo'=>-11340,'yong'=>-11339,'you'=>-11324,'yu'=>-11303,'yuan'=>-11097,'yue'=>-11077,'yun'=>-11067,
//        'za'=>-11055,'zai'=>-11052,'zan'=>-11045,'zang'=>-11041,'zao'=>-11038,'ze'=>-11024,'zei'=>-11020,'zen'=>-11019,'zeng'=>-11018,'zha'=>-11014,'zhai'=>-10838,'zhan'=>-10832,'zhang'=>-10815,'zhao'=>-10800,'zhe'=>-10790,'zhen'=>-10780,'zheng'=>-10764,'zhi'=>-10587,'zhong'=>-10544,'zhou'=>-10533,'zhu'=>-10519,'zhua'=>-10331,'zhuai'=>-10329,'zhuan'=>-10328,'zhuang'=>-10322,'zhui'=>-10315,'zhun'=>-10309,'zhuo'=>-10307,'zi'=>-10296,'zong'=>-10281,'zou'=>-10274,'zu'=>-10270,'zuan'=>-10262,'zui'=>-10260,'zun'=>-10256,'zuo'=>-10254
//    );
//
//    /**
//     * 将中文编码成拼音
//     * @param string $utf8Data utf8字符集数据
//     * @param string $sRetFormat 返回格式 [head:首字母|all:全拼音]
//     * @return string
//     */
//    public static function encode($utf8Data, $sRetFormat='head'){
//        $sGBK = iconv('UTF-8', 'GBK', $utf8Data);
//        $aBuf = array();
//        for ($i=0, $iLoop=strlen($sGBK); $i<$iLoop; $i++) {
//            $iChr = ord($sGBK{$i});
//            if ($iChr>160)
//                $iChr = ($iChr<<8) + ord($sGBK{++$i}) - 65536;
//            if ('head' === $sRetFormat)
//                $aBuf[] = substr(self::zh2py($iChr),0,1);
//            else
//                $aBuf[] = self::zh2py($iChr);
//        }
//        if ('head' === $sRetFormat)
//            return implode('', $aBuf);
//        else
//            return implode(' ', $aBuf);
//    }
//
//    /**
//     * 中文转换到拼音(每次处理一个字符)
//     * @param number $iWORD 待处理字符双字节
//     * @return string 拼音
//     */
//    public static function zh2py($iWORD) {
//        if($iWORD>0 && $iWORD<160 ) {
//            return chr($iWORD);
//        } elseif ($iWORD<-20319||$iWORD>-10247) {
//            return '';
//        } else {
//            foreach (self::$_aMaps as $py => $code) {
//                if($code > $iWORD) break;
//                $result = $py;
//            }
//            return $result;
//        }
//    }
//}
//$py = new CUtf8_PY();
//var_dump($py->encode('榆木','all'));
//var_dump($py->zh2py('111'));

//function getfirstchar($s0){
//    $fchar = ord($s0{0});
//    if($fchar >= ord("a") and $fchar <= ord("Z") )return strtoupper($s0{0});
//    $s1 = iconv("UTF-8","gb2312//IGNORE", $s0);
//    $s2 = iconv("gb2312//IGNORE","UTF-8", $s1);
//    if($s2 == $s0){$s = $s1;}else{$s = $s0;}
//    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
//    if($asc >= -20319 and $asc <= -20284) return "A";
//    if($asc >= -20283 and $asc <= -19776) return "B";
//    if($asc >= -19775 and $asc <= -19219) return "C";
//    if($asc >= -19218 and $asc <= -18711) return "D";
//    if($asc >= -18710 and $asc <= -18527) return "E";
//    if($asc >= -18526 and $asc <= -18240) return "F";
//    if($asc >= -18239 and $asc <= -17923) return "G";
//    if($asc >= -17922 and $asc <= -17418) return "H";
//    if($asc >= -17417 and $asc <= -16475) return "J";
//    if($asc >= -16474 and $asc <= -16213) return "K";
//    if($asc >= -16212 and $asc <= -15641) return "L";
//    if($asc >= -15640 and $asc <= -15166) return "M";
//    if($asc >= -15165 and $asc <= -14923) return "N";
//    if($asc >= -14922 and $asc <= -14915) return "O";
//    if($asc >= -14914 and $asc <= -14631) return "P";
//    if($asc >= -14630 and $asc <= -14150) return "Q";
//    if($asc >= -14149 and $asc <= -14091) return "R";
//    if($asc >= -14090 and $asc <= -13319) return "S";
//    if($asc >= -13318 and $asc <= -12839) return "T";
//    if($asc >= -12838 and $asc <= -12557) return "W";
//    if($asc >= -12556 and $asc <= -11848) return "X";
//    if($asc >= -11847 and $asc <= -11056) return "Y";
//    if($asc >= -11055 and $asc <= -10247) return "Z";
//    return null;
//}
//function pinyin1($zh){
//    $ret = "";
//    $s1 = iconv("UTF-8","gb2312", $zh);
//    $s2 = iconv("gb2312","UTF-8", $s1);
//    if($s2 == $zh){$zh = $s1;}
//    for($i = 0; $i < strlen($zh); $i++){
//        $s1 = substr($zh,$i,1);
//        $p = ord($s1);
//        if($p > 160){
//            $s2 = substr($zh,$i++,2);
//            $ret .= getfirstchar($s2);
//        }else{
//            $ret .= $s1;
//        }
//    }
//    return $ret;
//}
//var_dump(getfirstchar('ni'));

/**
 * @param $address
 * @return bool
 * 检查邮件地址是否有效
 */
//function valid_email($address){
//    if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',$address)){
//        return true;
//    }else{
//        return false;
//    }
//}
//
//var_dump(valid_email('281587864@qq.com'));

/**
 * 识别当前脚本运行的所有者
 */
//echo get_current_user();


/**
 * 确定脚本最近修改时间
 */
//ini_set('date.timezone','Asia/Shanghai');
//echo date('g:i a, j M Y',getlastmod());


/**
 * 加密
 * @param string $string     要加密或解密的字符串
 * @param string $operation 加密 ''  解密 DECODE
 * @param string $key        密钥，加密解密时保持一致
 * @param int    $expiry 有效时长，单位：秒
 * @return string
 */
function encrypt_code($string, $expiry = 0, $key = 'abc12345') {
    $ckey_length = 7;
    $key = md5($key ? $key : UC_KEY); //加密解密时这个是不变的
    $keya = md5(substr($key, 0, 16)); //加密解密时这个是不变的
    $keyb = md5(substr($key, 16, 16)); //加密解密时这个是不变的
    $keyc = $ckey_length ?  substr(md5(microtime()), -$ckey_length) : '';
    $cryptkey = $keya . md5($keya . $keyc); //64
    $key_length = strlen($cryptkey); //64

    $string =sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
    $string_length = strlen($string);

    $result = '';
    $box = range(0, 255);

    $rndkey = array();
    for ($i = 0; $i <= 255; $i++) { //字母表 64位后重复 数列 范围为48~122
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }

    for ($j = $i = 0; $i < 256; $i++) { //这里是一个打乱算法
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $result .= chr(ord($string[$i]) ^ ($box[$i]));

    }
    $str =  $keyc . str_replace('=', '', urlsafe_b64encode($result));
    //  $str =htmlentities($str, ENT_QUOTES, "UTF-8"); // curl 访问出错
    return $str ;
}

/**
 * 解密
 * @param string $string     要加密或解密的字符串
 * @param string $operation 加密 ''  解密 DECODE
 * @param string $key        密钥，加密解密时保持一致
 * @param int    $expiry 有效时长，单位：秒
 * @return string
 */
function encrypt_decode($string, $expiry = 0,$key = 'abc12345') {
    //  $string = html_entity_decode($string, ENT_QUOTES, "UTF-8") ; //curl 访问出错
    $ckey_length = 7;
    $key = md5($key ? $key : UC_KEY); //加密解密时这个是不变的
    $keya = md5(substr($key, 0, 16)); //加密解密时这个是不变的
    $keyb = md5(substr($key, 16, 16)); //加密解密时这个是不变的

    $keyc = $ckey_length ?  substr($string, 0, $ckey_length)   : '';

    $cryptkey = $keya . md5($keya . $keyc); //64
    $key_length = strlen($cryptkey); //64
    $string = urlsafe_b64decode(substr($string, $ckey_length)) ;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);

    $rndkey = array();
    for ($i = 0; $i <= 255; $i++) { //字母表 64位后重复 数列 范围为48~122
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    for ($j = $i = 0; $i < 256; $i++) { //这里是一个打乱算法
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;

        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $result .= chr(ord($string[$i]) ^ ($box[$i]));
    }
    if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
        return substr($result, 26);
    } else {
        return false;
    }

}




/**
 * URL加密解密函数
 */
//加密函数
//function lock_url($txt,$key='www.zhuoyuexiazai.com'){
//    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-=+";
//    $nh = rand(0,64);
//    $ch = $chars[$nh];
//    $mdKey = md5($key.$ch);
//    $mdKey = substr($mdKey,$nh%8, $nh%8+7);
//    $txt = base64_encode($txt);
//    $tmp = '';
//    $i=0;$j=0;$k = 0;
//    for ($i=0; $i<strlen($txt); $i++) {
//        $k = $k == strlen($mdKey) ? 0 : $k;
//        $j = ($nh+strpos($chars,$txt[$i])+ord($mdKey[$k++]))%64;
//        $tmp .= $chars[$j];
//    }
//    return urlencode($ch.$tmp);
//}

//解密函数
//function unlock_url($txt,$key='www.zhuoyuexiazai.com'){
//    $txt = urldecode($txt);
//    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-=+";
//    $ch = $txt[0];
//    $nh = strpos($chars,$ch);
//    $mdKey = md5($key.$ch);
//    $mdKey = substr($mdKey,$nh%8, $nh%8+7);
//    $txt = substr($txt,1);
//    $tmp = '';
//    $i=0;$j=0; $k = 0;
//    for ($i=0; $i<strlen($txt); $i++) {
//        $k = $k == strlen($mdKey) ? 0 : $k;
//        $j = strpos($chars,$txt[$i])-$nh - ord($mdKey[$k++]);
//        while ($j<0) $j+=64;
//        $tmp .= $chars[$j];
//    }
//    return base64_decode($tmp);
//}

/**
 * 用户密码可逆加密解密函数：
 */
//function passport_encrypt($txt, $key = 'www.zhuoyuexiazai.com') {
//    srand((double)microtime() * 1000000);
//    $encrypt_key = md5(rand(0, 32000));
//    $ctr = 0;
//    $tmp = '';
//    for($i = 0;$i < strlen($txt); $i++) {
//        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
//        $tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
//    }
//    return urlencode(base64_encode(passport_key($tmp, $key)));
//}
//
//function passport_decrypt($txt, $key = 'www.zhuoyuexiazai.com') {
//    $txt = passport_key(base64_decode(urldecode($txt)), $key);
//    $tmp = '';
//    for($i = 0;$i < strlen($txt); $i++) {
//        $md5 = $txt[$i];
//        $tmp .= $txt[++$i] ^ $md5;
//    }
//    return $tmp;
//}
//
//function passport_key($txt, $encrypt_key) {
//    $encrypt_key = md5($encrypt_key);
//    $ctr = 0;
//    $tmp = '';
//    for($i = 0; $i < strlen($txt); $i++) {
//        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
//        $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
//    }
//    return $tmp;
//}
////测试：
//$txt = "1";
//$key = "testkey";
//$encrypt = passport_encrypt($txt,$key);
//$decrypt = passport_decrypt($encrypt,$key);
//
//echo $encrypt."<br>";
//echo $decrypt."<br>";


/**
 * SHA1的可逆加密解密函数：
 */
$str = sha1("kihoihohj");

echo $str1 = dencrypt($str, true, "www.miaohr.com");
echo "<br/>";
echo $str2 = dencrypt($str1, false, "www.miaohr.com");

function dencrypt($string, $isEncrypt = true, $key = KEY_SPACE) {
    if (!isset($string{0}) || !isset($key{0})) {
        return false;
    }

    $dynKey = $isEncrypt ? hash('sha1', microtime(true)) : substr($string, 0, 40);
    $fixedKey = hash('sha1', $key);

    $dynKeyPart1 = substr($dynKey, 0, 20);
    $dynKeyPart2 = substr($dynKey, 20);
    $fixedKeyPart1 = substr($fixedKey, 0, 20);
    $fixedKeyPart2 = substr($fixedKey, 20);
    $key = hash('sha1', $dynKeyPart1 . $fixedKeyPart1 . $dynKeyPart2 . $fixedKeyPart2);

    $string = $isEncrypt ? $fixedKeyPart1 . $string . $dynKeyPart2 : (isset($string{339}) ? gzuncompress(base64_decode(substr($string, 40))) : base64_decode(substr($string, 40)));

    $n = 0;
    $result = '';
    $len = strlen($string);

    for ($n = 0; $n < $len; $n++) {
        $result .= chr(ord($string{$n}) ^ ord($key{$n % 40}));
    }
    return $isEncrypt ? $dynKey . str_replace('=', '', base64_encode($n > 299 ? gzcompress($result) : $result)) : substr($result, 20, -20);
}



/**
 * DES的加密解密函数：
 */
//$input ='http://mlaan2.home.xs4all.nl/ispack/isetup-5.5.3.exe';
///**
// *加密函数
// *$input 要被加密的字符串
// *$key 密钥
// */
//
//$key = randomkeys(8);//生成随机密匙
//function do_mencrypt($input, $key)
//{
//    $input = base64_encode(trim($input));
//    //$key = substr(md5($key), 0, 4);
//    $td = mcrypt_module_open('des', '', 'ecb', '');
//    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
//    mcrypt_generic_init($td, $key, $iv);
//    $encrypted_data = mcrypt_generic($td, $input);
//    mcrypt_generic_deinit($td);
//    mcrypt_module_close($td);
//    return trim(base64_encode($encrypted_data));
//}
//print_r(do_mencrypt($input, $key));
//echo "<br/>";
///**
// *解密函数
// *$input 要被解密的字符串
// *$key 密钥
// */
//$input1 = do_mencrypt($input, $key);
//function do_mdecrypt($input1, $key)
//{
//    $input1 = base64_decode(trim($input1));
//    $td = mcrypt_module_open('des', '', 'ecb', '');
//    //$key = substr(md5($key), 0, 4);
//    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
//    mcrypt_generic_init($td, $key, $iv);
//    $decrypted_data = mdecrypt_generic($td, $input1);
//    mcrypt_generic_deinit($td);
//    mcrypt_module_close($td);
//    return trim(base64_decode($decrypted_data));
//}
//print_r(do_mdecrypt($input1, $key));
//
//#2.rand key: "CWSTOAYD"：生成随机密匙，统一用字母或者数字，长度为8.
//function randomkeys($length)
//{
//    $pattern = '1234567890';
//    for($i=0;$i<$length;$i++)
//    {
//        @$key .= $pattern{rand(0,9)};    //生成php随机数
//    }
//    return $key;
//}