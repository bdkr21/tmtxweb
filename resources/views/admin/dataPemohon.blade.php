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

      {{-- <div class="page-heading">
        <!-- Responsive tables start -->
        <section class="section">
          <div class="row" id="table-responsive">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Pemohon Pinjaman</h4>
                </div>
                <!-- table responsive -->
                <div class="table-responsive">
                  <!-- Add a button to call the JavaScript function -->
                  <table id="tableRow" class="table table-hover mb">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Area</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $counter = 1;
                      @endphp
                      @foreach ($data as $item)
                      <tr id="tableRow-{{ $item->id }}">
                        <td>{{ $counter++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->dob }}</td>
                        <td>{{ $item->area }}</td>
                        <td>
                          <a href="#" class="btn btn-info open-detail-modal" data-item="{{ $item->id }}">
                            <i class="fa fa-eye"></i> Detail
                          </a>

                          <a href="#" class="btn btn-warning open-edit-modal" data-item="{{ $item->id }}">
                            <i class="fa fa-pencil"></i> Edit
                          </a>

                          <a href="{{ route('admin.ngeprint', ['id' => $item->id]) }}" class="btn btn-success">
                            <i class="fa fa-pencil"></i> PRINT
                          </a>

                          <form action="{{ route('admin.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" data-admin-id="{{ $item->id }}">
                                Delete
                            </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @include('layouts.admin.detail_modal')
                  @include('layouts.admin.edit_modal')
              </div>
            </div>
          </div>
        </section>
      </div> --}}

      <section class="section">
        <div class="card">
          <div class="card-header">jQuery Datatable</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Area</th>
                    <th>Role</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach ($data as $item)
                    <tr id="tableRow-{{ $item->id }}">
                      <td>{{ $counter++ }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->dob }}</td>
                      <td>{{ $item->area }}</td>
                      <td>{{ $item->role }}</td>
                      <td>
                        <a href="#" class="btn btn-info open-detail-modal" data-item="{{ $item->id }}">
                          <i class="fa fa-eye"></i> Detail
                        </a>

                        <a href="#" class="btn btn-warning open-edit-modal" data-item="{{ $item->id }}">
                          <i class="fa fa-pencil"></i> Edit
                        </a>

                        <a href="{{ route('admin.ngeprint', ['id' => $item->id]) }}" class="btn btn-success">
                          <i class="fa fa-pencil"></i> PRINT
                        </a>

                        <form action="{{ route('admin.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger delete-btn" data-admin-id="{{ $item->id }}">
                              Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
                  @include('layouts.admin.detail_modal')
                  @include('layouts.admin.edit_modal')
            </div>
          </div>
        </div>
      </section>

      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>2023 &copy; Anak</p>
          </div>
          <div class="float-end">
            {{-- <p>
              Crafted with
              <span class="text-danger"
                ><i class="bi bi-heart-fill icon-mid"></i
              ></span>
              by <a href="https://saugi.me">Saugi</a>
            </p> --}}
          </div>
        </div>
      </footer>
    </div>
  </div>
  @include('layouts.admin.script')
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
                $('#detailModal').find('#dob').val(data.dob);
                $('#detailModal').find('#area').val(data.area);
                $('#detailModal').find('#noSC').val(data.noSC);
                $('#detailModal').find('#noKTP').val(data.noKTP);
                $('#detailModal').find('#agency').val(data.agency);
                $('#detailModal').find('#namaAtasan').val(data.namaAtasan);
                $('#detailModal').find('#noTelpAtasan').val(data.noTelpAtasan);

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
                $('#editModal').find('#role').val(data.role);
                $('#editModal').find('#dob').val(data.dob);
                $('#editModal').find('#area').val(data.area);
                $('#editModal').find('#noSC').val(data.noSC);
                $('#editModal').find('#noKTP').val(data.noKTP);
                $('#editModal').find('#agency').val(data.agency);
                $('#editModal').find('#namaAtasan').val(data.namaAtasan);
                $('#editModal').find('#noTelpAtasan').val(data.noTelpAtasan);
                $('#editModal').find('#nominalPermohonan').val(data.nominalPermohonan);


                if (data.role === 'direct_sales') {

                    var nominal = data.nominalPermohonan;
                var selectElement = $('#editModal').find('#nominalPermohonan');
                selectElement.empty(); // Kosongkan elemen select sebelum mengisi opsi-opsinya

                // Generate opsi-opsi baru
                var options = {
                    '800000': '800 ribu',
                    '1000000': '1 juta',
                    '1500000': '1,5 juta'
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
                    '800000': '800 ribu',
                    '1000000': '1 juta',
                    '1500000': '1,5 juta',
                    '2000000': '2 juta'
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

                    toastr.success('Data has been updated successfully', 'Success');

                    setTimeout(function() {
                                            window.location.href =
                                                "{{ route('admin.dataPemohon') }}";
                                        }, 1500);
                },
                error: function (data) {
                    toastr.error('Data update failed', 'Error');

                    alert('Data tidak ditemukan');
                    // Tambahkan logika lain yang diperlukan untuk menangani kesalahan
                }
            });
        });

        // Attach a click event handler to the delete buttons
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();

            var adminId = $(this).data('admin-id');

            // Show a modal confirmation dialog
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
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
                            // Show a success Toastr notification
                            toastr.success(response.message, 'Success');

                            // Optionally, refresh the page or update the UI as needed
                            window.location.reload();
                        } else {
                            // Show an error Toastr notification
                            toastr.error(response.message, 'Error');
                        }
                    },
                    error: function() {
                        // Show an error Toastr notification for AJAX failure
                        toastr.error('Error occurred while deleting admin.', 'Error');
                    }
                });
            } else {
                // User canceled the deletion
                toastr.warning('Deletion canceled.', 'Warning');
            }
        });


</script>

@endsection

