@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/extensions/jquery_ui/core.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_select2.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Menu</span> Create Page</h4>
        <a href="#" class="header-elements-toggle text-default d-md-none">
            <i class="icon-more"></i>
        </a>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('admin.menus.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a></li>
            <span class="breadcrumb-item active">Menu</span>
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
            <div class="card-header">
                <h5 class="card-title">Horizontal form</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.menus.groups.store', ['menu' => $menu]) }}">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label col-lg-2">Group</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="group" name="group" type="text" value="{{ old('group') }}" required>
                                @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-default" href="javascript:history.back()" type="btn btn-primary"><i class="icon-arrow-left13 mr-2"></i>Back</a>
                        <button type="submit" class="btn btn-success">Add group<i class="icon-arrow-right14 mr-2"></i></button>
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
