<?php
require_once 'MySql.php';
class order extends MySql
{
    //get all
    public function getAll()
    {
        $query = "SELECT * FROM orders";
        $result =  $this->connect()->query($query);
        $orders = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($orders, $row);
            }
        }
        return $orders;
    }
    //get one

    public function getone($CUSTOMER_Email)
    {
        $query = "SELECT * FROM orders WHERE CUSTOMER_Email='$CUSTOMER_Email'";
        $result =  $this->connect()->query($query);
        $order = null;
        if ($result->num_rows == 1) {
            $order = $result->fetch_assoc();
        }
        return $order;
    }
    //crete new
    public function store(array $data)
    {

        $data['CUSTOMER_NAME']=mysqli_real_escape_string($this->connect(),$data['CUSTOMER_NAME']);
        $data['CUSTOMER_Email']=mysqli_real_escape_string($this->connect(),$data['CUSTOMER_Email']);
        $data['customer_adress']=mysqli_real_escape_string($this->connect(),$data['customer_adress']);
        $query = "INSERT INTO `orders` (`CUSTOMER_NAME`,`CUSTOMER_Email`,`customer_phone`,`customer_adress`)
        VALUES('{$data['CUSTOMER_NAME']}','{$data['CUSTOMER_Email']}','{$data['customer_phone']}','{$data['customer_adress']}') 
        ";

        $result =  $this->connect()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }

    
}
