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
        <form id="formEdit">
          @csrf
            <input type="text" class="form-control" id="id" hidden>
            <input type="text" class="form-control" id="role">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="dob">DOB</label>
            <input type="text" class="form-control" id="dob" name="dob">
          </div>
          <div class="form-group">
            <label for="area">Area</label>
            <input type="text" class="form-control" id="area" name="area">
          </div>
          <div class="form-group">
            <label for="area">Nomer SC</label>
            <input type="text" class="form-control" id="noSC" name="noSC">
          </div>
          <div class="form-group">
            <label for="area">Nomer KTP</label>
            <input type="text" class="form-control" id="noKTP" name="noKTP">
          </div>
          <div class="form-group">
            <label for="area">Agency</label>
            <input type="text" class="form-control" id="agency" name="agency">
          </div>
          <div class="form-group">
            <label for="area">Nama Atasan</label>
            <input type="text" class="form-control" id="namaAtasan" name="namaAtasan">
          </div>
          <div class="form-group">
            <label for="area">Nomor Telp Atasan</label>
            <input type="text" class="form-control" id="noTelpAtasan" name="noTelpAtasan">
          </div>
          {{-- <div class="form-group">
            <label for="nominalPermohonan">Nominal Permohonan</label>
            <select class="form-select" name="nominalPermohonan" id="nominalPermohonan">
                <option value="{{$item->nominalPermohonan}}"></option>
            </select>
            </div> --}}
            <div class="form-group">
            <label for="nominalPermohonan">Nominal Permohonan</label>
            <select class="form-select" name="nominalPermohonan" id="nominalPermohonan">
                @foreach ($nominalOptions as $value => $label)
                    <option value="{{ $value }}" {{ $selectedNominal == $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            </div>
        </form>

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

