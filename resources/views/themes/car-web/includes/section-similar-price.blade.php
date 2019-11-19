@if (count($contents) > 0)
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Similar price</h2>
                <span>
                    <a href="/buy">Бүгдийг харах ({{ count($contents) }})</a>
                    <div class="more-arrow"></div>
                </span>
            </div>
        </div>
    </div>
    <div class="card-list usedInMn">
        <div class="container">
            <div class="row">
                <div class="card-slide owl-carousel owl-theme">
                    @foreach ($contents as $content)
                        <div class="card">
                            <div class="brand-name"></div>
                            <div class="card-img">
                                <img src="{{ asset('car-web/img/Cars/1.jpg') }}" class="img-fluid" alt="alt">
                                <div class="info">
                                <span class="carIcon-engine">
                                    <p>1499 L</p>
                                </span>
                                <span class="carIcon-car-6">
                                    <p>52,000 KM</p>
                                </span>
                                <span class="carIcon-gas-station">
                                    <p>Gasoline</p>
                                </span>
                                <span class="carIcon-gearshift">
                                    <p>Automatic</p>
                                </span>
                                <span class="carIcon-steering-wheel">
                                    <p>Right wheel</p>
                                </span>
                                <span class="color" data-color="white">
                                    <p>White</p>
                                </span>
                                </div>
                                <div class="card-caption">
                                    <div class="meta">2006/2013 | 17,820km | Gasoline</div>
                                    <div class="favorite">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body shadow">
                                <div class="card-description">
                                    <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                    <div class="card-meta">
                                        <div class="status">Change / Finance</div>
                                        <div class="price">12 Сая ₮</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
