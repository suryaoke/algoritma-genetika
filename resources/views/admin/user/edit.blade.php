@extends('admin.layouts.master')

@section('title')
    {{ $title = 'Tambah Agen' }}
@stop


@section('content')
    <div class="intro-y flex items-center mt-8 mb-4">
        <h1 class="text-lg font-medium mr-auto">Add Data Guru</h1>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body no-padding" style="display: block;">
                    @include('admin._partials.notifications')
                    {!! Form::model($users, [
                        'route' => ['admin.user.update', $users->id],
                        'files' => true,
                        'id' => 'form-register',
                    ]) !!}
                    @include('admin.user.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
