<div class="form-group{{ $errors->has('id_saldo') ? 'has-error' : ''}}">
    {!! Form::label('id_saldo', 'Id Saldo', ['class' => 'control-label']) !!}
    {!! Form::number('id_saldo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_saldo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('jumlah') ? 'has-error' : ''}}">
    {!! Form::label('jumlah', 'Jumlah', ['class' => 'control-label']) !!}
    {!! Form::number('jumlah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kode') ? 'has-error' : ''}}">
    {!! Form::label('kode', 'Kode', ['class' => 'control-label']) !!}
    {!! Form::text('kode', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kode', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::text('status', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
</div>
