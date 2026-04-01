-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2026 at 07:16 AM
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
-- Database: `aizacollections_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `item_status` varchar(20) DEFAULT 'Placed',
  `cancelled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `category_num` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL CHECK (`price` >= 0),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`category_num`, `product_code`, `product_name`, `description`, `price`, `is_featured`, `is_active`) VALUES
(1, 'A1', 'Olive Garden Elegance', 'An ivory kurta with olive and mustard floral prints, featuring delicate embroidery on the neckline and lace-detailed sleeves. Paired with a matching dupatta, it offers a soft, elegant look perfect for festive or daytime wear.', 2500.00, 0, 1),
(1, 'A1-1', 'Olive Garden Elegance', 'An ivory kurta with olive and mustard floral prints, featuring delicate embroidery on the neckline and lace-detailed sleeves. Paired with a matching dupatta, it offers a soft, elegant look perfect for festive or daytime wear.', 2500.00, 0, 1),
(1, 'A1-2', 'Olive Garden Elegance', 'An ivory kurta with olive and mustard floral prints, featuring delicate embroidery on the neckline and lace-detailed sleeves. Paired with a matching dupatta, it offers a soft, elegant look perfect for festive or daytime wear.', 2500.00, 0, 1),
(1, 'A10', 'idk', 'aergfvaefgv', 400.00, 0, 1),
(1, 'A2', 'Misty Blue Grace', 'A soft blue floral printed kurta set featuring delicate traditional patterns and elegant detailing on the neckline. Paired with a beautifully coordinated dupatta and matching bottoms, the outfit creates a graceful and timeless look, perfect for festive gatherings, casual celebrations, or elegant daywear.', 2000.00, 0, 1),
(1, 'A2-1', 'Misty Blue Grace', 'A soft blue floral printed kurta set featuring delicate traditional patterns and elegant detailing on the neckline. Paired with a beautifully coordinated dupatta and matching bottoms, the outfit creates a graceful and timeless look, perfect for festive gatherings, casual celebrations, or elegant daywear.', 2000.00, 0, 1),
(1, 'A3', 'Sunshine Bloom', 'A vibrant mustard-yellow kurta set featuring delicate floral prints and a comfortable, elegant silhouette. Paired with striped bottoms and a beautifully patterned dupatta with floral borders, this outfit brings a bright and cheerful charm, perfect for festive gatherings or everyday ethnic wear.', 2150.00, 0, 1),
(1, 'A3-1', 'Sunshine Bloom', 'A vibrant mustard-yellow kurta set featuring delicate floral prints and a comfortable, elegant silhouette. Paired with striped bottoms and a beautifully patterned dupatta with floral borders, this outfit brings a bright and cheerful charm, perfect for festive gatherings or everyday ethnic wear.', 2150.00, 0, 1),
(1, 'A3-2', 'Sunshine Bloom', 'A vibrant mustard-yellow kurta set featuring delicate floral prints and a comfortable, elegant silhouette. Paired with striped bottoms and a beautifully patterned dupatta with floral borders, this outfit brings a bright and cheerful charm, perfect for festive gatherings or everyday ethnic wear.', 2150.00, 0, 1),
(1, 'A4', 'Rose Blossom Charm', 'A vibrant pink kurta set adorned with elegant floral prints and delicate detailing on the neckline. Paired with striped pants and a beautifully patterned dupatta, this outfit offers a stylish and graceful look, perfect for festive occasions or casual ethnic wear.', 2500.00, 0, 1),
(1, 'A4-1', 'Rose Blossom Charm', 'A vibrant pink kurta set adorned with elegant floral prints and delicate detailing on the neckline. Paired with striped pants and a beautifully patterned dupatta, this outfit offers a stylish and graceful look, perfect for festive occasions or casual ethnic wear.', 2500.00, 0, 1),
(1, 'A4-2', 'Rose Blossom Charm', 'A vibrant pink kurta set adorned with elegant floral prints and delicate detailing on the neckline. Paired with striped pants and a beautifully patterned dupatta, this outfit offers a stylish and graceful look, perfect for festive occasions or casual ethnic wear.', 2500.00, 0, 1),
(1, 'A5', 'Golden Ivory Elegance', 'A graceful ivory kurta adorned with intricate mustard-gold floral prints and vertical motifs. The neckline features a striped placket with decorative buttons, adding a refined and elegant touch to this timeless ethnic design.', 700.00, 1, 1),
(1, 'A5-1', 'Golden Ivory Elegance', 'A graceful ivory kurta adorned with intricate mustard-gold floral prints and vertical motifs. The neckline features a striped placket with decorative buttons, adding a refined and elegant touch to this timeless ethnic design.', 700.00, 0, 1),
(1, 'A5-2', 'Golden Ivory Elegance', 'A graceful ivory kurta adorned with intricate mustard-gold floral prints and vertical motifs. The neckline features a striped placket with decorative buttons, adding a refined and elegant touch to this timeless ethnic design.', 700.00, 0, 1),
(1, 'A6', 'Pink Petal Grace', 'A charming pink and white kurta set featuring delicate floral and geometric prints. Paired with a beautifully patterned dupatta and subtle neckline detailing, this outfit creates a soft, elegant look perfect for festive gatherings or daytime occasions.', 700.00, 0, 1),
(1, 'A6-1', 'Pink Petal Grace', 'A charming pink and white kurta set featuring delicate floral and geometric prints. Paired with a beautifully patterned dupatta and subtle neckline detailing, this outfit creates a soft, elegant look perfect for festive gatherings or daytime occasions.', 700.00, 0, 1),
(1, 'A6-2', 'Pink Petal Grace', 'A charming pink and white kurta set featuring delicate floral and geometric prints. Paired with a beautifully patterned dupatta and subtle neckline detailing, this outfit creates a soft, elegant look perfect for festive gatherings or daytime occasions.', 700.00, 0, 1),
(1, 'A7', 'Royal Festive Flair', 'A stunning multicolored lehenga set featuring vibrant traditional prints and intricate patterns. Paired with a matching dupatta and detailed borders, this outfit creates a rich and festive look, perfect for weddings, celebrations, and special occasions.', 700.00, 1, 1),
(1, 'A7-1', 'Royal Festive Flair', 'A stunning multicolored lehenga set featuring vibrant traditional prints and intricate patterns. Paired with a matching dupatta and detailed borders, this outfit creates a rich and festive look, perfect for weddings, celebrations, and special occasions.', 700.00, 0, 1),
(1, 'A7-2', 'Royal Festive Flair', 'A stunning multicolored lehenga set featuring vibrant traditional prints and intricate patterns. Paired with a matching dupatta and detailed borders, this outfit creates a rich and festive look, perfect for weddings, celebrations, and special occasions.', 700.00, 0, 1),
(1, 'A8', 'Rust Elegance', 'A graceful rust-orange kurta set featuring delicate embroidery on the bodice and soft gathered detailing for a flowing silhouette. Paired with matching bottoms and a dupatta, this outfit offers a sophisticated and festive look perfect for celebrations or special occasions.', 2100.00, 0, 1),
(1, 'A8-1', 'Rust Elegance', 'A graceful rust-orange kurta set featuring delicate embroidery on the bodice and soft gathered detailing for a flowing silhouette. Paired with matching bottoms and a dupatta, this outfit offers a sophisticated and festive look perfect for celebrations or special occasions.', 2100.00, 0, 1),
(1, 'A8-2', 'Rust Elegance', 'A graceful rust-orange kurta set featuring delicate embroidery on the bodice and soft gathered detailing for a flowing silhouette. Paired with matching bottoms and a dupatta, this outfit offers a sophisticated and festive look perfect for celebrations or special occasions.', 2100.00, 0, 1),
(1, 'A9', 'Ruby Radiance', 'A stunning ruby-red kurta set featuring delicate embroidery on the bodice and soft gathered detailing that creates a graceful flow. Paired with matching bottoms and a dupatta, this elegant outfit is perfect for festive celebrations and special occasions.', 2100.00, 0, 1),
(1, 'A9-1', 'Ruby Radiance', 'A stunning ruby-red kurta set featuring delicate embroidery on the bodice and soft gathered detailing that creates a graceful flow. Paired with matching bottoms and a dupatta, this elegant outfit is perfect for festive celebrations and special occasions.', 2100.00, 0, 1),
(1, 'A9-2', 'Ruby Radiance', 'A stunning ruby-red kurta set featuring delicate embroidery on the bodice and soft gathered detailing that creates a graceful flow. Paired with matching bottoms and a dupatta, this elegant outfit is perfect for festive celebrations and special occasions.', 2100.00, 0, 1),
(2, 'C1', 'Coral Bloom Elegance', 'A beautiful coral-pink kurta adorned with delicate white floral embroidery and intricate neckline detailing. Paired with elegant white bottoms, this outfit offers a fresh and graceful look perfect for casual outings, festive gatherings, or daytime wear.', 2500.00, 0, 1),
(2, 'C1-1', 'Coral Bloom Elegance', 'A beautiful coral-pink kurta adorned with delicate white floral embroidery and intricate neckline detailing. Paired with elegant white bottoms, this outfit offers a fresh and graceful look perfect for casual outings, festive gatherings, or daytime wear.', 2500.00, 0, 1),
(2, 'C1-2', 'Coral Bloom Elegance', 'A beautiful coral-pink kurta adorned with delicate white floral embroidery and intricate neckline detailing. Paired with elegant white bottoms, this outfit offers a fresh and graceful look perfect for casual outings, festive gatherings, or daytime wear.', 1500.00, 0, 1),
(2, 'C2', 'Teal Blossom Charm', 'A graceful teal kurta adorned with intricate white floral embroidery that adds a classic and elegant touch. Paired with delicate lace-detailed white bottoms, this outfit offers a fresh and sophisticated look perfect for casual outings or festive daytime occasions.', 1000.00, 1, 1),
(2, 'C2-1', 'Teal Blossom Charm', 'A graceful teal kurta adorned with intricate white floral embroidery that adds a classic and elegant touch. Paired with delicate lace-detailed white bottoms, this outfit offers a fresh and sophisticated look perfect for casual outings or festive daytime occasions.', 1000.00, 0, 1),
(2, 'C2-2', 'Teal Blossom Charm', 'A graceful teal kurta adorned with intricate white floral embroidery that adds a classic and elegant touch. Paired with delicate lace-detailed white bottoms, this outfit offers a fresh and sophisticated look perfect for casual outings or festive daytime occasions.', 1000.00, 0, 1),
(2, 'C3', 'Maroon Heritage Elegance', 'A rich maroon kurta featuring beautiful white traditional embroidery on the neckline, sleeves, and hem. Paired with classic white bottoms, this outfit creates a timeless and elegant ethnic look perfect for festive and casual occasions.', 1000.00, 0, 1),
(2, 'C3-1', 'Maroon Heritage Elegance', 'A rich maroon kurta featuring beautiful white traditional embroidery on the neckline, sleeves, and hem. Paired with classic white bottoms, this outfit creates a timeless and elegant ethnic look perfect for festive and casual occasions.', 1000.00, 0, 1),
(2, 'C3-2', 'Maroon Heritage Elegance', 'A rich maroon kurta featuring beautiful white traditional embroidery on the neckline, sleeves, and hem. Paired with classic white bottoms, this outfit creates a timeless and elegant ethnic look perfect for festive and casual occasions.', 1000.00, 0, 1),
(2, 'C4', 'Mustard Bloom Elegance', 'A graceful mustard kurta adorned with delicate white floral embroidery across the neckline, sleeves, and hem. Paired with classic off-white bottoms, this outfit creates a warm and elegant ethnic look perfect for everyday wear or festive gatherings.', 1000.00, 0, 1),
(2, 'C4-1', 'Mustard Bloom Elegance', 'A graceful mustard kurta adorned with delicate white floral embroidery across the neckline, sleeves, and hem. Paired with classic off-white bottoms, this outfit creates a warm and elegant ethnic look perfect for everyday wear or festive gatherings.', 1000.00, 0, 1),
(2, 'C4-2', 'Mustard Bloom Elegance', 'A graceful mustard kurta adorned with delicate white floral embroidery across the neckline, sleeves, and hem. Paired with classic off-white bottoms, this outfit creates a warm and elegant ethnic look perfect for everyday wear or festive gatherings.', 1000.00, 0, 1),
(2, 'C5', 'Scarlet Bloom Charm', 'A vibrant scarlet red kurta adorned with intricate white floral embroidery on the neckline, sleeves, and hem. Paired with elegant off-white bottoms, this outfit offers a striking yet graceful ethnic look perfect for festive gatherings or stylish everyday wear.', 1000.00, 1, 1),
(2, 'C5-1', 'Scarlet Bloom Charm', 'A vibrant scarlet red kurta adorned with intricate white floral embroidery on the neckline, sleeves, and hem. Paired with elegant off-white bottoms, this outfit offers a striking yet graceful ethnic look perfect for festive gatherings or stylish everyday wear.', 1000.00, 0, 1),
(2, 'C5-2', 'Scarlet Bloom Charm', 'A vibrant scarlet red kurta adorned with intricate white floral embroidery on the neckline, sleeves, and hem. Paired with elegant off-white bottoms, this outfit offers a striking yet graceful ethnic look perfect for festive gatherings or stylish everyday wear.', 1000.00, 0, 1),
(2, 'C6', 'Midnight Ivory Elegance', 'A classic black kurta adorned with intricate white floral embroidery on the neckline, sleeves, and borders. Paired with elegant white bottoms, this outfit creates a timeless and sophisticated ethnic look perfect for both casual and festive occasions.', 1000.00, 0, 1),
(2, 'C6-1', 'Midnight Ivory Elegance', 'A classic black kurta adorned with intricate white floral embroidery on the neckline, sleeves, and borders. Paired with elegant white bottoms, this outfit creates a timeless and sophisticated ethnic look perfect for both casual and festive occasions.', 1000.00, 0, 1),
(2, 'C6-2', 'Midnight Ivory Elegance', 'A classic black kurta adorned with intricate white floral embroidery on the neckline, sleeves, and borders. Paired with elegant white bottoms, this outfit creates a timeless and sophisticated ethnic look perfect for both casual and festive occasions.', 1000.00, 0, 1),
(2, 'C7', 'Royal Indigo Grace', 'A beautiful indigo-blue kurta featuring intricate white floral embroidery on the neckline, sleeves, and hem. Paired with elegant white bottoms, this outfit offers a refined and timeless ethnic look perfect for casual outings and festive daytime occasions.', 1000.00, 0, 1),
(2, 'C7-1', 'Royal Indigo Grace', 'A beautiful indigo-blue kurta featuring intricate white floral embroidery on the neckline, sleeves, and hem. Paired with elegant white bottoms, this outfit offers a refined and timeless ethnic look perfect for casual outings and festive daytime occasions.', 1000.00, 0, 1),
(2, 'C7-2', 'Royal Indigo Grace', 'A beautiful indigo-blue kurta featuring intricate white floral embroidery on the neckline, sleeves, and hem. Paired with elegant white bottoms, this outfit offers a refined and timeless ethnic look perfect for casual outings and festive daytime occasions.', 1000.00, 0, 1),
(2, 'C8', 'Crimson Grace', 'A striking crimson kurta featuring intricate tonal embroidery across the neckline, sleeves, and hem. Paired with classic white bottoms, this elegant outfit creates a bold yet sophisticated look perfect for festive occasions or stylish everyday wear.', 1500.00, 0, 1),
(2, 'C8-1', 'Crimson Grace', 'A striking crimson kurta featuring intricate tonal embroidery across the neckline, sleeves, and hem. Paired with classic white bottoms, this elegant outfit creates a bold yet sophisticated look perfect for festive occasions or stylish everyday wear.', 1500.00, 0, 1),
(2, 'C8-2', 'Crimson Grace', 'A striking crimson kurta featuring intricate tonal embroidery across the neckline, sleeves, and hem. Paired with classic white bottoms, this elegant outfit creates a bold yet sophisticated look perfect for festive occasions or stylish everyday wear.', 1500.00, 0, 1),
(3, 'CO1', 'Olive Bloom Set', 'A stylish olive-green co-ord set featuring a flowy top with delicate white floral embroidery and a comfortable V-neck design. Paired with matching straight-fit pants, this outfit offers a fresh and modern ethnic look perfect for casual outings or relaxed festive wear.', 1500.00, 0, 1),
(3, 'CO1-1', 'Olive Bloom Set', 'A stylish olive-green co-ord set featuring a flowy top with delicate white floral embroidery and a comfortable V-neck design. Paired with matching straight-fit pants, this outfit offers a fresh and modern ethnic look perfect for casual outings or relaxed festive wear.', 1500.00, 0, 1),
(3, 'CO2', 'Terracotta Bloom Set', 'A stylish terracotta co-ord set featuring a flowy V-neck top with delicate white floral embroidery and gathered detailing. Paired with matching straight-fit pants, this outfit offers a chic and comfortable look perfect for casual outings or relaxed festive wear.', 1500.00, 0, 1),
(3, 'CO2-1', 'Terracotta Bloom Set', 'A stylish terracotta co-ord set featuring a flowy V-neck top with delicate white floral embroidery and gathered detailing. Paired with matching straight-fit pants, this outfit offers a chic and comfortable look perfect for casual outings or relaxed festive wear.', 1500.00, 0, 1),
(3, 'CO2-2', 'Terracotta Bloom Set', 'A stylish terracotta co-ord set featuring a flowy V-neck top with delicate white floral embroidery and gathered detailing. Paired with matching straight-fit pants, this outfit offers a chic and comfortable look perfect for casual outings or relaxed festive wear.', 1500.00, 0, 1),
(3, 'CO3', 'Midnight Bloom Set', 'A chic navy-blue co-ord set featuring a flowy V-neck top with subtle pleated detailing and delicate floral embroidery near the hem. Paired with matching straight-fit pants, this outfit offers a sleek and modern look perfect for casual outings or relaxed evening wear.', 1500.00, 0, 1),
(3, 'CO3-1', 'Midnight Bloom Set', 'A chic navy-blue co-ord set featuring a flowy V-neck top with subtle pleated detailing and delicate floral embroidery near the hem. Paired with matching straight-fit pants, this outfit offers a sleek and modern look perfect for casual outings or relaxed evening wear.', 1500.00, 0, 1),
(3, 'CO3-2', 'Midnight Bloom Set', 'A chic navy-blue co-ord set featuring a flowy V-neck top with subtle pleated detailing and delicate floral embroidery near the hem. Paired with matching straight-fit pants, this outfit offers a sleek and modern look perfect for casual outings or relaxed evening wear.', 1500.00, 0, 1),
(3, 'CO4', 'Indigo Garden Grace', 'A beautiful indigo-blue kurta featuring delicate white floral motifs and lace detailing along the neckline, sleeves, and hem. Paired with printed white bottoms, this outfit offers a fresh and elegant ethnic look perfect for casual outings or daytime gatherings.', 1500.00, 1, 1),
(3, 'CO4-1', 'Indigo Garden Grace', 'A beautiful indigo-blue kurta featuring delicate white floral motifs and lace detailing along the neckline, sleeves, and hem. Paired with printed white bottoms, this outfit offers a fresh and elegant ethnic look perfect for casual outings or daytime gatherings.', 1500.00, 0, 1),
(3, 'CO4-2', 'Indigo Garden Grace', 'A beautiful indigo-blue kurta featuring delicate white floral motifs and lace detailing along the neckline, sleeves, and hem. Paired with printed white bottoms, this outfit offers a fresh and elegant ethnic look perfect for casual outings or daytime gatherings.', 1500.00, 0, 1),
(3, 'CO5', 'Noir Floral Elegance', 'A sophisticated black kurta featuring intricate beige floral embroidery across the neckline and cuffs. The elegant detailing creates a refined and timeless look, perfect for evening gatherings or graceful everyday wear.', 2000.00, 1, 1),
(3, 'CO5-1', 'Noir Floral Elegance', 'A sophisticated black kurta featuring intricate beige floral embroidery across the neckline and cuffs. The elegant detailing creates a refined and timeless look, perfect for evening gatherings or graceful everyday wear.', 2000.00, 0, 1),
(3, 'CO5-2', 'Noir Floral Elegance', 'A sophisticated black kurta featuring intricate beige floral embroidery across the neckline and cuffs. The elegant detailing creates a refined and timeless look, perfect for evening gatherings or graceful everyday wear.', 2000.00, 0, 1),
(4, 'D1', 'Golden Royale Ensemble', 'An elegant mustard-yellow suit set adorned with intricate gold embroidery along the neckline, sleeves, and hem. Paired with a graceful peach dupatta featuring delicate embroidered motifs and scalloped borders, this outfit creates a regal and sophisticated look perfect for weddings and festive celebrations.', 1500.00, 1, 1),
(4, 'D1-1', 'Golden Royale Ensemble', 'An elegant mustard-yellow suit set adorned with intricate gold embroidery along the neckline, sleeves, and hem. Paired with a graceful peach dupatta featuring delicate embroidered motifs and scalloped borders, this outfit creates a regal and sophisticated look perfect for weddings and festive celebrations.', 1500.00, 0, 1),
(4, 'D1-2', 'Golden Royale Ensemble', 'An elegant mustard-yellow suit set adorned with intricate gold embroidery along the neckline, sleeves, and hem. Paired with a graceful peach dupatta featuring delicate embroidered motifs and scalloped borders, this outfit creates a regal and sophisticated look perfect for weddings and festive celebrations.', 1500.00, 0, 1),
(4, 'D1-3', 'Golden Royale Ensemble', 'An elegant mustard-yellow suit set adorned with intricate gold embroidery along the neckline, sleeves, and hem. Paired with a graceful peach dupatta featuring delicate embroidered motifs and scalloped borders, this outfit creates a regal and sophisticated look perfect for weddings and festive celebrations.', 1500.00, 0, 1),
(4, 'D10', 'Wine Blossom', 'A rich wine-colored dress material featuring elegant floral embroidery on the fabric. Paired with a matching bottom and a sheer embroidered dupatta, this unstitched set creates a luxurious and graceful look perfect for festive occasions and evening celebrations.', 3500.00, 0, 1),
(4, 'D10-1', 'Wine Blossom', 'A rich wine-colored dress material featuring elegant floral embroidery on the fabric. Paired with a matching bottom and a sheer embroidered dupatta, this unstitched set creates a luxurious and graceful look perfect for festive occasions and evening celebrations.', 3500.00, 0, 1),
(4, 'D10-2', 'Wine Blossom', 'A rich wine-colored dress material featuring elegant floral embroidery on the fabric. Paired with a matching bottom and a sheer embroidered dupatta, this unstitched set creates a luxurious and graceful look perfect for festive occasions and evening celebrations.', 3500.00, 0, 1),
(4, 'D11', 'Dusty Rose Floral', 'A beautiful dusty rose unstitched dress material featuring delicate floral prints on the fabric. Paired with a matching bottom and a soft flowing dupatta with subtle golden edging, this set offers a graceful and elegant look perfect for casual gatherings and festive wear.', 3000.00, 0, 1),
(4, 'D11-1', 'Dusty Rose Floral', 'A beautiful dusty rose unstitched dress material featuring delicate floral prints on the fabric. Paired with a matching bottom and a soft flowing dupatta with subtle golden edging, this set offers a graceful and elegant look perfect for casual gatherings and festive wear.', 3000.00, 0, 1),
(4, 'D11-2', 'Dusty Rose Floral', 'A beautiful dusty rose unstitched dress material featuring delicate floral prints on the fabric. Paired with a matching bottom and a soft flowing dupatta with subtle golden edging, this set offers a graceful and elegant look perfect for casual gatherings and festive wear.', 3000.00, 0, 1),
(4, 'D12', 'Ivory Grace Embroidered', 'An elegant ivory unstitched dress material adorned with delicate embroidery and subtle traditional motifs in pink and green. Paired with a matching bottom and a beautifully detailed dupatta, this set offers a refined and graceful look perfect for festive occasions and daytime celebrations.', 3000.00, 0, 1),
(4, 'D12-1', 'Ivory Grace Embroidered', 'An elegant ivory unstitched dress material adorned with delicate embroidery and subtle traditional motifs in pink and green. Paired with a matching bottom and a beautifully detailed dupatta, this set offers a refined and graceful look perfect for festive occasions and daytime celebrations.', 3000.00, 0, 1),
(4, 'D12-2', 'Ivory Grace Embroidered', 'An elegant ivory unstitched dress material adorned with delicate embroidery and subtle traditional motifs in pink and green. Paired with a matching bottom and a beautifully detailed dupatta, this set offers a refined and graceful look perfect for festive occasions and daytime celebrations.', 3000.00, 0, 1),
(4, 'D13', 'Festive Multicolor Embroidered', 'A vibrant unstitched dress material featuring colorful floral embroidery on a soft ivory base. Paired with a matching bottom and a bright multicolor patterned dupatta with tassel detailing, this set creates a lively and festive look perfect for celebrations and traditional occasions.', 2500.00, 1, 1),
(4, 'D13-1', 'Festive Multicolor Embroidered', 'A vibrant unstitched dress material featuring colorful floral embroidery on a soft ivory base. Paired with a matching bottom and a bright multicolor patterned dupatta with tassel detailing, this set creates a lively and festive look perfect for celebrations and traditional occasions.', 2500.00, 0, 1),
(4, 'D13-2', 'Festive Multicolor Embroidered', 'A vibrant unstitched dress material featuring colorful floral embroidery on a soft ivory base. Paired with a matching bottom and a bright multicolor patterned dupatta with tassel detailing, this set creates a lively and festive look perfect for celebrations and traditional occasions.', 2500.00, 0, 1),
(4, 'D14', 'Sunset Glow', 'A striking unstitched dress material featuring a vibrant orange kurta fabric adorned with subtle sequin detailing. Paired with a matching bottom and a contrasting olive green dupatta with delicate shimmer accents, this set creates a bold yet elegant look perfect for festive gatherings and special occasions.', 2000.00, 0, 1),
(4, 'D14-1', 'Sunset Glow', 'A striking unstitched dress material featuring a vibrant orange kurta fabric adorned with subtle sequin detailing. Paired with a matching bottom and a contrasting olive green dupatta with delicate shimmer accents, this set creates a bold yet elegant look perfect for festive gatherings and special occasions.', 2000.00, 0, 1),
(4, 'D14-2', 'Sunset Glow', 'A striking unstitched dress material featuring a vibrant orange kurta fabric adorned with subtle sequin detailing. Paired with a matching bottom and a contrasting olive green dupatta with delicate shimmer accents, this set creates a bold yet elegant look perfect for festive gatherings and special occasions.', 2000.00, 0, 1),
(4, 'D2', 'Crimson Shadow', 'A stylish crimson-red dress material featuring bold black abstract patterns and smooth, flowy fabric. This unstitched set offers a modern and elegant look, perfect for creating a custom outfit for festive occasions or stylish everyday wear.', 1500.00, 0, 1),
(4, 'D2-1', 'Crimson Shadow', 'A stylish crimson-red dress material featuring bold black abstract patterns and smooth, flowy fabric. This unstitched set offers a modern and elegant look, perfect for creating a custom outfit for festive occasions or stylish everyday wear.', 1500.00, 0, 1),
(4, 'D2-2', 'Crimson Shadow', 'A stylish crimson-red dress material featuring bold black abstract patterns and smooth, flowy fabric. This unstitched set offers a modern and elegant look, perfect for creating a custom outfit for festive occasions or stylish everyday wear.', 1500.00, 0, 1),
(4, 'D3', 'Golden Blossom', 'A beautiful golden-yellow dress material featuring intricate woven patterns and soft pastel floral designs on the fabric. Paired with a matching bottom and an elegant dupatta with delicate motifs, this unstitched set offers a rich and graceful look perfect for festive occasions and celebrations.', 1500.00, 0, 1),
(4, 'D3-1', 'Golden Blossom', 'A beautiful golden-yellow dress material featuring intricate woven patterns and soft pastel floral designs on the fabric. Paired with a matching bottom and an elegant dupatta with delicate motifs, this unstitched set offers a rich and graceful look perfect for festive occasions and celebrations.', 1500.00, 0, 1),
(4, 'D3-2', 'Golden Blossom', 'A beautiful golden-yellow dress material featuring intricate woven patterns and soft pastel floral designs on the fabric. Paired with a matching bottom and an elegant dupatta with delicate motifs, this unstitched set offers a rich and graceful look perfect for festive occasions and celebrations.', 1500.00, 0, 1),
(4, 'D4', 'Ivory Noir', 'An elegant ivory dress material featuring delicate black paisley motifs and intricate border detailing. Paired with a matching bottom and a beautifully patterned dupatta, this unstitched set offers a timeless and graceful look perfect for both casual and festive wear.', 2000.00, 0, 1),
(4, 'D4-1', 'Ivory Noir', 'An elegant ivory dress material featuring delicate black paisley motifs and intricate border detailing. Paired with a matching bottom and a beautifully patterned dupatta, this unstitched set offers a timeless and graceful look perfect for both casual and festive wear.', 2000.00, 0, 1),
(4, 'D4-2', 'Ivory Noir', 'An elegant ivory dress material featuring delicate black paisley motifs and intricate border detailing. Paired with a matching bottom and a beautifully patterned dupatta, this unstitched set offers a timeless and graceful look perfect for both casual and festive wear.', 2000.00, 0, 1),
(4, 'D5', 'Peach Meadow Print', 'A charming peach-toned fabric featuring delicate floral and leaf prints in soft orange, teal, and earthy hues. The elegant nature-inspired design gives it a fresh and graceful look, perfect for creating stylish everyday ethnic outfits.', 1500.00, 0, 1),
(4, 'D5-1', 'Peach Meadow Print', 'A charming peach-toned fabric featuring delicate floral and leaf prints in soft orange, teal, and earthy hues. The elegant nature-inspired design gives it a fresh and graceful look, perfect for creating stylish everyday ethnic outfits.', 1500.00, 0, 1),
(4, 'D5-2', 'Peach Meadow Print', 'A charming peach-toned fabric featuring delicate floral and leaf prints in soft orange, teal, and earthy hues. The elegant nature-inspired design gives it a fresh and graceful look, perfect for creating stylish everyday ethnic outfits.', 1500.00, 0, 1),
(4, 'D6', 'Midnight Blush', 'A stylish navy-blue dress material featuring elegant geometric motifs and delicate button detailing on the front panel. Paired with a soft blush-pink printed dupatta and matching fabric for the bottom, this unstitched set creates a chic and modern ethnic look perfect for casual or festive wear.', 3000.00, 0, 1),
(4, 'D6-1', 'Midnight Blush', 'A stylish navy-blue dress material featuring elegant geometric motifs and delicate button detailing on the front panel. Paired with a soft blush-pink printed dupatta and matching fabric for the bottom, this unstitched set creates a chic and modern ethnic look perfect for casual or festive wear.', 3000.00, 0, 1),
(4, 'D6-2', 'Midnight Blush', 'A stylish navy-blue dress material featuring elegant geometric motifs and delicate button detailing on the front panel. Paired with a soft blush-pink printed dupatta and matching fabric for the bottom, this unstitched set creates a chic and modern ethnic look perfect for casual or festive wear.', 3000.00, 0, 1),
(4, 'D7', 'Sandstone Floral', 'An elegant sandstone-beige dress material featuring delicate floral and paisley prints with subtle earthy tones. Paired with a soft shimmering dupatta and a coordinated printed top fabric, this unstitched set creates a graceful and sophisticated look perfect for festive and semi-formal occasions.', 3000.00, 0, 1),
(4, 'D7-1', 'Sandstone Floral', 'An elegant sandstone-beige dress material featuring delicate floral and paisley prints with subtle earthy tones. Paired with a soft shimmering dupatta and a coordinated printed top fabric, this unstitched set creates a graceful and sophisticated look perfect for festive and semi-formal occasions.', 3000.00, 0, 1),
(4, 'D7-2', 'Sandstone Floral', 'An elegant sandstone-beige dress material featuring delicate floral and paisley prints with subtle earthy tones. Paired with a soft shimmering dupatta and a coordinated printed top fabric, this unstitched set creates a graceful and sophisticated look perfect for festive and semi-formal occasions.', 3000.00, 0, 1),
(4, 'D8', 'Aqua Blossom', 'A refreshing aqua-blue dress material featuring intricate white floral embroidery on the neckline and sleeves. Paired with a matching bottom and a beautifully embroidered dupatta, this unstitched set offers a graceful and elegant look perfect for festive occasions or daytime celebrations.', 3200.00, 0, 1),
(4, 'D8-1', 'Aqua Blossom', 'A refreshing aqua-blue dress material featuring intricate white floral embroidery on the neckline and sleeves. Paired with a matching bottom and a beautifully embroidered dupatta, this unstitched set offers a graceful and elegant look perfect for festive occasions or daytime celebrations.', 3200.00, 0, 1),
(4, 'D8-2', 'Aqua Blossom', 'A refreshing aqua-blue dress material featuring intricate white floral embroidery on the neckline and sleeves. Paired with a matching bottom and a beautifully embroidered dupatta, this unstitched set offers a graceful and elegant look perfect for festive occasions or daytime celebrations.', 3200.00, 0, 1),
(4, 'D9', 'Sunlit Mustard', 'A vibrant mustard-yellow dress material featuring elegant white geometric and floral-inspired prints. Paired with matching fabric for the bottom and dupatta, this unstitched set offers a bright and stylish look perfect for casual wear or daytime outings.', 3200.00, 0, 1),
(4, 'D9-1', 'Sunlit Mustard', 'A vibrant mustard-yellow dress material featuring elegant white geometric and floral-inspired prints. Paired with matching fabric for the bottom and dupatta, this unstitched set offers a bright and stylish look perfect for casual wear or daytime outings.', 3200.00, 0, 1),
(4, 'D9-2', 'Sunlit Mustard', 'A vibrant mustard-yellow dress material featuring elegant white geometric and floral-inspired prints. Paired with matching fabric for the bottom and dupatta, this unstitched set offers a bright and stylish look perfect for casual wear or daytime outings.', 3200.00, 0, 1),
(6, 'S1', 'Classic Noir', 'A timeless black suit set featuring elegant traditional prints and intricate patterns throughout the kurta and dupatta. Paired with matching printed bottoms and a graceful dupatta, this outfit offers a sophisticated yet comfortable look perfect for casual gatherings, office wear, and everyday elegance.', 1000.00, 0, 1),
(6, 'S1-1\n', 'Classic Noir', 'A timeless black suit set featuring elegant traditional prints and intricate patterns throughout the kurta and dupatta. Paired with matching printed bottoms and a graceful dupatta, this outfit offers a sophisticated yet comfortable look perfect for casual gatherings, office wear, and everyday elegance.', 1000.00, 0, 1),
(6, 'S1-2', 'Classic Noir', 'A timeless black suit set featuring elegant traditional prints and intricate patterns throughout the kurta and dupatta. Paired with matching printed bottoms and a graceful dupatta, this outfit offers a sophisticated yet comfortable look perfect for casual gatherings, office wear, and everyday elegance.', 1000.00, 0, 1),
(6, 'S10', 'Ivory Blossom', 'A charming ivory printed suit set featuring delicate floral motifs in warm tones. Paired with matching bottoms and a beautifully printed dupatta, it creates a comfortable and elegant look perfect for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S10-1', 'Ivory Blossom', 'A charming ivory printed suit set featuring delicate floral motifs in warm tones. Paired with matching bottoms and a beautifully printed dupatta, it creates a comfortable and elegant look perfect for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S10-2', 'Ivory Blossom', 'A charming ivory printed suit set featuring delicate floral motifs in warm tones. Paired with matching bottoms and a beautifully printed dupatta, it creates a comfortable and elegant look perfect for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S11', 'Rosewood Printed', 'A stylish rosewood printed suit set featuring elegant traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look for everyday wear and casual outings.', 1500.00, 0, 1),
(6, 'S11-1', 'Rosewood Printed', 'A stylish rosewood printed suit set featuring elegant traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look for everyday wear and casual outings.', 1500.00, 0, 1),
(6, 'S11-2', 'Rosewood Printed', 'A stylish rosewood printed suit set featuring elegant traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look for everyday wear and casual outings.', 1500.00, 0, 1),
(6, 'S12', 'Pink Garden', 'A beautiful pink printed suit set featuring elegant floral patterns. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for casual outings and everyday wear.', 1500.00, 0, 1),
(6, 'S12-1', 'Pink Garden', 'A beautiful pink printed suit set featuring elegant floral patterns. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for casual outings and everyday wear.', 1500.00, 0, 1),
(6, 'S12-2', 'Pink Garden', 'A beautiful pink printed suit set featuring elegant floral patterns. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for casual outings and everyday wear.', 1500.00, 0, 1),
(6, 'S13', 'Cream Paisley', 'A graceful cream suit set featuring delicate paisley prints and subtle traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and elegant look for everyday wear.', 1000.00, 0, 1),
(6, 'S13-1', 'Cream Paisley', 'A graceful cream suit set featuring delicate paisley prints and subtle traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and elegant look for everyday wear.', 1000.00, 0, 1),
(6, 'S13-2', 'Cream Paisley', 'A graceful cream suit set featuring delicate paisley prints and subtle traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and elegant look for everyday wear.', 1000.00, 0, 1),
(6, 'S14', 'Beige Rust', 'An elegant beige suit set featuring delicate traditional prints with rust-toned accents. Paired with matching bottoms and a beautifully patterned dupatta, it offers a graceful and comfortable look for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S14-1', 'Beige Rust', 'An elegant beige suit set featuring delicate traditional prints with rust-toned accents. Paired with matching bottoms and a beautifully patterned dupatta, it offers a graceful and comfortable look for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S14-2', 'Beige Rust', 'An elegant beige suit set featuring delicate traditional prints with rust-toned accents. Paired with matching bottoms and a beautifully patterned dupatta, it offers a graceful and comfortable look for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S15', 'Rust Charm', 'A vibrant rust-colored suit set featuring elegant traditional prints. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look for everyday wear and casual occasions.', 2000.00, 1, 1),
(6, 'S15-1', 'Rust Charm', 'A vibrant rust-colored suit set featuring elegant traditional prints. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look for everyday wear and casual occasions.', 2000.00, 0, 1),
(6, 'S15-2', 'Rust Charm', 'A vibrant rust-colored suit set featuring elegant traditional prints. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look for everyday wear and casual occasions.', 2000.00, 0, 1),
(6, 'S16', 'Crimson Bloom', 'A stunning crimson suit set featuring elegant floral prints and traditional detailing. Paired with matching bottoms and a coordinated dupatta, it creates a graceful look perfect for casual outings and festive wear.', 1500.00, 0, 1),
(6, 'S16-1', 'Crimson Bloom', 'A stunning crimson suit set featuring elegant floral prints and traditional detailing. Paired with matching bottoms and a coordinated dupatta, it creates a graceful look perfect for casual outings and festive wear.', 1500.00, 0, 1),
(6, 'S16-2', 'Crimson Bloom', 'A stunning crimson suit set featuring elegant floral prints and traditional detailing. Paired with matching bottoms and a coordinated dupatta, it creates a graceful look perfect for casual outings and festive wear.', 1500.00, 0, 1),
(6, 'S17', 'Twilight Floral', 'A stylish navy blue suit set featuring bold floral prints and elegant patterns. Paired with matching bottoms and a coordinated dupatta, it offers a chic and comfortable look for casual outings and everyday wear.', 1000.00, 0, 1),
(6, 'S17-1', 'Twilight Floral', 'A stylish navy blue suit set featuring bold floral prints and elegant patterns. Paired with matching bottoms and a coordinated dupatta, it offers a chic and comfortable look for casual outings and everyday wear.', 1000.00, 0, 1),
(6, 'S17-2', 'Twilight Floral', 'A stylish navy blue suit set featuring bold floral prints and elegant patterns. Paired with matching bottoms and a coordinated dupatta, it offers a chic and comfortable look for casual outings and everyday wear.', 1000.00, 0, 1),
(6, 'S18', 'Fuchsia Blossom', 'A vibrant fuchsia suit set featuring delicate floral prints throughout the fabric. Paired with matching bottoms and a coordinated dupatta, it offers a bright and elegant look perfect for casual outings and everyday ethnic wear.', 1200.00, 0, 1),
(6, 'S18-1', 'Fuchsia Blossom', 'A vibrant fuchsia suit set featuring delicate floral prints throughout the fabric. Paired with matching bottoms and a coordinated dupatta, it offers a bright and elegant look perfect for casual outings and everyday ethnic wear.', 1200.00, 0, 1),
(6, 'S18-2', 'Fuchsia Blossom', 'A vibrant fuchsia suit set featuring delicate floral prints throughout the fabric. Paired with matching bottoms and a coordinated dupatta, it offers a bright and elegant look perfect for casual outings and everyday ethnic wear.', 1200.00, 0, 1),
(6, 'S19', 'Sunshine Charm', 'A bright yellow printed suit set featuring elegant traditional patterns and geometric motifs. Paired with matching bottoms and a coordinated dupatta, it offers a fresh and cheerful look perfect for everyday wear and casual outings.', 1000.00, 0, 1),
(6, 'S19-1', 'Sunshine Charm', 'A bright yellow printed suit set featuring elegant traditional patterns and geometric motifs. Paired with matching bottoms and a coordinated dupatta, it offers a fresh and cheerful look perfect for everyday wear and casual outings.', 1000.00, 0, 1),
(6, 'S19-2', 'Sunshine Charm', 'A bright yellow printed suit set featuring elegant traditional patterns and geometric motifs. Paired with matching bottoms and a coordinated dupatta, it offers a fresh and cheerful look perfect for everyday wear and casual outings.', 1000.00, 0, 1),
(6, 'S2', 'Midnight Heritage', 'A stylish black suit set featuring intricate traditional prints with elegant floral and geometric patterns. Paired with a matching printed dupatta and coordinated bottoms, this outfit offers a blend of classic charm and modern elegance—perfect for casual outings, office wear, and everyday style.', 1000.00, 0, 1),
(6, 'S2-1', 'Midnight Heritage', 'A stylish black suit set featuring intricate traditional prints with elegant floral and geometric patterns. Paired with a matching printed dupatta and coordinated bottoms, this outfit offers a blend of classic charm and modern elegance—perfect for casual outings, office wear, and everyday style.', 1000.00, 0, 1),
(6, 'S2-2', 'Midnight Heritage', 'A stylish black suit set featuring intricate traditional prints with elegant floral and geometric patterns. Paired with a matching printed dupatta and coordinated bottoms, this outfit offers a blend of classic charm and modern elegance—perfect for casual outings, office wear, and everyday style.', 1000.00, 0, 1),
(6, 'S20', 'Maroon Heritage', 'An elegant maroon suit set featuring traditional motifs and detailed prints. Paired with matching bottoms and a beautifully patterned dupatta, it offers a graceful look perfect for casual and festive occasions.', 1200.00, 0, 1),
(6, 'S20-1', 'Maroon Heritage', 'An elegant maroon suit set featuring traditional motifs and detailed prints. Paired with matching bottoms and a beautifully patterned dupatta, it offers a graceful look perfect for casual and festive occasions.', 1200.00, 0, 1),
(6, 'S20-2', 'Maroon Heritage', 'An elegant maroon suit set featuring traditional motifs and detailed prints. Paired with matching bottoms and a beautifully patterned dupatta, it offers a graceful look perfect for casual and festive occasions.', 1200.00, 0, 1),
(6, 'S21', 'Teal Elegance', 'A graceful teal suit set featuring delicate traditional motifs and subtle detailing. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1500.00, 0, 1),
(6, 'S21-1', 'Teal Elegance', 'A graceful teal suit set featuring delicate traditional motifs and subtle detailing. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1500.00, 0, 1),
(6, 'S21-2', 'Teal Elegance', 'A graceful teal suit set featuring delicate traditional motifs and subtle detailing. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1500.00, 0, 1),
(6, 'S22', 'Olive Grace', 'A beautiful olive green suit set featuring elegant traditional prints and subtle patterns. Paired with matching bottoms and a coordinated dupatta, it offers a fresh and comfortable look perfect for everyday wear and casual outings.', 1000.00, 0, 1),
(6, 'S22-1', 'Olive Grace', 'A beautiful olive green suit set featuring elegant traditional prints and subtle patterns. Paired with matching bottoms and a coordinated dupatta, it offers a fresh and comfortable look perfect for everyday wear and casual outings.', 1000.00, 0, 1),
(6, 'S22-2', 'Olive Grace', 'A beautiful olive green suit set featuring elegant traditional prints and subtle patterns. Paired with matching bottoms and a coordinated dupatta, it offers a fresh and comfortable look perfect for everyday wear and casual outings.', 1000.00, 0, 1),
(6, 'S23', 'Midnight Indigo', 'A graceful indigo suit set featuring elegant traditional prints and intricate neckline detailing. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1000.00, 0, 1),
(6, 'S23-1', 'Midnight Indigo', 'A graceful indigo suit set featuring elegant traditional prints and intricate neckline detailing. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1000.00, 0, 1),
(6, 'S23-2', 'Midnight Indigo', 'A graceful indigo suit set featuring elegant traditional prints and intricate neckline detailing. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1000.00, 0, 1),
(6, 'S24', 'Noir Ruby', 'A stylish black suit set featuring rich ruby-red traditional prints and detailed neckline work. Paired with matching bottoms and a beautifully patterned dupatta, it creates a graceful look perfect for casual and festive occasions.', 1500.00, 0, 1),
(6, 'S24-1', 'Noir Ruby', 'A stylish black suit set featuring rich ruby-red traditional prints and detailed neckline work. Paired with matching bottoms and a beautifully patterned dupatta, it creates a graceful look perfect for casual and festive occasions.', 1500.00, 0, 1),
(6, 'S24-2', 'Noir Ruby', 'A stylish black suit set featuring rich ruby-red traditional prints and detailed neckline work. Paired with matching bottoms and a beautifully patterned dupatta, it creates a graceful look perfect for casual and festive occasions.', 1500.00, 0, 1),
(6, 'S25', 'Maroon Royal', 'A rich maroon suit set featuring elegant traditional prints and detailed neckline work. Paired with matching bottoms and a beautifully patterned dupatta, it creates a graceful look perfect for festive and special occasions.', 1500.00, 1, 1),
(6, 'S25-1', 'Maroon Royal', 'A rich maroon suit set featuring elegant traditional prints and detailed neckline work. Paired with matching bottoms and a beautifully patterned dupatta, it creates a graceful look perfect for festive and special occasions.', 1500.00, 0, 1),
(6, 'S25-2', 'Maroon Royal', 'A rich maroon suit set featuring elegant traditional prints and detailed neckline work. Paired with matching bottoms and a beautifully patterned dupatta, it creates a graceful look perfect for festive and special occasions.', 1500.00, 0, 1),
(6, 'S26', 'Midnight Royal', 'A sophisticated black suit set featuring elegant traditional patterns and detailed neckline work. Paired with matching bottoms and a richly patterned dupatta, it creates a graceful look perfect for festive and evening occasions.', 1200.00, 0, 1),
(6, 'S26-1', 'Midnight Royal', 'A sophisticated black suit set featuring elegant traditional patterns and detailed neckline work. Paired with matching bottoms and a richly patterned dupatta, it creates a graceful look perfect for festive and evening occasions.', 1200.00, 0, 1),
(6, 'S26-2', 'Midnight Royal', 'A sophisticated black suit set featuring elegant traditional patterns and detailed neckline work. Paired with matching bottoms and a richly patterned dupatta, it creates a graceful look perfect for festive and evening occasions.', 1200.00, 0, 1);
INSERT INTO `products` (`category_num`, `product_code`, `product_name`, `description`, `price`, `is_featured`, `is_active`) VALUES
(6, 'S27', 'Ruby Classic', 'A beautiful ruby red suit set featuring elegant traditional prints and detailed neckline design. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S27-1', 'Ruby Classic', 'A beautiful ruby red suit set featuring elegant traditional prints and detailed neckline design. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S27-2', 'Ruby Classic', 'A beautiful ruby red suit set featuring elegant traditional prints and detailed neckline design. Paired with matching bottoms and a coordinated dupatta, it offers a stylish and comfortable look perfect for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S28', 'Coral Glow', 'A vibrant coral suit set featuring elegant traditional prints and delicate patterns. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look perfect for casual and festive occasions.', 2000.00, 0, 1),
(6, 'S28-1', 'Coral Glow', 'A vibrant coral suit set featuring elegant traditional prints and delicate patterns. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look perfect for casual and festive occasions.', 2000.00, 0, 1),
(6, 'S28-2', 'Coral Glow', 'A vibrant coral suit set featuring elegant traditional prints and delicate patterns. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look perfect for casual and festive occasions.', 2000.00, 0, 1),
(6, 'S29', 'Azure Charm', 'A beautiful azure blue suit set featuring elegant traditional prints and circular motifs. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look perfect for everyday wear and casual outings.', 2000.00, 0, 1),
(6, 'S29-1', 'Azure Charm', 'A beautiful azure blue suit set featuring elegant traditional prints and circular motifs. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look perfect for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S29-2', 'Azure Charm', 'A beautiful azure blue suit set featuring elegant traditional prints and circular motifs. Paired with matching bottoms and a coordinated dupatta, it offers a graceful and comfortable look perfect for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S3', 'Blush Breeze', 'A charming blush pink suit set featuring soft stripes and delicate floral prints for a fresh and elegant look. Paired with a matching printed bottom and a lightweight floral dupatta, this outfit offers a comfortable yet stylish choice perfect for everyday wear, casual outings, and daytime gatherings.', 1500.00, 0, 1),
(6, 'S3-1', 'Blush Breeze', 'A charming blush pink suit set featuring soft stripes and delicate floral prints for a fresh and elegant look. Paired with a matching printed bottom and a lightweight floral dupatta, this outfit offers a comfortable yet stylish choice perfect for everyday wear, casual outings, and daytime gatherings.', 1500.00, 0, 1),
(6, 'S3-2', 'Blush Breeze', 'A charming blush pink suit set featuring soft stripes and delicate floral prints for a fresh and elegant look. Paired with a matching printed bottom and a lightweight floral dupatta, this outfit offers a comfortable yet stylish choice perfect for everyday wear, casual outings, and daytime gatherings.', 1500.00, 0, 1),
(6, 'S30', 'Olive Classic', 'A graceful olive green suit set featuring elegant traditional prints and subtle patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and stylish look perfect for everyday wear and casual occasions.', 1500.00, 0, 1),
(6, 'S30-1', 'Olive Classic', 'A graceful olive green suit set featuring elegant traditional prints and subtle patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and stylish look perfect for everyday wear and casual occasions.', 1500.00, 0, 1),
(6, 'S31', 'Sunshine Mustard', 'A vibrant mustard yellow suit set featuring delicate traditional prints and a flowing dupatta. Perfect for adding a bright and elegant touch to your everyday or festive wardrobe.', 1500.00, 0, 1),
(6, 'S31-1', 'Sunshine Mustard', 'A vibrant mustard yellow suit set featuring delicate traditional prints and a flowing dupatta. Perfect for adding a bright and elegant touch to your everyday or festive wardrobe.', 1200.00, 0, 1),
(6, 'S31-2', 'Sunshine Mustard', 'A vibrant mustard yellow suit set featuring delicate traditional prints and a flowing dupatta. Perfect for adding a bright and elegant touch to your everyday or festive wardrobe.', 1200.00, 0, 1),
(6, 'S32', 'Royal Plum', 'A stylish plum purple suit set featuring elegant circular prints and a matching patterned dupatta. Comfortable and graceful, it’s perfect for casual outings or festive gatherings.', 1000.00, 0, 1),
(6, 'S32-1', 'Royal Plum', 'A stylish plum purple suit set featuring elegant circular prints and a matching patterned dupatta. Comfortable and graceful, it’s perfect for casual outings or festive gatherings.', 1000.00, 0, 1),
(6, 'S32-2', 'Royal Plum', 'A stylish plum purple suit set featuring elegant circular prints and a matching patterned dupatta. Comfortable and graceful, it’s perfect for casual outings or festive gatherings.', 1000.00, 0, 1),
(6, 'S33', 'Lime Zari', 'A refreshing lime green suit set featuring delicate dotted prints, intricate zari embroidery, and a beautifully patterned dupatta. Elegant and comfortable, perfect for festive and daytime occasions.', 1500.00, 0, 1),
(6, 'S33-1', 'Lime Zari', 'A refreshing lime green suit set featuring delicate dotted prints, intricate zari embroidery, and a beautifully patterned dupatta. Elegant and comfortable, perfect for festive and daytime occasions.', 1500.00, 0, 1),
(6, 'S33-2', 'Lime Zari', 'A refreshing lime green suit set featuring delicate dotted prints, intricate zari embroidery, and a beautifully patterned dupatta. Elegant and comfortable, perfect for festive and daytime occasions.', 1500.00, 0, 1),
(6, 'S34', 'Wine Heritage', 'An elegant wine-colored suit set featuring traditional prints and a coordinated dupatta. Stylish and comfortable, perfect for festive occasions and graceful everyday wear', 1000.00, 0, 1),
(6, 'S34-1', 'Wine Heritage', 'An elegant wine-colored suit set featuring traditional prints and a coordinated dupatta. Stylish and comfortable, perfect for festive occasions and graceful everyday wear', 1000.00, 0, 1),
(6, 'S34-2', 'Wine Heritage', 'An elegant wine-colored suit set featuring traditional prints and a coordinated dupatta. Stylish and comfortable, perfect for festive occasions and graceful everyday wear', 1000.00, 0, 1),
(6, 'S4', 'Rose Charm', 'A graceful soft pink suit set featuring delicate traditional prints and subtle neckline detailing. Paired with a matching bottom and a lightweight pink and white dupatta, this outfit offers a comfortable yet elegant look perfect for daily wear, casual outings, and relaxed gatherings.', 1000.00, 0, 1),
(6, 'S4-1', 'Rose Charm', 'A graceful soft pink suit set featuring delicate traditional prints and subtle neckline detailing. Paired with a matching bottom and a lightweight pink and white dupatta, this outfit offers a comfortable yet elegant look perfect for daily wear, casual outings, and relaxed gatherings.', 1000.00, 0, 1),
(6, 'S4-2', 'Rose Charm', 'A graceful soft pink suit set featuring delicate traditional prints and subtle neckline detailing. Paired with a matching bottom and a lightweight pink and white dupatta, this outfit offers a comfortable yet elegant look perfect for daily wear, casual outings, and relaxed gatherings.', 1000.00, 0, 1),
(6, 'S5', 'Teal Blossom', 'A refreshing teal suit set featuring delicate floral prints and subtle embroidered detailing on the neckline. Paired with a coordinated printed dupatta and matching bottoms, this outfit offers a comfortable yet stylish look perfect for everyday wear, casual outings, and relaxed gatherings.', 1500.00, 0, 1),
(6, 'S5-1', 'Teal Blossom', 'A refreshing teal suit set featuring delicate floral prints and subtle embroidered detailing on the neckline. Paired with a coordinated printed dupatta and matching bottoms, this outfit offers a comfortable yet stylish look perfect for everyday wear, casual outings, and relaxed gatherings.', 1500.00, 0, 1),
(6, 'S5-2', 'Teal Blossom', 'A refreshing teal suit set featuring delicate floral prints and subtle embroidered detailing on the neckline. Paired with a coordinated printed dupatta and matching bottoms, this outfit offers a comfortable yet stylish look perfect for everyday wear, casual outings, and relaxed gatherings.', 1500.00, 0, 1),
(6, 'S6', 'Lavender Mist', 'A soft lavender suit set featuring delicate traditional prints and subtle embroidered detailing on the neckline. Paired with matching bottoms and a lightweight printed dupatta, this outfit offers a graceful and comfortable look perfect for everyday wear, casual outings, and daytime gatherings.', 1500.00, 0, 1),
(6, 'S6-1', 'Lavender Mist', 'A soft lavender suit set featuring delicate traditional prints and subtle embroidered detailing on the neckline. Paired with matching bottoms and a lightweight printed dupatta, this outfit offers a graceful and comfortable look perfect for everyday wear, casual outings, and daytime gatherings.', 1500.00, 0, 1),
(6, 'S6-2', 'Lavender Mist', 'A soft lavender suit set featuring delicate traditional prints and subtle embroidered detailing on the neckline. Paired with matching bottoms and a lightweight printed dupatta, this outfit offers a graceful and comfortable look perfect for everyday wear, casual outings, and daytime gatherings.', 1500.00, 0, 1),
(6, 'S7', 'Rose Blossom', 'A beautiful pink printed suit set with delicate floral patterns and traditional prints. Paired with matching bottoms and a coordinating dupatta, it is perfect for casual outings and everyday ethnic wear.', 2000.00, 0, 1),
(6, 'S7-1', 'Rose Blossom', 'A beautiful pink printed suit set with delicate floral patterns and traditional prints. Paired with matching bottoms and a coordinating dupatta, it is perfect for casual outings and everyday ethnic wear.', 2000.00, 0, 1),
(6, 'S7-2', 'Rose Blossom', 'A beautiful pink printed suit set with delicate floral patterns and traditional prints. Paired with matching bottoms and a coordinating dupatta, it is perfect for casual outings and everyday ethnic wear.', 2000.00, 0, 1),
(6, 'S8', 'Teal Grace', 'A stylish teal printed suit set featuring delicate traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and elegant look for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S8-1', 'Teal Grace', 'A stylish teal printed suit set featuring delicate traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and elegant look for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S8-2', 'Teal Grace', 'A stylish teal printed suit set featuring delicate traditional patterns. Paired with matching bottoms and a coordinated dupatta, it offers a comfortable and elegant look for everyday wear and casual outings.', 1200.00, 0, 1),
(6, 'S9', 'Blush Bloom', 'A graceful cream and pink printed suit set featuring delicate floral patterns. Paired with matching bottoms and a coordinated dupatta, it offers a soft and elegant look perfect for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S9-1', 'Blush Bloom', 'A graceful cream and pink printed suit set featuring delicate floral patterns. Paired with matching bottoms and a coordinated dupatta, it offers a soft and elegant look perfect for everyday wear and casual occasions.', 1200.00, 0, 1),
(6, 'S9-2', 'Blush Bloom', 'A graceful cream and pink printed suit set featuring delicate floral patterns. Paired with matching bottoms and a coordinated dupatta, it offers a soft and elegant look perfect for everyday wear and casual occasions.', 1200.00, 0, 1),
(5, 'SH1', 'Lavender Bloom', 'A stunning lavender suit set featuring intricate floral embroidery and delicate embellishments across the kurta and flowing skirt. Paired with a matching embroidered dupatta, this elegant ensemble creates a graceful and sophisticated look perfect for festive occasions, weddings, and special celebrations.', 3500.00, 0, 1),
(5, 'SH1-1', 'Lavender Bloom', 'A stunning lavender suit set featuring intricate floral embroidery and delicate embellishments across the kurta and flowing skirt. Paired with a matching embroidered dupatta, this elegant ensemble creates a graceful and sophisticated look perfect for festive occasions, weddings, and special celebrations.', 3500.00, 0, 1),
(5, 'SH1-2', 'Lavender Bloom', 'A stunning lavender suit set featuring intricate floral embroidery and delicate embellishments across the kurta and flowing skirt. Paired with a matching embroidered dupatta, this elegant ensemble creates a graceful and sophisticated look perfect for festive occasions, weddings, and special celebrations.', 3500.00, 0, 1),
(5, 'SH1-3', 'Lavender Bloom', 'A stunning lavender suit set featuring intricate floral embroidery and delicate embellishments across the kurta and flowing skirt. Paired with a matching embroidered dupatta, this elegant ensemble creates a graceful and sophisticated look perfect for festive occasions, weddings, and special celebrations.', 3500.00, 0, 1),
(5, 'SH2', 'Midnight Elegance Embroidered', 'A stunning black suit set featuring intricate multicolor floral embroidery across the kurta and flowing skirt. Paired with a beautifully embroidered dupatta, this elegant ensemble offers a sophisticated and graceful look perfect for festive events, parties, and special occasions.', 3000.00, 0, 1),
(5, 'SH2-1', 'Midnight Elegance Embroidered', 'A stunning black suit set featuring intricate multicolor floral embroidery across the kurta and flowing skirt. Paired with a beautifully embroidered dupatta, this elegant ensemble offers a sophisticated and graceful look perfect for festive events, parties, and special occasions.', 3000.00, 0, 1),
(5, 'SH3', 'Ivory Blossom', 'A graceful ivory suit set beautifully adorned with delicate multicolor floral embroidery and fine embellishments. Paired with a flowing embroidered sharara and an elegant dupatta with detailed borders, this ensemble offers a timeless and sophisticated look perfect for weddings, festive gatherings, and special occasions.', 3000.00, 0, 1),
(5, 'SH3-1', 'Ivory Blossom', 'A graceful ivory suit set beautifully adorned with delicate multicolor floral embroidery and fine embellishments. Paired with a flowing embroidered sharara and an elegant dupatta with detailed borders, this ensemble offers a timeless and sophisticated look perfect for weddings, festive gatherings, and special occasions.', 3000.00, 0, 1),
(5, 'SH4', 'Emerald Garden Embroidered', 'A stunning deep emerald suit set featuring intricate floral embroidery across the kurta and flowing skirt. Paired with a beautifully detailed dupatta with embroidered borders, this elegant ensemble offers a regal and graceful look perfect for weddings, festive celebrations, and special occasions.', 3500.00, 1, 1),
(5, 'SH4-1', 'Emerald Garden Embroidered', 'A stunning deep emerald suit set featuring intricate floral embroidery across the kurta and flowing skirt. Paired with a beautifully detailed dupatta with embroidered borders, this elegant ensemble offers a regal and graceful look perfect for weddings, festive celebrations, and special occasions.', 3500.00, 0, 1),
(5, 'SH5', 'Ruby Royale Embroidered', 'A stunning ruby red suit set beautifully adorned with intricate gold floral embroidery and delicate multicolor accents. Paired with matching embroidered bottoms and a graceful dupatta with detailed borders, this ensemble offers a rich and festive look perfect for weddings, celebrations, and special occasions.', 3500.00, 0, 1),
(5, 'SH5-1', 'Ruby Royale Embroidered', 'A stunning ruby red suit set beautifully adorned with intricate gold floral embroidery and delicate multicolor accents. Paired with matching embroidered bottoms and a graceful dupatta with detailed borders, this ensemble offers a rich and festive look perfect for weddings, celebrations, and special occasions.', 3500.00, 0, 1),
(5, 'SH6', 'Olive Garden Embroidered', 'A beautiful olive green sharara set featuring delicate multicolor floral embroidery on the kurta and intricate detailing on the flowing sharara. Paired with a soft embroidered dupatta, this elegant ensemble offers a graceful and festive look perfect for weddings, celebrations, and special occasions.', 3000.00, 1, 1),
(5, 'SH6-1', 'Olive Garden Embroidered', 'A beautiful olive green sharara set featuring delicate multicolor floral embroidery on the kurta and intricate detailing on the flowing sharara. Paired with a soft embroidered dupatta, this elegant ensemble offers a graceful and festive look perfect for weddings, celebrations, and special occasions.', 3000.00, 0, 1),
(5, 'SH6-2', 'Olive Garden Embroidered', 'A beautiful olive green sharara set featuring delicate multicolor floral embroidery on the kurta and intricate detailing on the flowing sharara. Paired with a soft embroidered dupatta, this elegant ensemble offers a graceful and festive look perfect for weddings, celebrations, and special occasions.', 3000.00, 0, 1),
(5, 'SH6-3', 'Olive Garden Embroidered', 'A beautiful olive green sharara set featuring delicate multicolor floral embroidery on the kurta and intricate detailing on the flowing sharara. Paired with a soft embroidered dupatta, this elegant ensemble offers a graceful and festive look perfect for weddings, celebrations, and special occasions.', 3000.00, 0, 1),
(5, 'SH6-4', 'Olive Garden Embroidered', 'A beautiful olive green sharara set featuring delicate multicolor floral embroidery on the kurta and intricate detailing on the flowing sharara. Paired with a soft embroidered dupatta, this elegant ensemble offers a graceful and festive look perfect for weddings, celebrations, and special occasions.', 3000.00, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_code`, `image_path`) VALUES
(128, 'A1', 'assets/images/anarkali_suit/A1.jpeg'),
(129, 'A1-1', 'assets/images/anarkali_suit/A1-1.jpeg'),
(130, 'A1-2', 'assets/images/anarkali_suit/A1-2.jpeg'),
(131, 'A2', 'assets/images/anarkali_suit/A2.jpeg'),
(132, 'A2-1', 'assets/images/anarkali_suit/A2-1.jpeg'),
(133, 'A3', 'assets/images/anarkali_suit/A3.jpeg'),
(134, 'A3-1', 'assets/images/anarkali_suit/A3-1.jpeg'),
(135, 'A3-2', 'assets/images/anarkali_suit/A3-2.jpeg'),
(136, 'A4', 'assets/images/anarkali_suit/A4.jpeg'),
(137, 'A4-1', 'assets/images/anarkali_suit/A4-1.jpeg'),
(138, 'A4-2', 'assets/images/anarkali_suit/A4-2.jpeg'),
(139, 'A5', 'assets/images/anarkali_suit/A5.jpeg'),
(140, 'A5-1', 'assets/images/anarkali_suit/A5-1.jpeg'),
(141, 'A5-2', 'assets/images/anarkali_suit/A5-2.jpeg'),
(142, 'A6', 'assets/images/anarkali_suit/A6.jpeg'),
(143, 'A6-1', 'assets/images/anarkali_suit/A6-1.jpeg'),
(144, 'A6-2', 'assets/images/anarkali_suit/A6-2.jpeg'),
(145, 'A7', 'assets/images/anarkali_suit/A7.jpeg'),
(146, 'A7-1', 'assets/images/anarkali_suit/A7-1.jpeg'),
(147, 'A7-2', 'assets/images/anarkali_suit/A7-2.jpeg'),
(148, 'A8', 'assets/images/anarkali_suit/A8.jpeg'),
(149, 'A8-1', 'assets/images/anarkali_suit/A8-1.jpeg'),
(150, 'A8-2', 'assets/images/anarkali_suit/A8-2.jpeg'),
(151, 'A9', 'assets/images/anarkali_suit/A9.jpeg'),
(152, 'A9-1', 'assets/images/anarkali_suit/A9-1.jpeg'),
(153, 'A9-2', 'assets/images/anarkali_suit/A9-2.jpeg'),
(154, 'C1', 'assets/images/chikankari/C1.jpeg'),
(155, 'C1-1', 'assets/images/chikankari/C1-1.jpeg'),
(156, 'C1-2', 'assets/images/chikankari/C1-2.jpeg'),
(157, 'C2', 'assets/images/chikankari/C2.jpeg'),
(158, 'C2-1', 'assets/images/chikankari/C2-1.jpeg'),
(159, 'C2-2', 'assets/images/chikankari/C2-2.jpeg'),
(160, 'C3', 'assets/images/chikankari/C3.jpeg'),
(161, 'C3-1', 'assets/images/chikankari/C3-1.jpeg'),
(162, 'C3-2', 'assets/images/chikankari/C3-2.jpeg'),
(163, 'C4', 'assets/images/chikankari/C4.jpeg'),
(164, 'C4-1', 'assets/images/chikankari/C4-1.jpeg'),
(165, 'C4-2', 'assets/images/chikankari/C4-2.jpeg'),
(166, 'C5', 'assets/images/chikankari/C5.jpeg'),
(167, 'C5-1', 'assets/images/chikankari/C5-1.jpeg'),
(168, 'C5-2', 'assets/images/chikankari/C5-2.jpeg'),
(169, 'C6', 'assets/images/chikankari/C6.jpeg'),
(170, 'C6-1', 'assets/images/chikankari/C6-1.jpeg'),
(171, 'C6-2', 'assets/images/chikankari/C6-2.jpeg'),
(172, 'C7', 'assets/images/chikankari/C7.jpeg'),
(173, 'C7-1', 'assets/images/chikankari/C7-1.jpeg'),
(174, 'C7-2', 'assets/images/chikankari/C7-2.jpeg'),
(175, 'C8', 'assets/images/chikankari/C8.jpeg'),
(176, 'C8-1', 'assets/images/chikankari/C8-1.jpeg'),
(177, 'C8-2', 'assets/images/chikankari/C8-2.jpeg'),
(178, 'CO1', 'assets/images/coord_sets/CO1.jpeg'),
(179, 'CO1-1', 'assets/images/coord_sets/CO1-1.jpeg'),
(180, 'CO2', 'assets/images/coord_sets/CO2.jpeg'),
(181, 'CO2-1', 'assets/images/coord_sets/CO2-1.jpeg'),
(182, 'CO2-2', 'assets/images/coord_sets/CO2-2.jpeg'),
(183, 'CO3', 'assets/images/coord_sets/CO3.jpeg'),
(184, 'CO3-1', 'assets/images/coord_sets/CO3-1.jpeg'),
(185, 'CO3-2', 'assets/images/coord_sets/CO3-2.jpeg'),
(186, 'CO4', 'assets/images/coord_sets/CO4.jpeg'),
(187, 'CO4-1', 'assets/images/coord_sets/CO4-1.jpeg'),
(188, 'CO4-2', 'assets/images/coord_sets/CO4-2.jpeg'),
(189, 'CO5', 'assets/images/coord_sets/CO5.jpeg'),
(190, 'CO5-1', 'assets/images/coord_sets/CO5-1.jpeg'),
(191, 'CO5-2', 'assets/images/coord_sets/CO5-2.jpeg'),
(192, 'D1', 'assets/images/dress_material/D1.jpeg'),
(193, 'D1-1', 'assets/images/dress_material/D1-1.jpeg'),
(194, 'D1-2', 'assets/images/dress_material/D1-2.jpeg'),
(195, 'D1-3', 'assets/images/dress_material/D1-3.jpeg'),
(196, 'D2', 'assets/images/dress_material/D2.jpeg'),
(197, 'D2-1', 'assets/images/dress_material/D2-1.jpeg'),
(198, 'D2-2', 'assets/images/dress_material/D2-2.jpeg'),
(199, 'D3', 'assets/images/dress_material/D3.jpeg'),
(200, 'D3-1', 'assets/images/dress_material/D3-1.jpeg'),
(201, 'D3-2', 'assets/images/dress_material/D3-2.jpeg'),
(202, 'D4', 'assets/images/dress_material/D4.jpeg'),
(203, 'D4-1', 'assets/images/dress_material/D4-1.jpeg'),
(204, 'D4-2', 'assets/images/dress_material/D4-2.jpeg'),
(205, 'D5', 'assets/images/dress_material/D5.jpeg'),
(206, 'D5-1', 'assets/images/dress_material/D5-1.jpeg'),
(207, 'D5-2', 'assets/images/dress_material/D5-2.jpeg'),
(208, 'D6', 'assets/images/dress_material/D6.jpeg'),
(209, 'D6-1', 'assets/images/dress_material/D6-1.jpeg'),
(210, 'D6-2', 'assets/images/dress_material/D6-2.jpeg'),
(211, 'D7', 'assets/images/dress_material/D7.jpeg'),
(212, 'D7-1', 'assets/images/dress_material/D7-1.jpeg'),
(213, 'D7-2', 'assets/images/dress_material/D7-2.jpeg'),
(214, 'D8', 'assets/images/dress_material/D8.jpeg'),
(215, 'D8-1', 'assets/images/dress_material/D8-1.jpeg'),
(216, 'D8-2', 'assets/images/dress_material/D8-2.jpeg'),
(217, 'D9', 'assets/images/dress_material/D9.jpeg'),
(218, 'D9-1', 'assets/images/dress_material/D9-1.jpeg'),
(219, 'D9-2', 'assets/images/dress_material/D9-2.jpeg'),
(220, 'D10', 'assets/images/dress_material/D10.jpeg'),
(221, 'D10-1', 'assets/images/dress_material/D10-1.jpeg'),
(222, 'D10-2', 'assets/images/dress_material/D10-2.jpeg'),
(223, 'D11', 'assets/images/dress_material/D11.jpeg'),
(224, 'D11-1', 'assets/images/dress_material/D11-1.jpeg'),
(225, 'D11-2', 'assets/images/dress_material/D11-2.jpeg'),
(226, 'D12', 'assets/images/dress_material/D12.jpeg'),
(227, 'D12-1', 'assets/images/dress_material/D12-1.jpeg'),
(228, 'D12-2', 'assets/images/dress_material/D12-2.jpeg'),
(229, 'D13', 'assets/images/dress_material/D13.jpeg'),
(230, 'D13-1', 'assets/images/dress_material/D13-1.jpeg'),
(231, 'D13-2', 'assets/images/dress_material/D13-2.jpeg'),
(232, 'D14', 'assets/images/dress_material/D14.jpeg'),
(233, 'D14-1', 'assets/images/dress_material/D14-1.jpeg'),
(234, 'D14-2', 'assets/images/dress_material/D14-2.jpeg'),
(235, 'SH1', 'assets/images/sharara_set/SH1.jpeg'),
(236, 'SH1-1', 'assets/images/sharara_set/SH1-1.jpeg'),
(237, 'SH1-2', 'assets/images/sharara_set/SH1-2.jpeg'),
(238, 'SH1-3', 'assets/images/sharara_set/SH1-3.jpeg'),
(239, 'SH2', 'assets/images/sharara_set/SH2.jpeg'),
(240, 'SH2-1', 'assets/images/sharara_set/SH2-1.jpeg'),
(241, 'SH3', 'assets/images/sharara_set/SH3.jpeg'),
(242, 'SH3-1', 'assets/images/sharara_set/SH3-1.jpeg'),
(243, 'SH4', 'assets/images/sharara_set/SH4.jpeg'),
(244, 'SH4-1', 'assets/images/sharara_set/SH4-1.jpeg'),
(245, 'SH5', 'assets/images/sharara_set/SH5.jpeg'),
(246, 'SH5-1', 'assets/images/sharara_set/SH5-1.jpeg'),
(247, 'SH6', 'assets/images/sharara_set/SH6.jpeg'),
(248, 'SH6-1', 'assets/images/sharara_set/SH6-1.jpeg'),
(249, 'SH6-2', 'assets/images/sharara_set/SH6-2.jpeg'),
(250, 'SH6-3', 'assets/images/sharara_set/SH6-3.jpeg'),
(251, 'SH6-4', 'assets/images/sharara_set/SH6-4.jpeg'),
(252, 'S1', 'assets/images/straight_kurti/S1.jpeg'),
(253, 'S1-2', 'assets/images/straight_kurti/S1-2.jpeg'),
(254, 'S2', 'assets/images/straight_kurti/S2.jpeg'),
(255, 'S2-1', 'assets/images/straight_kurti/S2-1.jpeg'),
(256, 'S2-2', 'assets/images/straight_kurti/S2-2.jpeg'),
(257, 'S3', 'assets/images/straight_kurti/S3.jpeg'),
(258, 'S3-1', 'assets/images/straight_kurti/S3-1.jpeg'),
(259, 'S3-2', 'assets/images/straight_kurti/S3-2.jpeg'),
(260, 'S4', 'assets/images/straight_kurti/S4.jpeg'),
(261, 'S4-1', 'assets/images/straight_kurti/S4-1.jpeg'),
(262, 'S4-2', 'assets/images/straight_kurti/S4-2.jpeg'),
(263, 'S5', 'assets/images/straight_kurti/S5.jpeg'),
(264, 'S5-1', 'assets/images/straight_kurti/S5-1.jpeg'),
(265, 'S5-2', 'assets/images/straight_kurti/S5-2.jpeg'),
(266, 'S6', 'assets/images/straight_kurti/S6.jpeg'),
(267, 'S6-1', 'assets/images/straight_kurti/S6-1.jpeg'),
(268, 'S6-2', 'assets/images/straight_kurti/S6-2.jpeg'),
(269, 'S7', 'assets/images/straight_kurti/S7.jpeg'),
(270, 'S7-1', 'assets/images/straight_kurti/S7-1.jpeg'),
(271, 'S7-2', 'assets/images/straight_kurti/S7-2.jpeg'),
(272, 'S8', 'assets/images/straight_kurti/S8.jpeg'),
(273, 'S8-1', 'assets/images/straight_kurti/S8-1.jpeg'),
(274, 'S8-2', 'assets/images/straight_kurti/S8-2.jpeg'),
(275, 'S9', 'assets/images/straight_kurti/S9.jpeg'),
(276, 'S9-1', 'assets/images/straight_kurti/S9-1.jpeg'),
(277, 'S9-2', 'assets/images/straight_kurti/S9-2.jpeg'),
(278, 'S10', 'assets/images/straight_kurti/S10.jpeg'),
(279, 'S10-1', 'assets/images/straight_kurti/S10-1.jpeg'),
(280, 'S10-2', 'assets/images/straight_kurti/S10-2.jpeg'),
(281, 'S11', 'assets/images/straight_kurti/S11.jpeg'),
(282, 'S11-1', 'assets/images/straight_kurti/S11-1.jpeg'),
(283, 'S11-2', 'assets/images/straight_kurti/S11-2.jpeg'),
(284, 'S12', 'assets/images/straight_kurti/S12.jpeg'),
(285, 'S12-1', 'assets/images/straight_kurti/S12-1.jpeg'),
(286, 'S12-2', 'assets/images/straight_kurti/S12-2.jpeg'),
(287, 'S13', 'assets/images/straight_kurti/S13.jpeg'),
(288, 'S13-1', 'assets/images/straight_kurti/S13-1.jpeg'),
(289, 'S13-2', 'assets/images/straight_kurti/S13-2.jpeg'),
(290, 'S14', 'assets/images/straight_kurti/S14.jpeg'),
(291, 'S14-1', 'assets/images/straight_kurti/S14-1.jpeg'),
(292, 'S14-2', 'assets/images/straight_kurti/S14-2.jpeg'),
(293, 'S15', 'assets/images/straight_kurti/S15.jpeg'),
(294, 'S15-1', 'assets/images/straight_kurti/S15-1.jpeg'),
(295, 'S15-2', 'assets/images/straight_kurti/S15-2.jpeg'),
(296, 'S16', 'assets/images/straight_kurti/S16.jpeg\"'),
(297, 'S16-1', 'assets/images/straight_kurti/S16-1.jpeg'),
(298, 'S16-2', 'assets/images/straight_kurti/S16-2.jpeg'),
(299, 'S17', 'assets/images/straight_kurti/S17.jpeg'),
(300, 'S17-1', 'assets/images/straight_kurti/S17-1.jpeg'),
(301, 'S17-2', 'assets/images/straight_kurti/S17-2.jpeg'),
(302, 'S18', 'assets/images/straight_kurti/S18.jpeg'),
(303, 'S18-1', 'assets/images/straight_kurti/S18-1.jpeg'),
(304, 'S18-2', 'assets/images/straight_kurti/S18-2.jpeg'),
(305, 'S19', 'assets/images/straight_kurti/S19.jpeg'),
(306, 'S19-1', 'assets/images/straight_kurti/S19-1.jpeg'),
(307, 'S19-2', 'assets/images/straight_kurti/S19-1.jpeg'),
(308, 'S20', 'assets/images/straight_kurti/S20.jpeg'),
(309, 'S20-1', 'assets/images/straight_kurti/S20-1.jpeg'),
(310, 'S20-2', 'assets/images/straight_kurti/S20-2.jpeg'),
(311, 'S21', 'assets/images/straight_kurti/S21.jpeg'),
(312, 'S21-1', 'assets/images/straight_kurti/S21-1.jpeg'),
(313, 'S21-2', 'assets/images/straight_kurti/S21-2.jpeg'),
(314, 'S22', 'assets/images/straight_kurti/S22.jpeg'),
(315, 'S22-1', 'assets/images/straight_kurti/S22-1.jpeg'),
(316, 'S22-2', 'assets/images/straight_kurti/S22-2.jpeg'),
(317, 'S23', 'assets/images/straight_kurti/S23.jpeg'),
(318, 'S23-1', 'assets/images/straight_kurti/S23-1.jpeg'),
(319, 'S23-2', 'assets/images/straight_kurti/S23-2.jpeg'),
(320, 'S24', 'assets/images/straight_kurti/S24.jpeg'),
(321, 'S24-1', 'assets/images/straight_kurti/S24-1.jpeg'),
(322, 'S24-2', 'assets/images/straight_kurti/S24-2.jpeg'),
(323, 'S25', 'assets/images/straight_kurti/S25.jpeg'),
(324, 'S25-1', 'assets/images/straight_kurti/S25-1.jpeg'),
(325, 'S25-2', 'assets/images/straight_kurti/S25-2.jpeg'),
(326, 'S26', 'assets/images/straight_kurti/S26.jpeg'),
(327, 'S26-1', 'assets/images/straight_kurti/S26-1.jpeg'),
(328, 'S26-2', 'assets/images/straight_kurti/S26-2.jpeg'),
(329, 'S27', 'assets/images/straight_kurti/S27.jpeg'),
(330, 'S27-1', 'assets/images/straight_kurti/S27-1.jpeg'),
(331, 'S27-2', 'assets/images/straight_kurti/S27-2.jpeg'),
(332, 'S28', 'assets/images/straight_kurti/S28.jpeg'),
(333, 'S28-1', 'assets/images/straight_kurti/S28-1.jpeg'),
(334, 'S28-2', 'assets/images/straight_kurti/S28-2.jpeg'),
(335, 'S29', 'assets/images/straight_kurti/S29.jpeg'),
(336, 'S29-1', 'assets/images/straight_kurti/S29-1.jpeg'),
(337, 'S29-2', 'assets/images/straight_kurti/S29-2.jpeg'),
(338, 'S30', 'assets/images/straight_kurti/S30.jpeg'),
(339, 'S30-1', 'assets/images/straight_kurti/S30-1.jpeg'),
(340, 'S31', 'assets/images/straight_kurti/S31.jpeg'),
(341, 'S31-1', 'assets/images/straight_kurti/S31-1.jpeg'),
(342, 'S31-2', 'assets/images/straight_kurti/S31-2.jpeg'),
(343, 'S32', 'assets/images/straight_kurti/S32.jpeg'),
(344, 'S32-1', 'assets/images/straight_kurti/S32-1.jpeg'),
(345, 'S32-2', 'assets/images/straight_kurti/S32-2.jpeg'),
(346, 'S33', 'assets/images/straight_kurti/S33.jpeg'),
(347, 'S33-1', 'assets/images/straight_kurti/S33-1.jpeg'),
(348, 'S33-2', 'assets/images/straight_kurti/S33-2.jpeg'),
(349, 'S34', 'assets/images/straight_kurti/S34.jpeg'),
(350, 'S34-1', 'assets/images/straight_kurti/S34-1.jpeg'),
(351, 'S34-2', 'assets/images/straight_kurti/S34-2.jpeg'),
(354, 'A10', '1775017768_0_1775008508_0_Common Fashion Mistakes That Instantly Age Your Look.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `stock_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `stock_qty` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`stock_id`, `product_code`, `size`, `stock_qty`) VALUES
(1, 'A1', 'L', 15),
(2, 'A1', 'M', 15),
(3, 'A1', 'S', 15),
(4, 'A1', 'XL', 15),
(5, 'A1', 'XXL', 15),
(7, 'A2', 'L', 15),
(8, 'A2', 'M', 14),
(9, 'A2', 'S', 15),
(10, 'A2', 'XL', 15),
(11, 'A2', 'XXL', 15),
(12, 'A3', 'L', 14),
(13, 'A3', 'M', 14),
(14, 'A3', 'S', 15),
(15, 'A3', 'XL', 15),
(16, 'A3', 'XXL', 15),
(17, 'A4', 'L', 14),
(18, 'A4', 'M', 15),
(19, 'A4', 'S', 15),
(20, 'A4', 'XL', 15),
(21, 'A4', 'XXL', 15),
(22, 'A5', 'L', 15),
(23, 'A5', 'M', 15),
(24, 'A5', 'S', 15),
(25, 'A5', 'XL', 15),
(26, 'A5', 'XXL', 15),
(27, 'A6', 'L', 15),
(28, 'A6', 'M', 15),
(29, 'A6', 'S', 15),
(30, 'A6', 'XL', 15),
(31, 'A6', 'XXL', 15),
(32, 'A7', 'L', 15),
(33, 'A7', 'M', 15),
(34, 'A7', 'S', 15),
(35, 'A7', 'XL', 14),
(36, 'A7', 'XXL', 15),
(37, 'A8', 'L', 15),
(38, 'A8', 'M', 15),
(39, 'A8', 'S', 15),
(40, 'A8', 'XL', 15),
(41, 'A8', 'XXL', 15),
(42, 'A9', 'L', 15),
(43, 'A9', 'M', 15),
(44, 'A9', 'S', 15),
(45, 'A9', 'XL', 15),
(46, 'A9', 'XXL', 15),
(47, 'C1', 'L', 11),
(48, 'C1', 'M', 15),
(49, 'C1', 'S', 15),
(50, 'C1', 'XL', 15),
(51, 'C1', 'XXL', 15),
(52, 'C2', 'L', 15),
(53, 'C2', 'M', 15),
(54, 'C2', 'S', 15),
(55, 'C2', 'XL', 15),
(56, 'C2', 'XXL', 15),
(57, 'C3', 'L', 15),
(58, 'C3', 'M', 15),
(59, 'C3', 'S', 15),
(60, 'C3', 'XL', 15),
(61, 'C3', 'XXL', 15),
(62, 'C4', 'L', 15),
(63, 'C4', 'M', 15),
(64, 'C4', 'S', 15),
(65, 'C4', 'XL', 15),
(66, 'C4', 'XXL', 15),
(67, 'C5', 'L', 15),
(68, 'C5', 'M', 14),
(69, 'C5', 'S', 15),
(70, 'C5', 'XL', 15),
(71, 'C5', 'XXL', 15),
(72, 'C6', 'L', 15),
(73, 'C6', 'M', 15),
(74, 'C6', 'S', 15),
(75, 'C6', 'XL', 15),
(76, 'C6', 'XXL', 15),
(77, 'C7', 'L', 15),
(78, 'C7', 'M', 15),
(79, 'C7', 'S', 15),
(80, 'C7', 'XL', 15),
(81, 'C7', 'XXL', 15),
(82, 'C8', 'L', 15),
(83, 'C8', 'M', 15),
(84, 'C8', 'S', 15),
(85, 'C8', 'XL', 15),
(86, 'C8', 'XXL', 15),
(87, 'CO1', 'L', 15),
(88, 'CO1', 'M', 15),
(89, 'CO1', 'S', 15),
(90, 'CO1', 'XL', 15),
(91, 'CO1', 'XXL', 15),
(92, 'CO2', 'L', 15),
(93, 'CO2', 'M', 15),
(94, 'CO2', 'S', 15),
(95, 'CO2', 'XL', 15),
(96, 'CO2', 'XXL', 15),
(97, 'CO3', 'L', 15),
(98, 'CO3', 'M', 15),
(99, 'CO3', 'S', 15),
(100, 'CO3', 'XL', 15),
(101, 'CO3', 'XXL', 15),
(102, 'CO4', 'L', 15),
(103, 'CO4', 'M', 15),
(104, 'CO4', 'S', 15),
(105, 'CO4', 'XL', 15),
(106, 'CO4', 'XXL', 15),
(107, 'CO5', 'L', 15),
(108, 'CO5', 'M', 15),
(109, 'CO5', 'S', 15),
(110, 'CO5', 'XL', 15),
(111, 'CO5', 'XXL', 15),
(112, 'D1', 'L', 15),
(113, 'D1', 'M', 15),
(114, 'D1', 'S', 15),
(115, 'D1', 'XL', 15),
(116, 'D1', 'XXL', 15),
(117, 'D10', 'L', 15),
(118, 'D10', 'M', 15),
(119, 'D10', 'S', 15),
(120, 'D10', 'XL', 15),
(121, 'D10', 'XXL', 15),
(122, 'D11', 'L', 15),
(123, 'D11', 'M', 15),
(124, 'D11', 'S', 15),
(125, 'D11', 'XL', 15),
(126, 'D11', 'XXL', 15),
(127, 'D12', 'L', 15),
(128, 'D12', 'M', 15),
(129, 'D12', 'S', 15),
(130, 'D12', 'XL', 15),
(131, 'D12', 'XXL', 15),
(132, 'D13', 'L', 15),
(133, 'D13', 'M', 15),
(134, 'D13', 'S', 15),
(135, 'D13', 'XL', 15),
(136, 'D13', 'XXL', 15),
(137, 'D14', 'L', 15),
(138, 'D14', 'M', 15),
(139, 'D14', 'S', 15),
(140, 'D14', 'XL', 15),
(141, 'D14', 'XXL', 15),
(142, 'D2', 'L', 15),
(143, 'D2', 'M', 15),
(144, 'D2', 'S', 15),
(145, 'D2', 'XL', 15),
(146, 'D2', 'XXL', 15),
(147, 'D3', 'L', 15),
(148, 'D3', 'M', 15),
(149, 'D3', 'S', 15),
(150, 'D3', 'XL', 15),
(151, 'D3', 'XXL', 15),
(152, 'D4', 'L', 15),
(153, 'D4', 'M', 15),
(154, 'D4', 'S', 15),
(155, 'D4', 'XL', 15),
(156, 'D4', 'XXL', 15),
(157, 'D5', 'L', 15),
(158, 'D5', 'M', 15),
(159, 'D5', 'S', 15),
(160, 'D5', 'XL', 15),
(161, 'D5', 'XXL', 15),
(162, 'D6', 'L', 15),
(163, 'D6', 'M', 15),
(164, 'D6', 'S', 15),
(165, 'D6', 'XL', 15),
(166, 'D6', 'XXL', 15),
(167, 'D7', 'L', 15),
(168, 'D7', 'M', 15),
(169, 'D7', 'S', 15),
(170, 'D7', 'XL', 15),
(171, 'D7', 'XXL', 15),
(172, 'D8', 'L', 15),
(173, 'D8', 'M', 15),
(174, 'D8', 'S', 15),
(175, 'D8', 'XL', 15),
(176, 'D8', 'XXL', 15),
(177, 'D9', 'L', 15),
(178, 'D9', 'M', 15),
(179, 'D9', 'S', 15),
(180, 'D9', 'XL', 15),
(181, 'D9', 'XXL', 15),
(182, 'S1', 'L', 15),
(183, 'S1', 'M', 15),
(184, 'S1', 'S', 15),
(185, 'S1', 'XL', 15),
(186, 'S1', 'XXL', 15),
(187, 'S10', 'L', 15),
(188, 'S10', 'M', 15),
(189, 'S10', 'S', 15),
(190, 'S10', 'XL', 15),
(191, 'S10', 'XXL', 15),
(192, 'S11', 'L', 15),
(193, 'S11', 'M', 15),
(194, 'S11', 'S', 15),
(195, 'S11', 'XL', 15),
(196, 'S11', 'XXL', 15),
(197, 'S12', 'L', 15),
(198, 'S12', 'M', 15),
(199, 'S12', 'S', 15),
(200, 'S12', 'XL', 15),
(201, 'S12', 'XXL', 15),
(202, 'S13', 'L', 15),
(203, 'S13', 'M', 15),
(204, 'S13', 'S', 15),
(205, 'S13', 'XL', 15),
(206, 'S13', 'XXL', 15),
(207, 'S14', 'L', 15),
(208, 'S14', 'M', 15),
(209, 'S14', 'S', 15),
(210, 'S14', 'XL', 15),
(211, 'S14', 'XXL', 15),
(212, 'S15', 'L', 15),
(213, 'S15', 'M', 15),
(214, 'S15', 'S', 15),
(215, 'S15', 'XL', 15),
(216, 'S15', 'XXL', 15),
(217, 'S16', 'L', 15),
(218, 'S16', 'M', 15),
(219, 'S16', 'S', 15),
(220, 'S16', 'XL', 15),
(221, 'S16', 'XXL', 15),
(222, 'S17', 'L', 15),
(223, 'S17', 'M', 15),
(224, 'S17', 'S', 15),
(225, 'S17', 'XL', 15),
(226, 'S17', 'XXL', 15),
(227, 'S18', 'L', 15),
(228, 'S18', 'M', 15),
(229, 'S18', 'S', 15),
(230, 'S18', 'XL', 15),
(231, 'S18', 'XXL', 15),
(232, 'S19', 'L', 15),
(233, 'S19', 'M', 15),
(234, 'S19', 'S', 15),
(235, 'S19', 'XL', 15),
(236, 'S19', 'XXL', 15),
(237, 'S2', 'L', 15),
(238, 'S2', 'M', 15),
(239, 'S2', 'S', 15),
(240, 'S2', 'XL', 15),
(241, 'S2', 'XXL', 15),
(242, 'S20', 'L', 15),
(243, 'S20', 'M', 15),
(244, 'S20', 'S', 15),
(245, 'S20', 'XL', 15),
(246, 'S20', 'XXL', 15),
(247, 'S21', 'L', 15),
(248, 'S21', 'M', 15),
(249, 'S21', 'S', 15),
(250, 'S21', 'XL', 15),
(251, 'S21', 'XXL', 15),
(252, 'S22', 'L', 15),
(253, 'S22', 'M', 15),
(254, 'S22', 'S', 15),
(255, 'S22', 'XL', 15),
(256, 'S22', 'XXL', 15),
(257, 'S23', 'L', 15),
(258, 'S23', 'M', 15),
(259, 'S23', 'S', 15),
(260, 'S23', 'XL', 15),
(261, 'S23', 'XXL', 15),
(262, 'S24', 'L', 15),
(263, 'S24', 'M', 15),
(264, 'S24', 'S', 15),
(265, 'S24', 'XL', 15),
(266, 'S24', 'XXL', 15),
(267, 'S25', 'L', 15),
(268, 'S25', 'M', 15),
(269, 'S25', 'S', 15),
(270, 'S25', 'XL', 15),
(271, 'S25', 'XXL', 15),
(272, 'S26', 'L', 15),
(273, 'S26', 'M', 15),
(274, 'S26', 'S', 15),
(275, 'S26', 'XL', 15),
(276, 'S26', 'XXL', 15),
(277, 'S27', 'L', 15),
(278, 'S27', 'M', 15),
(279, 'S27', 'S', 15),
(280, 'S27', 'XL', 15),
(281, 'S27', 'XXL', 15),
(282, 'S28', 'L', 15),
(283, 'S28', 'M', 15),
(284, 'S28', 'S', 15),
(285, 'S28', 'XL', 15),
(286, 'S28', 'XXL', 15),
(287, 'S29', 'L', 15),
(288, 'S29', 'M', 15),
(289, 'S29', 'S', 15),
(290, 'S29', 'XL', 15),
(291, 'S29', 'XXL', 15),
(292, 'S3', 'L', 15),
(293, 'S3', 'M', 15),
(294, 'S3', 'S', 15),
(295, 'S3', 'XL', 15),
(296, 'S3', 'XXL', 15),
(297, 'S30', 'L', 15),
(298, 'S30', 'M', 15),
(299, 'S30', 'S', 15),
(300, 'S30', 'XL', 15),
(301, 'S30', 'XXL', 15),
(302, 'S31', 'L', 15),
(303, 'S31', 'M', 15),
(304, 'S31', 'S', 15),
(305, 'S31', 'XL', 15),
(306, 'S31', 'XXL', 15),
(307, 'S32', 'L', 15),
(308, 'S32', 'M', 15),
(309, 'S32', 'S', 15),
(310, 'S32', 'XL', 15),
(311, 'S32', 'XXL', 15),
(312, 'S33', 'L', 15),
(313, 'S33', 'M', 15),
(314, 'S33', 'S', 15),
(315, 'S33', 'XL', 15),
(316, 'S33', 'XXL', 15),
(317, 'S34', 'L', 15),
(318, 'S34', 'M', 15),
(319, 'S34', 'S', 15),
(320, 'S34', 'XL', 15),
(321, 'S34', 'XXL', 15),
(322, 'S4', 'L', 15),
(323, 'S4', 'M', 15),
(324, 'S4', 'S', 15),
(325, 'S4', 'XL', 15),
(326, 'S4', 'XXL', 15),
(327, 'S5', 'L', 15),
(328, 'S5', 'M', 15),
(329, 'S5', 'S', 15),
(330, 'S5', 'XL', 15),
(331, 'S5', 'XXL', 15),
(332, 'S6', 'L', 15),
(333, 'S6', 'M', 15),
(334, 'S6', 'S', 15),
(335, 'S6', 'XL', 15),
(336, 'S6', 'XXL', 15),
(337, 'S7', 'L', 15),
(338, 'S7', 'M', 15),
(339, 'S7', 'S', 15),
(340, 'S7', 'XL', 15),
(341, 'S7', 'XXL', 15),
(342, 'S8', 'L', 15),
(343, 'S8', 'M', 15),
(344, 'S8', 'S', 15),
(345, 'S8', 'XL', 15),
(346, 'S8', 'XXL', 15),
(347, 'S9', 'L', 15),
(348, 'S9', 'M', 15),
(349, 'S9', 'S', 15),
(350, 'S9', 'XL', 15),
(351, 'S9', 'XXL', 15),
(352, 'SH1', 'L', 15),
(353, 'SH1', 'M', 15),
(354, 'SH1', 'S', 15),
(355, 'SH1', 'XL', 15),
(356, 'SH1', 'XXL', 15),
(357, 'SH2', 'L', 15),
(358, 'SH2', 'M', 15),
(359, 'SH2', 'S', 15),
(360, 'SH2', 'XL', 15),
(361, 'SH2', 'XXL', 15),
(362, 'SH3', 'L', 15),
(363, 'SH3', 'M', 15),
(364, 'SH3', 'S', 15),
(365, 'SH3', 'XL', 15),
(366, 'SH3', 'XXL', 15),
(367, 'SH4', 'L', 15),
(368, 'SH4', 'M', 15),
(369, 'SH4', 'S', 15),
(370, 'SH4', 'XL', 15),
(371, 'SH4', 'XXL', 15),
(372, 'SH5', 'L', 15),
(373, 'SH5', 'M', 15),
(374, 'SH5', 'S', 15),
(375, 'SH5', 'XL', 15),
(376, 'SH5', 'XXL', 15),
(377, 'SH6', 'L', 15),
(378, 'SH6', 'M', 15),
(379, 'SH6', 'S', 15),
(380, 'SH6', 'XL', 15),
(381, 'SH6', 'XXL', 15),
(387, 'A10', 'S', 15),
(388, 'A10', 'M', 15),
(389, 'A10', 'L', 15),
(390, 'A10', 'XL', 15),
(391, 'A10', 'XXL', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','staff','manager') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone_number`, `password_hash`, `role`, `created_at`, `remember_token`) VALUES
(10, 'Nidhi Balaji', 'nidhibalaji219@gmail.com', '7676528462', '$2y$10$mB/KOy8mcjMzoLjxnUWPRO46bza8vp1MrjZrjGCuBBqgN6V10WaDK', 'manager', '2026-03-09 09:35:42', NULL),
(11, 'Aashika Menon', 'aashikamenon2004@gmail.com', '7411437721', '$2y$10$mGLUKvfEtXQRGeQAISoDPufkxht/813GlreUq7PhUeUq5Lak92Ite', 'manager', '2026-03-09 09:37:08', NULL),
(12, 'Anitha Patel', 'anithapatel1203@gmail.com', '8618247172', '$2y$10$p4Dg7gc5Eu8H9yceC/kcDe02MlBm5e0p5/w/UzGY/ieSuKQI8FzjO', 'manager', '2026-03-09 09:37:54', NULL),
(13, 'Aditi Tupsakri', 'adititupsakri@gmail.com', '9108893232', '$2y$10$PPi.XVd2B2BC9aOQ3/XjVelQwKCWliIFCNq3Bd8AVtAGyhdyNFKG6', 'manager', '2026-03-09 09:38:35', '70e8f8d643df0c8ec96d437a5a9ce04ceac7c4b40e61f8cadd1ca8f69096f296'),
(14, 'Kaushik', 'svkaushik2210@gmail.com', '9538003807', '$2y$10$8HtmB4ftp5ugp1sid/sEI.dPR02MjrCiKfYz/gwvD2NClkmqpqGZ2', 'user', '2026-03-09 12:36:13', NULL),
(15, 'aditi tupsakri', 'adititupsakri.work@gmail.com', '9108893232', '$2y$10$h2SYBECGqRP99klpwPEhfe6vxtjhApFq7Mo3UkXSsUU9CaQU1J7yG', 'user', '2026-03-12 09:37:10', NULL),
(16, 'Shobha Tupsakri', 'shobha@gmail.com', '9844203996', '$2y$10$HVpevc2Qc0zX0DleIQBjuexlm/pIa2k/u6ZZDiAAXGywoHXs2pnP6', 'user', '2026-03-17 15:10:28', NULL),
(17, 'Rachana', 'patelanitha64@gmail.com', '8618247172', '$2y$10$HBeOwy/erN5OJYzGmzOYM.K0sB47sr5iG5XYgu9NKs6Jcxo5amsaq', 'user', '2026-03-30 11:09:39', NULL);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `idx_orders_user` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `idx_order_items_order` (`order_id`),
  ADD KEY `idx_order_items_product` (`product_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_code`),
  ADD KEY `idx_category` (`category_num`),
  ADD KEY `idx_featured` (`is_featured`),
  ADD KEY `idx_active` (`is_active`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `idx_product_images` (`product_code`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD UNIQUE KEY `uniq_product_size` (`product_code`,`size`);

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
  ADD PRIMARY KEY (`user_id`,`product_code`,`size`),
  ADD KEY `fk_cart_product` (`product_code`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `idx_user_sessions_user` (`user_id`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD PRIMARY KEY (`user_id`,`product_code`),
  ADD KEY `fk_wishlist_product` (`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_order_items_product` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product_images_product` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`) ON DELETE CASCADE;

--
-- Constraints for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD CONSTRAINT `fk_product_stock_product` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`) ON DELETE CASCADE;

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `fk_user_sessions_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD CONSTRAINT `fk_wishlist_product` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_wishlist_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
