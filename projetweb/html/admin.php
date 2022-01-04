<?

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
$added = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    #lhide {
        display: flex;
        position: absolute;
        right: 0;
        margin-right: 8px
    }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="container">
        <a class="btn btn-outline-danger mt-4 mb-4" href="add.php">ajouter etudiant</a>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>numero telephone</th>
                <th>CNE</th>
                <th>CIN</th>
                <th>adress</th>
                <th>diplome</th>
                <th></th>
                <th></th>
                <th></th>

            </tr>

            <?php

            include "config.php";

            $records = mysqli_query($con, "select * from etudiant");

            while ($data = mysqli_fetch_array($records)) {
                $id = $data['id'];
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nom']; ?></td>
                <td><?php echo $data['prenom']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['numero_telephone']; ?></td>
                <td><?php echo $data['CNE']; ?></td>
                <td><?php echo $data['CIN']; ?></td>
                <td><?php echo $data['adress']; ?></td>
                <td><?php echo $data['diplome']; ?></td>
                <td><a class="btn btn-danger" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
                <td><a class="btn btn-success" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
                <!--<td><a class="btn btn-success" href="messages.php?id=<?php //echo $data['id']; 
                                                                                ?>">voir message</a></td>-->

            </tr>
            <?php
            }
            ?>
        </table>
    </div>






</body>

</html>