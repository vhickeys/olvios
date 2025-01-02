<?php

class AboutMe
{
    private $db;
    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function aboutMe($name, $role, $intro_title, $intro_text, $years_of_experience, $projects_completed, $clients_worldwide, $image, $resume, $status)
    {

        $process_image = image_processing($image);
        $process_resume = resume_processing($resume);

        if (!empty($process_image['image_name']) && !empty($process_resume['file_name'])) {
            if (!in_array($process_image['image_extension'], $process_image['valid_extensions']) || !in_array($process_resume['file_extension'], $process_resume['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>PDF</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else if (($process_image['image_size'] > 1048576) && ($process_resume['file_size'] > 1048576)) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else {
                echo "Both Success";
            }
        } else if (!empty($process_image['image_name'])) {
            if (!in_array($process_image['image_extension'], $process_image['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else if ($process_image['image_size'] > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else {
                echo "Image Success";
            }
        } else if (!empty($process_resume['file_name'])) {
            if (!in_array($process_resume['file_extension'], $process_resume['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>PDF</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else if ($process_resume['file_size'] > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else {
                echo "Resume Success";
            }
        } else {
            echo "submit success";
        }

        // if ($image_name != NULL) {
        //     if (empty($category_id) || empty($name)) {
        //         $_SESSION['errorMessage'] = "Enter a category or name!";
        //         header("location: ../edit-product.php?prodId=$product_id");
        //         exit(0);
        //     } else if (!in_array($image_extension, $valid_extensions)) {
        //         $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
        //         header("location: ../edit-product.php?prodId=$product_id");
        //         exit(0);
        //     } else if ($image_size > 1048576) {
        //         $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
        //         header("location: ../edit-product.php?prodId=$product_id");
        //         exit(0);
        //     } else {

        //         $olDestination = "../../assets/images/products/$old_image";

        //         if (file_exists($olDestination)) {
        //             unlink($olDestination);
        //         }

        //         $destination = "../../assets/images/products/$filename";
        //         move_uploaded_file($image_tmp_name, $destination);

        //         $sql = "UPDATE products SET category_id=?, name=?, slug=?, caption=?, price=?, description=?, image=?, product_url=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, creator=? WHERE id=?";
        //         $statement = $this->db->prepare($sql);
        //         $statement->execute([$category_id, $name, $slug, $caption, $price, $description, $filename, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator, $product_id]);

        //         if ($statement) {
        //             $_SESSION['successMessage'] = "Product Updated Successfully!";
        //             header("location: ../view-products.php");
        //             exit(0);
        //         } else {
        //             $_SESSION['errorMessage'] = "Something Went Wrong!";
        //             header("location: ../view-products.php");
        //             exit(0);
        //         }
        //     }
        // } else {
        //     if (empty($category_id) || empty($name)) {
        //         $_SESSION['errorMessage'] = "Enter a category or name!";
        //         header("location: ../edit-product.php?prodId=$product_id");
        //         exit(0);
        //     } else {
        //         $sql = "UPDATE products SET category_id=?, name=?, slug=?, caption=?, price=?, description=?, product_url=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, creator=? WHERE id=?";
        //         $statement = $this->db->prepare($sql);
        //         $statement->execute([$category_id, $name, $slug, $caption, $price, $description, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator, $product_id]);

        //         if ($statement) {
        //             $_SESSION['successMessage'] = "product Updated Successfully!";
        //             header("location: ../view-products.php");
        //             exit(0);
        //         } else {
        //             $_SESSION['errorMessage'] = "Something Went Wrong!";
        //             header("location: ../view-products.php");
        //             exit(0);
        //         }
        //     }
        // }
    }
}
