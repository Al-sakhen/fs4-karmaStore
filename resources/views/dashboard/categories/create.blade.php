@extends('dashboard.layout.app')

@section('page_name', 'categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection



@section('content')
    <div class="mx-auto col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create new category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('dashboard.categories.store') }}" method="post">
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
                        <label for="parent">Parent</label>
                        <select name="parent_id" class="custom-select form-control-border" id="parent">
                            <option value="" selected>Select parent category</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" @selected(old('parent_id') == $parent->id)>{{ $parent->name }}
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
