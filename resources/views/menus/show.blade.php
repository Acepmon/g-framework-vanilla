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
                <form class="form-horizontal" method="POST" action="/menus/{{ $menu -> id }}">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            {{$menu -> type}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            {{$menu -> title}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Subtitle</label>
                        <div class="col-lg-10">
                            {{$menu -> subtitle}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Link</label>
                        <div class="col-lg-10">
                            {{$menu -> link}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-10">
                            {{$menu -> icon}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            {{$menu -> status}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Visibility</label>
                        <div class="col-lg-10">
                            {{$menu -> visibility}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Order</label>
                        <div class="col-lg-10">
                            {{$menu -> order}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Sublevel</label>
                        <div class="col-lg-10">
                            {{$menu -> sublevel}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Parent ID</label>
                        <div class="col-lg-10">
                            @if(!empty($menu->parent_id))
                            {{$menu->parent->name}}
                            @endif
                        </div>
                    </div>

                    <div class="text-right">
                        <a type="button" href="/menus/" class="btn btn-default" ><i class="icon-arrow-left13 position-left"></i> Back</a>
                        
                        <!-- <a type="submit" class="btn btn-danger">Delete form </i></a> -->
                        <a type="button" href="/menus/{{ $menu -> id}}/edit" class="btn btn-primary">Edit</i> <i class="icon-arrow-right14 position-left"></i> </a>
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
