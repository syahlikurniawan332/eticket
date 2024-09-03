@section('title', 'tentang kami')

<x-app>

    <!-- Tentang Perusahaan -->
    <div class="container-fluid p-0">
        <div class="position-relative text-center">
            <img src="{{ asset('assets/img/page3.jpg') }}" class="img-fluid opacity-50 w-100" alt="Seminar Hero Image">

            <div class="overlay-text-1 position-absolute top-50 start-50 translate-middle text-white animate-fade-in">
                <h1 class="display-4 text-shadow fw-bold">E-Ticketing Seminar</h1>
                <p class="lead text-shadow d-block d-md-none d-lg-block">Solusi Terpercaya untuk Pembelian Tiket Seminar</p>
            </div>

            <div class="position-absolute w-100 px-3 py-4 animate-slide-up text-dark d-none d-md-block" style="bottom: 0;">
                <div class="container fw-bold">
                    <p class="mt-5">Selamat datang di platform e-ticketing kami, tempat Anda dapat dengan mudah membeli tiket seminar dan acara lainnya. Kami menyediakan berbagai seminar dari berbagai kategori untuk memenuhi kebutuhan Anda, baik itu seminar untuk umum maupun khusus untuk mahasiswa. Dengan antarmuka yang mudah digunakan dan proses pembelian yang cepat, kami berkomitmen untuk memberikan pengalaman terbaik kepada setiap pengguna.</p>
                    <p>Kami memastikan keamanan transaksi dengan sistem pembayaran terintegrasi dan penawaran tiket yang transparan. Bergabunglah dengan ribuan pengguna lainnya yang telah merasakan kemudahan dan kenyamanan dalam membeli tiket seminar melalui platform kami.</p>
                    <p>Temukan seminar yang tepat untuk Anda dan tingkatkan pengetahuan Anda dengan hanya beberapa klik. Terima kasih telah memilih kami sebagai mitra dalam perjalanan belajar Anda.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Privacy Policy -->
    <div class="bg-dark text-light">
        <div class="container my-5 pb-4">
            <div class="row">
                <div class="col-12">
                    <h3 class="fw-bold">Kebijakan Privasi</h3>

                    <h5 class="mt-4">Pendahuluan</h5>
                    <p>Selamat datang di halaman Kebijakan Privasi kami. Kami berkomitmen untuk melindungi dan menghormati privasi Anda. Kebijakan ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat menggunakan layanan kami.</p>

                    <h5 class="mt-5">Informasi yang Kami Kumpulkan</h5>
                    <p>Kami mengumpulkan informasi pribadi yang Anda berikan secara sukarela saat mendaftar atau berinteraksi dengan layanan kami. Informasi ini termasuk nama, alamat email, nomor telepon, dan informasi pembayaran.</p>
                    <p>Kami juga mengumpulkan informasi tambahan melalui penggunaan layanan kami, termasuk data tentang cara Anda menggunakan situs kami dan perangkat yang Anda gunakan untuk mengakses layanan kami.</p>

                    <h5 class="mt-5">Bagaimana Kami Menggunakan Informasi Anda</h5>
                    <p>Informasi yang kami kumpulkan digunakan untuk:</p>
                    <ul>
                        <li>Memproses transaksi dan mengelola pesanan Anda.</li>
                        <li>Meningkatkan pengalaman pengguna Anda dengan menyediakan konten dan layanan yang sesuai.</li>
                        <li>Menanggapi pertanyaan atau permintaan dukungan dari Anda.</li>
                        <li>Mematuhi kewajiban hukum dan peraturan yang berlaku.</li>
                    </ul>

                    <h5 class="mt-5">Pengungkapan Informasi Pribadi</h5>
                    <p>Kami tidak akan membagikan informasi pribadi Anda dengan pihak ketiga tanpa persetujuan Anda, kecuali jika diperlukan untuk memproses transaksi atau mematuhi hukum yang berlaku.</p>
                    <p>Informasi Anda dapat diungkapkan kepada penyedia layanan pihak ketiga yang membantu kami dalam operasional dan pemeliharaan layanan kami, seperti pemrosesan pembayaran dan pengiriman.</p>

                    <h5 class="mt-5">Keamanan Data</h5>
                    <p>Kami menerapkan langkah-langkah keamanan yang sesuai untuk melindungi informasi pribadi Anda dari akses, penggunaan, atau pengungkapan yang tidak sah. Meskipun kami berusaha untuk melindungi data Anda, kami tidak dapat menjamin keamanan absolut dari data yang dikirim melalui internet.</p>

                    <h5 class="mt-5">Hak Anda</h5>
                    <p>Anda memiliki hak untuk mengakses, memperbarui, atau menghapus informasi pribadi Anda yang kami miliki. Jika Anda ingin melakukan perubahan atau memiliki pertanyaan mengenai kebijakan privasi ini, silakan hubungi kami.</p>

                    <h5 class="mt-5">Perubahan Kebijakan</h5>
                    <p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan diumumkan di situs kami, dan perubahan tersebut akan berlaku mulai dari tanggal yang tertera pada kebijakan privasi yang diperbarui.</p>

                    <p>Terima kasih telah membaca kebijakan privasi kami. Kami berkomitmen untuk melindungi privasi Anda dan memastikan pengalaman pengguna yang aman dan menyenangkan.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- FAQs -->
    <div class="container shadow-sm">
        <div class="row">
            <div class="faqs text-center">
                <h3 class="fw-bold font-monospace">FAQS</h3>
            </div>
            <div class="body-faqs shadow">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item bg-secondary text-white">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Apa itu e-ticketing?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                E-ticketing adalah sistem yang memungkinkan Anda membeli dan mengelola tiket secara elektronik tanpa memerlukan tiket fisik. Dengan e-ticketing, Anda dapat membeli tiket secara online, menerima tiket dalam bentuk digital, dan menampilkan tiket tersebut pada perangkat Anda saat menghadiri acara.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-secondary text-white mt-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana cara membeli tiket seminar?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Untuk membeli tiket seminar, Anda perlu mengunjungi situs web kami, memilih seminar yang diinginkan, dan mengikuti langkah-langkah di halaman checkout. Anda dapat membayar tiket menggunakan metode pembayaran yang tersedia, dan Anda akan menerima tiket elektronik melalui email.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-secondary text-white mt-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Apa yang harus dilakukan jika saya kehilangan tiket saya?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Jika Anda kehilangan tiket Anda, Anda dapat menghubungi layanan pelanggan kami melalui email atau telepon. Kami akan memverifikasi identitas Anda dan membantu Anda mendapatkan akses ke tiket baru atau informasi lebih lanjut tentang acara.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-secondary text-white mt-3">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Apakah tiket yang dibeli bisa dikembalikan?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kebijakan pengembalian tiket tergantung pada jenis acara dan ketentuan yang berlaku. Silakan periksa kebijakan pengembalian tiket kami di situs web atau hubungi layanan pelanggan untuk informasi lebih lanjut.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center my-5 pb-4">
            <h6 class="fw-bold">Ingin Informasi lebih lanjut silahkan kontak kami</h6>
        </div>
    </div>
    <!-- end -->

    <!-- kontak -->
    <div class="kontak-kami-container container mt-5">
        <h3 class="text-center fw-bold">Kontak Kami</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-md-3 text-center">
                <i class="fab fa-whatsapp fa-2x mb-2"></i>
                <p>WhatsApp: <a href="https://wa.me/nomorwhatsapp" target="_blank">+62 812-3456-7890</a></p>
            </div>
            <div class="col-md-3 text-center">
                <i class="fab fa-twitter fa-2x mb-2"></i>
                <p>Twitter: <a href="https://twitter.com/akun_twitter" target="_blank">@akun_twitter</a></p>
            </div>
            <div class="col-md-3 text-center">
                <i class="fab fa-instagram fa-2x mb-2"></i>
                <p>Instagram: <a href="https://instagram.com/akun_instagram" target="_blank">@akun_instagram</a></p>
            </div>
            <div class="col-md-3 text-center">
                <i class="fab fa-tiktok fa-2x mb-2"></i>
                <p>TikTok: <a href="https://tiktok.com/@akun_tiktok" target="_blank">@akun_tiktok</a></p>
            </div>
        </div>
    </div>
    <!-- end -->

</x-app>