<?php

require('classes/functions.php');
$portfolio_id = $_GET["portId"];

authCheckById($portfolio_id, 'view-portfolios');

$title = "Edit Portfolio";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$portfolio_categories = $category->getCategoriesByStatus("categories", 0);
$portfolio = $portfolio->getSinglePortfoById($portfolio_id);

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Portfolio</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-portfolios.php">View All Portfolio</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once 'components/alert_messages.php';
            ?>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Creates New Portfolio</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=edit-portfolio" method="POST" enctype="multipart/form-data">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Portfolio Category:</label>
                                    <div class="col-sm-9">

                                        <input type="hidden" name="portfolio_id" value="<?= $_GET["portId"] ?>">

                                        <div class="dropdown bootstrap-select default-select form-control wide dropup">

                                            <select class="default-select form-control wide" name="category_id" tabindex="null"
                                                required>

                                                <option value="">-- Select Portfolio Category --</option>
                                                <?php
                                                if ($portfolio_categories != []) {
                                                    foreach ($portfolio_categories as $portfolio_category) {
                                                ?>
                                                        <option <?= $portfolio['category_id'] == $portfolio_category['id'] ? 'selected' : '' ?> value='<?= $portfolio_category['id'] ?>'><?= $portfolio_category['name'] ?></option>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <option value='' disabled>No Portfolio Category Found!</option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" value="<?= $portfolio['title'] ?? 'No Data' ?>" placeholder="Enter Title of Portfolio">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="caption" class="form-control" value="<?= $portfolio['caption'] ?? 'No Data' ?>" placeholder="Enter Caption of Portfolio">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control tiny" name="description"
                                            rows="8" placeholder="Description"><?= $portfolio['description'] ?? 'No Data' ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Portfolio Image:</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="image" type="file" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="old_image" value="<?= $portfolio['image'] ?? 'No Data' ?>">
                                        <img src="../assets/images/portfolios/<?= $portfolio['image'] ?>" class="img-fluid" alt="<?= $portfolio['title'] ?? 'No Data' ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Client:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="client" value="<?= $portfolio['client'] ?? 'No Data' ?>" class="form-control" placeholder="Client of Project">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Services:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="services" value="<?= $portfolio['services'] ?? 'No Data' ?>" class="form-control" placeholder="Services offered">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Technologies:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="technologies" value="<?= $portfolio['technologies'] ?? 'No Data' ?>" class="form-control" placeholder="Technologies used">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Project URL:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="project_url" value="<?= $portfolio['project_url'] ?? 'No Data' ?>" class="form-control" placeholder="Project URL (Link to see the project live)">
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
                                <label class="col-form-label">Start Date:</label>
                                <div class="col-sm-12">
                                    <input type="date" name="start_date" value="<?= $portfolio['start_date'] ?? 'No Data' ?>" class="form-control" placeholder="Project URL (Link to see the project live)">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Duration:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="duration" value="<?= $portfolio['duration'] ?? 'No Data' ?>" class="form-control" placeholder="Duration of Project">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Title:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="meta_title" value="<?= $portfolio['meta_title'] ?? 'No Data' ?>" class="form-control" placeholder="Meta Title">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Keywords:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="meta_keywords" placeholder="Meta Keywords" rows="3" id=""><?= $portfolio['meta_keywords'] ?? 'No Data' ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="meta_description" placeholder="Meta Description" rows="3" id=""><?= $portfolio['meta_description'] ?? 'No Data' ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-3">Status:</div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $portfolio['status'] == 1 ? 'checked' : '' ?> name="status" type="checkbox">
                                        <label class="form-check-label">
                                            Hidden
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="creator" value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                            <div class="my-3 row justify-content-center">
                                <div class="col-sm-12">
                                    <button type="submit" name="update-portfolio" class="btn btn-primary w-100">Update this Portfolio</button>
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