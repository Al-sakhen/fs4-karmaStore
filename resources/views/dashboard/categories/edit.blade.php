@extends('dashboard.layout.app')

@section('page_name', 'categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">Update</li>
@endsection



@section('content')
    <div class="mx-auto col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('dashboard.categories.update' , $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ old('name', $category->name) }}" name="name" class="form-control"
                            id="name" placeholder="Enter name">
                        @error('name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="custom-select form-control-border" id="status">
                            <option value="1" @selected(old('status', $category->status) == 1)>active</option>
                            <option value="0" @selected(old('status', $category->status) == 0)>not active</option>
                        </select>
                        @error('status')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <select name="parent_id" class="custom-select form-control-border" id="parent">
                            <option value="" selected>Select parent category</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" @selected(old('parent_id' , $category->parent_id) == $parent->id)>{{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
