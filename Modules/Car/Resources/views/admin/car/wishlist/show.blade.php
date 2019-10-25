@extends('themes.limitless.layouts.default')

@section('title', 'Related Cars')

@section('load')

@endsection

@section('pageheader')
    @include('car::admin.car.includes.pageheader')
@endsection

@section('content')
<div class="card">
    <table class="table table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Wanna Buy</th>
                <th>Price Range</th>
                <th>User</th>
                <th>Phone</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ $content->id }}</td>
                <td>{{ $content->title }}</td>
                <td>
                    <strong>Starts At:</strong> {{ number_format($content->metaValue('priceAmountStart')) }} {{ $content->metaValue('priceUnit') }}
                    <br>
                    <strong>Ends At:</strong> {{ number_format($content->metaValue('priceAmountEnd')) }} {{ $content->metaValue('priceUnit') }}
                </td>
                <td>
                    @include('themes.limitless.includes.user-media', ['user' => $content->author])
                </td>
                <td>{{ $content->author->metaValue('phone') }}</td>
                <td>
                    {{ $content->created_at->diffForHumans() }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card">
    <div class="card-header">
        <h6 class="card-title">Similar Cars</h6>
    </div>

    <div class="table-responsive" id="accordion-control">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Visibility</th>
                    <th>Author</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($relatedCars as $group => $groupContents)
                <tr>
                    <th colspan="6" class="table-active">
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
                            <td class="text-center">
                                <a href="#" data-toggle="dropdown">
                                    <i class="icon-menu9 text-secondary"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.modules.car.show', ['id' => $content->id]) }}">View</a>
                                    <a class="dropdown-item" href="{{ route('admin.modules.car.edit', ['id' => $content->id]) }}">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('script')

@endsection

