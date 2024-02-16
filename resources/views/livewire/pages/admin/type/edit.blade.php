@section('title', $title)

<div>
    <div class="col-md-12">
        <form class="card" wire:submit.prevent="update">
            <div class="card-header">
                <h3 class="card-title">Update Data: {{ $name }}</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label required">Name</label>
                    <div>
                        <input wire:model="name" type="name" class="form-control" id="name"
                            placeholder="Enter your name type">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('type.index') }}" class="btn btn-danger">Reset & Back</a>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
        </form>
    </div>
</div>
