<?php 
    include('functions.php');
    session_start();
    $token = $_SESSION['token'];
    $status = 'statuses';
    $order = 'orders';
    
$reports = 'report/2020-11-01/2020-11-30';
    $data = [
        'toDate' => '2020-11-01',
        'fromDate' => '2020-11-30'
    ];
    $displayOrders = post($reports, $token, $data);
    
    $ordersData = $displayOrders['results'];
    $week1 =[];
    $week2 =[]; $week3 =[]; $week4 =[];
    foreach ($ordersData as $order) {
        if(date($order['created']) < date('2020-11-08 00:00:00'))
            array_push($week1, $order);
        elseif(date($order['created']) < date('2020-11-15 00:00:00'))
            array_push($week2, $order);
        elseif(date($order['created']) < date('2020-11-22 00:00:00'))
            array_push($week3, $order);
        elseif(date($order['created']) < date('2020-11-29 00:00:00'))
            array_push($week4, $order);
    }
        //Week 1 Total Invoices and Sum
    echo '<br />Week1: <br/>';
    print_r($week1);
    echo 'total invoices '. count($week1);
    $sum = array_sum(array_column($week1,'amount'));
    echo'<br />';
    echo "sum".$sum;
    echo'<hr>';

        //Week 2 Total Invoices and Sum
    echo '<br/> Week2: <br/>';
    print_r($week2);
    echo 'total invoices '. count($week2);
    $sum = array_sum(array_column($week2,'amount'));
    echo'<br />';
    echo "sum".$sum;
    echo'<hr>';

        //Week 3 Total Invoices and Sum
    echo '<br/> Week3: <br/>';
    print_r($week3);
    echo 'total invoices '. count($week3);
    $sum = array_sum(array_column($week3,'amount'));
    echo'<br />';
    echo "sum".$sum;
    echo'<hr>';


        //Week 4 Total Invoices and Sum
    echo '<br/> Week4: <br/>';
    print_r($week4);
    echo 'total invoices '. count($week4);
    $sum = array_sum(array_column($week4,'amount'));
    echo'<br />';
    echo "sum".$sum;
    echo'<hr>';
