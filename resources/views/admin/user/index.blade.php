@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="mb-3 intro-y flex flex-col sm:flex-row items-center mt-8">
            <h1 class="text-lg font-medium mr-auto">Data User All</h1>
            {!! Form::open([
                'role' => 'form',
                'route' => 'admin.user',
                'method' => 'get',
                'class' => 'w-full sm:w-auto flex mt-4 sm:mt-0 mx-auto',
            ]) !!}
            <div class="w-full sm:w-auto flex">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Data</a>
            </div>
            <div class="flex-1 sm:mr-2">
                <div class="form-group">
                    {!! Form::text('searchname', request()->input('searchname'), [
                        'class' => 'form-control',
                        'placeholder' => 'Mencari Berdasarkan Nama Lengkap',
                    ]) !!}
                </div>
            </div>
            <div class="flex-1 sm:ml-2">
                <div class="form-group">
                    {!! Form::text('searchemail', request()->input('searchemail'), [
                        'class' => 'form-control',
                        'placeholder' => 'Mencari Berdasarkan Email',
                    ]) !!}
                </div>
            </div>
            <div class="sm:ml-2">
                {!! Form::submit('Search', ['class' => 'btn btn-default btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="overflow-x-auto">
                            <table id="datatable" class="table table-sm"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">No.</th>
                                        <th class="whitespace-nowrap">Nama Lengkap</th>
                                        <th class="whitespace-nowrap">Email</th>
                                        <th class="whitespace-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td align="center">
                                                {{ ($users->currentpage() - 1) * $users->perpage() + $key + 1 }}
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a id="delete" href="{{ route('admin.user.delete', $user->id) }}"
                                                    class="btn btn-danger mr-1 mb-2">
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </a>
                                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                                    class="btn btn-success mr-1 mb-2">
                                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    </div>
@stop
