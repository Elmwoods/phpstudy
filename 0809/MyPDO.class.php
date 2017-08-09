<?php
/**
 * MyPDO
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9
 * Time: 9:17
 */
class MyPDO
{
    protected static $_instance = null;
    protected $dbName = '';
    protected $dsn;
    protected $dbh;

    /**
     * 构造
     *
     * @return MyPDO
     */
    private function __construct($dbHost, $dbUser, $dbPasswd, $dbName, $dbCharset)
    {
        try {
            $this->dsn = 'mysql:host='.$dbHost.';dbname='.$dbName;
            $this->dbh = new PDO($this->dsn, $dbUser, $dbPasswd);
            $this->dbh->exec('SET character_set_connection='.$dbCharset.', character_set_results='.$dbCharset.', character_set_client=binary');
        } catch (PDOException $e) {
            $this->outputError($e->getMessage());
        }
    }

    /**
     * 防止克隆
     *
     */
    private function __clone() {}

    /**
     * Singleton instance
     *
     * @return Object
     */
    public static function getInstance($dbHost, $dbUser, $dbPasswd, $dbName, $dbCharset)
    {
        if (self::$_instance === null) {
            self::$_instance = new self($dbHost, $dbUser, $dbPasswd, $dbName, $dbCharset);
        }
        return self::$_instance;
    }

    /**
     * Query 查询
     *
     * @param String $strSql SQL语句
     * @param String $queryMode 查询方式(All or Row)
     * @param Boolean $debug
     * @return Array
     */
    public function query($strSql, $queryMode = 'All', $debug = false)
    {
        if ($debug === true) $this->debug($strSql);
        $recordset = $this->dbh->query($strSql);
        $this->getPDOError();
        if ($recordset) {
            $recordset->setFetchMode(PDO::FETCH_ASSOC);
            if ($queryMode == 'All') {
                @$result = $recordset->fetchAll();
            } elseif ($queryMode == 'Row') {
                @$result = $recordset->fetch();
            }
        } else {
            @$result = null;
        }
        return @$result;
    }

    /**
     * Update 更新
     *
     * @param String $table 表名
     * @param Array $arrayDataValue 字段与值
     * @param String $where 条件
     * @param Boolean $debug
     * @return Int
     */
    public function update($table, $arrayDataValue, $where = '', $debug = false)
    {
        $this->checkFields($table, $arrayDataValue);
        if ($where) {
            $strSql = '';
            foreach ($arrayDataValue as $key => $value) {
                $strSql .= ", `$key`='$value'";
            }
            $strSql = substr($strSql, 1);
            $strSql = "UPDATE `$table` SET $strSql WHERE $where";
        } else {
            $strSql = "REPLACE INTO `$table` (`".implode('`,`', array_keys($arrayDataValue))."`) VALUES ('".implode("','", $arrayDataValue)."')";
        }
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * Insert 插入
     *
     * @param String $table 表名
     * @param Array $arrayDataValue 字段与值
     * @param Boolean $debug
     * @return Int
     */
    public function insert($table, $arrayDataValue, $debug = false)
    {
        $this->checkFields($table, $arrayDataValue);
        $strSql = "INSERT INTO `$table` (`".implode('`,`', array_keys($arrayDataValue))."`) VALUES ('".implode("','", $arrayDataValue)."')";
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * Replace 覆盖方式插入
     *
     * @param String $table 表名
     * @param Array $arrayDataValue 字段与值
     * @param Boolean $debug
     * @return Int
     */
    public function replace($table, $arrayDataValue, $debug = false)
    {
        $this->checkFields($table, $arrayDataValue);
        $strSql = "REPLACE INTO `$table`(`".implode('`,`', array_keys($arrayDataValue))."`) VALUES ('".implode("','", $arrayDataValue)."')";
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * Delete 删除
     *
     * @param String $table 表名
     * @param String $where 条件
     * @param Boolean $debug
     * @return Int
     */
    public function delete($table, $where = '', $debug = false)
    {
        if ($where == '') {
            $this->outputError("'WHERE' is Null");
        } else {
            $strSql = "DELETE FROM `$table` WHERE $where";
            if ($debug === true) $this->debug($strSql);
            $result = $this->dbh->exec($strSql);
            $this->getPDOError();
            return $result;
        }
    }

    /**
     * execSql 执行SQL语句
     *
     * @param String $strSql
     * @param Boolean $debug
     * @return Int
     */
    public function execSql($strSql, $debug = false)
    {
        if ($debug === true) $this->debug($strSql);
        $result = $this->dbh->exec($strSql);
        $this->getPDOError();
        return $result;
    }

    /**
     * 获取字段最大值
     *
     * @param string $table 表名
     * @param string $field_name 字段名
     * @param string $where 条件
     */
    public function getMaxValue($table, $field_name, $where = '', $debug = false)
    {
        $strSql = "SELECT MAX(".$field_name.") AS MAX_VALUE FROM $table";
        if ($where != '') $strSql .= " WHERE $where";
        if ($debug === true) $this->debug($strSql);
        $arrTemp = $this->query($strSql, 'Row');
        $maxValue = $arrTemp["MAX_VALUE"];
        if ($maxValue == "" || $maxValue == null) {
            $maxValue = 0;
        }
        return $maxValue;
    }

    /**
     * 获取指定列的数量
     *
     * @param string $table
     * @param string $field_name
     * @param string $where
     * @param bool $debug
     * @return int
     */
    public function getCount($table, $field_name, $where = '', $debug = false)
    {
        $strSql = "SELECT COUNT($field_name) AS NUM FROM $table";
        if ($where != '') $strSql .= " WHERE $where";
        if ($debug === true) $this->debug($strSql);
        $arrTemp = $this->query($strSql, 'Row');
        return $arrTemp['NUM'];
    }

    /**
     * 获取表引擎
     *
     * @param String $dbName 库名
     * @param String $tableName 表名
     * @param Boolean $debug
     * @return String
     */
    public function getTableEngine($dbName, $tableName)
    {
        $strSql = "SHOW TABLE STATUS FROM $dbName WHERE Name='".$tableName."'";
        $arrayTableInfo = $this->query($strSql);
        $this->getPDOError();
        return $arrayTableInfo[0]['Engine'];
    }

    /**
     * beginTransaction 事务开始
     */
    private function beginTransaction()
    {
        $this->dbh->beginTransaction();
    }

    /**
     * commit 事务提交
     */
    private function commit()
    {
        $this->dbh->commit();
    }

    /**
     * rollback 事务回滚
     */
    private function rollback()
    {
        $this->dbh->rollback();
    }

    /**
     * transaction 通过事务处理多条SQL语句
     * 调用前需通过getTableEngine判断表引擎是否支持事务
     *
     * @param array $arraySql
     * @return Boolean
     */
    public function execTransaction($arraySql)
    {
        $retval = 1;
        $this->beginTransaction();
        foreach ($arraySql as $strSql) {
            if ($this->execSql($strSql) == 0) $retval = 0;
        }
        if ($retval == 0) {
            $this->rollback();
            return false;
        } else {
            $this->commit();
            return true;
        }
    }

    /**
     * checkFields 检查指定字段是否在指定数据表中存在
     *
     * @param String $table
     * @param array $arrayField
     */
    private function checkFields($table, $arrayFields)
    {
        $fields = $this->getFields($table);
        foreach ($arrayFields as $key => $value) {
            if (!in_array($key, $fields)) {
                $this->outputError("Unknown column `$key` in field list.");
            }
        }
    }

    /**
     * getFields 获取指定数据表中的全部字段名
     *
     * @param String $table 表名
     * @return array
     */
    private function getFields($table)
    {
        $fields = array();
        $recordset = $this->dbh->query("SHOW COLUMNS FROM $table");
        $this->getPDOError();
        $recordset->setFetchMode(PDO::FETCH_ASSOC);
        $result = $recordset->fetchAll();
        foreach ($result as $rows) {
            $fields[] = $rows['Field'];
        }
        return $fields;
    }

    /**
     * getPDOError 捕获PDO错误信息
     */
    private function getPDOError()
    {
        if ($this->dbh->errorCode() != '00000') {
            $arrayError = $this->dbh->errorInfo();
            $this->outputError($arrayError[2]);
        }
    }

    /**
     * debug
     *
     * @param mixed $debuginfo
     */
    private function debug($debuginfo)
    {
        var_dump($debuginfo);
        exit();
    }

    /**
     * 输出错误信息
     *
     * @param String $strErrMsg
     */
    private function outputError($strErrMsg)
    {
        throw new Exception('MySQL Error: '.$strErrMsg);
    }

    /**
     * destruct 关闭数据库连接
     */
    public function destruct()
    {
        $this->dbh = null;
    }
}
//require 'MyPDO.class.php';
//$db = MyPDO::getInstance('localhost', 'root', '', 'php_study', 'utf8');
//$query = $db->query('select * from products');
//var_dump($query);
//$db->destruct();

class DBHelper
  {
         private $link;
     static private $_instance;

      // 连接数据库
      private function __construct($host, $username, $password)
      {
                 $this->link = mysql_connect($host, $username, $password);
         $this->query("SET NAMES 'utf8'", $this->link);
         //echo mysql_errno($this->link) . ": " . mysql_error($link). "n";
         //var_dump($this->link);
         return $this->link;
     }
     private function __clone()
     {
             }
     public static function get_class_nmdb($host, $username, $password)
     {
                 //$connector = new nmdb($host, $username, $password);
         //return $connector;

         if (FALSE == (self::$_instance instanceof self)) {
                         self::$_instance = new self($host, $username, $password);
         }
         return self::$_instance;
     }
     // 连接数据表
     public function select_db($database)
     {
                 $this->result = mysql_select_db($database);
         return $this->result;
     }
     // 执行SQL语句
     public function query($query)
     {
                 return $this->result = mysql_query($query, $this->link);
     }
     // 将结果集保存为数组
     public function fetch_array($fetch_array)
     {
                 return $this->result = mysql_fetch_array($fetch_array, MYSQL_ASSOC);
     }
     // 获得记录数目
     public function num_rows($query)
     {
                 return $this->result = mysql_num_rows($query);
     }
     // 关闭数据库连接
     public function close()
     {
                 return $this->result = mysql_close($this->link);
     }
 }
 $connector = DBHelper::get_class_nmdb($host, $username, $password);
 $connector -> select_db($database);


/*
 * mysql 单例
 */
 class mysql{
     private $host    ='localhost'; //数据库主机
     private $user     = 'root'; //数据库用户名
     private $pwd     = ''; //数据库用户名密码
     private $database = 'imoro_imoro'; //数据库名
     private $charset = 'utf8'; //数据库编码，GBK,UTF8,gb2312
     private $link;             //数据库连接标识;
     private $rows;             //查询获取的多行数组
     static $_instance; //存储对象
     /**
      * 构造函数
      * 私有
      */
     private function __construct($pconnect = false) {
         if (!$pconnect) {
             $this->link = @ mysql_connect($this->host, $this->user, $this->pwd) or $this->err();
         } else {
             $this->link = @ mysql_pconnect($this->host, $this->user, $this->pwd) or $this->err();
         }
         mysql_select_db($this->database) or $this->err();
         $this->query("SET NAMES '{$this->charset}'", $this->link);
         return $this->link;
     }
     /**
      * 防止被克隆
      *
      */
     private function __clone(){}
     public static function getInstance($pconnect = false){
         if(FALSE == (self::$_instance instanceof self)){
             self::$_instance = new self($pconnect);
         }
         return self::$_instance;
     }
     /**
      * 查询
      */
     public function query($sql, $link = '') {
         $this->result = mysql_query($sql, $this->link) or $this->err($sql);
         return $this->result;
     }
     /**
      * 单行记录
      */
     public function getRow($sql, $type = MYSQL_ASSOC) {
         $result = $this->query($sql);
         return @ mysql_fetch_array($result, $type);
     }
     /**
      * 多行记录
      */
     public function getRows($sql, $type = MYSQL_ASSOC) {
         $result = $this->query($sql);
         while ($row = @ mysql_fetch_array($result, $type)) {
             $this->rows[] = $row;
         }
         return $this->rows;
     }
     /**
      * 错误信息输出
      */
     protected function err($sql = null) {
         //这里输出错误信息
         echo 'error';
         exit();
     }
 }
 //用例
 $db = mysql::getInstance();
 $db2 = mysql::getInstance();
 $data = $db->getRows('select * from blog');
 //print_r($data);
 //判断两个对象是否相等
 if($db === $db2){
     echo 'true';
 }
