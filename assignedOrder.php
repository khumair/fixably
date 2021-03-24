<?php 
echo '<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>';
    include('functions.php');
    session_start();
    $token = $_SESSION['token'];
    $order = 'orders';
    $displayOrders = get($order, $token);
    $ordersData = $displayOrders['results'];
    echo '<body>
            <table>
  <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Manufacturer</th>
    <th>Brand</th>
    <th>Technician</th>
    <th>Status</th>
    <th>Create</th>
  </tr>';
    foreach ($ordersData as $order) {
        if ($order['status'] == 3 && $order['deviceBrand']== 'Iphone')
        {
echo '<tr>
    <td>'. $order['id'] .'</td>
    <td>'. $order['deviceType'] .'</td>
    <td>'. $order['deviceManufacturer'] .'</td>
    <td>'. $order['deviceBrand'] .'</td>
    <td>'. $order['technician'] .'</td>
    <td>'. $order['status'] .'</td>
    <td>'. $order['created'] .'</td>
  </tr>';

}
        }
        '</table> 
        </body>'
        ?>
