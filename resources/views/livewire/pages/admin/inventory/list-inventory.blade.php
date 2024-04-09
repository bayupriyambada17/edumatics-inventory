@section('pageTitle', 'List Inventory')

<div>
    <div class="row mb-3">
        <div class="col-12 mb-2">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="m-0">List Inventory</h5>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-select" id="exampleFormControlSelect1" wire:model.live="selectProductId"
                                aria-label="Default select example">
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_product }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" id="exampleFormControlSelect1" wire:model.live="selectTypeId"
                                aria-label="Default select example">
                                <option value="">-- Pilih Tipe Produk --</option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" id="exampleFormControlSelect1" wire:model.live="selectLocationId"
                                aria-label="Default select example">
                                <option value="">-- Pilih Lokasi Produk --</option>
                                @foreach ($locations as $item)
                                    <option value="{{ $item->id }}">{{ $item->location }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive table-striped table text-nowrap">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Tipe Produk</th>
                                    <th>Lokasi Produk</th>
                                    <th>Price</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($inventories as $inventory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $inventory->product->name_product }}</td>
                                        <td>{{ $inventory->type->name_type }}</td>
                                        <td>{{ $inventory->location->location }}</td>
                                        <td>{{ $inventory->price }}</td>
                                        <td>{{ $inventory->stock }}</td>
                                        <td class="text-center justify-content-end">
                                            <button type="button" wire:click="edit({{ $inventory->id }})"
                                                class="btn btn-icon btn-outline-info">
                                                <span class="tf-icons bx bx-edit-alt"></span>
                                            </button>
                                            <button
                                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                wire:click="destroy({{ $inventory->id }})" type="button"
                                                class="btn btn-icon btn-outline-danger">
                                                <span class="tf-icons bx bx-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $inventories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.pages.admin.form.inventoryListForm')
</div>

@push('js')
    <script>
        Livewire.on('closeModal', () => {
            $('#modalForm').modal('hide');
        });

        Livewire.on('openModal', () => {
            $('#modalForm').modal('show');
        });
        // Livewire.on('openModalDelete', () => {
        //     $('#modalDelete').modal('show');
        // });
        // Livewire.on('closeModalDelete', () => {
        //     $('#modalDelete').modal('hide');
        // });

        function validateInput(input) {
            // Menghapus karakter non-angka dari input
            input.value = input.value.replace(/\D/g, '');
        }
    </script>
@endpush
