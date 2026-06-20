<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@lsp-Sanford.com'],
            [
                'name' => 'Administrator LSP',
                'password' => bcrypt('password'),
            ]
        );

        // 2. Seed Site Settings
        $settings = [
            'site_name' => 'LSP Sanford',
            'about_history' => 'LSP Sanford didirikan sebagai lembaga independen yang berkomitmen penuh dalam menguji dan menerbitkan sertifikasi kompetensi kerja di wilayah Sanford. Kami menjamin asesmen yang fair, objektif, dan berstandar nasional (BNSP).',
            'about_visi' => 'Menjadi Lembaga Sertifikasi Profesi yang unggul, profesional, terpercaya, dan berdaya saing global dalam melahirkan sumber daya manusia yang kompeten.',
            'about_misi' => "1. Menyelenggarakan sertifikasi kompetensi profesi secara kredibel, akuntabel, dan transparan.\n2. Mengembangkan skema sertifikasi inovatif yang relevan dengan kebutuhan industri digital modern.\n3. Membangun jejaring kemitraan strategis dengan institusi pendidikan dan dunia industri regional.",
            'kontak_alamat' => 'Jl. Mastrip No. 164, Sanford, Jawa Timur 68121',
            'kontak_telepon' => '(0331) 1234567',
            'kontak_email' => 'info@lsp-Sanford.com',
            'kontak_maps' => '<iframe class="w-full h-full rounded-2xl border-0 shadow-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3392470761107!2d113.71960257579624!3d-8.168532481861781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6943b171ab85f%3A0xe543e5c94fae726b!2sPoliteknik%20Negeri%20Sanford!5e0!3m2!1sid!2sid!4v1717833000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'meta_title' => 'LSP Sanford - Lembaga Sertifikasi Profesi Kompeten',
            'meta_description' => 'Portal Resmi LSP Sanford. Dapatkan sertifikasi kompetensi resmi berstandar BNSP untuk meningkatkan daya saing profesional Anda.',
            'meta_keywords' => 'lsp Sanford, sertifikasi kompetensi, bnsp Sanford, uji kompetensi, Sanford coding, sertifikasi profesi',
            'maintenance_mode' => '0',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\SiteSetting::setValue($key, $value);
        }

        // 3. Seed Certification Schemes (Sertifikasi)
        $schemes = [
            [
                'nama_skema' => 'Junior Web Developer',
                'deskripsi' => 'Skema ini mengukur kompetensi dalam membangun aplikasi berbasis web menggunakan teknologi frontend & backend modern.',
                'icon' => 'code-bracket',
                'status' => 'aktif',
            ],
            [
                'nama_skema' => 'Desainer Grafis Pratama',
                'deskripsi' => 'Skema sertifikasi untuk menguji kemampuan desain visual, pembuatan aset ilustrasi, tata letak, dan branding visual.',
                'icon' => 'paint-brush',
                'status' => 'aktif',
            ],
            [
                'nama_skema' => 'Network Administrator',
                'deskripsi' => 'Fokus pada instalasi, konfigurasi, keamanan, dan pemeliharaan infrastruktur jaringan komputer berskala menengah.',
                'icon' => 'server',
                'status' => 'aktif',
            ],
            [
                'nama_skema' => 'Digital Marketer',
                'deskripsi' => 'Menguji kemampuan analisis pasar digital, periklanan berbayar, SEO, copywriting, dan optimasi media sosial.',
                'icon' => 'chart-bar',
                'status' => 'aktif',
            ],
        ];

        foreach ($schemes as $scheme) {
            \App\Models\Sertifikasi::updateOrCreate(['nama_skema' => $scheme['nama_skema']], $scheme);
        }

        // 4. Seed Berita Acara (News)
        $newsItems = [
            [
                'judul' => 'LSP Sanford Selenggarakan Sertifikasi Massal Sektor IT',
                'slug' => 'lsp-Sanford-selenggarakan-sertifikasi-massal-sektor-it',
                'konten' => '<p>Lembaga Sertifikasi Profesi (LSP) Sanford sukses menyelenggarakan ujian sertifikasi massal untuk sektor Teknologi Informasi. Sebanyak 150 peserta terdaftar mengikuti asesmen dari berbagai skema, termasuk Junior Web Developer dan Network Administrator.</p><p>Acara yang berlangsung selama 3 hari ini bertujuan untuk mempercepat peningkatan kualitas tenaga kerja lokal agar siap bersaing di pasar kerja digital nasional maupun global.</p>',
                'thumbnail' => null,
                'kategori' => 'Sertifikasi',
                'tanggal' => '2026-06-05',
                'penulis' => 'Humas LSP',
                'status' => 'published',
                'tampil_di_home' => true,
                'urutan_home' => 1,
            ],
            [
                'judul' => 'Uji Kompetensi Gelombang II Tahun 2026 Segera Dibuka',
                'slug' => 'uji-kompetensi-gelombang-ii-tahun-2026-segera-dibuka',
                'konten' => '<p>Pendaftaran Uji Kompetensi Gelombang II di LSP Sanford akan resmi dibuka mulai pertengahan bulan ini. Pihak manajemen mengimbau calon peserta untuk segera mempersiapkan berkas dokumen portofolio dan administrasi.</p><p>Uji kompetensi ini terbuka umum bagi mahasiswa tingkat akhir maupun tenaga kerja industri yang ingin melegitimasi keahlian mereka secara formal dengan standar sertifikat lambang garuda BNSP.</p>',
                'thumbnail' => null,
                'kategori' => 'Pengumuman',
                'tanggal' => '2026-06-08',
                'penulis' => 'Admin LSP',
                'status' => 'published',
                'tampil_di_home' => true,
                'urutan_home' => 2,
            ],
            [
                'judul' => 'LSP Sanford Jalin Kerjasama dengan Dunia Industri Regional',
                'slug' => 'lsp-Sanford-jalin-kerjasama-dengan-dunia-industri-regional',
                'konten' => '<p>Dalam upaya mempersempit jarak kesenjangan kompetensi antara dunia pendidikan dan industri, LSP Sanford menandatangani MoU kemitraan strategis dengan asosiasi pengusaha industri kreatif digital regional Jawa Timur.</p><p>Kolaborasi ini akan memfasilitasi penempatan lulusan bersertifikasi ke industri yang relevan secara langsung.</p>',
                'thumbnail' => null,
                'kategori' => 'Kerjasama',
                'tanggal' => '2026-06-09',
                'penulis' => 'Humas LSP',
                'status' => 'published',
                'tampil_di_home' => true,
                'urutan_home' => 3,
            ],
            [
                'judul' => 'Tips Menghadapi Asesmen Kompetensi untuk Pemula',
                'slug' => 'tips-menghadapi-asesmen-kompetensi-untuk-pemula',
                'konten' => '<p>Menghadapi ujian asesmen kompetensi seringkali membuat tegang calon asesi pemula. Berikut adalah rangkuman tips terbaik mulai dari melengkapi dokumen APL-01 & APL-02, memahami standar kompetensi (SKKNI), hingga mempersiapkan demonstrasi praktik di depan asesor.</p>',
                'thumbnail' => null,
                'kategori' => 'Edukasi',
                'tanggal' => '2026-06-09',
                'penulis' => 'Asesor IT',
                'status' => 'published',
                'tampil_di_home' => false,
            ],
        ];

        foreach ($newsItems as $news) {
            \App\Models\BeritaAcara::updateOrCreate(['slug' => $news['slug']], $news);
        }
    }
}
