<!-- Nama kelompok:
1. Bintang
2. Archie Adrinova
3. Mohamed Hasan Isa
4. Muhammad Anis
5. Muhammad Irshandy Wirayudha -->

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

if(isset($_POST['submit'])){
    $customername = $_POST['customer_name'];
    $customerstatus = $_POST['customer_status'];
    $customeremail = $_POST['customer_email'];
    $customergender = $_POST['gender'];

    $sql = "INSERT INTO `testcustomer`(`id`, `customername`, `customerstatus`, `customeremail`, `customergender`) 
    VALUES (NULL,'$customername','$customerstatus','$customeremail','$customergender')";

    $result = mysqli_query($conf, $sql);

    if($result){
        echo '<div class="alert alert-success">
        <strong>Record Saved.</strong>
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
            <h3>Add Customer</h3>
            <p class="text-muted">Fill out the form below</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label for="form-label">Customer Name:</label>
                        <input type="text" class="form-control" name="customer_name" placeholder="Name">
                    </div>

                    <div class="col">
                        <label for="form-label">Customer Status:</label>
                        <input type="text" class="form-control" name="customer_status" placeholder="Status">
                    </div>

                    <div class="mb-3">
                        <label for="form-label">Customer Email:</label>
                        <input type="email" class="form-control" name="customer_email" placeholder="Email">
                    </div>

                    <div class="form-group mb-3">
                        <label>Gender:</label>
                        <input type="radio" class="form-check-input" name="gender" id="male" value="Male">
                        <label for="male" class="form-input-label"> Male</label>

                        <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
                        <label for="female" class="form-input-label"> Female</label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Status</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $sql = "SELECT * FROM testcustomer";
                    $result = mysqli_query($conf, $sql);
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <th><?php echo $row['id'] ?></th>
                            <th><?php echo $row['customername'] ?></th>
                            <th><?php echo $row['customerstatus'] ?></th>
                            <th><?php echo $row['customeremail'] ?></th>
                            <th><?php echo $row['customergender'] ?></th>
                            <td>
                                <a href="update.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="bi bi-pencil-square fs-5 me-3"></i></a>
                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="bi bi-trash fs-5"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>

