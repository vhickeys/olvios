<?php

class Contact
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function contactSubmit($name, $email, $phone, $location, $message)
    {
        $sql = "INSERT into contacts (name, email, phone, location, message) values(?,?,?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $name, PDO::PARAM_STR);
        $statement->bindParam(2, $email, PDO::PARAM_STR);
        $statement->bindParam(3, $phone, PDO::PARAM_STR);
        $statement->bindParam(4, $location, PDO::PARAM_STR);
        $statement->bindParam(5, $message, PDO::PARAM_STR);
        $statement->execute();

        if ($statement) {
            contactNotificationMail("victorosaronwafor@gmail.com", $email, $name, $phone, $location, $message);
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function getAllContacts()
    {
        $sql = "SELECT * FROM contacts ORDER BY id DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function deleteContact($contact_id)
    {
        $sql = "DELETE FROM contacts WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$contact_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Contact Deleted Successfully!";
            header("location: ../view-contacts.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-contacts.php");
            exit(0);
        }
    }
}
