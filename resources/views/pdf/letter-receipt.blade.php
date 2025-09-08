<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 110px 50px;
            /* Atur margin atas untuk area header */
        }

        header {
            position: fixed;
            top: -70px;
            /* Tempatkan di atas area konten */
            left: 0;
            right: 0;
            height: 70px;
            background-color: #f5f5f5;
            line-height: 70px;
            border-bottom: 1px solid #ccc;
        }

        #header {
            height: 80px;
            width: 100%;
            position: fixed;
            top: -80px;
            left: 0;
            /* background-color: #f5f5f5; */
            /* border-bottom: 1px solid #ccc; */
        }

        body {
            font-family: Helvetica, sans-serif;
        }

        .text-lg {
            font-size: 16px;
        }

        .text-md {
            font-size: 14px;
        }

        .text-sm {
            font-size: 12px;
        }

        .text-xs {
            font-size: 10px;
        }

        .font-bold {
            font-weight: bold;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .text-center {
            text-align: center;
        }

        .w-full {
            width: 100%;
        }

        .border-collapse {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div id="header">
        <table style="border-collapse: collapse; width: 100%">
            <tr>
                <td style="vertical-align: middle; height: 80px; width: 100%">
                    <div style="width: 100%;">
                        <img src="{{ asset('static/images/institution-logo.png') }}" alt="Image"
                            style="height: 60px; position: absolute; left: 0; top: 50%; transform: translateY(-50%);" />
                        <p class="text-md font-bold text-center mb-0" style="line-height: 0.5;">
                            PEMERINTAH KABUPATEN NGAWI</p>
                        <p class="text-sm text-center mb-0" style="line-height: 0.5;">KECAMATAN NGAWI</p>
                        <p class="text-sm text-center mb-0" style="line-height: 0.5;">DESA BERAN</p>
                        <p class="text-xs text-center mb-0" style="line-height: 0.5;">JL.A.YANI NO. 05 Telp. (0351)
                            749715 NGAWI KODE POS ( 63216 )</p>

                    </div>
                </td>
            </tr>
        </table>

    </div>
    <hr style="border: none; border-top: 1px solid black; margin: 3px 0 3px 0; padding: 0;" />
    <hr style="border: none; border-top: 2px solid black; margin: 0 0 3px 0; padding: 0;" />
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
                <span class="text-sm" style="line-height: 0;">SKD/20250907154003</span>
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
                <span class="text-sm" style="line-height: 0;">Bagus Yanuar</span>
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
                <span class="text-sm" style="line-height: 0;">628817881290</span>
            </td>
        </tr>
    </table>
    <table class="w-full border-collapse">
        <tr>
            <td style="text-align: center;">
                <div>
                    <img src="data:image/png;base64, {!! $qrcode !!}" width="150" height="150" style="margin-bottom: 3px;">
                    <span class="text-xs" style="display: block; color: black; font-style: italic">Scan QRCode untuk
                        melakukan
                        monitoring
                        pengajuan surat.</span>
                    <span class="text-xs" style="display: block; color: black; font-style: italic">Kunjungi
                        {{ url('/surat-keterangan-domisili/SKD/20250907154003') }}</span>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
