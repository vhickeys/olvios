<?php
require_once 'webadmin/classes/functions.php';
$webSetting = $settings->getSettings('1', '0');
$getAboutMe = $aboutMe->getAboutMe();
$categories = $category->getCategoriesByStatus("categories", "0");
$allPortfolios = $portfolio->getAllPortfolios();
$allProducts = $product->getAllProducts();
$featuredProjects = $portfolio->getPortfolioLimit("6");
$testimonials = $testimonial->getTestimonialByStatus("6");
$blogPosts = $blog->getBlogPosts("3");

$portfolio_details = $portfolio->getPortfolioBySlugStatus($_GET['portId'] ?? '');
$product_details = $product->getProductBySlugStatus($_GET['prodId'] ?? '');
$blog_post_details = $blog->getPostBySlugStatus($_GET['read'] ?? '');

if ($portfolio_details != [] || $product_details != [] || $blog_post_details != []) {
  if (isset($portfolio_details['meta_title']) && isset($portfolio_details['meta_keywords']) && isset($portfolio_details['meta_description'])) {
    $title = $portfolio_details['meta_title'];
    $keywords = $portfolio_details['meta_keywords'];
    $meta_description = $portfolio_details['meta_description'];
  } else if (isset($product_details['meta_title']) && isset($product_details['meta_keywords']) && isset($product_details['meta_description'])) {
    $title = $product_details['meta_title'];
    $keywords = $product_details['meta_keywords'];
    $meta_description = $product_details['meta_description'];
  } else if (isset($blog_post_details['meta_title']) && isset($blog_post_details['meta_keywords']) && isset($blog_post_details['meta_description'])) {
    $title = $blog_post_details['meta_title'];
    $keywords = $blog_post_details['meta_keywords'];
    $meta_description = $blog_post_details['meta_description'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <!-- required meta -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- #keywords -->
  <meta name="keywords"
    content="<?= $keywords ?? 'Portfolio, Software Developer, Graphic Designer, Website Developer, Coder, Artist, Pianist, Youtuber, Gravics Designs, Victor Osaronwafor - Portfolio' ?> | Olvios" />
  <!-- #description -->
  <meta name="description" content="<?= $meta_description ?? 'Victor Osaronwafor - Portfolio' ?> | Olvios" />
  <!-- #title -->
  <title>
    <?= $title ?? 'Victor Osaronwafor' ?> | Victor Osaronwafor
  </title>
  <!-- #favicon -->
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
  <!-- ==== css dependencies start ==== -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <!-- AOS  -->
  <link rel="stylesheet" href="../unpkg.com/aos%403.0.0-beta.6/dist/aos.css" />
  <!-- swiper  -->
  <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/swiper%4011/swiper-bundle.min.css" />
  <!-- ICON  -->
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
  <!-- don't remove this  -->
  <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none" class="d-none">
    <g clip-path="url(#clip0_3569_434)">
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M5.69145 8.43063L1.72801 5.49387L5.69145 2.54023V0L0 4.21303V6.75919L5.69145 10.9887V8.43063Z"
        fill="rgba(var(--p1))" />
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M1.72801 5.49387L5.69145 2.54023V0L0 4.21303V6.75919L1.72801 5.49387Z" fill="rgba(var(--p1))" />
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M4.86328 6.5702L8.82672 9.5065L4.86328 12.4606V15.0004L10.5552 10.7864V8.24163L4.86328 4.01172V6.5702Z"
        fill="rgba(var(--p1))" />
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M4.86328 6.5702L8.82672 9.5065L10.5552 10.7864V8.24163L4.86328 4.01172V6.5702Z" fill="rgba(var(--p1))" />
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M8.72466 2.00391C9.52091 2.00391 10.1657 2.64912 10.1657 3.44491C10.1657 4.24115 9.52091 4.88591 8.72466 4.88591C7.92841 4.88591 7.2832 4.2407 7.2832 3.44491C7.2832 2.64912 7.92841 2.00391 8.72466 2.00391Z"
        fill="rgba(var(--p1))" />
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M1.83013 12.9972C1.03388 12.9972 0.388672 12.352 0.388672 11.5562C0.388672 10.7604 1.03388 10.1152 1.82967 10.1152C2.62546 10.1152 3.27067 10.76 3.27067 11.5562C3.27067 12.3525 2.62592 12.9972 1.82967 12.9972H1.83013Z"
        fill="rgba(var(--p1))" />
    </g>
    <defs>
      <clipPath>
        <rect width="10.5561" height="15" fill="white" />
      </clipPath>
    </defs>
  </svg>

  <!-- preloder  srart -->
  <div class="loader-wrapper">
    <div class="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- preloder  end -->


  <div class="d-flex gap-6">