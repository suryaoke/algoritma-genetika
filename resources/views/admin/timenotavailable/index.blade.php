@extends('admin.layouts.master')

@section('title', 'Waktu Berhalangan')

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
                                Waktu Berhalangan
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
                                <form role="form" action="{{ route('admin.timenotavailables') }}" method="get">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="searchlecturers" class="form-control"
                                                placeholder="Mencari Berdasarkan Nama Dosen"
                                                value="{{ request('searchlecturers') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="searchday" class="form-control"
                                                placeholder="Mencari Berdasarkan Hari" value="{{ request('searchday') }}">
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
                                                    <th style="text-align:center;">Dosen</th>
                                                    <th style="text-align:center;">Hari</th>
                                                    <th style="text-align:center;">Waktu</th>
                                                    <th colspan="2" style="text-align:center;">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.timenotavailable.create') }}">
                                                            <i class="fa fa-plus"></i> Tambah Data
                                                        </a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($timenotavailables as $key => $timenotavailable)
                                                    <tr>
                                                        <td align="center">
                                                            {{ ($timenotavailables->currentPage() - 1) * $timenotavailables->perPage() + $key + 1 }}
                                                        </td>
                                                        <td>{{ $timenotavailable->lecturer->name ?? '' }}</td>
                                                        <td>{{ $timenotavailable->day->name_day ?? '' }}</td>
                                                        <td>{{ $timenotavailable->time->range ?? '' }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <a class="btn btn-warning btn-sm"
                                                                    href="{{ route('admin.timenotavailable.edit', $timenotavailable->id) }}">
                                                                    <span class="glyphicon glyphicon-edit"></span> Ubah
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <form
                                                                    action="{{ route('admin.timenotavailable.delete', $timenotavailable->id) }}"
                                                                    method="POST" onclick="return confirm('Anda Yakin?');">
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
                                        {!! $timenotavailables->appends(request()->query())->render() !!}
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
