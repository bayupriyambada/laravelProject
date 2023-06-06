<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="updateForm()" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label">Name Categories</label>
                    <input type="text" wire:model="name" class="form-control" placeholder="Input placeholder">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
