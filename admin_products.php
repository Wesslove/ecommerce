<?php       

include 'config.php';

session_start();

$admin_id=$_SESSION['admin_id'];

if (isset($_POST['add_product'])) {
   $name = mysqli_real_escape_string($conn,$_POST['nom']);
   $price = $_POST['prix'];
   $images = $_FILES['image']['name'];
   $images_tmp_name = $_FILES['image']['tmp_name'];
   $images_folder='uploaded_img/'.$images;

 
   $select_product_name=mysqli_query($conn,"SELECT name FROM `proudcts` WHERE name='$name'") or die('echec');
 if (mysqli_num_rows($select_product_name) > 0 ) {
    $message[]= "le nom du produit ajouté avec succès !";
}else {
    $add_product_query=mysqli_query($conn, "INSERT INTO `proudcts`(name,price,image) VALUES('$name','$price','$images')") or die('echec');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page_products</title>


    
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <!--custom admin css file link -->
    <link rel="stylesheet" href="css/admin_style.css" />

</head>
<body>
    <?php 
        include 'admin_header.php';
    ?>
    
  <!--page product debut-->
        <section class="add-products">
            <h1 class="title">Boutique</h1>
            <form action="" method="post" enctype="multipart/form-data">
                 <h3>ajoutez un article</h3>
                 <input type="text" name="nom" class="box" placeholder="ajoutez un article" required>
                 <input type="number" min="0" name="prix" class="box" placeholder="le prix de l'article" required>
                 <input type="file" accept="images/jpg, images/jpeg, images/png"  name="image"  class="box"  required>
                 <input type="submit" value="valider" name="add_product" class="btn" required>
            </form>
        </section>
  <!--page product fin-->



    <!--custom admin js file link-->
    <script src="js/admin_script.js"></script>
</body>
</html>

21:20