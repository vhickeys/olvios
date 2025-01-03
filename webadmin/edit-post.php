<?php

require('classes/functions.php');

$post_id = $_GET["postId"];

authCheckById($post_id, 'view-posts');

$title = "Edit a Post";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$post = $blog->getSinglePostById($post_id);

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Edit this Blog Post</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-posts.php">View All Blog Posts</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once 'components/alert_messages.php';
            ?>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Blog Post</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=edit-post" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="post_id" value="<?= $_GET["postId"] ?>">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" value="<?= $post['title'] ?>" placeholder="Enter Title of Blog Post">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Category:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category" class="form-control" value="<?= $post['category'] ?>" placeholder="Enter Category of Blog Post">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control" name="caption" placeholder="Enter Caption of Blog Post" rows="3" id=""><?= $post['caption'] ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Quotes:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control" name="quote" placeholder="Enter Quotes of Blog Post" rows="3" id=""><?= $post['quote'] ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control" name="description"
                                            rows="8" placeholder="Blog Post Content"><?= $post['description'] ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Portfolio Image:</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="image" type="file" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="old_image" value="<?= $post['image'] ?? 'No Data' ?>">
                                        <img src="../assets/images/posts/<?= $post['image'] ?: 'default.png' ?>" class="img-fluid" alt="<?= $post['title'] ?? 'No Data' ?>">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">OTHER INFORMATION</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Title:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="meta_title" class="form-control" value="<?= $post['meta_title'] ?>" placeholder="Meta Title">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Keywords:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="meta_keywords" placeholder="Meta Keywords" rows="3" id=""><?= $post['meta_keywords'] ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="meta_description" placeholder="Meta Description" rows="3" id=""><?= $post['meta_description'] ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-3">Status:</div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $post['status'] == '1' ? 'checked' : '' ?> name="status" type="checkbox">
                                        <label class="form-check-label">
                                            Hidden
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="author" value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>" class="form-control">

                            <div class="my-3 row justify-content-center">
                                <div class="col-sm-12">
                                    <button type="submit" name="update-post" class="btn btn-primary w-100">Update Blog Post</button>
                                </div>
                            </div>

                        </div>
                        </form>
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