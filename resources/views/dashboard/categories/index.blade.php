@extends('dashboard.layout.app')

@section('page_name', 'categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection



@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-primary">Create new
                        category</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="p-0 card-body table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            {{-- parents --}}
                            <tr class="bg-secondary">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->status == 1)
                                        ✅
                                    @else
                                        ❌
                                    @endif
                                </td>
                                <td>{{ $category->created_at->toDateString() }}</td>
                                <td class="d-flex">

                                    <form class="mr-2" action="{{ route('dashboard.categories.edit' , $category->id) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">edit</button>
                                    </form>
                                    <form
                                        action="{{ route('dashboard.categories.destroy', ['category' => $category->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="mr-2 btn btn-sm btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $current_loop = $loop->iteration;
                            @endphp
                            {{-- childrens --}}
                            @if ($category->childrens->count() > 0)
                                @foreach ($category->childrens as $child)
                                    <tr>
                                        <td>{{ $current_loop . '-' . $loop->iteration }}</td>
                                        <td>{{ $child->name }}</td>
                                        <td>
                                            @if ($child->status == 1)
                                                ✅
                                            @else
                                                ❌
                                            @endif
                                        </td>
                                        <td>{{ $child->created_at->toDateString() }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.categories.edit' , $child->id) }}" class="mr-2 btn btn-sm btn-primary">edit</a>

                                            <form
                                                action="{{ route('dashboard.categories.destroy', ['category' => $child->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')

                                                <button class="mr-2 btn btn-sm btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @empty
                                <tr>
                                    <td colspan="5" class="text-center font-weight-bold">No categories found</td>
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
