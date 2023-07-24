@if ($formMode !== 'edit')
<div class="form-group{{ $errors->has('id_penjualan') ? 'has-error' : ''}}">
    <label id="id_penjualan" class="control-label">Penjual</label>
    <select name="id_penjualan" id="id_penjualan" class="form-control" required>
            <option value="">Pilih Nasabah</option>
        @foreach($penjualan as $item)
            <option value="{{$item->id}}">{{$item->nasabah->name}}</option>
        @endforeach
    </select>
</div>
@endif
<div class="form-group{{ $errors->has('id_petugas') ? 'has-error' : ''}}">
    {!! Form::label('id_petugas', 'Petugas', ['class' => 'control-label']) !!}
    {!! Form::select('id_petugas', $petugas, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_petugas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('tanggal') ? 'has-error' : ''}}">
    {!! Form::label('tanggal', 'Tanggal', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Ubah' : 'Buat', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batak</a>
</div>