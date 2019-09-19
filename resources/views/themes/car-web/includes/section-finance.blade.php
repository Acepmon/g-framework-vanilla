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
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <input type="email" class="form-control" id="inputEmail4" placeholder="First price ₮">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control">
                                                <option>20%</option>
                                                <option>30%</option>
                                                <option>40%</option>
                                                <option>50%</option>
                                                <option>60%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p>Installment period</p>
                                    <div class="select-month">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="6month" name="financeMonth" class="custom-control-input">
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
                            <div class="card-body">
                                <h3>Monthly payment</h3>
                                <div class="monthly">486,271 $</div>
                                <div class="info">
                                    <p>1 year interest:</p>
                                    <p class="font-weight-bold">427,938 $</p>
                                </div>
                                <div class="info">
                                    <p>total cost</p>
                                    <p class="font-weight-bold">24,427,938 $</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
