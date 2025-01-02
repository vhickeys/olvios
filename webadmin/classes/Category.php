<?php

class Category
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createCategory($name, $slug, $description, $status)
    {
        if (empty($name)) {
            $_SESSION['errorMessage'] = "Enter a category name!";
            header("location: ../create-category.php");
            exit(0);
        } else if ($this->getCategoryByName($name) > 0) {
            $_SESSION['errorMessage'] = "Portfolio category exists!";
            header("location: ../create-category.php");
            exit(0);
        } else {
            $sql = "INSERT INTO categories (name, slug, description, status) VALUES (?,?,?,?)";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(1, $name, PDO::PARAM_STR);
            $statement->bindParam(2, $slug, PDO::PARAM_STR);
            $statement->bindParam(3, $description, PDO::PARAM_STR);
            $statement->bindParam(4, $status, PDO::PARAM_STR);
            $statement->execute();

            if ($statement) {
                $_SESSION['successMessage'] = "Portfolio Category Created Successfully!";
                header("location: ../view-categories.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something Went Wrong!";
                header("location: ../view-categories.php");
                exit(0);
            }
        }
    }

    public function editCategory($pCatId, $name, $slug, $description, $status)
    {
        if (empty($name)) {
            $_SESSION['errorMessage'] = "Enter a category name!";
            header("location: ../edit-category.php?pCatId=$pCatId");
            exit(0);
        } else {
            $sql = "UPDATE categories SET name=?, slug=?, description=?, status=? WHERE id=?";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(1, $name, PDO::PARAM_STR);
            $statement->bindParam(2, $slug, PDO::PARAM_STR);
            $statement->bindParam(3, $description, PDO::PARAM_STR);
            $statement->bindParam(4, $status, PDO::PARAM_STR);
            $statement->bindParam(5, $pCatId, PDO::PARAM_INT);
            $statement->execute();

            if ($statement) {
                $_SESSION['successMessage'] = "Portfolio Category Updated Successfully!";
                header("location: ../view-categories.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something Went Wrong!";
                header("location: ../view-categories.php");
                exit(0);
            }
        }
    }

    public function getCategories($table = "categories")
    {
        $sql = "SELECT * FROM $table ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getCategoriesByStatus($table = "categories", $status)
    {
        $sql = "SELECT * FROM $table WHERE status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getCategoryByName($name)
    {
        $sql = "SELECT * FROM categories WHERE name=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $name, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();
        return $result ?: 0;
    }
}
