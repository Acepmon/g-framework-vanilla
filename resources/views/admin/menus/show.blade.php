@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery_ui/core.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery_ui/effects.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/extensions/cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/trees/fancytree_all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/trees/fancytree_childcounter.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Show Page</h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.menus.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
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
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            {{$menu->type}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            {{$menu->title}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Subtitle</label>
                        <div class="col-lg-10">
                            {{$menu->subtitle}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Link</label>
                        <div class="col-lg-10">
                            {{$menu->link}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-10">
                            {{$menu->icon}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            {{$menu->status}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Visibility</label>
                        <div class="col-lg-10">
                            {{$menu->visibility}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Order</label>
                        <div class="col-lg-10">
                            {{$menu->order}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Sublevel</label>
                        <div class="col-lg-10">
                            {{$menu->sublevel}}
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
                        <a type="button" href="javascript:history.back()" class="btn btn-default" ><i class="icon-arrow-left13 position-left"></i> Back</a>

                        <!-- <a type="submit" class="btn btn-danger">Delete form </i></a> -->
                        <a type="button" href="{{ route('admin.menus.edit', ['id' => $menu->id]) }}" class="btn btn-primary">Edit</i> <i class="icon-arrow-right14 position-left"></i> </a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>

    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <div style="display: none">{{$i=1}}</div>
                        @foreach($menu->groups as $data)
                        <tr>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->title}}</td>
                            <td>{{ $data->description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /grid -->

<!-- Table tree -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Submenus</h6>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered tree-table">
            <thead>
                <tr>
                    <th style="width: 80px;">#</th>
                    <th>Title</th>
                    <th style="width: 100px;">Link</th>
                    <th style="width: 50px;">Status</th>
                    <th style="width: 50px;">Visibility</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- /table tree -->

@endsection

@section('script')
<script>
    window.delete_confirm = function(id) {
        $("#delete_form").attr('action', '/admin/menus/'+id);
    }

    $(document).ready(function () {


        //
        // Table tree
        //

        $(".tree-table").fancytree({
            extensions: ["table", "dnd"],
            checkbox: true,
            table: {
                indentation: 20,      // indent 20px per node level
                nodeColumnIdx: 1,     // render the node title into the 2nd column
                checkboxColumnIdx: 0  // render the checkboxes into the 1st column
            },
            source: {
                url: "/admin/menus/tree?parent_id={{$menu->id}}"

            },
            lazyLoad: function(event, data) {
                data.result = {url: "ajax-sub2.json"}
            },
            renderColumns: function(event, data) {
                var node = data.node;

                console.log(node);

                $tdList = $(node.tr).find(">td");

                $tdList.eq(0).text(node.getIndexHier()).addClass("alignRight");

                $tdList.eq(2).addClass('text-left').html("<a href='" + node.data.link + "' style='display: block;max-width: 150px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;'>" + node.data.link + "</a>");
                $tdList.eq(3).addClass('text-left').html("<span class='label label-" + node.data.statusClass + "'>" + node.data.status + "</a>");
                $tdList.eq(4).addClass('text-center').html("<span class='" + node.data.visibilityIcon + "'></a>");

                // Style checkboxes
                $(".styled").uniform({radioClass: 'choice'});
            }
        });

        // Handle custom checkbox clicks
        $(".tree-table").delegate("input[name=like]", "click", function (e){
            var node = $.ui.fancytree.getNode(e),
            $input = $(e.target);
            e.stopPropagation(); // prevent fancytree activate for this row
            if($input.is(":checked")){
                alert("like " + $input.val());
            }
            else{
                alert("dislike " + $input.val());
            }
        });
    });
</script>
@endsection
