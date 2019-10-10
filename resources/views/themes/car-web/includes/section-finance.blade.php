@if ($content)
<section class="mainPage-items bg-light text-center mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center finance-section">
                <div class="finance-title">
                    <h1>This car I want to buy, how much is the month?</h1>
                    <p>Save your money and make an installment.</p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow-soft-blue">
                            <div class="card-body text-left">
                                <form>
                                    <p>Advance payment (first 20%)</p>
                                    <div class="select-first-price">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="20%" name="firstPrice" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="20%">20%</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="30%" name="firstPrice" class="custom-control-input">
                                            <label class="custom-control-label" for="30%">30%</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="40%" name="firstPrice" class="custom-control-input">
                                            <label class="custom-control-label" for="40%">40%</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="50%" name="firstPrice" class="custom-control-input">
                                            <label class="custom-control-label" for="50%">50%</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="60%" name="firstPrice" class="custom-control-input">
                                            <label class="custom-control-label" for="60%">60%</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="70%" name="firstPrice" class="custom-control-input">
                                            <label class="custom-control-label" for="70%">70%</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="80%" name="firstPrice" class="custom-control-input">
                                            <label class="custom-control-label" for="80%">80%</label>
                                        </div>
                                    </div>
                                    <p>Installment period</p>
                                    <div class="select-month">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="6month" name="financeMonth" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="6month">6 month</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="12month" name="financeMonth" class="custom-control-input">
                                            <label class="custom-control-label" for="12month">12 month</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="24month" name="financeMonth" class="custom-control-input">
                                            <label class="custom-control-label" for="24month">24 month</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="48month" name="financeMonth" class="custom-control-input">
                                            <label class="custom-control-label" for="48month">48 month</label>
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
                                        <p class="font-weight-bold">1,400,000 $</p>
                                    </div>
                                    <div class="info">
                                        <p>Monthly paymant</p>
                                        <p class="monthly">427,938 $</p>
                                    </div>
                                </div>
                                <a class="btn btn-light btn-round btn-block my-3 shadow-soft-blue p-2" href="#" data-toggle="modal"
                                data-target="#modalLoanCalculator" data-whatever="@getbootstrap">loan calculator</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('modals')
<div class="modal fade" id="modalLoanCalculator" tabindex="-1" role="dialog" aria-labelledby="modalLoanCalculatorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="loan-check" method="post" action="{{ route('ajax.contents.store') }}">
            @csrf
            <div class="modal-body px-5">
                <div class="maz-modal-title">Check loan condition</div>
                <div class="maz-modal-desc">Please fill this form than we will contact you as soon as possible</div>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Your name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <input type="hidden" name="title" value="Loan Check">
                    <input type="hidden" name="slug" value="{{ \Str::uuid() }}">
                    <input type="hidden" name="type" value="{{ \App\Content::TYPE_LOAN_CHECK }}">
                    <input type="hidden" name="status" value="{{ \App\Content::STATUS_DRAFT }}">
                    <input type="hidden" name="visibility" value="{{ \App\Content::VISIBILITY_PUBLIC }}">

                    <label for="reg-num" class="col-form-label">Registration number:</label> 
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <select id="reg-letter-1" class="form-control">
                                <option>А</option>
                                <option>Б</option>
                                <option>В</option>
                                <option>Г</option>
                                <option>Д</option>
                                <option>Е</option>
                                <option>Ё</option>
                                <option>Ж</option>
                                <option>З</option>
                                <option>И</option>
                                <option>Й</option>
                                <option>К</option>
                                <option>Л</option>
                                <option>М</option>
                                <option>Н</option>
                                <option>О</option>
                                <option>Ө</option>
                                <option>П</option>
                                <option>Р</option>
                                <option>С</option>
                                <option>Т</option>
                                <option>У</option>
                                <option>Ү</option>
                                <option>Ф</option>
                                <option>Х</option>
                                <option>Ц</option>
                                <option>Ч</option>
                                <option>Ш</option>
                                <option>Э</option>
                                <option>Ю</option>
                                <option>Я</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <select id="reg-letter-2" class="form-control">
                                <option>А</option>
                                <option>Б</option>
                                <option>В</option>
                                <option>Г</option>
                                <option>Д</option>
                                <option>Е</option>
                                <option>Ё</option>
                                <option>Ж</option>
                                <option>З</option>
                                <option>И</option>
                                <option>Й</option>
                                <option>К</option>
                                <option>Л</option>
                                <option>М</option>
                                <option>Н</option>
                                <option>О</option>
                                <option>Ө</option>
                                <option>П</option>
                                <option>Р</option>
                                <option>С</option>
                                <option>Т</option>
                                <option>У</option>
                                <option>Ү</option>
                                <option>Ф</option>
                                <option>Х</option>
                                <option>Ц</option>
                                <option>Ч</option>
                                <option>Ш</option>
                                <option>Э</option>
                                <option>Ю</option>
                                <option>Я</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="number" class="form-control" id="reg-num">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">Phone number:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="modal-footer pb-5">
                    <button type="button" id="btnSendLoanCheck" class="btn btn-danger btn-round px-5 py-2 shadow-red">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@endif

<script>
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function(){
    $("#btnSendLoanCheck").on('click', function() {
        var paramObjs = {};
        paramObjs['registrationNumber'] = $("#reg-letter-1").val() + $("#reg-letter-2").val() + $("#reg-num").val();
        $.each($('#loan-check').serializeArray(), function(_, kv) {
            paramObjs[kv.name] = kv.value;
        });

        @auth
        alert("Only guest users can send loan check");
        @else
        $("#demo-spinner").css({'display': 'block'});
        $.ajax({
            type: 'POST',
            url: '{{ route('ajax.contents.store') }}',
            data: paramObjs
        }).done(function(data) {
            setCookie('guest_id', data['author_id'], 1);
            $("#demo-spinner").css({'display': 'none'});
            $("#modalLoanCalculator").modal('hide');
        }).fail(function(err) {
            $("#demo-spinner").css({'display': 'none'});
            console.error("FAIL!");
            console.error(err);
        });
        @endauth
    });
});

function setCookie(key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }
</script>