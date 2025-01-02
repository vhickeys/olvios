<?php

require('classes/functions.php');

authCheck();

$title = "About Me";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">About Me</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-portfolios.php">View All Portfolios</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once 'components/alert_messages.php';
            ?>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Information About Me</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=about-me" method="POST" enctype="multipart/form-data">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Role:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="role" class="form-control" placeholder="Enter Your Role/Position">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Intro Title:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control" name="intro_title" placeholder="Enter Intro Title" rows="3" id=""></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Intro Text:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control" name="intro_text" placeholder="Enter Intro Text" rows="3" id=""></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Years of Experience:</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="years_of_experience" class="form-control" placeholder="Enter Years of Experience">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Projects Completed:</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="projects_completed" class="form-control" placeholder="Enter Number of Projects Completed">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Clients Worldwide:</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="clients_worldwide" class="form-control" placeholder="Enter Number of Clients Worked With">
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
                                <label class="col-form-label">What I Do?:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="description"
                                        rows="5" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">My Image:</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="image" type="file" id="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">My Resume:</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="resume" type="file" id="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-3">Status:</div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" name="status" type="checkbox">
                                        <label class="form-check-label text-danger">
                                            Hidden (This will hide this from displaying on the website)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 row justify-content-center">
                                <div class="col-sm-12">
                                    <button type="submit" name="update-me" class="btn btn-primary w-100">Update About Me</button>
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