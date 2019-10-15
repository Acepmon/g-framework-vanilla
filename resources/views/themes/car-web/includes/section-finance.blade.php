@if ($content)
    <section class="mainPage-items bg-light text-center mt-5 finance-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center ">
                    <div class="finance-title">
                        <h1>This car I want to buy, how much is the month?</h1>
                        <p>Save your money and make an installment.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow-soft-blue">
                        <div class="card-body text-left">
                            <form>
                                <input type="text" value="{{ $content->metaValue('priceAmount') }}" name="carPrice" id="carPrice" hidden>
                                <p>Advance payment (first 20%)</p>
                                <div class="select-first-price">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="20%" name="advancePaymentPercent" value="20" class="advancePayment custom-control-input" checked>
                                        <label class="custom-control-label" for="20%">20%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="30%" name="advancePaymentPercent" value="30" class="advancePayment custom-control-input">
                                        <label class="custom-control-label" for="30%">30%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="40%" name="advancePaymentPercent" value="40" class="advancePayment custom-control-input">
                                        <label class="custom-control-label" for="40%">40%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="50%" name="advancePaymentPercent" value="50" class="advancePayment custom-control-input">
                                        <label class="custom-control-label" for="50%">50%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="60%" name="advancePaymentPercent" value="60" class="advancePayment custom-control-input">
                                        <label class="custom-control-label" for="60%">60%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="70%" name="advancePaymentPercent" value="70" class="advancePayment custom-control-input">
                                        <label class="custom-control-label" for="70%">70%</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="80%" name="advancePaymentPercent" value="80" class="advancePayment custom-control-input">
                                        <label class="custom-control-label" for="80%">80%</label>
                                    </div>
                                </div>
                                <p>Installment period</p>
                                <div class="select-month">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="6month" name="loanTerm" value="6" class="loanTerm custom-control-input" checked>
                                        <label class="custom-control-label" for="6month">6 month</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="12month" name="loanTerm" value="12" class="loanTerm custom-control-input" checked>
                                        <label class="custom-control-label" for="12month">12 month</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="18month" name="loanTerm" value="18" class="loanTerm custom-control-input">
                                        <label class="custom-control-label" for="18month">18 month</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="24month" name="loanTerm" value="24" class="loanTerm custom-control-input">
                                        <label class="custom-control-label" for="24month">24 month</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="30month" name="loanTerm" value="30" class="loanTerm custom-control-input">
                                        <label class="custom-control-label" for="30month">30 month</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card monthly-payment">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="payment-information">
                                <div class="info">
                                    <p>First pay</p>
                                    <p class="font-weight-bold"><span id="advancePaymentAmount">1,400,000</span> ₮</p>
                                </div>
                                <div class="info">
                                    <p>Monthly paymant</p>
                                    <p class="monthly"><span id="monthlyPaymentAmount">427,938</span> ₮</p>
                                </div>
                            </div>
                            <a class="btn btn-light btn-round btn-block my-3 shadow-soft-blue p-2" href="#" data-toggle="modal"
                            data-target="#modalLoanCalculator" data-whatever="@getbootstrap">loan calculator</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('themes.car-web.includes.modal-loan-check')
@endif

@push('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function PMT(rate, nper, pv, fv, type) {
    if (!fv) fv = 0;
    if (!type) type = 0;

    if (rate == 0) return -(pv + fv)/nper;

    var pvif = Math.pow(1 + rate, nper);
    var pmt = rate / (pvif - 1) * -(pv * pvif + fv);

    if (type == 1) {
        pmt /= (1 + rate);
    };

    return pmt;
}

function monthlyInterestCalculation(loanTerm) {
    switch (parseInt(loanTerm)) {
        case 6: return 2.5;
        case 12: return 2.5;
        case 18: return 2.6;
        case 24: return 2.7;
        case 30: return 2.8;
    }
}

function loanAmountCalculation(carPrice, advancePaymentAmount) {
    return carPrice - advancePaymentAmount;
}

function loanCalculation(price, advancePayment, loanTerm) {
    var advancePaymentAmount = price / 100 * advancePayment;
    var loanAmount = loanAmountCalculation(price, advancePaymentAmount);
    var monthlyInterest = monthlyInterestCalculation(loanTerm);
    var yearlyInterest = monthlyInterest * 12;
    var interestPaymentMonthly = 0;
    var monthlyPaymentAmount = Math.round((PMT(monthlyInterest / 100, loanTerm - interestPaymentMonthly, -loanAmount, 0, 0)), 2);

    return {
        price,
        advancePayment,
        loanTerm,
        loanAmount,
        monthlyInterest,
        yearlyInterest,
        advancePaymentAmount,
        monthlyPaymentAmount
    }
}

function calculate(carPrice, advancePayment, loanTerm) {
    var result = loanCalculation(parseFloat(carPrice), parseInt(advancePayment), parseInt(loanTerm));
    $("#advancePaymentAmount").html(number_format(result.advancePaymentAmount));
    $("#monthlyPaymentAmount").html(number_format(result.monthlyPaymentAmount));
}

$(document).ready(function() {
    $(".advancePayment").change(function () {
        calculate($("#carPrice").val(), $(".advancePayment:checked").val(), $(".loanTerm:checked").val());
    });

    $(".loanTerm").change(function () {
        calculate($("#carPrice").val(), $(".advancePayment:checked").val(), $(".loanTerm:checked").val());
    });

    calculate($("#carPrice").val(), $(".advancePayment:checked").val(), $(".loanTerm:checked").val());
});

</script>
@endpush
