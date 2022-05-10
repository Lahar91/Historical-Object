-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220509.b38cbb987f
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 09:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ho`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `img_artikel` varchar(255) NOT NULL,
  `nama_artikel` varchar(255) NOT NULL,
  `artikel_slug` text NOT NULL,
  `deskripsi` longtext NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `img_artikel`, `nama_artikel`, `artikel_slug`, `deskripsi`, `id_kategori`, `username`) VALUES
(5, '60abba740e1da.png', 'Batu Rosetta', 'Batu-Rosetta', '<p>Batu Rosetta (bahasa Inggris: Rosetta Stone‎) adalah sebuah prasasti batu granodiorit yang ditemukan pada tahun 1799. Prasasti ini berukirkan tiga versi dari sebuah maklumat yang dikeluarkan di Memfis, Mesir pada tahun 196 SM selama dinasti Ptolemaik atas nama Raja Ptolemaios V. Teks maklumat di bagian atas dan tengah prasasti ditulis dalam bahasa Mesir Kuno dengan aksara hieroglif dan demotik, sementara bagian bawahnya ditulis dalam bahasa Yunani Kuno. Karena redaksi maklumat ini hampir sama dalam ketiga versi bahasa dan tulisan, Batu Rosetta pun dimanfaatkan sebagai kunci penerjemahan aksara hieroglif Mesir, yang pada akhirnya meluaskan wawasan mengenai sejarah kuno Mesir.</p><p>Diyakini bahwa prasasti yang dipahat pada zaman Helenistik ini awalnya dipajang di dalam sebuah kuil, mungkin di sekitar kawasan Sais. Prasasti ini kemudian dipindahkan pada Abad Kuno Akhir atau semasa pemerintahan Mamluk, hingga akhirnya digunakan sebagai bahan bangunan dalam pendirian sebuah benteng (yang nantinya direnovasi menjadi Fort Julien) di dekat kota Rashid (nama Prancis: Rosette atau Inggris: Rosetta) di wilayah Delta Nil. Prasasti ini ditemukan kembali pada bulan Juli 1799 oleh seorang tentara Prancis bernama Pierre-François Bouchard ketika ia sedang bertugas dalam kampanye militer Prancis di Mesir dan Suriah pada masa Napoleon. Batu Rosetta merupakan prasasti dwibahasa Mesir Kuno pertama yang ditemukan kembali pada zaman modern. Penemuan ini mencetuskan kembali ketertarikan masyarakat umum pada Egiptologi karena dianggap berpotensi membantu penguraian aksara hieroglif yang hingga saat itu belum berhasil diterjemahkan. Salinan litografis dan gips mulai beredar di museum-museum dan kalangan cendekiawan Eropa. Sementara itu, pasukan Inggris mengalahkan Prancis di Mesir pada tahun 1801, dan setelah Penyerahan Iskandariyah prasasti ini menjadi milik Inggris dan diboyong ke London. Batu Rosetta mulai dipamerkan di British Museum sejak tahun 1802, dan kini menjadi koleksi yang paling banyak dikunjungi di sana.</p>', 9, 'admin'),
(6, '60ac86a84af13.jpg', 'Pualam Elgin', 'Pualam-Elgin', '<p>Pualam Elgin adalah koleksi pahatan batu pualam yang dipahat oleh Feidias sebagai bagian dari kuil Parthenon dan Akropolis Athena di Yunani. Namun, saat Yunani di bawah jajahan Kesultanan Utsmaniyah pada abad ke-19, wakil Britania Raya, Thomas Bruce, menyuruh bawahannya \"mengambil\" pualam Parthenon tersebut untuk diangkut ke Britania Raya. Proses pengambilannya memakan waktu 11 tahun, dari 1801 sampai 1812.</p><p>Tujuan Bruce yang juga adalah pangeran ke-7 Elgin adalah untuk mengamankan pualam Parthenon dari serangan Utsmaniyah. Namun, caranya tersebut ditentang baik oleh Yunani dan Britania Raya karena sama saja seperti \"penjarahan\"! Jadi, pada 1816, Bruce menjual pualam Parthenon ke Kerajaan Britania Raya dan dipajang di <i>British Museum</i>, London hingga saat ini.</p>', 1, 'admin'),
(8, '60ac89aec459f.jpg', 'Harta Karun Priam', 'Harta-Karun-Priam', '<p>Pada 1870an, saat arkeolog Jerman, Heinrich Schliemann, tengah menggali di Hissarlik (sekarang Anatolia), ia menemukan harta karun peninggalan perang Troya! Seorang penggemar epos Yunani Kuno, Heinrich bukan hanya menemukan Troya (sekarang Turki), melainkan juga harta peninggalan raja Priam, dari perhiasan kepala, topeng, hingga perhiasan.</p><p>Akan tetapi, cara Heinrich ditentang oleh arkeolog lain karena dianggap mempermalukan nama arkeolog. Selain itu, Heinrich juga enggan tadinya enggan membagi hasilnya pada Kesultanan Utsmaniyah yang menguasai daerah tersebut. Akhirnya, Heinrich setuju untuk berbagi dengan kesultanan, asal ia diizinkan menggali lagi.</p><p>Harta karun tersebut itu dibawa ke <i>Royal Museum of Berlin</i>, Jerman, pada tahun 1881. Namun, setelah berakhirnya Perang Dunia II (PD2) dan pendudukan Berlin oleh Uni Soviet, artefak tersebut menghilang dan pemerintah Uni Soviet pun juga tak tahu menahu saat ditanya pada era Perang Dingin.</p>', 2, 'admin'),
(9, '60ac8e743e035.jpg', 'Hoa Hakananai’a', 'Hoa-Hakananaia', '<p>Pulau Paskah (<i>Rapa Nui</i>) terkenal akan pahatan batu basal besar yang menyerupai orang bernama Moai yang dibuat dari abad ke-12 hingga abad ke-17. Selama 500 tahun tersebut, jumlah Moai di Pulau Paskah bertambah hingga 900</p><p>Salah satu Moai yang terbaik adalah Hoa Hakananai’a yang konon katanya dibuat pada abad ke-11. Namun, pada 1869, Hoa Hakananai’a dibawa ke Inggris untuk dipersembahkan pada Ratu Victoria dan dipajang di&nbsp;<i>British Museum</i>. Ironisnya, Hoa Hakananai’a memiliki arti \"teman curian\".</p>', 1, 'admin'),
(33, '60ac8f38b2843.png', 'Padrao', 'Padrao', '<p>Padrao merupakan batu peringatan perjanjian antara Portugis dan Kerajaan Sunda. &nbsp;Pada tahun 1522, Gubernur Portugis di Malaka Jorge d’Albuquerque mengutus Henrique Leme untuk mengadakan hubungan dagang dengan Raja Sunda yang bergelar “Samiam”. Perjanjian antara Portugis dan Kerajaan Sunda dibuat pada tanggal 21 Agustus 1522. &nbsp;Isi dari perjanjian tersebut antara lain : Portugis diizinkan untuk mendirikan kantor dagang berupa sebuah benteng di wilayah Kalapa dan di tempat tersebut didirikan batu peringatan (<i>padrao</i>) dalam Bahasa Portugis. &nbsp;Kerajaan Sunda menyetujui perjanjian tersebut, selain karena hubungan perdagangan, juga untuk mendapatkan bantuan Portugis dalam menghadapi Kerajaan Islam Demak. &nbsp;Namun perjanjian tersebut tidak terlaksana, karena pada tahun 1527 Fatahillah berhasil menguasai Sunda Kelapa.</p>', 9, 'admin'),
(64, '1652001130.jpg', 'awa', '', '<figure class=\"image\"><img src=\"http://localhost/Historical-Object/./assets/image/konten_img/gambar6.jpg\"></figure>', 1, 'admin admin2'),
(66, '1652001521.jpg', 'awa awa', '', '<figure class=\"image\"><img src=\"http://localhost/Historical-Object/./assets/image/konten_img/empek-empek-c37ce3ca497f25a19c8ac31767ee888c_600x4004.jpg\"></figure>', 1, 'admin admin2'),
(67, '1652001960.jpg', 'aaws ss', 'aaws-ss', '<figure class=\"image\"><img src=\"http://localhost/Historical-Object/./assets/image/konten_img/gambar12.jpg\"></figure>', 1, 'admin admin2'),
(68, '1652002363.jpg', 'sdasd', 'sdasd', '<figure class=\"image image-style-side\"><img src=\"http://localhost/Historical-Object/./assets/image/konten_img/gambar14.jpg\"></figure><p>&nbsp;</p><p>ghkjkjhjhkljjjjjjjjjjjjjjjjjjjjjjjj</p>', 1, 'admin admin2'),
(69, '1652004047.jpg', 'sadasd', 'sadasd', '<figure class=\"image\"><img src=\"/ckfinder/userfiles/images/empek-empek-c37ce3ca497f25a19c8ac31767ee888c_600x400.jpg\"></figure><p>asdsadwsadwad</p>', 0, 'admin admin2');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kuis`
--

CREATE TABLE `hasil_kuis` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `k_slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `k_slug`) VALUES
(1, 'Arca atau patung', 'Arca-atau-patung'),
(2, 'Artefak\r\n', 'Artefak'),
(9, 'prasasti', 'prasasti');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(11) NOT NULL,
  `soal_kuis` text NOT NULL,
  `jawaban_benar` text NOT NULL,
  `Pilihan_A` text NOT NULL,
  `Pilihan_B` text NOT NULL,
  `Pilihan_C` text NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id_kuis`, `soal_kuis`, `jawaban_benar`, `Pilihan_A`, `Pilihan_B`, `Pilihan_C`, `aktif`) VALUES
(3, '<img alt=\"\" src=\"http://localhost/Historical-Object/assets/image/konten_img/5154713.jpg\" style=\"height:155px; width:234px\" />\n\n<p>Batu Rosetta adalah prasasti berbahan dasar granodiorit yang bertuliskan tiga bahasa yaitu</p>\n', 'hieroglif, demotik Mesir, Yunani Kuno', ' Yunani Kuno, hieroglif, kawi', 'hieroglif, demotik Mesir, Yunani Kuno', 'Yunani Kuno, hieroglif, sunda', 'Y'),
(6, 'Batu rosetta merupakan prasasti yang bertuliskan tiga bahasa di dalamnya yaitu bahasa hieroglif, demotik mesir, serta yunani kuno. Batu ini telah dipajang di museum inggris meskipun batu tersebut bukan berasal dari inggris. Dari manakah asal batu rosetta?', 'mesir', 'mesir', 'yunani', 'prancis', 'Y'),
(7, 'Dalam peninggalan raja priam, terdapat banyak harta karun seperti perhiasan kepala, topeng, dan lainnya. Harta tersebut ditemukan oleh seorang arkeolog asal jerman yang bernama ?', 'Heinrich Schliemann', 'Robert Koldewey', 'Napoleon Bonaparte', 'Heinrich Schliemann', 'Y'),
(8, 'Hoa Hakananai’a merupakan pahatan batu basal besar yang menyerupai orang moai yang dibuat dari abad ke-12 hingga abad ke-17. Hoa Hakananai’a ini sendiri memiliki arti dalam namanya yaitu ?', 'Teman curian', 'Teman curian', 'Aku sang gagah', 'Teman semua', 'Y'),
(9, 'Berlian koh-i-noor berasal dari ?', 'India', 'Jerman', 'Inggris', 'India', 'Y'),
(10, 'Dalam sejarah turi, terdapat patung yang menggambarkan lelahnya nelayan tua sehabis melaut. Patung ini ditemukan oleh seorang arkeolog amatir dari prancis dan kemudian menjual patung tersebut ke jerman. Nama dari arkeolog amatir tersebut adalah ?', 'Paul gaudin', 'Christoper reed', 'Paul gaudin', 'Adam white', 'Y'),
(11, ' Harta karun kumluca berasal dari turki yang berisikan ?', 'Peralatan keagamaan', 'Peralatan keagamaan', 'Peralatan perang (Pedang hingga perisai)', 'Perhiasan emas', 'Y'),
(14, '<p>test 1</p>\r\n', 'test2', 'test1', 'test2', 'test3', 'Y'),
(15, '<p>test</p>\r\n', 'benar', 'sa', 'benar', 'sa', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `report_artikel`
--

CREATE TABLE `report_artikel` (
  `id_report` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_artikel`
--

INSERT INTO `report_artikel` (`id_report`, `id_artikel`, `id_user`, `keterangan`, `status`) VALUES
(1, 6, 1, 'coba coba', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_nilai`
--

CREATE TABLE `tmp_nilai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai` text NOT NULL,
  `soal` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `Password`, `img`, `id_role`) VALUES
(1, 'user', '', 'user', '60ade860f414e.png', 2),
(2, 'admin', '', 'admin', '60ac724b7a29e.png', 1),
(7, 'usertest', '', 'user', '60aa7a499cf9d.jpg', 2),
(8, 'user10', '', 'user', '60aa7a499cf9d.jpg', 2),
(13, 'admin admin2', 'admin@admin.com', '$2y$10$OuyIMf8XgC2xS/b81g0W1eM6CtnGOBWbTQ6KgLf2wDFc/311TG0x2', '1652085684.jpg', 1),
(14, 'user user2', 'user@user.com', '$2y$10$VLx/srXGvCgUyw3oJjqdZuyqC6SH8Ec/Bm.bIyVwD0Sp04CxpJHUa', '1652088737.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_user` (`username`);

--
-- Indexes for table `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `fk_hasil` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`);

--
-- Indexes for table `report_artikel`
--
ALTER TABLE `report_artikel`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `fk_report_user` (`id_user`),
  ADD KEY `fk_report_artikel` (`id_artikel`);

--
-- Indexes for table `tmp_nilai`
--
ALTER TABLE `tmp_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report_artikel`
--
ALTER TABLE `report_artikel`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_nilai`
--
ALTER TABLE `tmp_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  ADD CONSTRAINT `fk_hasil` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_artikel`
--
ALTER TABLE `report_artikel`
  ADD CONSTRAINT `fk_report_artikel` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`),
  ADD CONSTRAINT `fk_report_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
