@extends('pdf.letter-receipt.index')

@section('content')
    <div style="margin-bottom: 20px;">
        <table class="w-full" style="border-collapse: collapse;">
            <tr>
                <td style="text-align: center; height: fit-content;">
                    <p class="text-md font-bold" style="line-height: 0; margin-bottom: 0;">BUKTI PENGAJUAN SURAT KETERANGAN
                        DUDA</p>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <table class="w-full border-collapse">
            <tr>
                <td style="width: 60%; vertical-align: middle;">
                    <p class="text-sm font-bold" style="line-height: 1.2; margin-bottom: 3px;">A. Data Pemohon</p>
                    <div style="border: 1px solid black; border-radius: 3px; margin-bottom: 10px;">
                        <table class="w-full" style="border-collapse: collapse;">
                            <tr style="border-bottom: 1px solid black;">
                                <td
                                    style="width: 25%; height: fit-content; padding-left: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 0; margin-bottom: 0;">Nama</span>
                                </td>
                                <td style="width: 5px; height: fit-content; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 0; margin-bottom: 0;">:</span>
                                </td>
                                <td style="height: fit-content; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm"
                                        style="line-height: 0; margin-bottom: 0; text-transform: uppercase;">{{ $certificate->applicant->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 25%; height: fit-content; padding-left: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 0; margin-bottom: 0;">No. Whatsapp</span>
                                </td>
                                <td style="width: 5px; height: fit-content; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 0; margin-bottom: 0;">:</span>
                                </td>
                                <td style="height: fit-content; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm"
                                        style="line-height: 0; margin-bottom: 0;">{{ $certificate->applicant->phone }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p class="text-sm font-bold" style="line-height: 1.2; margin-bottom: 3px;">B. Data Permohonan</p>
                    <div style="border: 1px solid black; border-radius: 3px; margin-bottom: 10px;">
                        <table class="w-full" style="border-collapse: collapse;">
                            <tr style="border-bottom: 1px solid black;">
                                <td
                                    style="width: 30%; vertical-align: top; padding-left: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 1.2; margin-bottom: 0;">Tgl. Permohonan</span>
                                </td>
                                <td style="width: 5px; vertical-align: top; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 1.2; margin-bottom: 0;">:</span>
                                </td>
                                <td style="vertical-align: top; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <span class="text-sm"
                                        style="line-height: 1.2; margin-bottom: 0;">{{ \Carbon\Carbon::parse($certificate->date)->translatedFormat('d F Y') }}</span>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid black;">
                                <td
                                    style="width: 30%; vertical-align: top; padding-left: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 1.2; margin-bottom: 0;">Atas Nama</span>
                                </td>
                                <td style="width: 5px; vertical-align: top; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 1.2; margin-bottom: 0;">:</span>
                                </td>
                                <td style="vertical-align: top; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm"
                                        style="line-height: 1.2; margin-bottom: 0; text-transform: uppercase;">{{ $certificate->person->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 30%; vertical-align: top; padding-left: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 1.2; margin-bottom: 0;">No. Permohonan</span>
                                </td>
                                <td style="width: 5px; vertical-align: top; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm" style="line-height: 1.2; margin-bottom: 0;">:</span>
                                </td>
                                <td style="vertical-align: top; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">
                                    <span class="text-sm"
                                        style="line-height: 1.2; margin-bottom: 0;">{{ $certificate->reference_number }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="width: 40%; text-align: center; vertical-align: middle;">
                    <div>
                        <img src="{{ $qrcode }}" width="180" height="180">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <p class="text-xs" style="line-height: 1; margin-bottom: 1px; color: black; font-style: italic">Scan QRCode untuk
        melakukan
        monitoring
        pengajuan surat.</p>
    <p class="text-xs" style="line-height: 1; color: black; font-style: italic">atau Kunjungi
        {{ route('online-letter.widower.code', [
            'code' => $certificate->reference_number,
        ]) }}
    </p>
@endsection
