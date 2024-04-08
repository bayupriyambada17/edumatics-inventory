<div wire:ignore.self class="modal fade" id="modalForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">{{ $locationId ? "Ubah Data": "Simpan Data" }}</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <input type="hidden" wire:model.live="locationId">
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label required">Location</label>
                        <input type="text" id="nameWithTitle" class="form-control" placeholder="Location Produk"  wire:model.live="location"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" wire:click.prevent="saveForm" class="btn btn-primary">{{ $locationId ? "Ubah Data": "Simpan Data" }}</button>
            </div>
        </div>
    </div>
</div>
