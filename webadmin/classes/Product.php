<?php

class Product
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createProduct($category_id, $name, $slug, $caption, $price, $description, $image, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if (empty($category_id) || empty($name)) {
                $_SESSION['errorMessage'] = "Enter a category and name!";
                header("location: ../create-product.php");
                exit(0);
            } else if ($this->getProductByName($name) > 0) {
                $_SESSION['errorMessage'] = "Product already exists!";
                header("location: ../create-product.php");
                exit(0);
            } else if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-product.php");
                exit(0);
            } else if ($image_size > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../create-product.php");
                exit(0);
            } else {

                $destination = "../../assets/images/products/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "INSERT INTO products (category_id, name, slug, caption, price, description, image, product_url, meta_title, meta_keywords, meta_description, status, creator) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $name, $slug, $caption, $price, $description, $filename, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Product Created Successfully!";
                    header("location: ../view-products.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-products.php");
                    exit(0);
                }
            }
        } else {
            if (empty($category_id) || empty($name)) {
                $_SESSION['errorMessage'] = "Enter a category and name!";
                header("location: ../create-product.php");
                exit(0);
            } else if ($this->getProductByName($name) > 0) {
                $_SESSION['errorMessage'] = "product category exists!";
                header("location: ../create-product.php");
                exit(0);
            } else {

                $sql = "INSERT INTO products (category_id, name, slug, caption, price, description, product_url, meta_title, meta_keywords, meta_description, status, creator) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $name, $slug, $caption, $price, $description, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Product Created Successfully!";
                    header("location: ../view-products.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-products.php");
                    exit(0);
                }
            }
        }
    }

    public function updateProduct($product_id, $category_id, $name, $slug, $caption, $price, $description, $image, $old_image, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if (empty($category_id) || empty($name)) {
                $_SESSION['errorMessage'] = "Enter a category or name!";
                header("location: ../edit-product.php?prodId=$product_id");
                exit(0);
            } else if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../edit-product.php?prodId=$product_id");
                exit(0);
            } else if ($image_size > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../edit-product.php?prodId=$product_id");
                exit(0);
            } else {

                $olDestination = "../../assets/images/products/$old_image";

                if (file_exists($olDestination)) {
                    unlink($olDestination);
                }

                $destination = "../../assets/images/products/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "UPDATE products SET category_id=?, name=?, slug=?, caption=?, price=?, description=?, image=?, product_url=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, creator=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $name, $slug, $caption, $price, $description, $filename, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator, $product_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Product Updated Successfully!";
                    header("location: ../view-products.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-products.php");
                    exit(0);
                }
            }
        } else {
            if (empty($category_id) || empty($name)) {
                $_SESSION['errorMessage'] = "Enter a category or name!";
                header("location: ../edit-product.php?prodId=$product_id");
                exit(0);
            } else {
                $sql = "UPDATE products SET category_id=?, name=?, slug=?, caption=?, price=?, description=?, product_url=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, creator=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $name, $slug, $caption, $price, $description, $product_url, $meta_title, $meta_keywords, $meta_description, $status, $creator, $product_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "product Updated Successfully!";
                    header("location: ../view-products.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-products.php");
                    exit(0);
                }
            }
        }
    }

    public function getProducts()
    {
        $sql = "SELECT prod.*,
        cat.name as category
        FROM products prod INNER JOIN
        categories cat ON prod.category_id = cat.id ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getSingleProductById($product_id)
    {
        $sql = "SELECT prod.*,
        cat.name as category
        FROM products prod INNER JOIN
        categories cat ON prod.category_id = cat.id WHERE prod.id=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $product_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getProductBySlugStatus($slug)
    {
        $status = 0;
        $sql = "SELECT * FROM products WHERE slug=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $slug, PDO::PARAM_STR);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }
    public function getRelatedProducts($id, $slug, $limit)
    {
        $status = 0;
        $sql = "SELECT * FROM products WHERE category_id=? AND slug !=? AND status=? LIMIT $limit";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->bindParam(2, $slug, PDO::PARAM_STR);
        $statement->bindParam(3, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function deleteProduct($product_id)
    {

        $product_image = $this->getproductById($product_id)['image'];

        $destination = "../../assets/images/products/$product_image";

        if (file_exists($destination)) {
            unlink($destination);
        }

        $sql = "DELETE FROM products WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$product_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Product Deleted Successfully!";
            header("location: ../view-products.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-products.php");
            exit(0);
        }
    }

    public function getProductByName($name)
    {
        $sql = "SELECT * FROM products WHERE name=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $name, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();
        return $result ?: 0;
    }

    public function getproductById($id)
    {
        $sql = "SELECT * FROM products WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getProductByCatId($id)
    {
        $status = 0;
        $sql = "SELECT * FROM products WHERE category_id=? AND status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getAllProducts()
    {
        $status = 0;
        $sql = "SELECT * FROM products WHERE status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

}
