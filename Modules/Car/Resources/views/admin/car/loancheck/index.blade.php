@extends('themes.limitless.layouts.default')

@section('title', 'Loan Check Requests')

@section('load')
@endsection

@section('pageheader')
    @include('car::admin.car.includes.pageheader')
@endsection

@section('content')

<div class="card">
    @if (session('status'))
        <div id="timer" class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="table-responsive" id="accordion-control">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Registration Number</th>
                    <th>Phone</th>
                    <th>Author</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($contents as $group => $groupContents)
                <tr>
                    <th colspan="9" class="table-active">
                        <a data-toggle="collapse" class="text-default text-capitalize" href="#accordion-control-{{ $group }}">{{ $group }} ({{$groupContents->count()}})</a>
                    </th>
                </tr>
                <tbody id="accordion-control-{{ $group }}" class="collapse {{ $group == \App\Content::STATUS_PENDING ? 'show' : '' }}" data-parent="#accordion-control">
                    @foreach($groupContents as $content)
                        <tr>
                            <td>{{$content->id}}</td>
                            <td>{{$content->metaValue('name')}}</td>
                            <td>{{$content->metaValue('registrationNumber')}}</td>
                            <td>{{$content->metaValue('phone')}}</td>
                            <td>
                                @include('themes.limitless.includes.user-media', ['user' => $content->author])
                            </td>
                            <td class="text-center">
                                <a class="btn btn-success color-white" href="#modal_verify" data-toggle="modal" onclick="verify_content({{ $content->id }})">Mark as checked</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
</div>

<!-- Danger modal -->
<div id="modal_verify" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Mark as check?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to mark this content as checked?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" id="verify_form">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <input type="hidden" name="checked" value="1" />

                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->
@endsection

@section('script')
<script>
    console.log(" {{ route('admin.modules.car.update', ['id' => 1]) }} ");

    window.verify_content = function(id) {
        $("#verify_form").attr('action', '/admin/modules/car/loan-check/'+id);
    }

    setTimeout(function(){ document.getElementById("timer").remove() }, 10000);
</script>
@endsection

