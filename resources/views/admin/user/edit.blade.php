@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Beranda</h5>
                <ul class="breadcrumb ml-2">
                <li class="breadcrumb-item">
                    <a href="{{url('/admin')}}">
                    <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{url('/admin')}}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Ubah User</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Ubah</h5>
            </div>
            <div class="card-body">
                {!! Form::model($user, [
                'method' => 'PATCH',
                'url' => ['/admin/user', $user->id],
                'class' => '','enctype' => 'multipart/form-data']) !!}

                @include ('admin.user.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
