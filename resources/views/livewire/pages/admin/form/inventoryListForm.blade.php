<div wire:ignore.self class="modal fade" id="modalForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">{{ $inventoryId ? 'Ubah Data' : 'Simpan Data' }}</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <input type="hidden" wire:model.live="inventoryId">
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Produk</label>
                            <select class="form-select" id="exampleFormControlSelect1" wire:model.live="product_id"
                                aria-label="Default select example">
                                <option selected="">-- Pilih Produk --</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_product }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Tipe Produk</label>
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" wire:model.live="type_id">
                                <option selected="">-- Pilih Tipe Produk --</option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Location Produk</label>
                            <select class="form-select" id="exampleFormControlSelect1" wire:model.live="location_id"
                                aria-label="Default select example">
                                <option selected="">-- Pilih Location Produk --</option>
                                @foreach ($locations as $item)
                                    <option value="{{ $item->id }}">{{ $item->location }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col mb-3">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label required">Harga</label>
                                <input type="number" id="nameWithTitle" class="form-control"
                                     wire:model.live="price" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col mb-3">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label required">Stok</label>
                                <input type="number" id="nameWithTitle" class="form-control"
                                     wire:model.live="stock" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" wire:click.prevent="saveForm"
                    class="btn btn-primary">{{ $inventoryId ? 'Ubah Data' : 'Simpan Data' }}</button>
            </div>
        </div>
    </div>
</div>
