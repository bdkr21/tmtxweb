<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>Document</title>
</head>
<body>
    <img src="data:image/png;base64,{{ $data->signature }}" alt="Gambar">
    <div>
        <div class="container">
            <h1>KOPERASI KARYAWAN</h1>
        </div>
    </div>
    <div class="mb-3">
        <table>
            <tr>
                <td style="width: 30%">Nama</td>
                <td>: {{$data->name}}</td>
            </tr>
        </table>
    </div>
    <div class="mb-3">
    <table>
            <tr>
                <td style="width: 30%">Tempat/Tanggal Lahir</td>
                <td>: {{ $data->dob}}</td>
            </tr>
    </table>
    </div>
    <div class="mb-3">
        <table>
            <tr>
                <td style="width: 30%">Area</td>
                <td>:</td>
            </tr>
        </table>
    </div>
    <div class="mb-3">
        <table>
            <tr>
                <td style="width: 30%">No SC</td>
                <td>:</td>
            </tr>
        </table>
    </div>
    <div class="mb-3">
        <table>
            <tr>
                <td style="width: 30%">No KTP</td>
                <td>:</td>
            </tr>
        </table>
    </div>
    <div class="mb-3">
        <table>
            <tr>
                <td style="width: 30%; vertical-align: top;">Agency</td>
                <td style="vertical-align: top;">:</td>
            </tr>
        </table>
    </div>
    <div class="mb-3">
        <table>
            <tr>
                <td style="width: 30%">Nama Atasan</td>
                <td>:</td>
            </tr>
        </table>
    </div>
    <div class="mb-3">
        <table>
            <tr>
                <td style="width: 30%">No Telp Atasan</td>
                <td>:</td>
            </tr>
        </table>
    </div>
</body>
</html>
