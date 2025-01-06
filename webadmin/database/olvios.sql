-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 05:04 AM
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
  `image` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `name`, `role`, `intro_title`, `intro_text`, `years_of_experience`, `projects_completed`, `clients_worldwide`, `what_i_do`, `image`, `resume`, `status`, `date`) VALUES
(1, 'Victor Osaronwafor', 'Software Developer', 'HI, I\'M A FREELANCER', 'I\'m a software engineer specializing in scalable web apps. Explore my blog, project portfolio and online resume', 5, 50, 30, 'I have more than 10 years\' experience building software for clients all over the world. Below is a quick overview of my main technical skill sets and technologies I use. Want to find out more about my experience? Check out my  online resume and project portfolio. ', '6777c108086d9.png', '677741d361096.pdf', 0, '2025-01-03 01:48:48');

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
(1, 'Graphics Design', 'graphics-design', 'Graphics Design', 1, '2024-12-16 06:46:57'),
(2, 'UI/UX Designs', 'uiux-designs', 'UI/UX Designs', 0, '2024-12-16 06:52:19'),
(4, 'Mobile App Development', 'mobile-app-development', 'Mobile App Development', 0, '2024-12-16 22:50:33'),
(5, 'Website Development', 'website-development', 'Website Development', 0, '2024-12-16 23:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 5, 'Dmy Foodplug Ecommerce Website ', 'dmy-foodplug-ecommerce-website', 'Amazing ecommerce website', 'Dmy Foodplug is an e foodstore that is designed to sell products to customers easily!', '67674a5414714.png', 'Dammy', 'Website Development, Database Design ', 'HTML, CSS, React, Laravel ', 'www.dmyfoodplug.com', '2024-11-30', '2 month', 'Dmy Foodplug Ecommerce Website', 'ertert', 'ertertert', 0, 'Olvios', '2024-12-17 04:20:12'),
(2, 2, 'Uncle Tees Restaurant', 'uncle-tees-restaurant', 'Uncle Tees Restaurant Prototype', 'Uncle Tees Restaurant Prototype Design made using figma', '67616e69e3d2a.png', 'Uncle Tee', 'Graphic Design, UI/UX', 'Adobe XD, Adobe Photoshop', 'www.uncletee.com', '2023-02-17', '2 Weeks', 'Uncle Tees Restaurant', 'Uncle Tees, Restaurant Prototype,', 'Uncle Tees Restaurant Prototype Design made using figma', 0, 'Olvios', '2024-12-17 04:28:25'),
(3, 2, 'DigiL Hub', 'digil-hub', 'DigiL Hub Learning Prototype', 'DigiL Hub Learning Prototype Design made using Adobe XD', '', 'Goldamz', 'Graphic Design, UI/UX', 'Adobe XD, Adobe Photoshop', '', '2024-01-25', '1 Week', 'DigiL Hub Learning Prototype', 'DigiL Hub Learning Prototype', 'DigiL Hub Learning Prototype Design made using Adobe XD', 0, 'Olvios', '2024-12-17 04:33:16');

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
(1, 'Why Every Developer Should Have A Blog', '', 'Article', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 'You might not think that programmers are artists, but programming is an extremely creative profession. It\'s logic-based creativity.\r\n~ John Romero', 'Typography\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.\r\nQuote Example:\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit lobortis arcu enim urna adipiscing praesent velit viverra sit semper lorem eu cursus vel hendrerit elementum morbi curabitur etiam nibh justo, lorem aliquet donec sed sit mi dignissim at ante massa mattis.\r\n\r\nBullet Points:\r\nLorem ipsum dolor sit amet, consectetuer.\r\nAenean commodo ligula eget dolor.\r\nEtiam ultricies nisi vel augue.', '6777bb58c80d1.png', 'Why Every Developer Should Have A Blog', 'Blog, Why, Why Every Developer Should Have A Blog', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 1, 'Olvios', '2025-01-03 11:26:32'),
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
(2, 2, 'React UI Kit', 'react-ui-kit', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease. ', 100, 'Embark on a journey of innovation and self-expression with \"Unleashing Creativity in Code,\" an e-book that transforms the way developers approach programming. Dive into the world where code becomes a canvas for creativity, and software development becomes an art form.\r\n\r\nCreative Coding Challenges\r\nImmerse yourself in a series of creative coding challenges designed to unlock your imagination and push the boundaries of traditional programming. Explore unconventional solutions, experiment with different programming paradigms, and cultivate a mindset that celebrates ingenuity in code.Push the boundaries of your coding skills with engaging and innovative challenges. Each challenge is designed to inspire creativity and problem-solving, whether you\'re a beginner or an experienced developer. Dive into a world where code meets creativity and transform ideas into interactive experiences.\r\n\r\nInteractive Exercises and Playful Coding Labs\r\nEngage in interactive exercises and playful coding labs that encourage experimentation and playfulness in your coding journey. Break free from the conventional and discover how coding can be a dynamic and enjoyable process, fostering an environment where creativity flourishes.The Interactive Exercises and Playful Coding Labs emphasize the importance of applying what you’ve learned to real-world scenarios. Throughout your journey, you’ll work on projects that mirror the kinds of tasks you might encounter in a professional setting. Whether it’s developing a web application, analyzing data, or building a simple game, these projects provide a context for your coding skills and demonstrate their practical value.\r\n\r\nPersonal Projects for Artistic Expression\r\nUndertake personal coding projects that encourage artistic expression and creativity. Develop applications that showcase your unique style, incorporating design elements, visual aesthetics, and interactive features to bring your creative vision to life through code.Project-based learning allows you to see how individual coding concepts come together to create something meaningful. It also gives you a portfolio of work that you can showcase to potential employers or clients, proving your abilities and creativity. Each project is an opportunity to apply your knowledge, experiment with new techniques, and refine your coding style. By the end of each project, you’ll not only have a deeper understanding of the subject matter but also a tangible product that you can be proud of. This approach to learning ensures that you’re not just learning code in isolation, but understanding how it fits into larger, real-world contexts.\r\n\r\nInspiring Stories and Interviews\r\nDelve into inspiring stories and interviews with creative coders who have successfully merged artistry with programming. Gain insights into their creative processes, challenges faced, and breakthrough moments. These stories serve as a source of inspiration, illustrating how creativity can be a driving force in coding.In these labs, you might find yourself creating digital art, developing mini-games, or even coding generative music. The possibilities are as limitless as your imagination. This playful approach encourages you to think outside the box, explore new ideas, and apply your coding skills in innovative ways. By turning coding into a creative endeavor, these labs help you discover the fun side of programming and keep you motivated to learn and grow.\r\n\r\nEnrich your coding experience by embracing creativity as a core aspect of your development journey. \"Unleashing Creativity in Code\" is not just an e-book; it\'s a guide that empowers you to infuse your code with imagination, making the development process a canvas for innovation and self-expression. Explore the artistic side of coding and redefine what is possible in the world of software development.', '', '', '', '', '', 0, 'Olvios', '2024-12-27 11:03:23'),
(3, 4, 'Angular Dashboard Template', 'angular-dashboard-template', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease.', 400, 'Embark on a journey of innovation and self-expression with \"Unleashing Creativity in Code,\" an e-book that transforms the way developers approach programming. Dive into the world where code becomes a canvas for creativity, and software development becomes an art form.\r\n\r\nCreative Coding Challenges\r\nImmerse yourself in a series of creative coding challenges designed to unlock your imagination and push the boundaries of traditional programming. Explore unconventional solutions, experiment with different programming paradigms, and cultivate a mindset that celebrates ingenuity in code.Push the boundaries of your coding skills with engaging and innovative challenges. Each challenge is designed to inspire creativity and problem-solving, whether you\'re a beginner or an experienced developer. Dive into a world where code meets creativity and transform ideas into interactive experiences.\r\n\r\nInteractive Exercises and Playful Coding Labs\r\nEngage in interactive exercises and playful coding labs that encourage experimentation and playfulness in your coding journey. Break free from the conventional and discover how coding can be a dynamic and enjoyable process, fostering an environment where creativity flourishes.The Interactive Exercises and Playful Coding Labs emphasize the importance of applying what you’ve learned to real-world scenarios. Throughout your journey, you’ll work on projects that mirror the kinds of tasks you might encounter in a professional setting. Whether it’s developing a web application, analyzing data, or building a simple game, these projects provide a context for your coding skills and demonstrate their practical value.\r\n\r\nPersonal Projects for Artistic Expression\r\nUndertake personal coding projects that encourage artistic expression and creativity. Develop applications that showcase your unique style, incorporating design elements, visual aesthetics, and interactive features to bring your creative vision to life through code.Project-based learning allows you to see how individual coding concepts come together to create something meaningful. It also gives you a portfolio of work that you can showcase to potential employers or clients, proving your abilities and creativity. Each project is an opportunity to apply your knowledge, experiment with new techniques, and refine your coding style. By the end of each project, you’ll not only have a deeper understanding of the subject matter but also a tangible product that you can be proud of. This approach to learning ensures that you’re not just learning code in isolation, but understanding how it fits into larger, real-world contexts.\r\n\r\nInspiring Stories and Interviews\r\nDelve into inspiring stories and interviews with creative coders who have successfully merged artistry with programming. Gain insights into their creative processes, challenges faced, and breakthrough moments. These stories serve as a source of inspiration, illustrating how creativity can be a driving force in coding.In these labs, you might find yourself creating digital art, developing mini-games, or even coding generative music. The possibilities are as limitless as your imagination. This playful approach encourages you to think outside the box, explore new ideas, and apply your coding skills in innovative ways. By turning coding into a creative endeavor, these labs help you discover the fun side of programming and keep you motivated to learn and grow.\r\n\r\nEnrich your coding experience by embracing creativity as a core aspect of your development journey. \"Unleashing Creativity in Code\" is not just an e-book; it\'s a guide that empowers you to infuse your code with imagination, making the development process a canvas for innovation and self-expression. Explore the artistic side of coding and redefine what is possible in the world of software development.', '67726f460b09b.png', '', 'Angular Dashboard Template', 'Angular, Dashboard, Template', 'Embark on a journey through the ever-evolving landscape of software development. Unlock the full potential of your data with this powerful React dashboard template. Tailored for developers and businesses, this template offers a seamless blend of functionality and design. Customize it to fit your needs and start making data-driven decisions with ease.', 1, 'Olvios', '2024-12-30 11:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `wallet_address` text DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_address` longtext DEFAULT NULL,
  `withdrawal_error` text DEFAULT NULL,
  `payment_notice` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `wallet_address`, `about`, `phone`, `email`, `office_address`, `withdrawal_error`, `payment_notice`, `facebook`, `instagram`, `twitter`, `linkedIn`, `youtube`, `logo`, `status`, `date`) VALUES
(1, 'DxPEQkYZZrbyqrAQVukxtFR7JYrHcnhdC9UUQ1SSozvZ', 'At TradeEclipse, we believe that the best endorsement comes from satisfied clients. It\'s no surprise that many of our new clients are referrals from our current customers.', '', 'support@tradeeclipse.com', '795 South Park Avenue,\r\nMelbourne, Australia', 'Unable to withdraw! Please contact support@tradeeclipse.com for your Pin', 'Copy this wallet address to make payment, after making payment, upload the proof of payment on the \"proof section\".\r\nAfter confirmation, your current investment will be reflected.', 'facebook.com', 'instagram.com', 'twitter.com', 'linkedIn.com', 'youtube.com', '1723898864.png', 0, '2024-02-23 18:26:51');

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
