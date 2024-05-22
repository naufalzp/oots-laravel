@extends('layouts.app')

@section('title', 'All Product')

@section('content')
    <div class="card w-100">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>
                All Product
            </h1>
            <a href="{{ route('product.create') }}" class="btn btn-primary">
                Add
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="images/{{ $product->image }}" alt="Product Image" width="100">
                                @else
                                    <span>No image available</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="confirm('Delete this data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="card-footer">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
