@extends('layouts.admin')

@section('load')
<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/core.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/effects.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/extensions/cookie.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/trees/fancytree_all.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/trees/fancytree_childcounter.js"></script>

<script type="text/javascript" src="/assets/js/core/app.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Index Page</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="2_col.html">Starters</a></li>
        <li class="active">2 columns</li>
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
@if (false)
<!-- Table -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Basic table</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Create menu<i class="icon-arrow-right14 position-right"></i></a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Link</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Visibility</th>
                    <th>Order</th>
                    <th>Sublevel</th>
                    <th>Parent ID</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $data)
                <tr>
                    <td>{{ $data->id}}</td>
                    <td>{{ $data->type}}</td>
                    <td>{{ $data->title}}</td>
                    <td>{{ $data->subtitle}}</td>
                    <td>{{ $data->link}}</td>
                    <td>{{ $data->icon}}</td>
                    <td>{{ $data->status}}</td>
                    <td>{{ $data->visibility}}</td>
                    <td>{{ $data->order}}</td>
                    <td>{{ $data->sublevel}}</td>
                    <td>
                        @if (!empty($data->parent_id))
                        <a href="{{ route('admin.menus.show', ['id' => $data->parent_id]) }}">{{ $data->parent->name }}</a>
                        @endif
                    </td>
                    <td><a href='{{ route('admin.menus.show', ['id' => $data->id]) }}' type="btn btn-primary">Show</a> </td>
                    <td><a href='{{ route('admin.menus.edit', ['id' => $data->id]) }}' type="btn btn-primary">Edit</a> </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="delete_confirm({{ $data->id }})"><i class="icon-trash"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /table -->
@endif

<!-- Table tree -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Table tree</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        The following example demonstrates rendered tree as a table (aka tree grid) and support keyboard navigation in a grid with embedded input controls. Table functionality is based on Fancytree's <code>table.js</code> extension. The tree table extension takes care of rendering the node into one of the columns. Other columns have to be rendered in the <code>renderColumns</code> event.
    </div>

    <div class="table-responsive">
        <table class="table table-bordered tree-table">
            <thead>
                <tr>
                    <th style="width: 46px;"></th>
                    <th style="width: 80px;">#</th>
                    <th>Items</th>
                    <th style="width: 80px;">Key</th>
                    <th style="width: 46px;">Like</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /table tree -->

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this record?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="/admin/menus/0">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->
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
                nodeColumnIdx: 2,     // render the node title into the 2nd column
                checkboxColumnIdx: 0  // render the checkboxes into the 1st column
            },
            source: {
                url: "/assets/demo_data/fancytree/fancytree.json"
            },
            lazyLoad: function(event, data) {
                data.result = {url: "ajax-sub2.json"}
            },
            renderColumns: function(event, data) {
                var node = data.node,
                $tdList = $(node.tr).find(">td");

                // (index #0 is rendered by fancytree by adding the checkbox)
                $tdList.eq(1).text(node.getIndexHier()).addClass("alignRight");

                // (index #2 is rendered by fancytree)
                $tdList.eq(3).text(node.key);
                $tdList.eq(4).addClass('text-center').html("<input type='checkbox' class='styled' name='like' value='" + node.key + "'>");

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
