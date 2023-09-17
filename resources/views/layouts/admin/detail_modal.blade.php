

    <!-- Edit Modal -->
    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel{{ $item->id }}">detail Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" readonly>
            </div>
            <div class="form-group">
              <label for="dob">DOB</label>
              <input type="text" class="form-control" id="dob" name="dob" value="{{ $item->dob }}" readonly>
            </div>
            <div class="form-group">
              <label for="area">Area</label>
              <input type="text" class="form-control" id="area" name="area" value="{{ $item->area }}" readonly>
            </div>
            <div class="form-group">
              <label for="area">Nomer SC</label>
              <input type="text" class="form-control" id="noSC" name="noSC" value="{{ $item->noSC }}" readonly>
            </div>
            <div class="form-group">
              <label for="area">Nomer KTP</label>
              <input type="text" class="form-control" id="noKTP" name="noKTP" value="{{ $item->noKTP }}" readonly>
            </div>
            <div class="form-group">
              <label for="area">Agency</label>
              <input type="text" class="form-control" id="agency" name="agency" value="{{ $item->agency }}" readonly>
            </div>
            <div class="form-group">
              <label for="area">Nama Atasan</label>
              <input type="text" class="form-control" id="namaAtasan" name="namaAtasan" value="{{ $item->namaAtasan }}" readonly>
            </div>
            <div class="form-group">
              <label for="area">Nomor Telp Atasan</label>
              <input type="text" class="form-control" id="noTelpAtasan" name="noTelpAtasan" value="{{ $item->noTelpAtasan }}" readonly>
            </div>
            <div class="form-group">
              <label for="area">Nominal Permohonan</label>
              <input type="text" class="form-control" id="noTelpAtasan" name="noTelpAtasan" value="{{ $item->nominalPermohonan}}" readonly>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Edit Modal -->