@extends('themes.limitless.layouts.default')

@section('title', 'Localizations')

@section('load-before')

@endsection

@section('load')

@endsection

@section('pageheader')
    @include('admin.localizations.includes.pageheader')
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Localizations</h6>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Locale</th>
                <th>Language Files</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($localizations as $locale => $langFiles)
                <tr>
                    <td>
                        <img src="{{ asset('limitless/bootstrap4/images/lang/' . $locale . '.png') }}" alt=""> {{ \App\Locale::getByCode($locale) }}
                    </td>
                    <td>{{ count($langFiles) }}</td>
                    <td>

                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')

@endsection

