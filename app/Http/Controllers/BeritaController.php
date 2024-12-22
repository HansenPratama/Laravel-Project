<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function show($id)
    {
        // Data berita yang lebih lengkap dengan judul, kategori, tanggal, gambar, dan konten
        $berita = [
            1 => [
                'title' => 'Class Meeting dalam Rangka Milad Prodi Manajemen Informatika',
                'category' => 'ClassMeeting',
                'date' => '29 Agustus 2024',
                'image' => 'berita1.jpg',
                'content' => [
                    'Kediri, 29 Agustus 2024 – Dalam rangka memperingati hari ulang tahun Program Studi Manajemen Informatika, Kampus 2 PSDKU POLINEMA Kediri menggelar kegiatan ClassMeeting yang berlangsung meriah. Acara ini menjadi ajang penuh semangat bagi mahasiswa untuk saling berkompetisi secara sehat sekaligus mempererat hubungan antar sesama.',
                    'Berbagai perlombaan menarik, seperti futsal daster, estafet, dan Mobile Legends, diadakan untuk memacu kreativitas, keterampilan, serta kerja sama tim. Tidak hanya menjadi hiburan, kegiatan ini juga menjadi refleksi perjalanan Prodi Manajemen Informatika yang terus memberikan kontribusi besar bagi pendidikan teknologi dan informatika.',
                    'Ketua Program Studi Manajemen Informatika, dalam sambutannya, menyampaikan rasa syukur atas pencapaian yang diraih selama ini. Ia juga mengungkapkan harapan agar program studi ini dapat terus berkembang dan berinovasi di masa depan.',
                    '"Pencapaian ini merupakan hasil kerja keras seluruh civitas akademika. Semoga kegiatan seperti ini dapat memperkuat solidaritas kita dan terus mencetak generasi muda yang kompeten di era digital," ujarnya.',
                    'Puncak acara ditutup dengan sesi penghargaan kepada para pemenang lomba, yang disambut dengan antusiasme tinggi oleh seluruh peserta. Senyuman dan semangat yang terpancar sepanjang acara menjadi bukti keberhasilan kegiatan ini dalam menciptakan momen kebersamaan.',
                    'Melalui kegiatan ClassMeeting, diharapkan Program Studi Manajemen Informatika semakin solid, inovatif, dan mampu menghadapi tantangan di masa mendatang.',
                    'Selamat ulang tahun, Prodi Manajemen Informatika!'
                ]
            ],
            2 => [
                'title' => 'Senam Pagi Bersama Mahasiswa dan Dosen Prodi Manajemen Informatika',
                'category' => 'SenamPagi',
                'date' => '15 September 2024',
                'image' => 'berita2.jpg',
                'content' => [
                    'Kediri, 15 September 2024 – Kegiatan senam pagi yang diadakan oleh Program Studi Manajemen Informatika ini berlangsung dengan penuh semangat dan kekompakan, yang melibatkan mahasiswa dan dosen. Acara yang digelar secara rutin ini bertujuan tidak hanya untuk menjaga kebugaran tubuh, tetapi juga untuk mempererat ikatan persaudaraan antara seluruh civitas akademika, baik mahasiswa maupun tenaga pengajar.',
                    'Kegiatan ini diharapkan dapat menjadi wadah bagi seluruh peserta untuk lebih peduli terhadap kesehatan fisik mereka, sambil membangun semangat kebersamaan yang dapat menciptakan atmosfer yang lebih positif di lingkungan kampus. Acara senam pagi ini diikuti oleh puluhan peserta yang hadir dengan penuh antusiasme, bersemangat mengikuti berbagai gerakan senam yang dipandu oleh instruktur secara bersama-sama.',
                    'Meskipun acara ini sederhana, namun memberikan dampak yang signifikan dalam meningkatkan hubungan antara mahasiswa dan dosen. Kegiatan ini menjadi momen yang sangat berharga untuk mempererat kedekatan dan saling memahami antara kedua pihak, menciptakan suasana yang lebih akrab dan penuh kebersamaan.',
                    'Melalui kegiatan senam pagi yang diadakan secara rutin ini, diharapkan dapat tercipta atmosfer yang lebih sehat dan harmonis di lingkungan akademik. Dengan meningkatnya kebugaran fisik, diharapkan pula dapat meningkatkan produktivitas dan semangat belajar serta bekerja, baik di kalangan mahasiswa maupun dosen.',
                    'Selain itu, kegiatan ini juga berfungsi sebagai sarana untuk mempererat hubungan antar anggota civitas akademika, sehingga tercipta suasana yang lebih suportif dan kondusif dalam proses pembelajaran di kampus.'
                ]
            ],
            3 => [
                'title' => 'Mahasiswa Prodi Manajemen Informatika Raih Juara 2 Lomba Fotografi',
                'category' => 'Juara Lomba Fotografi',
                'date' => '3 November 2024',
                'image' => 'berita3.jpg',
                'content' => [
                    'Kediri, 3 November 2024 – Salah satu mahasiswa Prodi Manajemen Informatika yaitu Faras Hakim Bagaskara dari Kelas MI-3E kembali menorehkan prestasi gemilang dengan berhasil meraih juara 2 dalam lomba fotografi yang diadakan pada acara bergengsi Pekan Prestasi Mahasiswa 2024. Karya fotografi yang dihasilkan tidak hanya berhasil memukau para juri, tetapi juga mampu menyampaikan pesan visual yang mendalam dengan balutan kreativitas yang luar biasa. Setiap detail dalam karya tersebut menunjukkan kemampuan teknis yang matang dan kepekaan artistik yang tinggi.',
                    'Prestasi ini tidak hanya menjadi kebanggaan bagi Prodi Manajemen Informatika, tetapi juga membawa nama baik Polinema PSDKU Kediri di kancah kompetisi mahasiswa. Keberhasilan ini sekaligus menjadi bukti bahwa mahasiswa dari Prodi Manajemen Informatika memiliki potensi luar biasa, tidak hanya dalam bidang akademik tetapi juga di bidang seni dan kreativitas.',
                    'Dengan pencapaian ini, diharapkan dapat menjadi sumber inspirasi dan motivasi bagi mahasiswa lainnya untuk terus mengeksplorasi bakat, mengasah kemampuan, serta berani mengambil tantangan di berbagai bidang kompetisi. Kemenangan ini juga menunjukkan pentingnya semangat kerja keras, dedikasi, dan kemauan untuk terus belajar demi meraih hasil terbaik.',
                    'Selamat atas pencapaian yang luar biasa ini! Semoga keberhasilan ini menjadi langkah awal dari banyak prestasi gemilang lainnya yang akan diraih di masa mendatang.',
                    'Prodi Manajemen Informatika bangga atas kontribusi dan dedikasi yang telah diberikan.'
                ]
            ],
            4 => [
                'title' => 'Mahasiswa Prodi Manajemen Informatika Gelar Futsal Rutin Seminggu Sekali',
                'category' => 'FITMI',
                'date' => '12 November 2024',
                'image' => 'berita4.jpg',
                'content' => [
                    'Kediri, 12 November 2024 – Mahasiswa Prodi Manajemen Informatika secara rutin mengadakan kegiatan futsal bersama setiap minggu. Kegiatan ini menjadi agenda olahraga yang bertujuan untuk menjaga kebugaran tubuh sekaligus mempererat hubungan antar mahasiswa lintas angkatan. Melalui kegiatan ini, mahasiswa dapat menyegarkan pikiran setelah menjalani rutinitas akademik yang padat, sekaligus membangun komunikasi dan relasi yang lebih erat di antara sesama mahasiswa.',
                    'Dengan semangat sportifitas, pertandingan futsal berlangsung seru dan penuh antusiasme. Setiap pertandingan diwarnai dengan semangat kompetisi yang sehat, dimana mahasiswa saling mendukung dan mengapresiasi permainan satu sama lain. Tidak hanya itu, futsal rutin ini juga menjadi ajang untuk mengasah kemampuan teknis olahraga dan strategi permainan, yang secara tidak langsung dapat meningkatkan keterampilan mahasiswa dalam bekerja sama dan memecahkan masalah di situasi nyata.',
                    'Kegiatan ini tidak hanya menjadi sarana rekreasi, tetapi juga mendorong kerja sama tim dan rasa kebersamaan di lingkungan prodi. Banyak mahasiswa merasa bahwa melalui futsal rutin ini, mereka lebih mengenal teman-teman lintas angkatan dan dapat bertukar pengalaman mengenai dunia perkuliahan, organisasi, hingga kehidupan sehari-hari. Momen kebersamaan seperti ini juga turut menciptakan suasana prodi yang harmonis dan kondusif.',
                    'Rutinitas ini diharapkan dapat terus meningkatkan semangat mahasiswa untuk menjalani aktivitas akademik dengan tubuh yang sehat dan jiwa yang solid.',
                    'Prodi Manajemen Informatika terus mendukung kegiatan-kegiatan positif seperti ini sebagai bentuk komitmen untuk menciptakan lingkungan belajar yang seimbang antara akademik dan non-akademik.',
                    'Semoga kegiatan futsal ini dapat terus berjalan dengan konsisten, menjadi wadah inspirasi, dan memberikan dampak positif bagi seluruh mahasiswa Prodi Manajemen Informatika.'
                ]
            ],
            5 => [
                'title' => 'Pemilihan Ketua HIMA Prodi MANAJEMEN INFORMATIKA',
                'category' => 'Pemilihan Ketua Himpunan',
                'date' => '23 Juni 2024',
                'image' => 'berita5.jpg',
                'content' => [
                    'Kediri, 23 Juni 2024 – Mahasiswa Prodi Manajemen Informatika baru saja melaksanakan agenda penting, yaitu pemilihan Ketua Himpunan Mahasiswa Prodi (HIMA) untuk periode 2024/2025. Pemilihan ini menjadi momen yang sangat dinantikan karena Ketua HIMA memiliki peran strategis dalam membawa visi dan misi yang mampu meningkatkan kualitas dan keberlanjutan kegiatan kemahasiswaan.',
                    'Proses pemilihan ini diikuti oleh tiga calon ketua yang telah melalui seleksi internal berdasarkan kriteria tertentu, seperti kemampuan kepemimpinan, rekam jejak dalam organisasi, serta visi-misi yang diusung. Ketiga calon ini mempresentasikan gagasan mereka dalam sebuah sesi penyampaian visi-misi yang berlangsung secara terbuka di hadapan mahasiswa prodi. Dalam sesi tersebut, setiap calon memberikan penjelasan rinci tentang program kerja yang akan mereka jalankan, mulai dari penguatan organisasi, pengembangan mahasiswa, hingga peningkatan kontribusi prodi di tingkat kampus.',
                    'Seluruh mahasiswa Prodi Manajemen Informatika berpartisipasi aktif dalam kegiatan ini. Mereka tidak hanya hadir sebagai pemilih, tetapi juga menunjukkan antusiasme melalui berbagai diskusi dan tanya jawab langsung dengan para calon. Proses ini mencerminkan semangat demokrasi yang tinggi di kalangan mahasiswa, di mana setiap suara memiliki peran penting dalam menentukan arah kepemimpinan HIMA.',
                    'Proses pemungutan suara dilakukan secara transparan dan tertib. Panitia memastikan bahwa seluruh tahapan, mulai dari pendaftaran pemilih, pemberian suara, hingga penghitungan, berjalan sesuai prosedur yang telah ditetapkan. Selain itu, suasana pemilihan yang penuh semangat juga menunjukkan kepedulian mahasiswa terhadap masa depan organisasi mereka.',
                    'Setelah pemungutan suara selesai, hasil pemilihan akan diumumkan secara resmi oleh panitia. Ketua HIMA terpilih diharapkan mampu membawa perubahan positif yang signifikan dalam lingkungan prodi. Tidak hanya itu, Ketua HIMA baru juga diharapkan dapat memperkuat peran himpunan sebagai wadah yang mendukung pengembangan akademik, keterampilan, dan minat mahasiswa, baik di tingkat prodi maupun kampus.',
                    'Melalui proses pemilihan ini, Prodi Manajemen Informatika menunjukkan komitmennya untuk terus mendorong mahasiswa agar aktif dalam kegiatan organisasi, meningkatkan solidaritas, serta membangun budaya demokrasi yang sehat.',
                    'Semoga ketua terpilih dapat mengemban amanah dengan baik, menjadi inspirasi bagi seluruh mahasiswa, dan membawa Prodi Manajemen Informatika menuju prestasi yang lebih gemilang.'
                ]
            ],
            6 => [
                'title' => 'Himpunan Mahasiswa Manajemen Informatika Bagikan Takjil untuk Masyarakat',
                'category' => 'Himatika Berbagi Takjil',
                'date' => '28 Maret 2024',
                'image' => 'berita6.jpg',
                'content' => [
                    'Kediri, 28 Maret 2024 – Himpunan Mahasiswa Manajemen Informatika (HIMATIKA) kembali menggelar kegiatan berbagi takjil sebagai bagian dari rangkaian kegiatan sosial yang dilaksanakan dalam menyambut bulan suci Ramadan. Kegiatan berbagi takjil ini bertujuan untuk memberikan manfaat langsung kepada masyarakat, terutama mereka yang sedang menjalani perjalanan di sore hari menjelang waktu berbuka puasa.',
                    'Kegiatan ini dilakukan dengan penuh semangat dan antusiasme oleh para mahasiswa Prodi Manajemen Informatika yang tergabung dalam HIMATIKA. Sebanyak ratusan paket takjil dibagikan kepada masyarakat sekitar, termasuk para pengguna jalan, pedagang kaki lima, hingga warga yang melintas di sekitar kampus. Setiap paket takjil berisi makanan ringan dan minuman yang dapat membantu menyegarkan tubuh menjelang waktu berbuka puasa.',
                    'Aksi sosial ini tidak hanya menjadi bentuk kepedulian terhadap sesama, tetapi juga sebagai wadah bagi mahasiswa untuk menerapkan nilai-nilai sosial dan kebersamaan di bulan penuh berkah. Melalui kegiatan berbagi ini, HIMATIKA berusaha mempererat hubungan antara mahasiswa dengan masyarakat sekitar kampus, serta menciptakan suasana kekeluargaan yang lebih erat antara civitas akademika dan komunitas lokal.',
                    'Kegiatan berbagi takjil ini juga memberikan kesempatan bagi mahasiswa untuk mengembangkan rasa empati dan kepedulian sosial, serta memupuk rasa solidaritas antar sesama. Selain itu, kegiatan ini memberikan dampak positif bagi mahasiswa dalam membangun karakter yang peduli terhadap lingkungan sekitar, serta mengajarkan pentingnya berbagi sebagai bagian dari kehidupan sosial yang seimbang.',
                    'Melalui kegiatan ini, HIMATIKA berharap dapat menyebarkan semangat kebaikan dan keberkahan selama bulan Ramadan. Selain itu, mereka berharap dapat semakin memperkuat nilai-nilai sosial di kalangan mahasiswa, serta mendorong generasi muda untuk lebih peduli terhadap kondisi sosial di sekitar mereka. Kegiatan ini juga menjadi contoh nyata bahwa mahasiswa dapat memberikan kontribusi positif bagi masyarakat, tidak hanya dalam bidang akademik, tetapi juga melalui aksi-aksi sosial yang bermanfaat bagi banyak orang.',
                    'Semoga melalui kegiatan seperti ini, HIMATIKA dapat terus menginspirasi mahasiswa lainnya untuk berpartisipasi dalam kegiatan sosial dan berbagi kepada sesama, serta menjadikan bulan Ramadan sebagai momen yang penuh makna untuk mempererat tali silaturahmi dan meningkatkan rasa peduli terhadap lingkungan sekitar.'
                ]
            ],
            7 => [
                'title' => 'Mahasiswa Baru Manajemen Informatika Angkatan 17 Lakukan Study Week Rutin',
                'category' => 'Angkatan 17 Study Week',
                'date' => '14 September 2024',
                'image' => 'berita7.jpg',
                'content' => [
                    'Kediri, 14 September 2024 – Mahasiswa baru Prodi Manajemen Informatika Angkatan 17 telah mengikuti kegiatan Study Week secara aktif sejak 14 September 2024 dan akan berlangsung hingga 12 Oktober 2024. Study Week merupakan salah satu program unggulan yang dirancang khusus untuk membantu mahasiswa baru dalam memahami materi perkuliahan secara lebih mendalam. Program ini melibatkan sesi diskusi kelompok, belajar bersama, serta pembimbingan yang langsung dipandu oleh dosen dan kakak tingkat, dengan tujuan memberikan dukungan maksimal dalam proses adaptasi akademik mereka.',
                    'Kegiatan Study Week ini dilaksanakan setiap hari Sabtu, dan sejak dimulai, mahasiswa baru menunjukkan antusiasme yang luar biasa. Mereka memanfaatkan setiap kesempatan untuk bertukar ide, berbagi pengetahuan, serta menyelesaikan tugas-tugas kuliah yang diberikan. Program ini tidak hanya memberikan ruang bagi mahasiswa untuk berdiskusi tentang materi kuliah yang sulit, tetapi juga membantu mereka untuk mempersiapkan diri menghadapi ujian dengan cara yang lebih terstruktur. Sesi diskusi yang dipandu oleh dosen dan kakak tingkat memungkinkan mahasiswa baru untuk memperoleh perspektif yang lebih luas serta penjelasan yang lebih rinci tentang materi yang dipelajari.',
                    'Selain manfaat akademik, Study Week juga menjadi ajang untuk mempererat hubungan antar mahasiswa baru, di mana mereka dapat saling mengenal dan membangun kerja sama yang solid dalam menyelesaikan tugas-tugas kelompok. Program ini mendorong mahasiswa untuk bekerja sama secara aktif, mengembangkan keterampilan komunikasi, dan membangun kebiasaan belajar yang positif. Mahasiswa baru tidak hanya belajar bersama, tetapi juga belajar untuk mengatasi tantangan akademik secara tim, yang sangat penting untuk membentuk mentalitas kolaboratif yang diperlukan dalam dunia profesional.',
                    'Dengan semangat belajar yang tinggi, mahasiswa Angkatan 17 diharapkan dapat mengoptimalkan kegiatan ini untuk memperdalam pemahaman mereka terhadap materi perkuliahan dan mencapai prestasi akademik yang lebih baik. Selain itu, kegiatan ini diharapkan dapat membantu mahasiswa untuk mengembangkan rasa percaya diri dalam menghadapi ujian dan tantangan akademik lainnya. Para dosen dan kakak tingkat juga berharap bahwa mahasiswa baru akan merasakan manfaat besar dari Study Week ini, baik dalam hal penguasaan materi maupun dalam membangun hubungan yang lebih erat dengan teman-teman seangkatan dan dosen pengampu mata kuliah.',
                    'Sebagai bagian dari komitmen Prodi Manajemen Informatika untuk memberikan pengalaman akademik yang seimbang dan mendalam, kegiatan ini diharapkan dapat terus berlangsung setiap tahunnya dan menjadi tradisi yang bermanfaat bagi mahasiswa baru dalam menghadapi kehidupan perkuliahan yang lebih penuh tantangan dan peluang.'
                ]
            ],
            8 => [
                'title' => 'Kuliah Tamu: Cyber Security & IoT',
                'category' => 'Kuliah Tamu',
                'date' => '25 September',
                'image' => 'berita8.jpg',
                'content' => [
                    'Kediri, 25 September 2024 – Kuliah Tamu dengan tema "Cyber Security & IoT" diselenggarakan secara daring melalui platform Zoom. Kegiatan ini bertujuan untuk memberikan pemahaman mendalam kepada mahasiswa Prodi Manajemen Informatika mengenai tantangan dan peluang yang muncul di dunia teknologi digital, khususnya terkait dengan keamanan siber dan Internet of Things (IoT).',
                    'Dalam kuliah tamu ini, para pembicara yang berkompeten di bidang Keamanan Siber dan IoT membahas potensi besar yang ditawarkan oleh IoT, serta tantangan yang terkait dengan keamanan perangkat yang terhubung melalui internet. Dengan semakin berkembangnya teknologi, ancaman terhadap data dan perangkat IoT semakin besar, dan kuliah tamu ini memberikan wawasan mengenai bagaimana cara melindungi data pribadi dan menjaga sistem yang terhubung dengan internet.',
                    'Selain paparan materi, mahasiswa juga diberikan kesempatan untuk berinteraksi langsung dengan para narasumber dalam sesi tanya jawab. Interaksi ini memungkinkan peserta untuk memperdalam pemahaman tentang cara mengamankan perangkat IoT dan data pribadi mereka. Diskusi juga mencakup langkah-langkah yang dapat diambil untuk mengurangi risiko ancaman siber yang semakin kompleks.',
                    'Kuliah Tamu ini mendapatkan respons yang sangat antusias dari mahasiswa. Banyak pertanyaan yang muncul terkait dengan cara-cara mengatasi ancaman yang ada di dunia maya, serta strategi dalam menjaga integritas data dan perangkat yang terhubung. Para peserta kuliah tamu berharap dapat menerapkan ilmu yang diperoleh untuk menghadapi perkembangan teknologi yang semakin pesat.',
                    'Kegiatan ini juga memberikan mahasiswa kesempatan untuk mengembangkan keterampilan mereka dalam menghadapi tantangan dunia digital, serta meningkatkan kesadaran akan pentingnya keamanan siber. Dengan memahami isu-isu penting ini, diharapkan mahasiswa dapat menjadi profesional yang siap menghadapi dunia kerja yang semakin mengutamakan pengelolaan data yang aman dan terlindungi.',
                    'Melalui kuliah tamu ini, Prodi Manajemen Informatika berharap agar mahasiswa dapat memahami dengan lebih baik tantangan-tantangan yang terkait dengan teknologi digital, serta mempersiapkan diri untuk menghadapi masa depan yang penuh dengan ancaman dan peluang di dunia siber dan IoT.'
                ]
            ],
            
            9 => [
                'title' => 'Tim Futsal Prodi D3 Manajemen Informatika Juara 1 di POM PSM',
                'category' => 'Juara POM Futsal',
                'date' => '27 Agustus 2024',
                'image' => 'berita9.jpg',
                'content' => [
                    'Kediri, 27 Agustus 2024 – Tim futsal Prodi D3 Manajemen Informatika berhasil meraih prestasi gemilang dengan menjadi juara dalam ajang Pekan Olahraga Mahasiswa (POM) Pusat Studi Manajemen (PSM) yang berlangsung pada bulan Agustus 2024. Kemenangan ini membuktikan bahwa tim futsal Prodi D3 Manajemen Informatika mampu bersaing dengan tim-tim lainnya di tingkat universitas.',
                    'Ajang POM PSM diikuti oleh berbagai prodi dan tim dari kampus-kampus di Indonesia, dan kompetisi futsal ini menjadi salah satu cabang yang sangat dinantikan oleh mahasiswa. Tim futsal Prodi D3 Manajemen Informatika, dengan persiapan matang dan semangat tinggi, berhasil mengantongi gelar juara setelah melewati serangkaian pertandingan sengit.',
                    'Perjalanan menuju juara tidak mudah. Tim futsal yang terdiri dari mahasiswa dengan berbagai latar belakang keahlian futsal yang beragam ini berhasil menunjukkan kerjasama tim yang solid dalam menghadapi tantangan dari tim-tim lain. Dalam pertandingan final, tim futsal Prodi D3 Manajemen Informatika menunjukkan permainan terorganisir dengan strategi yang efektif, membawa mereka meraih kemenangan yang meyakinkan.',
                    'Selain kemampuan teknis, kemenangan ini juga dipengaruhi oleh latihan intensif yang dijalani para pemain. Latihan rutin yang difasilitasi oleh pelatih berpengalaman membantu meningkatkan aspek permainan seperti teknik dribbling, passing, koordinasi tim, dan penyelesaian akhir. Keberhasilan mereka dalam final juga berkat peran pelatih yang mampu mengoptimalkan potensi setiap pemain dan mengatur strategi permainan dengan baik.',
                    'Kemenangan ini membawa kebanggaan tidak hanya bagi para pemain, tetapi juga seluruh civitas akademika Prodi D3 Manajemen Informatika. Gelar juara ini menjadi simbol keberhasilan tim dalam mengharumkan nama prodi di ajang olahraga bergengsi tersebut. Pencapaian ini juga membuktikan bahwa mahasiswa Prodi D3 Manajemen Informatika tidak hanya unggul dalam bidang akademik, tetapi juga memiliki potensi besar di bidang olahraga.',
                    'Setelah meraih juara, tim futsal Prodi D3 Manajemen Informatika mendapatkan penghargaan berupa trofi dan medali sebagai bukti nyata dari kerja keras dan dedikasi mereka. Prestasi ini menginspirasi mahasiswa lainnya untuk aktif berpartisipasi dalam kegiatan olahraga dan membangun semangat kompetisi yang sehat di lingkungan kampus.',
                    'Dengan semangat juara yang ditunjukkan, Tim Futsal Prodi D3 Manajemen Informatika telah membuktikan bahwa olahraga adalah sarana yang baik untuk mengasah kerjasama tim, ketekunan, dan semangat juang, yang menjadi modal penting dalam meraih kesuksesan, baik di dalam maupun di luar lapangan.'
                ]
            ],
            // Tambahkan data untuk berita lainnya dengan cara yang sama
        ];

        // Pastikan berita dengan ID yang diberikan ada
        if (!isset($berita[$id])) {
            abort(404);  // Jika tidak ada berita yang ditemukan, tampilkan halaman 404
        }

        // Mengirimkan data berita ke view
        return view('berita', ['id' => $id, 'berita' => $berita[$id]]);
    }
}
