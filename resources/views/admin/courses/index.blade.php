@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="mb-3 intro-y flex flex-col sm:flex-row items-center mt-8">
            <h1 class="text-lg font-medium mr-auto">Data Mata Pelajaran All</h1>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Data</a>
            </div>
            <form role="form" action="{{ route('admin.courses') }}" method="get" class="sm:flex">
                <div class="flex-1 sm:mr-2">
                    <div class="form-group">
                        <input type="text" name="searchcode" class="form-control" placeholder="Berdasarkan Kode Matkul"
                            value="{{ request('searchcode') }}">
                    </div>
                </div>
                <div class="flex-1 sm:ml-2">
                    <div class="form-group">
                        <input type="text" name="searchname" class="form-control" placeholder="Berdasarkan Matkul"
                            value="{{ request('searchname') }}">
                    </div>
                </div>
                <div class="sm:ml-2">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </form>
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
                                        <th class="whitespace-nowrap">Kode Mata Pelajaran</th>
                                        <th class="whitespace-nowrap">Nama Mata Pelajaran</th>
                                        <th class="whitespace-nowrap">JP</th>
                                        <th class="whitespace-nowrap">Semester</th>
                                        <th class="whitespace-nowrap">Jurusan</th>
                                        <th class="whitespace-nowrap">Type</th>
                                        <th class="whitespace-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $key => $course)
                                        <tr>
                                            <td align="center">
                                                {{ ($courses->currentPage() - 1) * $courses->perPage() + $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $course->code_courses }}
                                            </td>
                                            <td>
                                                {{ $course->name }}
                                            </td>
                                            <td>
                                                {{ $course->jp }}
                                            </td>
                                            <td>
                                                {{ $course->semester }}
                                            </td>
                                                <td>
                                                {{ $course->jurusan }}
                                            </td>
                                            <td>
                                                {{ $course->type }}
                                            </td>

                                            <td class="">
                                                <a id="delete" href="{{ route('admin.courses.delete', $course->id) }}"
                                                    class="btn btn-danger mr-1 mb-2">
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </a>
                                                <a href="{{ route('admin.courses.edit', $course->id) }}"
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
