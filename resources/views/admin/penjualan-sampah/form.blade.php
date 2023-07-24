<div class="form-group{{ $errors->has('id_sampah') ? 'has-error' : ''}}">
    {!! Form::label('id_sampah', 'Id Sampah', ['class' => 'control-label']) !!}
    {!! Form::number('id_sampah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_sampah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_nasabah') ? 'has-error' : ''}}">
    {!! Form::label('id_nasabah', 'Id Nasabah', ['class' => 'control-label']) !!}
    {!! Form::number('id_nasabah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_nasabah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kuantitas') ? 'has-error' : ''}}">
    {!! Form::label('kuantitas', 'Kuantitas', ['class' => 'control-label']) !!}
    {!! Form::number('kuantitas', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kuantitas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('total') ? 'has-error' : ''}}">
    {!! Form::label('total', 'Total', ['class' => 'control-label']) !!}
    {!! Form::number('total', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status_penjualan') ? 'has-error' : ''}}">
    {!! Form::label('status_penjualan', 'Status Penjualan', ['class' => 'control-label']) !!}
    {!! Form::select('status_penjualan', json_decode('{"Menunggu Konfirmasi Bank Sampah":"Menunggu Konfirmasi Bank Sampah","Menunggu Kedatangan Petugas Lapangan":"Menunggu Kedatangan Petugas Lapangan","Terjual":"Terjual","Dibatalkan":"Dibatalkan"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status_penjualan', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
</div>
