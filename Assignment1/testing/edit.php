<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    
    
    $nim=$_POST['nim'];
    $nama=$_POST['nama'];
    $jurusan=$_POST['jurusan'];
    $alamat=$_POST['alamat'];
    $telepon=$_POST['telepon'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE mahasiswa SET nim='$nim',nama='$nama',jurusan='$jurusan',alamat='$alamat',telepon='$telepon' WHERE nim=$nim");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$nim = $_GET['NIM'];

 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE NIM=$nim");
 
while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['NIM'];
    $nama = $user_data['Nama'];
    $jurusan = $user_data['Jurusan'];
    $alamat = $user_data['Alamat'];
    $telepon = $user_data['Telepon'];
}
?>
<html>
<head>	
    <title>Edit Mahasiswa Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim" value=<?php echo $nim;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value=<?php echo $jurusan;?>></td>
            </tr>
            <tr> 
                <td>Telepon</td>
                <td><input type="text" name="telepon" value=<?php echo $telepon;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value=<?php echo $_GET['NIM'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>