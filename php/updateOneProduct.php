<?php
require("./dbclasses.php");
$productName=$_REQUEST['name'];
$productprice=$_REQUEST['price'];
$productStatus=$_REQUEST['status'];
$productId=$_REQUEST['id'];
// $catagoryId=$_REQUEST['category'];
$categoryPic=$_FILES['img'];




$imgSize = $categoryPic['size'];
if ($imgSize > 2000000) {
    setcookie('errors', json_encode(['image' => 'size of image bigger than 2MG']));
    header("location:../all_product.html");
    exit();
} else {
    setcookie('errors', "", time() - 60);
}

$allowed_image_extension = array('png', 'jpg', 'jpeg');
$imgExtension = explode('/', $categoryPic['type'])[1];
if (!in_array($imgExtension, $allowed_image_extension)) {
    setcookie("errors", json_encode(['image' => 'extension image is not valid']));
    header("location:../all_product.html");
    exit();
} else {
    setcookie("errors", "", time() - 60);
}
 $categoryPic=$_FILES['img'];
$file_path = $categoryPic['tmp_name'];
$categoryPic = 'images/products/' . time() . '.' . explode('/', mime_content_type($file_path))[1];
move_uploaded_file($file_path, $categoryPic);

//categoryPic

$db=new DB($con);
// $productID = $db->getproductId($productName);

// $productID =$productID['id'];
if($productId ){
    $result=$db->udateproductData($productId,$productName,$productprice,$categoryPic,$productStatus,1);
    header('Location:../all_product.html');
    }
else{

    $results= $db->addProduct($productName,$productprice,$categoryPic,1 );
    header("location:../all_product.html");
}


















// $productName=$_REQUEST["name"];

// // $name=$_REQUEST["price"];
// $room=$_REQUEST["status"];
// // $img=$_File["img"];
// var_dump($productName);


// // print_r($data);
// // var_dump($_FILES);


// $ddata = update('product',$data,$_REQUEST);
// $result=$db->udateproductData($id,$name,$price,$pic,$status,$categoryId)
// echo json_encode($data);
   

// array(3) { ["name"]=> string(10) "fayezzzzzz" ["price"]=> string(6) "200000" ["status"]=> string(9) "Available" }