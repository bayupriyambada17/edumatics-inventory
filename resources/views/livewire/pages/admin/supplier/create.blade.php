@section('title', 'Create Supplier')
<div>
    <div class="col-md-12">
        <form class="card" wire:submit.prevent="store">
            <div class="card-header">
                <h3 class="card-title">Create Data</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label required">Name</label>
                    <div>
                        <input wire:model="name" type="text" class="form-control" id="name"
                            placeholder="Enter your name type">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name_pt" class="form-label required">Name PT</label>
                    <div>
                        <input wire:model="name_pt" type="text" class="form-control" id="name_pt"
                            placeholder="Enter your name PT">
                        @error('name_pt')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label required">Phone Number</label>
                    <div>
                        <input wire:model="phone" type="text" class="form-control" id="phone"
                            placeholder="Enter your phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label required">Email</label>
                    <div>
                        <input wire:model="email" type="email" class="form-control" id="email"
                            placeholder="Enter your email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label required">Address</label>
                    <div>
                        <input wire:model="address" type="text" class="form-control" id="address"
                            placeholder="Enter your address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('supplier.index') }}" class="btn btn-danger">Reset & Back</a>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
        </form>
    </div>
</div>
