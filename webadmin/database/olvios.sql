-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 04:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olvios`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `intro_title` text NOT NULL,
  `intro_text` text NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `projects_completed` int(11) NOT NULL,
  `clients_worldwide` int(11) NOT NULL,
  `what_i_do` text NOT NULL,
  `pro_summary` text NOT NULL,
  `skills` text NOT NULL,
  `education` text NOT NULL,
  `awards` text NOT NULL,
  `certifications` text NOT NULL,
  `languages` text NOT NULL,
  `interest` text NOT NULL,
  `github_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `name`, `role`, `intro_title`, `intro_text`, `years_of_experience`, `projects_completed`, `clients_worldwide`, `what_i_do`, `pro_summary`, `skills`, `education`, `awards`, `certifications`, `languages`, `interest`, `github_link`, `image`, `resume`, `status`, `date`) VALUES
(1, 'Victor Osaronwafor', 'Software Developer', 'HI, I\'M A FREELANCER', 'I\'m a software engineer specializing in scalable web apps.', 5, 50, 31, 'I design and develop high-performance websites, mobile apps, and enterprise software tailored to business needs. My expertise spans full-stack web development, UI/UX design, e-commerce solutions, legacy system modernization, and high-tech software development. From custom portals to AI-powered applications, I build robust and scalable digital solutions that drive growth and efficiency.', '<p>Summarise your career here. You can make a PDF version of your resume using our free Sketch template here. Donec quam felis, ultricies nec, pellentesque eu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.</p>', '<div>\r\n<h6><strong>Technical</strong></h6>\r\n<ul>\r\n<li>JavaScript/React/Vue</li>\r\n<li>Python/Ruby/PHP</li>\r\n<li>Node.js/ASP.NET</li>\r\n<li>PostgreSQL/MySQL</li>\r\n<li>Object-oriented design</li>\r\n<li>Design and implement database structures</li>\r\n<li>Lead and deliver complex software systems</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<h6><br>Professional</h6>\r\n<ul>\r\n<li>Effective communication</li>\r\n<li>Team player</li>\r\n<li>Strong problem solver</li>\r\n<li>Good time management</li>\r\n</ul>\r\n</div>', '<div>\r\n<div>\r\n<ul>\r\n<li>MSc in Computer Science University College London</li>\r\n<li>BSc Maths and Physics Imperial College London</li>\r\n</ul>\r\n</div>\r\n</div>', '<div>\r\n<div>\r\n<ul>\r\n<li>Albert Einstein Award</li>\r\n<li>Loretta Award for the Best Software Developer</li>\r\n<li>Best Programmer Award in Germany</li>\r\n<li>Best Technovator Award</li>\r\n</ul>\r\n</div>\r\n</div>', '<div>\r\n<div>\r\n<ul>\r\n<li>Udemy Course</li>\r\n<li>PHP Certified Expert LinkedIn</li>\r\n</ul>\r\n</div>\r\n</div>', '<ul>\r\n<li>English(Native)</li>\r\n<li>Spanish (Professional)</li>\r\n</ul>', '<ul>\r\n<li>Climbing</li>\r\n<li>Snowboarding</li>\r\n<li>Photography</li>\r\n<li>Travelling</li>\r\n</ul>', 'github.com/vhickeys', '67a4866f90ccd.jpg', '67a4866f90cd4.pdf', 0, '2025-01-03 01:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `date`) VALUES
(1, 'Graphics Design', 'graphics-design', 'Graphics Design', 0, '2024-12-16 06:46:57'),
(2, 'UI/UX Designs', 'uiux-designs', 'UI/UX Designs', 0, '2024-12-16 06:52:19'),
(4, 'Mobile App Development', 'mobile-app-development', 'Mobile App Development', 0, '2024-12-16 22:50:33'),
(5, 'Website Development', 'website-development', 'Website Development', 0, '2024-12-16 23:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `first_name`, `last_name`, `email`, `message`, `date`) VALUES
(1, 2, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', 'Nice Post', '2025-02-06 16:45:08'),
(2, 2, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', 'nice post!', '2025-02-06 16:45:21'),
(3, 2, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', 'success', '2025-02-06 16:48:58'),
(4, 2, 'Joshua', 'James', 'admin@fontainebleaupl.com', '            SomethingWentWrong();\n', '2025-02-06 17:08:31'),
(5, 2, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', 'victorosaronwafor@gmail.com', '2025-02-11 10:22:14'),
(6, 2, 'Mary', 'Clement', 'maryclems9@gmail.com', 'This post is awesome!', '2025-02-11 10:48:03'),
(7, 2, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', 'webadmin/classes/process.php?action=get-comments&post_id=', '2025-02-11 11:02:29'),
(8, 2, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', '08188059316', '2025-02-11 11:07:22'),
(9, 2, 'Victor', 'Osaronwafor', 'victorosaronwafor@gmail.com', '08188059316', '2025-02-11 11:08:30'),
(10, 1, 'Victor', 'Legend', 'victorosaronwafor@gmail.com', 'Nice blog Post', '2025-02-11 15:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `location`, `message`, `date`) VALUES
(1, 'Victor Olamide Osaronwafor', 'victorosaronwafor@gmail.com', '08188059316', '', 'I need your services!', '2025-02-11 11:39:35'),
(2, 'Victory Eseohe', 'victorosaronwafor@gmail.com', '08188059316', 'Abuja', 'I want to build a portal', '2025-02-11 11:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=pending, 1=approved, 2=declined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `services` text NOT NULL,
  `technologies` text NOT NULL,
  `project_url` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `duration` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `creator` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `category_id`, `title`, `slug`, `caption`, `description`, `image`, `client`, `services`, `technologies`, `project_url`, `start_date`, `duration`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `creator`, `date`) VALUES
(1, 5, 'Dmy Foodplug Ecommerce Website ', 'dmy-foodplug-ecommerce-website', 'Amazing ecommerce website', 'Dmy Foodplug is an e foodstore that is designed to sell products to customers easily!', '6780cddd0b6bb.png', 'Dammy', 'Website Development, Database Design ', 'HTML, CSS, React, Laravel ', 'www.dmyfoodplug.com', '2024-11-30', '2 month', 'Dmy Foodplug Ecommerce Website', 'Food Vendor, Online, Food Seller, Food stuffs, victor, Osaronwafor, Developer', 'Dmy Foodplug is an e foodstore that is designed to sell products to customers easily!', 0, 'Olvios', '2024-12-17 04:20:12'),
(2, 2, 'Uncle Tees Restaurant', 'uncle-tees-restaurant', 'Uncle Tees Restaurant Prototype', 'Uncle Tees Restaurant Prototype Design made using figma', '67616e69e3d2a.png', 'Uncle Tee', 'Graphic Design, UI/UX', 'Adobe XD, Adobe Photoshop', 'www.uncletee.com', '2023-02-17', '2 Weeks', 'Uncle Tees Restaurant', 'Uncle Tees, Restaurant Prototype,', 'Uncle Tees Restaurant Prototype Design made using figma', 0, 'Olvios', '2024-12-17 04:28:25'),
(3, 2, 'DigiL Hub', 'digil-hub', 'DigiL Hub Learning Prototype', 'DigiL Hub Learning Prototype Design made using Adobe XD', '6780cdc9db97f.png', 'Goldamz', 'Graphic Design, UI/UX', 'Adobe XD, Adobe Photoshop', '', '2024-01-25', '1 Week', 'DigiL Hub Learning Prototype', 'DigiL Hub Learning Prototype', 'DigiL Hub Learning Prototype Design made using Adobe XD', 0, 'Olvios', '2024-12-17 04:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `quote` text NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `author` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category`, `caption`, `quote`, `description`, `image`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `author`, `date`) VALUES
(1, 'Why Every Developer Should Have A Blog', 'why-every-developer-should-have-a-blog', 'Article', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 'You might not think that programmers are artists, but programming is an extremely creative profession. It\'s logic-based creativity.\r\n~ John Romero', 'Typography\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.\r\nQuote Example:\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.', '67921d691ae45.png', 'Why Every Developer Should Have A Blog', 'Blog, Why, Why Every Developer Should Have A Blog', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 0, 'Olvios', '2025-01-03 11:26:32'),
(2, 'How to Optimize your Website for Better Performance', 'how-to-optimize-your-website-for-better-performance', 'Tutorial', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.\r\n\r\nCode Block Example\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n', 'You might not think that programmers are artists, but programming is an extremely creative profession. It\'s logic-based creativity.\r\nJohn Romero', 'Typography\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.\r\nQuote Example:\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.\r\nYou might not think that programmers are artists, but programming is an extremely creative profession. It\'s logic-based creativity.\r\nJohn Romero\r\nVideo Example\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.', '6777c0665c127.png', 'Why Every Developer Should Have A Blog', 'Why, Every, Developer, Blog', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.\r\n\r\nCode Block Example\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n', 0, 'Olvios', '2025-01-03 11:48:06'),
(3, '5 Great Web Frameworks to Learn in 2025', '5-great-web-frameworks-to-learn-in-2025', 'Article', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.  Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.\r\n\r\nCode Block Example\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.', 'You might not think that programmers are artists, but programming is an extremely creative profession. It\'s logic-based creativity.\r\nJohn Romero', 'Typography\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.\r\nQuote Example:\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.', '6777d8e4da853.png', '5 Great Web Frameworks to Learn in 2025', 'Blog, Olvios', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.\r\n\r\nCode Block Example\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.', 0, 'Olvios', '2025-01-03 11:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `price` double NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_url` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `creator` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `caption`, `price`, `description`, `image`, `product_url`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `creator`, `date`) VALUES
(1, 5, 'React Dashboard Template', 'react-dashboard-template', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease. Update', 200, 'Embark on a journey of innovation and self-expression with \"Unleashing Creativity in Code,\" an e-book that transforms the way developers approach programming. Dive into the world where code becomes a canvas for creativity, and software development becomes an art form.\r\n\r\nCreative Coding Challenges\r\nImmerse yourself in a series of creative coding challenges designed to unlock your imagination and push the boundaries of traditional programming. Explore unconventional solutions, experiment with different programming paradigms, and cultivate a mindset that celebrates ingenuity in code.Push the boundaries of your coding skills with engaging and innovative challenges. Each challenge is designed to inspire creativity and problem-solving, whether you\'re a beginner or an experienced developer. Dive into a world where code meets creativity and transform ideas into interactive experiences.\r\n\r\nInteractive Exercises and Playful Coding Labs\r\nEngage in interactive exercises and playful coding labs that encourage experimentation and playfulness in your coding journey. Break free from the conventional and discover how coding can be a dynamic and enjoyable process, fostering an environment where creativity flourishes.The Interactive Exercises and Playful Coding Labs emphasize the importance of applying what you’ve learned to real-world scenarios. Throughout your journey, you’ll work on projects that mirror the kinds of tasks you might encounter in a professional setting. Whether it’s developing a web application, analyzing data, or building a simple game, these projects provide a context for your coding skills and demonstrate their practical value.\r\n\r\nPersonal Projects for Artistic Expression\r\nUndertake personal coding projects that encourage artistic expression and creativity. Develop applications that showcase your unique style, incorporating design elements, visual aesthetics, and interactive features to bring your creative vision to life through code.Project-based learning allows you to see how individual coding concepts come together to create something meaningful. It also gives you a portfolio of work that you can showcase to potential employers or clients, proving your abilities and creativity. Each project is an opportunity to apply your knowledge, experiment with new techniques, and refine your coding style. By the end of each project, you’ll not only have a deeper understanding of the subject matter but also a tangible product that you can be proud of. This approach to learning ensures that you’re not just learning code in isolation, but understanding how it fits into larger, real-world contexts.\r\n\r\nInspiring Stories and Interviews\r\nDelve into inspiring stories and interviews with creative coders who have successfully merged artistry with programming. Gain insights into their creative processes, challenges faced, and breakthrough moments. These stories serve as a source of inspiration, illustrating how creativity can be a driving force in coding.In these labs, you might find yourself creating digital art, developing mini-games, or even coding generative music. The possibilities are as limitless as your imagination. This playful approach encourages you to think outside the box, explore new ideas, and apply your coding skills in innovative ways. By turning coding into a creative endeavor, these labs help you discover the fun side of programming and keep you motivated to learn and grow.\r\n\r\nEnrich your coding experience by embracing creativity as a core aspect of your development journey. \"Unleashing Creativity in Code\" is not just an e-book; it\'s a guide that empowers you to infuse your code with imagination, making the development process a canvas for innovation and self-expression. Explore the artistic side of coding and redefine what is possible in the world of software development.', '6772711f8df90.png', '', 'React Dashboard Template', 'React, Dashboard, Template, UIUX', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease.', 0, 'Olvios', '2024-12-27 10:59:49'),
(2, 2, 'React UI Kit', 'react-ui-kit', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease. ', 100, 'Embark on a journey of innovation and self-expression with \"Unleashing Creativity in Code,\" an e-book that transforms the way developers approach programming. Dive into the world where code becomes a canvas for creativity, and software development becomes an art form.\r\n\r\nCreative Coding Challenges\r\nImmerse yourself in a series of creative coding challenges designed to unlock your imagination and push the boundaries of traditional programming. Explore unconventional solutions, experiment with different programming paradigms, and cultivate a mindset that celebrates ingenuity in code.Push the boundaries of your coding skills with engaging and innovative challenges. Each challenge is designed to inspire creativity and problem-solving, whether you\'re a beginner or an experienced developer. Dive into a world where code meets creativity and transform ideas into interactive experiences.\r\n\r\nInteractive Exercises and Playful Coding Labs\r\nEngage in interactive exercises and playful coding labs that encourage experimentation and playfulness in your coding journey. Break free from the conventional and discover how coding can be a dynamic and enjoyable process, fostering an environment where creativity flourishes.The Interactive Exercises and Playful Coding Labs emphasize the importance of applying what youï¿½ve learned to real-world scenarios. Throughout your journey, youï¿½ll work on projects that mirror the kinds of tasks you might encounter in a professional setting. Whether itï¿½s developing a web application, analyzing data, or building a simple game, these projects provide a context for your coding skills and demonstrate their practical value.\r\n\r\nPersonal Projects for Artistic Expression\r\nUndertake personal coding projects that encourage artistic expression and creativity. Develop applications that showcase your unique style, incorporating design elements, visual aesthetics, and interactive features to bring your creative vision to life through code.Project-based learning allows you to see how individual coding concepts come together to create something meaningful. It also gives you a portfolio of work that you can showcase to potential employers or clients, proving your abilities and creativity. Each project is an opportunity to apply your knowledge, experiment with new techniques, and refine your coding style. By the end of each project, youï¿½ll not only have a deeper understanding of the subject matter but also a tangible product that you can be proud of. This approach to learning ensures that youï¿½re not just learning code in isolation, but understanding how it fits into larger, real-world contexts.\r\n\r\nInspiring Stories and Interviews\r\nDelve into inspiring stories and interviews with creative coders who have successfully merged artistry with programming. Gain insights into their creative processes, challenges faced, and breakthrough moments. These stories serve as a source of inspiration, illustrating how creativity can be a driving force in coding.In these labs, you might find yourself creating digital art, developing mini-games, or even coding generative music. The possibilities are as limitless as your imagination. This playful approach encourages you to think outside the box, explore new ideas, and apply your coding skills in innovative ways. By turning coding into a creative endeavor, these labs help you discover the fun side of programming and keep you motivated to learn and grow.\r\n\r\nEnrich your coding experience by embracing creativity as a core aspect of your development journey. \"Unleashing Creativity in Code\" is not just an e-book; it\'s a guide that empowers you to infuse your code with imagination, making the development process a canvas for innovation and self-expression. Explore the artistic side of coding and redefine what is possible in the world of software development.', '678e5674eb680.png', '', 'React UI Kit', 'React, UI, Kit, Victor', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease. ', 0, 'Olvios', '2024-12-27 11:03:23'),
(3, 4, 'Angular Dashboard Template', 'angular-dashboard-template', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease.', 400, 'Embark on a journey of innovation and self-expression with \"Unleashing Creativity in Code,\" an e-book that transforms the way developers approach programming. Dive into the world where code becomes a canvas for creativity, and software development becomes an art form.\r\n\r\nCreative Coding Challenges\r\nImmerse yourself in a series of creative coding challenges designed to unlock your imagination and push the boundaries of traditional programming. Explore unconventional solutions, experiment with different programming paradigms, and cultivate a mindset that celebrates ingenuity in code.Push the boundaries of your coding skills with engaging and innovative challenges. Each challenge is designed to inspire creativity and problem-solving, whether you\'re a beginner or an experienced developer. Dive into a world where code meets creativity and transform ideas into interactive experiences.\r\n\r\nInteractive Exercises and Playful Coding Labs\r\nEngage in interactive exercises and playful coding labs that encourage experimentation and playfulness in your coding journey. Break free from the conventional and discover how coding can be a dynamic and enjoyable process, fostering an environment where creativity flourishes.The Interactive Exercises and Playful Coding Labs emphasize the importance of applying what you’ve learned to real-world scenarios. Throughout your journey, you’ll work on projects that mirror the kinds of tasks you might encounter in a professional setting. Whether it’s developing a web application, analyzing data, or building a simple game, these projects provide a context for your coding skills and demonstrate their practical value.\r\n\r\nPersonal Projects for Artistic Expression\r\nUndertake personal coding projects that encourage artistic expression and creativity. Develop applications that showcase your unique style, incorporating design elements, visual aesthetics, and interactive features to bring your creative vision to life through code.Project-based learning allows you to see how individual coding concepts come together to create something meaningful. It also gives you a portfolio of work that you can showcase to potential employers or clients, proving your abilities and creativity. Each project is an opportunity to apply your knowledge, experiment with new techniques, and refine your coding style. By the end of each project, you’ll not only have a deeper understanding of the subject matter but also a tangible product that you can be proud of. This approach to learning ensures that you’re not just learning code in isolation, but understanding how it fits into larger, real-world contexts.\r\n\r\nInspiring Stories and Interviews\r\nDelve into inspiring stories and interviews with creative coders who have successfully merged artistry with programming. Gain insights into their creative processes, challenges faced, and breakthrough moments. These stories serve as a source of inspiration, illustrating how creativity can be a driving force in coding.In these labs, you might find yourself creating digital art, developing mini-games, or even coding generative music. The possibilities are as limitless as your imagination. This playful approach encourages you to think outside the box, explore new ideas, and apply your coding skills in innovative ways. By turning coding into a creative endeavor, these labs help you discover the fun side of programming and keep you motivated to learn and grow.\r\n\r\nEnrich your coding experience by embracing creativity as a core aspect of your development journey. \"Unleashing Creativity in Code\" is not just an e-book; it\'s a guide that empowers you to infuse your code with imagination, making the development process a canvas for innovation and self-expression. Explore the artistic side of coding and redefine what is possible in the world of software development.', '67726f460b09b.png', '', 'Angular Dashboard Template', 'Angular, Dashboard, Template', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease.', 1, 'Olvios', '2024-12-30 11:00:38'),
(5, 5, 'Web Admin Portal', 'web-admin-portal', 'Web Admin Portal', 300, 'Web Admin Portal', '679112caba72f.png', '', 'Web Admin Portal', 'Web Admin, Portal, Website, Back End Portal,', 'Web Admin Portal', 0, 'Olvios', '2025-01-22 16:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_address` longtext DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `whatsapp_url` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `email`, `office_address`, `facebook`, `instagram`, `twitter`, `linkedIn`, `youtube`, `whatsapp`, `whatsapp_url`, `logo`, `status`, `date`) VALUES
(1, '08188059316', 'victorosaronwafor@gmail.com', 'F.C.T Abuja', 'facebook.com', 'instagram.com', 'twitter.com', 'linkedIn.com', 'youtube.com', '08188059316', 'wa.me', '1739289261.png', 0, '2024-02-23 18:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` int(1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `country`, `description`, `image`, `rating`, `status`, `date`) VALUES
(2, 'Victor John UPDATE', 'Algeria UPDATE', 'Algeria UPDATE', '67a1f8c4dc1f6.jpg', 507, 1, '2025-02-04 11:45:25'),
(3, 'Victory Ehikioya ', 'Abuja ', 'I love him  ', '67a1f8df64acb.jpg', 2, 0, '2025-02-04 11:48:05'),
(4, 'Victory Eseohe', 'Abuja', 'I love his work', '67a1f8f06f700.jpg', 3, 0, '2025-02-04 12:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL,
  `access` tinytext NOT NULL DEFAULT '0' COMMENT '0 - unrestricted, 1 - restricted\r\n',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `access`, `date_created`) VALUES
(1, 'Olvios', 'victorosaronwafor@gmail.com', '$2y$10$eWZTzkC0t6qWdLpf4/EHBea1ul6EUViA05zJ.x2SwrmTeVQmVfapW', 2, '0', '2024-12-13 01:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `company` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `job_title`, `description`, `company`, `duration`, `location`, `status`, `date`) VALUES
(2, 'Web Manager', 'Graphics Designer', 'Golden City', 'March 2021 - March 2022', 'Abuja', 0, '2025-02-04 09:36:12'),
(3, 'Software Developer', 'Software Developer', 'Africa Economic Forum', 'March 2024 - March 2028', 'Kigali', 0, '2025-02-04 09:37:03'),
(4, 'Graphics Designer', 'Graphics Designer', 'Tech Nader', 'March 2020 - March 2022', 'F.C.T Abuja', 1, '2025-02-04 10:12:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
