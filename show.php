<?php
session_start();
require_once 'clases/Product.php';

$prod = new product;
$id = $_GET['id'];
$product = $prod->getone($id);
$_SESSION['prodid']=$id;



if(!isset($_SESSION['cart'])){
$_SESSION['cart']=[];}
if(isset($_POST['cart'])){
    array_push($_SESSION['cart'],$_SESSION['prodid']);
}



?>

<?php include 'inc/header.php'
?>
<div class="container my-5">
    <div class="row">


        <div class="col-lg-6">

            <img src="images/<?php echo $product['img'] ?>" class="img-fluid">
        </div>

        <div class="col-lg-6">

            <h5><?php echo $product['name'] ?></h5>
            <p class="text-muted">price: <?php echo $product['price'] ?>$</p>
            <p class="card-text"><?php echo $product['desc'] ?></p>            
            <?php if(!isset($_SESSION['id'])) {?>
                <form action="show.php?id=<?php echo $product['id']  ?>" method="POST">
                <a href="index.php" class="btn btn-secondary">Back</a>

                <input type="submit" class="btn btn-primary" name="cart" value="Add to cart">
                <?php if(isset($_POST['cart'])){?>
                <a class="btn btn-warning" href="buy.php">Buy product</a>
                <?php }?>
            </form>
            <?php }?>


            <?php if(isset($_SESSION['id'])) {?>
                <a href="index.php" class="btn btn-secondary">Back</a>


            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Edit</a>
            <?php }?>
            <?php if(isset($_SESSION['id'])) {?>

            <a href="handlers/handleDelete.php?id=<?php echo $product['id'] ?> " class="btn btn-danger">Delete</a>
            <?php }?>

        </div>









    </div>
</div>


<?php include 'inc/footer.php' ?>