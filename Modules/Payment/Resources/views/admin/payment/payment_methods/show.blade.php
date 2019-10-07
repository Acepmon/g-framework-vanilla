@extends('themes.limitless.layouts.default')

@section('title', 'Payment Method Details')

@section('load-before')

@endsection

@section('load')

@endsection

@section('pageheader')
    @include('payment::admin.payment.payment_methods.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">
                    <a href="{{ route('admin.modules.payment.payment_methods.index') }}" class="btn btn-icon">
                        <span class="icon-arrow-left12"></span>
                    </a>
                    Payment Method Details
                </h6>

                <div class="header-elements">
                    <a href="{{ route('admin.modules.payment.payment_methods.edit', $payment_method->code) }}" class="btn btn-light btn-sm">
                        <span class="icon-pencil mr-2"></span>
                        Edit
                    </a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Enabled</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            @include('payment::admin.payment.payment_methods.includes.method-media', $payment_method)
                        </td>
                        <td>
                            @if ($payment_method->enabled)
                                <span class="icon-check text-success"></span> Enabled
                            @else
                                <span class="icon-cross text-muted"></span> Disabled
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if ($payment_method->code == 'transaction')
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">
                        <a href="{{ route('admin.modules.payment.payment_methods.index') }}" class="btn btn-icon">
                            <span class="icon-arrow-left12"></span>
                        </a>
                        {{ $payment_method->name }} Datas
                    </h6>

                    <div class="header-elements">
                        <a href="{{ route('admin.modules.payment.payment_methods.edit', $payment_method->code) }}" class="btn btn-light btn-sm">
                            <span class="icon-pencil mr-2"></span>
                            Edit
                        </a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Bank Name</th>
                            <th>Account No</th>
                            <th>Account Name</th>
                            <th>Account Currency</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($payment_method->data() as $data)
                            <tr>
                                <td>{{ $data->bankName }}</td>
                                <td>{{ $data->accountNo }}</td>
                                <td>{{ $data->accountName }}</td>
                                <td>{{ $data->accountCurrency }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection

@section('script')

@endsection

