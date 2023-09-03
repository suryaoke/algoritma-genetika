@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="mb-3 intro-y flex flex-col sm:flex-row items-center mt-8">
            <h1 class="text-lg font-medium mr-auto">Data Guru All</h1>
            {!! Form::open(['role' => 'form', 'route' => 'admin.lecturers', 'method' => 'get', 'class' => 'sm:flex']) !!}
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{ route('admin.lecturer.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Data</a>
            </div>
            <div class="flex-1 sm:mr-2">
                <div class="form-group">
                    {!! Form::text('searchnidn', request('searchnidn'), [
                        'class' => 'form-control',
                        'placeholder' => 'Berdasarkan kode',
                    ]) !!}
                </div>
            </div>
            <div class="flex-1 sm:ml-2">
                <div class="form-group">
                    {!! Form::text('searchname', request('searchname'), [
                        'class' => 'form-control',
                        'placeholder' => 'Berdasarkan Nama',
                    ]) !!}
                </div>
            </div>
            <div class="sm:ml-2">
                {!! Form::submit('Search', ['class' => 'btn btn-default']) !!}
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
                                        <th class="whitespace-nowrap">No</th>
                                        <th class="whitespace-nowrap">Kode Guru</th>
                                        <th class="whitespace-nowrap">NIDN</th>
                                        <th class="whitespace-nowrap">Nama Guru</th>
                                        <th class="whitespace-nowrap">Email</th>
                                        <th class="whitespace-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lecturers as $key => $lecturer)
                                        <tr>
                                            <td align="center">
                                                {{ ($lecturers->currentPage() - 1) * $lecturers->perPage() + $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $lecturer->code_lecturers }}
                                            </td>
                                            <td>
                                                {{ $lecturer->nidn }}
                                            </td>
                                            <td>
                                                {{ $lecturer->name }}
                                            </td>
                                            <td>
                                                {{ $lecturer->email }}
                                            </td>
                                            <td class="">
                                                <a id="delete" href="{{ route('admin.lecturer.delete', $lecturer->id) }}"
                                                    class="btn btn-danger mr-1 mb-2">
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </a>
                                                <a href="{{ route('admin.lecturer.edit', $lecturer->id) }}"
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
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@stop
