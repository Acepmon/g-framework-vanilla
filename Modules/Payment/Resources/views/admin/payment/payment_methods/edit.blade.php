@extends('themes.limitless.layouts.default')

@section('title', 'Edit Payment Method')

@section('load-before')

@endsection

@section('load')
    <script src="{{ asset('/limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('payment::admin.payment.payment_methods.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">

        <form action="{{ route('admin.modules.payment.payment_methods.update', $payment_method->code) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">
                        <a href="{{ route('admin.modules.payment.payment_methods.index') }}" class="btn btn-icon">
                            <span class="icon-arrow-left12"></span>
                        </a>
                        Payment Method: <strong>{{ $payment_method->name }}</strong>
                    </h6>

                    <div class="header-elements">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <span class="icon-floppy-disk mr-2"></span>
                            Save
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Payment method name..." value="{{ $payment_method->name }}">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input-styled" name="enabled" id="enabled" {{ $payment_method->enabled ? 'checked' : '' }} data-fouc>
                                Enabled
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @if ($payment_method->code === 'transaction')
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">
                        <a href="{{ route('admin.modules.payment.payment_methods.index') }}" class="btn btn-icon">
                            <span class="icon-arrow-left12"></span>
                        </a>
                        {{ $payment_method->name }} Datas
                    </h6>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Default Initialization
        $('.form-check-input-styled').uniform();
    });
</script>
@endsection

