<?php

$title = "My Product";
$currentPage = "product";
include_once 'components/head.php';

if (!isset($_GET['prodId']) || empty($_GET['prodId']) || ($product->getProductBySlugStatus($_GET['prodId']) == [])) {
    echo "<script>window.history.back()</script>";
}

include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';
?>

<div class="container">
    <!-- products details banner section start -->
    <section class="pt-120 mt-10 mt-lg-0">
        <div class="row g-6 g-sm-12 g-xl-20 align-items-center justify-content-between">
            <div class="col-xl-6">
                <h2 class="fs-two n4-color">
                    <?= $product_details['name'] ?? '' ?>
                </h2>
                <p class="n3-color fs-six mt-3 mt-xl-6">
                    <?= $product_details['caption'] ?? '' ?>
                </p>
            </div>
            <div class="col-xl-6 d-flex align-items-center justify-content-center">
                <div class="overflow-hidden">
                    <img src="assets/images/products/<?= $product_details['image'] ?? '' ?>"
                        alt="<?= $product_details['name'] ?? '' ?> | Victor Osaronwafor Olvios" class="product-details-img" />
                </div>
            </div>
        </div>
    </section>
    <!-- products details banner section end -->

    <!-- products details card start -->
    <section class="pt-60">
        <div class="row g-3 g-md-6">
            <div class="col-sm-6 col-xl-4 col-xxl-3">
                <div class="bgn2-color brn4 p-3 p-md-5 rounded">
                    <span class="fs-five p1-color d-block">
                        <i class="ph-fill ph-seal-check"></i>
                    </span>
                    <span class="fs-five fw-medium n5-color mt-1 mt-md-2">Efficient</span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 col-xxl-3">
                <div class="bgn2-color brn4 p-3 p-md-5 rounded">
                    <span class="fs-five p1-color d-block">
                        <i class="ph-fill ph-seal-check"></i>
                    </span>
                    <span class="fs-five fw-medium n5-color mt-1 mt-md-2">Easy To Use</span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 col-xxl-3">
                <div class="bgn2-color brn4 p-3 p-md-5 rounded">
                    <span class="fs-five p1-color d-block">
                        <i class="ph-fill ph-seal-check"></i>
                    </span>
                    <span class="fs-five fw-medium n5-color mt-1 mt-md-2">Interactive</span>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4 col-xxl-3">
                <div class="bgn2-color brn4 p-3 p-md-5 rounded">
                    <span class="fs-five p1-color d-block">
                        <i class="ph-fill ph-seal-check"></i>
                    </span>
                    <span class="fs-five fw-medium n5-color mt-1 mt-md-2">Sleek Interfaces</span>
                </div>
            </div>
        </div>
    </section>
    <!-- products details card end -->

    <!-- products details description start -->
    <section class="details-description pt-60 pb-60 d-flex flex-column gap-4 gap-md-8">
        <div>
            <?= $product_details['description'] ?? '' ?>
        </div>
    </section>
    <!-- products details description end -->

    <!-- similar products section start -->

    <?php
    $related_products = $product->getRelatedProducts($product_details['category_id'], $_GET['prodId'], '3');
    if ($related_products != []) {
        ?>

        <section class="pb-120">
            <h3 class="fs-two n5-color mb-5 mb-md-10">
                Check out similar products
            </h3>
            <div class="row g-6 g-md-8">

                <?php foreach ($related_products as $related_product): ?>

                    <div class="col-sm-6 col-xxl-4">
                        <div class="product-card">
                            <a href="product-details.php?prodId=<?= $related_product['slug'] ?? '' ?>" class="thumb d-block">
                                <div class="post-thumb">
                                    <div class="post-thumb-inner">
                                        <img src="assets/images/products/<?= $related_product['image'] ?? '' ?>"
                                            alt="<?= $related_product['name'] ?? '' ?> | Victor Osaronwafor Olvios" class="product-img w-100 p-2" />
                                    </div>
                                </div>
                                <div class="post-thumb">
                                    <div class="post-thumb-inner">
                                        <img src="assets/images/products/<?= $related_product['image'] ?? '' ?>"
                                            alt="<?= $related_product['name'] ?? '' ?> | Victor Osaronwafor Olvios" class="product-img w-100 p-2" />
                                    </div>
                                </div>
                            </a>
                            <div class="px-2">
                                <a href="product-details.php?prodId=<?= $related_product['slug'] ?? '' ?>"
                                    class="project-title fs-five fw-semibold n5-color mt-3 mt-md-5 mb-2 d-block">
                                    <?= $related_product['name'] ?? '' ?>
                                </a>
                                <p class="fs-six n3-color">
                                    <?= substr($related_product['caption'], 0, 50) ?> ...
                                </p>
                                <div class="mt-5">
                                    <a href="product-details.php?prodId=<?= $related_product['slug'] ?? '' ?>"
                                        class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                                        <i class="ph-bold ph-arrow-up-right n5-color"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>
        </section>

        <?php
    }
    ?>

    <!-- similar products section end -->
</div>

<?php
include_once 'components/footer.php';
?>