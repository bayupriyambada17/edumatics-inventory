@section('title', 'Supplier')
<div>
    @if (session()->has('success'))
        <div class="alert alert-success mb-2">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mb-2">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-md">Create</a>
            </div>
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-muted">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" wire:model.live="perPage">
                        </div>
                        entries
                    </div>
                    <div class="ms-auto text-muted">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input wire:model.live="search" type="text" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>PT</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Total Product</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $key => $supplier)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $supplier->name }}
                                </td>
                                <td>
                                    {{ $supplier->name_pt }}
                                </td>
                                <td>
                                    {{ $supplier->phone }}
                                </td>
                                <td>
                                    {{ $supplier->email }}
                                </td>
                                <td>
                                    {{ $supplier->address }}
                                </td>
                                <td>
                                    {{ $supplier->products_count }}
                                </td>
                                <td class="text-end">
                                    <div>
                                        <a href="{{ route('supplier.edit', $supplier->id) }}"
                                            class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-outline-danger"
                                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $supplier->id }})">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span> {{ $suppliers->currentPage() }}
                    </span> to <span>{{ $suppliers->count() }}</span> of <span>{{ $suppliers->total() }}</span>
                    entries
                </p>

                <div class="ms-auto m-0">
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
