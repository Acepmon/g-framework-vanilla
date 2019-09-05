@extends('themes.limitless.layouts.default')

@section('load')
{{--<!-- Theme JS files -->--}}
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_checkboxes_radios.js') }}"></script>
<!-- /theme JS files -->
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Permission</span> Edit Page</h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.permissions.index') }}">Permissions</a>
            <a class="breadcrumb-item" href="{{ route('admin.permissions.show', ['id' => $permission->id]) }}">Permission Detail</a>
            <span class="breadcrumb-item active">Permission Edit</span>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')


<div class="d-md-flex align-items-md-start">

    <div class="container-fluid">
<!-- Grid -->

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
                <!-- <form method="put" action="" class="form-horizontal"> -->
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="row">
                <div class="col-lg-9">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                        @csrf
                        @method ('PUT')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Title</label>
                                <div class="col-lg-10">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $permission->title }}" required autocomplete="title" autofocus>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <label for="type" class="col-form-label col-lg-2">Type</label>
                                <div class="col-lg-10">
                                    <select id="type" name="type" required="required" class="form-control text-capitalize">
                                        @foreach(App\Permission::TYPE_ARRAY as $value)
                                        <option value="{{ $value }}" {{ ($value === $permission->type)?'selected':'' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Description</label>
                                <div class="col-lg-10">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" value="{{ $permission->description }}" required autocomplete="description" autofocus>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Edit menu<i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    <div class="form-group row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Check</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div style="display: none">{{$i=1}}</div>
                            @foreach($users as $data)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $data->username}}</td>
                                    <td>
                                        <div class="checkbox checkbox-switch">
                                            <label>
                                                <input type="checkbox" data-off-color="danger" name="is_granted" data-on-text="Yes" data-off-text="No" class="switch" {{$data -> is_granted == 1 ? 'checked':''}}>
                                            </label>
                                        </div>{{ $data->is_granted }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->
<!-- /grid -->
</div>
</div>

@endsection

@section('script')
@endsection
