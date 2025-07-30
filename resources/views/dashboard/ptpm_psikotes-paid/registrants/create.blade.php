@extends(
    "dashboard.layouts.app",
    [
        "title" => "Pendaftaran Psikotes",
    ]
)

@section("content")
    <section class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-12">
            <div>
                <p tabindex="0" class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">Data Pendaftar Psikotes</p>
                <p class="text-disabled py-2">Fitur ini menampilkan informasi data pengguna yang telah melakukan registrasi Psikotes Berbinar</p>
            </div>
        </div>

        {{-- Wrapper Alpine.js --}}
        <div
            class="flex flex-col gap-10 rounded-[24px] bg-white px-10 py-7"
            x-data="{
                testCategories: {{ Js::from($testCategories) }},
                selectedCategory: '{{ old("test_category_id") }}' || '',
                selectedTestType: '{{ old("test_type_id") }}' || '',
                filteredTestTypes: [],

                init() {
                    if (this.selectedCategory) {
                        this.filterTypes()
                    }
                },

                filterTypes() {
                    if (! this.selectedCategory) {
                        this.filteredTestTypes = []
                        this.selectedTestType = ''
                        return
                    }

                    const category = this.testCategories.find(
                        (cat) => cat.id == this.selectedCategory,
                    )
                    this.filteredTestTypes = category ? category.test_types : []

                    if (
                        ! this.filteredTestTypes.find(
                            (type) => type.id == this.selectedTestType,
                        )
                    ) {
                        this.selectedTestType = ''
                    }
                },
            }"
            x-init="init()"
        >
            <form action="{{ route("dashboard.registrants.store") }}" method="POST" class="flex flex-col gap-10">
                @csrf
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="name" class="mb-2 font-bold text-[#9b9b9b]">Nama</label>
                        <input type="text" name="name" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Nama" value="{{ old("name") }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="gender" class="mb-2 font-bold text-[#9b9b9b]">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="male" @selected(old("gender") === "male")>Laki-Laki</option>
                            <option value="female" @selected(old("gender") === "female")>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="age" class="mb-2 font-bold text-[#9b9b9b]">Umur</label>
                        <input type="number" name="age" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Umur" value="{{ old("age") }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="phone_number" class="mb-2 font-bold text-[#9b9b9b]">Telepon</label>
                        <input type="tel" name="phone_number" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Telepon" value="{{ old("phone_number") }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="email" class="mb-2 font-bold text-[#9b9b9b]">Email</label>
                        <input type="email" name="email" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Email" value="{{ old("email") }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_category_id" class="mb-2 font-bold text-[#9b9b9b]">Kategori Psikotes</label>
                        <select name="test_category_id" id="test_category_id" x-model="selectedCategory" @change="filterTypes()" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            {{-- Placeholder yang value-nya "" --}}
                            <option value="" selected disabled>Pilih Kategori Psikotes</option>
                            @foreach ($testCategories as $testCategory)
                                <option value="{{ $testCategory->id }}">{{ $testCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="service" class="mb-2 font-bold text-[#9b9b9b]">Layanan Psikotes</label>
                        <select name="service" id="service" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            <option value="" selected disabled>Pilih Layanan Psikotes</option>
                            <option value="online" @selected(old("service") === "online")>Online</option>
                            <option value="offline" @selected(old("service") === "offline")>Offline</option>
                        </select>
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="test_type_id" class="mb-2 font-bold text-[#9b9b9b]">Jenis Psikotes</label>
                        <select name="test_type_id" id="test_type_id" x-model="selectedTestType" :disabled="!selectedCategory || filteredTestTypes.length === 0" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0">
                            <option value="" selected disabled>Pilih Jenis Psikotes</option>
                            <template x-for="testType in filteredTestTypes" :key="testType.id">
                                <option :value="testType.id" x-text="testType.name"></option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="psikotes_date" class="mb-2 font-bold text-[#9b9b9b]">Tanggal Psikotes</label>
                        <input type="date" name="psikotes_date" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0"  value="{{ old("psikotes_date") }}" />
                    </div>
                    <div class="flex w-full flex-col">
                        <label for="psikotes_time" class="mb-2 font-bold text-[#9b9b9b]">Waktu Psikotes</label>
                        <input type="time" name="psikotes_time" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" value="{{ old("psikotes_time") }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="domicile" class="mb-2 font-bold text-[#9b9b9b]">Domisili</label>
                        <input type="text" name="domicile" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Domisili" value="{{ old("domicile") }}" />
                    </div>
                </div>
                <div class="flex gap-20">
                    <div class="flex w-full flex-col">
                        <label for="reason" class="mb-2 font-bold text-[#9b9b9b]">Alasan</label>
                        <textarea name="reason" rows="10" class="rounded-md border-0 px-6 py-3 text-sm font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.16)] focus:ring-0" placeholder="Alasan">{{ old("reason") }}</textarea>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="rounded-md bg-blue-500 px-6 py-3 font-semibold text-white hover:bg-blue-600">Simpan Pendaftaran</button>
                </div>
            </form>
        </div>
    </section>
@endsection
