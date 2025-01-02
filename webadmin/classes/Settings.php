<?php

class Settings
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function modifySettings($wallet_address, $about, $phone, $email, $office_address, $withdrawal_error, $payment_notice, $facebook, $instagram, $twitter, $linkedIn, $youtube, $image, $old_image, $status, $id)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../settings.php");
                exit(0);
            } else if ($image_size > 524288) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500kb</strong> is allowed.";
                header("location: ../settings.php");
                exit(0);
            } else {
                $olDestination = "../../img/settings/$old_image";

                if (file_exists($olDestination)) {
                    unlink($olDestination);
                }

                $destination = "../../img/settings/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "UPDATE settings SET wallet_address=?, about=?, phone=?, email=?, office_address=?, withdrawal_error=?, payment_notice=?, facebook=?, instagram=?, twitter=?, linkedIn=?, youtube=?, logo=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$wallet_address, $about, $phone, $email, $office_address, $withdrawal_error, $payment_notice, $facebook, $instagram, $twitter, $linkedIn, $youtube, $filename, $status, $id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Settings Updated Successfully!";
                    header("location: ../settings.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../settings.php");
                    exit(0);
                }
            }
        } else {
            $sql = "UPDATE settings SET wallet_address=?, about=?, phone=?, email=?, office_address=?, withdrawal_error=?, payment_notice=?, facebook=?, instagram=?, twitter=?, linkedIn=?, youtube=?, status=? WHERE id=?";
            $statement = $this->db->prepare($sql);
            $statement->execute([$wallet_address, $about, $phone, $email, $office_address, $withdrawal_error, $payment_notice, $facebook, $instagram, $twitter, $linkedIn, $youtube, $status, $id]);

            if ($statement) {
                $_SESSION['successMessage'] = "Settings Updated Successfully!";
                header("location: ../settings.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something Went Wrong!";
                header("location: ../settings.php");
                exit(0);
            }
        }
    }

    public function getSettings($id, $status)
    {
        $sql = "SELECT * FROM settings WHERE id=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
}
