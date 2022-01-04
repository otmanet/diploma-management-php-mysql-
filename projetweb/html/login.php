<?php


// Initialize the session
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: admin.php");
  exit();
}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim($_POST["username"]);
  }


  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }



  if (empty($username_err) && empty($password_err)) {

    $sql = "SELECT id, username, password,type_user FROM user WHERE username = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {

      mysqli_stmt_bind_param($stmt, "s", $param_username);


      $param_username = $username;


      if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_store_result($stmt);


        if (mysqli_stmt_num_rows($stmt) == 1) {

          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $type_user);
          if (mysqli_stmt_fetch($stmt)) {

            if (password_verify($password, $hashed_password)) {

              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION["verifyAuth"] = $verifyAuth;
              if ($type_user == 'admin') {
                header("location: admin.php");
              } else if ($type_user == 'user') {

                header("location: verification.php");
              }
            } else {

              $password_err = "The password you entered was not valid.";
            }
          }
        } else {

          $username_err = "No account found with that username.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }


    mysqli_stmt_close($stmt);
  }


  mysqli_close($con);
}
?>








<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- <link rel="stylesheet" href="../css/login.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    #lhide {
        display: none;
    }

    #lhide1 {
        display: none;
    }

    #lhide2 {
        display: none;
    }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>


    </form>
    <div class="container" style="display:flex;justify-content: center;padding:150px">
        <div class="text-light p-5" style="background-color: black;">
            Login
        </div>
        <div class=" border border-success w-50 "
            style="display:flex;justify-content: center;align-items: center;height: 500px;">

            <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label class="form-label">Username </label>
                    <input class="form-control" type="text" name="username" class="box" placeholder="Enter Username..."
                        style="border-radius: 1.5rem;">

                    <span class="text-danger"><?php echo $username_err; ?></span>

                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label class="form-label">password </label>
                    <input type="password" placeholder="Enter password..." name="password" class="form-control"
                        style="border-radius: 1.5rem;">
                    <span class="text-danger"><?php echo $password_err; ?></span>
                </div>
                <input class="btn btn-outline-primary mt-3 mb-2 " type="submit" value="LOGIN" id="submit"
                    style=" border-radius: 1.5rem;">

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>