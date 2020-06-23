<?php
session_start();
if(!isset($_SESSION['id'])) {

    header('location:login.php');
 }

require_once 'clases/Product.php';
$prod = new product;
$id = $_GET['id'];
$product = $prod->getone($id);
?>

<?php include 'inc/header.php'
?>
<div class="container my-5 ">
    <div class="row">



        <form class="m-auto"  style="width: 50%;" action="handlers/handleEdit.php?id=<?php echo $product['id']?>" method="post">
            <div class="form-group ">
                
                <input type="text" class="form-control" value="<?php echo $product['name']?>" placeholder="Name" name="name" >
            </div>

            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $product['price'] ?>" placeholder="Price" name="price">
            </div>

            <div class="form-group">
                <textarea class="form-control"  placeholder="Description" name="desc" rows="3"><?php echo $product['desc'] ?></textarea>
            </div>
           
            <div class="form-group text-center">
            <button type="submit"  name="submit" class="btn btn-primary">Edit</button>
            </div>


        </form>
      

        



    </div>
</div>


<?php include 'inc/footer.php' ?>