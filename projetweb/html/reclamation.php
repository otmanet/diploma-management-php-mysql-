<?php 
   session_start();

  
    include_once 'config.php';

    $id = $_SESSION['id'];

    $qry = mysqli_query($con, "SELECT  * from user where id='$id'");

    $data = mysqli_fetch_array($qry);
    $id_et=$data['et_id'];
    if(isset($_POST['submit']))
    {	 
         $message = $_POST['message'];
         $sql = "INSERT INTO message (id_et,message) VALUES ('$id_et','$message')  ";
         if (mysqli_query($con, $sql)) {
            header("location:reclamation.php"); 
            echo "message envoyee !";
         } else {
            echo "Error: " . $sql . "
    " . mysqli_error($con);
         }
         mysqli_close($con);
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>envoie de message</title>
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
    <div class="container" style="display:flex;justify-content: center ;margin-top:25px">
        <div class="text-light p-5" style="background-color: black;">
            ecrire vos reclamations 
        </div>
        <div class=" border border-success w-50" style="display:flex;justify-content: center;align-items: center;">

            <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <textarea name="message" id="" cols="40" rows="20"  style="border-radius: 1.5rem;"></textarea>

                <input class="btn btn-outline-primary mt-3 mb-2 " type="submit" name="submit" value="envoyer"
                    style="border-radius: 1.5rem;">
                <a href="verification.php" class="btn btn-outline-primary mt-3 mb-2 " style="border-radius: 1.5rem;">retour</a>
            </form>
        </div>
    </div>
    
    
</body>
</html>