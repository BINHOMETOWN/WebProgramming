<?php
$server = "localhost";
$db_username = "root";
$db_password = "";
$database = "test";

$conf = mysqli_connect(
    $server,
    $db_username,
    $db_password,
    $database
);
// echo "Success";
$id = $_GET['id'];
$sql = "DELETE FROM `testcustomer` WHERE id = $id";
$result = mysqli_query($conf, $sql);

if($result){
  header("Location: index.php?msg=Record deleted.");
}else{
    echo "Failed Task: " . mysqli_error($conf);
}

?>