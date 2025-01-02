<?php

require('classes/functions.php');

authCheck();

$title = "View All Products";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$products = $product->getProducts();

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Products</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                            stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="create-product.php">+ Add product</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once 'components/alert_messages.php';
            ?>

            <form method="post" action="classes/process.php?action=delete-product">
                <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Delete This Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="productModalId" name="productModalId">
                                <h4>Are you sure you want to delete this product?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="delete-product" class="btn btn-danger">Delete
                                    Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Products Created</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Product URL</th>
                                        <th>Date Added</th>
                                        <th>Creator</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($products == []) {
                                    } else {
                                        foreach ($products as $product) {
                                    ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td class="text-success"><?= $product['name'] ?></td>
                                                <td class="text-info"><?= $product['category'] ?></td>
                                                <td>$<?= $product['price'] ?></td>
                                                <td>
                                                    <?php if ($product['image'] != ""): ?>
                                                        <img class="shadow" src="../assets/images/products/<?= $product['image'] ?>" alt="" width="100">
                                                    <?php else: ?>
                                                        <button class="btn btn-danger btn-sm" disabled>No Image Uploaded!</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td><a href="<?= $product['product_url'] ?>"><?= $product['product_url'] ?></a></td>
                                                <td><?= date('d-M-Y', strtotime($product['date'])) ?></td>
                                                <td><?= $product['creator'] ?></td>
                                                <td>
                                                    <?php if ($product['status'] == "1"): ?>
                                                        <button class="btn btn-danger btn-sm" disabled>Hidden</button>
                                                    <?php else: ?>
                                                        <button class="btn btn-success btn-sm" disabled>Visible</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="edit-product.php?prodId=<?= $product['id'] ?>"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <button class="btn btn-danger shadow btn-xs sharp delete-product" value="<?= $product['id'] ?>"><i class="fa fa-trash"></i></button>
                                                        <?php endif; ?>

                                                    </div>
                                                </td>
                                            </tr>

                                    <?php
                                            $id++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!--**********************************
            Content body end
***********************************-->

<?php
include_once('components/footer.php');
include_once('components/scripts.php');
?>