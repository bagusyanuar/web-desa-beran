@extends('pdf.online-letter.index')

@section('content')
    <p class="text-lg font-bold"
        style="line-height: 0.5; margin-bottom: 0; margin-top: 25px; text-align: center; text-decoration: underline">SURAT
        KETERANGAN KELAHIRAN</p>
    <p class="text-md font-bold" style="line-height: 0.3; margin-bottom: 30px; text-align: center;">Nomor : 477 / / 404.601.09
        / 2025</p>
    <table class="w-full border-collapse">
        <tr>
            <td style="width: 0;">
            </td>
            <td>
                <!-- online letter body -->
                <div class="w-full">
                    <p class="text-md" style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 5px;">
                        Yang bertanda tangan di bawah ini menerangkan bahwa telah lahir seorang bayi :
                    </p>
                    <table class="w-full border-collapse" style="margin-bottom: 15px;">
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
                                                    {{ $certificate->infant->name }}</p>
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
                                                    {{ $certificate->infant->birth_place . ', ' . \Carbon\Carbon::parse($certificate->infant->date_of_birth)->translatedFormat('d F Y') }}
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
                                                    {{ App\Commons\Libs\Helper\Converter::genderToDisplay($certificate->infant->gender) }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">Jenis
                                                    Kelahiran
                                                </p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ App\Commons\Libs\Helper\Converter::birthTypeToDisplay($certificate->infant->birth_type) }}
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
                                                    {{ $certificate->infant->birth_order }}
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
                    <p class="text-md" style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 5px;">
                        Adalah anak kandung dari seorang ayah :
                    </p>
                    <table class="w-full border-collapse" style="margin-bottom: 15px;">
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
                                                    {{ $certificate->father->name }}</p>
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
                                                    {{ $certificate->father->birth_place . ', ' . \Carbon\Carbon::parse($certificate->father->date_of_birth)->translatedFormat('d F Y') }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    Kewarganegaraan</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ App\Commons\Libs\Helper\Converter::citizenshipToDisplay($certificate->father->citizenship) }}
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
                                                    {{ ucfirst($certificate->father->religion) }}
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
                                                    {{ $certificate->father->job ?? '-' }}
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
                                                    {{ $certificate->father->address ?? '-' }}
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
                    <p class="text-md" style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 5px;">
                        Dengan seorang ibu :
                    </p>
                    <table class="w-full border-collapse" style="margin-bottom: 15px;">
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
                                                    {{ $certificate->mother->name }}</p>
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
                                                    {{ $certificate->mother->birth_place . ', ' . \Carbon\Carbon::parse($certificate->mother->date_of_birth)->translatedFormat('d F Y') }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    Kewarganegaraan</p>
                                            </td>
                                            <td style="width: 10px; text-align: center;">
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">:</p>
                                            </td>
                                            <td>
                                                <p style="line-height: 1.2; margin-bottom: 0; margin-top: 0;">
                                                    {{ App\Commons\Libs\Helper\Converter::citizenshipToDisplay($certificate->mother->citizenship) }}
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
                                                    {{ ucfirst($certificate->mother->religion) }}
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
                                                    {{ $certificate->mother->job ?? '-' }}
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
                                                    {{ $certificate->mother->address ?? '-' }}
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
                    <p class="text-md"
                        style="text-indent: 50px; line-height: 2; text-align: justify; margin-bottom: 15px;">
                        Demikian surat keterangan ini dibuat untuk menjadikan periksa, dan dipergunakan sebagaimana
                        mestinya.
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
