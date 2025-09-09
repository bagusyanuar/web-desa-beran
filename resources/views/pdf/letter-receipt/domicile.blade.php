@extends('pdf.letter-receipt.index')

@section('content')
    <table class="w-full" style="border-collapse: collapse; margin-bottom: 5px;">
        <tr>
            <td>
                <p class="text-md font-bold">BUKTI PENGAJUAN SURAT KETERANGAN DOMISILI</p>
            </td>
        </tr>
    </table>
    <table class="w-full border-collapse" style="margin-bottom: 15px;">
        <tr>
            <td style="width: 20%;">
                <span class="text-sm" style="line-height: 0;">No. Pengajuan</span>
            </td>
            <td style="width: 10px; text-align: center">
                <span class="text-sm" style="line-height: 0;">:</span>
            </td>
            <td>
                <span class="text-sm" style="line-height: 0;">{{ $certificate->reference_number }}</span>
            </td>
        </tr>
        <tr style="height: fit-content;">
            <td style="width: 20%;">
                <span class="text-sm" style="line-height: 0;">Nama Pemohon</span>
            </td>
            <td style="width: 10px; text-align: center">
                <span class="text-sm" style="line-height: 0;">:</span>
            </td>
            <td>
                <span class="text-sm" style="line-height: 0;">{{ $certificate->applicant->name }}</span>
            </td>
        </tr>
        <tr>
            <td style="width: 20%;">
                <span class="text-sm" style="line-height: 0;">No. Whatsapp</span>
            </td>
            <td style="width: 10px; text-align: center">
                <span class="text-sm" style="line-height: 0;">:</span>
            </td>
            <td>
                <span class="text-sm" style="line-height: 0;">{{ $certificate->applicant->phone }}</span>
            </td>
        </tr>
    </table>
    <table class="w-full border-collapse">
        <tr>
            <td style="text-align: center;">
                <div>
                    <img src="{{ $qrcode }}" width="150" height="150" style="margin-bottom: 3px;">
                    <span class="text-xs" style="display: block; color: black; font-style: italic">Scan QRCode untuk
                        melakukan
                        monitoring
                        pengajuan surat.</span>
                    <span class="text-xs" style="display: block; color: black; font-style: italic">Kunjungi
                        {{ url("/surat-keterangan-domisili/{$certificate->reference_number}") }}</span>
                </div>
            </td>
        </tr>
    </table>
@endsection
