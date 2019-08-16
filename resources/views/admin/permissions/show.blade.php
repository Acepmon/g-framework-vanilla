@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Permission</span> Detail Page</h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.permissions.index') }}">Permissions</a>
            <span class="breadcrumb-item active">Permission Detail</span>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->
<div class="row">
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Horizontal form</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form class="form-horizontal" method="POST" action="/permissions/{{ $permission->id }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            {{$permission->title}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            {{$permission->type}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            {{$permission->description}}
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-primary" ><i class="icon-arrow-left13 mr-1"></i> Back</a>

                        <!-- <a type="submit" class="btn btn-danger">Delete form </i></a> -->
                        <a type="button" href="{{ route('admin.permissions.edit', ['id' => $permission->id]) }}" class="btn btn-warning">Edit</i> <i class="icon-arrow-right14 position-left"></i> </a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>

    <div class="col-md-6">

        <!-- /vertical form -->

    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
