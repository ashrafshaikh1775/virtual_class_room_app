<?php
class conn{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname="virtual_class_room_app";
    public $mysqli;
    public $result = [];
    public function __construct()
    {
        $this->mysqli= new mysqli($this->server,$this->username,$this->password,$this->dbname);
        if($this->mysqli->connect_error){
          die('Connection Failed' . $this->mysqli->connect_error);
        }
    }
    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null)
    {
      $query = "select $rows from $table";
      // return $query;
      if ($join != null) {
        $query .= " INNER JOIN $join";
      }
      if ($where != null) {
        $query .= " where $where";
      }
      if ($order != null) {
        $query .= " order by $order";
      }
      if ($limit != null) {
        $query .= " limit 0,$limit";
      }
      $execute = $this->mysqli->query($query);
      if ($execute) {
        $this->result = $execute->fetch_all(MYSQLI_ASSOC);
        return $this->result;
      } else {
        return 'Network issues !!!';
      }
    }
  
    public function insert($table, $rows = array(), $where = null)
    {
      $col = implode(', ', array_keys($rows));
      $val = implode("', '", $rows);
      $query = "insert into $table ($col) values('$val')";
      if ($where != null) {
        $query .= " where $where";
      }
      $execute = $this->mysqli->query($query);
      if ($execute) {
        return json_encode(array("message"=>"Registered"));
      } else {
        return json_encode(array("message"=>"Not Registered"));
      }
    }
    public function update($table, $rows = array(), $where = null)
    {
  
      foreach ($rows as $col => $val) {
        $args[] = "$col='$val'";
      }
      $merge = implode(', ', $args);
      $query = "update $table set $merge";
      if ($where != null) {
        $query .= " where $where";
      }
      $execute = $this->mysqli->query($query);
      if ($execute) {
        return $this->mysqli->affected_rows;
      } else {
        return 'Not Registered';
      }
    }
  
    public function __destruct()
    {
      $this->mysqli->close();
    }

}
$cnn=new conn(); 

?>