<?php
class BaseModelDB{

    //当前执行sql
    private $sql;
    //链接
    private static $pdo;
    //数据库表名
    private $table;
    private $db_config;

    public function __construct($db_config=''){
        if(empty($db_config)){
           $this->db_config = Config::get_db_config(); 
        }
        $this->connect();
    }

    /** 
     * 获取插入数据id
     */
    public function insertId() {
        $sql = 'SELECT last_insert_id()';
        return $this->getFirst($sql, '', 'master');
    }   

    public function connect(){
        $dns = $this->db_config['ENGINE'].':dbname='.$this->db_config['DB_NAME'].";host=".$this->db_config['DB_HOST']; 
        if(empty(self::$pdo)){
            self::$pdo = new PDO( $dns, $this->db_config['DB_USER'], $this->db_config['DB_PASS'] ); 
        }
    }


    public function get_one(){

    }

    public function get_all(){

    }
    public function get_column(){

    }


}
