<?php

class Blog
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createPost($title, $slug, $category, $caption, $quote, $quoted_by, $description, $image, $video_url, $conclusion, $meta_title, $meta_keywords, $meta_description, $status, $author)
    {

        $process_image = image_processing($image);

        if ($process_image['image_name'] != '') {
            if (empty($title)) {
                $_SESSION['errorMessage'] = "Enter a Post Title!";
                header("location: ../create-post.php");
                exit(0);
            } else if ($this->getPostByTitle($title) > 0) {
                $_SESSION['errorMessage'] = "Blog Post already exists!";
                header("location: ../create-post.php");
                exit(0);
            } else if (!in_array($process_image['image_extension'], $process_image['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-post.php");
                exit(0);
            } else if ($process_image['image_size'] > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../create-post.php");
                exit(0);
            } else {

                $image_tmp_name = $process_image['image_tmp_name'];
                $image_filename = $process_image['filename'];

                move_my_uploaded_file($image_tmp_name, "../../assets/images/posts/$image_filename");

                $sql = "INSERT INTO posts (title, slug, category, caption, quote, quoted_by, description, image, video_url, conclusion, meta_title, meta_keywords, meta_description, status, author) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$title, $slug, $category, $caption, $quote, $quoted_by, $description, $image_filename, $video_url, $conclusion, $meta_title, $meta_keywords, $meta_description, $status, $author]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Post Created Successfully!";
                    header("location: ../view-posts.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-posts.php");
                    exit(0);
                }
            }
        } else {
            if (empty($title)) {
                $_SESSION['errorMessage'] = "Enter a Post Title!";
                header("location: ../create-post.php");
                exit(0);
            } else if ($this->getPostByTitle($title) > 0) {
                $_SESSION['errorMessage'] = "Blog Post already exists!";
                header("location: ../create-post.php");
                exit(0);
            } else {

                $sql = "INSERT INTO posts (title, slug, category, caption, quote, quoted_by, description, video_url, conclusion, meta_title, meta_keywords, meta_description, status, author) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$title, $slug, $category, $caption, $quote, $quoted_by, $description, $video_url, $conclusion, $meta_title, $meta_keywords, $meta_description, $status, $author]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Post Created Successfully!";
                    header("location: ../view-posts.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-posts.php");
                    exit(0);
                }
            }
        }
    }

    public function editPost($post_id, $title, $slug, $category, $caption, $quote, $quoted_by, $description, $image, $old_image, $video_url, $conclusion, $meta_title, $meta_keywords, $meta_description, $status, $author)
    {

        $process_image = image_processing($image);

        if ($process_image['image_name'] != '') {
            if (empty($title)) {
                $_SESSION['errorMessage'] = "Enter a Post Title!";
                header("location: ../create-post.php");
                exit(0);
            } else if (!in_array($process_image['image_extension'], $process_image['valid_extensions'])) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-post.php");
                exit(0);
            } else if ($process_image['image_size'] > 1048576) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 1mb</strong> is allowed.";
                header("location: ../create-post.php");
                exit(0);
            } else {

                $image_tmp_name = $process_image['image_tmp_name'];
                $image_filename = $process_image['filename'];

                unlink_and_move("../../assets/images/posts/$old_image", "../../assets/images/posts/$image_filename", $image_tmp_name);

                $sql = "UPDATE posts SET title=?, slug=?, category=?, caption=?, quote=?, quoted_by=?, description=?, image=?, video_url=?, conclusion=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, author=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$title, $slug, $category, $caption, $quote, $quoted_by, $description, $image_filename, $video_url, $conclusion, $meta_title, $meta_keywords, $meta_description, $status, $author, $post_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Post Updated Successfully!";
                    header("location: ../view-posts.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-posts.php");
                    exit(0);
                }
            }
        } else {
            if (empty($title)) {
                $_SESSION['errorMessage'] = "Enter a Post Title!";
                header("location: ../create-post.php");
                exit(0);
            } else {

                $sql = "UPDATE posts SET title=?, slug=?, category=?, caption=?, quote=?, quoted_by=?, description=?, video_url=?, conclusion=?, meta_title=?, meta_keywords=?, meta_description=?, status=?, author=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$title, $slug, $category, $caption, $quote, $quoted_by, $description, $video_url, $conclusion, $meta_title, $meta_keywords, $meta_description, $status, $author, $post_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Post Updated Successfully!";
                    header("location: ../view-posts.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-posts.php");
                    exit(0);
                }
            }
        }
    }

    public function getPosts()
    {
        $sql = "SELECT * FROM posts ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getSinglePostById($post_id)
    {
        $sql = "SELECT * FROM posts WHERE id=? LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $post_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getPackagesStatus($table = "packages")
    {
        $sql = "SELECT * FROM $table WHERE status=0 ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }
    public function deletePost($post_id)
    {

        $post_image = $this->getPostById($post_id)['image'];

        $destination = "../../assets/images/posts/$post_image";

        if (file_exists($destination)) {
            unlink($destination);
        }

        $sql = "DELETE FROM posts WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$post_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Post Deleted Successfully!";
            header("location: ../view-posts.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-posts.php");
            exit(0);
        }
    }

    public function getPostByTitle($title)
    {
        $sql = "SELECT * FROM posts WHERE title=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $title, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();
        return $result ?: 0;
    }

    public function getPostById($id)
    {
        $sql = "SELECT * FROM posts WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getBlogPosts($limit)
    {
        $status = 0;
        $sql = "SELECT * FROM posts WHERE status=? ORDER BY date DESC LIMIT $limit";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getPostBySlugStatus($slug)
    {
        $status = 0;
        $sql = "SELECT * FROM posts WHERE slug=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $slug, PDO::PARAM_STR);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getPreviousPost($curent_id)
    {
        $status = 0;
        $sql = "SELECT * FROM posts WHERE id<? AND status=? ORDER BY id DESC LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $curent_id, PDO::PARAM_STR);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getNextPost($curent_id)
    {
        $status = 0;
        $sql = "SELECT * FROM posts WHERE id>? AND status=? ORDER BY id DESC LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $curent_id, PDO::PARAM_STR);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function createComment($post_id, $first_name, $last_name, $email, $message)
    {

        $sql = "INSERT INTO comments (post_id, first_name, last_name, email, message) VALUES(?,?,?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->execute([$post_id, $first_name, $last_name, $email, $message]);

        if ($statement) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function deleteComment($comment_id)
    {
        $sql = "DELETE FROM comments WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$comment_id]);

        if ($statement) {
            $_SESSION['successMessage'] = "Comment Deleted Successfully!";
            header("location: ../view-comments.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-comments.php");
            exit(0);
        }
    }

    public function getAllPostComments()
    {
        $sql = "SELECT c.*, p.title AS post_title, p.slug AS post_slug 
                FROM comments c 
                INNER JOIN posts p ON c.post_id = p.id 
                ORDER BY c.id DESC;
                ";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function getPostComments($post_id)
    {
        $sql = "SELECT * FROM comments WHERE post_id=? ORDER BY id DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $post_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result ?: [];
    }

    public function postCommentsCount($post_id)
    {
        $sql = "SELECT * FROM comments WHERE post_id=? ORDER BY id DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $post_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->rowCount();
        return $result ?: 0;
    }
}
