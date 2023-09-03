@extends('admin.layouts.master')

@section('title', 'Generate Algoritma')

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
                                Generate Algoritma
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
                                <form role="form" action="{{ route('admin.generates.submit') }}" method="get"
                                    id="form-register">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="year" class="form-control select2 to-select required"
                                                id="year" placeholder="Pilih Tahun Akademik">
                                                @foreach ($years as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ request('year') == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label id="year-error" class="error" for="year" style="display: none;">This
                                                field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="semester" class="form-control select2 to-select required"
                                                id="semester" placeholder="Pilih Semester">
                                                <option value="Genap"
                                                    {{ request('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                                                <option value="Ganjil"
                                                    {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                            </select>
                                            <label id="semester-error" class="error" for="semester"
                                                style="display: none;">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="kromosom" class="form-control select2 to-select required"
                                                id="kromosom" placeholder="Masukkan Nilai Pembangkitan Kromosom">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ request('kromosom', '1') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            <label id="kromosom-error" class="error" for="kromosom"
                                                style="display: none;">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="generasi" class="form-control select2 to-select required"
                                                id="generasi" placeholder="Masukkan Nilai Maksimal Generasi">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ request('generasi') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            <label id="generasi-error" class="error" for="generasi"
                                                style="display: none;">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="crossover" class="form-control required"
                                                maxlength="100" placeholder="Masukkan Nilai Crossover" id="crossover"
                                                value="{{ request('crossover') }}">
                                            <label id="crossover-error" class="error" for="crossover"
                                                style="display: none;">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="mutasi" class="form-control required"
                                                maxlength="100" placeholder="Masukkan Nilai Mutasi" id="mutasi"
                                                value="{{ request('mutasi') }}">
                                            <input type="hidden" name="tabs" id="tabs"
                                                value="{{ request('tabs', 1) }}">
                                            <label id="mutasi-error" class="error" for="mutasi"
                                                style="display: none;">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                        <button type="submit" class="btn btn-default btn-block">Generate</button>
                                    </div>
                                </form>
                                <div class="col-md-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
