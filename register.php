<?php

include 'config.php';
 if(isset($_POST['submit'])){
  $name=mysqli_real_escape_string($conn, $_POST['name']);
  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $pass=mysqli_real_escape_string($conn, md5($_POST['pass']));
  $cpass=mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type=$_POST['user_type'];

    $select_users=mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password ='$pass' ") or die('query failed');
 
    if (mysqli_num_rows($select_users) > 0) {
       $message[] = 'l\'utilisateur existe déjà !';
    }else{
          if($pass != $cpass){
            $message[] = 'les deux mots de passe ne correspondent pas  !';
          }else{
            mysqli_query($conn, "INSERT INTO  `users`(name,email,password, user_type) VALUES ('$name', '$email', '$cpass', '$user_type')") or die('query failed');
             $message[]='enregistrement avec succès !';
             header('location:login.php');
          }
    }

   
 
  }

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>enregistrement</title>

    
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <!--custom css file link -->
    <link rel="stylesheet" href="css/style.css" />

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
            <h3>S'inscrire maintenant</h3>
            <input type="text" name="name" placeholder="Entrez votre nom" required class="box">
            <input type="email" name="email" placeholder="Entrez votre email" required class="box">
            <input type="password" name="pass" placeholder="Entrez votre mot de passe" required class="box">
            <input type="password" name="cpassword" placeholder="confirmez votre mot de passe" required class="box">

            <select name="user_type" class="box">
                <option value="utilisateur">Utilisateur</option>
                <option value="administrateur">Administrateur</option>
            </select>
            <input type="submit" name="submit" value="valider" class="btn">
         <p>Vous avez déjà un compte ? <a href="login.php">Connectez-vous maintenant</a></p>
        
        </form>

        </div>
  </body>
</html>