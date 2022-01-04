<?

session_start();


if (!isset($_SESSION["verfiyuser"]) || $_SESSION["verfiyuser"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <!-- <link rel="stylesheet" href="../css/cssf.css"> -->
    <script src="https://kit.fontawesome.com/9099f81dc0.js" crossorigin="anonymous"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Pushster&display=swap');

    #lhide {

        display: flex;
        position: absolute;
        right: 0;
        margin-right: 8px
    }
    </style>
</head>

<body>
    <?php include('navbaretudiant.php') ?>
    <div class="text-light p-5" style="background-color: black; ">
       <p style=" color:white; font-size:large; text-align:center; ">vos informations</p> 
    </div>
    <div class="container" style="display:flex;justify-content: center ;margin-top:25px;border:2px solid green">


        <form action="">

            <?php
            session_start();
            include "config.php";

            $id_user = $_SESSION['id'];

            $records = mysqli_query($con, "SELECT u.id,u.et_id,u.username,u.created_at,e.nom,e.prenom,e.email
            ,e.numero_telephone,e.CNE,e.CIN,e.adress,e.diplome FROM user as u,etudiant as e WHERE e.id=u.et_id AND u.id='$id_user'");


            while ($data = mysqli_fetch_array($records)) {
                $id = $data['id'];
            ?>
            <ul class="form-group" style="list-style: none;border-style: dotted">
                <li style="font-family: 'Pushster', cursive;font-size: 25px;" for="email" class="form-label"><i
                        class="fas fa-asterisk"></i>&nbsp; Nom :
                    <?php echo $data['nom'] ?></li>
                <li style="font-family: 'Pushster', cursive;font-size: 25px;" for="email" class="form-label"><i
                        class="fas fa-asterisk"></i>&nbsp;Prenom :
                    <?php echo $data['prenom'] ?></li>
                <li style="font-family: 'Pushster', cursive;font-size: 25px;" for="email" class="form-label"><i
                        class="fas fa-asterisk"></i>&nbsp;Email :
                    <?php echo $data['email'] ?></li>
                <li style="font-family: 'Pushster', cursive;font-size: 25px;" for="email" class="form-label"><i
                        class="fas fa-asterisk"></i>&nbsp;Numero :
                    <?php echo $data['numero_telephone'] ?></li>
                <li style="font-family: 'Pushster', cursive;font-size: 25px;" for="email" class="form-label"><i
                        class="fas fa-asterisk"></i>&nbsp;CNE :
                    <?php echo $data['CNE'] ?></li>
                <li style="font-family: 'Pushster', cursive;font-size: 25px;" for="email" class="form-label"><i
                        class="fas fa-asterisk"></i>&nbsp;CIN :
                    <?php echo $data['CIN'] ?></li>
                <li style="font-family: 'Pushster', cursive;font-size: 25px;" for="email" class="form-label"><i
                        class="fas fa-asterisk"></i>&nbsp;Adress :
                    <?php echo $data['adress'] ?></li>
            </ul>
            <button class="btn btn-outline-primary mt-3 mb-2 " type="submit" name="save" value="submit"
                    style="border-radius: 1.5rem;" onclick="myFunction()">verifie Diplome</button>
            <?php if($data['diplome']==0){?>
                <script>
                    function myFunction(){
                        alert("votre diplome n'est pas disponible");
                    }
                </script>
            <?php    
            }else{?>
                 <script>
                    
                    function myFunction(){
                        alert("votre diplome est disponible");
                    }
                    
                </script>
          <?php  } ?>

    
            
    </div>
  

    <?php
            }
            
        ?>
           




    </form>

    </div>


</body>

</html>