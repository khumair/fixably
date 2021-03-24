<?php 
    include('functions.php');
    session_start();
    $token = $_SESSION['token'];
    $status = 'statuses';
    $order = 'orders';

    
    $displayStatuses = get($status, $token );
   
    foreach ($displayStatuses as $status) {
        // echo 'ID : '. $status['id'] .',   Desctiption:  '. $status['description'] . '<br>';
        echo '<input type="radio" id='.$status['id'].' name="status" value='. $status['description'] .'>';
        echo '<label>'. $status['description'] .'</label><br>';
    }

    $displayOrders = get($order, $token);
    $ordersData = $displayOrders['results'];
    foreach ($ordersData as $order) {

        echo 'ID : '. $order['id'] .' DeviceType:  '. $order['deviceType'] . '<br>';
    }


?>