-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2021 pada 12.56
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_report`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aspirasi`
--

CREATE TABLE `data_aspirasi` (
  `id` int(50) NOT NULL,
  `nama_instansi` varchar(200) NOT NULL,
  `laporan` varchar(1000) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `judulaspirasi` varchar(500) NOT NULL,
  `alamatpelapor` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_aspirasi`
--

INSERT INTO `data_aspirasi` (`id`, `nama_instansi`, `laporan`, `lampiran`, `judulaspirasi`, `alamatpelapor`, `email`) VALUES
(1, 'Dinas Kependudukan dan Pencatatan Sipil', 'saya sangat suka dengan pelayanan  yang diberikan di disdukcapil aceh utara, pegawainya sangat baik, ramah dan cepat dalam pengerjaannya. menurut saya dinas ini bisa lebih improve dibagian fasilitas gedungnya, biar yang datang lebih nyaman.', '1,2.PNG', 'saran untuk disdukcapil', 'krueng mane', 'ziazulfan13@gmail.com'),
(2, 'Kecamatan Sawang', 'kantor kecamatan sawang tidak buka pada waktu yang tepat, saya menunggu dari jam 8 sampai jam 10 , namun tidak satupun pegawai berada disana, seharusnya para pegawai harus datang tepat waktu agar dapat melayani masyarakat.', '0909.png_860.png', 'Kantor kecamatan buka terlalu lama', 'Sawang', 'ziazulfan13@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengaduan`
--

CREATE TABLE `data_pengaduan` (
  `id` int(50) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `status` enum('Disetujui','Diproses','Selesai','Ditolak') NOT NULL,
  `laporan` varchar(1000) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `judulpengaduan` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengaduan`
--

INSERT INTO `data_pengaduan` (`id`, `nama_instansi`, `status`, `laporan`, `lampiran`, `tanggal`, `lokasi`, `judulpengaduan`, `username`) VALUES
(13, 'Kecamatan Nisam', 'Disetujui', 'saya pergi ke kantor kecamatan nisam, namun kurang mendapatkan perhatian yang layak dimana saya melihat tidak adanya pegawai yang melayani ni ruang tunggu kantor', 'Untitled-1.jpg', '2020-11-30', 'nisam', 'pelayanan kurang memuaskan', 'lela'),
(16, 'Dinas Kependudukan dan Pencatatan Sipil', 'Diproses', 'nbdshfjkbsdjkbfjkbsdkf', '_DSC1913.JPG', '2021-01-04', 'landing', 'ktp tidak siap', 'lelaari'),
(21, 'Kecamatan Sawang', 'Diproses', 'saya minta untuk dibuatkan surat miskin untuk keperluan mendapatkan beasiswa tetapi surat masih belum selesai , saya datang ke kantor namun kantor tertutup dan tidak ada seorang pun yang melayani, bagaimana ini surat saya', 'c.JPG', '2021-01-05', 'kantor camat sawang', 'keterlambatan pembuatan surat miskin', 'zia zulfan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_solusi`
--

CREATE TABLE `data_solusi` (
  `username` varchar(500) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `solusi` varchar(500) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_solusi`
--

INSERT INTO `data_solusi` (`username`, `judul`, `nama_instansi`, `solusi`, `lampiran`, `id`) VALUES
('zia zulfan', 'keterlambatan pembuatan surat miskin', 'Kecamatan Sawang', 'terima kasih sudah menggunakan layanan kami, kami akan berusaha memperbaiki kinerja kami sebagai petugas pelayanan masyarakat kecamatan sawang untuk bisa mempercepat dan mengurus surat tersebut. ', 'c.JPG', 36),
('lelaari', 'ktp tidak siap', 'Dinas Kependudukan dan Pencatatan Sipil', 'jhgyjhjghgjhgjh', 'Cetak Kartu Hasil Studi - Portal Akademik6.pdf', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id`, `nama`, `email`, `komen`) VALUES
(7, 'riani', 'riani@gmail.com', 'website responsive dan mudah dimengerti.'),
(8, 'Zia Zulfan', 'ziazulfan13@gmail.com', 'website sangat menarik saya bisa menyampaikan suatu hal yang saya ingin sampaikan untuk instansi pemerintah, semoga kedepan bisa ditambahkan fitur-fiturnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Super Admin','Administrator','User') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `alamat`, `email`, `nama`, `foto`) VALUES
(40, 'DinasKesehatan', 'a40aab61c82173ab92aef413bcb36a31', 'Administrator', 'lhokseumawe', 'dinkes@gmail.com', 'Dinas Kesehatan', ''),
(33, 'disdukcapil', '7488e331b8b64e5794da3fa4eb10ad5d', 'Administrator', 'landing', 'dinas@gmail', 'Dinas Kependudukan dan Pencatatan Sipil', ''),
(28, 'lelaari', '0eb69ab0727d4829e8964313cff2f820', 'User', 'takengon', 'kamu@fff', 'lela', '_DSC1907.JPG'),
(39, 'sawang', 'd5d7bcca46d35f9c4047170e09b403e7', 'Administrator', 'kekekekek', 'sawang@gmail.com', 'Kecamatan Sawang', ''),
(31, 'Superadmin', '0192023a7bbd73250516f069df18b500', 'Super Admin', 'gggggg', 'kamu@fff', 'Super Admin', ''),
(24, 'zia zulfan', '23d631ba2770b4de7d0afd8445922cad', 'User', 'tambon krukuh', 'ziazulfan6@gmail.om', 'ziazulfan', 'DSC_0401-1.JPG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_aspirasi`
--
ALTER TABLE `data_aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pengaduan`
--
ALTER TABLE `data_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_solusi`
--
ALTER TABLE `data_solusi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_aspirasi`
--
ALTER TABLE `data_aspirasi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pengaduan`
--
ALTER TABLE `data_pengaduan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `data_solusi`
--
ALTER TABLE `data_solusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
