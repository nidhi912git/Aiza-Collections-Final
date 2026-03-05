-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2026 at 03:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aizacollections`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_num` int(11) DEFAULT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `stock_qty` int(11) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_num`, `product_code`, `product_name`, `description`, `price`, `color`, `stock_qty`, `is_featured`, `is_active`) VALUES
(47, 5, '1', 'Black Heritage Handblock Kurta Set with Dupatta', 'This kurta set features a black base colour accented with off-white and olive floral handblock prints in an all-over booti pattern. Designed with a comfortable straight-fit silhouette, it comes paired with matching bottoms and a coordinated printed dupatta. A versatile ethnic ensemble suitable for everyday wear, office styling, and casual festive occasions.', 2000.00, 'Black', 10, 0, 1),
(56, 5, '10', 'Rose Garden Floral Printed Kurta Set', 'This kurta set features a soft ivory base colour highlighted with bright pink and leafy green floral handblock prints arranged in a classic all-over pattern. Paired with matching printed bottoms and a coordinated dupatta finished with bold pink borders and floral detailing, the ensemble offers a vibrant yet graceful ethnic look, making it perfect for daytime wear, festive gatherings, and cheerful summer occasions.', 1500.00, 'White', 10, 0, 1),
(57, 5, '11', 'Wine Booti Handblock Kurta Set', 'This kurta set features a deep wine base colour highlighted with off-white booti handblock prints arranged in a traditional all-over pattern. Paired with matching printed bottoms and a coordinated dupatta detailed with intricate motifs and contrasting border accents, the ensemble offers a rich, elegant ethnic look that is perfect for workwear, festive gatherings, and evening occasions.', 1500.00, 'Deep maroon', 10, 0, 1),
(58, 5, '12', 'Rani Pink Floral Ethnic Kurta Set', 'This kurta set features a vibrant hot pink base colour highlighted with off-white floral handblock prints arranged in a bold all-over pattern. Paired with matching striped bottoms and a coordinated dupatta detailed with diagonal stripe accents and floral border detailing, the ensemble offers a lively yet graceful ethnic look, making it perfect for festive occasions, daytime celebrations, and cheerful summer wear.', 1500.00, 'Rani pink', 10, 0, 1),
(59, 5, '13', 'Beige Maroon Booti Handblock Kurta Set', 'This Angrakha-style V-neck kurta set features a soft beige base colour highlighted with deep maroon booti handblock prints arranged in a classic all-over pattern. Paired with matching printed bottoms and a coordinated dupatta detailed with intricate motifs and rich border accents, the ensemble offers a warm, elegant ethnic look, making it ideal for everyday wear, festive gatherings, and traditional occasions.', 1500.00, 'Baige', 10, 0, 1),
(60, 5, '14', 'Beige Maroon Paisley Handblock Kurta Set', 'This kurta set features a soft beige base colour highlighted with deep maroon paisley handblock prints arranged in a traditional all-over pattern. Paired with matching printed bottoms and a coordinated dupatta showcasing geometric motifs and rich maroon border detailing, the ensemble offers a warm, classic ethnic look, making it suitable for everyday wear, cultural gatherings, and festive occasions.', 1500.00, 'Baige', 10, 0, 1),
(61, 5, '15', 'Paisley Beige Kurta Set with Dupatta', 'This kurta set features a soft beige base colour highlighted with big deep maroon paisley handblock prints accented by fine dotted detailing. Paired with matching printed bottoms and a coordinated dupatta showcasing bold paisley motifs and rich border accents, the ensemble offers a refined and traditional ethnic look, making it ideal for everyday wear, cultural gatherings, and light festive occasions.', 1500.00, 'Baige', 10, 0, 1),
(62, 5, '16', 'Terracotta Geometric Print Kurta Set', 'This kurta set features a rich rust orange base colour highlighted with soft peach star-inspired geometric handblock motifs arranged in a balanced all-over pattern. Designed with a notched V-neckline and subtle embroidery detailing, it is paired with matching bottoms and a coordinated dupatta finished with clean border accents. The ensemble offers a warm, earthy ethnic appeal, making it ideal for everyday wear, festive gatherings, and seasonal celebrations.', 2000.00, 'Orange', 10, 0, 1),
(63, 5, '17', 'Burgundy Bloom Printed Kurta Set', 'This kurta set features a rich wine base colour highlighted with beige floral handblock prints arranged in an elegant all-over pattern. Designed with a V-neckline and subtle border detailing, it is paired with matching printed bottoms and a coordinated dupatta showcasing diagonal stripe motifs and traditional border accents. The ensemble offers a graceful blend of comfort and classic ethnic charm, making it ideal for everyday wear, festive gatherings, and evening occasions.', 2000.00, 'Burgundy ', 10, 0, 1),
(64, 5, '18', 'Deep Blue Floral Handblock Kurta Set', 'This kurta set features a deep midnight blue base colour highlighted with soft beige floral handblock prints arranged in an elegant all-over pattern. Designed with a V-neckline and subtle border detailing, it is paired with matching printed bottoms and a coordinated dupatta showcasing geometric stripe motifs and traditional border accents. The ensemble offers a refined balance of comfort and classic ethnic charm, making it ideal for everyday wear, workwear styling, and evening gatherings.', 1500.00, 'Dark blue', 10, 0, 1),
(65, 5, '19', 'Rose Pink Floral Handblock Kurta Set', 'This kurta set features a soft rose pink base colour highlighted with off-white floral handblock prints arranged in a delicate all-over pattern. Designed with a notched round neckline and subtle printed detailing, it is paired with matching bottoms and a coordinated dupatta finished with floral motifs and classic border accents. The ensemble offers a graceful and comfortable ethnic look, making it ideal for everyday wear, daytime outings, and light festive occasions.', 1500.00, 'Pink', 10, 0, 1),
(48, 5, '2', 'Black Rust Floral Handblock Kurta Set', 'This kurta set features a black base colour highlighted with rust red and off-white floral handblock prints arranged in an all-over booti pattern. Paired with matching bottoms and a coordinated printed dupatta with traditional border detailing, the ensemble offers a perfect balance of comfort and ethnic elegance, making it suitable for everyday wear, office use, and casual festive occasions.', 1500.00, 'Black', 10, 0, 1),
(66, 5, '20', 'Sunshine Yellow Ethnic Handblock Kurta Set', 'This kurta set features a soft sunshine yellow base colour highlighted with mustard yellow floral handblock prints arranged in a graceful all-over pattern. Designed with a round neckline and three-quarter sleeves, it is paired with matching printed bottoms and a coordinated dupatta finished with delicate border detailing. The ensemble offers a fresh, cheerful ethnic look that is perfect for daytime wear, summer outings, and light festive occasions.', 1500.00, 'Yellow', 10, 0, 1),
(67, 5, '21', 'Plum Motif Print Ethnic Kurta Set', 'This kurta set features a rich wine maroon base colour highlighted with off-white geometric and mandala-inspired handblock prints arranged in a balanced, traditional pattern. Designed with a round neckline with printed placket detailing, it is paired with matching bottoms and a coordinated dupatta showcasing intricate all-over motifs and classic border accents. The ensemble offers a refined ethnic appeal with comfortable wearability, making it ideal for festive occasions, cultural gatherings, and elegant day events.', 1500.00, 'Maroon', 10, 0, 1),
(68, 5, '22', 'Deep Teal Motif Handblock Kurta Set', 'This kurta set features a deep teal base colour highlighted with off-white mandala and geometric handblock prints arranged in a bold, symmetrical pattern. Designed with a round neckline and printed placket detailing, it is paired with matching bottoms and a coordinated dupatta showcasing intricate all-over motifs and traditional border accents. The ensemble offers a refined blend of elegance and comfort, making it ideal for festive occasions, cultural gatherings, and sophisticated day wear.', 1500.00, 'Teal', 10, 0, 1),
(69, 5, '23', 'Olive Green Motif Handblock Kurta Set', 'This kurta set features a rich olive green base colour highlighted with off-white mandala and geometric handblock prints arranged in a bold yet balanced pattern. Designed with a round neckline with printed placket detailing and three-quarter sleeves, it is paired with matching bottoms and a coordinated dupatta finished with intricate all-over motifs and traditional border accents. The ensemble offers a timeless ethnic appeal with effortless comfort, making it ideal for festive occasions, cultural gatherings, and elegant daytime wear.', 1500.00, 'Green', 10, 1, 1),
(70, 5, '24', 'Midnight Blue Motif Handblock Kurta Set', 'This kurta set features a deep midnight blue base colour accented with off-white mandala and geometric handblock prints that create a striking yet refined contrast. Designed with a round neckline enhanced by a printed placket, three-quarter sleeves, and matching straight-fit bottoms, the look is completed with a coordinated dupatta detailed with intricate all-over motifs and traditional borders. Timeless and graceful, this ensemble blends classic craftsmanship with modern elegance, making it perfect for festive gatherings, cultural occasions, and sophisticated daywear.', 1500.00, 'Blue', 10, 0, 1),
(71, 5, '25', 'Midnight Black Ajrakh Print Kurta Set', 'This kurta set features a rich black base colour beautifully highlighted with deep maroon and beige Ajrakh-inspired prints that lend it a timeless ethnic charm. The kurta is designed with a round neckline accented by an intricately printed yoke, three-quarter sleeves, and coordinated straight-fit bottoms finished with matching borders. The look is completed with a contrast dupatta showcasing geometric patterns and traditional borders, adding depth and elegance. Sophisticated yet effortless, this ensemble is ideal for festive occasions, cultural gatherings, and refined everyday wear.', 1500.00, 'Black', 10, 0, 1),
(72, 5, '26', 'Maroon Heritage Motif Kurta Set with Dupatta', 'This kurta set comes in a rich deep wine hue, enhanced with intricate Ajrakh-inspired prints that bring a refined traditional appeal. The kurta features a round neckline with an ornate printed yoke, three-quarter sleeves detailed with coordinated borders, and straight-fit pants finished with matching hems. Complementing the look is a statement dupatta adorned with diagonal stripes, ethnic motifs, and contrasting borders, adding movement and visual depth. Graceful yet contemporary, this ensemble is perfect for festive occasions, ethnic gatherings, and elegant day-to-evening wear.', 1500.00, 'Maroon', 10, 0, 1),
(73, 5, '27', 'Rust Ember Ajrakh-Inspired Kurta Set', 'This kurta set features a deep rust base color, beautifully highlighted with fine Ajrakh-inspired geometric prints in complementary earthy tones. The kurta is designed with a classic round neckline accented by a printed yoke, adding subtle structure and traditional charm. Paired with straight-fit pants carrying coordinated micro motifs, the ensemble is completed with a richly detailed dupatta showcasing intricate borders and patterned panels that enhance its ethnic appeal. Sophisticated yet graceful, this set is ideal for festive evenings, cultural gatherings, and elegant ethnic occasions.', 1500.00, 'Red', 10, 0, 1),
(74, 5, '28', 'Midnight Noir Ajrakh-Inspired Kurta Set', 'This elegant kurta set is crafted in a deep black base color, elevated with fine Ajrakh-inspired micro prints in warm earthy tones. The kurta features a classic round neckline with a delicately printed yoke, adding subtle structure and traditional detailing. Coordinated straight-fit pants echo the same intricate pattern, while the look is completed with a statement dupatta adorned with geometric motifs, striped panels, and ornate borders. Timeless and sophisticated, this ensemble is perfect for festive evenings, cultural occasions, and graceful ethnic wear moments.', 1500.00, 'Black', 10, 0, 1),
(75, 5, '29', 'Terracotta Bandhej Kurta Set with Dupatta', 'This kurta set is crafted in a warm terracotta base color, highlighted with classic Bandhej-inspired tie-dye motifs that lend a vibrant ethnic charm. The kurta features a round neckline with a subtle printed yoke, creating a balanced blend of simplicity and tradition. Paired with straight-fit pants detailed with coordinated Bandhej patterns, the look is completed by a light, flowy dupatta adorned with all-over tie-dye prints and soft tassel accents. Effortlessly graceful and comfortable, this ensemble is ideal for festive days, casual celebrations, and elegant everyday ethnic wear.', 1500.00, 'orange', 10, 0, 1),
(49, 5, '3', 'Blush Pink Floral Handblock Kurta Set', 'This kurta set features a soft blush pink base colour highlighted with ivory and muted grey floral handblock prints arranged in a delicate all-over pattern. Paired with matching bottoms and a coordinated printed dupatta with subtle stripe detailing, the ensemble offers a fresh, elegant look ideal for everyday wear, summer outings, and light festive occasions.', 1500.00, 'Baby pink', 10, 0, 1),
(76, 5, '30', 'Olive Bandhej Kurta Set with Dupatta', 'This elegant kurta set comes in a deep olive green base color, beautifully highlighted with ivory Bandhej-inspired tie-dye patterns that create a rich, traditional appeal. The kurta features a soft round neckline with printed detailing at the yoke, adding visual interest without overpowering the look. It is paired with matching straight pants that carry coordinated Bandhej motifs for a seamless finish. The ensemble is completed with a flowy dupatta adorned with delicate dotted tie-dye accents and subtle border detailing, giving it a graceful drape. Understated yet striking, this set is perfect for festive gatherings, day functions, and refined ethnic styling.', 2000.00, 'olive', 10, 0, 1),
(77, 5, '31', 'Teal Bandhej Print Kurta Set with Dupatta', 'This graceful kurta set features a rich teal blue base color, adorned with ivory Bandhej-inspired circular and dotted motifs that create a striking yet balanced ethnic look. The kurta is designed with a round neckline and subtle yoke detailing, offering a timeless silhouette with everyday comfort. It is paired with matching straight-fit pants that complement the print seamlessly. The look is completed with a flowy dupatta highlighted by all-over Bandhej patterns and a detailed printed border, adding depth and movement to the ensemble. Perfect for festive mornings, casual celebrations, or refined day wear, this set blends tradition with effortless elegance.', 2000.00, 'Teal', 10, 0, 1),
(78, 5, '32', 'Mustard Bandhej Print Kurta Set with Dupatta', 'This elegant kurta set features a mustard yellow kurta adorned with traditional Bandhej-inspired circular prints. Designed with a round neckline and three-quarter sleeves, it offers a comfortable and flattering fit. The kurta is paired with matching straight-fit pants for a coordinated look. Completing the set is a printed dupatta with delicate Bandhej motifs and a detailed border, adding graceful ethnic charm. Perfect for casual outings, festive gatherings, and daytime celebrations.', 2000.00, 'Yellow', 10, 0, 1),
(79, 5, '33', 'Purple Bandhej Print Kurta Set with Dupatta', 'This graceful kurta set features a deep purple kurta highlighted with traditional Bandhej-inspired circular motifs. Designed with a round neckline and three-quarter sleeves, it offers a comfortable and elegant silhouette. The kurta is paired with matching straight-fit pants for a seamless look. Completing the set is a coordinated Bandhej print dupatta with an intricate border, adding a touch of ethnic charm. Ideal for festive occasions, casual gatherings, and daytime celebrations.', 1500.00, 'Purple', 10, 0, 1),
(80, 5, '34', 'Olive Green Bandhej Print Kurta Set with Dupatta', 'This elegant kurta set features a rich olive green kurta adorned with traditional Bandhej-inspired circular motifs, creating a timeless ethnic appeal. Designed with a round neckline, three-quarter sleeves, and a straight silhouette, it ensures comfort and effortless style. The set is paired with matching printed straight-fit pants and completed with a coordinated Bandhej print dupatta featuring a detailed border, adding depth and grace. Perfect for festive occasions, casual gatherings, and daytime ethnic wear.', 1500.00, 'Green', 10, 0, 1),
(81, 5, '35', 'Wine Purple Ajrakh Print Kurta Set with Dupatta', 'This graceful kurta set features a deep wine purple base highlighted with classic Ajrakh-inspired geometric and circular motifs in contrasting tones. The kurta is styled with a round neckline with printed yoke detailing, three-quarter sleeves, and a straight silhouette for a flattering fit. It comes paired with matching straight-fit pants and a coordinated Ajrakh print dupatta finished with an intricate border, adding richness and balance to the look. Ideal for festive wear, cultural gatherings, and elegant everyday styling.', 1500.00, 'Purple', 10, 1, 1),
(50, 5, '4', 'Soft Pink Booti Handblock Kurta Set', 'This kurta set features a soft pink base colour highlighted with off-white booti handblock prints arranged over subtle vertical stripe detailing. Paired with matching bottoms and a coordinated printed dupatta with traditional motifs, the ensemble offers a graceful and comfortable ethnic look, making it ideal for daily wear, summer outings, and light festive occasions.', 1500.00, 'Baby pink', 10, 0, 1),
(51, 5, '5', 'Teal Floral Handblock Kurta Set', 'This kurta set features a rich teal base colour highlighted with off-white floral handblock prints arranged in a traditional all-over pattern. Paired with matching printed bottoms and a coordinated dupatta with subtle stripe and floral border detailing, the ensemble offers a refreshing blend of comfort and ethnic elegance, making it suitable for everyday wear, workwear styling, and casual festive occasions.', 1500.00, 'Teal/Blue', 10, 0, 1),
(52, 5, '6', 'Baby Pink Booti Handblock Kurta Set', 'This kurta set features a soft baby pink base colour highlighted with off-white booti handblock prints layered over subtle vertical stripe detailing. Paired with matching bottoms and a coordinated printed dupatta adorned with delicate leaf motifs and border accents, the ensemble offers a graceful and comfortable ethnic look, making it ideal for daily wear, summer outings, and light festive occasions.', 1500.00, 'Baby pink', 10, 0, 1),
(53, 5, '7', 'Blush Pink Rose Handblock Kurta Set', 'This kurta set features a soft blush pink base colour highlighted with muted grey and coral floral handblock prints arranged in an elegant all-over pattern. Paired with matching bottoms and a coordinated printed dupatta detailed with subtle stripes and floral accents, the ensemble offers a graceful blend of comfort and charm, making it ideal for everyday wear, summer outings, and light festive occasions.', 1500.00, 'Baby pink', 10, 0, 1),
(54, 5, '8', 'Ocean Blue Booti Handblock Kurta Set', 'This kurta set features an ocean blue base colour highlighted with off-white booti handblock prints arranged in a traditional all-over pattern. Paired with matching printed bottoms and a coordinated dupatta detailed with fine motifs and border accents, the ensemble offers a timeless ethnic appeal with everyday comfort, making it suitable for workwear, casual outings, and light festive occasions.', 1500.00, 'Blue', 10, 0, 1),
(55, 5, '9', 'Soft Rose Garden Handblock Kurta Set', 'This kurta set features a soft ivory base colour highlighted with dusty rose and muted green floral handblock prints arranged in a traditional all-over pattern. Paired with matching bottoms and a coordinated printed dupatta showcasing delicate booti motifs and classic border detailing, the ensemble offers a graceful blend of elegance and comfort, making it ideal for daytime wear, casual gatherings, and light festive occasions.', 1500.00, 'White', 10, 0, 1),
(2, 1, 'A1', 'Aarohi Mustard Anarkali Kurta Set', 'This mustard Anarkali kurta is designed with graceful flare and adorned with delicate all-over prints that add a touch of timeless charm. Crafted in a comfortable, flowy fabric, it comes paired with matching bottoms and a beautifully detailed dupatta featuring soft borders and tassel accents. Perfect for festive gatherings or elegant day occasions, this ensemble blends traditional grace with effortless comfort.', 2500.00, 'Yellow', 10, 1, 1),
(3, 1, 'A2', 'Meher Blue Floral Anarkali Kurta Set', 'This blue floral Anarkali kurta is crafted with a graceful flow and adorned with soft, all-over floral prints that create an elegant, feminine appeal. Designed with a flattering flared silhouette, it comes paired with coordinated bottoms and a matching printed dupatta finished with delicate borders. Ideal for festive days, casual celebrations, or elegant daytime wear, this ensemble offers comfort wrapped in timeless charm.', 2400.00, 'Blue', 10, 0, 1),
(4, 1, 'A3', 'Rangriti Mustard Floral Anarkali Kurta Set', 'This mustard Anarkali kurta features vibrant floral prints accented with soft pink detailing, creating a lively yet elegant look. Designed in a beautifully flared silhouette, it is paired with coordinated printed bottoms and a matching dupatta finished with decorative borders that add a festive charm. Perfect for celebrations, daytime functions, and ethnic gatherings, this ensemble blends comfort with graceful style effortlessly.', 2600.00, 'Yellow', 10, 0, 1),
(5, 1, 'A4', 'Gulnaar Pink Floral Anarkali Kurta Set', 'This pink Anarkali kurta is adorned with graceful floral prints highlighted by subtle grey accents, creating a rich and feminine look. The flared silhouette adds beautiful movement, while the coordinated striped bottoms and matching dupatta with detailed borders complete the ensemble effortlessly. Ideal for festive occasions, daytime celebrations, and ethnic gatherings, this set offers a perfect balance of elegance and comfort.', 2000.00, 'Pink', 10, 0, 1),
(6, 1, 'A5', 'Zayra Ivory Floral Anarkali Kurta Set', 'This ivory Anarkali kurta is beautifully adorned with soft mustard floral prints that add warmth and elegance to the overall look. The flowing silhouette creates a graceful drape, while the intricately bordered dupatta enhances its festive charm. Paired with coordinated striped bottoms, this set is perfect for festive gatherings, daytime celebrations, and elegant ethnic outings where comfort meets timeless style.', 2100.00, 'Baige', 10, 0, 1),
(7, 1, 'A6', 'Aarohi Blush Bloom Anarkali Kurta Set', 'This soft blush pink Anarkali kurta features delicate floral prints that lend a fresh and graceful charm to the ensemble. The flowing silhouette is beautifully balanced with a coordinated printed dupatta and matching bottoms, creating an effortlessly elegant look. Light, airy, and comfortable, this set is ideal for daytime festivities, summer gatherings, and refined ethnic wear moments where subtle beauty stands out.', 2150.00, 'Pink', 10, 0, 1),
(8, 1, 'A7', 'Meher Rangrez Anarkali Kurta Set', 'This vibrant Anarkali kurta is a celebration of rich colours and intricate prints, blending traditional motifs with a graceful, flowing silhouette. The beautifully paneled design creates stunning movement, while the coordinated dupatta adds a soft, elegant contrast. Perfect for festive evenings, weddings, and special occasions, this statement ensemble brings together heritage charm and contemporary elegance effortlessly', 2400.00, 'Multi-color', 10, 1, 1),
(9, 1, 'A8', 'Mehr Rust Anarkali Kurta Set', 'This graceful Anarkali kurta comes in a warm rust-orange hue, beautifully accentuated with intricate embellishment along the yoke for a refined festive touch. The soft, flowy silhouette drapes effortlessly, while subtle scattered detailing adds depth and elegance to the design. Paired with matching bottoms and a sheer dupatta, this ensemble is perfect for festive evenings, family gatherings, and celebratory occasions where timeless charm meets comfort.', 2000.00, 'Orange', 10, 0, 1),
(10, 1, 'A9', 'Zoya Gul Anarkali Kurta Set', 'This elegant Anarkali kurta is crafted in a rich rose pink hue, highlighted with delicate embellishment across the yoke for a soft festive glow. The flowing silhouette adds effortless grace, while the subtle detailing scattered throughout enhances its charm without overwhelming the look. Paired with matching bottoms and a lightweight dupatta, this ensemble is perfect for celebrations, festive gatherings, and intimate occasions where understated elegance truly stands out.', 2500.00, 'Pink', 10, 0, 1),
(11, 2, 'C1', 'Gulnaar Peach Chikankari Kurta', 'This graceful peach chikankari kurta showcases timeless Lucknowi craftsmanship with delicate white hand embroidery spread across the yoke, sleeves, and hemline. Crafted in a soft, breathable fabric, it features a straight silhouette with subtle motifs that add elegance without overpowering the look. Perfectly paired with white bottoms, this kurta is ideal for daytime gatherings, festive occasions, or elegant everyday wear, offering a blend of comfort, tradition, and understated charm.', 700.00, 'Peach/Pinkish', 10, 0, 1),
(12, 2, 'C1-1', 'Gulnaar Peach Chikankari Kurta', 'This graceful peach chikankari kurta showcases timeless Lucknowi craftsmanship with delicate white hand embroidery spread across the yoke, sleeves, and hemline. Crafted in a soft, breathable fabric, it features a straight silhouette with subtle motifs that add elegance without overpowering the look. Perfectly paired with white bottoms, this kurta is ideal for daytime gatherings, festive occasions, or elegant everyday wear, offering a blend of comfort, tradition, and understated charm.', 700.00, 'Peach/Pinkish', 10, 0, 1),
(13, 2, 'C1-2', 'Gulnaar Peach Chikankari Kurta', 'This graceful peach chikankari kurta showcases timeless Lucknowi craftsmanship with delicate white hand embroidery spread across the yoke, sleeves, and hemline. Crafted in a soft, breathable fabric, it features a straight silhouette with subtle motifs that add elegance without overpowering the look. Perfectly paired with white bottoms, this kurta is ideal for daytime gatherings, festive occasions, or elegant everyday wear, offering a blend of comfort, tradition, and understated charm.', 700.00, 'Peach/Pinkish', 10, 0, 1),
(14, 2, 'C1-3', 'Gulnaar Peach Chikankari Kurta', 'This graceful peach chikankari kurta showcases timeless Lucknowi craftsmanship with delicate white hand embroidery spread across the yoke, sleeves, and hemline. Crafted in a soft, breathable fabric, it features a straight silhouette with subtle motifs that add elegance without overpowering the look. Perfectly paired with white bottoms, this kurta is ideal for daytime gatherings, festive occasions, or elegant everyday wear, offering a blend of comfort, tradition, and understated charm.', 700.00, 'Peach/Pinkish', 10, 0, 1),
(15, 2, 'C1-4', 'Gulnaar Peach Chikankari Kurta', 'This graceful peach chikankari kurta showcases timeless Lucknowi craftsmanship with delicate white hand embroidery spread across the yoke, sleeves, and hemline. Crafted in a soft, breathable fabric, it features a straight silhouette with subtle motifs that add elegance without overpowering the look. Perfectly paired with white bottoms, this kurta is ideal for daytime gatherings, festive occasions, or elegant everyday wear, offering a blend of comfort, tradition, and understated charm.', 700.00, 'Peach/Pinkish', 10, 0, 1),
(16, 2, 'C2', 'Noor Teal Chikankari Kurta', 'This elegant teal chikankari kurta is adorned with intricate white Lucknowi embroidery that beautifully highlights the neckline, sleeves, and hem. Crafted in a soft, breathable fabric, it features a classic straight silhouette with delicate floral motifs scattered across the body, adding a refined traditional touch. Perfect to pair with white chikankari bottoms or palazzos, this kurta is ideal for festive gatherings, casual celebrations, or graceful everyday wear.', 700.00, 'Teal', 10, 0, 1),
(17, 2, 'C3', 'Gulnaar Wine Chikankari Kurta', 'This rich wine chikankari kurta showcases exquisite white Lucknowi embroidery that beautifully frames the neckline, sleeves, and hemline. Crafted from a soft, breathable fabric, it features delicate floral motifs evenly placed across the body, giving it a graceful and timeless appeal. The straight silhouette makes it easy to style with white chikankari pants or palazzos, making it perfect for festive occasions, family gatherings, or elegant everyday wear.', 700.00, 'Maroon', 10, 1, 1),
(18, 2, 'C4', 'Noor Mustard Chikankari Kurta', 'This elegant mustard chikankari kurta features intricate white Lucknowi hand embroidery highlighted across the neckline, sleeves, and hem. Crafted in a soft, breathable fabric, the delicate floral motifs add a refined charm while keeping the look effortlessly graceful. Its straight silhouette makes it versatile and comfortable, perfect to pair with white chikankari pants or palazzos for festive gatherings, casual celebrations, or refined everyday wear.', 700.00, 'Yellow', 10, 1, 1),
(19, 2, 'C5', 'Gulnaar Red Chikankari Kurta', 'This vibrant red chikankari kurta is adorned with exquisite white Lucknowi hand embroidery, beautifully detailed across the neckline, sleeves, and hemline. Crafted in a soft, breathable fabric, it offers a perfect balance of elegance and comfort. The rich red hue paired with delicate floral motifs makes it ideal for festive occasions, intimate celebrations, or graceful everyday wear. Style it with white chikankari pants or straight trousers for a timeless, polished look.', 700.00, 'Red', 10, 0, 1),
(20, 2, 'C6', 'Zehra Black Chikankari Kurta', 'This classic black chikankari kurta features intricate white Lucknowi hand embroidery that stands out beautifully against the deep black base. Designed with detailed floral motifs on the yoke, sleeves, and hemline, it reflects timeless elegance with a refined finish. Made from soft, breathable fabric, it ensures all-day comfort while keeping the look effortlessly graceful. Perfect for festive gatherings, evening outings, or elegant everyday wear, it pairs best with white chikankari pants or straight trousers for a striking, balanced look.', 700.00, 'Black', 10, 0, 1),
(21, 2, 'C7', 'Ayla Navy Blue Chikankari Kurta', 'This navy blue Chikankari kurta is crafted in a soft, breathable fabric and adorned with intricate white hand embroidery that highlights the neckline, sleeves, and hem. The elegant straight silhouette paired with classic motifs gives it a timeless appeal, making it perfect for both everyday wear and festive gatherings. Style it with white bottoms and minimal accessories for a graceful, effortless look.', 700.00, 'Blue', 10, 0, 1),
(22, 2, 'C8', 'Ziya Crimson Chikankari Kurta', 'This crimson red Chikankari kurta is beautifully crafted in a lightweight, sheer fabric and highlighted with intricate tonal embroidery across the yoke, sleeves, and hem. The rich colour paired with delicate floral motifs creates a striking yet elegant look. Perfect for festive occasions or elegant daywear, it pairs effortlessly with white bottoms and traditional juttis for a timeless ensemble.', 700.00, 'Red', 10, 0, 1),
(23, 3, 'CO1', 'Olive Bloom Co-ord Set', 'This elegant co-ord set features a soothing olive green base paired with subtle off-white floral line embroidery placed delicately on the tunic. The top comes with a soft V-neck and gentle pleats that add a relaxed yet flattering flow, while the straight-fit pants complete the look with effortless balance. Crafted in a comfortable, breathable fabric, this set blends minimal design with artistic detailing, perfect for casual outings, workwear, or understated festive moments.', 2100.00, 'Green', 10, 0, 1),
(24, 3, 'CO2', 'Rust Petal Co-ord Set', 'This chic co-ord set comes in a rich rust hue, beautifully highlighted with delicate off-white floral line embroidery along the hem of the top. Designed with a flattering V-neck and soft pleats, the tunic offers a relaxed silhouette that flows effortlessly, while the straight-cut pants add a clean, modern finish. Crafted in a comfortable, breathable fabric, this set strikes the perfect balance between minimal elegance and everyday ease, ideal for casual outings, workdays, or laid-back festive wear.', 2300.00, 'Red', 10, 1, 1),
(25, 3, 'CO3', 'Midnight Bloom Co-ord Set', 'This elegant navy blue co-ord set is designed to bring together comfort and effortless style. Featuring a softly flared tunic with a flattering V-neck and subtle front pleats, it is highlighted with delicate white floral line embroidery that adds a graceful touch. Paired with straight-fit trousers, this set is crafted from a smooth, breathable fabric that drapes beautifully. Perfect for workdays, casual outings, or relaxed evening wear, this co-ord set offers a refined yet easygoing look.', 2100.00, 'Blue', 10, 1, 1),
(26, 3, 'CO4', 'Neelika Handcrafted Floral Co-ord Set', 'This graceful navy blue co-ord set showcases timeless elegance with intricate white floral block-print detailing throughout. Designed with a flattering V-neck kurta featuring gentle gathers for a relaxed silhouette, it is paired with matching straight-fit pants that complete the look beautifully. Crafted from soft, breathable fabric, this set offers all-day comfort while exuding a refined ethnic charm. Ideal for festive gatherings, daytime events, or casual traditional wear, this co-ord set blends classic craftsmanship with effortless style.', 2500.00, 'Blue', 10, 0, 1),
(27, 3, 'CO4-1', 'Neelika Handcrafted Floral Co-ord Set', 'This graceful navy blue co-ord set showcases timeless elegance with intricate white floral block-print detailing throughout. Designed with a flattering V-neck kurta featuring gentle gathers for a relaxed silhouette, it is paired with matching straight-fit pants that complete the look beautifully. Crafted from soft, breathable fabric, this set offers all-day comfort while exuding a refined ethnic charm. Ideal for festive gatherings, daytime events, or casual traditional wear, this co-ord set blends classic craftsmanship with effortless style.', 2500.00, 'Blue', 10, 0, 1),
(28, 3, 'CO5', 'Noor Embroidered Black Co-ord Set', 'This elegant black co-ord set is a perfect blend of modern minimalism and traditional detailing. Featuring a relaxed-fit kurta adorned with intricate ivory embroidery on the yoke, sleeves, and hemline, it pairs beautifully with straight-cut off-white pants for a balanced contrast. Crafted in a comfortable, flowy fabric, this set is ideal for effortless day-to-evening styling. Perfect for casual outings, festive lunches, or chic workwear, it offers understated sophistication with timeless appeal.', 2500.00, 'Black', 10, 0, 1),
(29, 4, 'D1', 'Mustard Yellow Embroidered Dress Material with Peach Dupatta', 'This elegant dress material features a rich mustard yellow base beautifully enhanced with intricate embroidery detailing along the neckline, sleeves, and hem, lending it a refined festive appeal. The set is complemented by a soft peach dupatta adorned with delicate circular embroidered motifs and a scalloped embroidered border, adding contrast and grace to the ensemble. Perfect for festive occasions, celebrations, and ethnic gatherings, this dress material offers a timeless blend of tradition and sophistication, allowing for customized stitching to suit your personal style.', 1500.00, 'Yellow', 10, 0, 1),
(30, 4, 'D1-1', 'Mustard Yellow Embroidered Dress Material with Peach Dupatta', 'This elegant dress material features a rich mustard yellow base beautifully enhanced with intricate embroidery detailing along the neckline, sleeves, and hem, lending it a refined festive appeal. The set is complemented by a soft peach dupatta adorned with delicate circular embroidered motifs and a scalloped embroidered border, adding contrast and grace to the ensemble. Perfect for festive occasions, celebrations, and ethnic gatherings, this dress material offers a timeless blend of tradition and sophistication, allowing for customized stitching to suit your personal style.', 1000.00, 'Yellow', 10, 0, 1),
(31, 4, 'D1-2', 'Mustard Yellow Embroidered Dress Material with Peach Dupatta', 'This elegant dress material features a rich mustard yellow base beautifully enhanced with intricate embroidery detailing along the neckline, sleeves, and hem, lending it a refined festive appeal. The set is complemented by a soft peach dupatta adorned with delicate circular embroidered motifs and a scalloped embroidered border, adding contrast and grace to the ensemble. Perfect for festive occasions, celebrations, and ethnic gatherings, this dress material offers a timeless blend of tradition and sophistication, allowing for customized stitching to suit your personal style.', 1000.00, 'Yellow', 10, 0, 1),
(32, 4, 'D1-3', 'Mustard Yellow Embroidered Dress Material with Peach Dupatta', 'This elegant dress material features a rich mustard yellow base beautifully enhanced with intricate embroidery detailing along the neckline, sleeves, and hem, lending it a refined festive appeal. The set is complemented by a soft peach dupatta adorned with delicate circular embroidered motifs and a scalloped embroidered border, adding contrast and grace to the ensemble. Perfect for festive occasions, celebrations, and ethnic gatherings, this dress material offers a timeless blend of tradition and sophistication, allowing for customized stitching to suit your personal style.', 1000.00, 'Yellow', 10, 0, 1),
(41, 4, 'D10', 'Bright Maroon Floral Embroidered Dress Material', 'This elegant dress material features a deep maroon base highlighted with tonal floral embroidery that adds a rich, handcrafted appeal. The beautifully embroidered neckline enhances the overall design, while the matching fabric completes a coordinated and graceful look. Perfect for festive occasions, traditional wear, and refined everyday styling, this dress material blends classic charm with timeless sophistication.', 1000.00, 'Maroon', 10, 0, 1),
(42, 4, 'D11', 'Mint Green Floral Embroidered Dress Material', 'This elegant dress material features a soft mint green base adorned with delicate tonal floral embroidery that creates a refined and graceful look. The intricately embroidered neckline adds subtle detailing, while the contrast white bottom fabric balances the ensemble beautifully. Ideal for day festivities, summer gatherings, and elegant everyday wear, this set offers a perfect blend of freshness, comfort, and timeless charm.', 1000.00, 'green', 10, 0, 1),
(43, 4, 'D12', 'Mustard Yellow Floral Embroidered Dress Material', 'This graceful dress material showcases a rich mustard yellow kurta fabric highlighted with intricate tonal floral embroidery that adds depth and elegance. Paired with a soft white bottom fabric featuring subtle embroidered motifs, the set creates a perfect balance of vibrance and simplicity. Ideal for festive occasions, daytime celebrations, and elegant casual wear, this dress material offers a timeless look with a warm, traditional touch.', 1000.00, 'Yellow', 10, 0, 1),
(44, 4, 'D13', 'Rani Pink Floral Embroidered Dress Material', 'This elegant dress material features a soft rani pink kurta fabric adorned with delicate tonal floral embroidery that adds a graceful, feminine charm. Complemented by a crisp white bottom fabric with subtle embroidered motifs, the set offers a beautiful contrast and refined appeal. Perfect for festive wear, casual celebrations, and graceful day outings, this dress material blends comfort with timeless elegance.', 1000.00, 'Pink', 10, 0, 1),
(45, 4, 'D14', 'Plum Wine Floral Embroidered Dress Material', 'This elegant dress material features a rich plum wine kurta fabric beautifully highlighted with intricate tonal floral embroidery, giving it a refined and graceful look. Paired with a soft white bottom fabric adorned with subtle embroidered motifs, the set offers a timeless contrast and effortless sophistication. Ideal for festive gatherings, casual celebrations, and elegant daytime wear, this dress material blends classic charm with everyday comfort.', 1000.00, 'Purple', 10, 0, 1),
(46, 4, 'D15', 'Sunlit Yellow Floral Embroidered Dress Material', 'This elegant dress material features a bright yellow kurta fabric beautifully highlighted with intricate tonal floral embroidery paired with a white embroidered pant, giving it a refined and graceful look. Paired with a soft white bottom fabric adorned with subtle embroidered motifs, the set offers a timeless contrast and effortless sophistication. Ideal for festive gatherings, casual celebrations, and elegant daytime wear, this dress material blends classic charm with everyday comfort.', 1000.00, 'Yellow', 10, 0, 1),
(33, 4, 'D2', 'Rose Red Printed Dress Material with Black Abstract Design', 'This elegant dress material features a deep wine red base accented with bold black abstract and flowing motifs, creating a striking yet refined look. The fabric is complemented by subtle stripe detailing and tonal contrasts, adding depth and visual interest to the overall design. Soft, fluid, and graceful in fall, this dress material is ideal for evening wear, festive occasions, and statement ethnic outfits, allowing for versatile and customized stitching.', 1000.00, 'Red', 10, 1, 1),
(34, 4, 'D3', 'Black & Ivory Abstract Printed Dress Material', 'This sophisticated dress material showcases a classic black and ivory color palette, highlighted with bold abstract wave-inspired prints for a modern, elegant appeal. The design is balanced with soft gradient borders and subtle textured detailing, giving the fabric depth and a graceful flow. Refined yet versatile, this dress material is perfect for office wear, evening gatherings, and contemporary ethnic styling, allowing you to tailor it into a timeless statement outfit.', 1000.00, 'Black/white', 10, 0, 1),
(35, 4, 'D4', 'Teal Blue & Sand Beige Floral Abstract Dress Material', 'This elegant dress material features a rich teal blue base beautifully contrasted with warm sand beige tones, highlighted by soft floral accents and abstract leaf-inspired prints. The flowing design is enhanced with subtle gradient borders, adding depth and a graceful finish to the overall look. Sophisticated yet refreshing, this dress material is ideal for day wear, festive gatherings, and elegant casual styling, offering a perfect balance of modern charm and timeless appeal.', 1000.00, 'Blue/Baige', 10, 0, 1),
(36, 4, 'D5', 'Mustard Yellow & Charcoal Abstract Floral Dress Material', 'This striking dress material showcases a vibrant mustard yellow base paired with deep charcoal accents, enhanced by bold abstract leaf-inspired prints. The design is beautifully balanced with soft gradient transitions and subtle floral detailing, giving it a modern yet elegant appeal. Perfect for day outings, festive wear, or statement casual looks, this dress material offers a confident blend of warmth, style, and contemporary charm.', 1000.00, 'Yellow', 10, 0, 1),
(37, 4, 'D6', 'Emerald Green & Ivory Hand-Embroidered Dress Material', 'This elegant dress material features a rich emerald green base beautifully enhanced with intricate white floral embroidery around the neckline, creating a refined and graceful focal point. The look is complemented by a soft ivory dupatta adorned with delicate green motifs, subtle borders, and classic tassel detailing. Perfect for festive occasions, intimate celebrations, and elegant day wear, this ensemble blends traditional craftsmanship with timeless sophistication.', 1000.00, 'Green', 10, 0, 1),
(38, 4, 'D7', 'Plum Purple Floral Embroidered Dress Material', 'This graceful dress material comes in a rich plum purple hue, highlighted with delicate tonal floral embroidery that adds subtle elegance and depth. The finely embroidered neckline enhances the overall look, while the coordinated fabric pieces allow for a perfectly tailored finish. Ideal for festive gatherings, office wear, and elegant everyday styling, this ensemble offers a beautiful balance of simplicity and sophistication.', 1000.00, 'Purple', 10, 0, 1),
(39, 4, 'D8', 'Teal Blue Floral Embroidered Dress Material', 'This elegant dress material features a deep teal blue base adorned with refined tonal floral embroidery that lends a rich and graceful appeal. The intricately embroidered neckline adds a touch of sophistication, while the coordinated fabric pieces allow for a customized and flattering silhouette. Perfect for festive occasions, office wear, and refined everyday looks, this ensemble blends timeless charm with understated elegance.', 1000.00, 'Blue', 10, 0, 1),
(40, 4, 'D9', 'Wine Red Floral Embroidered Dress Material', 'This graceful dress material comes in a rich wine red hue, beautifully enhanced with delicate tonal floral embroidery that adds depth and elegance. The finely embroidered neckline creates a refined focal point, while the coordinated fabric ensures a seamless and sophisticated look when stitched. Ideal for festive gatherings, evening wear, and elegant everyday styling, this dress material offers a perfect balance of tradition and modern charm.', 1000.00, 'Red', 10, 0, 1),
(82, 6, 'S1', 'Aarohi Mauve Sharara Set', 'This elegant sharara set features a soft mauve base adorned with intricate floral embroidery in delicate pastel tones, creating a beautifully balanced festive look. The straight kurta is detailed with fine handwork along the neckline and hem, while the flowing sharara adds graceful movement with its all-over motifs. Paired with a sheer, embroidered dupatta, this ensemble is perfect for weddings, festive celebrations, and evening gatherings where understated luxury shines through.', 3000.00, 'Purple', 10, 0, 1),
(83, 6, 'S1-1', 'Aarohi Mauve Sharara Set', 'This elegant sharara set features a soft mauve base adorned with intricate floral embroidery in delicate pastel tones, creating a beautifully balanced festive look. The straight kurta is detailed with fine handwork along the neckline and hem, while the flowing sharara adds graceful movement with its all-over motifs. Paired with a sheer, embroidered dupatta, this ensemble is perfect for weddings, festive celebrations, and evening gatherings where understated luxury shines through.', 3000.00, 'Purple', 10, 0, 1),
(84, 6, 'S1-2', 'Aarohi Mauve Sharara Set', 'This elegant sharara set features a soft mauve base adorned with intricate floral embroidery in delicate pastel tones, creating a beautifully balanced festive look. The straight kurta is detailed with fine handwork along the neckline and hem, while the flowing sharara adds graceful movement with its all-over motifs. Paired with a sheer, embroidered dupatta, this ensemble is perfect for weddings, festive celebrations, and evening gatherings where understated luxury shines through.', 3000.00, 'Purple', 10, 0, 1),
(85, 6, 'S1-3', 'Aarohi Mauve Sharara Set', 'This elegant sharara set features a soft mauve base adorned with intricate floral embroidery in delicate pastel tones, creating a beautifully balanced festive look. The straight kurta is detailed with fine handwork along the neckline and hem, while the flowing sharara adds graceful movement with its all-over motifs. Paired with a sheer, embroidered dupatta, this ensemble is perfect for weddings, festive celebrations, and evening gatherings where understated luxury shines through.', 3000.00, 'Purple', 10, 0, 1),
(86, 6, 'S2', 'Zehra Noir Sharara Set', 'This stunning black sharara set is crafted to make a statement with its rich, multicolour floral embroidery delicately scattered across the kurta and flowing sharara. The intricately detailed neckline and hem add depth and elegance, while the flared sharara creates a graceful, regal silhouette. Paired with a sheer embroidered dupatta finished with ornate borders, this ensemble is perfect for evening festivities, weddings, and celebratory occasions where timeless glamour meets modern charm.', 3200.00, 'Black', 10, 0, 1),
(87, 6, 'S2-1', 'Zehra Noir Sharara Set', 'This stunning black sharara set is crafted to make a statement with its rich, multicolour floral embroidery delicately scattered across the kurta and flowing sharara. The intricately detailed neckline and hem add depth and elegance, while the flared sharara creates a graceful, regal silhouette. Paired with a sheer embroidered dupatta finished with ornate borders, this ensemble is perfect for evening festivities, weddings, and celebratory occasions where timeless glamour meets modern charm.', 3000.00, 'Black', 10, 0, 1),
(88, 6, 'S3', 'Meher Ivory Sharara Set', 'This elegant ivory sharara set is a vision of soft romance, adorned with delicate pastel floral embroidery and fine golden detailing throughout. The gracefully tailored kurta is paired with a beautifully flared sharara that adds movement and charm, while the sheer dupatta with embroidered borders completes the look with effortless grace. Perfect for daytime weddings, garden festivities, and intimate celebrations, this ensemble blends timeless sophistication with a fresh, ethereal appeal.', 3200.00, 'White', 10, 1, 1),
(89, 6, 'S3-1', 'Meher Ivory Sharara Set', 'This elegant ivory sharara set is a vision of soft romance, adorned with delicate pastel floral embroidery and fine golden detailing throughout. The gracefully tailored kurta is paired with a beautifully flared sharara that adds movement and charm, while the sheer dupatta with embroidered borders completes the look with effortless grace. Perfect for daytime weddings, garden festivities, and intimate celebrations, this ensemble blends timeless sophistication with a fresh, ethereal appeal.', 3200.00, 'White', 10, 0, 1);
INSERT INTO `products` (`product_id`, `category_num`, `product_code`, `product_name`, `description`, `price`, `color`, `stock_qty`, `is_featured`, `is_active`) VALUES
(90, 6, 'S4', 'Zehra Teal Sharara Set', 'This enchanting teal sharara set is crafted to capture timeless elegance, featuring intricate floral embroidery in soft pastel hues accented with delicate metallic detailing. The richly embroidered kurta pairs beautifully with a flowing sharara that adds graceful movement, while the sheer dupatta with ornate borders drapes effortlessly for a regal finish. Ideal for festive evenings, weddings, and garden celebrations, this ensemble blends classic charm with refined sophistication.', 3000.00, 'Teal', 10, 0, 1),
(91, 6, 'S4-1', 'Zehra Teal Sharara Set', 'This enchanting teal sharara set is crafted to capture timeless elegance, featuring intricate floral embroidery in soft pastel hues accented with delicate metallic detailing. The richly embroidered kurta pairs beautifully with a flowing sharara that adds graceful movement, while the sheer dupatta with ornate borders drapes effortlessly for a regal finish. Ideal for festive evenings, weddings, and garden celebrations, this ensemble blends classic charm with refined sophistication.', 3200.00, 'Teal', 10, 0, 1),
(92, 6, 'S5', 'Gulnaar Crimson Sharara Set', 'This striking crimson sharara set is a celebration of festive elegance, adorned with intricate floral embroidery highlighted by delicate turquoise accents and fine metallic detailing. The richly embroidered kurta pairs beautifully with a flowing sharara that adds graceful volume, while the sheer dupatta with ornate borders completes the look with effortless charm. Perfect for weddings, festive gatherings, and evening celebrations, this ensemble brings together classic richness and modern grace.', 3200.00, 'Red', 10, 0, 1),
(93, 6, 'S5-1', 'Gulnaar Crimson Sharara Set', 'This striking crimson sharara set is a celebration of festive elegance, adorned with intricate floral embroidery highlighted by delicate turquoise accents and fine metallic detailing. The richly embroidered kurta pairs beautifully with a flowing sharara that adds graceful volume, while the sheer dupatta with ornate borders completes the look with effortless charm. Perfect for weddings, festive gatherings, and evening celebrations, this ensemble brings together classic richness and modern grace.', 3000.00, 'Red', 10, 0, 1),
(94, 6, 'S6', 'Zayra Olive Embroidered Sharara Set', 'This elegant olive green sharara set is crafted for timeless festive charm, featuring intricate floral embroidery accented with soft turquoise and blush pink highlights. The straight kurta is delicately adorned with fine threadwork and subtle embellishments, perfectly paired with a flowy embroidered sharara that adds graceful movement. Completing the look is a sheer dupatta with an ornate border, making this ensemble ideal for weddings, festive celebrations, and elegant evening occasions.', 3500.00, 'Green', 10, 1, 1),
(95, 6, 'S6-1', 'Zayra Olive Embroidered Sharara Set', 'This elegant olive green sharara set is crafted for timeless festive charm, featuring intricate floral embroidery accented with soft turquoise and blush pink highlights. The straight kurta is delicately adorned with fine threadwork and subtle embellishments, perfectly paired with a flowy embroidered sharara that adds graceful movement. Completing the look is a sheer dupatta with an ornate border, making this ensemble ideal for weddings, festive celebrations, and elegant evening occasions.', 3000.00, 'Green', 10, 0, 1),
(96, 6, 'S6-2', 'Zayra Olive Embroidered Sharara Set', 'This elegant olive green sharara set is crafted for timeless festive charm, featuring intricate floral embroidery accented with soft turquoise and blush pink highlights. The straight kurta is delicately adorned with fine threadwork and subtle embellishments, perfectly paired with a flowy embroidered sharara that adds graceful movement. Completing the look is a sheer dupatta with an ornate border, making this ensemble ideal for weddings, festive celebrations, and elegant evening occasions.', 3000.00, 'Green', 10, 0, 1),
(97, 6, 'S6-3', 'Zayra Olive Embroidered Sharara Set', 'This elegant olive green sharara set is crafted for timeless festive charm, featuring intricate floral embroidery accented with soft turquoise and blush pink highlights. The straight kurta is delicately adorned with fine threadwork and subtle embellishments, perfectly paired with a flowy embroidered sharara that adds graceful movement. Completing the look is a sheer dupatta with an ornate border, making this ensemble ideal for weddings, festive celebrations, and elegant evening occasions.', 3000.00, 'Green', 10, 0, 1),
(98, 6, 'S6-4', 'Zayra Olive Embroidered Sharara Set', 'This elegant olive green sharara set is crafted for timeless festive charm, featuring intricate floral embroidery accented with soft turquoise and blush pink highlights. The straight kurta is delicately adorned with fine threadwork and subtle embellishments, perfectly paired with a flowy embroidered sharara that adds graceful movement. Completing the look is a sheer dupatta with an ornate border, making this ensemble ideal for weddings, festive celebrations, and elegant evening occasions.', 3000.00, 'Green', 10, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `product_id_num` int(11) DEFAULT NULL,
  `product_code` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id_num`, `product_code`, `image_path`) VALUES
(2, 1, 'A1', 'categories/anarkali_suit/A1.jpeg'),
(3, 2, 'A2', 'categories/anarkali_suit/A2.jpeg'),
(4, 3, 'A3', 'categories/anarkali_suit/A3.jpeg'),
(5, 4, 'A4', 'categories/anarkali_suit/A4.jpeg'),
(6, 5, 'A5', 'categories/anarkali_suit/A5.jpeg'),
(7, 6, 'A6', 'categories/anarkali_suit/A6.jpeg'),
(8, 7, 'A7', 'categories/anarkali_suit/A7.jpeg'),
(9, 8, 'A8', 'categories/anarkali_suit/A8.jpeg'),
(10, 9, 'A9', 'categories/anarkali_suit/A9.jpeg'),
(11, 10, 'C1', 'categories/chikankari/C1.jpeg'),
(12, 10, 'C1-1', 'categories/chikankari/C1-1.jpeg'),
(13, 10, 'C1-2', 'categories/chikankari/C1-2.jpeg'),
(14, 10, 'C1-3', 'categories/chikankari/C1-3.jpeg'),
(15, 10, 'C1-4', 'categories/chikankari/C1-4.jpeg'),
(16, 11, 'C2', 'categories/chikankari/C2.jpeg'),
(17, 12, 'C3', 'categories/chikankari/C3.jpeg'),
(18, 13, 'C4', 'categories/chikankari/C4.jpeg'),
(19, 14, 'C5', 'categories/chikankari/C5.jpeg'),
(20, 15, 'C6', 'categories/chikankari/C6.jpeg'),
(21, 16, 'C7', 'categories/chikankari/C7.jpeg'),
(22, 17, 'C8', 'categories/chikankari/C8.jpeg'),
(23, 18, 'CO1', 'categories/coord_sets/CO1.jpeg'),
(24, 19, 'CO2', 'categories/coord_sets/CO2.jpeg'),
(25, 20, 'CO3', 'categories/coord_sets/CO3.jpeg'),
(26, 21, 'CO4', 'categories/coord_sets/CO4.jpeg'),
(27, 21, 'CO4-1', 'categories/coord_sets/CO4-1.jpeg'),
(28, 22, 'CO5', 'categories/coord_sets/CO5.jpeg'),
(29, 23, 'D1', 'categories/dress_material/D1.jpeg'),
(30, 23, 'D1-1', 'categories/dress_material/D1-1.jpeg'),
(31, 23, 'D1-2', 'categories/dress_material/D1-2.jpeg'),
(32, 23, 'D1-3', 'categories/dress_material/D1-3.jpeg'),
(33, 24, 'D2', 'categories/dress_material/D2.jpeg'),
(34, 25, 'D3', 'categories/dress_material/D3.jpeg'),
(35, 26, 'D4', 'categories/dress_material/D4.jpeg'),
(36, 27, 'D5', 'categories/dress_material/D5.jpeg'),
(37, 28, 'D6', 'categories/dress_material/D6.jpeg'),
(38, 29, 'D7', 'categories/dress_material/D7.jpeg'),
(39, 30, 'D8', 'categories/dress_material/D8.jpeg'),
(40, 31, 'D9', 'categories/dress_material/D9.jpeg'),
(41, 32, 'D10', 'categories/dress_material/D10.jpeg'),
(42, 33, 'D11', 'categories/dress_material/D11.jpeg'),
(43, 34, 'D12', 'categories/dress_material/D12.jpeg'),
(44, 35, 'D13', 'categories/dress_material/D13.jpeg'),
(45, 36, 'D14', 'categories/dress_material/D14.jpeg'),
(46, 37, 'D15', 'categories/dress_material/D15.jpeg'),
(47, 38, '1', 'categories/straight_kurti/1.jpeg'),
(48, 39, '2', 'categories/straight_kurti/2.jpeg'),
(49, 40, '3', 'categories/straight_kurti/3.jpeg'),
(50, 41, '4', 'categories/straight_kurti/4.jpeg'),
(51, 42, '5', 'categories/straight_kurti/5.jpeg'),
(52, 43, '6', 'categories/straight_kurti/6.jpeg'),
(53, 44, '7', 'categories/straight_kurti/7.jpeg'),
(54, 45, '8', 'categories/straight_kurti/8.jpeg'),
(55, 46, '9', 'categories/straight_kurti/9.jpeg'),
(56, 47, '10', 'categories/straight_kurti/10.jpeg'),
(57, 48, '11', 'categories/straight_kurti/11.jpeg'),
(58, 49, '12', 'categories/straight_kurti/12.jpeg'),
(59, 50, '13', 'categories/straight_kurti/13.jpeg'),
(60, 51, '14', 'categories/straight_kurti/14.jpeg'),
(61, 52, '15', 'categories/straight_kurti/15.jpeg'),
(62, 53, '16', 'categories/straight_kurti/16.jpeg'),
(63, 54, '17', 'categories/straight_kurti/17.jpeg'),
(64, 55, '18', 'categories/straight_kurti/18.jpeg'),
(65, 56, '19', 'categories/straight_kurti/19.jpeg'),
(66, 57, '20', 'categories/straight_kurti/20.jpeg'),
(67, 58, '21', 'categories/straight_kurti/21.jpeg'),
(68, 59, '22', 'categories/straight_kurti/22.jpeg'),
(69, 60, '23', 'categories/straight_kurti/23.jpeg'),
(70, 61, '24', 'categories/straight_kurti/24.jpeg'),
(71, 62, '25', 'categories/straight_kurti/25.jpeg'),
(72, 63, '26', 'categories/straight_kurti/26.jpeg'),
(73, 64, '27', 'categories/straight_kurti/27.jpeg'),
(74, 65, '28', 'categories/straight_kurti/28.jpeg'),
(75, 66, '29', 'categories/straight_kurti/29.jpeg'),
(76, 67, '30', 'categories/straight_kurti/30.jpeg'),
(77, 68, '31', 'categories/straight_kurti/31.jpeg'),
(78, 69, '32', 'categories/straight_kurti/32.jpeg'),
(79, 70, '33', 'categories/straight_kurti/33.jpeg'),
(80, 71, '34', 'categories/straight_kurti/34.jpeg'),
(81, 72, '35', 'categories/straight_kurti/35.jpeg'),
(82, 73, 'S1', 'categories/sharara_set/S1.jpeg'),
(83, 73, 'S1-1', 'categories/sharara_set/S1-1.jpeg'),
(84, 73, 'S1-2', 'categories/sharara_set/S1-2.jpeg'),
(85, 73, 'S1-3', 'categories/sharara_set/S1-3.jpeg'),
(86, 74, 'S2', 'categories/sharara_set/S2.jpeg'),
(87, 74, 'S2-1', 'categories/sharara_set/S2-1.jpeg'),
(88, 75, 'S3', 'categories/sharara_set/S3.jpeg'),
(89, 75, 'S3-1', 'categories/sharara_set/S3-1.jpeg'),
(90, 76, 'S4', 'categories/sharara_set/S4.jpeg'),
(91, 76, 'S4-1', 'categories/sharara_set/S4-1jpeg'),
(92, 77, 'S5', 'categories/sharara_set/S5.jpeg'),
(93, 77, 'S5-1', 'categories/sharara_set/S5-1.jpeg'),
(94, 78, 'S6', 'categories/sharara_set/S6.jpeg'),
(95, 78, 'S6-1', 'categories/sharara_set/S6-1.jpeg'),
(96, 78, 'S6-2', 'categories/sharara_set/S6-2.jpeg'),
(97, 78, 'S6-3', 'categories/sharara_set/S6-3.jpeg'),
(98, 78, 'S6-4', 'categories/sharara_set/S6-4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password_hash`, `role`, `created_at`) VALUES
(1, 'Nidhi', 'nidhibalaji219@gmail.com', 'aizasjuadmin', 'admin', '2026-03-04 17:58:53'),
(2, 'Anitha', 'anithapatel1203@gmail.com', 'aizasjuadmin', 'admin', '2026-03-04 17:58:53'),
(3, 'Aditi', 'adititupsakri@gmail.com', 'aizasjuadmin', 'admin', '2026-03-04 17:58:53'),
(4, 'Aashika', 'aashikamenon2004@gmail.com', 'aizasjuadmin', 'admin', '2026-03-04 17:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `session_id` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE `user_wishlist` (
  `user_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`user_id`,`product_code`,`size`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD PRIMARY KEY (`user_id`,`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product_code` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
