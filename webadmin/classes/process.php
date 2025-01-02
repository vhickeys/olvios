<?php
require 'functions.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'registerUser':
            if (isset($_POST)) {
                $adminFname = $_POST['adminFname'];
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];
                $role = $_POST['role'];

                $user->registerUser($adminFname, $adminEmail, $adminPassword, $role);
            }
            break;

        case 'loginUser':
            if (isset($_POST)) {
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginUser($adminEmail, $adminPassword);
            }
            break;

        case 'changePassword':
            if (isset($_POST)) {
                $userId = $_POST['userId'];
                $new_password = $_POST['new_password'];

                $user->changePassword($userId, $new_password);
            }
            break;

        case 'contactSubmit':
            if (isset($_POST)) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $contact->contactSubmit($name, $email, $phone, $subject, $message);
            }
            break;

        case 'loginAdmin':
            if (isset($_POST['adminLoginSubmit'])) {
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginAdmin($adminEmail, $adminPassword);
            }
            break;

        case 'logout':
            if (isset($_POST)) {

                $user->logoutUser();
            }
            break;

        case 'about-me':
            if (isset($_POST['update-me'])) {
                $name = $_POST['name'];
                $role = $_POST['role'];
                $intro_title = $_POST['intro_title'];
                $intro_text = $_POST['intro_text'];
                $years_of_experience = $_POST['years_of_experience'];
                $projects_completed = $_POST['projects_completed'];
                $clients_worldwide = $_POST['clients_worldwide'];
                $image = $_FILES['image'];
                $resume = $_FILES['resume'];
                $status = $_POST['status'] == true ? '1' : '0';

                $aboutMe->aboutMe($name, $role, $intro_title, $intro_text, $years_of_experience, $projects_completed, $clients_worldwide, $image, $resume, $status);
            }
            break;

        case 'create-category':
            if (isset($_POST['submit-category'])) {

                $name = $_POST['name'];
                $slug = textToSlug($name);
                $description = $_POST['description'];
                $status = $_POST['status'] == true ? '1' : '0';

                $category->createCategory($name, $slug, $description, $status);
            }
            break;

        case 'edit-category':
            if (isset($_POST['update-category'])) {

                $pCatId = $_POST['pCatId'];
                $name = $_POST['name'];
                $slug = textToSlug($name);
                $description = $_POST['description'];
                $status = $_POST['status'] == true ? '1' : '0';

                $category->editCategory($pCatId, $name, $slug, $description, $status);
            }
            break;

        case 'create-portfolio':
            if (isset($_POST['submit-portfolio'])) {

                $category_id = $_POST['category_id'];
                $title = $_POST['title'];
                $slug = textToSlug($title);
                $caption = $_POST['caption'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $client = $_POST['client'];
                $services = $_POST['services'];
                $technologies = $_POST['technologies'];
                $project_url = $_POST['project_url'];
                $start_date = $_POST['start_date'];
                $duration = $_POST['duration'];
                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];
                $status = $_POST['status'] == true ? '1' : '0';
                $creator = $_POST['creator'];

                $portfolio->createPortfolio($category_id, $title, $slug, $caption, $description, $image, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator);
            }
            break;

        case 'edit-portfolio':
            if (isset($_POST['update-portfolio'])) {

                $portfolio_id = $_POST['portfolio_id'];
                $category_id = $_POST['category_id'];
                $title = $_POST['title'];
                $slug = textToSlug($title);
                $caption = $_POST['caption'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $old_image = $_POST['old_image'];
                $client = $_POST['client'];
                $services = $_POST['services'];
                $technologies = $_POST['technologies'];
                $project_url = $_POST['project_url'];
                $start_date = $_POST['start_date'];
                $duration = $_POST['duration'];
                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];
                $status = $_POST['status'] == true ? '1' : '0';
                $creator = $_POST['creator'];

                $portfolio->editPortfolio($portfolio_id, $category_id, $title, $slug, $caption, $description, $image, $old_image, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator);
            }
            break;


        case 'delete-portfolio':
            if (isset($_POST['delete-portfolio'])) {
                $portfolio_id = $_POST['portfolioModalId'];
                $portfolio->deletePortfolio($portfolio_id);
            }
            break;

        case 'create-product':
            if (isset($_POST['submit-product'])) {

                $category_id = $_POST['category_id'];
                $name = $_POST['name'];
                $slug = textToSlug($name);
                $caption = $_POST['caption'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $product_url = $_POST['product_url'];
                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];
                $status = $_POST['status'] == true ? '1' : '0';
                $creator = $_POST['creator'];

                $product->createProduct($category_id, $name, $slug, $caption, $price, $description, $image, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator);
            }
            break;

        case 'edit-product':
            if (isset($_POST['update-product'])) {

                $product_id = $_POST['product_id'];
                $category_id = $_POST['category_id'];
                $name = $_POST['name'];
                $slug = textToSlug($name);
                $caption = $_POST['caption'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $old_image = $_POST['old_image'];
                $product_url = $_POST['product_url'];
                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];
                $status = $_POST['status'] == true ? '1' : '0';
                $creator = $_POST['creator'];

                $product->updateProduct($product_id, $category_id, $name, $slug, $caption, $price, $description, $image, $old_image, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator);
            }
            break;

        case 'delete-product':
            if (isset($_POST['delete-product'])) {
                $product_id = $_POST['productModalId'];
                $product->deleteProduct($product_id);
            }
            break;

        case 'settings':
            if (isset($_POST['submit-settings'])) {

                $wallet_address = $_POST['wallet_address'];
                $about = $_POST['about'];

                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $office_address = $_POST['office_address'];

                $withdrawal_error = $_POST['withdrawal_error'];
                $payment_notice = $_POST['payment_notice'];

                $facebook = $_POST['facebook'];
                $instagram = $_POST['instagram'];
                $twitter = $_POST['twitter'];
                $linkedIn = $_POST['linkedIn'];
                $youtube = $_POST['youtube'];

                $logo = $_FILES['logo'];
                $old_image = $_POST['old_image'];
                $status = $_POST['status'] == true ? '1' : '0';

                $settings->modifySettings($wallet_address, $about, $phone, $email, $office_address, $withdrawal_error, $payment_notice, $facebook, $instagram, $twitter, $linkedIn, $youtube, $logo, $old_image, $status, "1");
            }
            break;

        case 'getParticipants':
            if (isset($_POST)) {
                $participantID = $_POST['participantID'];
                // $participant = $participant->getParticipant('registration', $participantID);
                echo json_encode($participant);
            }
            break;

        case 'updatePaymentStatus':
            if (isset($_POST['payment_status'])) {
                $payment_id = $_POST['payment_id'];
                $user_id = $_POST['user_id'];
                $payment_status = $_POST['payment_status'];

                if ($payment_status == 1) {
                    // Decline Payment Status i.e Set Status to 2
                    $transaction->updatePaymentStatus($payment_id, $user_id, "2");
                } elseif ($payment_status == 2) {
                    // Approve Payment Status i.e Set Status to 1
                    $transaction->updatePaymentStatus($payment_id, $user_id, "1");
                } elseif ($payment_status == 0) {
                    // Approve Payment Status i.e Set Status to 1
                    $transaction->updatePaymentStatus($payment_id, $user_id, "1");
                }
            }
            break;

        case 'delete-user':
            if (isset($_POST['delete-user'])) {
                $user_Id = $_POST['userDeleteModalId'];
                $record->deleteRecord("users", $user_Id, "User", "view-users.php");
            }
            break;

        case 'changeUserRole':
            if (isset($_POST['changeUserRoleBtn'])) {
                $user_Id = $_POST['userId'];
                $user_role = $_POST['user_role'];
                $user->updateUserRole($user_role, $user_Id);
            }
            break;

        case 'setUserAccess':
            if (isset($_POST['userAccessBtn'])) {
                $userAccess = $_POST['userAccess'];
                $user_Id = $_POST['user_id'];

                $userAccess == 1 ? $userAccess = 0 : $userAccess = 1;
                $user->userAccess($userAccess, $user_Id);
            }
            break;

        default:
            # code...
            break;
    }
}