<?php

session_start();

include 'config.php';

$id = $_REQUEST['id'];

$qry = mysqli_query($con, "SELECT  * from etudiant where id='$id'");

$data = mysqli_fetch_array($qry);

if (isset($_POST['submit'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero_telephone = $_POST['numero_telephone'];
    $CNE = $_POST['CNE'];
    $CIN = $_POST['CIN'];
    $adress = $_POST['adress'];
    $diplome = $_POST['diplome'];

    $edit = mysqli_query($con, "UPDATE etudiant SET nom='$nom', prenom='$prenom' , email='$email',
     numero_telephone='$numero_telephone' ,CNE='$CNE', CIN='$CIN' , adress='$adress' WHERE id='$id'");
    if ($edit) {

        header("location:admin.php");
        exit;
    } else {
        echo "error";
    }
}
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
    <?php include "navbar.php" ?>
    <div class="container" style="display:flex;justify-content: center ;margin-top:25px">
        <div class="text-light p-5" style="background-color: black;">
            Modifier Etudiant
        </div>
        <div class=" border border-success w-50" style="display:flex;justify-content: center;align-items: center;">

            <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <div class="form-group">
                    <label class="form-label"> nom</label>
                    <input placeholder="nom..." type="text" name="nom" class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['nom'] ?>">

                </div>
                <div class="form-group">
                    <label class="form-label">prenom</label>
                    <input type="text" placeholder="prenom..." name="prenom" class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['prenom'] ?>">
                </div>

                <div class="form-group">
                    <label class="form-label">email</label>
                    <input type="text" name="email" placeholder="email..." class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['email'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">numero_telephone</label>
                    <input type="text" placeholder="numero_telephone..." name="numero_telephone" class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['numero_telephone'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">CNE</label>
                    <input type="text" placeholder="CNE..." name="CNE" class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['CNE'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">CIN</label>
                    <input type="text" name="CIN" placeholder="CIN..." class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['CIN'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Adress</label>
                    <input type="text" name="adress" placeholder="Adress..." class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['adress'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">diplome</label>
                    <input type="text" name="diplome" placeholder="Adress..." class="form-control"
                        style="border-radius: 1.5rem;" value="<?php echo $data['diplome'] ?>">
                </div>




                <input class="btn btn-outline-primary mt-3 mb-2 " type="submit" name="submit" value="Modifier"
                    style="border-radius: 1.5rem;">
                <a href="admin.php" class="btn btn-outline-primary mt-3 mb-2 " style="border-radius: 1.5rem;">retour</a>
            </form>
        </div>
    </div>
</body>

</html>