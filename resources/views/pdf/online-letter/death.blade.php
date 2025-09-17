@extends('pdf.online-letter.index')

@section('content')
    <p class="text-lg font-bold"
        style="line-height: 0.5; margin-bottom: 0; margin-top: 25px; text-align: center; text-decoration: underline">SURAT
        KETERANGAN KEMATIAN</p>
    <p class="text-md font-bold" style="line-height: 0.3; margin-bottom: 30px; text-align: center;">Nomor : 477 / / 404.601.09
        / 2025</p>
    <table class="w-full border-collapse">
        <tr>
            <td style="width: 0;">
            </td>
            <td>
                <!-- online letter body -->
                <div class="w-full">
                    <p class="text-md" style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 15px;">
                        Yang bertanda
                        tangan di bawah ini menerangkan bahwa :
                    </p>
                    <table class="w-full border-collapse" style="margin-bottom: 30px;">
                        <tr>
                            <td style="width: 50px;">
                            </td>
                            <td>
                                <div class="w-full">
                                    <table class="w-full border-collapse text-md">
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0;">Nama</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="text-transform: uppercase; line-height: 1.2; margin-bottom: 0; ">
                                                    {{ $certificate->person->name }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Tempat,
                                                    Tanggal Lahir</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                @php
                                                    \Carbon\Carbon::setLocale('id');
                                                @endphp
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0; ">
                                                    {{ $certificate->person->birth_place . ', ' . \Carbon\Carbon::parse($certificate->person->date_of_birth)->translatedFormat('d F Y') }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">NIK</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->person->identifier_number }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">No. Kartu
                                                    Keluarga</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->person->family_identifier_number }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Jenis Kelamin
                                                </p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ App\Commons\Libs\Helper\Converter::genderToDisplay($certificate->person->gender) }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Agama</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ ucfirst($certificate->person->religion) }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Warga Negara
                                                </p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ App\Commons\Libs\Helper\Converter::citizenshipToDisplay($certificate->person->citizenship) }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Status
                                                    Perkawinan</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ App\Commons\Libs\Helper\Converter::marriageToDisplay($certificate->person->marriage) }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Pekerjaan</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->person->job ?? '-' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; vertical-align: top;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Alamat</p>
                                            </td>
                                            <td style="width: 10px; text-align: center; vertical-align: top;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->person->address ?? '-' }}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td style="width: 50px;">
                            </td>
                        </tr>
                    </table>
                    <p class="text-md" style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 15px;">
                        Telah meninggal dunia pada :
                    </p>
                    <table class="w-full border-collapse" style="margin-bottom: 30px;">
                        <tr>
                            <td style="width: 50px;">
                            </td>
                            <td>
                                <div class="w-full">
                                    <table class="w-full border-collapse text-md">
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0;">Hari, Tanggal (Usia)</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0;">:</p>
                                            </td>
                                            <td>
                                                @php
                                                    \Carbon\Carbon::setLocale('id');
                                                @endphp
                                                <p style="line-height: 1.2; margin-bottom: 0;">
                                                    {{ \Carbon\Carbon::parse($certificate->record->date)->translatedFormat('l, d F Y') }}
                                                    ({{ floor(\Carbon\Carbon::parse($certificate->person->date_of_birth)->diffInYears(\Carbon\Carbon::parse($certificate->record->date))) . ' Tahun' }})
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Kecamatan</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>

                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0; ">
                                                    {{ $certificate->record->district_name }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Kota</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->record->city_name }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Provinsi</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->record->province_name }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Sebab Kematian
                                                </p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->record->cause_of_death }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Yang Menentukan</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->record->decider }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Keterangan Visum
                                                </p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->record->post_mortem_notes ?? '-' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Anak Ke</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ $certificate->record->birth_order ?? '-' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Jam</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ \Carbon\Carbon::parse($certificate->record->date)->format('H:i') }} WIB
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td style="width: 50px;">
                            </td>
                        </tr>
                    </table>
                    <p class="text-md" style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 15px;">
                        Demikian surat keterangan ini dibuat agar dapat dipergunakan seperlunya.
                    </p>
                    <table class="w-full border-collapse">
                        <tr>
                            <td style="text-align: center; width: auto">
                            </td>
                            <td style="text-align: center; width: 30%">
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <p class="text-md" style="line-height: 1; margin-bottom: 0; margin-top: 0">Beran,
                                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                                <p class="text-md" style="line-height: 1; margin-bottom: 0; margin-top: 0">Kepala Desa
                                    Beran
                                </p>
                                <br />
                                <br />
                                <br />
                                <br />
                                <p class="text-md"
                                    style="line-height: 1; margin-bottom: 0; margin-top: 0; text-transform: uppercase; text-decoration: underline;">
                                    AGUS PRIYADI S.SOS</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="width: 0;">
            </td>
        </tr>
    </table>
@endsection
