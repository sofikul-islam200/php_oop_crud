<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> insert data </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        div#content {
            border: 1px solid #f5f5f5;
            padding: 25px 39px;
            background: #f9f9f9;
        }

        p#crud-title {
            background: white;
            color: black;
            padding: 5px 10px;
            font-family: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
<?php
include 'config.php';
include 'database.php';

$db = new Database();

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);
    if($name == '' || $phone == '' || $email == '' || $skill == '' ){
       $errorMsg = "field must not be empty";
    }else{
      $query = "INSERT INTO tbl_user(name,phone,email,skill) VALUES('$name','$phone','$email','$skill')";
      $db->Insert($query);
    }
}
?>





   <?php
      if(isset($errorMsg)){?>
         <span style="color:red"><?php echo $errorMsg?></span>
      <?php } ?>
    <div class="container mt-4" id="content">
             <h4> Insert Data  </h4>
             <form class="" action="insert.php" method="post">
                   <div class="row">
                       <div class="col-md-6">
                         <label for="name"> <b> Name </b> </label>
                         <input type="text" name="name" class="form-control" id="name" style="border-radius:0" placeholder="Inter Name">
                       </div>
                       <div class="col-md-6">
                         <label for="phone"> <b> Phone </b> </label>
                         <input type="text" name="phone" class="form-control" id="phone" style="border-radius:0" placeholder="Inter Phone">
                       </div>
                       <div class="col-md-6">
                         <label for="email"> <b> email </b> </label>
                         <input type="email" name="email" class="form-control" id="email" style="border-radius:0" placeholder="Inter Email">
                       </div>
                       <div class="col-md-6">
                         <label for="skill"> <b> skill </b> </label>
                         <input type="skill" name="skill" class="form-control" id="skill" style="border-radius:0" placeholder="Inter Skill">
                       </div><br/><br/>
                       <div class="col-md-6" style="margin-top:10px">
                         <input type="submit" name="submit" value="Add Now" class="btn btn-sm btn-info" style="border-radius:0">
                         <input type="reset" name="reset" value="cancel" class="btn btn-sm  btn-danger"  style="border-radius:0">
                       </div>
                   </div>
             </form><br/>
             <a href="index.php" class="btn btn-sm btn-info"> Go To Back </a>
    </div>
</body>

</html>
