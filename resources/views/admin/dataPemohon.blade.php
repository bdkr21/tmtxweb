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
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
      </div>

      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>2023 &copy; Mazer</p>
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
                $('#detailModal').find('.modal-title').text('Edit Data ' + data.id);
                $('#detailModal').find('#id').val(data.id);
                $('#detailModal').find('#name').val(data.name);
                $('#detailModal').find('#dob').val(data.dob);
                $('#detailModal').find('#area').val(data.area);
                $('#detailModal').find('#noSC').val(data.noSC);
                $('#detailModal').find('#noKTP').val(data.noKTP);
                $('#detailModal').find('#agency').val(data.agency);
                $('#detailModal').find('#namaAtasan').val(data.namaAtasan);
                $('#detailModal').find('#noTelpAtasan').val(data.noTelpAtasan);
                $('#detailModal').find('#nominalPermohonan').val(data.nominalPermohonan);

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
                $('#editModal').find('.modal-title').text('Edit Data ' + data.id);
                $('#editModal').find('#id').val(data.id);
                $('#editModal').find('#name').val(data.name);
                $('#editModal').find('#dob').val(data.dob);
                $('#editModal').find('#area').val(data.area);
                $('#editModal').find('#noSC').val(data.noSC);
                $('#editModal').find('#noKTP').val(data.noKTP);
                $('#editModal').find('#agency').val(data.agency);
                $('#editModal').find('#namaAtasan').val(data.namaAtasan);
                $('#editModal').find('#noTelpAtasan').val(data.noTelpAtasan);
                $('#editModal').find('#nominalPermohonan').val(data.nominalPermohonan);

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
              setTimeout(function() {
                                      window.location.href =
                                          "{{ route('admin.dataPemohon') }}";
                                  }, 500);
          },
          error: function (data) {
              alert('Data tidak ditemukan');
              // Tambahkan logika lain yang diperlukan untuk menangani kesalahan
          }
      });
  });

</script>

@endsection
  
