@extends('layouts.admin.head')
  <body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
      @include('layouts.admin.side_bar')
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>

        {{-- <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Table</h3>
                <p class="text-subtitle text-muted">
                  Who does not love tables?
                </p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Table
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div> --}}
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
                      <table class="table mb-0">
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
                          <tr data-toggle="modal" data-target="#detailModal" data-item-id="{{ $item->id }}">
                            <td>{{ $counter++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->area }}</td>
                            <td>
                              <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $item->id }}">Edit</a>
                              <form action="{{ route('admin.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @include('layouts.admin.detail_modal')
                          @include('layouts.admin.edit_modal')
                          @endforeach
                        </tbody>
                      </table>
                    </div>                    
                  </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      $(document).ready(function() {
          // Add a click event listener to the "Edit" buttons
          $('.edit-button').click(function(e) {
              e.preventDefault(); // Prevent the default behavior (modal from opening)
              var itemId = $(this).data('target').replace('#editModal', ''); // Extract the item ID
              // Use the itemId to perform your edit action or open the edit modal manually
              console.log('Edit button clicked for item ID: ' + itemId);
          });
  
          // Add a click event listener to the "Delete" buttons
          $('.delete-button').click(function() {
              var itemId = $(this).data('item-id'); // Get the item ID
              // Use the itemId to perform your delete action or open a confirmation modal
              console.log('Delete button clicked for item ID: ' + itemId);
          });
      });
   </script>

    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="assets/compiled/js/app.js"></script>
  </body>
</html>
