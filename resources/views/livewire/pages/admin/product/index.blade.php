@section('title', 'Products')

<div>
    @if (session()->has('success'))
        <div class="alert alert-success mb-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-md">Create</a>
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
                            <th>Description</th>
                            <th>Type Product</th>
                            <th>Location Product</th>
                            <th>Supplier Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>
                                <td>
                                    {{ $product->type->name }}
                                </td>
                                <td>
                                    {{ $product->location->name }}
                                </td>
                                <td>
                                    {{ $product->supplier->name }}
                                </td>
                                <td>
                                    {{ $product->qty }}
                                </td>
                                <td>
                                    {{ $product->price }}
                                </td>
                                <td>
                                    Rp. {{ number_format($product->total_price, 0, '.', '.') }}
                                </td>
                                <td class="text-end">
                                    <div>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-outline-danger"
                                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $product->id }})">
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
                <p class="m-0 text-muted">Showing <span> {{ $products->currentPage() }}
                    </span> to <span>{{ $products->count() }}</span> of <span>{{ $products->total() }}</span> entries
                </p>

                <div class="ms-auto m-0">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
