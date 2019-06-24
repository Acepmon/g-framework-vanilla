@extends('layouts.admin')

@section('title', $filename)

@section('load')

@endsection

@section('pageheader')
    @include('admin.logs.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <pre><code>{!! $log !!}</code></pre>
    </div>
</div>
@endsection

@section('script')

@endsection

