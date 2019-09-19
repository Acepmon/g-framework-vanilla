@if ($content)
<section class="first-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card vehicle-info-top shadow-soft-blue">
                    <div class="card-body text-left">
                        <div class="row">
                            <div class="col-md-9">
                            <h1 class="vehicle-title">{{ $content->title }}</h1>
                            <p class="vehicle-meta text-muted">18 years 04 lunar eclipses | 16,406 km | petrol | white | auto | direct | Suwon, Singal</p>
                            <div class="vehicle-price"> <i class="icon-tag"></i> Price: <span>12 Сая ₮</span> </div>
                            </div>
                            <div class="col-md-3 text-right d-flex justify-content-between flex-column">
                            <div class="vehicle-brand">Hyundai</div>
                            <div class="vehicle-id">Car ID: <span>#132456</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
