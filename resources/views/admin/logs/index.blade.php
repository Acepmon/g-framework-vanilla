@extends('layouts.admin')

@section('title', 'Error Logs')

@section('load')

@endsection

@section('pageheader')
    @include('admin.logs.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    Laravel Log Files
                </h5>
            </div>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Filename</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $index => $log)
                        <tr class="{{ $log['is_today'] ? 'bg-primary-300' : '' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $log['filename'] }}</td>
                            <td>{{ $log['date'] }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.logs.show', ['log' => $log['filename']]) }}" class="btn btn-default btn-sm"><span class="icon-eye"></span></a>
                                    <a href="#" class="btn btn-default btn-sm"><span class="icon-trash"></span></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-8"></div>
</div>
@endsection

@section('script')

@endsection

