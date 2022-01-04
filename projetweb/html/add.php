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
            Ajouter Etudiant
        </div>
        <div class=" border border-success w-50" style="display:flex;justify-content: center;align-items: center;">

            <form class="" method="post" action="addform.php">

                <div class="form-group">
                    <label class="form-label"> nom</label>
                    <input type="text" placeholder="nom..." name="nom" class="form-control"
                        style="border-radius: 1.5rem;">

                </div>
                <div class="form-group">
                    <label class="form-label">prenom</label>
                    <input type="text" placeholder="prenom..." name="prenom" class="form-control"
                        style="border-radius: 1.5rem;">
                </div>

                <div class="form-group">
                    <label class="form-label">email</label>
                    <input type="text" name="email" placeholder="email..." class="form-control"
                        style="border-radius: 1.5rem;">
                </div>
                <div class="form-group">
                    <label class="form-label">numero_telephone</label>
                    <input type="text" placeholder="numero_telephone..." name="numero_telephone" class="form-control"
                        style="border-radius: 1.5rem;">
                </div>
                <div class="form-group">
                    <label class="form-label">CNE</label>
                    <input type="text" placeholder="CNE..." name="CNE" class="form-control"
                        style="border-radius: 1.5rem;">
                </div>
                <div class="form-group">
                    <label class="form-label">CIN</label>
                    <input type="text" name="CIN" placeholder="CIN..." class="form-control"
                        style="border-radius: 1.5rem;">
                </div>
                <div class="form-group">
                    <label class="form-label">Adress</label>
                    <input type="text" name="adress" placeholder="Adress..." class="form-control"
                        style="border-radius: 1.5rem;">
                </div>
        
                <div class="form-group">
                    <label class="form-label"> diplome</label>
                    <input type="text" placeholder="1 ou 0" name="diplome" class="form-control"
                        style="border-radius: 1.5rem;">
                </div>





                <input class="btn btn-outline-primary mt-3 mb-2 " type="submit" name="save" value="submit"
                    style="border-radius: 1.5rem;">
                <a href="admin.php" class="btn btn-outline-primary mt-3 mb-2 " style="border-radius: 1.5rem;">retour</a>
            </form>
        </div>
    </div>
</body>

</html>