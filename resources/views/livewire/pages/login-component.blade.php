<div>
    <div class="page page-center">

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="container container-tight py-5">
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login dengan akun</h2>
                    <form wire:submit.prevent="login" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" wire:model="email" class="form-control" placeholder="your@email.com"
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" wire:model="password" class="form-control"
                                    placeholder="Your password" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Masuk Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
