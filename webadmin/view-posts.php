<?php

require 'classes/functions.php';

authCheck();

$title = "View All Posts";
include_once 'components/head.php';
include_once 'components/nav-header.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

$posts = $blog->getPosts();
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Posts</h5>
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
        <a class="text-primary fs-13" href="create-post.php">+ Add Post</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once 'components/alert_messages.php';
            ?>

            <form method="post" action="classes/process.php?action=delete-post">
                <div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="deletePostModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Delete This Post</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="postModalId" name="postModalId">
                                <h4>Are you sure you want to delete this Post?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="delete-post" class="btn btn-danger">Delete
                                    Post</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Posts Created</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Author</th>
                                        <th>Date Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($posts == []) {
                                    } else {
                                        foreach ($posts as $post) {
                                    ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td class="text-info"><?= $post['title'] ?></td>
                                                <td class="text-primary"><?= $post['category'] ?></td>
                                                
                                                <td>
                                                    <?php if ($post['image'] != ""): ?>
                                                        <img class="shadow" src="../assets/images/posts/<?= $post['image'] ?>" alt="" width="100">
                                                    <?php else: ?>
                                                        <button class="btn btn-danger btn-sm" disabled>No Image Uploaded!</button>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if ($post['status'] == "1"): ?>
                                                        <button class="btn btn-danger btn-sm" disabled>Hidden</button>
                                                    <?php else: ?>
                                                        <button class="btn btn-success btn-sm" disabled>Visible</button>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= $post['author'] ?></td>
                                                <td><?= date('d-M-Y', strtotime($post['date'])) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="edit-post.php?postId=<?= $post['id'] ?>"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <button class="btn btn-danger shadow btn-xs sharp delete-post" value="<?= $post['id'] ?>"><i class="fa fa-trash"></i></button>
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