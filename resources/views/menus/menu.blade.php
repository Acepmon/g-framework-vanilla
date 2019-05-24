@extends('layouts.admin')

@section('load')
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

<!-- Simple panel -->
<div class="panel panel-flat">
    
</div>
<!-- /simple panel -->


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
        
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu Type</th>
                    <th>Menu Name</th>
                    <th>Menu URL</th>
                    <th>Parent ID</th>
                    <th>Published</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menu as $data){
                <tr>
                    <th>{{ $data -> id}}</th> <br>
                    <th>{{ $data -> name}}</th> <br>
                    <th>{{ $data -> age}}</th> <br>
                    <th>{{ $data -> address}}</th>
                </tr>
                }
                @endforeach
                <tr>
                    <td ><a href="/menus/create" id="1">1</a></td>
                    <td >Menu Type</td>
                    <td >Menu Name</td>
                    <td >Menu URL</td>
                    <td >Menu Name</td>
                    <td >Menu URL</td>
                </tr>
                <!-- <tr>
                    <td id="3" >2</td>
                    <td >Victoria</td>
                    <td >Baker</td>
                    <td >@Vicky</td>
                    <td >Baker</td>
                    <td >@Vicky</td>
                </tr>
                <tr>
                    <td id="2">3</td>
                    <td >James</td>
                    <td >Alexander</td>
                    <td >@Alex</td>
                    <td >Alexander</td>
                    <td >@Alex</td>
                </tr>
                <tr>
                    <td id="4">4</td>
                    <td >Franklin</td>
                    <td >Morrison</td>
                    <td >Morrison</td>
                    <td >@Frank</td>
                    <td >@Frank</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>
<!-- /table -->


<!-- Grid -->
<div class="row">
    
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
