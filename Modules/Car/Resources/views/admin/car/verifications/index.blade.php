@extends('themes.limitless.layouts.default')

@section('title', 'Doctor Verification Requests')

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
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Visibility</th>
                    <th>Author</th>
                    <th>Doctor Verifiied</th>
                    <th>Doctor Verifiied By</th>
                    <th>Doctor Verification File</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($contents as $group => $groupContents)
                <tr>
                    <th colspan="9" class="table-active">
                        <a data-toggle="collapse" class="text-default text-capitalize" href="#accordion-control-{{ $group }}">{{ $group }} ({{$groupContents->count()}})</a>
                    </th>
                </tr>
                <tbody id="accordion-control-{{ $group }}" class="collapse {{ $group == \App\Content::STATUS_PUBLISHED ? 'show' : '' }}" data-parent="#accordion-control">
                    @foreach($groupContents as $content)
                        <tr>
                            <td>{{$content->id}}</td>
                            <td>{{$content->title}}</td>
                            <td>
                                <a href="{{url($content->slug)}}" target="_blank">{{url($content->slug)}}</a>
                            </td>
                            <td>
                                <span class="badge badge-{{ $content->visibilityClass() }}">{{$content->visibility}}</span>
                            </td>
                            <td>
                                @include('themes.limitless.includes.user-media', ['user' => $content->author])
                            </td>
                            <td>{{ ($content->metaValue('doctorVerified') == 1)?'Yes':'No' }}</td>
                            <td>
                                @include('themes.limitless.includes.user-media', ['user' => \App\User::find($content->metaValue('doctorVerifiedBy')) ])
                            </td>
                            <td>
                                @if($content->metaValue('doctorVerificationFile'))
                                <a href="{{ url($content->metaValue('doctorVerificationFile')) }}" target="_blank"><span class="icon-link"></span></a>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-success color-white" href="#modal_verify" data-toggle="modal" onclick="verify_content({{ $content->id }})">Verify</a>
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
                <h5 class="modal-title">Verify?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to verify this content?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" id="verify_form">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <input type="hidden" name="doctorVerified" value="1" />
                    <input type="hidden" name="doctorVerifiedBy" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="doctorVerificationRequest" value="0" />

                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Verify</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->
@endsection

@section('script')
<script>
    window.verify_content = function(id) {
        $("#verify_form").attr('action', '/admin/modules/car/verifications/'+id);
    }

    //setTimeout(function(){ document.getElementById("timer").remove() }, 10000);
</script>
@endsection

