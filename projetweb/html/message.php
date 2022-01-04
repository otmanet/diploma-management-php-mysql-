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

        
        <table class="table table-striped mt-5">
            <tr>
                <th>id_etudiant</th>
                <th>Etudiant</th>
                <th>message</th>
                <th></th>
                


            </tr>

            <?php

      include "config.php";

      $records = mysqli_query($con, "SELECT m.id,m.id_et,m.message,e.nom,e.prenom FROM message as m,etudiant as e WHERE e.id=m.id_et ");


      while ($data = mysqli_fetch_array($records)) {
        $id = $data['id'];
      ?>
            <tr>
                <td><?php echo $data['id_et']; ?></td>
                <td><?php echo $data['nom']; ?> <?php echo $data['prenom']; ?></td>
                <td><?php echo $data['message']; ?></td>
                <td><a class="btn btn-danger" href="deleteMessage.php?id=<?php echo $data['id']; ?>">Delete</a></td>
                

            </tr>
            <?php
      }
      ?>
        </table>
    </div>

</body>

</html>