-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2019 pada 17.23
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_auth`
--

CREATE TABLE `tb_auth` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_auth`
--

INSERT INTO `tb_auth` (`id`, `username`, `password`, `role`, `nama`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', ''),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'Ini User', 'e7f6efe85da4e0ff34c2a606dbf674f2.jpg'),
(5, 'ilham', 'b63d204bf086017e34d8bd27ab969f28', 'user', 'M. Ilham Surya Pratama', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id_blog` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug_blog` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `user` int(11) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `tgl_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_blog`
--

INSERT INTO `tb_blog` (`id_blog`, `judul`, `slug_blog`, `isi`, `user`, `thumbnail`, `tgl_post`) VALUES
(1, 'JAMIN KESELAMATAN WISATAWAN BROMO, DISHUB HIMBAU PEMILIK JEEP WISATA UJI KENDARAAN BERKALA', 'jamin-keselamatan-wisatawan-bromo-dishub-himbau-pe', '<p><strong>KRAKSAAN</strong>&nbsp;&ndash; Dinas Perhubungan (Dishub) Kabupaten Probolinggo berusaha semaksimal mungkin untuk terus memberikan pelayanan yang terbaik kepada masyarakat sesuai dengan Perbup No. 67 tahun 2016 tentang Tupoksi Dinas Perhubungan Kabupaten Probolinggo. Salah satunya adalah turut andil dalam memastikan keselamatan wisatawan yang akan berwisata di Bromo dengan menggunakan jasa transportasi Jeep. Seperti yang diketahui, ratusan Jeep yang beroperasi di kawasan wisata Bromo itu belum melaksanakan kewajiban Uji Kir selama kurun lima tahun terakhir ini.</p>\r\n\r\n<p>Oleh karenanya di awal tahun 2019 ini Dishub Kabupaten Probolinggo telah memulai penertiban kepada para pemilik kendaraan jip angkutan wisata Gunung Bromo tersebut. Tercatat sampai akhir bulan Januari ini saja, UPTD Balai Pengujian Kendaraan Bermotor Dishub Kabupaten Probolinggo telah melayani Uji Kir sebanyak 57 unit jip wisata dari Bromo, dan dipastikan jumlahnya akan terus bertambah. Kepala Dishub Heri Sulistiyanto mengungkapkan pihaknya mempunyai kiat &ndash; kiat khusus agar bisa merangsang dan mendorong para pemilik jip khususnya di wilayah kecamatan Sukapura agar secara sadar bersedia melakukan kewajibannya yaitu Uji Kir kendaraan.</p>\r\n\r\n<p>Karena Uji kir merupakan kewajiban pemilik kendaraan, baik angkutan umum maupun mobil penumpang. Hal itu dilakukan agar kendaraan yang beroperasi tidak membahayakan keselamatan pengendara dan para penumpang, &ldquo;Sebelumnya kami mengawali dengan silaturahmi dan sosialisasi kepada para tokoh masyarakat sekaligus paguyuban &ndash; paguyuban pemilik jasa transportasi wisata jip, dan alhamdulillah himbauan kami ditindaklanjuti dengan secara bertahap melakukan uji Kir,&rdquo; jelas Heri.</p>\r\n\r\n<p>Lebih lanjut mantan Kepala Dinas PMD ini menjelaskan, motivasi utama upaya ini bukanlah semata &ndash; mata demi untuk menyerap pendapatan asli daerah (PAD) yang bersumber dari uji kir tersebut, namun mengupayakan tindakan preventif untuk menjamin keselamatan jiwa para wisatawan gunung Bromo kedepannya, mengingat umur kendaraan yang memang rata &ndash; rata tergolong sudah tua dan gunung Bromo semakin ramai kunjungan wisata.</p>\r\n\r\n<p>&ldquo;Apalagi mereka tidak hanya mengangkut wisatawan lokal, tapi juga wisatawan mancanegara. Kalau misalnya ada hal yang tidak diinginkan karena kendaraan yang tidak layak, tidak hanya Probolinggo yang disorot, tapi Indonesia karena gunung Bromo adalah jujukan wisata kelas dunia,&rdquo; tandasnya<strong>.&nbsp;</strong></p>\r\n', 1, '1e1fe59ed7eef1e8b978ccfbe8e256c4.jpg', '2019-06-18'),
(2, 'FPTI LIRIK POTENSI SPOT PANJAT TEBING DI LERENG UTARA ARGOPURO', 'fpti-lirik-potensi-spot-panjat-tebing-di-lereng-ut', '<p><strong>TIRIS, KRUCIL</strong>&nbsp;&ndash; Tak hanya molek, objek wisata alam di Kabupaten Probolinggo ternyata menyimpan banyak potensi tersembunyi. Khususnya di lereng utara Gunung Argopuro selain dikenal kaya akan keragaman hayati, karakter alam yang masih perawan acapkali mengundang penyuka olahraga ekstrim untuk turut mengeksplorasi. Siapa sangka tebing alam eksotis yang menjadi ciri khas pesona wisata alam Ranu Agung kecamatan Tiris, air terjun Kalipedati dan Hyang Darungan kecamatan Krucil ternyata memiliki reputasi mengagumkan bagi para pegiat olahraga panjat tebing Indonesia.</p>\r\n\r\n<p>Akhir Januari kemarin tim Federasi Panjat Tebing Indonesia (FPTI) Jawa Timur bersama Pengurus Cabang FPTI Kabupaten Probolinggo dan club panjat tebing lokal berkesempatan untuk mensurvey tiga lokasi tersebut. Dalam survey tersebut tim meneliti karakter batu, mengamati kondisi alam serta mengukur kedalaman dan keamanan dasar air pada tebing yang berada di Ranu Agung.</p>\r\n\r\n<p>Witjaksono, Kepala Bidang Tebing Alam pada Pengcab FPTI Kabupaten Probolinggo menjelaskan tebing alam di tiga lokasi tersebut masing-masing memiliki karakter dan klasifikasi yang berbeda. Tebing Hyang Darungan lebih pas untuk Bordering (skill climbing), tebing alam Kalipedati yang lebar dan ekstrim lebih tepat untuk profesional expert yaitu extreme rock climbing. &ldquo;Sedangkan tebing Ranu Agung sangat cocok untuk kelas panjat tebing yang saat ini sedang digemari yaitu deep water solo climbing.</p>\r\n\r\n<p>Jadi olahraga panjat tebing pada kelas ini tanpa menggunakan alat sedikit pun dan mengandalkan kedalaman air dibawahnya sebagai pengaman utama saat jatuh,&rdquo; papar Jackey, sapaan akrab bapak dua anak ini. Jackey mengemukakan FPTI Jatim akan lebih dulu mengembangkan spot panjat tebing di Ranu Agung untuk kemudian di publikasikan dengan baik. Bahkan karakter yang dimiliki oleh tebing Ranu Agung boleh dikatakan satu &ndash; satunya di Indonesia dimana tebingnya sangat aman untuk di panjat langsung dan memiliki grade yang lengkap, mulai untuk pemula sampai pemanjat tebing expert.</p>\r\n\r\n<p>Oleh karena itu kata jackey, dua bulan setelah giat survey tersebut akan menyusul agenda berikutnya yaitu pembuatan jalur untuk pemasangan anchor dan hanger sebagai media pemasangan carmantle (tali khusus untuk panjat tebing). &ldquo;Mohon doa restu InsyaAllah tebing Ranu Agung bakal ketempatan salah satu hajat FPTI Jatim yaitu Gatering FPTI,&rdquo; ungkapnya.</p>\r\n\r\n<p>Lebih lanjut alumni Universitas Zainul Hasan ini mengutarakan Kabupaten Probolinggo sangat kaya akan spot olahraga panjat tebing. Dan tebing alam yang dimiliki Kabupaten Probolinggo tidak kalah eksotis dan menantang dibanding daerah lain. &ldquo;Sebenarnya olahraga rock climbing juga banyak diminati di Kabupaten Probolinggo, hanya sarana saja yang belum siap. Oleh karena itu bersama FPTI Jawa Timur, Pengcab FPTI Kabupaten Probolinggo akan mengupayakan untuk segera memiliki sarana rock climbing,&rdquo; tandasnya.</p>\r\n', 5, 'cd432f82e83f8b2ddfb36082675c831d.jpg', '2019-06-18'),
(3, 'SINERGITAS PT. JAWA POWER – PT. YTL BERSAMA MASYARAKAT LESTARIKAN SUMBER MATA AIR', 'sinergitas-pt-jawa-power-pt-ytl-bersama-masyarakat', '<p><strong>KOTAANYAR</strong>&nbsp;&ndash; Upayakan penyadartahuan masyarakat tentang manfaat pelestarian sumber mata air, PT. Jawa Power &ndash; PT. YTL Jawa Timur bersama warga masyarakat Desa Bhinor dan Kotaanyar bersinergi menanam ratusan bibit Bambu Petung dan pohon Gayam di sekitar sumur dan mata air tua, Jum&rsquo;at (25/01/2019) pagi.</p>\r\n\r\n<p>Mata air dan sumur tersebut berada di sekitar sebuah situs makam kuno (Prabu Jenggolo/sesepuh warga masyarakat Kotaanyar). Sumur tersebut masih aktif, bahkan pada saat musim kemarau debit air nya tetap stabil sehingga banyak dimanfaatkan para petani saat musim kemarau/musim tanam tembakau dengan memanfaatkan mesin pompa air.</p>\r\n\r\n<p>&ldquo;Penanaman bibit bambu petung disekitar mata air dan pohon gayam di aliran sungai ini nantinya akan memperkuat area tangkapan air. Hal ini merupakan salah satu upaya sebagai solusi jangka panjang bagi permasalahan kekeringan pada saat musim kemarau,&rdquo; jelas Syofi&rsquo;i, Kepala Bagian External Relations pada PT. YTL Jawa Timur saat berkegiatan bersama masyarakat Kotaanyar.</p>\r\n\r\n<p>Syofi&rsquo;i menjelaskan, sebelumnya sudah tersosialisasikan dengan baik kepada masyarakat setempat bahwa menanam bambu petung dan gayam juga akan memberikan dampak ekonomi nantinya. Selain menargetkan manfaat jangka panjang melalui aksi ini, hasil jangka menengahnya ternyata juga sangat menarik. Kali ini sudah timbul kesadaran dari masyarakat untuk ikut andil dalam aksi menanam untuk menyelamatkan air ini. Syofi&rsquo;i mengemukakan hal ini merupakan sebuah pencapaian yang baik dan tren positif yang perlu di gepuk tularkan secara terus menerus ke tengah masyarakat.</p>\r\n\r\n<p>Dimana umumnya masyarakat cenderung apatis dan acuh tak acuh dengan kegiatan pelestarian lingkungan. &ldquo;Kita selalu mengajak masyarakat untuk berperan aktif dalam hal ini, sebenarnya mereka juga peduli tinggal bagaimana kita mengawalinya. Alhamdulillah kini mereka pelan &ndash; pelan sudah mulai paham konsepnya yaitu kalau mau panen air ya harus menabung, caranya ya dengan menanam dan merawat mata air tersebut,&rdquo; tegas pria kelahiran Kota Malang ini.</p>\r\n\r\n<p>Lebih lanjut Syofi&rsquo;i mengemukakan, wilayah di selatan PLTU Paiton yang berkarakter berbukit dengan vegetasi tidak begitu rapat memang menjadi fokus kerja bagi CSR PT. YTL selama ini. Motivasi YTL adalah utk membantu masyarakat disini yang cenderung terdampak permasalahan kekurangan air. Setiap musim kemarau tiba, mereka harus rela merogoh rupiah sampai ratusan ribu untuk mendatangkan truk tangki air untuk Memenuhi kebutuhan sehari-hari mereka.</p>\r\n\r\n<p>&ldquo;Untuk Kotaanyar yang penting sudah ada langkah awal dulu sebagai upaya solusi jangka panjang, nanti sambil kita kaji dan pelajari untuk program penyelesaian selanjutnya seperti pembuatan tandon air, pipanisasi, dan tabungan air melalui sumur resapan,&rdquo; tandasnya.</p>\r\n', 1, '267ad7fc846241da5ccba3c35c3eb0b9.jpg', '2019-06-18'),
(4, 'KEANEKARAGAMAN HAYATI LANGKA NAN EKSOTIS DI AIR TERJUN KALIPEDATI', 'keanekaragaman-hayati-langka-nan-eksotis-di-air-te', '<p><strong>KRUCIL</strong>&nbsp;- Ternyata ada sisi lain yang tidak banyak diperhatikan para pengunjung wisata alam air terjun Kalipedati. Selain panorama alam yang begitu asri dan lestari, ternyata objek wisata yang kian hari semakin diminati ini juga menyimpan kekayaan keanekaragaman hayati langka dan eksotis.</p>\r\n\r\n<p>Terletak di lereng utara Gunung Argopuro (Hyang Barat) tepatnya pada wilayah Administratif desa Kalianan, kecamatan Krucil dan sekaligus juga masih termasuk kawasan hutan lindung Petak 1a KRPH Bermi Kabupaten Probolinggo.</p>\r\n\r\n<p>Untuk mengungkap keberadaan keanekaragaman hayati yang juga hidup lestari di kawasan objek wisata ini, sebuah komunitas fotografi satwa liar Probolinggo (5:am_wildlifephotography) bersama suporter Profauna Probolinggo berhasil mengidentifikasi sekaligus mendokumentasikan puluhan jenis satwa burung dan beberapa primata di sepanjang aliran sungai Kalipedati sampai pada spot air terjun beberapa waktu lalu.</p>\r\n\r\n<p>Dalam kegiatan ini mereka juga mengajak serta beberapa pengamat satwa liar sekaligus Agen Tour Birding dari kota Malang, untuk melihat langsung bagaimana keindahan panorama alam Kabupaten Probolinggo yang juga menjadi rumah bagi satwa liar endemik Jawa.</p>\r\n\r\n<p>Djoko Prasetio mengemukakan bahwa keragaman jenis satwa langka dan endemik Jawa masih banyak tersimpan di hutan - hutan lindung di Kabupaten Probolinggo. Hutan lindung ibarat benteng terakhir satwa liar endemik di tengah maraknya exploitasi alam dan isinya oleh manusia.</p>\r\n\r\n<p>&quot;Hasil record dan dokumentasi ini akan kami sampaikan kepada pemerintah desa dan penanggung jawab kawasan ini, sekaligus kami upayakan penyadartahuan masyarakat masyarakat setempat bahwa dengan menjaga keberadaan satwa liar dan alam nya juga akan membawa dampak positif yaitu kunjungan wisata minat khusus,&quot; ungkap founder 5:am_wildlifephotography sekaligus Suporter Profauna ini.</p>\r\n\r\n<p>Sedikitnya 24 satwa liar jenis burung yang berhasil tercatat dan teridentifikasi saat pengamatan yaitu, Prenjak Coklat, Meninting kecil, Cekakak Jawa, Pelanduk semak, Elang ular bido, Elang Sikep madu Asia (Migran), Kicuit batu (migran), Kadalan birah, Pelanduk topi hitam, Takur tenggeret, Srigunting kelabu, Sikatan kerdil, Sikatan kepala abu abu, Cinenen pisang, cinenen Jawa, Wiwik kelabu, Kaladi ulam, Madu bunga api, Merbah terucuk, Merbah kutilang, Bondol jawa, Bondol peking dan layang - layang loreng.</p>\r\n\r\n<p>Selain jenis burung juga sering di jumpai adanya koloni lutung jawa dan tupai yang nampak menghiasi pepohonan sepanjang jalur menuju spot air terjun. Tentu hal ini menjadi tambahan atraksi wisata tersendiri bagi pengunjung, karena keberadaan mereka sangat mudah di amati, berbeda dengan jenis burung yang relatif sulit untuk diamati.</p>\r\n\r\n<p>Kukuh Wibowo, Bird Guide Profesional di salah satu Agen Tour Birding kota Malang mengungkapkan, keberadaan satwa liar yang masih terjaga dan adanya beberapa satwa yang memang sudah langka dan memiliki sebaran terbatas merupakan potensi besar yang menjadi aset utama dalam pengembangan wisata air terjun Kalipedati.</p>\r\n\r\n<p>Dirinya tidak menyangka sebelumnya bakal menjumpai sekelompok burung prenjak coklat di sini, secara prenjak coklat Jawa adalah sub-species endemic memang sudah sangat langka dan memiliki penyebaran terbatas yaitu Yunnan, Myanmar, Vietnam dan Indonesia yaitu di Jawa. Oleh karena itu prenjak coklat boleh dibilang calon &quot;endemic full species&quot; untuk Jawa.</p>\r\n\r\n<p>Adanya burung meninting kecil yang merupakan pemakan serangga air dan juga burung Takur tanggeret juga disebut sebagai indikator bahwa hutan, dan air di sepanjang aliran Kalipedati ini masih lestari dan asri.</p>\r\n\r\n<p>Ditambah keberadaan burung spesial yaitu prenjak coklat dan beberapa burung raptor Kukuh menerangkan, objek wisata Kalipedati ada peluang untuk ke arah wisata minat khusus. Namun masih dibutuhkan kajian lebih lanjut tentang keseluruhan potensi khusunya keanekaragaman burung dan satwa lain.</p>\r\n\r\n<p>&quot;InsyaAllah beberapa waktu kedepan kami ada agenda untuk mengantar dua tamu asing dari Amerika dan mereka tertarik untuk pengamatan satwa liar. InsyaAllah air terjun Kalipedati ini juga masuk salah satu rekomendasi kami kedepannya,&quot; ungkap Kukuh.</p>\r\n\r\n<p>Terpisah, Kepala Administrasi (Adm) KPH Probolinggo, Haris Suseno&nbsp;sangat mengapresiasi apa yang dilakukan komunitas yang terbilang cukup langka ini. Hal ini selaras dengan misi Perum Perhutani yaitu pengelolaan Sumber Daya Hutan secara seimbang dan Lestari sehingga bermanfaat sosial ekonomi masyarakat.</p>\r\n\r\n<p>Seiring dengan majunya pengembangan destinasi wisata alam di Kabupaten Probolinggo, pihaknya juga akan selalu mensuport semaksimal mungkin. Khususnya pada ecotourism yang juga banyak memanfaatkan kawasan hutan dengan segala keanekaragaman hayati di dalamnya.</p>\r\n\r\n<p>&quot;Jika sinergi ini bisa terjalin baik, Perhutani, Pemkab Probolinggo dan masyarakat Probolinggo, kami yakin perkembangan destinasi wisata alam Kabupaten Probolinggo ini akan bisa berkembang lebih maju dan berkonsep wawasan lingkungan,&quot; pungkasnya.</p>\r\n', 1, '31ad8187aabcc06b52dcb194f94d061c.jpg', '2019-06-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_budaya`
--

CREATE TABLE `tb_budaya` (
  `id_budaya` int(11) NOT NULL,
  `nama_budaya` varchar(50) NOT NULL,
  `slug_budaya` varchar(50) NOT NULL,
  `foto_budaya` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_budaya`
--

INSERT INTO `tb_budaya` (`id_budaya`, `nama_budaya`, `slug_budaya`, `foto_budaya`, `deskripsi`) VALUES
(1, 'Ludruk', 'ludruk', '23999b06c64da6d6d8fca4a85af3ee5a.jpg', '<p>Ludruk merupakan suatu bentuk pementasan drama kehidupan yang disajikan dengan pendekatan kehidupan sehari-hari masyarakat&nbsp;<strong>Jawa Timur</strong>&nbsp;pada umumnya. Ludruk tumbuh dan berkembang hamper disemua daerah di Jawa Timur bagian Timur termasuk di daerah <strong>Probolinggo</strong>. Tampilan ludruk khas <strong>Probolonggo </strong>memiliki perbedaan dengan ludruk-ludruk lainnya, yakni pada bahasa yang dipakai <strong>Ludruk Probolinggo</strong> menggunakan bahasa Jawa Ngoko yang di campur dengan bahasa Madura Pesisiran, baik dalam bentuk kidungan maupun dialog para pemainnya.</p>\r\n'),
(4, 'Tari Glipang', 'tari-glipang', 'e0129ee7309d0cfbab54e0ad9d066d99.jpg', '<p>Tari Glipang lahir di&nbsp;<strong>Desa Pendil</strong>, <strong>Kecamatan Banyuanyar</strong>, <strong>Kabupaten Probolinggo</strong>&nbsp;ini sudah lama dikenal masyarakat. Tari Glipang Berasal dari kebiasan masyarakat. Kebiasaan yang sudah turun temurun tersebut akhirnya menjadi tradisi. Pak Parmo yang merupakan cucu dari pencipta Tari Glipang ini mengatakan bahwa &ldquo;<strong>Glipang</strong>&rdquo; bukanlah nama yang sebenarnya dari tarian tersebut. Awalnya nama tari tersebut adalah &ldquo;<strong>Gholiban</strong>&rdquo; berasal dari bahasa arab yang berarti kebiasaan.</p>\r\n'),
(5, 'Petik Laut', 'petik-laut', '74ae1145a1991c043e51535d1ee28063.jpg', '<p>Petik Laut merupakan lomba balap perahu yang di adakan pada tanggal <strong>15 bulan Sya&rsquo;ban (15 hari sebelum puasa)</strong>. Tradisi ini berasal dari masyarakat yang bertujuan untuk menyambut hadirnya bulan puasa.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galery_budaya`
--

CREATE TABLE `tb_galery_budaya` (
  `id_foto_budaya` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `id_budaya` int(11) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galery_budaya`
--

INSERT INTO `tb_galery_budaya` (`id_foto_budaya`, `filename`, `id_budaya`, `token`) VALUES
(2, '79c23231579b466ba466aada46838eea.jpg', 1, '0.8719720236285151'),
(4, '50555a19d87944ce12b8ac9671657da9.jpg', 4, '0.6535142543957024'),
(5, '60d5d5ae8e1b276ee4b39216684a49c3.jpg', 4, '0.5778601971593991');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galery_hotel`
--

CREATE TABLE `tb_galery_hotel` (
  `id_galery_hotel` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galery_hotel`
--

INSERT INTO `tb_galery_hotel` (`id_galery_hotel`, `filename`, `id_hotel`, `token`) VALUES
(1, 'd6fc3524e79349472a9ee97c7354b862.jpg', 2, '0.8114236341859686'),
(2, '11b452216176c9550676b4dc55097c82.jpg', 2, '0.079830855299996'),
(4, '7d279fc607b350ccbf6c06074ac3340b.jpg', 2, '0.673879614204044'),
(5, '997bd097e92514882e37fa9ad8d66899.jpg', 2, '0.48570559332212526'),
(6, 'dae1d1fb0cda74ecc320cffaccb95f80.jpg', 2, '0.8164431451296621'),
(7, '40c05d565d6271e1fe7fedc53118b010.jpg', 3, '0.5272276773743321'),
(10, '1b3ac2fcb8b85bf202013ae872b31159.jpg', 3, '0.33662862407491634');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galery_kuliner`
--

CREATE TABLE `tb_galery_kuliner` (
  `id_galery_kuliner` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `id_kuliner` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galery_kuliner`
--

INSERT INTO `tb_galery_kuliner` (`id_galery_kuliner`, `filename`, `id_kuliner`, `token`) VALUES
(1, '6972df14084bf6b0fabef62f9f8f19d0.jpg', 2, '0.6156315561365411'),
(2, 'fd7b2385fcdbb7a9b887e162ff941a6a.JPG', 2, '0.4718712858901015'),
(3, '8a871eea97cbbe4e36bddaee77f6d36b.png', 2, '0.6327255120167279'),
(4, '5e7d330b59a69433afc9e7a4b3565581.jpg', 3, '0.13842961108286955'),
(8, '73997bdcf8e68d46d1bb1decca200320.png', 4, '0.9043533000740327'),
(9, 'ae16f05d53fdc00ea017529079d4167e.jpg', 4, '0.5610825384270217'),
(10, 'bad029ee03870b5349c0009469e91490.jpg', 4, '0.5979799257111489'),
(11, 'a9664125b24a2c11a0a95e6f8b8ec9e3.jpg', 4, '0.11856818211564835'),
(12, '5f6580c84583b7702c25d0f77bbd9086.jpeg', 4, '0.41933477403180897');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galery_wisata`
--

CREATE TABLE `tb_galery_wisata` (
  `id_foto_wisata` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galery_wisata`
--

INSERT INTO `tb_galery_wisata` (`id_foto_wisata`, `filename`, `id_wisata`, `token`) VALUES
(1, '03085791c0efc4097239f65650aa27c1.jpg', 2, ''),
(2, '778e8d88b02b39f8dc1f2d3a9f2fdc18.jpg', 2, ''),
(3, 'fe2f1f9e367a78b3fe56ff855fef5601.jpg', 2, ''),
(4, 'fab22c747c14a617b05909874cc0e682.jpg', 2, ''),
(5, '160900cf96f5b86933bfe08ea27fc244.png', 2, ''),
(6, '22d268e80fe3dc98f823e1463722d5a0.png', 2, ''),
(7, '86ddbdb2d87f3a275f9b81d3454202ff.png', 2, ''),
(8, 'f561160868132c15780049e99af5a671.jpg', 2, ''),
(9, '7818b3fe0eef591949b78852c80a0d47.jpg', 1, ''),
(10, '229ed5919cde632038c16ff91893bf6a.png', 1, '0.36461845159266404'),
(11, 'afc08d2f53ec436349a99bc596789843.jpg', 1, '0.12848864114836323'),
(12, '01efca6dd1439ba28d2234d69e6e6301.png', 3, '0.5564293765266404'),
(13, '77a27721a93e46c3a628ae08f314baaa.png', 3, '0.09354884187365475'),
(14, '90d5e133ebc6e7db20255b3b83f1fac4.png', 3, '0.8828664591500512'),
(15, 'dd4500adc433fe8705b57877a75e0319.png', 3, '0.6875212283389043'),
(16, 'b47c767e37c2ea5e0532cf4905104441.jpg', 3, '0.17435185130950126'),
(17, '65cc32d0c195a8e3a6154e5d9f07fb39.jpg', 3, '0.03932917124207336'),
(18, '8167ff4c33aab3d47d56375bb46933bd.jpg', 4, '0.866847345335896'),
(20, 'd48631864cc4df71923c53c261aa02e3.JPG', 4, '0.5685876606190223'),
(21, '74d25fffaa8ff11b2badf0f3ad92b13c.jpg', 4, '0.289612430570344'),
(22, 'c8f65df7b01411aec0e477745b6ebb08.JPG', 4, '0.7153369216829968'),
(23, 'd3f24cbe2d9e0b10def7e9dedd0d2e96.jpg', 3, '0.9794201446001571'),
(24, '4d34e067ba0d336a5adb5c1382374e69.JPG', 3, '0.2546420675689107'),
(26, '88a158a2f0588546a79572c071cece8f.jpg', 6, '0.8146618806243162'),
(40, 'e458c61906b43f35a999657e30ab0fc4.jpg', 6, '0.770239939823341'),
(43, '1159068035e3830222024faa3defde1d.jpg', 6, '0.6196577714926477'),
(45, 'fd67ec342f3626769072c940e16e8fb2.jpg', 1, '0.29990101873617836');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(50) NOT NULL,
  `slug_hotel` varchar(50) NOT NULL,
  `alamat_hotel` text NOT NULL,
  `deskripsi_hotel` text NOT NULL,
  `foto_hotel` varchar(50) NOT NULL,
  `peta_hotel` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `nama_hotel`, `slug_hotel`, `alamat_hotel`, `deskripsi_hotel`, `foto_hotel`, `peta_hotel`, `harga`) VALUES
(2, 'Hotel Mawar', 'hotel-mawar', 'Kraksaan, Probolinggo', '<p>Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;Hotel Mawar Kraksaan&nbsp;</p>\r\n', '01028fd2a608b7f9a89cdea494433092.png', '', 0),
(3, 'Hotel Bromo Permai 1 Probolinggo', 'hotel-bromo-permai-1-probolinggo', 'Dusun Cemara Lawang, Desa Ngadisari, Kecamatan Sukapura, Cemorolawang, Ngadisari, Sukapura, Probolinggo, Jawa Timur 67254', '<p>Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;</p>\r\n\r\n<p>Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;Hotel Bromo Permai 1 Probolinggo&nbsp;</p>\r\n', '07609905c8f4d41926e7d21a7b7c33b4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.728067308137!2d112.96265021437803!3d-7.923446281080277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ad9ff8fd78ff%3A0x6fdeba35284385f9!2sHotel+Bromo+Permai+1+Probolinggo!5e0!3m2!1sid!2sid!4v1560679975139!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuliner`
--

CREATE TABLE `tb_kuliner` (
  `id_kuliner` int(11) NOT NULL,
  `nama_kuliner` varchar(50) NOT NULL,
  `slug_kuliner` varchar(50) NOT NULL,
  `deskripsi_kuliner` text NOT NULL,
  `foto_kuliner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kuliner`
--

INSERT INTO `tb_kuliner` (`id_kuliner`, `nama_kuliner`, `slug_kuliner`, `deskripsi_kuliner`, `foto_kuliner`) VALUES
(2, 'Soto Koya Kraksaan', 'soto-koya-kraksaan', '<p>Selain Mie Combor, makanan yang paling khas Probolinggo adalah Soto Koya Kraksaan. Soto Koya Kraksaan ada di beberapa tempat, salah satunya ada di samping SD Al Iryad Kraksaan Jl Mayjen Sutoyo.</p>\n', '06c99c29681acbf13af99218d9478b4b.jpg'),
(3, 'Mie Combor', 'mie-combor', '<p>Mie Combor adalah salah satu makanan yang paling terkenal di Kabupaten Probolinggo. Tepatnya di alun-alun kota Kraksaan. Mie yang ditaburi kecambah ini konon katanya bisa meningkatkan vitalitas pria.</p>\r\n', 'fe63d6ccf5d67133c3cb4406a9b75430.jpeg'),
(4, 'Nasi Goreng', 'nasi-goreng', '<p>Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;</p>\r\n\r\n<p>Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;Nasi Goreng&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2fbae4cf5a850d8a896905e326f3de36.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `alamat_wisata` text NOT NULL,
  `slug_wisata` varchar(50) NOT NULL,
  `foto_wisata` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `lang_wisata` varchar(10) NOT NULL,
  `lat_wisata` varchar(10) NOT NULL,
  `peta_wisata` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `nama_wisata`, `alamat_wisata`, `slug_wisata`, `foto_wisata`, `deskripsi`, `lang_wisata`, `lat_wisata`, `peta_wisata`) VALUES
(1, 'Air Terjun Kedung Amis', 'Petungsari, Ngepung, Sukapura, Probolinggo, Jawa Timur 67255', 'air-terjun-kedung-amis', '28f602718686b7b149644d43ad2c1470.jpeg', '<p>Air terjun Kedung Amis terletak tepat sebelum masuk ke area Air Terjun Watu Lawang. Aliran air dari Air terjun Kedung Amis selanjutnya terbelah menjadi dua, yakni ke kiri yang mengarah ke Air Terjun Watu Lawang dan ke kanan yang mengarah ke Air Terjun Sumber Pakis II.</p>\r\n\r\n<p>Tempat ini sangat indah dan bisa memberikan sensasi yang berbeda dengan aktivitas kita sehari-hari. Wisata Air Terjun Kedung Amis di Probolinggo memiliki pesona keindahan yang sangat menarik untuk dikunjungi.</p>\r\n\r\n<h2><strong>Pergi Ke Sana</strong></h2>\r\n\r\n<p>Masih satu jalur dengan jalan raya menuju wisata gunung Bromo dari arah Probolinggo, ketika sampai di dekat SMKN 1 Sukapura terdapat sebuah gang kecil disebelahnya, dan kita harus menitipkan kendaraan pada masyarakat didekat kawasan tersebut. Kemudian dilanjutkan dengan turun ke bawah untuk menyusuri pinggiran sungai. Dari tempat parkir menuju sungai bisa memakan waktu sekitar 15 - 20 menit tergantung kondisi.</p>\r\n\r\n<p><strong>Rute 1:&nbsp;Kota Probolinggo -&gt; Jl. Raya Broto -&gt;&nbsp; Jl. Raya Ngepung</strong></p>\r\n\r\n<hr />\r\n<h2><strong>Tips Wisata</strong></h2>\r\n\r\n<ol>\r\n	<li>Selama perjalanan, terdapat beberapa air terjun lainnya (Triban, Sumber Pakis II, Watu Lawang)</li>\r\n	<li>Kami sarankan jika pergi ketempat wisata ini usahakan pada saat pagi hari (sebelum jam 12), jadi waktu kembali tidak terlalu sore (sebelum jam 4)</li>\r\n	<li>Dianjurkan jangan disaat hujan atau setelah hujan karena bukan hanya medan yang licin, tapi juga tempat ini masih rawan longsor dan banjir</li>\r\n	<li>Gunakan alas kaki yang tidak gampang selip karena trek yang cukup berbahaya</li>\r\n</ol>\r\n', '88937', '34344', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.2875466132336!2d113.07273231477852!3d-7.8649479943334555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTEnNTMuOCJTIDExM8KwMDQnMjkuNyJF!5e0!3m2!1sid!2sid!4v1560841632675!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(2, 'Air Terjun Kali Pedati', 'Unnamed Road, Dusun Selatan, Bermi, Krucil, Probolinggo, East Java 67288', 'air-terjun-kali-pedati', 'f9674d6bdde85d1635aa2d35dfa0406f.jpeg', '<p>Air Terjun Kali Pedati memiliki ketinggian sekitar 20 m dan masih berada di Kawasan Wisata Bremi di lereng Gunung Argopuro. Keberadaan air terjun ini di atas (ke arah hulu) Air Terjun Darungan dengan debit kucuran air yang lebih besar dan lebih tinggi.</p>\r\n\r\n<p>Jarak tempuh dari Ranu Agung Resort dengan kendaraan bermotor berkisar 1,5 jam ditambah jalan kaki selama 1 jam dengan menyisir daerah sepanjang aliran Sungai Pedati yang terkenal dengan tebing-tebing batuan vertikal.</p>\r\n\r\n<h2>Pergi Ke Sana</h2>\r\n\r\n<p>Air Terjun Kali Pedati ini berada di lereng Gunung Argopuro. Terletak di Desa Kalianan, Kecamatan Krucil. Jika menggunakan kendaraan umum, anda bisa naik bus dari kota Probolinggo dan berhenti di Desa Krucil. Setelah itu melanjutkan perjalanan dengan menyewa ojek motor.</p>\r\n\r\n<blockquote>\r\n<p><strong>Rute 1:</strong>&nbsp;Kota Probolinggo&nbsp; -&gt;&nbsp; Kalianan&nbsp; -&gt; Krucil</p>\r\n</blockquote>\r\n', '98765', '56789', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3398573262098!2d113.48825631477929!3d-7.963785994264097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTcnNDkuNiJTIDExM8KwMjknMjUuNiJF!5e0!3m2!1sid!2sid!4v1560841472532!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(3, 'Air Terjun Hyang Darungan', 'Kalianan, Bermi, Krucil, Probolinggo, Jawa Timur 67288', 'air-terjun-hyang-darungan', '00775862df4edb59017a713bd540472f.jpeg', '<p>Air terjun yang bernama lengkap Air Terjun Hyang Darungan ini berlokasi di Desa Bremi, Kecamatan Krucil, Kabupaten Probolinggo, Provinsi Jawa Timur. Bisa ditempuh sekitar 1 jam perjalanan dari Probolinggo dengan kendaraan bermotor dan diteruskan dengan berjalan kaki selama 1 jam melalui area Perkebunan Kopi Aeng Dingin di lereng barat Pegunungan Argopuro.</p>\r\n\r\n<h2>Pergi Ke Sana</h2>\r\n\r\n<p>Dari terminal kota Probolinggo bisa menggunakan bus jurusan Bremi, setelah itu &plusmn;2 jam jalan kaki dari pintu masuk wisata Bremi menuju ke air terjun.</p>\r\n\r\n<blockquote>\r\n<p><strong>Rute 1:</strong>&nbsp;Kota Probolinggo -&gt; Bremi</p>\r\n</blockquote>\r\n', '86876', '65657', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.358378877539!2d113.51502131477925!3d-7.961865994265427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTcnNDIuNyJTIDExM8KwMzEnMDIuMCJF!5e0!3m2!1sid!2sid!4v1560841340524!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(4, 'Air Panas Desa Tiris', 'Sapih, Branggah, Lumbang, Probolinggo, Jawa Timur 67183', 'air-panas-desa-tiris', '1eec90d2264fb621d86526c0b38e238e.jpg', '<p>Lokasi wisata sumber air panas ini berdekatan dengan Danau Segaran. Wisata ini seringkali juga dikenal sebagai istilah&nbsp;<em>natural hot spring</em>. Wisatawan datang berkunjung ke tempat ini tentu saja untuk menikmati sumber air panas yang ada untuk mandi atau berendam menghangatkan badan.</p>\r\n\r\n<p>Karena mengandung belerang, terdapat beberapa manfaat berendam di Air Panas Desa Tiris, antara lain membuat badan menjadi segar dan menyembuhkan berbagai penyakit kulit.</p>\r\n\r\n<h2>Pergi Ke Sana</h2>\r\n\r\n<p>Tidak ada angkutan umum yang langsung menuju ke lokasi. Lebih baik jika menggunakan kendaraan pribadi atau travel guide.</p>\r\n\r\n<blockquote>\r\n<p><strong>Rute 1:</strong>&nbsp;Kota Probolinggo&nbsp;&nbsp;Kec. Krucil&nbsp;&nbsp;Kec. Tiris</p>\r\n</blockquote>\r\n', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5012890715448!2d113.39580231477913!3d-7.947035994275795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTYnNDkuMyJTIDExM8KwMjMnNTIuOCJF!5e0!3m2!1sid!2sid!4v1560841181704!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(5, 'Air Terjun Madakaripura', 'Madakaripura Waterfall, Tersono, Sapih, Lumbang, Probolinggo, Jawa Timur 67183', 'air-terjun-madakaripura', 'd0d6c4ae00d11ec4c8a221378df6595f.jpg', '<p>Madakaripura diperkirakan menjadi lokasi terakhir Patih Gajah Mada sebelum menghadap sang pencipta. Nama Madakaripura diartikan sebagai tempat persemedian terakhir Gajah Mada. Yakni, Mada (Gajah Mada), Kari (terakhir), dan Pura (tempat bersemedi).</p>\r\n\r\n<h2>Tips Wisata</h2>\r\n\r\n<ol>\r\n	<li>Datanglah pagi hari sebelum jam 10, karena setelah jam 12 biasanya hujan atau banjir mulai datang</li>\r\n	<li>Jika sedang banjir, pengunjung tidak diperbolehkan untuk masuk sama sekali</li>\r\n	<li>Sebaiknya naik ojek dari parkiran untuk menuju ke air terjun, karena cukup jauh jika berjalan kaki</li>\r\n	<li>Disarankan untuk membeli jas hujan karena dipastikan akan basah kuyup</li>\r\n</ol>\r\n\r\n<h2>Informasi Lainnya</h2>\r\n\r\n<p>Tidak banyak literatur yang bisa ditemukan untuk membuktikan fakta keterkaitan Patih Gajah Mada dengan air terjun yang eksotis tersebut. Namun begitu, sebagian besar masyarakat percaya bahwa air terjun tersebut menjadi saksi bisu hari-hari terakhir Gajah Mada.</p>\r\n\r\n<p>Sejumlah mitos&nbsp; juga diceritakan warga setempat. Diantaranya, keberadaan senjata ampuh dari sang maha patih. Senjata tak kasat mata itu konon tersimpan di goa tempat Gajah Mada bersemedi. Untuk meyakinkan bahwa Gajah Mada memang berada di tempat itu, dibangun dua patung Gajah Mada di lokasi me uju air terjun sebagai penanda.</p>\r\n\r\n<h2>Pergi Ke Sana</h2>\r\n\r\n<p>Untuk menuju ke air terjun Madakaripura, anda bisa menggunakan kendaraan pribadi atau menyewa travel / jeep dari Kota Probolinggo. Lokasinya masih satu jalan dengan jalur ke Bromo.</p>\r\n\r\n<blockquote>\r\n<p><strong>Rute 1:</strong>&nbsp;Kota Probolinggo&nbsp; -&gt; Jl. Sukapura -&gt;&nbsp; Jl. Raya Lumbang</p>\r\n</blockquote>\r\n', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.4531277339515!2d113.01375031477855!3d-7.8475519943456975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTAnNTEuMiJTIDExM8KwMDAnNTcuNCJF!5e0!3m2!1sid!2sid!4v1560841876377!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(6, 'Air Terjun Sumber Pakis II', 'Petungsari, Ngepung, Sukapura, Probolinggo, Jawa Timur 67255', 'air-terjun-sumber-pakis-ii', '957e6145a5dc9c670ba04523c0c5232b.jpeg', '<p>Berada satu jalur dengan air terjun Watu Lawang. Di desa Ngepung, Kec. Sukapura. Air terjun Sumber Pakis II letaknya berdekatan dengan air terjun Triban &amp; air terjun Kedung Amis. Dari air terjun Kedung Amis nanti terdapat 2 aliran sungai, yang ke kiri ke air terjun Watu Lawang, sedangkan yang ke kanan ke air terjun Sumber Pakis II.</p>\r\n\r\n<h2>Tips Wisata</h2>\r\n\r\n<ol>\r\n	<li>Selama perjalanan, terdapat beberapa air terjun lainnya (Triban, Kedung Amis, Watu Lawang)</li>\r\n	<li>Kami sarankan jika pergi ketempat wisata ini usahakan pada saat pagi hari (sebelum jam 12), jadi waktu kembali tidak terlalu sore (sebelum jam 4)</li>\r\n	<li>Dianjurkan jangan disaat hujan atau setelah hujan karena bukan hanya medan yang licin, tapi juga tempat ini masih rawan longsor dan banjir</li>\r\n	<li>Gunakan alas kaki yang tidak gampang selip karena trek yang cukup berbahaya</li>\r\n</ol>\r\n\r\n<h2>Pergi Ke Sana</h2>\r\n\r\n<p>Masih satu jalur dengan jalan raya menuju wisata gunung Bromo dari arah Probolinggo, ketika sampai di dekat SMKN 1 Sukapura terdapat sebuah gang kecil disebelahnya, dan kita harus menitipkan kendaraan pada masyarakat didekat kawasan tersebut. Kemudian dilanjutkan dengan turun ke bawah untuk menyusuri pinggiran sungai. Dari tempat parkir menuju sungai bisa memakan waktu sekitar 15 - 20 menit tergantung kondisi.</p>\r\n\r\n<blockquote>\r\n<p><strong>Rute 1:</strong>&nbsp;Kota Probolinggo&nbsp; -&gt; Jl. Raya Broto -&gt;&nbsp; Jl. Raya Ngepung</p>\r\n</blockquote>\r\n', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.2875466132336!2d113.07273231477852!3d-7.8649479943334555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTEnNTMuOCJTIDExM8KwMDQnMjkuNyJF!5e0!3m2!1sid!2sid!4v1560842020496!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indeks untuk tabel `tb_budaya`
--
ALTER TABLE `tb_budaya`
  ADD PRIMARY KEY (`id_budaya`);

--
-- Indeks untuk tabel `tb_galery_budaya`
--
ALTER TABLE `tb_galery_budaya`
  ADD PRIMARY KEY (`id_foto_budaya`);

--
-- Indeks untuk tabel `tb_galery_hotel`
--
ALTER TABLE `tb_galery_hotel`
  ADD PRIMARY KEY (`id_galery_hotel`);

--
-- Indeks untuk tabel `tb_galery_kuliner`
--
ALTER TABLE `tb_galery_kuliner`
  ADD PRIMARY KEY (`id_galery_kuliner`);

--
-- Indeks untuk tabel `tb_galery_wisata`
--
ALTER TABLE `tb_galery_wisata`
  ADD PRIMARY KEY (`id_foto_wisata`);

--
-- Indeks untuk tabel `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_auth`
--
ALTER TABLE `tb_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_budaya`
--
ALTER TABLE `tb_budaya`
  MODIFY `id_budaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_galery_budaya`
--
ALTER TABLE `tb_galery_budaya`
  MODIFY `id_foto_budaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_galery_hotel`
--
ALTER TABLE `tb_galery_hotel`
  MODIFY `id_galery_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_galery_kuliner`
--
ALTER TABLE `tb_galery_kuliner`
  MODIFY `id_galery_kuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_galery_wisata`
--
ALTER TABLE `tb_galery_wisata`
  MODIFY `id_foto_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_hotel`
--
ALTER TABLE `tb_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  MODIFY `id_kuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
