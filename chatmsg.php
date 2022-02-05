<?php
    require_once('DBConfig.php');
    class ChatApp
    {
        protected $conn;

        public $App;

        private $db_conn;
        private $db_user;
        private $db_pass;
        private $db_name;

        public function __construct(){
            $this->db_conn = DB_SERVER;
            $this->db_user = DB_USER;
            $this->db_pass = DB_PASS;
            $this->db_name = DB_NAME;
            
            $this->conn = new mysqli($this->db_conn,$this->db_user,$this->db_pass,$this->db_name);

            if(!$this->conn){
                die('Error Connecting to database - '.$this->conn->mysqli_error());
            }
        }
        /*
        * @param (('fields: {},'values':())
        *
        */
        public function insert_into_table($table, $param){
            if (is_null($table) || empty($table)||empty($param)) {
                return "Table Values must not be empty or null";
            }else {
                $values = $param['values'];
                $fields = $param['fields'];
                $sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$values.")";
                if(mysqli_query($this->conn,$sql)){ // if insertion is successful
                    return 'Data inserted Successfully';
                }else{
                    return 'Error inserting data into database';
                }
            }
        }

        public function getAll(){

        }
        public function getAll($table){
            
        }
    }


    $App = new ChatApp();
?>