
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
    
    <div class="container">
      <h2>Let's Start with DataBase</h2>
      <!-- Database can be connected with two ways -->
      <!-- 1: MySqli -->
      <!-- 2: PDO (php data objects)-->
      <?php


$serverName = 'localhost';
$userName = 'root';
$password = '';
$dataBase = 'code-with-harry';

$connection = mysqli_connect($serverName, $userName, $password, $dataBase);
if (!$connection) {
    echo ('Connection is not successful');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $concern = $_POST['concern'];

    
 
    $sql = "INSERT INTO `harry-table` (`name`, `email`, `password`, `concern`) VALUES ('$name', '$email', '$password', '$concern')";
  
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo '<div class="alert alert-success">Record Inserted Successfully</div>';
    }
    

}

// session_destroy();
?>



<div class="container">
  <h1>FORM in PHP</h1>
  <div class="row">
    <div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    
    <label for="Name">Name</label>
    <input type="text" class="form-control" name="name"/>

    <label for="Email">Email</label>
    <input type="text" class="form-control" name="email"/>

    <label for="password">Password</label>
    <input type="text" class="form-control" name="password"/>

    <label for="Name">Concern</label>
    <textarea  class="form-control" name="concern" rows="10" cols="10"> </textarea>


    <button class="btn btn-success mt-2">Submit</button>
    </form>

    </div>
  </div>



  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
$ReadSql ="Select * from `harry-table`";
$result = mysqli_query($connection,$ReadSql);
if(!$result){
  echo 'result cannot be fectched';
}
 $key = 0;
  while ($row = mysqli_fetch_assoc($result)){
  $key++;
?>
      <tr>
        <td> <?php echo $key ?> </td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['password'];?></td>
        <td>
          <a class="btn btn-secondary" href="/PHP/update.php?rn=<?php echo $row['id']?>">Edit</a>
          <a class="btn btn-danger" href="/PHP/delete.php?rn=<?php echo $row['id']?>">Delete</a>
        </td>

      </tr>
     
      <?php   };?>
    </tbody>
  </table>
</div>














 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>