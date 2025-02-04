<?php

class Testimonial
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createTestimonial($name, $country, $description, $image, $rating, $status)
    {

        $process_image = image_processing($image);

        if ($process_image['image_name'] != '') {
            if (empty($name)) {
                $_SESSION['errorMessage'] = "You Must Enter a Name!";
                header("location: ../create-testimonial.php");
                exit(0);
            } else if (!in_array($process_image['image_extension'], $process_image['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-testimonial.php");
                exit(0);
            } else if ($process_image['image_size'] > 524288) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500KB</strong> is allowed.";
                header("location: ../create-testimonial.php");
                exit(0);
            } else {

                $image_tmp_name = $process_image['image_tmp_name'];
                $image_filename = $process_image['filename'];

                move_my_uploaded_file($image_tmp_name, "../../assets/images/testimonials/$image_filename");

                $sql = "INSERT INTO testimonials (name, country, description, image, rating, status) VALUES(?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $country, $description, $image_filename, $rating, $status]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Testimonial Created Successfully!";
                    header("location: ../view-testimonials.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../create-testimonial.php");
                    exit(0);
                }
            }
        } else {
            if (empty($name)) {
                $_SESSION['errorMessage'] = "You Must Enter a Name!";
                header("location: ../create-testimonial.php");
                exit(0);
            } else {

                $sql = "INSERT INTO testimonials (name, country, description, rating, status) VALUES(?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $country, $description, $rating, $status]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Testimonial Created Successfully!";
                    header("location: ../view-testimonials.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../create-testimonial.php");
                    exit(0);
                }
            }
        }
    }

    public function updateTestimonial($testimonial_id, $name, $country, $description, $image, $old_image, $rating, $status)
    {

        $process_image = image_processing($image);

        if ($process_image['image_name'] != '') {
            if (empty($name)) {
                $_SESSION['errorMessage'] = "You Must Enter a Name!";
                header("location: ../create-testimonial.php");
                exit(0);
            } else if (!in_array($process_image['image_extension'], $process_image['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-testimonial.php");
                exit(0);
            } else if ($process_image['image_size'] > 524288) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500KB</strong> is allowed.";
                header("location: ../create-testimonial.php");
                exit(0);
            } else {

                $image_tmp_name = $process_image['image_tmp_name'];
                $image_filename = $process_image['filename'];

                unlink_and_move("../../assets/images/testimonials/$old_image", "../../assets/images/testimonials/$image_filename", $image_tmp_name);

                $sql = "UPDATE testimonials SET name=?, country=?, description=?, image=?, rating=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $country, $description, $image_filename, $rating, $status, $testimonial_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Testimonial Updated Successfully!";
                    header("location: ../view-testimonials.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../create-testimonial.php");
                    exit(0);
                }
            }
        } else {
            if (empty($name)) {
                $_SESSION['errorMessage'] = "You Must Enter a Name!";
                header("location: ../create-testimonial.php");
                exit(0);
            } else {

                $sql = "UPDATE testimonials SET name=?, country=?, description=?, rating=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $country, $description, $rating, $status, $testimonial_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Testimonial Updated Successfully!";
                    header("location: ../view-testimonials.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../create-testimonial.php");
                    exit(0);
                }
            }
        }
    }

    public function getAllTestimonials()
    {
        $sql = "SELECT * FROM testimonials ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getTestimonialById($testimonial_id)
    {
        $sql = "SELECT * FROM testimonials WHERE id=? LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $testimonial_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getTestimonialByStatus($limit)
    {
        $status = 0;
        $sql = "SELECT * FROM testimonials WHERE status=? ORDER BY date DESC LIMIT $limit";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }
    public function deleteTestimonial($testimonial_id)
    {

        $post_image = $this->getTestimonialById($testimonial_id)['image'];

        $destination = "../../assets/images/testimonials/$post_image";

        if (file_exists($destination)) {
            unlink($destination);
        }

        $sql = "DELETE FROM testimonials WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$testimonial_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Testimonial Deleted Successfully!";
            header("location: ../view-testimonials.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-testimonials.php");
            exit(0);
        }
    }
}
