<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/14
 * Time: 5:10
 */
class PageClass{
    private $myde_count;        //总记录数
    var $myde_size;            //每页记录数
    private $myde_page;         //当前页
    private $myde_page_count;     //总页数
    private $page_url;          //页面url
    private $page_start;        //起始页
    private $page_end;          //结束页
    var $page_limit;
    //构造函数
    function __construct($myde_count=1, $myde_size=1, $myde_page=1, $page_url)
    {
        $this->my_count = $this-> numeric($myde_count);
        $this->myde_size = $this-> numeric($myde_size);
        $this->myde_page = $this-> numeric($myde_page);
        $this->page_limit = ($this->myde_page * $this->myde_size) - $this->myde_size;
        $this->page_url = $page_url;
        if ($this->myde_page < 1)
            $this->myde_page = 1;
        if ($this->myde_count < 0)
            $this->myde_page = 0;
        $this->myde_page_count = ceil($this->myde_count/$this->myde_size);
        if ($this->myde_page_count < 1 )
            $this->myde_page_count = 1;
        if ($this->myde_page > $this->myde_page_count)
            $this->myde_page = $this->myde_page_count;
        $this->page_start = $this->myde_page - 2;
        $this->page_end = $this->myde_page + 2;
        if ($this->page_start < 1){
            $this->page_end = $this->page_end + (1 - $this->page_start);
            $this->page_start = 1;
        }
        if ($this->page_end > $this->myde_page_count) {
            $this->page_start = $this->page_start - ($this->page_end - $this->myde_page_count);
            $this->page_end = $this->myde_page_count;
            if ($this->page_start < 1) {
                $this->page_start = 1;

            }
        }
    }
    //判断是否为数字
    private function numeric($id){
        if (strlen($id)){
            if (!ereg("^[0-9]+$",$id)){
                $id = 1;
            }else{
                $id = substr($id,0,11);
            }
        }else{
            $id = 1;
        }
        return $id;
    }
    //地址替换
    private function page_replace($page){
        return str_replace("{$page}", $page, $this->page_url);
    }
    //首页
    private function myde_home(){
        if ($this->myde_page !=1 ){
            return "    <li class=\"page_a\"><a href=\"".
                $this->page_replace(1)."\" title=\"首页\">首页</a></li>\n";
        }else{
            return "    <li>首页</li>\n";
        }
    }
    //上一页
    private function myde_prev(){
        if ($this->myde_page != 1){
            return "    <li class=\"page_a\"><a href=\"".
                $this->page_replace($this->myde_page-1)."\"
                title=\"上一页\">上一页</a></li>\n";
        }else{
            return "    <li>上一页</li>\n";
        }
    }
    //下一页
    private function myde_next(){
        if ($this->myde_page != $this->myde_page_count){
            return "　　<li class=\"page_a\"><a href=\"".
                $this->page_replace($this->myde_page + 1)."\"
                title=\"下一页\">下一页</a></li>\n";
        }else{
            return "    <li>下一页</li>\n";
        }
    }
    //尾页
    private function myde_last(){
        if ($this->myde_page != $this->myde_page_count){
            return "    <li class=\"page_a\"><a href=\"".$this->
                page_replace($this->myde_page_count)."\" 
                title=\"尾页\">尾页</a></li>\n";
        }else{
            return "    <li>尾页</li>\n";
        }
    }
    //输出
    function myde_write($id = 'page'){
        $str = "<div id=\"".$id."\" class=\"pages\">\n vul>\n";
        $str .= "  <li>总记录：<span>".$this -> myde_count."</span></li>\n";

        $str .= "    <li><span>".$this -> myde_page."</span>/<span>".$this -> myde_page_count."</span></li>\n";

        $str .= $this -> myde_home();

        $str .= $this -> myde_prev();

        for($page_for_i = $this -> page_start;$page_for_i <= $this -> page_end; $page_for_i++){

            if($this -> myde_page == $page_for_i){

                $str .= "    <li class=\"on\">".$page_for_i."</li>\n";

            }

            else{

                $str .= "    <li class=\"page_a\"><a href=\"".$this -> page_replace($page_for_i)."\" title=\"第".$page_for_i."页\">";

                $str .= $page_for_i . "</a></li>\n";

            }
        }
        $str .= $this -> myde_next();

        $str .= $this -> myde_last();

        $str .= "    <li class=\"pages_input\"><input type=\"text\" value=\"".$this -> myde_page."\"";

        $str .= " onkeydown=\"javascript: if(event.keyCode==13){ location='";

        $str .= $this -> page_replace("'+this.value+'")."';return false;}\"";

        $str .= " title=\"输入您想要到达的页码\" /></li>\n";

        $str .= "  </ul>\n  <iv class=\"page_clear\"></div>\n</div>";

        return $str;  }
}
//$page = new PageClass(1000,5,$_GET['page'],'?page={page}');//用于动态
//$page = new PageClass(1000,5,$_GET['page'],'list-{page}.html');//用于静态或者伪静态
//$page -> myde_write();//显示
?>
<?php


/**
 *-------------------------数据库操作类-----------------------------*
 */
class mySql_Class
{
    function __construct($host, $user, $pass)
    {
        @mysql_connect($host,$user,$pass) or die("数据库连接失败!");
        mysql_query("SET NAMES 'utf-8'");
    }

    function select_db($db)//连接表
    {
        return @mysql_select_db($db);
    }

    function query($sql)//执行SQL语句
    {
        return @mysql_query($sql);
    }

    function fetch_array($fetch_array)
    {
        return @mysql_fetch_array($fetch_array, MYSQL_ASSOC);
    }

    function num_rows($sql)
    {
        return @mysql_num_rows($sql);
    }

}

?>
