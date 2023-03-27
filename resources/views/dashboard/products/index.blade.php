@extends('dashboard.layout.app')

@section('page_name', 'products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Products</li>
@endsection



@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-primary">Create new
                        product</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="p-0 card-body table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        ✅
                                    @else
                                        ❌
                                    @endif
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }} $</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->image) }}" width="80" height="80"
                                        alt="">
                                </td>
                                <td>
                                    {{ $product->created_at->toDateString() }}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('dashboard.products.edit', $product->id) }}"
                                        class="mr-2 btn btn-sm btn-primary">edit</a>

                                    <form action="{{ route('dashboard.products.destroy', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="mr-2 btn btn-sm btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center font-weight-bold">No Products fount</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
