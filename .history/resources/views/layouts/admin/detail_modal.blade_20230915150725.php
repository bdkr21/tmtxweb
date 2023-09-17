<!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detailData"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
            </div>
            <div class="form-group">
              <label for="dob">DOB</label>
              <input type="text" class="form-control" id="dob" name="dob" value="{{ $item->dob }}">
            </div>
            <div class="form-group">
              <label for="area">Area</label>
              <input type="text" class="form-control" id="area" name="area" value="{{ $item->area }}">
            </div>
            <div class="form-group">
              <label for="area">Nomer SC</label>
              <input type="text" class="form-control" id="noSC" name="noSC" value="{{ $item->noSC }}">
            </div>
            <div class="form-group">
              <label for="area">Nomer KTP</label>
              <input type="text" class="form-control" id="noKTP" name="noKTP" value="{{ $item->noKTP }}">
            </div>
            <div class="form-group">
              <label for="area">Agency</label>
              <input type="text" class="form-control" id="agency" name="agency" value="{{ $item->agency }}">
            </div>
            <div class="form-group">
              <label for="area">Nama Atasan</label>
              <input type="text" class="form-control" id="namaAtasan" name="namaAtasan" value="{{ $item->namaAtasan }}">
            </div>
            <div class="form-group">
              <label for="area">Nomor Telp Atasan</label>
              <input type="text" class="form-control" id="noTelpAtasan" name="noTelpAtasan" value="{{ $item->noTelpAtasan }}">
            </div>
            <div class="form-group">
              <label for="nominalPermohonan">Nominal Permohonan</label>
              <select class="form-select" name="nominalPermohonan" id="nominalPermohonan" value="{{ $item->nominalPermohonan}}">
                  @foreach ($nominalOptions as $value => $label)
                      <option value="{{ $value }}" {{ $item->nominalPermohonan == $value ? 'selected' : '' }}>{{ $label }}</option>
                  @endforeach
              </select>
            </div>                                        
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Edit Modal -->