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



<header class="header">

        <div class="flex">
            <a href="admin_page.php" class="logo"><span>Panneau</span> d'administration  </a>
        
        
           <nav class="navbar">
           <a href="admin_page.php">ACCUEIL</a>
           <a href="admin_products.php">ARTICLE</a>
           <a href="admin_orders.php">CATEGORIE</a>
           <a href="admin_users.php">Utilisateur</a>
           <a href="admin_contact.php">CONTACT</a>

            </nav>

            <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            </div>

            <div class="account-box">
            <p>Utilisateur : <span><?php echo  $_SESSION['admin_name']; ?></span></p>
            <p>email : <span><?php echo  $_SESSION['admin_email']; ?></span></p>
             <a href="logout.php" class="delete-btn">Se déconnecter</a>
        
        </div>

        </div>
</header>