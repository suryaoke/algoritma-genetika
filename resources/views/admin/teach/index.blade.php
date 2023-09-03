@extends('admin.layouts.master')

@section('title', 'Pengampu')

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
                            Pengampu
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
                            <form role="form" action="{{ route('admin.teachs') }}" method="get">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="searchlecturers" class="form-control" placeholder="Mencari Berdasarkan Nama Dosen" value="{{ request('searchlecturers') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="searchcourse" class="form-control" placeholder="Mencari Berdasarkan Mata Kuliah" value="{{ request('searchcourse') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="searchclass" class="form-control" placeholder="Mencari Berdasarkan Kelas" value="{{ request('searchclass') }}">
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
                                                <th style="text-align:center;">Nama Dosen</th>
                                                <th style="text-align:center;">Mata Kuliah</th>
                                                <th style="text-align:center;">Kelas</th>
                                                <th style="text-align:center;">Tahun Kurikulum</th>
                                                <th colspan="2" style="text-align:center;">
                                                    <a class="btn btn-primary" href="{{ route('admin.teach.create') }}">
                                                        <i class="fa fa-plus"></i> Tambah Data
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teachs as $key => $teach)
                                            <tr>
                                                <td align="center">
                                                    {{ ($teachs->currentPage() - 1) * $teachs->perPage() + $key + 1 }}
                                                </td>
                                                <td>
                                                    {{ optional($teach->lecturer)->name }}
                                                </td>
                                                <td>
                                                    {{ optional($teach->course)->name }}
                                                </td>
                                                <td>
                                                    {{ $teach->class_room }}
                                                </td>
                                                <td>
                                                    {{ $teach->year }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.teach.edit', $teach->id) }}">
                                                            <span class="glyphicon glyphicon-edit"></span> Ubah
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <form action="{{ route('admin.teach.delete', $teach->id) }}" method="POST" onsubmit="return confirm('Anda Yakin?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <span class="glyphicon glyphicon-trash"></span> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $teachs->appends(request()->input())->render() }}
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
