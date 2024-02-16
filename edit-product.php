<?php

include("server.php");
include("sidenav.php");
include("topheader.php");

$id = $_REQUEST['product_id'];

$result = mysqli_query($db, "SELECT `id`, `name`, `image` FROM tb_upload WHERE id='$id'") or die("query 1 incorrect.......");

list($id, $product_name, $pic_name) = mysqli_fetch_array($result);

if (isset($_POST['btn_save'])) {
    $product_name = $_POST['product_name'];

    // صورة المنتج
    if ($_FILES['picture']['name'] != "") {
        $picture_name = $_FILES['picture']['name'];
        $picture_type = $_FILES['picture']['type'];
        $picture_tmp_name = $_FILES['picture']['tmp_name'];
        $picture_size = $_FILES['picture']['size'];

        if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
            if ($picture_size <= 50000000) {
                $pic_name = time() . "_" . $picture_name;
                move_uploaded_file($picture_tmp_name, "img/" . $pic_name);
            } else {
                echo "حجم الملف كبير جدًا.";
            }
        } else {
            echo "نوع الملف غير مدعوم.";
        }
    }

    mysqli_query($db, "UPDATE tb_upload SET name='$product_name', image='$pic_name' WHERE id='$id'") or die("Query is incorrect..........");
    

  
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>تعديل المنتج</title>
    
</head>
<body>
    <h2>تعديل المنتج</h2>
    <form action="" method="post" enctype="multipart/form-data">
       
    
    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" value="<?php echo $product_name; ?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                    <img src='<?php echo "img/".$pic_name?>' style='width:50px; height:50px; border:groove #000'>
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture"  class="btn btn-fill btn-success" value="<?php echo "img/".$pic_name?>" id="picture" >
                      </div>
                    </div>
                    <div class="">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
              </form>
</body>
</html>