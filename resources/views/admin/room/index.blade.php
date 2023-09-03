@extends('admin.layouts.master')

@section('title', 'Ruangan')

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
                                Ruangan
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
                                <form role="form" action="{{ route('admin.rooms') }}" method="get">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="searchcode" class="form-control"
                                                placeholder="Mencari Berdasarkan Kode Ruangan"
                                                value="{{ request('searchcode') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="searchname" class="form-control"
                                                placeholder="Mencari Berdasarkan Nama Ruangan"
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
                                                    <th style="text-align:center;">Kode Ruangan</th>
                                                    <th style="text-align:center;">Nama Ruangan</th>
                                                    <th style="text-align:center;">Kapasitas</th>
                                                    <th style="text-align:center;">Jenis</th>
                                                    <th colspan="2" style="text-align:center;">
                                                        <a class="btn btn-primary" href="{{ route('admin.room.create') }}">
                                                            <i class="fa fa-plus"></i> Tambah Data
                                                        </a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rooms as $key => $room)
                                                    <tr>
                                                        <td align="center">
                                                            {{ ($rooms->currentPage() - 1) * $rooms->perPage() + $key + 1 }}
                                                        </td>
                                                        <td>
                                                            {{ $room->code_rooms }}
                                                        </td>
                                                        <td>
                                                            {{ $room->name }}
                                                        </td>
                                                        <td>
                                                            {{ $room->capacity }}
                                                        </td>
                                                        <td>
                                                            {{ $room->type }}
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <a class="btn btn-warning btn-sm"
                                                                    href="{{ route('admin.room.edit', $room->id) }}">
                                                                    <span class="glyphicon glyphicon-edit"></span> Ubah
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <form action="{{ route('admin.room.delete', $room->id) }}"
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
                                        {{ $rooms->appends(request()->input())->render() }}
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
