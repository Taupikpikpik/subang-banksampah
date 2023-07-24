<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text(
        'name',
        null,
        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required'],
    ) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::email(
        'email',
        null,
        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required'],
    ) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@if ($formMode != 'edit')
    <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
        {!! Form::password(
            'password',
            '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required'],
        ) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
@else
    <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
        {!! Form::password('password', '' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
@endif
<div class="form-group{{ $errors->has('role') ? 'has-error' : '' }}">
    {!! Form::label('role', 'Role', ['class' => 'control-label']) !!}
    {!! Form::select(
        'role',
        json_decode(
            '{"admin":"admin","nasabah":"nasabah","petugas":"petugas","pengepul":"pengepul","reviewer":"reviewer"}',
            true,
        ),
        null,
        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required'],
    ) !!}
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('jabatan') ? 'has-error' : '' }}">
    {!! Form::label('jabatan', 'Jabatan', ['class' => 'control-label']) !!}
    {!! Form::select(
        'jabatan',
        json_decode(
            '{"Direktur Bank Sampah":"Direktur Bank Sampah","Kepala Dinas Lingkungan Hidup":"Kepala Dinas Lingkungan Hidup"}',
            true,
        ),
        null,
        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required'],
    ) !!}
    {!! $errors->first('jabatan', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
    {!! Form::label('address', 'Alamat', ['class' => 'control-label']) !!}
    {!! Form::text(
        'address',
        null,
        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required'],
    ) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status') ? 'has-error' : '' }}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select(
        'status',
        json_decode('{"active":"active","deactive":"deactive"}', true),
        null,
        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required'],
    ) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Ubah' : 'Buat', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal</a>
</div>
