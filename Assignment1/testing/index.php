        <?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY nim DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Add New Mahasiswa</a><br/><br/>

    <table width='80%' border=1>
 
    <tr>
        <th>NIM</th> <th>Nama</th> <th>Jurusan</th> <th>Alamat</th> <th>Telepon</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['NIM']."</td>";
        echo "<td>".$user_data['Nama']."</td>";
        echo "<td>".$user_data['Jurusan']."</td>";    
        echo "<td>".$user_data['Alamat']."</td>";    
        echo "<td>".$user_data['Telepon']."</td>";    
        echo "<td><a href='edit.php?NIM=$user_data[NIM]'>Edit</a> | <a href='delete.php?NIM=$user_data[NIM]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>