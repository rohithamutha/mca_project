-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 03:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshblooms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL DEFAULT '1',
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `user_id`, `product_id`, `quantity`, `status`) VALUES
(9, '2', '3', '1', 'Delivered'),
(10, '2', '4', '3', 'Delivering'),
(11, '2', '25', '2', 'Delivering'),
(12, '2', '12', '5', 'Delivered'),
(13, '1', '4', '1', 'added'),
(15, '1', '7', '1', 'added'),
(16, '23', '4', '1', 'Delivering'),
(17, '23', '5', '2', 'Delivering'),
(26, '1', '6', '3', 'added'),
(29, '2', '4', '2', 'Delivered'),
(30, '2', '3', '1', 'added'),
(31, '2', '4', '1', 'added'),
(32, '2', '25', '1', 'added'),
(33, '2', '33', '1', 'added'),
(34, '10', '3', '1', 'Delivering'),
(35, '10', '17', '1', 'Delivering'),
(38, '24', '22', '1', 'Delivering'),
(39, '24', '1', '1', 'Delivered'),
(40, '23', '3', '1', 'Delivering'),
(41, '23', '6', '1', 'Delivered'),
(42, '10', '16', '1', 'Delivering');

-- --------------------------------------------------------

--
-- Table structure for table `designsales`
--

CREATE TABLE `designsales` (
  `id` int(255) NOT NULL,
  `flowerlist` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `delivery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `date`) VALUES
(3, 'rohith', 'rohith@gmail.com', 'test', '2025-01-06'),
(4, 'ak', 'ak@gmail.com', 'test', '2025-01-06'),
(10, 'vel', 'vel@gmail.com', 'tested', '2025-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `finalpayment`
--

CREATE TABLE `finalpayment` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finalpayment`
--

INSERT INTO `finalpayment` (`id`, `user_id`, `firstname`, `lastname`, `address`, `city`, `country`, `pincode`, `mobile`, `email`, `product_details`, `total_amount`, `payment_id`, `payment_status`, `created_at`) VALUES
(1, '1', 'Rohit', 'S', 'Chennai', 'Chennai', 'inida', '23456789', '123456789', 'rohith@gmail.com', '[{\"product_id\":\"13\",\"product_name\":\"Chrysanthemums\",\"price\":\"180\",\"quantity\":\"1\"},{\"product_id\":\"15\",\"product_name\":\"Aster\",\"price\":\"100\",\"quantity\":\"1\"},{\"product_id\":\"26\",\"product_name\":\"Globe Amaranth\",\"price\":\"120\",\"quantity\":\"3\"}]', '690', 'pay_PhDbSbW0c2TYas', 'Success', '2025-01-08 04:49:36'),
(2, '2', 'Aakash', ' Ranga', 'Chennai', 'chennai', 'india', '600056', '9787274363', 'ak@gmail.com', '[{\"product_id\":\"9\",\"product_name\":\" Musk Rose\",\"price\":\"130\",\"quantity\":\"1\"},{\"product_id\":\"10\",\"product_name\":\"Chrysanthemums\",\"price\":\"180\",\"quantity\":\"3\"},{\"product_id\":\"11\",\"product_name\":\"Hibiscus \",\"price\":\"50\",\"quantity\":\"2\"},{\"product_id\":\"12\",\"pr', '1420', 'pay_PhDbSbW0c2g1wR', 'Success', '2025-01-09 04:49:27'),
(4, '1', 'Rohit', 'S', 'chennai', 'Chennai', 'inida', '600056', '9787274360', 'rohith@gmail.com', '[{\"product_id\":\"9\",\"product_name\":\" Musk Rose\",\"price\":\"130\",\"quantity\":\"1\"},{\"product_id\":\"10\",\"product_name\":\"Chrysanthemums\",\"price\":\"180\",\"quantity\":\"3\"},{\"product_id\":\"11\",\"product_name\":\"Hibiscus \",\"price\":\"50\",\"quantity\":\"2\"},{\"product_id\":\"12\",\"pr', '1780', 'pay_PhDbSbW0c2gTT', 'Success', '2025-01-09 07:38:59'),
(5, '10', 'vel', 'a', 'chennai', 'Chennai', 'inida', '600056', '123454567', 'vel@gmail.com', '[{\"product_id\":\"34\",\"product_name\":\" Musk Rose\",\"price\":\"130\",\"quantity\":\"1\"},{\"product_id\":\"35\",\"product_name\":\"Autumn Crocus\",\"price\":\"150\",\"quantity\":\"1\"}]', '330', 'pay_PhDYYbW0c2gnhY', 'Success', '2025-01-09 04:49:04'),
(6, '24', 'Gokul', 'D', 'Chennai', 'Chennai', 'India', '600056', '123456789', 'gokul@gmail.com', '[{\"product_id\":\"38\",\"product_name\":\"Lotus\",\"price\":\"80\",\"quantity\":\"1\"},{\"product_id\":\"39\",\"product_name\":\"Blanket Flower\",\"price\":\"150\",\"quantity\":\"1\"}]', '280', 'pay_PhDbSbW0c2gnhZ', 'Success', '2025-01-09 00:18:32'),
(7, '23', 'yoga', 's', 'chennai', 'Chennai', 'inida', '600056', '12345678', 'yoga@gmail.com', '[{\"product_id\":\"16\",\"product_name\":\"Chrysanthemums\",\"price\":\"180\",\"quantity\":\"1\"},{\"product_id\":\"17\",\"product_name\":\"Bougainvillea\",\"price\":\"150\",\"quantity\":\"2\"}]', '530', 'pay_PhDyuZt117YLpt', 'Success', '2025-01-09 00:40:46'),
(8, '23', 'yogesh', 'T', 'Chennai', 'Chennai', 'India', '600056', '12345678', 'yoga@gmail.com', '[{\"product_id\":\"40\",\"product_name\":\" Musk Rose\",\"price\":\"130\",\"quantity\":\"1\"},{\"product_id\":\"41\",\"product_name\":\"Globe Amaranth\",\"price\":\"120\",\"quantity\":\"1\"}]', '300', 'pay_PhEcHn20Oh7Bw7', 'Success', '2025-01-09 05:48:06'),
(9, '10', 'Gopi', 'D', 'chennai', 'Chennai', 'india', '600056', '1234567890', 'gopi@gmail.com', '[{\"product_id\":\"42\",\"product_name\":\"Primrose\",\"price\":\"100\",\"quantity\":\"1\"}]', '150', 'pay_PhEjBdILZ1jAPK', 'Success', '2025-01-09 05:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `flowersales`
--

CREATE TABLE `flowersales` (
  `id` int(255) NOT NULL,
  `flowername` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `delivary` varchar(255) NOT NULL,
  `seasonal_flowers` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flowersales`
--

INSERT INTO `flowersales` (`id`, `flowername`, `category`, `country`, `image`, `price`, `offer`, `delivary`, `seasonal_flowers`, `description`) VALUES
(1, 'Blanket Flower', 'flowers', '', 'blanket.webp', '150', '20', '2 Days', 'summer', 'These summer flowers are a great addition to flower beds and gardens. Available in a striking contrast of red and yellow colors, these garden flowers are known for their ease of naturalizing and minimal care.'),
(3, ' Musk Rose', 'flowers', '', 'musk rose.webp', '130', '25', '2 Days', 'summer', 'Musk Roses or Shrub Roses are defined as the category of hardy, low-maintenance plants that boast bushy roses. Excellent as ground covers, hedges or screening in landscapes, Musk Roses are a must have in an Indian summer garden.'),
(4, 'Chrysanthemums', 'flowers', '', 'Chrysanthemums.webp', '180', '30', '2 Days', 'summer', 'Also commonly called &quot;Mums&quot;, these stunning summer flowering plants are beloved for their unparalleled aesthetics and meaningful significance. These fascinating blooms grow in abundance and can brighten up your garden with exemplary colors. '),
(5, 'Bougainvillea', 'flowers', '', 'Bougainvillea.webp', '150', '50', '2 Days', 'summer', 'Bougainvillea offers round and brilliant blooms to a summer garden. These thorny evergreen shrubs boast vibrant blooming flowers that are often observed in pink, orange, crimson, yellow or purple colors. '),
(6, 'Globe Amaranth', 'flowers', '', 'Globe Amaranth.webp', '120', '10', '2 Days', 'summer', 'Grown primarily as a decorative flower, Globe Amaranth is an excellent food crop too. Fun and exciting, it adds a little bit of uniqueness to an otherwise dull kitchen garden. It is loved by garden pollinators like birds and butterflies.'),
(7, 'Aster', 'flowers', '', 'Aster.webp', '100', '25', '2 Days', 'winter', 'Aster is not just a beautiful winter flower to grow but also an excellent cut flower. The flower heads come in many different sizes, types &amp; colors, giving you more of a variety to choose from and grow.\r\n'),
(8, 'Clarkia', 'flowers', '', 'Clarkia.webp', '120', '10', '2 Days', 'winter', 'This is a hardy annual flowering plant with slender branches &amp; attractive long spikes of flowers. It can be grown as a pot plant as well as a ground plant.          '),
(9, 'Calendula', 'flowers', '', 'Calendula (Pot Marigold).webp', '160', '40', '2 Days', 'winter', 'Calendula are great winter plants that produce flowers varying from a straw color to deep orange. This single or double flowering plant is also very useful for bedding, potting, for window boxes.'),
(10, 'Pansy', 'flowers', '', 'Pansy.webp', '100', '25', '2 Days', 'winter', 'As stunning flowers that grow in winter seasons, the beautiful butterfly-like flowers are available in almost all shades of colors &amp; their combinations &amp; blotched, variegated, marked, stripped in contrasting colors. '),
(11, 'Phlox', 'flowers', '', 'Phlox.webp', '170', '50', '2 Days', 'winter', 'One of the most well-known &amp; favorite annuals grown for their brilliant displays and long-lasting blooming period. These winter flowers are delicately scented with a wide range of colors and many have contrasting ‘eyes.'),
(12, 'Jasmine', 'flowers', '', 'Jasmine.jpg', '120', '25', '2 Days', 'spring', 'This fragrant flowering plant is often used in Indian weddings and festivals. The delicate white flowers that bloom in the spring and summer, release a heady fragrance that is most potent at night, embracing the garden. '),
(13, 'Sunflower', 'flowers', '', 'Sunflower.jpg', '100', '10', '2 Days', 'spring', 'It’s no surprise that sunflowers thrive best in direct sunlight and a we    ll-draining soil mixture. They have large, disk-shaped heads and bright yellow petals and are considered one of the best spring season flowers in India. '),
(14, 'Marigold', 'flowers', '', 'Marigold.jpg', '120', '25', '2 Days', 'spring', 'Known for its striking orange and yellow hue, this spring flower can brighten any garden space. Blooming profusely in the spring, Marigolds are revered for festive significance, spreading warmth and cheer in celebrations. '),
(15, 'Crocus', 'flowers', '', 'Crocus.jpg', '120', '25', '2 Days', 'spring', 'Another early bloomer, Crocus, is popular for its delicate cup-shaped flowers with pointed petals and vibrant hues, from purple and yellow to white. Plant them in the ground in the fall to watch these flowers bloom in spring.'),
(16, 'Primrose', 'flowers', '', 'Primrose.jpg', '100', '20', '2 Days', 'spring', 'These charming perennials are early spring season flowers, lighting the garden with soft, pastel hues. These delicate blossoms prefer the cold, gentle days of early spring. There are countless varieties, so choose the one best suited to your area.'),
(17, 'Autumn Crocus', 'flowers', '', 'Autumn Crocus.webp', '150', '25', '2 Days', 'autumn', 'As other plants begin to fade, the delicate, cup-shaped autumn crocuses emerge directly from the ground without any foliage, seemingly appearing out of nowhere.\r\nThey come in a delightful range of colours, including shades of purple, pink, and white.'),
(18, 'Cyclamen', 'flowers', '', 'Cyclamen.webp', '160', '50', '2 Days', 'autumn', 'With elegantly swept-back petals in shades of pink, purple, and white, cyclamens look like graceful shooting stars, adding an element of magic to any setting.\r\nIn the language of flowers, they represent resignation and goodbye. '),
(19, 'Zinnia', 'flowers', '', 'Zinnia.webp', '150', '20', '2 Days', 'autumn', 'Zinnias come in different shapes, with single, double, and dahlia-like blooms, and in many colours from bold reds and oranges to soft pinks, purples, and sunny yellows.Native to Mexico and the southwestern United States, zinnias .'),
(20, 'Clematis', 'flowers', '', 'Clematis.webp', '180', '10', '2 Days', 'autumn', 'Clematis flowers come in a wide variety of shapes and colours, ranging from delicate bell-shaped blooms to star-like and saucer-shaped flowers in shades of white, pink, purple, and blue.\r\n'),
(21, 'Coneflower', 'flowers', '', 'Coneflower.webp', '100', '10', '2 Days', 'autumn', 'Coneflowers (also known as echinacea), are known for their distinctive cone-shaped centres surrounded by ray-like petals in colours like pink, purple, white, and orange. They look a lot like daisies with a unique and bold twist.\r\n'),
(22, 'Lotus', 'flowers', '', 'Lotus.webp', '80', '10', '2 Days', 'monsoon', 'These are among some of the best plants to grow in monsoon in India. Here, the Lotus is often seen as the herald of the rainy season. If you have the facility of a small pond in your garden, then do plant a Lotus.'),
(23, 'Cape Jasmine', 'flowers', '', 'Cape Jasmine.webp', '100', '20', '2 Days', 'monsoon', 'Want to enhance the aromas of your garden.Then you should be planting the Cape Jasmine. Its pearly white blooms can grow to be quite large and make your garden look beautiful. The fragrance of this flower is unique and just sweetens up the surroundings. '),
(24, ' Dew Flower', 'flowers', '', 'Dew Flower.webp', '150', '10', '2 Days', 'monsoon', 'Commelina Benghalensis or the Dew Flower is the last monsoon season flower on our list. But it is equally beautiful! Just imagine yellow, orange or blue flowers dotted around your garden, celebrating the mood of the rainy season.'),
(25, 'Hibiscus ', 'flowers', '', 'Hibiscus.webp', '50', '10', '2 Days', 'All Season', 'Charming and alluring, the Hibiscus shrub, with its deep green leaves and colorful, trumpet-shaped flowers is a standout in any garden. They are pretty easy to grow, and yet they bloom very generousl.'),
(32, ' Birthday Bloom Bouquet', 'design', 'India', 'image 3.jpg', '2000', '20', '2 Days', 'Birthday', 'A vibrant and cheerful bouquet made with seasonal flowers like roses, lilies, daisies, and carnations in bright colors (yellow, pink, orange). '),
(33, 'Luxury Box of Roses', 'design', '', '1734501245_image 17.jpg', '3000', '25', '2 Days', 'Birthday', ' Roses (classic red, pink, or white) elegantly arranged in a luxury box, often paired with a ribbon or glitter.         '),
(34, 'Pastel Birthday Bliss', 'design', '', '1734505711_image 13.jpg', '4000', '25', '2 Days', 'Birthday', ' Soft pastel flowers such as hydrangeas, pink roses, and white lilies, arranged in a delicate and dreamy style. '),
(35, ' Sunshine Bouquet', 'design', '', '1734505827_image 14.jpg', '5000', '25', '2 Days', 'Birthday', 'Bright yellow flowers like sunflowers, yellow roses, and daffodils, symbolizing happiness and positivity, perfect for a cheerful birthday vibe.'),
(36, 'Personalized Floral Alphabet', 'design', '', '1734505922_image 2.jpg', '2500', '20', '2 Days', 'Birthday', 'Flowers arranged in the shape of the birthday person’s initial. Flowers like roses, carnations, or daisies are densely packed to create the letter.'),
(37, ' Tropical Fiesta', 'design', '', 'image 7.jpg', '3500', '10', '2 Days', 'Birthday', 'Exotic tropical flowers like orchids, anthuriums, and heliconias arranged in a bold and lively style. Great for vibrant birthday parties.'),
(38, ' Classic Rose Wedding Bouquet', 'design', '', 'image 9.jpg', '10000', '25', '2 Days', 'Wedding', 'A timeless bouquet made with elegant roses in various colors (white, blush pink, or red) often paired with baby’s breath or greenery like eucalyptus. The arrangement is perfect for a classic, romantic wedding.'),
(39, 'Tropical Wedding Paradise', 'design', '', '1734506381_image 14.jpg', '20000', '50', '2 Days', 'Wedding', 'Bold, exotic flowers like orchids, hibiscus, and bird of paradise combined with lush tropical greenery. Perfect for beach or destination weddings with a vibrant, lively atmosphere.'),
(40, 'Bohemian Chic Floral Arch', 'design', '', 'image 1.jpg', '15000', '20', '2 Days', 'Wedding', 'A whimsical and free-spirited floral arch made with wildflowers like sunflowers, lavender, daisies, and foliage. This design creates a relaxed and natural wedding vibe, ideal for outdoor ceremonies.'),
(41, 'Ethereal Floral Crown', 'design', '', '1734506558_image 2.jpg', '30000', '25', '2 Days', 'Wedding', 'A delicate flower crown made with soft blooms like baby&#039;s breath, roses, and peonies. Often worn by the bride or flower girls, this design brings an ethereal and romantic feel to the wedding.                         '),
(42, 'Vintage Rose', 'design', '', 'image 8.jpg', '25000', '20', '2 Days', 'Wedding', 'A vintage-inspired bouquet featuring a mix of old-world roses, peonies, and hydrangeas. This design brings a touch of elegance and romance, often accented with lace or satin ribbons.                          '),
(43, 'Gold Wedding Flowers', 'design', '', 'image 6.jpg', '27000', '20', '2 Days', 'Wedding', 'Soft blush pink roses and peonies combined with gold accents such as gold-dipped leaves, floral wire, or ribbons. This chic and modern design suits luxurious weddings.                          '),
(46, 'Rose', 'flowers', '', 'rose.jpg', '70', '15', '2 Days', 'All Season', ' A rose is a beautiful flower that comes in many colors like red, pink, white, yellow, and orange. It has soft, rounded petals and sharp thorns on its stem. Roses usually bloom in spring and summer, but some types can bloom all year in warm places.'),
(47, 'Plumeria', 'flowers', '', 'plumeria.jpg', '190', '20', '2 Days', 'all Season', 'Plumeria is a fragrant, tropical flower that is often seen in warm, sunny climates. Known for its beautiful, waxy petals, it comes in colors such as white, yellow, pink, and red.                           ');

-- --------------------------------------------------------

--
-- Table structure for table `order_request`
--

CREATE TABLE `order_request` (
  `id` int(11) NOT NULL,
  `flower_design_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_request`
--

INSERT INTO `order_request` (`id`, `flower_design_name`, `description`, `name`, `address`, `mobile_no`) VALUES
(1, 'malli', 'The Malli flower is a small, fragrant white flower with a sweet scent, blooming mostly in summer. It has star-shaped petals and glossy green leaves', 'vignesh', '3,anna nagar,chennai', '8937564728'),
(6, 'jasmine', 'test', 'siva', '33,walaja,ranipet', '3757576765'),
(9, 'Malli', 'I need bulk quantity of malli poo', 'vel', 'kdnkdsnsd', '1234567890'),
(10, 'Malli', 'I need bulk quantity of malli poo', 'vel', 'kdnkdsnsd', '123456098');

-- --------------------------------------------------------

--
-- Table structure for table `userdeatils`
--

CREATE TABLE `userdeatils` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdeatils`
--

INSERT INTO `userdeatils` (`id`, `name`, `email`, `password`, `phone_no`, `usertype`) VALUES
(1, 'Roh', 'roh@gmail.com', '123', '7839583769', '1'),
(2, 'Aakash', 'ak@gmail.com', '123', '7867867876', '1'),
(10, 'vel', 'vel@gmail.com', '123', '2343678484', '1'),
(23, 'yoga', 'yoga@gmail.com', '123', '123557844', '1'),
(24, 'gokul', 'gokul@gmail.com', '123', '3634736663768', '1'),
(25, 'Rohith', 'rohith@gmail.com', '123', '3634736663768', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `designsales`
--
ALTER TABLE `designsales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalpayment`
--
ALTER TABLE `finalpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flowersales`
--
ALTER TABLE `flowersales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_request`
--
ALTER TABLE `order_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdeatils`
--
ALTER TABLE `userdeatils`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `designsales`
--
ALTER TABLE `designsales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `finalpayment`
--
ALTER TABLE `finalpayment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flowersales`
--
ALTER TABLE `flowersales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_request`
--
ALTER TABLE `order_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdeatils`
--
ALTER TABLE `userdeatils`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
