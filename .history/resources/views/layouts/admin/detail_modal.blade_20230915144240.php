<!-- Detail Data Modal -->
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
              <p>Area: <span id="detailArea">{{ $item->noSC }}</span></p>
              <p>Area: <span id="detailArea">{{ $item->noKTP }}</span></p>
              <p>Area: <span id="detailArea">{{ $item->agency }}</span></p>
              <p>Area: <span id="detailArea">{{ $item->namaAtasan }}</span></p>
              <p>Area: <span id="detailArea">{{ $item->noTelpAtasan }}</span></p>
              <p>Area: <span id="detailArea">{{ $item->nominalPermohonan}}</span></p>
              <!-- Add more details content as needed -->
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
<!-- End Detail Data Modal -->
