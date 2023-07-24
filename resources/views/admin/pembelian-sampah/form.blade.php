<div class="form-group{{ $errors->has('id_sampah') ? 'has-error' : ''}}">
    {!! Form::label('id_sampah', 'Id Sampah', ['class' => 'control-label']) !!}
    {!! Form::number('id_sampah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_sampah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_pengepul') ? 'has-error' : ''}}">
    {!! Form::label('id_pengepul', 'Id Pengepul', ['class' => 'control-label']) !!}
    {!! Form::number('id_pengepul', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_pengepul', '<p class="help-block">:message</p>') !!}
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
<div class="form-group{{ $errors->has('status_pembelian') ? 'has-error' : ''}}">
    {!! Form::label('status_pembelian', 'Status Pembelian', ['class' => 'control-label']) !!}
    {!! Form::select('status_pembelian', json_decode('{"Menunggu Konfirmasi Pembayaran":"Menunggu Konfirmasi Pembayaran","Pembelian Berhasil":"Pembelian Berhasil","Pembelian Dibatalkan":"Pembelian Dibatalkan"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status_pembelian', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kode_pembelian') ? 'has-error' : ''}}">
    {!! Form::label('kode_pembelian', 'Kode Pembelian', ['class' => 'control-label']) !!}
    {!! Form::text('kode_pembelian', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kode_pembelian', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('bukti_pembayaran') ? 'has-error' : ''}}">
    {!! Form::label('bukti_pembayaran', 'Bukti Pembayaran', ['class' => 'control-label']) !!}
    {!! Form::file('bukti_pembayaran', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('bukti_pembayaran', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
</div>
