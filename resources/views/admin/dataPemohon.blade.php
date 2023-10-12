@extends('layouts.admin.head')
@section('content')
<body>
  <script src="{{asset('assets/static/js/initTheme.js')}}"></script>


  <div id="app">
    @include('layouts.admin.side_bar')
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Data Pemohon</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav
                aria-label="breadcrumb"
                class="breadcrumb-header float-start float-lg-end"
              >
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{ route('admin.dataPemohon') }}">Data</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Data Pemohon
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tabledata1" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Area</th>
                            <th>Position</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                  @include('layouts.admin.detail_modal')
                  @include('layouts.admin.edit_modal')
            </div>
          </div>
        </div>
      </section>

      @include('layouts.footer')
    </div>
  </div>
  @include('layouts.admin.script')


  <script>

    var table = $('#tabledata1').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{ route('api.data.pemohon') }}",
                        type: 'GET',
                    },
                    columns: [
                        {
                            data: 'no',
                            name: 'no',
                            className: 'text-center',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1; // Menampilkan nomor urut
                            }
                        },
                        {data: 'name',name: 'name'},
                        {data: 'tanggalPengajuan',name: 'tanggalPengajuan'},
                        {data: 'area',name: 'area'},
                        {data: 'position',name: 'position'},
                        {name: 'action',data: 'action'},
                        // {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
    </script>


    <script>
        $(document).on('click', '.open-detail-modal', function () {
        // e.preventDefault();
            var itemId = $(this).data('item');
            $.ajax({
                url: '/admin/' + itemId + '/data',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#detailModal').find('.modal-title').text('Detail Data');
                    $('#detailModal').find('#id').val(data.id);
                    $('#detailModal').find('#name').val(data.name);
                    $('#detailModal').find('#tempat_lahir').val(data.tempat_lahir);
                    $('#detailModal').find('#dob').val(data.dob);
                    $('#detailModal').find('#area').val(data.area);
                    $('#detailModal').find('#noSC').val(data.noSC);
                    $('#detailModal').find('#noKTP').val(data.noKTP);
                    $('#detailModal').find('#agency').val(data.agency);
                    $('#detailModal').find('#namaAtasan').val(data.namaAtasan);
                    $('#detailModal').find('#noTelpAtasan').val(data.noTelpAtasan);
                    $('#detailModal').find('#sales_active').val(data.sales_active);
                    $('#detailModal').find('#sales_order').val(data.sales_order);

                    var formattedNominal = 'Rp.' + new Intl.NumberFormat('id-ID').format(data.nominalPermohonan);
                    $('#detailModal').find('#nominalPermohonan').val(formattedNominal);

                    $('#detailModal').modal('show');
                },
                error: function () {
                    alert('Data tidak ditemukan');
                }
            }
            );
        });
    </script>

    <script>
        $(document).on('click', '.open-edit-modal', function () {
        // e.preventDefault();

            var itemId = $(this).data('item');
            $.ajax({
                url: '/admin/' + itemId + '/data',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#editModal').find('.modal-title').text('Edit Data');
                    $('#editModal').find('#id').val(data.id);
                    $('#editModal').find('#name').val(data.name);
                    $('#editModal').find('#position').val(data.position);
                    $('#editModal').find('#tempat_lahir').val(data.tempat_lahir);
                    $('#editModal').find('#dob').val(data.dob);
                    $('#editModal').find('#area').val(data.area);
                    $('#editModal').find('#noSC').val(data.noSC);
                    $('#editModal').find('#noKTP').val(data.noKTP);
                    $('#editModal').find('#agency').val(data.agency);
                    $('#editModal').find('#namaAtasan').val(data.namaAtasan);
                    $('#editModal').find('#noTelpAtasan').val(data.noTelpAtasan);
                    $('#editModal').find('#sales_active').val(data.sales_active);
                    $('#editModal').find('#sales_order').val(data.sales_order);
                    $('#editModal').find('#nominalPermohonan').val(data.nominalPermohonan);


                    if (data.position === 'direct_sales') {

                        var nominal = data.nominalPermohonan;
                    var selectElement = $('#editModal').find('#nominalPermohonan');
                    selectElement.empty(); // Kosongkan elemen select sebelum mengisi opsi-opsinya

                    // Generate opsi-opsi baru
                    var options = {
                        '500000': 'Rp.500.000 (500 ribu)',
                        '800000': 'Rp.800.000 (800 ribu)',
                        '1000000': 'Rp.1.000.000 (1 Juta)',
                        '1500000': 'Rp.1.500.000 (1,5 Juta)'
                    };

                    // Tambahkan opsi-opsi ke elemen select
                    for (var value in options) {
                        var option = $('<option>').val(value).text(options[value]);
                        if (value === nominal) {
                            option.attr('selected', 'selected');
                        }
                        selectElement.append(option);
                    }
                    } else {
                    // Jika peran adalah direct sales, atur opsi nominal hanya hingga 2 juta
                    var nominal = data.nominalPermohonan;
                    var selectElement = $('#editModal').find('#nominalPermohonan');
                    selectElement.empty(); // Kosongkan elemen select sebelum mengisi opsi-opsinya

                    // Generate opsi-opsi baru
                    var options = {
                        '500000': 'Rp.500.000 (500 Ribu)',
                        '800000': 'Rp.800.000 (800 Ribu)',
                        '1000000': 'Rp.1.000.000 (1 Juta)',
                        '1500000': 'Rp.1.500.000 (1,5 Juta)',
                        '2000000': 'Rp.2.000.000 (2 Juta)'
                    };

                    // Tambahkan opsi-opsi ke elemen select
                    for (var value in options) {
                        var option = $('<option>').val(value).text(options[value]);
                        if (value === nominal) {
                            option.attr('selected', 'selected');
                        }
                        selectElement.append(option);
                    }
                }

                    $('#editModal').modal('show');
                },
                error: function () {
                    alert('Data tidak ditemukan');
                }
            }
            );
        });
    </script>

    <script>
        $(document).on('click', '#submitBtn', function(e) {
            e.preventDefault();
            var itemId = $('#id').val();
            $.ajax({
                url: "{{ url('admin/') }}" + '/' + itemId,
                type: 'PUT',
                dataType: 'json',
                data: $('#formEdit').serialize(),
                success: function(data) {
                    $('#editModal').modal('show');

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data has been updated successfully',
                    });

                    setTimeout(function() {
                        window.location.href = "{{ route('admin.dataPemohon') }}";
                    }, 1500);
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Data update failed',
                    });

                    alert('Data tidak ditemukan');
                    // Tambahkan logika lain yang diperlukan untuk menangani kesalahan
                }
            });
        });
    </script>


    <script>
        // Attach a click event handler to the delete buttons
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();

            var adminId = $(this).data('admin-id');

            // Show a modal confirmation dialog using SweetAlert2
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed deletion, proceed with the AJAX request
                    $.ajax({
                        url: "{{ route('admin.destroy', ':id') }}".replace(':id', adminId),
                        type: 'POST', // Change this to POST since Laravel uses POST for delete requests
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE"
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status) {
                                // Show a success SweetAlert2 notification
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message
                                }).then(() => {
                                    // Optionally, refresh the page or update the UI as needed
                                    window.location.reload();
                                });
                            } else {
                                // Show an error SweetAlert2 notification
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
                        },
                        error: function() {
                            // Show an error SweetAlert2 notification for AJAX failure
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error occurred while deleting admin.'
                            });
                        }
                    });
                } else {
                    // User canceled the deletion
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'Deletion canceled.'
                    });
                }
            });
        });
    </script>

    <script>
        function printData() {
            var iframe = document.createElement('iframe');
            iframe.src = '/cetak'; // Sesuaikan URL dengan rute yang Anda buat
            iframe.style.display = 'none';
            document.body.appendChild(iframe);

            iframe.onload = function() {
                iframe.contentWindow.print();
                document.body.removeChild(iframe);
            };
        }
    </script>


@endsection

