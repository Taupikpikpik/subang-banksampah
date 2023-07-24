<div class="form-group{{ $errors->has('id_user') ? 'has-error' : ''}}">
    {!! Form::label('id_user', 'Id User', ['class' => 'control-label']) !!}
    {!! Form::number('id_user', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('jumlah_saldo') ? 'has-error' : ''}}">
    {!! Form::label('jumlah_saldo', 'Jumlah Saldo', ['class' => 'control-label']) !!}
    {!! Form::number('jumlah_saldo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('jumlah_saldo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
</div>
