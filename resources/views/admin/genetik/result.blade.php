@extends('admin.layouts.master')

@section('title', 'Hasil Generate Algoritma')

@section('style')
    <style type="text/css">
        .panel-body {
            width: auto;
            height: auto;
            overflow: auto;
        }
    </style>
@stop

@section('content')
    <div class="box-body">
        @if (isset($value_schedule))
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" class="close" data-dismiss="alert" type="button">×</button>
                <h4>Nilai Fitness : 1 / 1 +
                    (0{{ isset($value_schedule->value_process) ? $value_schedule->value_process : 0 }})
                    = {{ isset($value_schedule->value) ? $value_schedule->value : 0 }}</h4>
                <h4>Crossover : {{ $crossover->value }}</h4>
                <h4>Mutasi : {{ $mutasi->value }}</h4>
            </div>
        @endif
        <div class="row">

            <div class="grid grid-cols-12 gap-2 mt-4">
                <div class="mr-2"> <!-- Tombol Kembali -->
                    <a class="btn btn-warning btn-block" href="{{ route('admin.generates', request()->all()) }}">
                        <span class="glyphicon glyphicon-hand-left"></span> <i data-lucide="skip-back" class="w-5 h-5"></i>
                        Back
                    </a>
                </div>
                <div class="col-span-2 ml-2 "> <!-- Tombol Export Excel -->
                    <a class="btn btn-primary btn-block" href="{{ route('admin.generates.excel', $id) }}">
                        <span class="glyphicon glyphicon-download"></span> </span> <i data-lucide="printer"
                            class="w-5 h-5"></i>&nbsp;Export Excel
                    </a>
                </div>
                <div class="col-span-4 "> <!-- Dropdown -->
                    @if (!empty($data_kromosom))
                        <select class="form-control select2" id="myAction">
                            @foreach ($data_kromosom as $key => $kromosom)
                                <option value="{{ $key + 1 }}"
                                    @if ($id == $key + 1) selected="selected" @endif>
                                    @if ($kromosom['value_schedules'] == 1)
                                        Jadwal Terbaik
                                    @else
                                        Jadwal {{ $key + 1 }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>


            <div class="col-md-12">
                <br>
                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="info">
                                <th style="text-align:center;">No.</th>
                                <th style="text-align:center;">Hari</th>
                                <th style="text-align:center;">Jam</th>
                                <th style="text-align:center;">Nama Ruangan</th>
                                <th style="text-align:center;">Kapasitas Ruangan</th>
                                <th style="text-align:center;">Mata Kuliah</th>
                                <th style="text-align:center;">Dosen Pengampu</th>
                                <th style="text-align:center;">Semester</th>
                                <th style="text-align:center;">SKS</th>
                                <th style="text-align:center;">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $key => $schedule)
                                <tr>
                                    <td align="center">{{ $key + 1 }}</td>
                                    <td>{{ isset($schedule->day->name_day) ? $schedule->day->name_day : '' }}
                                    </td>
                                    <td>{{ isset($schedule->time->range) ? $schedule->time->range : '' }}
                                    </td>
                                    <td>
                                        {{ isset($schedule->room->name) ? $schedule->room->name : '' }}
                                        :
                                        {{ isset($schedule->teach->class_room) ? $schedule->teach->class_room : '' }}
                                    </td>
                                    <td>{{ isset($schedule->room->capacity) ? $schedule->room->capacity : '' }}
                                    </td>
                                    <td>{{ isset($schedule->teach->course->name) ? $schedule->teach->course->name : '' }}
                                    </td>
                                    <td>{{ isset($schedule->teach->lecturer->name) ? $schedule->teach->lecturer->name : '' }}
                                    </td>
                                    <td>{{ isset($schedule->teach->course->semester) ? $schedule->teach->course->semester : '' }}
                                    </td>
                                    <td>{{ isset($schedule->teach->course->sks) ? $schedule->teach->course->sks : '' }}
                                    </td>
                                    <td>{{ isset($schedule->teach->class_room) ? $schedule->teach->class_room : '' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $schedules->appends(request()->all())->render() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Masukkan jQuery sebelum kode JavaScript Anda -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Kode JavaScript Anda -->
    <script type="text/javascript">
        $('#myAction').change(function() {
            var action = $(this).val();
            window.location = action;
        });
    </script>
@stop
