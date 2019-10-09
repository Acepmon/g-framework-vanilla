@if ($content)
    <div class="card border-0">
        <div class="vehicle-imgSlider owl-carousel owl-theme" data-slider-id="1">
            @foreach ($content->metaArray('medias') as $media)
                <div class="vi-slider-item">
                    <img src="{{ $media }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="owl-thumbs" data-slider-id="1"> </div>
    </div>
@endif
