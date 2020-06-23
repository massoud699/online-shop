<?php
require_once 'MySql.php';
class order_detail extends MySql
{
    //get all
    public function getAll()
    {
        $query = "SELECT * FROM order_details";
        $result =  $this->connect()->query($query);
        $order_details = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($order_details, $row);
            }
        }
        return $order_details;
    }
    //get one

    public function getone($id)
    {
        $query = "SELECT * FROM order_details WHERE id='$id'";
        $result =  $this->connect()->query($query);
        $order_detail = null;
        if ($result->num_rows == 1) {
            $order_detail = $result->fetch_assoc();
        }
        return $order_detail;
    }
    //crete new
    public function store(array $data)
    {

        $query = "INSERT INTO `order_details` (`order_id`,`product_id`,`priceEach`)
        VALUES('{$data['order_id']}','{$data['product_id']}','{$data['priceEach']}') 
        ";


        $result =  $this->connect()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }

 
}
