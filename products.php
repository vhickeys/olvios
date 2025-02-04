<?php
$title = "My Products";
$currentPage = "products";
include_once 'components/head.php';
include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';
?>

<!-- best project section start -->
<section class="pt-120 pb-120 mt-10 mt-lg-0">
    <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
            <h3 class="page-title n5-color fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
                Check Out What I've Created for You
            </h3>
            <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
                Explore a collection of projects where creativity meets code.
                From sleek, responsive designs to intuitive user experiences,
                each project represents a unique solution tailored to meet
                client needs. Dive in to see how ideas transform into digital
                realities.
            </p>
            <a href="contact.php"
                class="w-max primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
                <i class="ph ph-paper-plane-tilt"></i>Book a Consultation
            </a>
        </div>
    </div>
    <div class="container mt-8 mt-md-15">
        <!-- tab -->
        <div>
            <ul data-aos="zoom-in" data-aos-duration="800"
                class="tabs d-flex gap-5 gap-md-10 justify-content-center flex-wrap p-2 pb-5 pb-md-10">
                <li data-tab-target="#all" class="active fs-seven fw-medium cursor-pointer n3-color pb-1 tab">
                    All
                </li>

                <?php if ($categories != []): ?>

                    <?php foreach ($categories as $category): ?>

                        <li data-tab-target="#<?= $category['slug'] ?>"
                            class="fs-seven fw-medium cursor-pointer n3-color pb-1 tab">
                            <?= $category['name'] ?>
                        </li>

                    <?php endforeach; ?>

                <?php else: ?>
                    <li data-tab-target="#all" class="fs-seven fw-medium cursor-pointer n3-color pb-1 tab">
                        No Category Found!
                    </li>
                <?php endif; ?>

            </ul>

            <div class="tab-content position-relative overflow-hidden">
                <div id="all" data-tab-content class="active">
                    <div class="row g-6 g-md-8">
                        <?php if ($allProducts != []): ?>

                            <?php foreach ($allProducts as $allProduct): ?>

                                <div data-aos="fade-up" data-aos-duration="800" class="col-sm-6 col-xxl-4">
                                    <div class="product-card">
                                        <a href="product-details.php?prodId=<?= $allProduct['slug'] ?? '' ?>"
                                            class="thumb d-block">
                                            <div class="post-thumb">
                                                <div class="post-thumb-inner">
                                                    <img src="assets/images/products/<?= $allProduct['image'] ?? '' ?>"
                                                        alt="<?= $allProduct['name'] ?? '' ?> | Victor Osaronwafor" class="product-img w-100 p-2" />
                                                </div>
                                            </div>
                                            <div class="post-thumb">
                                                <div class="post-thumb-inner">
                                                    <img src="assets/images/products/<?= $allProduct['image'] ?? '' ?>"
                                                        alt="<?= $allProduct['name'] ?? '' ?> | Victor Osaronwafor" class="product-img w-100 p-2" />
                                                </div>
                                            </div>
                                        </a>
                                        <div class="px-2">
                                            <a href="product-details.php?prodId=<?= $allProduct['slug'] ?? '' ?>"
                                                class="project-title fs-six fw-semibold n5-color mt-3 mt-md-5 mb-2 d-block">
                                                <?= $allProduct['name'] ?? '' ?>
                                            </a>
                                            <p class="fs-six n3-color">
                                                <?= substr($allProduct['caption'], 0, 50) ?> ...
                                            </p>
                                            <div class="mt-4">
                                                <a href="product-details.php?prodId=<?= $allProduct['slug'] ?? '' ?>"
                                                    class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                                                    <i class="ph-bold ph-arrow-up-right n5-color"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>
                            <div class="alert alert-info ps-5">
                                No Products at the moment, check again later!
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <?php foreach ($categories as $category): ?>

                    <div id="<?= $category['slug'] ?>" data-tab-content>
                        <div class="row g-6 g-md-8">

                            <?php
                            $cat_products = $product->getProductByCatId($category['id']);
                            if ($cat_products != []) {
                                foreach ($cat_products as $cat_product) {
                                    ?>
                                    <div class="col-sm-6 col-xxl-4 mb-5">
                                        <div class="product-card">
                                            <a href="product-details.php?prodId=<?= $cat_product['slug'] ?>" class="thumb d-block">
                                                <div class="post-thumb">
                                                    <div class="post-thumb-inner">
                                                        <img src="assets/images/products/<?= $cat_product['image'] ?? '' ?>"
                                                            alt="<?= $cat_product['name'] ?> | Victor Osaronwafor"
                                                            class="product-img w-100 p-2" />
                                                    </div>
                                                </div>
                                                <div class="post-thumb">
                                                    <div class="post-thumb-inner">
                                                        <img src="assets/images/products/<?= $cat_product['image'] ?? '' ?>"
                                                            alt="<?= $cat_product['name'] ?> | Victor Osaronwafor"
                                                            class="product-img w-100 p-2" />
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="px-2">
                                                <a href="product-details.php?prodId=<?= $cat_product['slug'] ?>"
                                                    class="project-title fs-six fw-semibold n5-color mt-3 mt-md-5 mb-2 d-block">
                                                    <?= $cat_product['name'] ?>
                                                </a>
                                                <p class="fs-six n3-color">
                                                    <?= substr($cat_product['caption'], 0, 50) ?> ...
                                                </p>
                                                <div class="mt-4">
                                                    <a href="product-details.php?prodId=<?= $cat_product['slug'] ?>"
                                                        class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                                                        <i class="ph-bold ph-arrow-up-right n5-color"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                }
                            } else {
                                ?>

                                <div class="alert alert-info ps-5">
                                    No Product at the moment for this category, check again later!
                                </div>

                            <?php
                            }
                            ?>


                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
<!-- best project section end -->

<?php
include_once 'components/footer.php';
?>