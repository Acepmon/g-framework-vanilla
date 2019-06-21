@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit {{ ucfirst($term_taxonomy->taxonomy) }} Meta Details</span></h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.taxonomy.index', ['taxonomy' => $term_taxonomy->taxonomy]) }}">{{ ucfirst($term_taxonomy->taxonomy) }} List</a></li>
        <li><a href="{{ route('admin.taxonomy.show', ['id' => $taxonomy->id]) }}">Detail</a></li>
        <li class="active">Edit Meta</li>
    </ul>

    <ul class="breadcrumb-elements">
        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-gear position-left"></i>
                Dropdown
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
            </ul>
        </li>
    </ul>
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
                <form class="form-horizontal" action="{{ route('admin.taxonomy.metas.update', ['taxonomy' => $taxonomy->id, 'meta' => $meta->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">Key<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="key" placeholder="Enter key..." required="required" aria-required="true" invalid="true" value="{{$meta->key}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Value<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="value" placeholder="Enter value..." required="required" aria-required="true" invalid="true" value="{{$meta->value}}">
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
