<div class="form-group{{ $errors->has('nama_sampah') ? 'has-error' : ''}}">
    {!! Form::label('nama_sampah', 'Nama Sampah', ['class' => 'control-label']) !!}
    {!! Form::text('nama_sampah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('nama_sampah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_kategori_sampah') ? 'has-error' : ''}}">
    {!! Form::label('id_kategori_sampah', 'Katgori Sampah', ['class' => 'control-label']) !!}
    {!! Form::select('id_kategori_sampah', $category, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('id_kategori_sampah', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode != 'edit')
<div class="form-group{{ $errors->has('stok') ? 'has-error' : ''}}">
    {!! Form::label('stok', 'Stok', ['class' => 'control-label']) !!}
    {!! Form::number('stok', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('stok', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group{{ $errors->has('harga_beli') ? 'has-error' : ''}}">
    {!! Form::label('harga_beli', 'Harga Beli', ['class' => 'control-label']) !!}
    {!! Form::number('harga_beli', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('harga_beli', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('harga_jual') ? 'has-error' : ''}}">
    {!! Form::label('harga_jual', 'Harga Jual', ['class' => 'control-label']) !!}
    {!! Form::number('harga_jual', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status_sampah') ? 'has-error' : ''}}">
    {!! Form::label('status_sampah', 'Status sampah', ['class' => 'control-label']) !!}
    {!! Form::select('status_sampah', json_decode('{"active":"active","deactive":"deactive"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('status_sampah', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Ubah' : 'Buat', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal</a>
</div>
