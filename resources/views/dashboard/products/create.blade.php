@extends('dashboard.layout.app')

@section('page_name', 'products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Produts</li>
@endsection



@section('content')
    <div class="mx-auto col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create new product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name"
                            placeholder="Enter name">
                        @error('name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" value="{{ old('description') }}" name="description" class="form-control" id="description"
                            placeholder="Enter description">
                        @error('description')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.1" value="{{ old('price') }}" name="price" class="form-control" id="price"
                            placeholder="Enter price">
                        @error('price')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file" id="image"
                            placeholder="Enter image">
                        @error('image')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" value="{{ old('quantity') }}" name="quantity" class="form-control" id="quantity"
                            placeholder="Enter quantity">
                        @error('quantity')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="custom-select form-control-border" id="status">
                            <option value="1" @selected(old('status') == 1)>active</option>
                            <option value="0" @selected(old('status') == 0)>not active</option>
                        </select>
                        @error('status')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent">Category</label>
                        <select name="category_id" class="custom-select form-control-border" id="parent">
                            <option value="" selected>Select parent category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
