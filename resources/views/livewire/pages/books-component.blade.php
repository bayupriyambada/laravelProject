<div>

    <a href="{{ route('books.create') }}" class="btn btn-success">Create a new</a>
    <div class="mt-2">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Categories Books</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allBooks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                {{-- relasi join dari models yang dibuat sebagai nama function --}}
                                <td>{{ $item->category->name }}</td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('books.update', $item->id) }}"
                                        class="btn btn-yellow">Edit</a>
                                    <button wire:click.prevent="destroy({{ $item->id }})"
                                        class="btn btn-red">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
