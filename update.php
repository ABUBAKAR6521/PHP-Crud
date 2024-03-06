
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

<body>
    
    <?php



$serverName = 'localhost';
$userName = 'root';
$password = '';
$dataBase = 'code-with-harry';

$connection = mysqli_connect($serverName, $userName, $password, $dataBase);
if (!$connection) {
    echo ('Connection is not successful');
}
$id = $_GET['rn'];
$sql = "SELECT * FROM `harry-table` WHERE `id` = '$id'";
$result = mysqli_query($connection,$sql);

$fetchData = mysqli_fetch_assoc($result);


?>


<div class="container">
    <h2>Update Record</h2>
<div class="row">
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    
    <label for="Name">Name</label>
    <input type="text" value="<?php echo $fetchData['name'] ?>" class="form-control" name="name"/>
    
    <label for="Email">Email</label>
    <input type="text" value="<?php echo $fetchData['email'] ?>" class="form-control" name="email"/>
    
    <label for="password">Password</label>
    <input type="text" value="<?php echo $fetchData['password'] ?>" class="form-control" name="password"/>
    
    <label for="Name">Concern</label>
    <textarea  class="form-control" name="concern" rows="10" cols="10"> 
    <?php echo $fetchData['concern'] ?>
    </textarea>

    <button class="btn btn-success mt-2">Submit</button>
</form>
 

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $concern = $_POST['concern'];

    $quertToUpdate = "UPDATE `harry-table` SET `name` = '$name', `email` = '$email', `password` = '$password' , `concern` = '$concern' WHERE `id` = $id";
    $result = mysqli_query($connection,$quertToUpdate);
    if($result){
        // echo '<div class="alert alert-success">Data updated successfully</div>';
        session_start();
        $_SESSION['update_message'] = true;

    }
    header('location: form.php');
}

?>
</div>
</div>
</div>
</body>
</html>