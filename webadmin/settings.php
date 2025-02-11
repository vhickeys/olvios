<?php

require('classes/functions.php');

authCheck();

$title = "Web Settings";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$webSetting = $settings->getSettings('1', '0');
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Settings</h5>
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
        <a class="text-primary fs-13" data-bs-toggle="offcanvas" href="#changePassword" role="button"
            aria-controls="changePassword">Change Password</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once 'components/alert_messages.php';

            if ($webSetting != null) {
                ?>

                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Modify Settings</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="classes/process.php?action=settings" method="POST"
                                    enctype="multipart/form-data">

                                    <h4>Contact Details</h4>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">Phone Number:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Enter Phone Number"
                                                value="<?= $webSetting['phone'] ?? 'No Record' ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Email:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" class="form-control"
                                                placeholder="Enter Email Address"
                                                value="<?= $webSetting['email'] ?? 'No Record' ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Office Address:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-txtarea form-control" name="office_address" rows="4"
                                                id="comment"><?= $webSetting['office_address'] ?? 'No Record' ?></textarea>
                                        </div>
                                    </div>

                                    <hr class="my-5">

                                    <h4>Social Media Links</h4>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">Facebook:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="Enter facebook Link"
                                                value="<?= $webSetting['facebook'] ?? 'No Record' ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">Instagram:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="instagram" class="form-control"
                                                placeholder="Enter instagram Link"
                                                value="<?= $webSetting['instagram'] ?? 'No Record' ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">Twitter:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="twitter" class="form-control"
                                                placeholder="Enter twitter Link"
                                                value="<?= $webSetting['twitter'] ?? 'No Record' ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">LinkedIn:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="linkedIn" class="form-control"
                                                placeholder="Enter linkedIn Link"
                                                value="<?= $webSetting['linkedIn'] ?? 'No Record' ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">Youtube:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="youtube" class="form-control"
                                                placeholder="Enter youtube Link"
                                                value="<?= $webSetting['youtube'] ?? 'No Record' ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">Whatsapp Number:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="whatsapp" class="form-control"
                                                placeholder="Enter Whatsapp Number"
                                                value="<?= $webSetting['whatsapp'] ?? 'No Record' ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label class="col-sm-3 col-form-label">Whatsapp Chat Me Url:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="whatsapp_url" class="form-control"
                                                placeholder="Enter Whatsapp Chat Me URL"
                                                value="<?= $webSetting['whatsapp_url'] ?? 'No Record' ?>">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="basic-form">
                                <hr>

                                <h4>Website Customization</h4>

                                <div class="mb-3 row">
                                    <label for="formFile" class="col-form-label">Website Logo</label>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <p class="text-danger"><small>You cannnot upload images greater than
                                                    500KB*</small></p>
                                            <input class="form-control" name="logo" type="file" id="formFile">

                                            <input class="form-control" name="old_image"
                                                value="<?= $webSetting['logo'] ?? 'No Record' ?>" type="hidden"
                                                id="formFile">
                                        </div>

                                        <div class="mb-3">
                                            <?php if ($webSetting['logo'] != ''): ?>

                                                <img src="../assets/images/settings/<?= $webSetting['logo'] ?? 'blank.jpg'; ?>"
                                                    alt="" class="img-fluid" width="20%">

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-3">Status:</div>
                                    <div class="col-sm-9">
                                        <div class="form-check">

                                            <p class="text-danger"><small>Warning* This will disable every settings on the
                                                    website.
                                                    Don't hide this if you are not sure. In case you hide this by mistake
                                                    thereby disabling all web settings on the website, kindly contact the
                                                    Admin to unhide.</small></p>

                                            <input <?= $webSetting['status'] == 1 ? 'checked' : '' ?> class="form-check-input"
                                                name="status" type="checkbox">
                                            <label class="form-check-label">
                                                Hidden
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="author"
                                    value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                                <div class="my-3 row justify-content-center">
                                    <button type="submit" name="submit-settings" class="btn btn-primary">Modify Web
                                        Settings</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
            } else {
                echo "All Web Settings feature down. No settings available! Contact Admin";
            }
            ?>
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