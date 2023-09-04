{!! Form::hidden('idlecturer', isset($lecturers->id) ? $lecturers->id : '', [
    'class' => 'form-control',
    'id' => 'idlecturer',
]) !!}

<div class="mt-3">
    <label>Kode Dosen</label>
    {!! Form::text('code_lecturers', null, [
        'class' => 'intro-x login__input form-control py-3 px-4 block',
        'required',
        'maxlength' => '100',
        'placeholder' => 'Masukkan Kode Dosen',
    ]) !!}
</div>

<div class="mt-3">
    <label>Nidn</label>
    {!! Form::text('nidnlecturer', isset($lecturers->nidn) ? $lecturers->nidn : '', [
        'class' => 'intro-x login__input form-control py-3 px-4 block',
        'required',
        'maxlength' => '100',
        'placeholder' => 'Masukkan NIDN ',
        'id' => 'nidnlecturer',
    ]) !!}
</div>

<div class="mt-3">
    <label>Nama</label>
    {!! Form::text('name', null, [
        'class' => 'intro-x login__input form-control py-3 px-4 block ',
        'required',
        'maxlength' => '100',
        'placeholder' => 'Masukkan Nama',
    ]) !!}
</div>

<div class="mt-3">
    <label>Email</label>
    {!! Form::text('emaillecturer', isset($lecturers->email) ? $lecturers->email : '', [
        'class' => 'intro-x login__input form-control py-3 px-4 block ',
        'required',
        'maxlength' => '100',
        'placeholder' => 'Masukkan Email',
        'id' => 'emaillecturer',
    ]) !!}
</div>


<div class="mt-4">
    <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Save</button>
    <a href="{{ route('admin.lecturers') }}" class="btn btn-danger py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Cancel</a>
</div>
