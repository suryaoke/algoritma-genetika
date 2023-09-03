@extends('admin.layouts.master')

@section('title', 'Mata Pelajaran')

@section('style')
    <style type="text/css">
        .panel-body {
            width: auto;
            height: auto;
            overflow-x: auto;
        }
    </style>
@stop

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Mata Pelajaran
                            </h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button class="btn btn-box-tool" data-widget="remove" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <form role="form" action="{{ route('admin.courses') }}" method="get">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="searchcode" class="form-control"
                                                placeholder="Mencari Berdasarkan Kode Mata Kuliah"
                                                value="{{ request('searchcode') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="searchname" class="form-control"
                                                placeholder="Mencari Berdasarkan Nama Mata Kuliah"
                                                value="{{ request('searchname') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                        <button type="submit" class="btn btn-default btn-block">Search</button>
                                    </div>
                                </form>
                                <div class="col-md-12">
                                    @include('admin._partials.notifications')
                                    <div class="panel-body table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="info">
                                                    <th style="text-align:center;">No.</th>
                                                    <th style="text-align:center;">Kode Mata Kuliah</th>
                                                    <th style="text-align:center;">Nama Mata Kuliah</th>
                                                    <th style="text-align:center;">SKS</th>
                                                    <th style="text-align:center;">Semester</th>
                                                    <th style="text-align:center;">Type</th>
                                                    <th colspan="2" style="text-align:center;">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.courses.create') }}">
                                                            <i class="fa fa-plus"></i> Tambah Data
                                                        </a>
                                                    </th>
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
                                                            {{ $course->sks }}
                                                        </td>
                                                        <td>
                                                            {{ $course->semester }}
                                                        </td>
                                                        <td>
                                                            {{ $course->type }}
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <a class="btn btn-warning btn-sm"
                                                                    href="{{ route('admin.courses.edit', $course->id) }}">
                                                                    <span class="glyphicon glyphicon-edit"></span> Ubah
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <form
                                                                    action="{{ route('admin.courses.delete', $course->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Anda Yakin?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $courses->appends(request()->input())->render() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
