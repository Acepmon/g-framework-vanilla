@extends('layouts.admin')

@section('title', 'Upload File')

@section('load')
<script type="text/javascript" src="/assets/js/plugins/uploaders/dropzone.min.js"></script>
@endsection

@section('pageheader')
    @include('admin.media.includes.pageheader')
@endsection

@section('content')
<!-- Multiple file upload -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Upload multiple files</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <p class="content-group">Example of a <code>multiple</code> file uploader based on <code>Dropzone.js</code> library. Dropzone.js is a light weight JavaScript library that turns an HTML element into a dropzone. This means that a user can drag and drop a file onto it, and the file gets uploaded to the server via AJAX. By default Dropzone is a multiple file uploader, so this example is a basic setup. Uploading process runs automatically and image thumbnail previews are shown right after file selection.</p>

        <div class="form-group">
            <label for="directory" class="text-semibold">Directory Selection</label>
            <select name="directory" id="directory" class="form-control text-capitalize">
                @foreach ($directories as $dir)
                    <option value="{{ $dir }}" class="text-capitalize">{{ $dir }}</option>
                @endforeach
            </select>
        </div>

        <p class="text-semibold">Multiple file upload:</p>
        <form action="#" class="dropzone" id="dropzone_multiple"></form>
    </div>

    <div class="panel-footer">
        <div class="heading-elements">
            <button type="button" class="btn btn-primary heading-btn pull-right"><i class="icon-floppy-disk position-left"></i> Submit Files</button>
        </div>
    </div>
</div>
<!-- /multiple file upload -->
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $("#dropzone_multiple").dropzone({
            paramName: "file", // The name that will be used to transfer the file
            dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
            maxFilesize: 1.0 // MB
        });
    });
</script>
@endsection

