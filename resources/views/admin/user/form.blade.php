{!! Form::hidden('iduser', isset($users->id) ? $users->id : '', ['class' => 'form-control', 'id' => 'iduser']) !!}
<div class="mt-3">
    <label>
        Nama Lengkap
    </label>
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Nama Lengkap']) !!}
</div>
<div class="mt-3">
    <label>
        Email
    </label>
    {!! Form::email('emailuser', isset($users->email) ? $users->email : '', ['class' => 'form-control', 'required', 'maxlength' => '50', 'placeholder' => 'Masukkan Email', 'id' => 'emailuser']) !!}
</div>
@if(empty($users->password))
    <div class="mt-3">
        <label>
            Password
        </label>
        {!! Form::password('password', ['class' => 'form-control','id' => 'password', 'maxlength' => '20', 'required', 'placeholder' => 'Masukkan Password']) !!}
    </div>
    <div class="mt-3">
        <label>
            Password Konfirmasi
        </label>
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'maxlength' => '20', 'required', 'placeholder' => 'Masukkan assword Konfirmasi']) !!}
    </div>
@else
    <div class="mt-3">
        <label>
            Password
        </label>
        {!! Form::password('password', ['class' => 'form-control','id' => 'password', 'maxlength' => '20', 'placeholder' => 'Masukkan Password']) !!}
    </div>
    <div class="mt-3">
        <label>
            Password Konfirmasi
        </label>
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Masukkan Password Konfirmasi']) !!}
    </div>
@endif
<div class="mt-4">
    <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Save</button>
    <a href="{{ route('admin.user') }}" class="btn btn-danger py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Cancel</a>
</div>

