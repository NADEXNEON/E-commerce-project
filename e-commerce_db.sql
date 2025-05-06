-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2025 at 11:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce db`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `mid` varchar(100) NOT NULL,
  `medicine_name` text NOT NULL,
  `composition` text NOT NULL,
  `used_for` text NOT NULL,
  `quantity` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`mid`, `medicine_name`, `composition`, `used_for`, `quantity`, `price`, `image`) VALUES
('med-142-1742045582', 'Ciplactin', 'Cyproheptadine, an antihistamine (anti-allergic drug)', 'in the treatment of various allergic conditions', '50', '200', './uploads/med7.jpg'),
('med-190-1742792467', 'Levothyroxine', 'C15H10I4N NaO4 • H2O', 'to treat an underactive thyroid gland (hypothyroidism)', '79', '115', './uploads/med14.jpg'),
('med-289-1742792951', 'Perindopril', 'tert-butylamine or arginine salt', 'to treat high blood pressure (hypertension)', '29', '340', './uploads/med18.jpg'),
('med-305-1742793172', 'Insulin', 'a 51-amino acid peptide hormone composed of two chains, an A-chain (21 amino acids) and a B-chain (30 amino acids), linked by two disulfide bonds', 'treatment and management of diabetes mellitus type-1 and sometimes diabetes mellitus type-2', '25', '549', './uploads/med20.jpg'),
('med-310-1742045667', 'Cheston Cold', 'Cetirizine 5mg, Phenylephrine 10mg, and Paracetamol (also known as Acetaminophen)325mg', 'to treat the common cold and allergy symptoms such as runny nose, blocked nose, sneezing, congestion, pain & fever', '42', '160', './uploads/med8.jpeg'),
('med-339-1742045129', 'Telvas-AM', 'Telmisartan and Amlodipine', 'to treat high blood pressure and heart failure', '45', '112', './uploads/med4.jpg'),
('med-353-1742792355', 'Metformin', 'C4H11N5 • HCl.', 'to treat high blood sugar levels that are caused by a type of diabetes mellitus or sugar diabetes called type 2 diabetes', '29', '239', './uploads/med13.jpg'),
('med-372-1742793048', 'Gabapentin', 'cyclohexane substituted at position 1 by aminomethyl and carboxymethyl groups', 'to treat epilepsy', '20', '130', './uploads/med19.jpg'),
('med-382-1742792086', 'Atorvastatin', '(C33H34 FN2O5)2Ca•3H2O', ' to lower cholesterol and triglyceride (fats) levels in the blood.', '50', '249', './uploads/med11.jpg'),
('med-394-1741706493', 'Prarcetamol', 'calpol', 'fever and pain relief', '37', '110', './uploads/med1.jpg'),
('med-508-1742045502', 'Leveder-500', 'to treat seizures (fits) in epilepsy', 'to treat seizures (fits) in epilepsy', '57', '150', './uploads/med6.jpg'),
('med-579-1742792228', 'Amlodipine', 'microcrystalline cellulose, dibasic calcium phosphate anhydrous, sodium starch glycolate, and magnesium stearate', 'used alone or in combination with other medications to treat high blood pressure in adults and children 6 years and older', '35', '359', './uploads/med12.jpg'),
('med-618-1742792576', 'Lisinopril', ' C21H31N3O5 . 2H2O', ' to treat high blood pressure (hypertension) and heart failure', '30', '230', './uploads/med15.jpg'),
('med-693-1742045408', 'Four-Derm', 'Chlorhexidine (antiseptic), Clobetasol (corticosteroid), Miconazole (antifungal), and Neomycin (antibiotic)', 'or the treatment of various skin infections and inflammation caused by bacterial or fungal infection', '41', '140', './uploads/med5.jpg'),
('med-716-1742021712', 'Pygresis 1000', 'paracetamol', 'Pain Relief ', '60', '500', './uploads/med3.jpg'),
('med-743-1741845729', 'Pan 40', 'pan-d', 'Gastic problem and relief headache', '30', '50', './uploads/med2.jpg'),
('med-835-1742045868', 'Entavir', 'active ingredient entecavir', 'to manage chronic Hepatitis-B infection in adults, children, and adolescents (2-18 years old)', '60', '229', './uploads/med10.png'),
('med-897-1742045794', 'Zoloft', 'glycerin, alcohol (12%), menthol, butylated hydroxytoluene (BHT).', 'treats depression, anxiety, obsessive-compulsive disorder (OCD), post-traumatic stress disorder (PTSD), and premenstrual dysphoric disorder (PMDD)', '86', '134', './uploads/med9.jpg'),
('med-966-1742792803', 'Albuterol', 'albuterol sulfate, the active ingredient, and various inactive ingredients like propellants, preservatives, and buffering agents', 'to treat or prevent bronchospasm in patients with asthma, bronchitis, emphysema, and other lung diseases', '78', '235', './uploads/med17.jpg'),
('med-996-1742792694', 'Losartan', ' 2-butyl-4-chloro-1-[p-(o-1H-tetrazol-5-ylphenyl)benzyl]imidazole- 5-methanol monopotassium salt', 'to treat high blood pressure (hypertension)', '39', '290', './uploads/med16.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ordersinfo`
--

CREATE TABLE `ordersinfo` (
  `order_id` varchar(100) NOT NULL,
  `mid` varchar(100) NOT NULL,
  `quantity` text NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordersinfo`
--

INSERT INTO `ordersinfo` (`order_id`, `mid`, `quantity`, `user_id`, `order_date`) VALUES
('order-711812', 'med-142-1742045582', '1', '1', '2025-05-05 16:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `Role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'regular',
  `user_name` varchar(50) NOT NULL,
  `Email` text,
  `Phone` varchar(10) NOT NULL,
  `Profile` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Role`, `user_name`, `Email`, `Phone`, `Profile`, `password`) VALUES
(1, 'admin', 'Subhash Shaw', 'subhashshaw572@gmail.com', '9875564697', './uploads/boy icon1.png', '$2y$10$Csgv/QRwk4oNHESNspvDmOggBFLMPx67g2zLwjPq6XHGh6XSiRGqO'),
(2, 'regular', 'Pritam Sarkar', 'pritamsarkar12@gmail.com', '7688102543', './uploads/boy icon4.png', '$2y$10$oAYmKkRwDo30329OIyR/zuSMzrudOR/FdCErgl3R9vHFuR7Ao/TZW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `ordersinfo`
--
ALTER TABLE `ordersinfo`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
