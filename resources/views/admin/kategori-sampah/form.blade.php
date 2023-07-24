<div class="form-group{{ $errors->has('nama_kategori') ? 'has-error' : ''}}">
    {!! Form::label('nama_kategori', 'Nama Kategori', ['class' => 'control-label']) !!}
    {!! Form::text('nama_kategori', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('nama_kategori', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
    <label for="icon" class="control-label">Icon</label>
    <input type="file" id="icon" name="icon" class="form-control" accept="image/*"{{ '' == 'required' ? ' required' : '' }}>
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Ubah' : 'Buat', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger"> Batal </a>
</div>
