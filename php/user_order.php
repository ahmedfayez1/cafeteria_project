<?php
require("dbclasses.php");

$order_id = $_POST['user'];
$data=$db->DataOfOrder($order_id);
echo  json_encode($data);
