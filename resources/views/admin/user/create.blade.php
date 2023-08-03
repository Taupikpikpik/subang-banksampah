@extends('admin.layout.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="d-flex align-items-center">
                    <h5 class="page-title">Beranda</h5>
                    <ul class="breadcrumb ml-2">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Pengguna</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Buat</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => '/admin/user', 'class' => '', 'enctype' => 'multipart/form-data']) !!}
                    @include ('admin.user.form', ['formMode' => 'create'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var divjabatan = document.getElementById('inputjabatan');
        var jabatan = document.getElementById('jabatan');

        // var divtabungan = document.getElementById('inputTabungan');
        // var tabungan = document.getElementById('noTabungan');

        var divkelurahan = document.getElementById('inputkelurahan');
        var kelurahan = document.getElementById('kelurahan');
        var role = document.getElementById('role');

        $(document).ready(function() {
            changerole(role.value);
        });

        function changereview(data) {
            role2 = $(data).val();

            changerole(role2);
        }

        function changerole(data) {
            console.log(data);

            if (data === 'reviewer') {

                divjabatan.style.display = 'block';
                jabatan.setAttribute('required', '');

                // divtabungan.style.display = 'none';
                // tabungan.removeAttribute('required');
                // $('#noTabungan').val('').trigger('change');

                divkelurahan.style.display = 'none';
                kelurahan.removeAttribute('required');
                $('#kelurahan').val('').trigger('change');
            } else if (data === 'nasabah') {

                // divtabungan.style.display = 'block';
                // tabungan.setAttribute('required', '');

                divkelurahan.style.display = 'block';
                kelurahan.setAttribute('required', '');

                divjabatan.style.display = 'none';
                jabatan.removeAttribute('required');
                $('#jabatan').val('').trigger('change');

            } else {
                divjabatan.style.display = 'none';
                jabatan.removeAttribute('required');
                $('#jabatan').val('').trigger('change');

                // divtabungan.style.display = 'none';
                // tabungan.removeAttribute('required');
                // $('#noTabungan').val('').trigger('change');

                divkelurahan.style.display = 'none';
                kelurahan.removeAttribute('required');
                $('#kelurahan').val('').trigger('change');

            }
        }
    </script>
@endsection
