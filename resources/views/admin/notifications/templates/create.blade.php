@extends('themes.limitless.layouts.default')

@section('title', 'New Notification Template')

@section('load')

@endsection

@section('pageheader')
    @include('admin.notifications.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('admin.notifications.templates.store') }}" method="POST">
            @csrf
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Add New Template</h5>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Daily subscription mail envoyes..." required>
                    </div>

                    <div class="form-group">
                        <label for="type">Type <span class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-control text-capitalize" required>
                            @foreach ($types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('admin.notifications.templates.index') }}" class="btn btn-light">List</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')

@endsection

