-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2021 pada 06.41
-- Versi server: 10.1.22-MariaDB
-- Versi PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alter_priv_sewa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `gambar` varchar(255) NOT NULL DEFAULT 'default.png',
  `theme` varchar(20) NOT NULL DEFAULT 'sb_admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `status`, `gambar`, `theme`) VALUES
(2, 'admin@admin.com', 'admin', 'Admin Sewa', 1, 'default.png', 'sb_admin'),
(3, 'admin2@admin.com', 'asdf', 'Admin 2', 1, 'default.png', 'sb_admin'),
(4, 'admin3@admin.com', 'asdf', 'Admin 3', 1, 'default.png', 'sb_admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `id_merk` tinyint(2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `transmisi` enum('Manual','Automatic') NOT NULL,
  `jumlah_kursi` tinyint(2) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `kategori_plat` enum('Genap','Ganjil') NOT NULL,
  `bahan_bakar` enum('Pertamax','Premium','Pertalite','Solar') NOT NULL,
  `harga_include_driver` decimal(8,0) NOT NULL,
  `harga_exclude_driver` decimal(8,0) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stok` int(5) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `id_merk`, `type`, `transmisi`, `jumlah_kursi`, `plat_nomor`, `kategori_plat`, `bahan_bakar`, `harga_include_driver`, `harga_exclude_driver`, `deskripsi`, `file`, `tgl_input`, `stok`, `status`) VALUES
(52, 1, 'Innova Venturer', 'Automatic', 7, 'B 2343 DPK', 'Genap', 'Pertamax', '750000', '500000', '', 'venturer_ok.jpg', '2021-06-30 09:55:38', 0, 'Aktif'),
(53, 1, 'Innova Reborn', 'Manual', 7, 'B 4565 VVV', 'Genap', 'Pertamax', '700000', '450000', '', 'reborn_ok.jpg', '2021-06-30 09:55:24', 0, 'Aktif'),
(54, 1, 'Avanza', 'Manual', 7, 'B 1243 NNN', 'Genap', 'Pertamax', '450000', '350000', '', 'avanza_ok.jpg', '2021-06-30 09:55:11', 0, 'Aktif'),
(55, 1, 'Hiace', 'Manual', 12, 'B 5343 STT', 'Genap', 'Pertamax', '1500000', '1200000', '', 'haice_1.jpg', '2021-06-30 09:52:39', 0, 'Aktif'),
(56, 2, 'Sigra', 'Manual', 7, 'B 2334 NMN', 'Genap', 'Pertamax', '450000', '350000', '', 'sigra-ok.jpg', '2021-07-02 04:39:48', 0, 'Aktif'),
(57, 2, 'Xenia', 'Automatic', 7, 'B 3455 BBB', 'Ganjil', 'Pertamax', '550000', '450000', '', 'xenia.jpg', '2021-07-02 04:40:38', 0, 'Aktif'),
(58, 2, 'Luxio', 'Manual', 7, 'B 3444 STN', 'Genap', 'Pertamax', '475000', '375000', '', 'luxio-ok.jpg', '2021-07-02 04:41:23', 0, 'Aktif'),
(59, 2, 'Terios', 'Automatic', 7, 'B 4334 TMM', 'Genap', 'Pertamax', '650000', '550000', '', 'terios-ok.jpg', '2021-07-02 04:42:09', 0, 'Aktif'),
(60, 3, 'Jazz', 'Automatic', 5, 'B 5444 BHN', 'Genap', 'Pertamax', '575000', '475000', '', 'jazz_ok.jpg', '2021-07-02 04:42:48', 0, 'Aktif'),
(61, 3, 'Brio', 'Automatic', 5, 'B 5453 THH', 'Ganjil', 'Pertamax', '475000', '375000', '', 'brio-ok.jpg', '2021-07-02 04:43:28', 0, 'Aktif'),
(62, 3, 'BRV', 'Automatic', 7, 'B 5675 SXX', 'Ganjil', 'Pertamax', '750000', '650000', '', 'brv-ok.jpg', '2021-07-02 04:44:10', 0, 'Aktif'),
(63, 3, 'Mobilio', 'Automatic', 7, 'B 8889 BTN', 'Genap', 'Pertamax', '725000', '625000', '', 'mobilio-ok.jpg', '2021-07-02 04:45:03', 0, 'Aktif'),
(64, 4, 'Serena', 'Automatic', 7, 'B 7878 BTT', 'Genap', 'Pertamax', '850000', '750000', '', 'serena-ok.jpg', '2021-07-02 04:45:36', 0, 'Aktif'),
(65, 4, 'Livina', 'Automatic', 7, 'B 7676 BGT', 'Genap', 'Pertamax', '700000', '600000', '', 'livina-ok.jpg', '2021-07-02 04:46:16', 0, 'Aktif'),
(66, 4, 'Evalia', 'Automatic', 7, 'B 6565 BNN', 'Ganjil', 'Pertamax', '550000', '450000', '', 'evalia-ok.jpg', '2021-07-02 04:47:01', 0, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id` tinyint(2) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id`, `nama`) VALUES
(1, 'Toyota'),
(2, 'Daihatsu'),
(3, 'Honda'),
(4, 'Nissan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tjm_menu`
--

CREATE TABLE `tjm_menu` (
  `id` int(11) NOT NULL,
  `parent_menu` int(11) NOT NULL DEFAULT '1',
  `nama_menu` varchar(50) NOT NULL,
  `url_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `urutan` tinyint(3) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` enum('Admin') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tjm_menu`
--

INSERT INTO `tjm_menu` (`id`, `parent_menu`, `nama_menu`, `url_menu`, `icon`, `urutan`, `status`, `type`) VALUES
(1, 1, 'root', '/', '', 0, 0, 'Admin'),
(2, 1, 'dashboard', 'admin/dashboard', 'fa fa-fw fa-dashboard', 1, 1, 'Admin'),
(3, 1, 'User Admin', 'admin/useradmin', 'fa fa-users', 99, 1, 'Admin'),
(4, 1, 'Menu', 'admin/menu', 'fa fa-gear', 100, 0, 'Admin'),
(30, 1, 'Merk Mobil', 'admin/merk', 'glyphicon glyphicon-th-large', 5, 0, 'Admin'),
(31, 1, 'Kendaraan', 'admin/kendaraan', 'glyphicon glyphicon-th-list', 4, 1, 'Admin'),
(32, 1, 'Pengiriman', 'admin/pengiriman', 'glyphicon glyphicon-plane', 4, 0, 'Admin'),
(33, 1, 'Booking', 'admin/booking', 'glyphicon glyphicon-usd', 2, 1, 'Admin'),
(34, 1, 'Penyewa', 'admin/penyewa', 'fa fa-users', 9, 1, 'Admin'),
(35, 1, 'Konfirmasi', 'admin/konfirmasi', ' glyphicon glyphicon-th-list', 3, 0, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_booking` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_kendaraan` int(11) NOT NULL,
  `layanan` enum('Dengan Driver','Tanpa Driver') NOT NULL,
  `harga_layanan` int(11) NOT NULL,
  `id_kota` int(2) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `jam_mulai` time NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `jumlah_hari` tinyint(4) NOT NULL,
  `total_bayar` int(8) NOT NULL,
  `status_pembayaran` enum('Menunggu Pembayaran','Pembayaran Berhasil','Batal','Verifikasi Pembayaran') NOT NULL,
  `status_booking` enum('Pending','Menunggu Pengambilan','Berjalan','Selesai','Batal') NOT NULL,
  `bank_tujuan` enum('BCA','MANDIRI','BNI') NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_booking`, `id_user`, `tgl_transaksi`, `id_kendaraan`, `layanan`, `harga_layanan`, `id_kota`, `alamat`, `tgl_mulai`, `jam_mulai`, `tgl_akhir`, `jumlah_hari`, `total_bayar`, `status_pembayaran`, `status_booking`, `bank_tujuan`, `tgl_konfirmasi`) VALUES
(46, '20210630299', 10, '2021-06-30 10:52:54', 52, 'Tanpa Driver', 500000, 0, '', '2021-07-01 00:00:00', '20:00:00', '2021-07-02 00:00:00', 1, 500558, 'Menunggu Pembayaran', 'Pending', 'MANDIRI', '2021-06-30 17:49:17'),
(47, '20210630294', 12, '2021-06-30 15:19:02', 53, 'Tanpa Driver', 450000, 0, '', '2021-07-01 00:00:00', '18:00:00', '2021-07-04 00:00:00', 3, 1350900, 'Pembayaran Berhasil', 'Pending', 'MANDIRI', '2021-06-30 22:04:36'),
(48, '20210630500', 12, '2021-06-30 16:53:55', 55, 'Tanpa Driver', 1200000, 0, '', '2021-07-03 00:00:00', '06:00:00', '2021-07-06 00:00:00', 3, 3600572, 'Menunggu Pembayaran', 'Pending', 'MANDIRI', '0000-00-00 00:00:00'),
(49, '20210702670', 11, '2021-07-02 04:52:56', 64, 'Tanpa Driver', 750000, 0, '', '2021-07-02 00:00:00', '20:00:00', '2021-07-05 00:00:00', 3, 2250921, 'Menunggu Pembayaran', 'Pending', 'BCA', '0000-00-00 00:00:00'),
(50, '20210702749', 13, '2021-07-02 08:16:24', 54, 'Tanpa Driver', 350000, 0, '', '2021-07-02 00:00:00', '16:00:00', '2021-07-04 00:00:00', 2, 700558, 'Pembayaran Berhasil', 'Pending', 'BCA', '2021-07-02 15:15:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_kota` int(4) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `status_verifikasi` enum('Belum Terverifikasi','Proses Verifikasi','Terverifikasi','Ditolak') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `alamat`, `no_telpon`, `email`, `id_kota`, `ktp`, `status_verifikasi`, `status`) VALUES
(10, 'ALI MURDANI S', 'asdf', 'Jakarta Selatan', '081224343222', 'daniesimanjuntak@gmail.com', 1, 'mandiri2.jpg', 'Ditolak', 'Aktif'),
(11, 'Lorem', 'asdf', 'Jakarta', '08888', 'lorem@gmail.com', 2, '', 'Belum Terverifikasi', 'Aktif'),
(12, 'Lorem Ipsum', 'asdf', 'Jakarta', '081232121', 'lorem@mail.com', 0, 'KTP_DANI.jpeg', 'Terverifikasi', 'Aktif'),
(13, 'Bella', 'asdf', 'Jakarta', '0812312321', 'bella@gmail.com', 0, 'mandiri3.jpg', 'Terverifikasi', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tjm_menu`
--
ALTER TABLE `tjm_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tjm_menu`
--
ALTER TABLE `tjm_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
