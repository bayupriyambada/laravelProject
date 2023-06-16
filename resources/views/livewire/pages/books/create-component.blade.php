<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit="create" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label">Name Books</label>
                    <input type="text" wire:model="name" class="form-control" placeholder="Input placeholder">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-label">Select Categories</div>
                    <select class="form-select" wire:model="categories_id">
                        <option value="">- Select -</option>
                        @foreach ($allCategories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
