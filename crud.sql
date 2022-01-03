-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2022 pada 09.30
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun` date NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama`, `penulis`, `tahun`, `gambar`, `id_kategori`) VALUES
(4, 'testaaa', 'prof. ardi triana', '2021-12-28', '61caa6e90b469.jpg', 10),
(5, 'test', 'prof. ardi triana', '2021-12-30', '61caa70231a52.jpg', 7),
(6, 'toni', 'prof. ardi triana', '2021-12-31', '61caa71045f15.jpg', 7),
(7, 'test', 'prof. ardi triana', '2021-12-30', '61cbc796930ff.jpg', 7),
(8, 'iwan', 'prof. ardi triana', '2021-12-31', '61cbc7ddd46e9.jpg', 7),
(9, 'test', 'aedwqaw', '2021-12-30', '61cbc7ebea0e5.jpeg', 7),
(10, 'aswd', 'asdwd', '2021-12-23', '61cbc8a804f2a.jpeg', 6),
(11, 'asdasd', 'asdasd', '2021-12-24', '61cbc8e2af65b.jpg', 7),
(12, 'iwan', 'prof. ardi triana', '2021-12-30', '61cbc94c3b0fd.jpeg', 10),
(13, 'toni', 'prof. ardi triana', '2021-12-25', '61cbc9641d7af.jpeg', 6),
(14, 'test', 'prof. ardi triana', '2021-12-31', '61cbc9c119003.jpeg', 9),
(15, 'test', 'prof. ardi triana', '2021-12-30', '61cbca046aafe.jpeg', 10),
(16, 'test', 'prof. ardi triana', '2021-12-01', '61cbca12d1198.jpg', 6),
(17, 'Ayam', 'prof. ardi triana', '2021-12-02', '61cbca2314322.jpg', 7),
(18, 'toni', 'prof. ardi triana', '2021-12-30', '61cbca39acc94.jpg', 8),
(19, 'toni', 'prof. ardi triana', '2021-12-31', '61cbca6179a0c.jpg', 8),
(20, 'iwan', 'prof. ardi triana', '2021-12-25', '61cbca7a6c2d8.jpeg', 9),
(21, 'test', 'prof. ardi triana', '2021-12-24', '61cbca8ed91b4.jpeg', 10),
(22, 'asdasd', 'prof. ardi triana', '2021-12-15', '61cbca9e7f2c5.jpeg', 10),
(23, 'test', 'prof. ardi triana', '2021-12-10', '61cbcb676f475.jpeg', 6),
(24, 'asdasd', 'prof. ardi triana', '2021-12-24', '61cbcb7c408b9.jpeg', 6),
(25, 'test', 'prof. ardi triana', '2021-12-25', '61cbcb88ed554.jpg', 6),
(26, 'toni', 'prof. ardi triana', '2021-12-30', '61cbcb9a2391f.jpg', 6),
(27, 'test', 'prof. ardi triana', '2021-12-30', '61cbcbaaaa170.jpg', 6),
(28, 'Mudah dan Cepat Membuat Program Skripsi dengan VB 2012', 'Ir. Yuniar Supardi', '2012-01-01', '61d2589d8f683.jpg', 6),
(29, 'Grafik dan Animasi Professional Power Point', 'Edy Winarno ST, M.Eng dan Ali Zaki', '2015-01-01', '61d258d26aa50.jpg', 6),
(30, 'the C++ Programming Language third edition', 'Bjarne Stroustrup', '1997-01-01', '61d25904c74b5.jpg', 6),
(31, 'Basics of Reservoir Simulation with the Eclipse Reservoir Simulator', 'Oystein Pettersen', '2006-01-01', '61d259275965d.jpeg', 6),
(32, 'Manajemen Database dengan Microsoft Visual Basic Versi 6.0', 'M Agus, J. Alam', '2001-01-01', '61d2595ad635e.jpeg', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(6, 'Programming'),
(7, 'Personal'),
(8, 'Sejarah'),
(9, 'Pelajaran'),
(10, 'Kamus'),
(13, 'Olahraga ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` int(2) DEFAULT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_siswa`, `id_buku`) VALUES
(3, '2021-12-31', '2021-12-30', 0, 3, 13),
(4, '2021-12-29', '2021-12-30', 0, 4, 25),
(13, '2022-01-03', '2022-01-04', 1, 1, 32),
(14, '2022-01-08', '2022-01-13', 1, 1, 31),
(15, '2022-01-09', '2022-01-21', 0, 1, 31),
(17, '2022-01-15', '2022-01-16', 0, 1, 30),
(18, '2022-01-09', '2022-01-10', 1, 2, 26),
(19, '2022-01-01', '2022-01-02', 0, 1, 32),
(20, '2022-01-30', '2022-01-31', 1, 1, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `username`, `password`, `email`, `gambar`) VALUES
(1, 'I Made Widanta Abdi Nugraha', 'tata', 'tata', 'tata@gmail.com', '61d28ef5159cf.jpg'),
(2, 'ardi', 'ardi', 'ardi', 'ardi@gmail.com', '61cd3c532692e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
