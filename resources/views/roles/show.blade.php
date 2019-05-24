@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Role create</span></h4>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->
<div class="row">
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$role->name}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$role->description}}</label>
                    </div>
                </div>
                <div class="text-right" style="padding-bottom: 5px">
                    <a href="/roles" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
