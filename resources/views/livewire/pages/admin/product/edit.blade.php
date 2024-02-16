@section('title', $title)

<div>
    <div class="col-md-12">
        <form class="card" wire:submit.prevent="update">
            <div class="card-header">
                <h3 class="card-title">Update Data : {{ $name }}</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label required">Name</label>
                    <div>
                        <input wire:model="name" type="text" class="form-control" id="name"
                            placeholder="Enter your name product">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label required">Description Product</label>
                    <div>
                        <input wire:model="description" type="text" class="form-control" id="description"
                            placeholder="Enter your description">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label required">Type Product</label>
                    <div>
                        <select wire:model="type_id" id="type" class="form-control">
                            <option value="">-- Select Data --</option>
                            @foreach ($types as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label required">Location Product</label>
                    <div>
                        <select wire:model="location_id" id="location" class="form-control">
                            <option value="">-- Select Data --</option>
                            @foreach ($locations as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="supplier" class="form-label required">Supplier Product</label>
                    <div>
                        <select wire:model="supplier_id" id="supplier" class="form-control">
                            <option value="">-- Select Data --</option>
                            @foreach ($suppliers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label required">Qty Product</label>
                    <div>
                        <input wire:model="qty" type="number" oninput="calculateTotalPrice()" min="0"
                            class="form-control" id="qty" placeholder="Enter your qty">
                        @error('qty')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label required">Price</label>
                    <div>
                        <input wire:model="price" type="number" oninput="calculateTotalPrice()" min="0"
                            class="form-control" id="price" placeholder="Enter your price">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="totalPrice" class="form-label required">Total Price</label>
                    <div>
                        <h2 class=""> Rp. {{ $total_price ? number_format($total_price, 0, ',', '.') : 0 }}
                        </h2>

                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('products.index') }}" class="btn btn-danger">Reset & Back</a>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
        </form>
    </div>
    <script>
        function calculateTotalPrice() {
            @this.call('calculateTotalPrice');
        }
    </script>
</div>
