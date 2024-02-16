<?php

include("server.php");
error_reporting(0);

if ($_GET['action'] == 'delete' && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "SELECT image FROM tb_upload WHERE id = $product_id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $image = "img/" . $row['image'];

    if (file_exists($image)) {
        unlink($image);
    }

    $deleteQuery = "DELETE FROM tb_upload WHERE id = $product_id";
    mysqli_query($db, $deleteQuery);
}

$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$page1 = ($page * 10) - 10;

include("sidenav.php");
include("topheader.php");
?>

<!-- Start content -->

<div class="content">
        <div class="container-fluid">
<div class="col-md-14">
    <div class="card ">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Products List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tb_upload LIMIT $page1, 10";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $image ="img/" . $row['image'];
                        ?>
                            <tr>
                                <td><img src="<?php echo $image; ?>" width="50" height="50"style='width:50px; height:50px; border:groove #000'></td>
                                <td><?php echo $name; ?></td>
                                <td>
                                    <a class=' btn btn-success' href="edit-product.php?product_id=<?php echo $id; ?>">Edit</a>
                                    <a  class=' btn btn-danger' href="?action=delete&product_id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="scrollbar">
        <nav>
            <ul class="pagination">
                <?php
                $query = "SELECT COUNT(*) as total FROM tb_upload";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                $totalPages = ceil($row['total'] / 10);

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
<!-- End content -->

<?php include("footer.php"); ?>