{{-- <!-- Detail Data Modal -->
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
              <!-- Add details content here -->
              <p>Name: <span id="detailName">{{ $item->name }}</span></p>
              <p>DOB:  <span id="detailDob">{{ $item->dob }}</span></p>
              <p>Area: <span id="detailArea">{{ $item->area }}</span></p>
              <p>Nomor SC: <span id="detailnoSc">{{ $item->noSC }}</span></p>
              <p>Nomor KTP: <span id="detailnoKtp">{{ $item->noKTP }}</span></p>
              <p>Agency: <span id="detailAgency">{{ $item->agency }}</span></p>
              <p>Nama Atasan: <span id="detailNamaAtasan">{{ $item->namaAtasan }}</span></p>
              <p>Nomor Telepon Atasan: <span id="detailNoTelpAtasan">{{ $item->noTelpAtasan }}</span></p>
              <p>Nominal Permohonan: <span id="detailNominalPermohonan">{{ $item->nominalPermohonan}}</span></p>
              <!-- Add more details content as needed -->
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
<!-- End Detail Data Modal --> --}}

<!-- Modal for displaying detail -->
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
          <!-- Content to display details will go here -->
          <div id="detailContent"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  