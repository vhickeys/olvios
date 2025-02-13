<?php

require 'classes/functions.php';

authCheck();

$title = "View Contact Requests";
include_once 'components/head.php';
include_once 'components/nav-header.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

$contacts = $contact->getAllContacts();
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All contacts</h5>
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

            <form method="post" action="classes/process.php?action=delete-contact">
                <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="deleteContactModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Delete This Contact</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="contactModalId" name="contactModalId">
                                <h4>Are you sure you want to delete this contact?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="delete-contact" class="btn btn-danger">Delete
                                    contact</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Contacts Created</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Message</th>
                                        <th>Date Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($contacts == []) {
                                    } else {
                                        foreach ($contacts as $contact) {
                                            ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td class="text-info"><?= $contact['name'] ?></td>
                                                <td class="text-decoration-underline text-danger"><a
                                                        href="mailto:<?= $contact['email'] ?? '' ?>"><?= $contact['email'] ?? '' ?></a>
                                                </td>
                                                <td class="text-info"><?= $contact['phone'] ?></td>
                                                <td class="text-info"><?= $contact['location'] ?></td>
                                                <td class="text-success"><?= $contact['message'] ?? '' ?></td>
                                                <td><?= date('H:i:s d-M-Y', strtotime($contact['date'])) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <?php if ($_SESSION['user_data']['role'] == "2"): ?>
                                                            <button class="btn btn-danger shadow btn-xs sharp delete-contact"
                                                                value="<?= $contact['id'] ?>"><i class="fa fa-trash"></i></button>
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