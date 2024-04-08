@section('pageTitle', 'Locations')

<div>
    <div class="row mb-3">
        <div class="col-12 mb-2">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="m-0">List Locations</h5>
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
                    <div class="input-group input-group-merge mb-3">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" wire:model.live="search" placeholder="Search..." aria-label="Search..."
                            aria-describedby="basic-addon-search31">
                    </div>
                    <div class="table-responsive table-striped table text-nowrap">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $location->location }}</td>
                                        <td class="text-center justify-content-end">
                                            <button type="button" wire:click="edit({{ $location->id }})"
                                                class="btn btn-icon btn-outline-info">
                                                <span class="tf-icons bx bx-edit-alt"></span>
                                            </button>
                                            <button
                                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                wire:click="destroy({{ $location->id }})" type="button"
                                                class="btn btn-icon btn-outline-danger">
                                                <span class="tf-icons bx bx-trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $locations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.pages.admin.form.locationForm')
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
