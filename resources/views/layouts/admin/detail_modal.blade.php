<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel{{ $item->id }}">detail Data {{$item->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" disabled>
            </div>
            <div class="form-group">
              <label for="dob">DOB</label>
              <input type="text" class="form-control" id="dob" name="dob" disabled>
            </div>
            <div class="form-group">
              <label for="area">Area</label>
              <input type="text" class="form-control" id="area" name="area" disabled>
            </div>
            <div class="form-group">
              <label for="noSC">Nomer SC</label>
              <input type="text" class="form-control" id="noSC" name="noSC" disabled>
            </div>
            <div class="form-group">
              <label for="noKTP">Nomer KTP</label>
              <input type="text" class="form-control" id="noKTP" name="noKTP" disabled>
            </div>
            <div class="form-group">
              <label for="agency">Agency</label>
              <input type="text" class="form-control" id="agency" name="agency" disabled>
            </div>
            <div class="form-group">
              <label for="namaAtasan">Nama Atasan</label>
              <input type="text" class="form-control" id="namaAtasan" name="namaAtasan" disabled>
            </div>
            <div class="form-group">
              <label for="noTelpAtasan">Nomor Telp Atasan</label>
              <input type="text" class="form-control" id="noTelpAtasan" name="noTelpAtasan" disabled>
            </div>
            <div class="form-group">
              <label for="Nominal Permohonan">Nominal Permohonan</label>
              <input type="text" class="form-control" id="Nominal Permohonan" name="Nominal Permohonan" disabled>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Detail Modal -->