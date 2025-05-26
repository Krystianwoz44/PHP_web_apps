-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 26, 2025 at 06:55 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitename`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(128) NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `registration_date`, `user_level`) VALUES
(1, 'Anna', 'Kowalska', 'anna.kowalska@mail.com', '20f7f5cd88e34bdfa90218a30c6bab1b1f57c310', '2025-04-17 13:32:24', 0),
(2, 'Jan', 'Nowak', 'jan.nowak@mail.com', '9f60762f33694dd6b60e11c75c20591c4f4ad738', '2025-04-17 13:32:27', 0),
(3, 'Maria', 'Wiśniewska', 'maria.wisniewska@mail.com', '22d4272c6dcd54e3b6d278b24587fe5f2acef8b9', '2025-04-17 13:32:29', 0),
(4, 'Tomasz', 'Zieliński', 'tom.zielinski@mail.com', '881948dd4c567961b0031b679908538f424a4e42', '2025-04-17 13:32:31', 0),
(5, 'Katarzyna', 'Wójcik', 'k.wojcik@mail.com', '6902c9b93fb65fe587a06ee155a807a64c5a28d8', '2025-04-17 13:32:33', 0),
(6, 'Piotr', 'Kamiński', 'p.kaminski@mail.com', 'b40a89862d70c7cdafd3ef2571ecd4885b1e7514', '2025-04-17 13:32:35', 0),
(7, 'Agnieszka', 'Lewandowska', 'a.lewandowska@mail.com', '48a8b896bdf8d0c6cf730fd9f7fe8cd03f6675c4', '2025-04-17 13:32:37', 0),
(8, 'Michał', 'Dąbrowski', 'm.dabrowski@mail.com', '776b5f05bbf4cb9625362ffad95abbcbf3bd9e44', '2025-04-17 13:32:39', 0),
(9, 'Ewa', 'Król', 'e.krol@mail.com', '7b5ec63cef422dc0266e04ff97c24d6008e6e552', '2025-04-17 13:32:41', 0),
(10, 'Marcin', 'Wiśniewski', 'marcinw@mail.com', '2739e27ed99cbe95ee472f2fcce732bf5aa4ae1c', '2025-04-17 13:32:43', 0),
(11, 'Monika', 'Kaczmarek', 'm.kaczmarek@mail.com', 'fcd66a79f538ca02b233cdb60c7f616554a21268', '2025-04-17 13:32:45', 0),
(12, 'Paweł', 'Mazur', 'p.mazur@mail.com', 'aa43195d055b65ecca4ec30cd0e29c1e2f271ff9', '2025-04-17 13:32:47', 0),
(13, 'Julia', 'Krawczyk', 'julia.k@mail.com', '6332e1c3bb0b8957e12ef80f5d5f08cb1e4e79f0', '2025-04-17 13:32:49', 0),
(14, 'Adam', 'Piotrowski', 'adam.piotr@mail.com', '7d0544ee2a23f6d5f64dbb9acaee5751acc2dbab', '2025-04-17 13:32:51', 0),
(15, 'Natalia', 'Grabowska', 'n.grabowska@mail.com', '07bc8f5f019352412ed285d97ac2d5f3afe1186d', '2025-04-17 13:32:53', 0),
(16, 'Krzysztof', 'Pawlak', 'krzysiek@mail.com', '087d69d15b5d3e1b08460a5ed485dfdf5eca6875', '2025-04-17 13:32:55', 0),
(17, 'Barbara', 'Michalska', 'b.michalska@mail.com', '89b1ee456a70334655a7398956b9b596c311c255', '2025-04-17 13:32:57', 0),
(18, 'Łukasz', 'Nowicki', 'lukasz.nowicki@mail.com', '510ef610641df58cfe1625b9596b821702a07738', '2025-04-17 13:32:59', 0),
(19, 'Weronika', 'Jabłońska', 'w.jablonska@mail.com', '39916bb5d0c81f9a68dfe1503755ae467d79f993', '2025-04-17 13:33:01', 0),
(20, 'Damian', 'Rutkowski', 'damian.rutkowski@mail.com', 'da26353b58f05ccd8c7c4710545234171b205a8c', '2025-04-17 13:33:04', 0),
(23, 'admin', 'admin', 'admin@admin.pl', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2025-05-26 17:01:52', 1),
(24, 'Krystian', 'Wozniak', 'email@email.pl', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2025-05-26 18:41:15', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
