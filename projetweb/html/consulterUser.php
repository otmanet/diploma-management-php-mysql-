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
    <?php include "navbar.php" ?>
    <div class="container">

        <a class="btn btn-outline-danger mt-4 mb-4" href="formUser.php">ajouter user</a>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>Create_At</th>
                <th>Etudiant</th>
                <th>Email</th>
                <th></th>
                <th></th>


            </tr>

            <?php

            include "config.php";

            $records = mysqli_query($con, "SELECT u.id,u.username,u.created_at,e.nom,e.prenom,e.email FROM user as u,etudiant as e WHERE e.id=u.et_id AND type_user like 'user'");


            while ($data = mysqli_fetch_array($records)) {
                $id = $data['id'];
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['created_at']; ?></td>
                <td><?php echo $data['nom']; ?> <?php echo $data['prenom']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><a class="btn btn-danger" href="deleteUser.php?id=<?php echo $data['id']; ?>">Delete</a></td>
                <td><a class="btn btn-success" href="editUser.php?id=<?php echo $data['id']; ?>">Edit</a></td>

            </tr>
            <?php
            }
            ?>
        </table>
    </div>

</body>

</html>