<?php

class AboutMe
{
    private $db;
    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function aboutMe($name, $role, $intro_title, $intro_text, $years_of_experience, $projects_completed, $clients_worldwide, $what_i_do, $image, $old_image, $resume, $old_resume, $status)
    {

        $abtId = "1";
        $process_image = image_processing($image);
        $process_resume = resume_processing($resume);

        if (!empty($process_image['image_name']) && !empty($process_resume['file_name'])) {
            if (empty($name)) {
                $_SESSION['errorMessage'] = "Your Name is required!";
                header("location: ../about-me.php");
                exit(0);
            } else if (!in_array($process_image['image_extension'], $process_image['valid_extensions']) || !in_array($process_resume['file_extension'], $process_resume['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png', 'pdf']</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else if (($process_image['image_size'] > 1048576) || ($process_resume['file_size'] > 1048576)) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else {

                $image_new_name = $process_image['filename'];
                $image_tmp_name = $process_image['image_tmp_name'];
                $resume_new_name = $process_resume['file_new_name'];
                $resume_tmp_name = $process_resume['file_tmp_name'];

                unlink_and_move("../../assets/images/aboutMe/$old_image", "../../assets/images/aboutMe/$image_new_name", $image_tmp_name);

                unlink_and_move("../../assets/images/aboutMe/$old_resume", "../../assets/images/aboutMe/$resume_new_name", $resume_tmp_name);

                $sql = "UPDATE about_me SET name=?, role=?, intro_title=?, intro_text=?, years_of_experience=?, projects_completed=?, clients_worldwide=?, what_i_do=?, image=?, resume=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $role, $intro_title, $intro_text, $years_of_experience, $projects_completed, $clients_worldwide, $what_i_do, $image_new_name, $resume_new_name, $status, $abtId]);

                if ($statement) {
                    $_SESSION['successMessage'] = "About Me Updated Successfully!";
                    header("location: ../about-me.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../about-me.php");
                    exit(0);
                }
            }
        } else if (!empty($process_image['image_name'])) {

            if (empty($name)) {
                $_SESSION['errorMessage'] = "Your Name is required!";
                header("location: ../about-me.php");
                exit(0);
            } else if (!in_array($process_image['image_extension'], $process_image['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else if ($process_image['image_size'] > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else {

                $image_new_name = $process_image['filename'];
                $image_tmp_name = $process_image['image_tmp_name'];

                unlink_and_move("../../assets/images/aboutMe/$old_image", "../../assets/images/aboutMe/$image_new_name", $image_tmp_name);

                $sql = "UPDATE about_me SET name=?, role=?, intro_title=?, intro_text=?, years_of_experience=?, projects_completed=?, clients_worldwide=?, what_i_do=?, image=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $role, $intro_title, $intro_text, $years_of_experience, $projects_completed, $clients_worldwide, $what_i_do, $image_new_name, $status, $abtId]);

                if ($statement) {
                    $_SESSION['successMessage'] = "About Me Updated Successfully!";
                    header("location: ../about-me.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../about-me.php");
                    exit(0);
                }
            }
        } else if (!empty($process_resume['file_name'])) {
            if (empty($name)) {
                $_SESSION['errorMessage'] = "Your Name is required!";
                header("location: ../about-me.php");
                exit(0);
            } else if (!in_array($process_resume['file_extension'], $process_resume['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>PDF</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else if ($process_resume['file_size'] > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../about-me.php");
                exit(0);
            } else {

                $resume_new_name = $process_resume['file_new_name'];
                $resume_tmp_name = $process_resume['file_tmp_name'];

                unlink_and_move("../../assets/images/aboutMe/$old_resume", "../../assets/images/aboutMe/$resume_new_name", $resume_tmp_name);

                $sql = "UPDATE about_me SET name=?, role=?, intro_title=?, intro_text=?, years_of_experience=?, projects_completed=?, clients_worldwide=?, what_i_do=?, resume=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $role, $intro_title, $intro_text, $years_of_experience, $projects_completed, $clients_worldwide, $what_i_do, $resume_new_name, $status, $abtId]);

                if ($statement) {
                    $_SESSION['successMessage'] = "About Me Updated Successfully!";
                    header("location: ../about-me.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../about-me.php");
                    exit(0);
                }
            }
        } else {
            if (empty($name)) {
                $_SESSION['errorMessage'] = "Your Name is required!";
                header("location: ../about-me.php");
                exit(0);
            } else {

                $sql = "UPDATE about_me SET name=?, role=?, intro_title=?, intro_text=?, years_of_experience=?, projects_completed=?, clients_worldwide=?, what_i_do=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $role, $intro_title, $intro_text, $years_of_experience, $projects_completed, $clients_worldwide, $what_i_do, $status, $abtId]);

                if ($statement) {
                    $_SESSION['successMessage'] = "About Me Updated Successfully!";
                    header("location: ../about-me.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../about-me.php");
                    exit(0);
                }
            }
        }
    }


    public function getproductById($id)
    {
        $sql = "SELECT * FROM about_me WHERE id=? LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }
}
