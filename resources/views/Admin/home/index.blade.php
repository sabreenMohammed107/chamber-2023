
@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i>الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page"> </li>
    </ol>
</nav>

@endsection

@section('content')
@endsection