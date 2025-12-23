<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 150px 70px 20px 70px;
            /* Atur margin atas untuk area header */
        }

        /* header {
            position: fixed;
            top: -100px;
            left: 0;
            right: 0;
            height: 70px;
            background-color: #f5f5f5;
            line-height: 70px;
            border-bottom: 1px solid #ccc;
        } */

        #header {
            height: 100px;
            width: 100%;
            position: fixed;
            top: -100px;
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

        .uppercase {
            text-transform: uppercase;
        }

        .space-x-0 {
            margin-top: 0;
            margin-bottom: 0;
        }

        .line-press {
            line-height: 1;
        }

        .line-normal {
            line-height: 1.2;
        }

        .line-half {
            line-height: 1.5;
        }

        .line-double {
            line-height: 2;
        }
    </style>
</head>

<body>
    <div id="header">
        <table style="border-collapse: collapse; width: 100%">
            <tr>
                <td style="vertical-align: middle; height: 90px; width: 100%">
                    <div style="width: 100%;">
                        <img src="{{ asset('static/images/institution-logo.png') }}" alt="Image"
                            style="height: 70px; position: absolute; left: 0; top: 37%; transform: translateY(-50%);" />
                        <p class="text-lg font-bold text-center mb-0" style="line-height: 0.25;">
                            PEMERINTAH KABUPATEN NGAWI</p>
                        <p class="text-md text-center mb-0" style="line-height: 0.25;">KECAMATAN NGAWI</p>
                        <p class="text-md text-center mb-0" style="line-height: 0.25;">DESA BERAN</p>
                        <p class="text-sm text-center mb-0" style="line-height: 0.25;">JL.A.YANI NO. 05 Telp. (0351)
                            749715 NGAWI KODE POS ( 63216 )</p>

                    </div>
                </td>
            </tr>
        </table>

    </div>
    <hr style="border: none; border-top: 1px solid black; margin: 3px 0 3px 0; padding: 0;" />
    <hr style="border: none; border-top: 2px solid black; margin: 0 0 3px 0; padding: 0;" />
    @yield('content')
    @php
        $host = request()->getSchemeAndHttpHost();
    @endphp
    <script type="text/php">
        if (isset($pdf)) {
            $font = $fontMetrics->getFont("Arial", "normal"); // Or any other desired font
            $size = 8; // Font size
            date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'Indonesian_indonesia');
            $timestamp = date("H:i:s");
            $date = strftime("%A, %d %B %Y");
            {{-- $text = "Page {PAGE_NUM}/{PAGE_COUNT} | Desa Beran | $date | $timestamp | {{ $host }}"; // Placeholder for page number and total count --}}
            $text = "Desa Beran . $date . $timestamp . {{ $host }}"; // Placeholder for page number and total count

            // Calculate position (example: bottom center)
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = 35; // Posisi dari kiri
            $y = $pdf->get_height() - 35;

            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script>
</body>

</html>
