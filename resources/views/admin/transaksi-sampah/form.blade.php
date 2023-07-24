<div class="form-group{{ $errors->has('id_sampah') ? 'has-error' : ''}}">
    {!! Form::label('id_sampah', 'Id Sampah', ['class' => 'control-label']) !!}
    {!! Form::number('id_sampah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_sampah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kuantitas') ? 'has-error' : ''}}">
    {!! Form::label('kuantitas', 'Kuantitas', ['class' => 'control-label']) !!}
    {!! Form::number('kuantitas', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kuantitas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('tanggal_transaksi') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_transaksi', 'Tanggal Transaksi', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_transaksi', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tanggal_transaksi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('jenis_transaksi') ? 'has-error' : ''}}">
    {!! Form::label('jenis_transaksi', 'Jenis Transaksi', ['class' => 'control-label']) !!}
    {!! Form::select('jenis_transaksi', json_decode('{"Penjualan":"Penjualan","Pembelian":"Pembelian"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('jenis_transaksi', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
</div>
