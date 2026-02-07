<div class="mb-1 flex w-full gap-8 max-h-[580px]">
    <!-- Kartu Kiri: Ringkasan & Rincian Jawaban -->
    <div class="flex w-3/5 flex-col rounded-2xl bg-white shadow-lg">
        <div class="px-8 pt-4 pb-1">
            <div class="mb-1">
                <h2 class="text-[28px] font-semibold text-[#75BADB]">{{ $attempt->user->name ?? "User Tidak Diketahui" }}</h2>
            </div>
            <div class="mt-2 text-[13px] text-gray-600">
                <p>
                    <span class="font-semibold text-gray-700">Kategori:</span>
                    <span class="ml-1 text-gray-800">Bureaucrat</span>
                </p>
                <p class="mt-1">
                    <span class="font-semibold text-gray-700">Status:</span>
                    <span class="ml-1 text-gray-800">Lebih Efektif</span>
                </p>
            </div>
            <div class="mt-4 border-b-2 border-gray-200"></div>
        </div>

        <div class="flex min-h-0 flex-1 flex-col border-gray-200">
            <div class="px-8 pt-2 pb-2">
                <h3 class="mb-1 text-base font-semibold text-[#75BADB]">Rincian Jawaban</h3>
            </div>
            <div class="flex-1 overflow-y-auto px-8 pb-4">
                <div class="text-[13px]  text-gray-700">
                    <p>Ditampilkan oleh pemimpin yang menggunakan TO rendah RO rendah. Dalam situasi yang sesuai sehingga ia dapat bertindak efektif ia merupakan pemimpin yang menekankan pada aturan dan prosedur untuk kepentingan dirinya serta menjalankan pengaturan dan pengawasan dengan caranya sendiri. Ia termasuk pemimpin yang hati-hati dalam bertindak.</p>
                    <p>Pemimpin yang bertipe bureaucrat adalah tipe pemimpin yang hanya berorientasi pada keefektifan saja. Pemimpin tipe ini memiliki sifat-sifat sebagai berikut:</p>
                </div>

                <div class="mt-4 space-y-4 text-[13px] leading-relaxed text-gray-700">
                    <div>
                        <p class="font-semibold">1) Selalu berorientasi pada keefektifan. Hal ini tampak pada sifat-sifatnya sebagai berikut:</p>
                        <ul class="mt-1 list-[lower-alpha] space-y-1 pl-5">
                            <li>Bekerja sesuai dengan prosedur yang benar dan peraturan yang berlaku.</li>
                            <li>Taat pada peraturan organisasi serta taat pada perintah secara tepat.</li>
                            <li>Memelihara kepentingan lingkungan dengan selalu mengikuti aturan-aturan manajerial.</li>
                        </ul>
                    </div>
                    <div>
                        <p class="font-semibold">2) Tidak atau kurang berorientasi pada tugas. Hal ini tampak pada sifat-sifatnya antara lain:</p>
                        <ul class="mt-1 list-[lower-alpha] space-y-1 pl-5">
                            <li>Tidak menyukai tugas yang diserahkan kepadanya.</li>
                            <li>Ide-idenya tidak atau kurang mendorong untuk meningkatkan produksi.</li>
                        </ul>
                    </div>
                    <div>
                        <p class="font-semibold">3) Tidak atau kurang berorientasi pada hubungan dengan orang lain. Hal ini tampak pada sifat-sifatnya antara lain:</p>
                        <ul class="mt-1 list-[lower-alpha] space-y-1 pl-5">
                            <li>Tidak atau kurang menyukai masyarakat.</li>
                            <li>Tidak atau kurang mengembangkan hubungan dengan bawahannya.</li>
                            <li>Sangat percaya bahwa hubungan baik dengan orang lain tidak penting.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Kanan: Detail Jawaban per Pernyataan -->
    <div class="flex w-2/5 flex-col rounded-2xl bg-white px-8 py-6 shadow-lg">
        <h2 class="mb-4 text-xl font-semibold text-[#75BADB]">Jawaban</h2>

        <div class="flex-1 overflow-y-auto">
            <table class="w-full table-fixed border-collapse text-[13px]">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-500">
                        <th class="w-[10%] px-2 py-2 text-left font-medium">No</th>
                        <th class="w-[15%] px-2 py-2 text-left font-medium">Pilihan</th>
                        <th class="w-[75%] px-2 py-2 text-left font-medium">Pernyataan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-100 align-top">
                        <td class="px-2 py-2 text-gray-700">1.</td>
                        <td class="px-2 py-2 font-semibold text-gray-800">A</td>
                        <td class="px-2 py-2 text-gray-700">
                            Saya tidak akan menegur pelanggar-pelanggar peraturan bila saya merasa pasti bahwa tidak ada satu orang pun yang mengetahui tentang pelanggar-pelanggar tersebut.
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 align-top">
                        <td class="px-2 py-2 text-gray-700">2.</td>
                        <td class="px-2 py-2 font-semibold text-gray-800">A</td>
                        <td class="px-2 py-2 text-gray-700">
                            Bila ada seorang karyawan yang hasil kerjanya selalu tidak memuaskan saya, saya akan menunggu suatu kesempatan untuk memindahkannya dan bukan untuk memecatnya.
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 align-top">
                        <td class="px-2 py-2 text-gray-700">3.</td>
                        <td class="px-2 py-2 font-semibold text-gray-800">A</td>
                        <td class="px-2 py-2 text-gray-700">
                            Bila direktur memberikan perintah yang kurang menyenangkan, saya pikir adalah cukup bijaksana bila saya menyebutkan namanya bukan nama saya.
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 align-top">
                        <td class="px-2 py-2 text-gray-700">4.</td>
                        <td class="px-2 py-2 font-semibold text-gray-800">A</td>
                        <td class="px-2 py-2 text-gray-700">
                            Bila saya ditegur oleh atasan saya, saya akan memanggil semua bawahan saya dan mengatakan semua teguran tersebut kepada mereka.
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 align-top">
                        <td class="px-2 py-2 text-gray-700">5.</td>
                        <td class="px-2 py-2 font-semibold text-gray-800">A</td>
                        <td class="px-2 py-2 text-gray-700">
                            Saya selalu melakukan diskusi-diskusi untuk mencapai kata sepakat.
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 align-top">
                        <td class="px-2 py-2 text-gray-700">6.</td>
                        <td class="px-2 py-2 font-semibold text-gray-800">A</td>
                        <td class="px-2 py-2 text-gray-700">
                            Seringkali saya lebih mementingkan tugas daripada diri saya sendiri.
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 align-top">
                        <td class="px-2 py-2 text-gray-700">7.</td>
                        <td class="px-2 py-2 font-semibold text-gray-800">A</td>
                        <td class="px-2 py-2 text-gray-700">
                            Bila jumlah dan mutu hasil kerja bagian saya tidak memuaskan, saya mengatakan kepada bawahan-bawahan saya bahwa direktur merasa kecewa. Oleh karena itu, mereka harus memperbaiki kerja mereka.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>