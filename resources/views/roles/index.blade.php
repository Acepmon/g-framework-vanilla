@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Roles</span></h4>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<div class="text-right" style="padding-bottom: 5px">
    <a href="/roles/create" class="btn btn-primary">Create Role</a>
</div>

<div class="panel panel-flat">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            @foreach($Roles as $role)
                <tr>                    
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    <td style="width:50px">
                        <form action="/roles/{{ $role->id }}" method="GET">
                        {{ csrf_field() }}
                            <button type="submit" class="btn">View</button>
                        </form>
                    </td>
                    <td style="width:50px">
                        <form action="/roles/{{ $role->id }}/edit" method="GET">
                        {{ csrf_field() }}
                            <button type="submit" class="btn">Edit</button>
                        </form>
                    </td>
                    <td style="width:50px">
                        <button data-toggle="modal" data-target="#modal_theme_danger" type="submit" class="btn" onclick="choose_role({{ $role->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this role?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" id="delete_form">
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
    window.choose_role = function(id) {
        $("#delete_form").attr('action', '/roles/'+id);
    }
</script>
@endsection
