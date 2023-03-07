@extends('dashboard.layout.app')

@section('content')
    <h1>Hello from products page</h1>
@endsection

@section('page_name', 'Products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Products</li>
@endsection
