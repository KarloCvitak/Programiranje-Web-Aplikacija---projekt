-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 03:18 PM
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
-- Database: `vijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Karlo', 'Cvitak', 'karlo_cvitak', '$2y$10$MBMzqlyEp3cMVR0lLJnxa.Yz7NrE1cjaFk56TvZY5on4sCe2Skuy.', 0),
(2, 'Karlo', 'Cvitak', 'ded', '$2y$10$82uhlhmVbjQKEsxMNtB5y.5ycHLrcZJkPtGJ4baG9zvUvbHp6nAhG', 0),
(3, 'dva', 'ded', 'nekoime', '$2y$10$DD0QgnOH26h8uVn60dW.z.hk38clJNxBkC0GwsidZGXM/X7GlEuci', 0),
(4, 'ded', 'ded', 'dedded', '$2y$10$3ecqhT3DKbquix2xlAIA3.Z9qQJQUA18eQvWO57vQADg5auRUsdxC', 1),
(5, 'dedded', 'dedded', 'deddeded', '$2y$10$K2nUtPpxx.e5GGpgBmZjgez..Q5hu1l1KlolbeRaHhDlhcuQNM8DO', 0),
(6, 'dva', 'dva', 'dva', '$2y$10$r9bL9cNdw4FIIORUz16yYe3qyQUqkPjF02oVl29cpcpsS5b6qhlre', 0),
(7, 'jedan', 'jedan', 'jedan', '$2y$10$XEfMDCkrnJyyh2ws8jOiH.E3jAuWyyzalxUAPQUjTnZBfI9w5OtJy', 0),
(8, 'tri', 'tri', 'tri', '$2y$10$2n9rVHwhTtj4nQBqFkgECOnSR3JAWukX320a.AK0NgpGbeSRWg9u.', 0),
(9, 'get', 'get', 'get', '$2y$10$m77di.FkBf1Ro/HuuV7kTu62yJjF1mlukdZ2q3rNb1RnSzVw5K2Dm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(64) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(7, '19.06.2023.', 'Lorem ipsum dolor sit ', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-sarah-chai-7266779.jpg', 'MÚSICA', 0),
(8, '19.06.2023.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-josh-sorenson-154147.jpg', 'MÚSICA', 0),
(9, '19.06.2023.', 'Lorem Ipsum - izmjena', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-cottonbro-studio-3944091.jpg', 'MÚSICA', 0),
(10, '19.06.2023.', 'Sed sit amet interdum velit', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-rfstudio-3618362.jpg', 'MÚSICA', 0),
(11, '19.06.2023.', 'Sed sit amet interdum velit', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-sarah-chai-7266779.jpg', 'DEPORTES', 0),
(12, '19.06.2023.', 'Lorem ipsum dolor sit amet', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-maik-kleinert-3534924.jpg', 'DEPORTES', 0),
(13, '19.06.2023.', 'consectetur adipiscing elit', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-thirdman-5247203.jpg', 'DEPORTES', 0),
(14, '19.06.2023.', 'Sed sit amet interdum velit', 'Sed sollicitudin interdum tempor. Duis condimentum fermentum nulla id faucibus. Mauris eu scelerisque purus, dictum pellentesque justo. Aenean id lobortis orci. Suspendisse vestibulum, velit ut rutrum viverra, purus leo ultricies turpis, vitae hendrerit lorem orci sed magna. In gravida lobortis orci. Morbi vel mattis sem. Maecenas id velit placerat, varius velit at, sagittis velit. In tincidunt vel enim id tempus. Cras mollis nulla ut dolor egestas, quis tempus quam suscipit.', 'Suspendisse consectetur lectus sed finibus varius. Sed dictum velit in odio iaculis, ut dictum leo lacinia. Nam sed dolor fringilla, tempor sem sed, fermentum enim. Maecenas pulvinar quis diam nec ornare. Ut finibus magna id felis tincidunt ullamcorper sit amet id justo. Sed sed gravida mi. Vivamus at velit tortor. Praesent porttitor orci mi.\r\n\r\nDonec at sem urna. Sed eleifend posuere nisi non ultrices. Donec tincidunt non lacus vitae mollis. Suspendisse egestas risus eu ex feugiat porta. Suspendisse vel tortor lectus. Etiam condimentum quis magna vitae ullamcorper. Morbi mauris metus, semper id venenatis in, egestas non leo. Pellentesque mauris turpis, rhoncus at porta in, placerat nec nibh. Ut enim augue, lobortis eget tempus at, accumsan sed justo. Nulla at tellus eu erat fringilla feugiat. Curabitur ut erat urna. Praesent vel tellus elementum, rhoncus neque eget, fringilla tellus.', 'pexels-oliver-sjöström-1103833.jpg', 'DEPORTES', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
