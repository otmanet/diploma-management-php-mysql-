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
    <div class="container" style="display:flex;justify-content: center ;margin-top:25px">
        <div class="text-light p-5" style="background-color: black;">
            Ajouter User
        </div>
        <div class=" border border-success w-50" style="display:flex;justify-content: center;align-items: center;">

            <form class="" method="post" action="insertUser.php">

                <div class="form-group">
                    <label class="form-label"> username</label>
                    <input type="text" placeholder="username..." name="username" class="form-control"
                        style="border-radius: 1.5rem;">

                </div>
                <div class="form-group">
                    <label class="form-label">password</label>
                    <input type="password" placeholder="password..." name="password" class="form-control"
                        style="border-radius: 1.5rem;">
                </div>

                <div class="form-group mt-4">
                    <select class="form-control select-css" name="et_id" style="border-radius: 1.5rem;" required>
                        <option value="" disabled selected>Choose Etudiant</option>
                        <?php

                        include "config.php";

                        $records = mysqli_query($con, "SELECT * FROM etudiant");


                        while ($data = mysqli_fetch_array($records)) {
                            $id = $data['id'];

                        ?>

                        <optgroup>
                            <option class="text-black" value="<?php echo $data['id']; ?>"><?php echo $data['id']; ?>
                                -<?php echo $data['nom']; ?> <?php echo $data['prenom']; ?></option>
                        </optgroup>
                        <?php
                        }
                        ?>

                        </option>
                    </select>

                </div>

                <input type="hidden" name="type_user" value="user">




                <input class="btn btn-outline-primary mt-3 mb-2 " type="submit" name="save" value="submit"
                    style="border-radius: 1.5rem;">
                <a href="consulterUser.php" class="btn btn-outline-primary mt-3 mb-2 "
                    style="border-radius: 1.5rem;">retour</a>
            </form>
        </div>
    </div>
</body>

</html>