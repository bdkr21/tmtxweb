
<!DOCTYPE html>
<html>

<head>
    <script>
        // Inisialisasi nilai awal
        var pencairanTahap1Formatted = "Rp 0 ";
        var pencairanTahap2Formatted = "Rp 0";
        var totalDiterimaFormatted = "Rp 0";

        // Fungsi untuk mengatur nilai default pilihan nominal permohonan
        function setDefaultNominal() {
            document.getElementById("nominalPermohonan").value = ""; // Kosong
        }

        // Fungsi untuk menghitung dan menampilkan hasil saat memilih pilihan nominal
        function calculateResult() {
            var selectedNominal = document.getElementById("nominalPermohonan").value;
            var pencairanTahap1 = 0;
            var pencairanTahap2 = 0;
            var totalDiterima = 0;
            var biayaAdministrasi1 = 25000;
            var biayaAdministrasi2 = 25000;

            if (selectedNominal == "800000") {
                pencairanTahap1 = 800000 - biayaAdministrasi1;
                totalDiterima = selectedNominal - biayaAdministrasi1;
            } else if (selectedNominal == "1000000") {
                pencairanTahap1 = (1000000 - 500000 - biayaAdministrasi1);
                pencairanTahap2 = pencairanTahap1;
                totalDiterima = selectedNominal - biayaAdministrasi1 - biayaAdministrasi2;
            } else if (selectedNominal == "1500000") {
                pencairanTahap1 = (800000 - biayaAdministrasi1);
                pencairanTahap2 = (700000 - biayaAdministrasi1);
                totalDiterima = selectedNominal - biayaAdministrasi1 - biayaAdministrasi2;
            } else if (selectedNominal == "2000000") {
                pencairanTahap1 = (1000000 - biayaAdministrasi1);
                pencairanTahap2 = (1000000 - biayaAdministrasi1);
                totalDiterima = selectedNominal - biayaAdministrasi1 - biayaAdministrasi2;
            }

            // Format angka dengan pemisah ribuan (contoh: 1.000.000)
            pencairanTahap1Formatted = "Rp." + pencairanTahap1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "";
            pencairanTahap2Formatted = "Rp." + pencairanTahap2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "";
            totalDiterimaFormatted = "Rp." + totalDiterima.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "";

            // Update nilai-nilai di dalam formulir
            document.getElementById("pencairanTahap1").value = pencairanTahap1Formatted;
            document.getElementById("pencairanTahap2").value = pencairanTahap2Formatted;
            document.getElementById("totalDiterima").value = totalDiterimaFormatted;
        }

        setDefaultNominal();
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>KOPERASI KARYAWAN</title>
</head>

<style>
    body {
        background-color: #f0f0f0;
    }
</style>

<body>
    <center>
        <h2>FORM PEMINJAMAN</h2>
    </center>

    <div class="container">
        <form method="post" enctype="multipart/form-data" action="{{ route('form.store') }}">
            @csrf
            <input type="hidden" name="role" value="{{ request('role') }}">
            <div class="form-group">
                <label for="LaberName">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group">
                <label for="laberDOB">Tempat/Tanggal Lahir</label>
                <input type="text" class="form-control" name="dob" placeholder="Masukkan Tempat/Tanggal Lahir" required>
            </div>
            <div class="form-group">
                <label for="laberArea">Area</label>
                <input type="text" class="form-control" name="area" placeholder="Masukkan Area" required>
            </div>
            <div class="form-group">
                <label for="LaberNoSC">No SC</label>
                <input type="text" class="form-control" name="noSC" placeholder="Masukkan No SC" required>
            </div>
            <div class="form-group">
                <label for="labelKTP">No KTP</label>
                <input type="text" class="form-control" name="noKTP" placeholder="Masukkan No KTP" required>
            </div>
            <div class="form-group">
                <label for="labelAgency">Agency</label>
                <input type="text" class="form-control" name="agency" placeholder="Masukkan Agency" required>
            </div>
            <div class="form-group">
                <label for="labelNamaAtasan">Nama Atasan</label>
                <input type="text" class="form-control" name="namaAtasan" placeholder="Masukkan Nama Atasan" required>
            </div>
            <div class="form-group">
                <label for="labelNoTelpAtasan">No Telp Atasan</label>
                <input type="text" class="form-control" name="noTelpAtasan" placeholder="Masukkan No Telp Atasan" required>
            </div>

            <h4>Dengan ini mengajukan peminjaman Kepada Koperasi Sebagai Berikut</h4>

            <div class="form-group">
                <label for="labelNominalPermohonan">Nominal Permohonan</label>
                <select class="form-control" name="nominalPermohonan" id="nominalPermohonan" onchange="calculateResult()">
                    <option value="" selected readonly>Pilih Nominal</option> <!-- Nilai awal kosong -->
                    @foreach ($nominalOptions as $value => $label)
                        <option value="{{ $value }}" {{ $selectedNominal == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="labelPencairanTahap1">Pencairan Tahap 1</label>
                <input type="text" class="form-control" name="pencairanTahap1" id="pencairanTahap1" value="<?php echo $pencairanTahap1Formatted; ?>" readonly>
                <small id="pencairanTahap1Help" class="form-text text-muted text-danger">Biaya Administrasi Sebesar Rp.25.000</small>
            </div>
            <div class="form-group">
                <label for="labelPencairanTahap2">Pencairan Tahap 2</label>
                <input type="text" class="form-control" name="pencairanTahap2" id="pencairanTahap2" value="<?php echo $pencairanTahap2Formatted; ?>" readonly>
                <small id="pencairanTahap2Help" class="form-text text-muted text-danger">Biaya Administrasi Sebesar Rp.25.000</small>
            </div>
            <div class="form-group">
                <label for="labelTotalDiterima">Total Diterima</label>
                <input type="text" class="form-control" name="totalDiterima" id="totalDiterima" value="<?php echo $totalDiterimaFormatted; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="labelGambar">Gambar Tanda tangan pemohon</label>
                <input type="file" name="file" id="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="{{ url('form') }}">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</body>

</html>
