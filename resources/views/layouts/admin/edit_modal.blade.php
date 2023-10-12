<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-content">
            <div class="card-body">
              <form class="form" id="formEdit">
                @csrf
                <input type="text" class="form-control" id="id" hidden>
                  <input type="text" class="form-control" id="position" hidden>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="first-name-column">name</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="last-name-column">Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="last-name-column">Tanggal Lahir</label>
                      <input type="text" class="form-control" id="dob" name="dob">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="city-column">area</label>
                      <input type="text" class="form-control" id="area" name="area">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="country-floating">noSC</label>
                      <input type="text" class="form-control" id="noSC" name="noSC">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="company-column">noKTP</label>
                      <input type="text" class="form-control" id="noKTP" name="noKTP">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column">agency</label>
                      <input type="text" class="form-control" id="agency" name="agency">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column">namaAtasan</label>
                      <input type="text" class="form-control" id="namaAtasan" name="namaAtasan">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column">noTelpAtasan</label>
                      <input type="text" class="form-control" id="noTelpAtasan" name="noTelpAtasan">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column">Sales Active</label>
                      <input type="text" class="form-control" id="sales_active" name="sales_active">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column">Sales Order</label>
                      <input type="text" class="form-control" id="sales_order" name="sales_order">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nominalPermohonan">Nominal Permohonan</label>
                    <select class="form-select" name="nominalPermohonan" id="nominalPermohonan">
                        @foreach ($nominalOptions as $value => $label)
                            <option value="{{ $value }}" {{ $selectedNominal == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
              </form>
            </div>
          </div>
    </div>
    <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="submitBtn">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Close</span>
        </button>
      </div>
    </div>
  </div>
</div>

