@section('title', 'Type')
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
                <a href="{{ route('type.create') }}" class="btn btn-primary btn-md">Create</a>
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
                            <th>Total Product</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $key => $type)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $type->name }}
                                </td>
                                <td>
                                    {{ $type->products_count }}
                                </td>
                                <td class="text-end">
                                    <div>
                                        <a href="{{ route('type.edit', $type->id) }}" class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-outline-danger"
                                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $type->id }})">
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
                <p class="m-0 text-muted">Showing <span> {{ $types->currentPage() }}
                    </span> to <span>{{ $types->count() }}</span> of <span>{{ $types->total() }}</span> entries</p>

                <div class="ms-auto m-0">
                    {{ $types->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
