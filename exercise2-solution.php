<?php

require_once("db.php");

/** ISSUES
 * In the get_order($id) function,
 * invoking the function will return an error/warning ,
 * prepare statement is not correct, 
 * the search parameter "id" should be bind to the statement
 * by using the bindParam() method
*/

## 1: Refactored Code for, "get_order($id)" function
function get_order($id)
{
    global $db;
    $orders_query = $db->prepare("SELECT * FROM `order` WHERE id = :id"); // specify sql query 
    $orders_query->bindParam(':id', $id); // bind the parameter
    $orders_query->execute();   // execute or run the query
    $result = $orders_query->fetchAll();    // return the result set

    return json_encode($result,JSON_PRETTY_PRINT, 30);  // print results to json
}

## 2: Refactored Code for "get_orders" function
function get_orders()
{
    global $db;
    $orders_query = $db->prepare("SELECT * FROM `order`");
    $orders_query->execute();
    $result = $orders_query->fetchAll();

    return json_encode($result,JSON_PRETTY_PRINT, 30);
}


## get_order_with_details function
function get_order_with_details($id) {
    global $db;
    
    /// specify sql query  using a prepared statement
    $orders_query = $db->prepare("SELECT * FROM `order` JOIN `order_details` ON `order`.`id`=`order_details`.`order_id` WHERE `order_details`.`order_id` = :id"); 

    // bind 
    $orders_query->bindParam(':id', $id); 

    // run the query
    $orders_query->execute();  
    
    // return the result set
    $result = $orders_query->fetchAll();    

    return json_encode($result,JSON_PRETTY_PRINT, 30);  // print results to json
}


echo get_orders(32).PHP_EOL;