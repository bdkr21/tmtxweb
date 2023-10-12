<html>

<style>

    .dotted-underline {
        border-bottom: 1px dashed #000;
        text-decoration: none;
        display: inline-block;
    }
body {
    font-family: 'Arimo', sans-serif;
    font-size: 10.5px;
    height: 100%;
}
ul.info-list {
    list-style-type: none;
    margin-left: -3px;
}
ul.info-list2 {
    list-style-type: none;
    margin-left: -3px;
  }
  ul.info-list li b {
    margin-top: 7px;
    font-weight: lighter;
    position: relative;
    display: inline-block;
    min-width: 144px;
    margin-right: 1px;
    margin-bottom: -2.5px;
  }
  ul.info-list li b:after {
      content: ":";
      position: absolute;
      right: 5px;
    }
    ul.info-list2 li b {
      margin-top: 7px;
      font-weight: lighter;
      position: relative;
      display: inline-block;
      min-width: 144px;
      margin-right: 1px;
      margin-bottom: -2.5px;
    }
    ul.info-list2 li b:after {
        content: ":";
        position: absolute;
        right: 5px;
      }

.page{
    width: 210mm;
    height: 297mm;
  }

  hr {
    background-color:white;
    margin:0 0 15px 0;
    max-width:800px;
    border-width:0;
  }

  hr.s9 {
    height:2px;
    border-top:1px solid black;
    border-bottom:1px solid black;
    margin-left: 25px;
    width: 630px;
  }

</style>
            <center>
            <div class="container d-flex">
                    <p style="font-size: 28px; font-weight: bold;">KOPERASI KARYAWAN</p>
                    <p>Dari Karyawan &lt;&gt; Oleh Karyawan &lt;&gt; Untuk Karyawan</p>
                    <hr class="s9">
                    <h2 style="margin-right: 240px;"><b>FORM PEMINJAMAN</b></h2>
            </div>
            </center>
        <div style="margin-left: 35px">
            Yang bertandatangan dibawah ini :
        </div>
        <br>
        <ul class="info-list">
            <li><b>Nama</b>{{ $data->name }}</span></li>
            <li><b>Tempat/Tanggal Lahir</b>{{ $data->tempat_lahir }} {{ $data->dob }}</li>
            <li><b>Area</b>{{ $data->area }}</li>
            <li><b>No SC</b>{{ $data->noSC }}</li>
            <li><b>No KTP</b>{{ $data->noKTP }}</li>
            <li><b>Agency</b>{{ $data->agency }}</li>
            <br>
            <li><b>Nama Atasan</b>{{ $data->namaAtasan }}</li>
            <li><b>No Telp Atasan</b>{{ $data->noTelpAtasan }}</li>
        </ul>
        <div style="margin-left: 35px">
            Dengan ini mengajukan peminjaman Kepada Koperasi Sebagai Berikut :
        </div>
            <ul class="info-list2">
                <li><b>Nominal Permohonan</b>{{ $formatNompel }}</li>
                <li><b>Pencairan Tahap 1</b>{{ $data->pencairanTahap1 }}</li>
                <li><b>Biaya Administrasi</b>Rp. 25.000,-</li>
                <li><b>Pencairan Tahap 2</b>{{ $data->pencairanTahap2 }}</li>
                <li><b>Biaya Administrasi</b>Rp. 25.000,-</li>
                <li><b>Total Diterima</b>{{ $data->totalDiterima }}</li>
            </ul>
            <div style="margin-left: 35px;">
                Pinjaman akan didebet di rekening yang terdaftar diagency untuk penggajian<br>
                bulan berjalan
            </div>
            <p style="text-align: center; margin-right: -275px">{{$data->area}}, {{$data->tanggalPengajuan}}</p>
            <p style="text-align: center; margin-right: -275px; margin-top: 5px">Pemohon</p>
            <p style="text-align: center; margin-right: -355px; margin-top: 20px"><img  style="width: 230px" src="{{ $dataUrl }}" alt="Signature"></p>
            <p style="text-align: center; margin-right: -275px; margin-top: 20px">( {{$data->name}} )</p>
            <p style="margin-left: 75px; font-weight: bold;">*<i>Jika Transfer diluar bank mandiri akan kena charge Rp. 6500,- / sesuai peraturan perbankan</i></p>
            <div style="margin-left: 75px; margin-bottom: 40px;">
                Menyetujui permohonan Pinjaman sebagaimana Tersebut diatas :
                <p>1. Verifikasi Performance : {{$salesInput}}</p>
                <p>2. Nominal yang disetujui :</p>
            </div>

