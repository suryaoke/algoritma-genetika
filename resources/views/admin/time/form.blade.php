{!! Form::hidden('idtimes', isset($times->id) ? $times->id : '', ['class' => 'form-control', 'id' => 'idday']) !!}

<div class="mt-3">
    <label>
        Kode Waktu
    </label>
    {!! Form::text('code_times', null, [
        'class' => 'form-control',
        'required',
        'maxlength' => '100',
        'placeholder' => 'Masukkan Kode Waktu',
    ]) !!}
</div>
<div class="mt-3">
    <label>
        Waktu Mulai
    </label>
    <div class="input-group bootstrap-timepicker timepicker">
        {!! Form::text('time_begin', null, [
            'class' => 'form-control timepicker input-small',
            'required',
            'maxlength' => '100',
            'placeholder' => 'Masukkan Waktu Mulai',
        ]) !!}
    </div>
</div>
<div class="mt-3">
    <label>
        Waktu Akhir
    </label>
    <div class="input-group bootstrap-timepicker timepicker">
        {!! Form::text('time_finish', null, [
            'class' => 'form-control timepicker input-small',
            'required',
            'maxlength' => '100',
            'placeholder' => 'Masukkan Waktu Mulai',
        ]) !!}
    </div>
</div>
<div class="mt-3">
    <label>
        Jp
    </label>
    {!! Form::select(
        'jp',
        [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ],
        null,
        ['class' => 'form-control select2 to-select', 'id' => 'jp', 'required', 'placeholder' => 'Pilih Jp'],
    ) !!}
    <label id="jp-error" class="error" for="jp" style="display: none;">This field is required.</label>
</div>

<div class="mt-4">
    <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Save</button>
    <a href="{{ route('admin.times') }}"
        class="btn btn-danger py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Cancel</a>
</div>
