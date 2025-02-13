<?php

require 'classes/functions.php';

authCheck();

$title = "View comment Comments";
include_once 'components/head.php';
include_once 'components/nav-header.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

$comments = $blog->getAllPostComments();
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Comments</h5>
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

            <form method="post" action="classes/process.php?action=delete-comment">
                <div class="modal fade" id="deleteCommentModal" tabindex="-1" aria-labelledby="deleteCommentModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Delete This Comment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="commentModalId" name="commentModalId">
                                <h4>Are you sure you want to delete this comment?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="delete-comment" class="btn btn-danger">Delete
                                    comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All comments Created</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Post Title</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($comments == []) {
                                    } else {
                                        foreach ($comments as $comment) {
                                            ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td class="text-info"><?= $comment['first_name'] . ' ' . $comment['last_name'] ?>
                                                </td>
                                                <td class="text-info text-decoration-underline"><a href="../blog-details.php?read=<?= $comment['post_slug'] ?>"><?= $comment['post_title'] ?? '' ?></a></td>

                                                <td><a href="mailto:<?= $comment['email'] ?? '' ?>"><?= $comment['email'] ?? '' ?></a></td>
                                                <td class="text-success"><?= $comment['message'] ?? '' ?></td>
                                                <td><?= date('H:i:s d-M-Y', strtotime($comment['date'])) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <?php if ($_SESSION['user_data']['role'] == "2"): ?>
                                                            <button class="btn btn-danger shadow btn-xs sharp delete-comment"
                                                                value="<?= $comment['id'] ?>"><i class="fa fa-trash"></i></button>
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