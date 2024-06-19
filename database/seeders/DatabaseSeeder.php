<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Badge;
use App\Models\Berita;
use App\Models\Status;
use App\Models\Kategori;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@gmail.com',
            'role_id' => '1',
            'name' => 'ilham ramadan',
            'status_id' => '2',
        ]);

        User::factory()->create([
            'email' => 'penulis@gmail.com',
            'role_id' => '2',
            'name' => 'Angga ramadan',
            'status_id' => '2',
        ]);

        User::factory()->create([
            'email' => 'pengguna@gmail.com',
            'role_id' => '3',
            'name' => 'Yusuf ramadan',
            'status_id' => '1',
        ]);


        Role::create([
            'role_name' => 'superadmin',
        ]);

        Role::create([
            'role_name' => 'penulis',
        ]);

        Role::create([
            'role_name' => 'pengguna',
        ]);


        Status::create([
            'status_name' => 'reguler',
        ]);

        Status::create([
            'status_name' => 'premium',
        ]);


        Kategori::create([
            'kategori' => 'berita',
        ]);
        Kategori::create([
            'kategori' => 'dragrace',
        ]);
        Kategori::create([
            'kategori' => 'komparasi',
        ]);
        Kategori::create([
            'kategori' => 'modifikasi',
        ]);
        Kategori::create([
            'kategori' => 'sportcar',
        ]);




        Badge::create([
            'badge' => 'NEW'
        ]);

        Badge::create([
            'badge' => 'HOT'
        ]);

        Pembayaran::create([
            'pembayaran' => 'VA Mandiri',
            'no_VA' => 969,
            'harga' => 50000
        ]);
        Pembayaran::create([
            'pembayaran' => 'VA BCA',
            'no_VA' => 979,
            'harga' => 50000
        ]);
        Pembayaran::create([
            'pembayaran' => 'VA BRI',
            'no_VA' => 989,
            'harga' => 50000
        ]);




        $kategori1 = 1; //berita
        $kategori2 = 2; //Dragrace
        $kategori3 = 3; //komparasi
        $kategori4 = 4; //modifikasi
        $kategori5 = 5; //sportcar

        $userId = 2;

        $img = 'img-berita/';

        $judulBerita1 = 'Porsche Recall Taycan dan Panamera Terkait Masalah Suspensi';
        $artikelBerita1 = '<p> Porsche telah mengumumkan untuk melakukan recall pada sejumlah model Taycan dan Panamera di AS. Hal ini terjadi setelah ada referensi dari National Highway Traffic Safety Administration (NHTSA) atau lembaga keselamatan berkendara di AS mengenai potensi kerusakan pada lengan trailing bawah suspensi depan dengan kemungkinan patah. Lembaga ini telah memberitahukan mengenai cacat ini sejak Maret silam. </p> <p>Seperti dilansir carscoops, berdasar penyelidikan, ditemukan bahwa masalah tersebut karena lengan trailing bawah tersebut tidak sesuai dengan spesifikasi yang seharusnya. Jika lengan trailing patah, pengemudi mungkin mengalami kehilangan kendali. Porsche menambahkan bahwa lengan trailing dapat patah tanpa peringatan. </p> <p>Penarikan tersebut berdampak pada 565 Taycan , Panamera, Panamera Turbo S, Panamera GTS, Panamera 4, Panamera 4 Sport Turismo, Panamera 4 Executive, Panamera 4S Executive, Panamera 4S, Panamera 4S E-Hybrid, dan Panamera 4 E-Hybrid model, semuanya dari model tahun 2021. </p> <p>Untuk mengatasi masalah ini, dealer akan mengganti lengan belakang depan yang lebih rendah dengan yang baru diproduksi sesuai spesifikasi Porsche akan memberi tahu pemilik kendaraan yang terkena dampak pada 16 Juli dan melakukan perbaikan secara gratis. </p> <pTernyata masalah suspensi ini bukan hal pertama bagi Porsche Pada bulan Maret lalu, Taycan, Model 911, Cayman, dan Boxster mengalami recall terkait ketidak sempurnaan pada sistem suspensi.</p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori1,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'porshetaycan.jpg',
            'judul' => $judulBerita1,
            'artikel' => $artikelBerita1,
        ]);

        $judulBerita2 = 'BMW i4 Resmi Debut Dunia, Jadi Mobil Sedan Bermesin Listrik Perdana BMW';
        $artikelBerita2 = '<p> BMW resmi melakukan debut dunia mobil listrik terbarunya, yakni i4. Mobil ini menjadi sedan pertama BMW dengan gaya coupe dengan tenaga mesin listrik murni. </p> <p>BMW i4 memiliki panjang 4.785 mm, lebar 1.852 mm, tinggi 1.448 mm, dan wheelbase 2.856 mm. Track depan lebih lebar 26 mm dibandingkan Seri 3 G20, dan track belakang juga lebih lebar 13 mm. Berkat penempatan paket baterai 83,9 kWh, pusat gravitasi pada i4 secara 53 mm lebih rendah dibandingkan dengan Seri 3. </p> <p>Dari segi desain, BMW i4 secara visual mirip dengan BMW Seri 4. Terdapat kidney grille khas BMW di bagian depan, lubang angin Air Curtain di dua sudut bumper depan, dan lampu utama LED yang ramping, elegan dapat memilih lampu LED adaptif dengan BMW Laserlight dan BMW Selective Beam. </p> <p>BMW i4 eDrive40 mengusung penggerak roda belakang, tenaganya berasal dari motor listrik tunggal yang dipasang di gandar belakang. BMW i4 eDrive40 memiliki unit daya 250 kW yang bisa menghasilkan tenaga hingga 340 PS dan torsi maksimal 430 Nm. Akselerasi 0-100 km/jam cuma butuh 5,7 detik sebelum menyentuh kecepatan tertinggi yang dibatasi secara elektronik sampai 190 km/jam. </p> <p>Baterai 83,9 kWh yang dilindungi garansi delapan tahun atau 160.000 km mampu membawa dengan jarak tempuh mencapai 590 km. Mobil listrik ini bisa dilakukan pengisian daya cepat arus DC hingga 200 kW sehingga waktu pengisian 10 menit bisa membawa mobil melaju sampai 164 km. Untuk pengecasan standar dengan pengisi daya AC, dari 0 sampai 100% butuh waktu kurang dari 8,5 jam.</p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori1,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'bmwi4hybrid.jpeg',
            'judul' => $judulBerita2,
            'artikel' => $artikelBerita2,
        ]);

        $judulBerita3 = 'Corolla Cross Hadir Di Amerika Serikat, Lebih Canggih Namun Tidak Ada Mesin Hybrid';
        $artikelBerita3 = '<p> Setelah unggahan spyshotnya beredar, Corolla Cross kini resmi melenggang di Amerika Serikat. Mobil ini hadir di Negeri Paman Sam setekah sebelumnya mobil ini diprioritaskan untuk pasar Amerika Selatan, Asia Tenggara, dan Cina. </p> <p>Secara visual Corolla Cross versi Amerika Serikat tidak ada perbedaan dengan Corolla Cross versi negera lain. Namun perbedaannya, letak emblem Corolla Cross di pintu bagasi yang letaknya sedikit berbeda, Sementara fitur Corolla Cross yang hadir di Amerika Serikat cukup lengkap. Seperti Electric Parking Brake dengan Auto Hold, 9 airbag, pemanas jok, dan speaker JBL. </p> <p>Beralih ke bagian mesin, mobil ini juga ada perbedaan. Di balik kap mesinnya, Corolla Cross versi Paman Sam ditenagai oleh jantung pacu 2.000 cc M20A-FKS Dynamic Force yang bertenaga 169 dk dan torsi 203 Nm. Tetapi, justru di sana Corolla Cross tidak tersedia pilihan mesin hybrid, Tetapi, ada dua opsi penggerak, yakni penggerak roda depan atau FWD dan penggerak empat roda alias AWD. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori1,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'corollacross.jpg',
            'judul' => $judulBerita3,
            'artikel' => $artikelBerita3,
        ]);

        $judulBerita4 = 'Toyota Indonesia Segarkan Duet MPV Mewah Vellfire Dan Alphard';
        $artikelBerita4 = '<p> PT Toyota Astra Motor (TAM) menghadirkan versi penyegaran dari duet MPV mewah mereka, Vellfire dan Alphard di Indonesia. Keduanya mendapat sentuhan ubahan ringan, namun cukup terlihat dari sisi tampilan. Seperti apa? </p> <p>Pertama kita bahas soal Vellfire terlebih dulu. Karena di model inilah ubahannya terlihat signifikan. Paling jelas adalah sektor bumper depannya yang memiliki aksen rumit berupa garis horizontal yang banyak di kedua sisinya. </p> <p>Dari samping dan buritan, ubahannya ringan hanya menyesuaikan lekuk bodinya saja. Di Jepang, model ini disebut sebagai Vellfire Golden Eyes. Sementara di model Alphard, tak ditemui perubahan secara masif di sisi eksteriornya. Tetapi sama seperti Vellfire baru, model 2021 ini mendapat tambahan fitur berupa Adaptive Cruise Control sebagai standarnya. </p> <p>Fitur ini merupakan penyempurna Dynamic Radar Cruise Control (DRCC) di model sebelumnya. Di mana Adaptive Cruise Control dapat diaktifkan sejak kecepatan 0 km/jam. Beda dengan DRCC hanya bisa aktif saat mencapai 50 km/jam. </p> <p>“Fitur tersebut jadi bagian dari Toyota Safety Sense (TSS). Dalam keterangannya, TSS juga mengombinasikan fitur keselamatan canggih lain. Yakni Pre-Collision System (PCS), Lane Departure Alert (LDA), dan Automatic High Beam (AHB).</p> <p>Soal mesin, keduanya masih sama seperti sebelumnya. Kedua mobil ini tetap memakai mesin 2AR-FE, 2.494 cc, 4-silinder, DOHC, Dual VVT-i, bertenaga 180 hp dan torsi 234 Nm. Di Alphard ada pilihan mesin 2GR-FKS, 3.456 cc, V6, dengan tenaga 300 hp dan torsi 36,8 kg.m. Semuanya hanya disediakan transmisi otomatik.</p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori1,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'alphard-vellfire.jpg',
            'judul' => $judulBerita4,
            'artikel' => $artikelBerita4,
        ]);

        $judulBerita5 = 'Platform Sama, Pilih Toyota GR Supra atau BMW Z4 Terbaru?';
        $artikelBerita5 = '<p> Toyota GR Supra dan BMW Z4 Roadster dipasarkan di Indonesia. Keduanya berasal dari satu platform. Namun dari segi tampilan, paras Supra dengan Z4 terlihat amat berbeda. Toyota mengenalkan unit itu dengan banderol di kisaran Rp 2 milar (belum BBN). Sementara BMW Z4 dibanderol Rp 1,459 miliar off the road dengan inden 6 bulan. Pilih mana? </p> <p> Kita mulai dari kubikasi engine. Sayangnya untuk pasar Indonesia, BMW hanya menawarkan twinpower turbo 2,0 liter empat silinder. Output tenaganya naik 13 PS, menjadi 261 PS di rentang 5.000-6.500 rpm. Kemudian momen puntirnya mencapai 400 Nm tersedia dari 1.550 - 4.400 rpm. </p> <p>Racikan BMW ini, bikin mobil melaju dari 0-100 km/jam dalam tempo 5,4 detik. Konsumsi bahan bakarnya (kombinasi) diklaim 15 km/liter. Kemudian daya disalurkan ke roda melalui transmisi generasi terbaru, sport steptronic 8-percepatan. </p> <p>Sementara milik Toyota GR Supra lebih besar. Engineer tetap mempertahankan konfigurasi legendaris Supra, dengan mesin 3,0 liter turbo enam silinder segaris. Ia dilengkapi transmisi 8-speed sport automatic. Mesin mampu membuncahkan tenaga maksimal 340 PS yang digapai pada 5.000-6.500 rpm. Lalu besaran torsi maksimal 500 Nm pada rentang 1.600-4.500 rpm. Untuk melesat 0-100 km/jam cuma 4,3 detik. Dilihat dari segi teknis, GR Supra jauh lebih unggul lantaran volume mesin yang besar di banding Z4 sDrive30i. Andai BMW memboyong tipe sDrive40i, mungkin kekuatannya berimbang. </p> <p>Bicara soal tampilan, keduanya serupa tapi tak sama. Wajah Z4 semakin sporty dengan bentuk kidney grille baru, yang digabungkan pola honeycomb. Ini terinspirasi dari lintasan balap dengan struktur tiga dimensi. Ukuran tubuhnya berubah, lebih panjang 85 mm dari pendahulunya, 74 mm lebih lebar, 13 mm lebih tinggi. Dan punya jarak sumbu roda lebih pendek 26 mm. Rancangan ini menambah performa pengendalian yang lebih baik saat dikemudikan. </p> <p>Lalu GR Supra juga tampak memesona. Ia lebih aerodinamis dibandingkan generasi sebelumnya. Rancangan anyar diberikan guna mengurangi hambatan udara dan secara efektif juga menghasilkan downforce tinggi. Hingga meningkatkan handling dan stabilitas. Bumper depan dan belakang tampil dengan lekukan sporty. Bagian samping tampak lebih ramping, sehingga pelek 19 inci yang digunakan terlihat lebih menonjol. </p> <p>Ia juga punya desain double bubble, yang berfungsi untuk mengalirkan udara ke spoiler belakang untuk memberi gaya tekan. Spoiler belakang berbentuk duck-tail, terintegrasi dengan desain buritan. Kesan mobil legendaris tetap melekat kuat. Kalau semuanya diakumulasikan, keduanya punya daya tarik sendiri-sendiri. </p> <p>Namun bila Anda punya duit berlebih, GR Supra rasanya tetap menjadi pilihan utama. Sebab ia mobil legendaris yang punya nilai sendiri. Bisa sebagai barang koleksi atau bahkan investasi. Sementara BMW Z4 menjadi pilihan kedua. Meski pamornya mewah dan banderolnya lebih murah, tapi nilai historinya tak sekuat Supra. Z4 tetap layak dimiliki, sebagai mobil pajangan penghias garasi, tapi tetap punya potensi yang tak bisa diremehkan. (Alx/Odi) </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori2,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'supraVSz4.jpg',
            'judul' => $judulBerita5,
            'artikel' => $artikelBerita5,
        ]);

        $judulBerita6 = 'Drag-race: Audi RS6 vs BMW M5 Competition vs Mercedes-AMG E63 S';
        $artikelBerita6 = '<p> Jika Anda menginginkan salon atau perkebunan yang cepat, Anda melihat ke Jerman – sesederhana itu. Audi, BMW, dan Mercedes telah menguasai formula menjejalkan mesin besar dan kinerja yang lebih besar ke dalam mobil keluarga praktis, dan mereka telah melakukannya selama beberapa dekade. Memilih pemenang dari ketiganya tidak pernah mudah, dan itu berarti ada pertanyaan kuno — siapa yang harus saya tuju untuk mobil keluarga cepat saya? </p> <p> Nah, kami telah memilih satu dari masing-masing untuk drag race hari ini, mengadu Audi RS6 melawan BMW M5 Competition dan Mercedes-AMG E63 S. Memisahkan mereka di atas kertas bukanlah tugas yang mudah — mereka semua menggunakan V8 twin-turbocharged, semua memiliki all-wheel-drive dan semuanya berharga sekitar £ 100.000. </p> <p>Ada beberapa perbedaan, meskipun. Mesin 4.0 liter RS6 menghasilkan torsi 600hp dan 800Nm, unit 4.0 liter Mercedes menghasilkan 612hp dan 850Nm sedangkan M5 4.4-liter V8 memiliki 625hp dan 750Nm. </p> <p>Jadi AMG memiliki keunggulan tenaga, tetapi tidak demikian dengan bobotnya. Ini tip timbangan di 1.990kg, yang 50kg lebih dari BMW. Kelas berat dari kelompok itu adalah RS6 berbentuk kotak – beratnya 2.075kg, terima kasih (setidaknya sebagian) untuk menjadi satu-satunya perkebunan di sini… </p> <p>Namun, seperti menuangkan saus di atas bratwurst, ada sentuhan Inggris pada resep Jerman ini - cuacanya. Menyebutnya hujan deras akan sedikit tidak adil. Audi telah lama menjadi raja teknologi all-wheel-drive, jadi dapatkah sistem all-wheel-drive quattro RS6 yang terkenal mencengkeram mengatasi kelemahan tenaga dan bobot? </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori2,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'bmwVSmercyVSaudy.jpg',
            'judul' => $judulBerita6,
            'artikel' => $artikelBerita6,
        ]);

        $judulBerita7 = 'Listrik VS Bensin, TESLA MODEL S VS AVENTADOR S';
        $artikelBerita7 = '<p> Mobil yang sama sama ber penggerak 4 roda atau AWD ini memiliki tenaga yang bisa di bilang sangat buas karena di tesla sendiri mempunya kapasitas baterai 120kwh yang mampu melesatkan mobil ini dari 0-100kpj hanya dalam 2,5detik saja ini pun sama hal nya dengan lamborgini aventador. </p> <p>Sebelum kita mendapatkan hasil yang mengejutkan, marilah kita temui dua peserta drag race tersebut. Tesla sangat kuat di akselerasinya karena motorlistrik akan sangat cepat mendapatkan puncak torsi, dibandingkan dengan mesin bensin, </p> <p>Sedangkan lamborgini haya menggunakan mesin konvensional namun mesin ini dapat melesaikan mobil ini dalam waktu 2,6detik dan juga membawa ke top speed hingga 320kpj </p> <p>Pada saat dragrace awalan tesla sangat baik karena motor listriknya langsung mendapatkan torsi maksimal beda dengan lamborgini yang sedikit tertinggal namun lamborgini berhasil membalap tesla dengan sangat cepat karena mesin bensin masih unggul dalam top speed sehingga tesla bisa langsung di kalahkan dengan sangat mudah. </p> <p>Tesla dengan panjang lintasan 500m dapat menghasilkan waktu 10,7 detik 0,7 detik lebih lambat dari lamborgini aventador yaitu 10,6 dan keluar sebagai pemenang, perbedaan sepk mesin ini cukuplah jauh, yaitu tesla dengan motor listriknya dapat menghasilkan torsi 1000Nm sedangkan lamborgini hanya 690Nm. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori2,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'TeslavsLamborghini.jpg',
            'judul' => $judulBerita7,
            'artikel' => $artikelBerita7,
        ]);

        $judulBerita8 = 'Listrik VS Bensin, TESLA MODEL S VS AVENTADOR S';
        $artikelBerita8 = '<p> Mobil yang sama sama ber penggerak 4 roda atau AWD ini memiliki tenaga yang bisa di bilang sangat buas karena di tesla sendiri mempunya kapasitas baterai 120kwh yang mampu melesatkan mobil ini dari 0-100kpj hanya dalam 2,5detik saja ini pun sama hal nya dengan lamborgini aventador. </p> <p>Sebelum kita mendapatkan hasil yang mengejutkan, marilah kita temui dua peserta drag race tersebut. Tesla sangat kuat di akselerasinya karena motorlistrik akan sangat cepat mendapatkan puncak torsi, dibandingkan dengan mesin bensin, </p> <p>Sedangkan lamborgini haya menggunakan mesin konvensional namun mesin ini dapat melesaikan mobil ini dalam waktu 2,6detik dan juga membawa ke top speed hingga 320kpj </p> <p>Pada saat dragrace awalan tesla sangat baik karena motor listriknya langsung mendapatkan torsi maksimal beda dengan lamborgini yang sedikit tertinggal namun lamborgini berhasil membalap tesla dengan sangat cepat karena mesin bensin masih unggul dalam top speed sehingga tesla bisa langsung di kalahkan dengan sangat mudah. </p> <p>Tesla dengan panjang lintasan 500m dapat menghasilkan waktu 10,7 detik 0,7 detik lebih lambat dari lamborgini aventador yaitu 10,6 dan keluar sebagai pemenang, perbedaan sepk mesin ini cukuplah jauh, yaitu tesla dengan motor listriknya dapat menghasilkan torsi 1000Nm sedangkan lamborgini hanya 690Nm. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori2,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'TeslavsLamborghini.jpg',
            'judul' => $judulBerita8,
            'artikel' => $artikelBerita8,
        ]);

        $judulBerita9 = 'Mobil-mobil ini meski terlihat sangat berbeda, performanya hanya beda tipis. Mercedesbenz A45S vs BMW M2 CSL';
        $artikelBerita9 = '<p> Bisakah BMW Seri 2 termahal mengalahkan mobil hatchback panas buatan Mercedes-AMG? Untuk mengetahui jawabannya, keduanya harus diadu dalam lajur drag race. Untuk itulah, tim dari Car Magazine mewujudkan lomba drag race antara BMW M2 CS dan Mercedes-AMG A45 S. </p> <p>Sebelum kita mendapatkan hasil yang mengejutkan, marilah kita temui dua peserta drag race tersebut. BMW M2 CS mewakili BMW Seri 2 paling kuat yang pernah dibuat dan dibangun dengan stndar BMW M2 Competition yang sudah mengesankan. </p> <p>BMW M2 CS membedakan dirinya dari M2 biasa berkat penyertaan rem karbon-keramik, suspensi adaptif, atap serat karbon. Mesinnya langsung dari BMW M4 Competition. </p> <p>Dengan mesin BMW M4 Competition yang dipinjamkan ini, berarti BMW M2 CS bisa memompa 444 tenaga kuda (331 Kilowatt) dan torsi 406 lb-ft (550 newton-meter). Mesin yang mengesankan ini hadir standar dengan transmisi manual 6-percepatan pada BMW M2 CS, tetapi pemilik juga dapat memilih kopling ganda (dual-clutch) 7-percepatan. </p> <p>BMW hanya membangun dan memproduksi 2.200 unit BMW M2 CS. Jadi, jika Anda menginginkannya, lebih baik Anda bergerak cepat sebelum semuanya habis. Untuk menantang BMW M2 CS, kami memiliki mobil hatchback termutakhir yang pernah dibuat atas izin Mercedes-AMG A45 S. </p> <p>Mercedes-AMG A45 S memiliki fitur mesin 4 silinder paling bertenaga yang pernah ada dalam mobil produksi Mercedes, berkat mesin 2.0 liter inline-4. Mesin tersebut menghasilkan 415 tenaga kuda (310 kilowatt) dan torsi 369 lb-ft (500 newton-meter). </p> <p>Mesin bersuara parau ini dipadukan dengan transmisi kopling ganda 8 kecepatan yang mengirimkan tenaga ke tanah melalui sistem penggerak semua roda yang disetel oleh AMG. Lalu, siapakah yang menang dalam pertempuran mobil kecil berperforma tinggi asal Jerman ini, siapa yang menang? </p> <p>Jawabannya silakan saksikan video di atas. Ternyata mobil-mobil ini meski terlihat sangat berbeda, tetapi performanya hanya beda tipis. Sekadar catatan, ini juga bukan kali pertama Mercedes-Benz AMG diadu dengan BMW dalam drag race. Dalam pertarungan terakhirnya yang juga kami tulis beberapa waktu lalu, Mercedes-AMG GT R menang tipis atas BMW X3 M yang sudah modifikasi. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori2,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'mercyvsbmw.jpg',
            'judul' => $judulBerita9,
            'artikel' => $artikelBerita9,
        ]);

        $judulBerita10 = 'Lamborgini aventador s vs Mclaren 720s Spider';
        $artikelBerita10 = '<p> Lamborgini aventador s ini, mempunyai mesin 6.5L v12 dengan tenaga mencapai 700Hp dan Torsi 690 Nm sedangkan Mclaren 720s spider, mempunyai mesin 4.0L V8 dengan tenaga lebih besar sedikit di bandingkan yang di punyai Aventador yaitu 710Hp dan torsi 770Nm. </p> <p>Pada saat awal start aventador sangat di unggulkan karena memiliki sistem penggerak roda (AWD) sehingga pada saat awalan lambor gini mungkin bisa atau bisa memimpin jalannya balapan. </p> <p>Sedangkan 720s Spider ini hanya memiliki 2 penggerak roda yaitu (RWD) penggerak ini sangat tidak di unggulkan saat awal balapan karena traksi pada ban yang sangat dikit. namun karena hanya 2 roda tidak banyak tenaga yang terbuang sehingga pada saat pertengahan balapan mclaren bisa untuk mendahului Lamborgini aventador s. </p> <p>Benar saja, pada saat awal balapan Aventador langsung melesat jauh meninggalkan mclaren, karena mclaren kurang mendapat traksi pada ban belakangnnya, namun pada saat pertengahan lomba mclaren pun menyalib aventador. sehingga pemenangnya adalah Mclaren 720s Spider. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori2,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'lamborghini-aventador-vs-mclaren-720s.jpg',
            'judul' => $judulBerita10,
            'artikel' => $artikelBerita10,
        ]);

        $judulBerita11 = 'Avanza VS Ertiga, Manakah yang lebih unggul?';
        $artikelBerita11 = '<p> Kedua mobil ini merupakan kendaraan keluarga yang banyak di minati oleh keluarga indonesia karena kekuatannya kapasitarnya dan sparepart yang mudah, mobil ini masuk ke jenis segmen low mpv yang sangat murah di bandingkan dengan yang lainnya, mari kita mulai komparasinya </p> <p>Ke 2 mobil ini sama sama memberikan opsi cc mesin yang berbeda, namun disini kita akan membahas tipe paling tingginya saja yaitu 1,5L i4 di tenaga mesin avanza unggul 1ps lebih di bandingkan suzuki ertiga, namun kalah di torsi ertiga yang sedikit rada besar 3nm dibandingkan avanza </p> <p>saat masuk ke dalam interior jelas suzuki ertiga sangat berbeda dengan avanza yang sudah terlalu terlihat kuno banyak sekali teknologi canggih yang di taruh di dalam ertiga. </p> <p>Dalam segi akomodasi sama sama berisikan 7penumpang namun ertiga di unggulkan kembali karena kapasitasnya yang sedikit lebih luas di banding avanza yang bisa di bilang sedikit lebih sempit </p> <p>Lalu bagaimana dengan harga? jelas avanza lebih murah sekitar 6juta dan leboh mendapatkan layanan servis yang lebih baik di bandingkan suzuki. /p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori3,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'avanza-ertiga.jpg',
            'judul' => $judulBerita11,
            'artikel' => $artikelBerita11,
        ]);

        $judulBerita12 = 'Nismo, Divisi Khusus Motorsport Nissan';
        $artikelBerita12 = '<p> Sebelumnya, Hiroshi Tamura, Chief Product Specialist (CPS) Nismo menjelaskan soal sejarah merek yang jadi spesialis soal urusan motorsport Nissan. Nismo berdiri sejak 1984 dan dari awal Tamura sudah bergabung. Sejak saat itu, segala urusan di dunia balap Nissan langsung gemilang. </p> <p>“Saat umur 10 tahun, di sirkuit Fuji ini juga, saya lihat Nissan menang balap. Sejak saat itu juga dalam hati saya selalu berkata kalau saya harus kerja di Nissan,” kenang pemilik Nissan Skyline R32 GT-R ini. </p> <p>Era keemasan Nismo bermula sejak 1986, 1990 hingga 1993 menang di JTC (Japan Touring Car) Champion Group A. Lalu JSPC (Japan Sports Prototype Championship) Group C pada 1990 dan 1992. </p> <p>Juga segudang piala dari ajang GT Race Champion, kelas JGTC di tahun 1994, 1995, 1998, 1999, 2001 dan 2003 dan kelas Super GT di tahun 2004, 2005, 2008, 2011, 2012 dan 2014. Tak hanya di balap Jepang saja, Nismo juga berhasil memenangi FIA GT1 World Champion pada 2011, Super GT Champion pada 2011, 2012 dan 2014. Juga mesin andalannya seri VK45DE yang berhasil mengikuti kejuaran balap ketahanan Le Mans pada 2013 hingga 2015. Bahkan di kelas LMP2 yang diikuti 19 starter, 13 di antaranya memakai mesin generasi ini. </p> <p>Sukses di dunia balap, Nismo pun merambah mobil produksi massal Nissan. Bermula sejak 2012 lalu hanya untuk pasar Eropa dan Jepang bermodalkan Nissan Juke, kini Nismo punya line up jauh lebih lengkap, mulai dari Fairlady 370Z, GT-R, Juke hingga Elgrand. “Kita ada penggemar highlife seeker yang tipikalnya senang dengan tampilan,” sambung pria yang merancang mobil LIMOUSEine pada 1993 untuk perayaan 10 tahun Tokyo Disney Land. /p> <p>Makanya ada paket eksterior untuk Nissan Elgrand Nismo performance package, Almera Nismo, bahkan untuk mobil listriknya Leaf. Sampai sekarang, Tamura-san sudah membuat NissanConnect Nismo Plus, yakni aplikasi untuk pemilik kendaraan Nismo yang bisa melihat display meter, lap timer sampai data logger. Juga menjual parts kompetisi khusus seperti camshaft, crank case, rem hingga suspensi dan kopling. /p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori4,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'nismo.jpg',
            'judul' => $judulBerita12,
            'artikel' => $artikelBerita12,
        ]);

        $judulBerita13 = '2JZ GTE Mesin Legendaris';
        $artikelBerita13 = '<p> Satu lagi mesin hebat dari Toyota adalah keluarga 2JZ. Terutama 2JZ-GTE yang telah dilengkapi dengan turbocharger. 2JZ-GTE adalah mesin enam silinder segaris yang dibekali dengan turbocharger. Salah satu penggunannya adalah Toyota Supra. Nama terakhir itu seharusnya cukup untuk memastikan bahwa ini mesin hebat. Ingat, mobil tidak akan menyandang status ‘Hebat’ kalau mesinnya biasa saja. </p> <p>2JZ-GTE berbasis salah satu mesin yang juga harus disebut hebat, 2JZ-GE. Bedanya, basis mesin yang tadinya bertenaga 230 PS, terdongkrak secara signifikan menjadi 280 PS berkat penggunaan turbocharger ganda, yang bekerja secara sequential (berurutan). Bahkan untk pasar dii luar Jepang, mesin ini menghasilkan 325 PS. </p> <p>Sistem twin turbo ini dibuat oleh Toyota dan Hitachi. Teknologi VVT-i yang ada pada varian GE juga terdapat pada GTE, namun penggunaan turbocharger mengharuskan terjadinya penurunan kompresi. Biar begitu, Supra yang menggunakan mesin ini mampu berakselerasi 0-100 kpj dalam tempo 4,6 detik. </p> <p>Blog mesin ini pun sangat kuat sehingga banyak para pemodifikasi mesin ini menaikan tenagannya hingga 1000hp karena mesin yang kuat dan melimpahnnya sparepart di pasaran yang memudahkan dalam memodifikasi </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori4,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . '2jz.jpeg',
            'judul' => $judulBerita13,
            'artikel' => $artikelBerita13,
        ]);

        $judulBerita14 = 'TRD SPORTIVO PART MODIFIKASI UNTUK TOYOTA';
        $artikelBerita14 = '<p> TRD Sportivo merupakan produk spare parts sporty yang sengaja dibuat untuk mendukung mobil komersil mendapatkan sentuhan gaya sporty. Produk ini dikembangkan oleh Toyota Motor Corporation. </p> <p>Jika Anda memperhatikan tulisan TRD pada mobil Toyota dengan seksama, ada 3 produk utama yang ditawarkan oleh TRD produk ini, apa saja? </p> <p><strong>1. TRD Product</strong> TRD product merupakan produk spare parts yang sengaja dikembangkan untuk keperluan mobil balap. Bagi mobil yang digunakan untuk racing, tentu membutuhkan aerodinamika dan kecepatan maksimum dalam melajukan kendaraannya. TRD product ini merupakan spare parts asli dari Jepang langsung memang dikhususkan untuk keperluan balapan, tidak untuk mobil-mobil komersial. </p> <p><strong>2. TRD S</strong> Nah, arti TRD di mobil Toyota yang satu ini pastinya sudah sering lihat kan? TRD S dikhususkan untuk bodi saja, baik itu interior dan eksterior. TRD S sudah digunakan pada mobil komersial milik Toyota dan mobil yang memakai tanda ini, pasti menggunakan fitur eksterior/interior dari TRD S. </p> <p<strong>3. TRD Sportivo</strong> Untuk arti TRD pada mobil Toyota yang satu ini mungkin tulisan yang paling sering kita lihat di mobil-mobil komersil. TRD Sportivo merupakan produk spare parts sporty yang sengaja dibuat untuk mendukung mobil komersil mendapatkan sentuhan gaya sporty. Produk ini dikembangkan oleh Toyota Motor Corporation.</p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori4,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'TRD.jpg',
            'judul' => $judulBerita14,
            'artikel' => $artikelBerita14,
        ]);

        $judulBerita15 = 'Produksi Porsche 991 Resmi Berakhir, Kini Digantikan 992';
        $artikelBerita15 = '<p> Produksi Porsche 911 generasi ketujuh resmi berakhir (20/12). 911 Speedster convertible berwarna silver menjadi model yang terakhir diproduksi. Lahir dari pabrik Stuttgart dan menuntaskan 233.540 unit seri 991 sepanjang masa produksi sejak 2011. Tongkat estafet kelegendarisan 911 dilanjutkan seri 992, sudah mendebut akhir tahun lalu di Los Angeles.</p> <p> Kisah 911 generasi 991 dimulai 2011 silam, tepatnya saat Frankfurt Motor Show berlangsung. Sebagai pewaris seri 997, 991 mendapat ubahan paling drastis dalam sejarah 911. Membawa peranti elektronik lebih banyak, seperti power steering elektrik dan juga mengenalkan Porsche Dynamic Chassis Control. Ia pun menjadi awal penggunaan transmisi manual 7-speed. Dan selalu dikenang sebagai 911 yang masih ditenagai mesin Naturally Aspirated (NA), sebelum turbo merajalela pada pertengahan siklusnya.</p> <p>Ya, di generasi ini para fanboy harus mengucapkan selamat tinggal pada mesin boxer 6-silinder NA. Momen ini terjadi saat fase kedua hidup pada 2016, atau dikenal juga seri 991.2. Nostalgia naturalnya flat-6 yang bertahan selama 7 generasi harus berakhir. Induksi paksa turbin dalam rumah keong, tak lagi eksklusif untuk Porsche 911 Turbo saja. Mesin basic flat-6 3,4-liter (Carrera) dan 3,8-liter (Carrera S) dilungsurkan berganti flat-6 3,0-liter turbo untuk menopang Carrera hingga GTS. </p> <p>911 Turbo Kecuali 911 Turbo yang tetap memuaskan pakai 3,8-liter turbo dan model terakhir Speedster convertible ini. Porsche 911 Speedster, terbilang istimewa bagi Anda yang menginginkan 911 atap terbuka. Tidak terimbas serbuan turbo, masih setia dengan NA bahkan disuplai mesin 4,0-liter milik GT3. Output-nya tak main-main. Tenaga 510 PS dan torsi 470 Nm melebihi GT3 standar. Hanya kalah 10 PS dari kasta teratas GT3 RS. Lebih menarik lagi, disediakan dalam pilihan manual 6-speed saja. Persis GT3. Akselerasi 0-100 km/jam secepat 4 detik dan kecepatan puncak 310 km/jam. Sungguh istimewa jika dibandingkan 911 Cabriolet. </p> <p>Seri 991 memang diisi beragam model dan varian. Paling banyak menelurkan edisi spesial dibanding generasi terdahulu. Mulai dari 50th Anniversary Edition, 911 R, 911 T, 911 GT3 Touring Package hingga 911 Turbo S Exclusive Series. Model paling menarik, apalagi kalau bukan edisi khusus perayaan produksi 1 juta unit. Satu mobil dicat warna istimewa Irish Green dengan balutan kulit coklat di interior, bukan untuk dijual melainkan dipajang di museum Porsche. </p> <p>Kini, fanboy 911 menyongsong generasi delapan 992. Dikenalkan tahun lalu dalam empat varian dasar: Carrera, Carrera S, Carrera 4 dan Carrera 4S. Model regenerasi, tapi wujudnya tidak terlalu memperlihatkan. Sangat mirip dengan 991, bahkan masih pantas disebut facelift. Porsche memang tidak berniat melakukan ubahan radikal. Coba perhatikan sejak 997 sampai sekarang. Benang merahnya amatlah jelas. Mereka mati-matian mempertahankan desain dasar 901 original yang berasal dari VW Beetle. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori5,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'porshe.jpg',
            'judul' => $judulBerita15,
            'artikel' => $artikelBerita15,
        ]);

        $judulBerita16 = 'Lexus RC F 2020 Kini Terlihat Lebih Sporty Namun Elegan';
        $artikelBerita16 = '<p> Setelah memperkenalkan RC facelift di Paris Motor Show musim gugur yang lalu, Lexus sekarang merilis versi RC F untuk North American International Auto Show 2019. Memulai debutnya hari ini di Detroit, sports coupe yang diperbarui mendapat sentuhan visual yang keren. Yang paling jelas terlihat di bagian depan di mana lampu LED yang didesain ulang sekarang menggabungkan lampu DRL untuk memungkinkan tampilan yang jauh lebih bersih.</p> <p> Desainer Lexus juga menghabiskan waktu menyegarkan kisi-kisi spindel besar dengan menambahkan bibir bawah yang membentang di seluruh muka, yang mereka katakan ditambahkan untuk mencoba dan membuat fasia depan terlihat sedikit lebih kecil. Di bagian belakang, lampu belakang LED yang lebih lebar mencerminkan model RC lainnya dan membuat performa coupe terlihat lebih bengis.</p> <p>Di luar perbaikan kosmetik yang telah dilakukan Lexus RC F, mesin sporty ini juga memperoleh tenaga yang lebih baik dari V8 5.0 liter. Sebagai salah satu dari beberapa mobil performa yang tersisa di pasaran, RC sekarang mengemas 5 tenaga kuda tambahan dan torsi 8 Newton-meter untuk total tenaga 472 hp dan torsi 535 Nm. . </p> <p>Tenaga tersebut disalurkan ke roda belakang melalui transmisi otomatis 8 kecepatan yang sama, tetapi para insinyur telah menerapkan rasio final drive yang lebih tinggi untuk meningkatkan responsifitas. Sebagai standar, Lexus RC F menawarkan kontrol peluncuran elektronik untuk performa akselerasi maksimum dari 0 hingga 96 kilometer per jam hanya membutuhkan waktu 4,2 detik atau 2/10 detik kurang dari sebelumnya. </p> <p>Lexus dan Michelin bekerja sama untuk mengembangkan satu set ban Pilot Sport 4S khusus untuk mengurangi understeer serta meningkatkan cengkraman lateral dan daya tahan saat mobil didorong dengan keras. Hal ini menjadi lebih baik karena penurunan bobot mobil dicapai dengan memasang braket kontrol velg aluminium dan braket penopang suspensi atas, sedangkan setengah lubang poros di bagian belakang menggantikan poros padat. </p> <p>Setelah peluncuran perdana di Detroit, Lexus RC F 2020 akan mulai diproduksi pada kuartal kedua tahun ini, dengan harga yang diumumkan lebih dekat dengan peluncuran pasarnya. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori5,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'lexuxrcf.jpg',
            'judul' => $judulBerita16,
            'artikel' => $artikelBerita16,
        ]);

        $judulBerita17 = 'Toyota Supra is back';
        $artikelBerita17 = '<p> Otomotif balap pasti mempunyai penggemarnya. Bukan hanya untuk kalangan berduit, tetapi juga kalangan menengah ke bawah. Melihat peluang itu banyak produsen otomotif yang mengeluarkan mobil sport dengan spesifikasi yang berasa mobil balap. Kondisi ini untuk memberikan pengalaman berbeda kepada setiap pengendara yang menginginkan menaiki mobil balap yang sebenarnya.</p> <p> Sudah banyak pabrikan yang meluncurkan mobil sport dengan spesifikasi mobil balap. Bukan hanya performa mesin yang gila-gilaan, tetapi juga desain serta fitur penunjang lainnya. Salah satu produsen mobil yang mengeluarkan mobil sport tersebut adalah Toyota. Kabarnya produk mereka yang telah berhenti produksi akan diproduksi lagi. </p> <p>Mobil legendaris dari Toyota kabarnya akan meluncur kembali ke dunia otomotif setelah vakum cukup lama, mobil tersebut adalah Toyota Supra. Mobil ini kembali hadir bukan hanya meramaikan meja produksi Toyota, tetapi juga akan bertarung di ajang balap. </p> <p>Sementara milik Toyota GR Supra lebih besar. Engineer tetap mempertahankan konfigurasi legendaris Supra, dengan mesin 3,0 liter turbo enam silinder segaris. Ia dilengkapi transmisi 8-speed sport automatic. Mesin mampu membuncahkan tenaga maksimal 340 PS yang digapai pada 5.000-6.500 rpm. Lalu besaran torsi maksimal 500 Nm pada rentang 1.600-4.500 rpm. Untuk melesat 0-100 km/jam cuma 4,3 detik. Dilihat dari segi teknis, GR Supra jauh lebih unggul lantaran volume mesin yang besar di banding Z4 sDrive30i. Andai BMW memboyong tipe sDrive40i, mungkin kekuatannya berimbang. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori5,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'toyotasupra.jpg',
            'judul' => $judulBerita17,
            'artikel' => $artikelBerita17,
        ]);

        $judulBerita18 = 'Nissan GT-R Nismo 2020 Harganya Makin Kenceng. Apakah Berbanding Lurus Dengan Performanya?';
        $artikelBerita18 = '<p> Mobil dua pintu yang terkenal gahar ini, sekarang sudah bisa dipesan di Australia. Namun dengan embel-embel adanya upgrade di sana-sini membuat banderol semakin tinggi. </p> <p> Sebelumnya untuk versi Nissan GT-R Nismo 2017 di Australia dipatok dengan harga 299.000 dolar Australia atau sekitar Rp 2,86 miliar (kurs 1 dolar Australia = Rp 9.578) </p> <p>Untuk versi 2020 mengalami peningkatan sebesar 26 persen dibanding versi sebelumnya. Nissan GT-R Nismo 2020 membawa price tag 378.000 dolar Australia yang jika dirupiahkan menjadi Rp 3,6 miliar. Kenaikan harga hingga sebegitu besarnya, tentu seharusnya ubahan yang ada pada si monster ini tak main-main sob. Lalu, apakah tingginya kenaikan harga tersebut sejalan dengan perubahan pada performanya? </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori5,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'nissangtrnismo.jpg',
            'judul' => $judulBerita18,
            'artikel' => $artikelBerita18,
        ]);

        $judulBerita19 = 'Toyota Mark X GRMN 2019: Mesin V6 N/A, Transmisi Manual dan RWD';
        $artikelBerita19 = '<p> Lewat divisi motorsport Gazoo Racing, beberapa mobil baru Toyota dipamerkan di Tokyo Auto Salon 2019. Salah satunya, konsep GR Supra Super GT, yang tak lain versi balap dari Toyota Supra. Satu lagi tak kalah mengundang perhatian publik. Toyota Mark X GRMN. Model terbaru yang mengisi kevakuman lini Mark X empat tahun belakangan, tampak sangar setelah dimodifikasi Gazoo Racing. </p> <p>New Mark X GRMN didaulat melanjutkan kesuksesan pendahulunya, yang hanya dibuat 100 unit. Namun basis dipakai tidak sepenuhnya generasi baru. Masih memakai Mark X 350 RDS, dituning oleh GRMN agar makin agresif. Tampilannya memang masih seperti model yang dipasarkan sejak 2013. Tapi tetap keren dan impresif. </p> <p>Gazoo Racing melakukan ubahan sporty pada bumper depan dan belakang. Grille menjadi minimalis, ditimpali intake ekstrabesar yang menyatu dengan rumah fog lamp. Tidak ada logo Toyota atau Mark X di area fasad. Cukup emblem GRMN di grille, untuk membuktikan eksklusifitas. Emblem sama juga terdapat di sisi spakbor. </p> <p>Bumper belakang dirancang lebih dramatis. Satu bagian masif berwarna hitam, berisikan diffuser, reflektor dan sepasang pipa knalpot ganda. Ventilasi besar di balik roda, berguna melancarkan aliran udara. Lampu dibiarkan sama seperti model sebelumnya, dipermanis duck tail sederhana. Secara keseluruhan, tak banyak ubahan dengan Mark X Gs 2013 lalu. Kecuali pelek BBS 19-inci dengan aksen black glossy yang begitu menggugah. </p> <p>Konsumen juga bisa memesan opsi atap CRFP (carbon fiber reinforced plastic) seharga 270.000 yen (Rp 35 juta). Diklaim mampu mengurangi bobot hingga 10 kg, menurunkan titik pusat gravitasi dan tercipta pengendalian lebih gesit. </p> <p>Gazoo Racing turut mengubah interior agar semakin terasa sporty. Termasuk jok sport bucket berbalut material suede yang lebih mendekap tubuh, pedal alloy dan beberapa panel serat karbon. Desain baru setir mirip kepunyaan GT 86, dilapisi kulit dan bertengger logo GR di bagian bawah. </p> <p>Tapi bagian yang menjadi magnet mobil ini, berasal dari sektor drivetrain. GR mempertahankan jantung mekanis naturally aspirated V6 3,5-liter di balik kap mesin dengan besaran tenaga 318 PS (313 hp) dan torsi maksimum 380 Nm. Paling spesial, transmisi manual 6-speed yang mengirim seluruh daya menuju roda belakang (RWD). Bahkan mempertahankan rem tangan konservatif. Terdengar sangat memenuhi hasrat para pengemudi antusias. Dapat dipastikan, mudah diajak drifting. </p> <p>Klaim pihak pabrikan, suspensi disetel ulang dan mengganti shock absorber. Sistem electric power steering juga dimodifikasi supaya tercipta feedback yang lebih responsif. Menyandang emblem GRMN, membuat Mark X dibatasi produksi 350 unit saja. Angka ini lebih banyak dari versi sebelumnya yang dibuat 100 unit. Sayang, hanya pasar Jepang yang mampu menikmati sedan nikmat ini. Harganya 5,13 juta yen atau setara Rp 665 juta. </p>';
        Berita::create([
            'user_id' => 2,
            'kategori_id' => $kategori5,
            'badge_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'gambar' => $img . 'markxgr.jpg',
            'judul' => $judulBerita19,
            'artikel' => $artikelBerita19,
        ]);
    }
}
