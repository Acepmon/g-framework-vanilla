@extends('themes.limitless.layouts.default')

@section('title', 'Payment Methods')

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
            <div class="card-header">
                <h5 class="card-title">Payment Methods</h5>
            </div>
        
            <div class="card-body">
                <p>
                    You can add cards, bank accounts, and other payment methods to {{ config('app.name') }}
                </p>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Enabled</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($payment_methods as $index => $payment_method)
                        <tr>
                            <td>{{ $index + 1 }}</td>
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
                            <td>
                                <a href="#" data-toggle="dropdown">
                                    <i class="icon-menu9 text-secondary"></i>
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.modules.payment.payment_methods.show', ['code' => $payment_method->code]) }}"><i class="icon-eye"></i> View</a>
                                    <a class="dropdown-item" href="{{ route('admin.modules.payment.payment_methods.edit', ['code' => $payment_method->code]) }}"><i class="icon-pencil"></i> Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection

