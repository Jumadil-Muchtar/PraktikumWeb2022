@extends('layouts.main')
@section('container-content')
    
    <div class="row pt-5 justify-content-center">
        <div class="card bg-dark mb-5 mt-5" style="width: 55rem;">
            <div class="card-header bg-primary text-white">Products List</div>
            <div class="table-responsive">
                <div class="table">
                <table class="table text-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Seller</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Added</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                @foreach ($products as $item)
                <tbody>
                    <td> {{ $loop->iteration }} </td>
                    
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->seller->name ?? 'None' }} </td>
                    <td> {{ $item->category->name ?? 'None' }} </td>
                    <td> {{ $item->price }} </td>
                    <td> {{ $item->status }} </td>
                    <td> {{ $item->created_at }} </td>
                    <td> {{ $item->updated_at }} </td>
                    <td>
                        <form action="{{ route('products.destroy', $item->id) }}"method="POST">
                            <a class="btn btn-warning" href="{{ route('products.edit', $item->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tbody>

                @endforeach
            </table>
            {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <div class="d-flex justify-content-end pt-5 pb-3">
                <a href="{{ route('products.create') }}" class='btn btn-success'>+ Add</a>
            </div>
        </div>
    </div>

@endsection