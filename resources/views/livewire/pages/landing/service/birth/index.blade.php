<section id="section-service-birth" data-component-id="service-birth" class="w-full">
    <x-container.hero-certificate-container title="SURAT KETERANGAN KELAHIRAN"
        subTitle="Halaman Pengajuan Surat Keterangan Kelahiran" />
    <x-container.certificate-container>
        <div x-data x-init="$el.classList.remove('opacity-0', 'translate-x-10')"
            class="w-full grid grid-cols-3 gap-5 items-start opacity-0 translate-x-10 transition-all transform duration-700 delay-300">
            <div class="w-full col-span-2 bg-white shadow-xl rounded-2xl border border-neutral-300 p-7">
                <p class="text-xl font-bold text-neutral-700">Form Pengajuan Surat Keterangan Kelahiran</p>
                <div class="border-b border-neutral-300 w-full my-5"></div>
                <p class="font-bold text-neutral-700 mb-3">Informasi Bayi</p>

                <div class="grid grid-cols-1 gap-5 mb-5">
                    <x-input.text.text :required="true" label="Nama" labelClassName="font-semibold"
                        parentClassName="w-full" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-input.text.text :required="true" label="Tempat Lahir" parentClassName="w-full"
                        labelClassName="font-semibold" />
                    <x-input.text.text :required="true" label="Tanggal Lahir" parentClassName="w-full"
                        labelClassName="font-semibold" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-select.select :options="$gender" :required="true" label="Jenis Kelamin" parentClassName="w-full"
                        labelClassName="font-semibold" />
                    <x-input.text.text :required="true" label="Anak Ke" parentClassName="w-full"
                        labelClassName="font-semibold" />
                </div>
                <div class="border-b border-neutral-300 w-full my-5"></div>
                <p class="font-bold text-neutral-700 mb-3">Informasi Ayah</p>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-input.text.text :required="true" label="Nama" labelClassName="font-semibold"
                        parentClassName="w-full" />
                    <x-input.text.text :required="true" label="NIK (Nomor Induk Kependudukan)"
                        labelClassName="font-semibold" parentClassName="w-full" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-input.text.text :required="true" label="Tempat Lahir" parentClassName="w-full"
                        labelClassName="font-semibold" />
                    <x-input.text.text :required="true" label="Tanggal Lahir" parentClassName="w-full"
                        labelClassName="font-semibold" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-select.select :options="$gender" :required="true" label="Jenis Kelamin"
                        parentClassName="w-full" labelClassName="font-semibold" />
                    <x-select.select :options="$citizenship" :required="true" label="Kewarganegaraan"
                        parentClassName="w-full" labelClassName="font-semibold" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-select.select :options="$religion" :required="true" label="Agama" parentClassName="w-full"
                        labelClassName="font-semibold" />
                    <x-input.text.text label="Pekerjaan" parentClassName="w-full" labelClassName="font-semibold" />
                </div>
                <div class="grid grid-cols-1 gap-5 mb-5">
                    <x-input.text.textarea :required="true" label="Alamat" parentClassName="w-full"
                        labelClassName="font-semibold" rows="5" />
                </div>
                <div class="border-b border-neutral-300 w-full my-5"></div>
                <p class="font-bold text-neutral-700 mb-3">Informasi Ibu</p>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-input.text.text :required="true" label="Nama" labelClassName="font-semibold"
                        parentClassName="w-full" />
                    <x-input.text.text :required="true" label="NIK (Nomor Induk Kependudukan)"
                        labelClassName="font-semibold" parentClassName="w-full" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-input.text.text :required="true" label="Tempat Lahir" parentClassName="w-full"
                        labelClassName="font-semibold" />
                    <x-input.text.text :required="true" label="Tanggal Lahir" parentClassName="w-full"
                        labelClassName="font-semibold" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-select.select :options="$gender" :required="true" label="Jenis Kelamin"
                        parentClassName="w-full" labelClassName="font-semibold" />
                    <x-select.select :options="$citizenship" :required="true" label="Kewarganegaraan"
                        parentClassName="w-full" labelClassName="font-semibold" />
                </div>
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <x-select.select :options="$religion" :required="true" label="Agama" parentClassName="w-full"
                        labelClassName="font-semibold" />
                    <x-input.text.text label="Pekerjaan" parentClassName="w-full" labelClassName="font-semibold" />
                </div>
                <div class="grid grid-cols-1 gap-5 mb-5">
                    <x-input.text.textarea :required="true" label="Alamat" parentClassName="w-full"
                        labelClassName="font-semibold" rows="5" />
                </div>
                <div class="border-b border-neutral-300 w-full my-5"></div>
            </div>
            <div class="bg-white shadow-xl rounded-2xl border border-neutral-300 p-7">
                <!-- informasi pemohon -->
                <p class="text-xl font-bold text-neutral-700">Informasi Pemohon</p>
                <div class="border-b border-neutral-300 w-full my-5"></div>
                <x-input.text.text :required="true" label="Nama" parentClassName="w-full mb-5"
                    labelClassName="font-semibold" />
                <x-input.text.text :required="true" label="No. Whatsapp" parentClassName="w-full mb-5"
                    labelClassName="font-semibold" />
            </div>
        </div>
    </x-container.certificate-container>
</section>
