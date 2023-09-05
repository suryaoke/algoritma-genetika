@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <h1 class="text-lg font-medium mb-4">Data Jam All</h1>
        <div class="mb-3 intro-y flex flex-col sm:flex-row items-center mt-4">
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ml-auto">
                <a href="{{ route('admin.time.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Data</a>
            </div>
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
                                        <th class="whitespace-nowrap">Kode Waktu</th>
                                        <th class="whitespace-nowrap">Waktu Mulai</th>
                                        <th class="whitespace-nowrap">Waktu Selesai</th>
                                        <th class="whitespace-nowrap">Range Waktu</th>
                                        <th class="whitespace-nowrap">JP</th>
                                        <th class="whitespace-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($times as $key => $time)
                                        <tr>
                                            <td align="center">
                                                {{ ($times->currentPage() - 1) * $times->perPage() + $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $time->code_times }}
                                            </td>
                                            <td>
                                                {{ $time->time_begin }}
                                            </td>
                                            <td>
                                                {{ $time->time_finish }}
                                            </td>
                                            <td>
                                                {{ $time->range }}
                                            </td>
                                            <td>
                                                {{ $time->jp }}
                                            </td>
                                            <td>
                                                <a id="delete" href="{{ route('admin.time.delete', $time->id) }}"
                                                    class="btn btn-danger mr-1 mb-2">
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </a>
                                                <a href="{{ route('admin.time.edit', $time->id) }}"
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
