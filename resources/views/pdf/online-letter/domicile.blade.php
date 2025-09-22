@extends('pdf.online-letter.index')

@section('content')
    <p class="text-lg font-bold line-press"
        style="margin-bottom: 0; margin-top: 25px; text-align: center; text-decoration: underline">SURAT
        KETERANGAN DOMISILI</p>
    <p class="text-md font-bold line-press" style="margin-top: 3px; margin-bottom: 15px; text-align: center;">Nomor : 400.12.5
        /<span style="margin-left: 25px; margin-right: 25px;"> </span>/ 404.601.09
        / {{ \Carbon\Carbon::now()->format('Y') }}</p>
    <table class="w-full border-collapse">
        <tr>
            <td style="width: 0;">
            </td>
            <td>
                <!-- online letter body -->
                <div class="w-full">
                    <p class="text-md line-half" style="text-indent: 50px; text-align: justify; margin-bottom: 15px;">
                        Yang bertanda
                        tangan di bawah ini kami Kepala Desa Beran
                        Kecamatan Ngawi Kabupaten Ngawi menerangkan dengan sebenarnya bahwa :
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
                    <p class="text-md line-half" style="text-indent: 50px; text-align: justify; margin-bottom: 30px;">
                        Menerangkan
                        dengan sesungguhnya bahwa yang tersebut di atas benar - benar masih berdomisili di
                        <span class="uppercase font-bold">{{ $certificate->person->address }}</span>. Surat keterangan ini
                        diberikan
                        guna <span class="uppercase font-bold">{{ $certificate->purpose }}</span>.
                    </p>
                    <p class="text-md" style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 30px;">
                        Demikian surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.
                    </p>
                    <table class="w-full border-collapse">
                        <tr>
                            <td style="text-align: center">
                                <p class="text-md" style="line-height: 1; margin-bottom: 0; margin-top: 0">Tanda Tangan</p>
                                <p class="text-md" style="line-height: 1; margin-bottom: 0; margin-top: 0">Yang Bersangkutan
                                </p>
                                <br />
                                <br />
                                <br />
                                <br />
                                <p class="text-md"
                                    style="line-height: 1; margin-bottom: 0; margin-top: 0; text-transform: uppercase; text-decoration: underline;">
                                    {{ $certificate->person->name }}</p>
                            </td>
                            <td style="text-align: center">
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <p class="text-md" style="line-height: 1; margin-bottom: 0; margin-top: 0">Beran,
                                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                                <p class="text-md" style="line-height: 1; margin-bottom: 0; margin-top: 0">Kepala Desa Beran
                                </p>
                                <br />
                                <br />
                                <br />
                                <br />
                                <p class="text-md"
                                    style="line-height: 1; margin-bottom: 0; margin-top: 0; text-transform: uppercase; text-decoration: underline;">
                                    {{ App\Commons\Const\App::SIGNATURE_NAME }}</p>
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
