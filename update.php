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

if(isset($_POST['submit'])){
    $customername = $_POST['customer_name'];
    $customerstatus = $_POST['customer_status'];
    $customeremail = $_POST['customer_email'];
    $customergender = $_POST['gender'];

    $sql = "UPDATE `testcustomer` 
    SET `customer_name`='$customername',`customer_status`='$customerstatus',`customer_email`='$customeremail',`gender`='$customergender' 
    WHERE id = $id";

    $result = mysqli_query($conf, $sql);

    if($result){
        echo '<div class="alert alert-success">
        <strong>Record Updated.</strong>
      </div>';
    }else{
        echo "Failed Task: " . mysqli_error($conf);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: silver">
        CRUD Web
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Update Customer</h3>
            <p class="text-muted">Click save to record new data</p>
        </div>

        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM testcustomer WHERE id = $id LIMIT 1";
            $result = mysqli_query($conf, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label for="form-label">Customer Name:</label>
                        <input type="text" class="form-control" name="customer_name" value="<?php echo $row['customer_name'] ?>">
                    </div>

                    <div class="col">
                        <label for="form-label">Customer Status:</label>
                        <input type="text" class="form-control" name="customer_status" value="<?php echo $row['customer_status'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="form-label">Customer Email:</label>
                        <input type="email" class="form-control" name="customer_email" value="<?php echo $row['customer_email'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label>Gender:</label>
                        <input type="radio" class="form-check-input" name="gender" id="male" value="Male" value="<?php echo ($row['gender']=='Male')?"checked":""; ?>">
                        <label for="male" class="form-input-label"> Male</label>

                        <input type="radio" class="form-check-input" name="gender" id="female" value="Female" value="<?php echo ($row['gender']=='Female')?"checked":""; ?>">
                        <label for="female" class="form-input-label"> Female</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>