-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2022 pada 17.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcodelearn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` blob DEFAULT NULL,
  `phone` varchar(250) NOT NULL,
  `plan` enum('basic','standart','premium') DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `ip` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `registrations`
--

INSERT INTO `registrations` (`id`, `name`, `email`, `password`, `phone`, `plan`, `date_created`, `ip`) VALUES
(7, 'suci', 'roselyrush@gmail.com', 0x31323334, '0895377001710', 'basic', '2022-01-10 16:29:11', '::1'),
(2, 'Dina', 'dina@gmail.com', 0x31323334, '0895377001710', 'basic', '2022-01-09 17:18:34', '::1'),
(3, 'luna', 'luna@gmail.com', 0x31323334, '0895377001710', 'premium', '2022-01-09 17:24:49', '::1'),
(5, 'suci', 'suci@gmail.com', 0x31323334, '086845301710', 'basic', '2022-01-09 17:32:23', '::1'),
(6, 'Adinda', 'dinda@gmail.com', 0x31323334, '085702829960', 'standart', '2022-01-10 08:49:14', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 8, 1, 'userid'),
(10, '000', 4, 1, 'ExerciseID'),
(12, '000', 34, 1, 'BLOGID'),
(13, '0', 5, 1, 'STUDENTID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbllesson`
--

CREATE TABLE `tbllesson` (
  `LessonID` int(11) NOT NULL,
  `LessonChapter` varchar(90) NOT NULL,
  `LessonTitle` varchar(90) NOT NULL,
  `FileLocation` text NOT NULL,
  `Category` varchar(90) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbllesson`
--

INSERT INTO `tbllesson` (`LessonID`, `LessonChapter`, `LessonTitle`, `FileLocation`, `Category`, `image`) VALUES
(27, 'Introduction to SQL', 'This chapter provides a brief introduction to working with relational databases. ', 'files/4 Data Analitik di Power BI.pdf', 'Sql', NULL),
(35, 'Intro to Java', 'Expand your job opportunities with lessons designed for current developers like you.', 'files/3 Visualisasi Data di Power BI.pdf', 'Java', NULL),
(38, 'Intermediate Python', 'Build on top of your Python skills use datetime, dateframe and more.', 'files/3 Visualisasi Data di Power BI.pdf', 'Python', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblstudent`
--

CREATE TABLE `tblstudent` (
  `StudentID` int(11) NOT NULL,
  `Fname` varchar(90) NOT NULL,
  `Lname` varchar(90) NOT NULL,
  `Address` varchar(90) NOT NULL,
  `MobileNo` varchar(90) NOT NULL,
  `STUDUSERNAME` varchar(90) NOT NULL,
  `STUDPASS` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblstudent`
--

INSERT INTO `tblstudent` (`StudentID`, `Fname`, `Lname`, `Address`, `MobileNo`, `STUDUSERNAME`, `STUDPASS`) VALUES
(4, 'Alivia', 'Sakina', 'Pati', '0895', 'alivv', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(5, 'Rinan', 'Diya', 'Solo', '0895377001710', 'rinan', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(6, 'test', 'tester', 'Solo', '0895', 'tester', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(7, 'anin', 'Diya', 'Solo', '0895', 'ani', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(9, 'Luna', 'Julie', 'Pati', '0821', 'luna', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(10, 'Rinan', 'Diya', 'Solo', '0895377001710', 'Rinan', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(11, 'Anin', 'diya', 'Pati', '0895', 'anin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(13, 'Andina', 'Rina', 'Solo', '08967543', 'andina', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(14, 'Ariana', 'Dinda', 'Solo', '08967543', 'ariana', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(15, 'Adinda', 'Dian', 'Solo', '08967543', 'adinda', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` int(11) NOT NULL,
  `NAME` varchar(90) NOT NULL,
  `UEMAIL` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `TYPE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `NAME`, `UEMAIL`, `PASS`, `TYPE`) VALUES
(3, 'alivia', 'alivia', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indeks untuk tabel `tbllesson`
--
ALTER TABLE `tbllesson`
  ADD PRIMARY KEY (`LessonID`);

--
-- Indeks untuk tabel `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`StudentID`) USING BTREE;

--
-- Indeks untuk tabel `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbllesson`
--
ALTER TABLE `tbllesson`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
