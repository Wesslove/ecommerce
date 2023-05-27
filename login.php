<?php

include 'config.php';
session_start();
 if(isset($_POST['submit'])){
  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $pass=mysqli_real_escape_string($conn, md5($_POST['pass']));


    $select_users=mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password ='$pass' ") or die('query failed');
 
    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] =='administrateur') {
            $_SESSION['admin_name']=$row['name'] ;
            $_SESSION['admin_email']=$row['email'] ;
            $_SESSION['admin_id']=$row['id'] ;
             header('location:admin_page.php');
        }
        elseif($row['user_type'] =='utilisateur') {
            $_SESSION['user_name']=$row['name'] ;
            $_SESSION['user_email']=$row['email'] ;
            $_SESSION['user_id']=$row['id'] ;
            header('location:home.php');

        }
    }else{
        $message[] = 'Email ou mot de passe incorrect !';
    }

   
 
  }


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>connexion</title>

    
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <!--custom css file link -->
    <link rel="stylesheet" href="css/style.css">

</head>
  <body>

 
     <?php

        if (isset($message)) {
           foreach($message as $message ){
             echo '<div class="message">
             <span>'.$message.'</span>
             <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>';
           }
        }

      ?>
        <div class="form_container">
          <form action=""  method="post">
            <h3>Se connecter</h3>
            <input type="email" name="email" placeholder="Entrez votre email" required class="box">
            <input type="password" name="pass" placeholder="Entrez votre mot de passe" required class="box">

            
            <input type="submit" name="submit" value="S'inscrire" class="btn">
             <p>vous n'avez pas de compte ? <a href="register.php"> S'inscrire maintenant</a></p>
        
        </form>

        </div>
  </body>
</html>