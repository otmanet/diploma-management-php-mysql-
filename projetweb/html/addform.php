<?php
include_once 'config.php';
if(isset($_POST['save']))
{	 
	 $nom = $_POST['nom'];
	 $prenom = $_POST['prenom'];
	 $email = $_POST['email'];
	 $numero_telephone = $_POST['numero_telephone'];
     $CNE = $_POST['CNE'];
     $CIN = $_POST['CIN'];
     $adress = $_POST['adress'];
	 $var = $_POST['diplome'];
	 $sql = "INSERT INTO etudiant (nom,prenom,email,numero_telephone,CNE,CIN,adress,diplome)
	 VALUES ('$nom','$prenom','$email','$numero_telephone','$CNE','$CIN','$adress','$var')";
	 if (mysqli_query($con, $sql)) {
        header("location:admin.php"); 
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
}
?>