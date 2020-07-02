-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2020 pada 13.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `no` varchar(4) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`no`, `bulan`) VALUES
('01', 'Januari'),
('02', 'Februari'),
('03', 'Maret'),
('04', 'April'),
('05', 'Mei'),
('06', 'Juni'),
('07', 'Juli'),
('08', 'Agustus'),
('09', 'September'),
('10', 'Oktober'),
('11', 'November'),
('12', 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`, `img`) VALUES
(1, 'didik setiawan', 'admin', '$2y$10$sH0PJZYvk05e8brldzJb3Oyl97GbytDPQYKy81lKzmXwONd6skwRK', 'FB_IMG_15794580137296494_(2).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `tgl_upload` int(11) NOT NULL,
  `date_update` int(11) NOT NULL,
  `diskon` varchar(11) NOT NULL,
  `harga_diskon` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `id_merk`, `id_produk`, `barang`, `harga`, `stok`, `deskripsi`, `img`, `tgl_upload`, `date_update`, `diskon`, `harga_diskon`) VALUES
(7, 12, 6, 'ASUS ROG Strix III-G G531 GW', '37531000', 2, 'Spesifikasi:\r\n1. Sistem Operasi : Windows 10 Home\r\n2. RAM : 16GB DDR4\r\n3. Processor : Intel Core I7 Gen 9\r\n4. SSD : 512GB\r\n5. Grafik : NVIDIA GeForce RTX 2070 8GB\r\n6.Ukuran Layar : 15.6 Inc FHD', 'download1.jpeg', 1592278691, 1593223271, '0', '0'),
(8, 9, 2, 'iPhone 11 Pro Max', '20000000', 3, 'Spesifikasi :\r\n1. Chipset : Apple A13 Bionic (7 nm+ )\r\n2. RAM : 4GB\r\n3. Memori Internal : 64GB\r\n4. Ukuran Layar : Super Retina XDR OLED 6.5 Inc 1242 x 2688 px.\r\n5. Baterai : 3900 mAh.\r\n6. Kamera Depan : 12mp.\r\n7. Kamera Belakang : Triple Camera , 12mp(Wide),12mp(telephoto),12mp(ultrawide)', 'images_(2)1.jpeg', 1592365417, 1592716521, '5', '19000000'),
(9, 16, 6, 'Lenovo Legion Y740', '26000000', 3, 'Spesifikasi :\r\n1. Processor : Intel Core I7-9750-H\r\n2. RAM : 16GB\r\n3. SSD : 1TB\r\n4. Grafik : NVIDIA GeForce RTX 2060 6 GB\r\n5. Sistem Operasi : Windows 10 Home\r\n6. Lain-Lain : Wifi,Bluetooth,WebCam', 'images_(3)1.jpeg', 1592397211, 1593574982, '5', '24700000'),
(10, 3, 2, 'Xiaomi Redmi Note 10 pro', '6000000', 5, 'Spesifikasi :\r\n1. Chipset : Qualcomm SDM730 Snapdragon 730G (8 nm)\r\n2. RAM : 8GB\r\n3. Memori Internal : 256GB\r\n4. Kamera Depan : 32mp\r\n5. Kamera Belakang : 5 Kamera (Penta-Camera) 109mp+12mp+8mp+20mp+2mp\r\n6. Baterai : 5260 mAh\r\n7. Ukuran Hp : 157.8 x 74.2x 9.7 mm', 'images_(4)1.jpeg', 1592398324, 1593314329, '9', '5460000'),
(11, 17, 6, 'Acer Predator Triton 900', '80000000', 2, 'Spesifikasi :\r\n1. Processor : Intel Core i9-9980HK\r\n2. RAM : 2 x 16GB DDR4\r\n3. SSD : 2 x 512GB\r\n4. VGA : NVIDIA  GeForce RTX 2080 8 GB\r\n5. Ukuran Layar : 17.3 UHD\r\n6. Sistem Operasi : Windows 10 Home', '5cdcca16bc2461.jpg', 1592398935, 1592398935, '0', '0'),
(14, 8, 2, 'vivo v19', '7000000', 7, 'ok gn ini adalah hp dengan kamera jahat', 'images1.jpeg', 1593060845, 1593683940, '0', '0'),
(15, 18, 2, 'Samsung A50', '8500000', 4, 'Ini adalah hp samsung', 'images_(1)1.jpeg', 1593076913, 1593679854, '0', '0'),
(16, 12, 6, 'ASUS ROG Zephyrus G14', '19000000', 5, 'Spesifikasi :\r\n1. CPU : AMD Ryzen 7 4900HS\r\n2. GPU : NVIDIA GeForce RTX 2060 6 GB GDDR6 VRAM\r\n3. RAM : 16GB DDR4\r\n4. SSD : 1TB\r\n5. OS : Windows 10 Pro\r\n6. Ukuran Layar : 14 Inc', 'images_(2)11.jpeg', 1593680557, 1593680557, '0', '0'),
(17, 13, 3, 'Canon M10', '4800000', 4, 'Speesifikasi:\r\n18.0 MP APS-C CMOS Sensor\r\nDIGIC 6 Image Processor\r\nFull HD 1080p Video at 30/24 fps', 'images_(3)11.jpeg', 1593684309, 1593684309, '0', '0'),
(18, 14, 3, 'Nikon Coolpix p900', '7400000', 2, 'Spesifikasi :\r\n16 MP 1/2.3 CMOS Sensor\r\n24-2000 mm f2.8-6.5 Zoom Lens\r\n1920 x 1080 video resolution', 'images_(4)11.jpeg', 1593684592, 1593684701, '0', '0'),
(19, 19, 7, 'Adidas Samba OG', '1600000', 6, 'Regular Fit\r\nDilengkapi Tali sepatu\r\nUpper berbahan kulit full grain dengan suede bertekstur dan detail gold foil\r\nmidsole berbahan karet gum', 'B75807_SL_eCom1.jpg', 1593685068, 1593685068, '0', '0'),
(20, 20, 9, 'Komik Seri : One Piece (Eiichiro Oda)', '20000', 10, 'Kondisi Buku : Segel (baru)\r\nBisa beli cabutan\r\nHarga per buku', '4c6361051e9697d63f8c34b5d5dc7b901.jpeg', 1593685570, 1593685570, '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id`, `id_brg`, `id_user`, `jumlah`, `subtotal`) VALUES
(1593227957, 7, 3, 1, '37531000'),
(1593227957, 15, 3, 1, '8500000'),
(1593228044, 10, 1, 1, '5460000'),
(1593647466, 8, 1, 1, '19000000'),
(1593654565, 14, 3, 1, '7000000'),
(1593654565, 10, 3, 1, '5460000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merk`
--

CREATE TABLE `tb_merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_merk`
--

INSERT INTO `tb_merk` (`id`, `merk`) VALUES
(2, 'advan'),
(3, 'xiaomi'),
(4, 'realme'),
(8, 'vivo'),
(9, 'apple'),
(10, 'oppo'),
(11, 'sony'),
(12, 'asus'),
(13, 'canon'),
(14, 'nikon'),
(15, 'nokia'),
(16, 'lenovo'),
(17, 'Acer'),
(18, 'Samsung'),
(19, 'Adidas'),
(20, 'Unknow');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(20) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `batas_bayar` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `bayar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id`, `id_user`, `alamat`, `kodepos`, `jumlah`, `total`, `tgl_pesan`, `batas_bayar`, `status`, `bayar`) VALUES
(1593227957, 3, 'Jl Merdeka no 2', 68166, 2, '46031000', '2020-06-27', '2020-06-30', 'pending', 'belum'),
(1593228044, 1, 'Jl Ahmad jaya no 55', 68166, 1, '5460000', '2020-06-27', '2020-06-30', 'pending', 'belum'),
(1593647466, 1, 'Jl surga no 201', 68166, 1, '19000000', '2020-07-02', '2020-07-05', 'pending', 'belum'),
(1593654565, 3, 'jl surga no 24434', 68166, 2, '12460000', '2020-07-02', '2020-07-05', 'pending', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `produk`) VALUES
(2, 'handphone'),
(3, 'kamera'),
(6, 'laptop'),
(7, 'sepatu'),
(9, 'Buku & Alat Tulis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `tgl_bergabung` int(11) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `no_telp`, `jk`, `password`, `img`, `tgl_bergabung`, `aktif`) VALUES
(1, 'didik setiawan', 'didiksetyaone0@gmail.com', '08233177114409', 'laki-laki', '$2y$10$5ZKSdSjyUuzbGxJWQoEBterdLERyXJl7CQ8a/nYrOexvhv2cDCm3m', 'wp.jpg', 1592531771, 1),
(3, 'ayu', 'bamgomng@yahoo.com', '082331778976', 'perempuan', '$2y$10$4udKNONhL2ci1bN/E5jeueQiVLVxJVDEnJKa3ILVOdUj2N.Ue7sDK', 'images.png', 1593081303, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
