@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Show Page</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/menus/"><i class="icon-home2 position-left"></i> Home</a></li>
    </ul>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Simple panel -->
<div class="panel panel-flat">
</div>
<!-- /simple panel -->


<!-- Table -->
<div class="panel panel-flat">
</div>
<!-- /table -->


<!-- Grid -->
<div class="row">
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Horizontal form</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" action="#">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Menu Type</label>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $menu -> type}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Menu Name</label>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $menu -> name}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Menu URL</label>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $menu -> url}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Parent ID</label>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $menu -> parent_id}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">published</label>
                        <div class="col-lg-10">
                            <input type="text" value="{{ $menu -> published}}" class="form-control">
                        </div>
                    </div>

                    <div class="text-right">
                        <a type="" href="/menus/" class="btn btn-primary" >Back <i class="icon-arrow-right14 position-right"></i></a>
                        
                        <button type="button" class="btn btn-danger">Delete form </i></button>
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
