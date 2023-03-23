-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2023 at 09:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `avatar` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT 'assets/images/profile-bg.jpg',
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `mobile`, `password`, `remember_token`, `status`, `avatar`, `cover_photo`, `gender`, `date_of_birth`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Asif Jamal', 'asif.sanix@gmail.com', '7894561230', '$2y$10$yddxmLD6rySE7N5XT1OR5uS.G1Oe/UNOYE34lW9gPQvcIq1wFWBDW', '1My44rCElEyK3sp5XZa18D5xT9ANBwxZ768Tq5SfhNuQa8hbg08GKAb3grkk', 1, 'storage/admin/default-avatar.png', 'storage/admin/1676135628.png', 'male', NULL, '2019-03-27 00:00:00', '2023-02-11 17:13:48', NULL),
(2, 2, 'Jamal', 'asifjamal251@gmail.com', '8109763160', '$2y$10$HkdFs35.H07KzyY3BmmxJ.E1jCV9NFczzyvki1lHGGHqTqQ5N70VS', NULL, 1, 'storage/admin/default-avatar.png', NULL, 'male', '2022-01-20', '2022-06-25 15:33:05', '2022-06-25 18:31:25', NULL),
(3, 2, 'Asif', 'asif@gmail.com', '12345678', '$2y$10$SpNRIJ3YOFvk/xQzzvQIW.Kk2QjAKOzhBI0Gp.N5HckfgUaIhhFjK', NULL, 1, 'storage/admin/default-avatar.png', NULL, 'female', '2022-06-07', '2022-06-25 18:33:25', '2022-06-25 19:21:18', '2022-06-25 19:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`email`, `token`, `created_at`) VALUES
('asifjamal@yopmail.com', '$2y$10$J/boDihlUPMgBF7L2uPVjeaYlLxKjQ4Ifo25TfhwBOt3UCix0kkYm', '2019-06-16 12:06:57'),
('asif.sanix@gmail.com', '$2y$10$cNoidIFR/27b5zYgCugNGeto1P2Dr0uHNen4gUahwteuP1vCgURlm', '2019-08-08 06:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `title`, `slug`, `body`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'new', 'vjg', NULL, NULL, 1, '2023-03-23 21:14:09', '2023-03-23 21:14:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`slug`, `name`, `icon`, `parent`, `ordering`, `status`) VALUES
('admin', 'Admin', 'mdi mdi-account-lock', NULL, 2, 1),
('attribute', 'Attribute', NULL, 'ecommerce', 3, 1),
('bread', 'Bread', 'ft-target', 'setting', 2, 1),
('collection', 'Collection', NULL, 'ecommerce', 1, 1),
('dashboard', 'Dashboard', 'bx bx-home-circle', NULL, 0, 1),
('ecommerce', 'Ecommerce', 'bx bxs-shopping-bag-alt', NULL, 1, 1),
('menu', 'Menu', NULL, 'setting', 1, 1),
('product', 'Product', NULL, 'ecommerce', 0, 1),
('role', 'Role', NULL, 'setting', 0, 1),
('setting', 'Setting', 'mdi mdi-tools', NULL, 4, 1),
('site_setting', 'Site Setting', 'bx bx-cog', NULL, 3, 1),
('tag', 'Tag', NULL, 'ecommerce', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `menu_slug` varchar(200) DEFAULT NULL,
  `permission_key` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_slug`, `permission_key`) VALUES
(1, 'role', 'browse_role'),
(2, 'role', 'read_role'),
(3, 'role', 'add_role'),
(4, 'role', 'edit_role'),
(5, 'role', 'delete_role'),
(6, 'menu', 'browse_menu'),
(7, 'menu', 'read_menu'),
(8, 'menu', 'add_menu'),
(9, 'menu', 'edit_menu'),
(10, 'menu', 'delete_menu'),
(11, 'setting', 'browse_setting'),
(12, 'dashboard', 'browse_dashboard'),
(13, 'bread', 'browse_bread'),
(14, 'bread', 'read_bread'),
(15, 'bread', 'add_bread'),
(16, 'bread', 'edit_bread'),
(17, 'bread', 'delete_bread'),
(18, 'site_setting', 'browse_site_setting'),
(19, 'site_setting', 'read_site_setting'),
(20, 'site_setting', 'add_site_setting'),
(21, 'site_setting', 'edit_site_setting'),
(22, 'site_setting', 'delete_site_setting'),
(23, 'site_setting', 'logo_site_setting'),
(24, 'admin', 'browse_admin'),
(25, 'admin', 'read_admin'),
(26, 'admin', 'add_admin'),
(27, 'admin', 'edit_admin'),
(28, 'admin', 'delete_admin'),
(29, 'admin', 'change_email'),
(30, 'admin', 'change_password'),
(31, 'admin', 'change_status'),
(32, 'ecommerce', 'browse_ecommerce'),
(33, 'ecommerce', 'read_ecommerce'),
(34, 'ecommerce', 'add_ecommerce'),
(35, 'ecommerce', 'edit_ecommerce'),
(36, 'ecommerce', 'delete_ecommerce'),
(37, 'product', 'browse_product'),
(38, 'product', 'read_product'),
(39, 'product', 'add_product'),
(40, 'product', 'edit_product'),
(41, 'product', 'delete_product'),
(42, 'collection', 'browse_collection'),
(43, 'collection', 'read_collection'),
(44, 'collection', 'add_collection'),
(45, 'collection', 'edit_collection'),
(46, 'collection', 'delete_collection'),
(47, 'tag', 'browse_tag'),
(48, 'tag', 'read_tag'),
(49, 'tag', 'add_tag'),
(50, 'tag', 'edit_tag'),
(51, 'tag', 'delete_tag'),
(52, 'attribute', 'browse_attribute'),
(53, 'attribute', 'read_attribute'),
(54, 'attribute', 'add_attribute'),
(55, 'attribute', 'edit_attribute'),
(56, 'attribute', 'delete_attribute');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `excerpt` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `slug`, `body`, `excerpt`, `status`, `posted_by`, `image`, `publish_date`, `created_at`, `updated_at`) VALUES
(1, 'Maximizing Your Online Potential: The Advantages and Benefits of Running an E-commerce Store on Shopify', 'Building Your Online Empire: A Step-by-Step Guide to Setting Up Your E-commerce Store on Shopify', 'shopify-a-comprehensive-e-commerce-solution-for-your-online-business', '<p>Shopify is a leading e-commerce platform that provides everything you need to start and grow your online business. With its user-friendly interface, powerful features, and vast app store, Shopify has become the go-to platform for businesses of all sizes looking to launch or expand their online presence.</p>\r\n<p>One of the key advantages of Shopify is its ease of use. With its intuitive drag-and-drop website builder, you can create a professional-looking online store without needing any technical skills or coding knowledge. And if you need help, Shopify offers 24/7 support and a vast library of resources to assist you with every step of the way.</p>\r\n<p>In addition to its user-friendly interface, Shopify offers a range of powerful e-commerce tools to help you run your online business. This includes a fully integrated shopping cart, a range of payment options, and a suite of marketing and SEO tools to help you reach your target audience and drive sales.</p>\r\n<p>Another key feature of Shopify is its vast app store. With over 4,000 apps available, you can easily add new capabilities to your online store, such as email marketing, social media integration, and inventory management. This makes it easy to customize your store to fit your unique needs and grow your business.</p>\r\n<p>Shopify also offers a range of security features to protect your business and your customers. This includes secure hosting, PCI compliance, and fraud protection. With Shopify, you can rest assured that your online business is secure and protected.</p>\r\n<p>One of the benefits of using Shopify is its scalability. Whether you\'re just starting out or looking to grow your existing business, Shopify can grow with you. With a range of pricing plans to choose from, you can select the right plan for your business needs, and easily upgrade as your business grows.</p>\r\n<p>In conclusion, Shopify is a comprehensive e-commerce solution that offers everything you need to start and grow your online business. With its user-friendly interface, powerful features, and vast app store, Shopify provides a platform for businesses of all sizes to succeed in the world of e-commerce. Whether you\'re just starting out or looking to expand your existing online business, Shopify is a great choice for your e-commerce needs.</p>', NULL, 1, NULL, 'storage/posts/1676066236.jpg', '2023-01-06', '2022-12-30 03:03:00', '2023-02-17 06:23:01'),
(2, 'How to Build a Cryptoexchange Platform like Coinbase in 2023?', 'Cryptoexchange platforms have become increasingly popular in recent years due to their convenience and security. They allow users to easily buy and sell cryptocurrencies, as well as trade between different coins.', 'how-to-build-a-cryptoexchange-platform-like-coinbase-in-2023', '<p>Building a cryptocurrency exchange platform like Coinbase is a complex and challenging task, but with the right tools, resources, and expertise, it can be accomplished. Here\'s a step-by-step guide on how to build a crypto exchange platform like Coinbase in 2023:</p>\r\n<p><br></p>\r\n<p><b>Conduct market research</b></p> \r\n<p>Before starting the development process, it\'s important to research the market and understand the competition. Study the existing players in the market and their strengths and weaknesses. Determine what makes Coinbase stand out and what could be improved upon.</p>\r\n<p><br></p>\r\n<p><b>Choose a suitable jurisdiction</b></p>\r\n<p>Decide on the location of your exchange platform and ensure it is in a jurisdiction that has favorable regulations and policies for cryptocurrency businesses.</p>\r\n<p><br></p>\r\n\r\n<p><b>Obtain necessary licenses and permits</b></p>\r\n<p>In order to operate a cryptocurrency exchange, you will need to obtain the necessary licenses and permits required by the jurisdiction you have chosen.<br></p>\r\n<p><br></p>\r\n<p><b>Select a technology stack</b></p>\r\n<p>Choose the right technology stack for your platform. Consider factors such as security, scalability, and performance. You may choose to build the platform from scratch using popular programming languages such as Python or Ruby on Rails, or you can use a white label solution that provides a ready-made platform.<br></p>\r\n<p><br></p>\r\n<p><b>Develop the platform</b></p>\r\n<p>Develop the front-end and back-end of the platform, ensuring that it is user-friendly, secure, and can handle high volumes of transactions. You can choose to build the platform in-house or hire a team of developers to help you.<br></p>\r\n<p><br></p>\r\n<p><b>Integrate security measures</b></p> \r\n<p>Implement robust security measures to protect the platform and its users. This includes two-factor authentication, SSL encryption, and cold storage for storing cryptocurrency assets.<br></p>\r\n<p><br></p>\r\n<p><b>Add payment methods</b></p>\r\n<p>Integrate various payment methods, including fiat deposits and withdrawals, and cryptocurrency deposits and withdrawals.<br></p>\r\n<p><br></p>\r\n<p><b>Test the platform</b></p>\r\n<p>Thoroughly test the platform before launching to ensure that it is functioning properly and that there are no security vulnerabilities.<br></p>\r\n<p><br></p>\r\n<p><b>Launch the platform</b></p>\r\n<p>Once the platform is fully functional and tested, you can launch it to the public. Start with a small user base and gradually increase it as you gain more experience and build a reputation for reliability and security.<br></p>\r\n<p><br></p>\r\n<p><b>Continuously improve</b></p>\r\n<p>Continuously monitor the platform and make improvements and upgrades as needed. Stay up to date with the latest technology and industry trends to ensure that the platform remains relevant and competitive.<br></p>\r\n<p><br></p>\r\n<p>Building a cryptocurrency exchange platform like Coinbase requires a significant investment of time, money, and resources. However, with the right approach and attention to detail, it can be a rewarding and profitable venture.</p>', NULL, 1, NULL, 'storage/posts/1676302129.jpg', '2023-01-13', '2023-01-10 20:10:20', '2023-02-17 06:23:08'),
(3, 'How to take your business online: A step-by-step guide', 'If you are unconvinced about taking your business online, here are a few reasons that will give you the confidence this is the right move.', 'how-to-take-your-business-online-a-step-by-step-guide', '<p>In today’s fast-paced digital world, taking your business online is a must for growth and success. The internet has become a platform for businesses to reach out to a wider audience and increase their revenue.</p>\r\n<p><b> Here are some steps to help you take your business online</b></p>\r\n\r\n<p><b>Develop a Website</b></p>\r\n<p>A website is the foundation of any online business. Your website should be professional, visually appealing, and easy to navigate. Make sure you include all the necessary information about your business, such as your products or services, contact information, and about us section.</p>\r\n\r\n<p><b>Choose an E-commerce Platform</b></p>\r\n<p>If you plan to sell products online, you will need an e-commerce platform to handle the transactions. There are several options available, such as Shopify, Magento, and WooCommerce. Choose a platform that meets your needs and fits your budget.</p>\r\n\r\n<p><b>Establish a Social Media Presence</b></p>\r\n<p>Social media platforms such as Facebook, Twitter, and Instagram can be a great way to connect with your target audience and promote your business. Make sure you are active on the platforms and post regularly to keep your followers engaged.</p>\r\n\r\n<p><b>Create Quality Content</b></p>\r\n<p>Content is king when it comes to online marketing. Blogs, videos, and other forms of content can help you engage with your audience and drive traffic to your website. Make sure your content is high-quality, relevant, and provides value to your audience.</p>\r\n\r\n<p><b>Optimize for Search Engines</b></p>\r\n<p>Search engine optimization (SEO) is crucial for any online business. Make sure your website is optimized for search engines by using keywords in your content and meta tags. This will help your website rank higher in search engine results and attract more traffic.</p>\r\n\r\n<p><b>Utilize Email Marketing</b></p>\r\n<p>Email marketing is a cost-effective way to reach your audience and promote your business. Build an email list by offering incentives, such as discounts or special promotions, to encourage people to sign up. Use email to keep your subscribers informed about new products, services, and other updates.</p>\r\n\r\n<p><b>Accept Online Payments</b></p>\r\n<p> Make it easy for your customers to pay for your products or services by accepting online payments. Choose a payment gateway that is secure, reliable, and easy to use. This will help to increase conversions and improve customer satisfaction.</p>\r\n\r\n<p>In conclusion, taking your business online is a great way to reach a wider audience and increase revenue. Make sure you follow these steps to ensure a successful transition. Good luck!</p>', NULL, 1, NULL, 'storage/posts/1676439739.jpg', '2023-01-20', '2023-01-29 10:58:06', '2023-02-17 06:23:13'),
(4, 'The Future is Mobile: Understanding the Importance of Mobile App Development for Your Business', 'Unlocking the Potential of Mobile Technology for Your Business Growth', 'the-future-is-mobile-understanding-the-importance-of-mobile-app-development-for-your-business', '<p>In today\'s digital age, mobile devices have become a ubiquitous part of our daily lives. With the increasing use of smartphones and tablets, it\'s no surprise that businesses are turning to mobile app development as a way to reach their customers and stay ahead of the competition.</p>\r\n<p>One of the main advantages of mobile app development is that it allows businesses to create a direct and personal connection with their customers. With a well-designed mobile app, businesses can engage with customers on a more personal level, providing them with customized experiences and the ability to access products and services on the go.</p>\r\n<p>Another benefit of mobile app development is increased accessibility. By creating a mobile app, businesses can make their products and services available to customers 24/7, regardless of location. This not only makes it easier for customers to access your products and services, but also provides businesses with new opportunities for growth and expansion.</p>\r\n\r\n<p>Mobile apps also provide businesses with valuable data and insights into customer behavior. By tracking user activity and behavior, businesses can gather valuable information about their customers, including their preferences and buying habits. This information can then be used to improve the customer experience and increase conversions.</p>\r\n<p>In addition, mobile apps can provide businesses with a competitive edge. By offering unique and engaging experiences to customers, businesses can differentiate themselves from their competitors and stand out in a crowded marketplace.</p>\r\n<p>However, it\'s important to keep in mind that mobile app development is not a one-time project. In order to stay relevant and meet the evolving needs of your customers, it\'s important to continuously invest in the development and improvement of your mobile app.</p>\r\n<p>In conclusion, mobile app development is a crucial aspect of modern business and can provide numerous advantages and benefits to businesses of all sizes. By providing a direct connection with customers, increased accessibility, valuable insights into customer behavior, and a competitive edge, mobile app development is an investment in the future success of your business.</p>', NULL, 1, NULL, 'storage/posts/1676439720.jpg', '2023-01-27', '2023-02-13 12:03:16', '2023-02-17 06:23:18'),
(5, 'What Is an SSL Certificate: Definition and Explanation', 'Understanding the Importance of SSL Certificates for Online Security and Trustworthiness', 'what-is-an-ssl-certificate-definition-and-explanation', '<p>An SSL certificate, also known as a Secure Sockets Layer certificate, is a digital certificate that establishes a secure connection between a web server and a web browser. It is used to encrypt sensitive information, such as login credentials and payment details, that are transmitted between the web server and the browser.</p>\r\n<p>The SSL certificate works by establishing a secure connection between the web server and the browser using a process known as SSL/TLS (Transport Layer Security). When a user enters a website that is secured by an SSL certificate, the browser first checks if the SSL certificate is valid and trusted. If it is, the browser and the server exchange a series of encryption keys, which are used to encrypt and decrypt any data that is transmitted between them.</p>\r\n<p>One of the key benefits of using an SSL certificate is that it ensures the security and privacy of user data. By encrypting sensitive information, SSL certificates make it extremely difficult for hackers or other malicious actors to intercept and steal this data.</p>\r\n<p>In addition to providing security and privacy, SSL certificates can also help to improve a website\'s search engine rankings. Search engines, such as Google, take into account the use of SSL certificates when ranking websites in search results. Websites that use SSL certificates are generally seen as more trustworthy and secure, which can lead to higher search engine rankings and more traffic to the site.</p>\r\n<p>There are several types of SSL certificates available, including domain validated certificates, organization validated certificates, and extended validation certificates. The level of validation required for each type of SSL certificate varies, with extended validation certificates being the most rigorous and comprehensive.</p>\r\n<p>In conclusion, an SSL certificate is a digital certificate that is used to establish a secure connection between a web server and a web browser. It helps to encrypt sensitive information and provides security and privacy to users, while also improving a website\'s search engine rankings. By using an SSL certificate, businesses can help to ensure the security of their users\' data and build trust with their customers.</p>', NULL, 1, NULL, 'storage/posts/1676548721.jpg', '2023-02-03', '2023-02-16 11:58:41', '2023-02-17 06:23:32'),
(6, 'The Art of Building Exceptional Websites: Insights and Strategies from AR Technology', 'Insights and strategies for creating high-quality websites that drive business results, from a AR Technology with a proven track record of success.', 'the-art-of-building-exceptional-websites-insights-and-strategies-from-ar-technology', '<p>As businesses increasingly shift their focus to online channels, the importance of having a high-quality website has never been greater. A well-designed website can not only help establish your brand\'s online presence but also serve as a powerful tool for attracting and engaging with customers. In this article, we\'ll share insights and strategies from a leading web development company on how to build exceptional websites that deliver real business results.</p>\r\n<h3>Start with a solid strategy</h3>\r\n<p>Before beginning any web development project, it\'s essential to start with a solid strategy. This involves defining the goals of the website, understanding the target audience, and identifying the key features and functionality that will be needed. By developing a clear strategy upfront, you can ensure that the end product aligns with your business objectives and effectively meets the needs of your target audience.</p>\r\n<h3>Focus on user experience</h3>\r\n<p>A critical element of building an exceptional website is focusing on user experience. This involves designing the site in a way that is intuitive, easy to navigate, and visually appealing. By creating a website that is user-friendly and aesthetically pleasing, you can improve engagement and increase the likelihood of users returning to your site.</p>\r\n<h3>Optimize for search engines</h3>\r\n<p>Building a website is only half the battle; the other half is ensuring that it is discoverable by potential customers. This is where search engine optimization (SEO) comes in. By optimizing your website for search engines, you can increase its visibility in search results and attract more traffic. This involves using relevant keywords, creating high-quality content, and implementing technical optimizations that improve website performance.</p>\r\n<h3>Leverage data and analytics</h3>\r\n<p>To continually improve the performance of your website, it\'s important to leverage data and analytics. This involves tracking key metrics such as traffic, bounce rates, and conversion rates to identify areas of improvement. By using data to inform your decision-making, you can make incremental improvements that drive better results over time.</p>\r\n<h3>Invest in ongoing maintenance and support</h3>\r\n<p>Finally, building an exceptional website requires ongoing maintenance and support. This involves regularly updating the site to ensure that it remains secure, bug-free, and up-to-date with the latest technologies. By investing in ongoing maintenance and support, you can ensure that your website continues to deliver results over the long term.\r\n</p><p>In conclusion, building an exceptional website requires a combination of strategic planning, user experience design, search engine optimization, data and analytics, and ongoing maintenance and support. By following these insights and strategies from a leading web development company, you can create a website that not only looks great but also delivers real business results.</p>', NULL, 1, NULL, 'storage/posts/1677071260.jpg', '2023-02-10', '2023-02-22 13:07:40', '2023-02-22 13:07:40'),
(7, 'Make money teaching online: How to get started', 'Learn about the various platforms and strategies for teaching online, and get tips for setting up your own successful online teaching business.', 'make-money-teaching-online-how-to-get-started', '<p>As the world continues to move towards a more digital and interconnected future, online education is becoming increasingly popular. For individuals with expertise in a particular field, online teaching can be a great way to share their knowledge and earn a steady income. In this article, we\'ll explore how to get started with online teaching and build a successful career in this growing field.</p>\r\n<h2>Identify your niche</h2>\r\nThe first step to getting started with online teaching is to identify your area of expertise. What topics or subjects are you knowledgeable in? What skills do you possess that others might be interested in learning? Once you\'ve identified your niche, you can begin to research the demand for that area of expertise and the various platforms that are available for online teaching.<p></p>\r\n<h2>Choose a platform</h2>\r\n<p>There are many online teaching platforms available, ranging from free to paid, and from general to specialized. Some of the most popular online teaching platforms include Udemy, Teachable, Skillshare, and Coursera. Each platform has its own strengths and weaknesses, so it\'s important to do your research and choose the one that best fits your needs and goals.</p>\r\n<h2>Develop your course content</h2>\r\n<p>Once you\'ve identified your niche and chosen a platform, it\'s time to develop your course content. This can include creating a syllabus, developing lesson plans, and creating any necessary materials such as presentations or worksheets. It\'s important to keep your content engaging and informative, and to structure your course in a way that makes it easy for students to follow and understand.</p>\r\n<h2>Promote your course</h2>\r\n<p>After you\'ve created your course content, it\'s time to start promoting it. This can include creating a website or social media presence to showcase your course, as well as leveraging the marketing and promotional tools offered by your chosen platform. You can also reach out to your existing network and ask for referrals or testimonials to help build credibility and trust.</p>\r\n<h2>Engage with your students</h2>\r\n<p>Once your course is up and running, it\'s important to engage with your students and create a sense of community. This can include providing feedback on assignments, answering questions, and creating opportunities for students to interact with each other. By fostering a supportive and interactive learning environment, you can increase student engagement and improve the overall quality of your course.</p>\r\n<p>In conclusion, online teaching can be a rewarding and lucrative career path for individuals with expertise in a particular field. By identifying your niche, choosing a platform, developing your course content, promoting your course, and engaging with your students, you can get started with online teaching and build a successful career in this growing field. As a web development company, online teaching can also be a great way to expand your service offerings and reach a broader audience.</p>', NULL, 1, NULL, 'storage/posts/1677071625.jpg', '2023-02-17', '2023-02-22 13:13:45', '2023-02-22 13:37:06'),
(8, '10 Essential Tips for Building a Successful E-commerce Business article', 'Insights and Strategies to Help You Succeed in the Competitive World of E-commerce', '10-essential-tips-for-building-a-successful-e-commerce-business-article', '<p>If you\'re looking to start an e-commerce business or grow your existing one, here are 10 essential tips to keep in mind:</p>\r\n\r\n<h4>1. Choose the right platform</h4> \r\n<p>Select an e-commerce platform that suits your business needs, budget, and technical expertise. Some popular options include Shopify, WooCommerce, and Magento.</p>\r\n\r\n<h4>2. Focus on user experience</h4>\r\n<p>Make sure your website is user-friendly, easy to navigate, and visually appealing. Use high-quality images, clear product descriptions, and a simple checkout process to enhance the user experience.</p>\r\n\r\n<h4>3. Optimize for search engines</h4>\r\n<p>Implement an SEO strategy that targets relevant keywords and includes high-quality content. This will help your website rank higher in search engine results and attract more traffic.</p>\r\n\r\n<h4>4. Invest in social media</h4> \r\n<p>Build a strong social media presence to promote your products and connect with customers. Use social media platforms like Facebook, Instagram, and Twitter to showcase your products and engage with your audience.</p>\r\n\r\n<h4>5. Provide excellent customer service</h4> \r\n<p>Make sure to provide prompt and helpful customer service to keep your customers happy and satisfied. This includes responding to inquiries quickly, providing clear information about your products, and resolving issues in a timely manner.</p>\r\n\r\n<h4>6. Offer multiple payment options</h4> \r\n<p>Give your customers a variety of payment options, including credit cards, PayPal, and other online payment methods. This will make it easier for customers to complete their purchases and increase conversion rates.</p>\r\n\r\n<h4>7. Use analytics to track performance</h4>\r\n<p>Use analytics tools like Google Analytics to track website performance, including traffic, conversion rates, and customer behavior. This will help you make data-driven decisions and optimize your website for better results.</p>\r\n\r\n<h4>8. Leverage email marketing</h4> \r\n<p>Build an email list and use email marketing campaigns to promote your products, offer special promotions, and build customer loyalty.</p>\r\n\r\n<h4>9. Continuously test and optimize</h4>\r\n<p>Test different strategies and tactics to see what works best for your business. This includes experimenting with different product offerings, pricing strategies, and marketing campaigns.</p>\r\n\r\n<h4>10. Stay up-to-date with trends and best practices</h4> \r\nKeep up with the latest trends and best practices in e-commerce, including emerging technologies, customer behavior, and industry standards.\r\n\r\n<p>By following these 10 essential tips, you can build a successful e-commerce business that attracts customers, generates sales, and drives growth. Remember to focus on delivering a great user experience, providing excellent customer service, and continuously testing and optimizing your strategies to stay ahead of the competition.</p>', NULL, 1, NULL, 'storage/posts/1677163798.jpg', '2023-02-24', '2023-02-23 14:49:58', '2023-03-02 10:24:49'),
(9, 'The Latest Web Development Trends to Boost Your Online Presence', 'From PWAs to AI: Exploring the Top Trends Shaping Modern Web Development', 'the-latest-web-development-trends-to-boost-your-online-presence', '<p>As technology continues to evolve at a rapid pace, it\'s important for web development companies to stay on top of the latest trends in order to create websites that are both functional and visually appealing. In this article, we\'ll take a look at some of the latest web development trends that can help boost your online presence.</p>\r\n<p><b>Progressive Web Apps (PWAs)</b></p>\r\n<p>PWAs are web applications that offer a native app-like experience to users. They are designed to work on any device and can be accessed through a web browser, without the need to download or install an app. PWAs provide a seamless experience with features such as push notifications, offline access, and the ability to add a shortcut to the home screen. With the increasing popularity of mobile devices, PWAs are becoming an essential part of modern web development.</p>\r\n<p><b>Voice User Interface (VUI)</b></p>\r\n<p>The rise of virtual assistants such as Alexa, Siri, and Google Assistant has led to the increasing use of VUI in web development. VUI is a technology that allows users to interact with websites through voice commands, rather than through a traditional graphical user interface. Incorporating VUI into your website can help to improve accessibility and user experience.</p>\r\n<p><b>Dark Mode</b></p>\r\n<p>Dark mode is a trend that has gained popularity in recent years. It involves changing the color scheme of a website to use darker colors such as black, dark blue, or dark gray instead of the traditional white background. This can help to reduce eye strain, especially when using devices in low light environments. Dark mode also has a modern, sleek look that can give your website an edge over competitors.</p>\r\n<p><b>Motion Design</b></p>\r\n<p>Motion design involves using animation and other visual effects to create a more engaging user experience. It can include things like hover animations, scrolling animations, and loading animations. By incorporating motion design into your website, you can make it more interactive and engaging for users.</p>\r\n<p><b>Artificial Intelligence (AI)</b></p>\r\n<p>AI has become increasingly popular in web development, with applications such as chatbots, recommendation engines, and personalization becoming more common. By using AI, you can create a more personalized experience for users, helping to increase engagement and conversions.</p>\r\n<p>In conclusion, web development is an ever-evolving field, and staying on top of the latest trends is essential to creating websites that are both functional and visually appealing. Incorporating some of these latest trends, such as PWAs, VUI, dark mode, motion design, and AI, can help boost your online presence and give your website a competitive edge.</p>', NULL, 1, NULL, 'storage/posts/1677754090.jpg', '2023-03-03', '2023-03-02 10:48:10', '2023-03-02 10:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_collections`
--

CREATE TABLE `product_collections` (
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Super Admin', '2019-03-28 06:21:03', '2019-03-28 06:21:03'),
(2, 'Admin', 'Admin', '2019-08-08 16:03:49', '2019-08-08 16:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_key`) VALUES
(1, 'add_admin'),
(1, 'add_attribute'),
(1, 'add_bread'),
(1, 'add_collection'),
(1, 'add_ecommerce'),
(1, 'add_menu'),
(1, 'add_product'),
(1, 'add_role'),
(1, 'add_site_setting'),
(1, 'add_tag'),
(1, 'browse_admin'),
(1, 'browse_attribute'),
(1, 'browse_bread'),
(1, 'browse_collection'),
(1, 'browse_dashboard'),
(1, 'browse_ecommerce'),
(1, 'browse_menu'),
(1, 'browse_product'),
(1, 'browse_role'),
(1, 'browse_setting'),
(1, 'browse_site_setting'),
(1, 'browse_tag'),
(1, 'change_email'),
(1, 'change_password'),
(1, 'change_status'),
(1, 'delete_admin'),
(1, 'delete_attribute'),
(1, 'delete_bread'),
(1, 'delete_collection'),
(1, 'delete_ecommerce'),
(1, 'delete_menu'),
(1, 'delete_product'),
(1, 'delete_role'),
(1, 'delete_site_setting'),
(1, 'delete_tag'),
(1, 'edit_admin'),
(1, 'edit_attribute'),
(1, 'edit_bread'),
(1, 'edit_collection'),
(1, 'edit_ecommerce'),
(1, 'edit_menu'),
(1, 'edit_product'),
(1, 'edit_role'),
(1, 'edit_site_setting'),
(1, 'edit_tag'),
(1, 'logo_site_setting'),
(1, 'read_admin'),
(1, 'read_attribute'),
(1, 'read_bread'),
(1, 'read_collection'),
(1, 'read_ecommerce'),
(1, 'read_menu'),
(1, 'read_product'),
(1, 'read_role'),
(1, 'read_site_setting'),
(1, 'read_tag');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `description`, `logo`, `favicon`, `email`, `contact_no`, `country`, `state`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'AR Technology', 'Partner with an award-winning app development company to take your brick-and-mortar business online and reach a wider audience with powerful mobile and web solutions.', 'storage/site-setting/default-logo.png', 'storage/site-setting/default-favicon.png', 'info@artechnology.in', '+91 8109763160', 'India', 'Delhi', 'New Delhi', '95-B DDA Flat Mata Suntri Road\r\nNew Delhi-110002', '2022-06-26 15:46:11', '2023-02-16 14:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asif Jamal', 'asif.sanix@gmail.com', NULL, '$2y$10$wW779oAEb4cJOh/Xpej9iOevq/0KcVAKTsB5jRoR4VHkwfpzUp2L2', NULL, 1, '2023-02-14 07:39:43', '2023-02-14 07:39:43'),
(2, 'Sana', 'sana@gmail.com', NULL, '$2y$10$Y7fn5sAmZ47VXEPZjPql0e3PhuIl.dx/2x.YN/TW5S56SD83Y8v8m', NULL, 1, '2023-02-14 11:55:45', '2023-02-14 11:55:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`slug`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`permission_key`);

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
-- Indexes for table `product_collections`
--
ALTER TABLE `product_collections`
  ADD KEY `collection_id` (`collection_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD UNIQUE KEY `role_id_2` (`role_id`,`permission_key`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_collections`
--
ALTER TABLE `product_collections`
  ADD CONSTRAINT `product_collections_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_collections_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
