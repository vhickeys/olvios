<?php

class Portfolio
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createPortfolio($category_id, $title, $slug, $caption, $description, $image, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if (empty($category_id) || empty($title)) {
                $_SESSION['errorMessage'] = "Enter a category name!";
                header("location: ../create-portfolio.php");
                exit(0);
            } else if ($this->getPortfolioByTitle($title) > 0) {
                $_SESSION['errorMessage'] = "Portfolio category exists!";
                header("location: ../create-portfolio.php");
                exit(0);
            } else if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-portfolio.php");
                exit(0);
            } else if ($image_size > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../create-portfolio.php");
                exit(0);
            } else {

                $destination = "../../assets/images/portfolios/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "INSERT INTO portfolios (category_id, title, slug, caption, description, image, client, services, technologies, project_url, start_date, duration, meta_title, meta_keywords, meta_description, status, creator) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $title, $slug, $caption, $description, $filename, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Portfolio Created Successfully!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                }
            }
        } else {
            if (empty($category_id) || empty($title)) {
                $_SESSION['errorMessage'] = "Enter a category name!";
                header("location: ../create-portfolio.php");
                exit(0);
            } else if ($this->getPortfolioByTitle($title) > 0) {
                $_SESSION['errorMessage'] = "Portfolio category exists!";
                header("location: ../create-portfolio.php");
                exit(0);
            } else {
                $sql = "INSERT INTO portfolios (category_id, title, slug, caption, description, client, services, technologies, project_url, start_date, duration, meta_title, meta_keywords, meta_description, status, creator) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $title, $slug, $caption, $description, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Portfolio Created Successfully!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                }
            }
        }
    }

    public function editPortfolio($portfolio_id, $category_id, $title, $slug, $caption, $description, $image, $old_image, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if (empty($category_id) || empty($title)) {
                $_SESSION['errorMessage'] = "Enter a category name!";
                header("location: ../edit-portfolio.php?portId=$portfolio_id");
                exit(0);
            } else if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../edit-portfolio.php?portId=$portfolio_id");
                exit(0);
            } else if ($image_size > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../edit-portfolio.php?portId=$portfolio_id");
                exit(0);
            } else {

                $olDestination = "../../assets/images/portfolios/$old_image";

                if (file_exists($olDestination)) {
                    unlink($olDestination);
                }

                $destination = "../../assets/images/portfolios/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "UPDATE portfolios SET category_id=?, title=?, slug=?, caption=?, description=?, image=?, client=?, services=?, technologies=?, project_url=?, start_date=?, duration=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, creator=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $title, $slug, $caption, $description, $filename, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator, $portfolio_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Portfolio Updated Successfully!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                }
            }
        } else {
            if (empty($category_id) || empty($title)) {
                $_SESSION['errorMessage'] = "Enter a category name!";
                header("location: ../edit-portfolio.php?portId=$portfolio_id");
                exit(0);
            } else {
                $sql = "UPDATE portfolios SET category_id=?, title=?, slug=?, caption=?, description=?, client=?, services=?, technologies=?, project_url=?, start_date=?, duration=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, creator=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category_id, $title, $slug, $caption, $description, $client, $services, $technologies, $project_url, $start_date, $duration, $meta_title, $meta_keywords, $meta_description, $status, $creator, $portfolio_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Portfolio Updated Successfully!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-portfolios.php");
                    exit(0);
                }
            }
        }
    }
    public function getPortfolios()
    {
        $sql = "SELECT port.*,
        cat.name as category
        FROM portfolios port INNER JOIN
        categories cat ON port.category_id = cat.id ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getSinglePortfoById($portfolio_id)
    {
        $sql = "SELECT port.*,
        cat.name as category
        FROM portfolios port INNER JOIN
        categories cat ON port.category_id = cat.id WHERE port.id=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $portfolio_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }
    
    public function deletePortfolio($portfolio_id)
    {

        $portfolio_image = $this->getPortfolioById($portfolio_id)['image'];

        $destination = "../../assets/images/portfolios/$portfolio_image";

        if (file_exists($destination)) {
            unlink($destination);
        }

        $sql = "DELETE FROM portfolios WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$portfolio_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Portfolio Deleted Successfully!";
            header("location: ../view-portfolios.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-portfolios.php");
            exit(0);
        }
    }

    public function getPortfolioByTitle($title)
    {
        $sql = "SELECT * FROM portfolios WHERE title=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $title, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();
        return $result ?: 0;
    }

    public function getPortfolioById($id)
    {
        $sql = "SELECT * FROM portfolios WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getPortfolioByIdStatus($id)
    {
        $status = 0;
        $sql = "SELECT * FROM portfolios WHERE id=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getPortfolioBySlugStatus($slug)
    {
        $status = 0;
        $sql = "SELECT * FROM portfolios WHERE slug=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $slug, PDO::PARAM_STR);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getPortfolioByCatId($id)
    {
        $status = 0;
        $sql = "SELECT * FROM portfolios WHERE category_id=? AND status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getPortfolioLimit($limit)
    {
        $status = 0;
        $sql = "SELECT * FROM portfolios WHERE status=? ORDER BY date DESC LIMIT $limit";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getAllPortfolios()
    {
        $status = 0;
        $sql = "SELECT * FROM portfolios WHERE status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function portfolioStatusCount()
    {
        $status = 0;
        $sql = "SELECT * FROM portfolios WHERE status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->rowCount();
        return $result ?: [];
    }
}
