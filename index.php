<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> php practices </title>
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
    $query = "SELECT * FROM tbl_user";
    $result = $db->Select($query);

    ?>

    <?php
      if(isset($_GET['msg'])){?>
        <div class="alert alert-success" role="alert">
            <?php echo $_GET['msg']?>
        </div>
      <?php } ?>
    <div class="container mt-4" id="content">
        <div class="row">
            <table class="table table-striped table-dark">
                <p id="crud-title"> SBSH CRUD </p>
                <thead>
                    <tr>
                        <th scope="col">SL NO </th>
                        <th scope="col"> NAME </th>
                        <th scope="col"> PHONE </th>
                        <th scope="col"> EMAIL </th>
                        <th scope="col"> SKILL </th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if ($result) { ?>

                        <?php while ($rows = $result->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row"><?php echo $rows['id']  ?></th>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php echo $rows['phone'] ?></td>
                                <td><?php echo $rows['email'] ?></td>
                                <td><?php echo $rows['skill'] ?></td>
                                <td>
                                    <a href="" style="color:blue" class="btn btn-sm btn-info text-light">Edit</a>
                                    <a href="" style="color:red" class="btn btn-sm btn-danger text-light">Delete</a>
                                </td>
                            </tr>
                        <?php  } ?>

                    <?php } else { ?>

                        <p>no data avaiable here </p>

                    <?php  } ?>
                </tbody>
            </table>
                 <a href="insert.php" class="btn btn-sm btn-primary"> Add New</a>
        </div><br/>
    </div>

</body>

</html>
