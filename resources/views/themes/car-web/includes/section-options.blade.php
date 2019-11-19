@if ($content)
    <section class="detail-items bg-white detail-option-information">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-section-title">
                        <p>
                            Option information
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="title">Exterior</div>
                    <div class="info-list">
                        <ul>
                            @foreach(\App\TermTaxonomy::where('taxonomy', 'car-exterior')->get() as $taxonomy)
                                @if ($content->metaValue($taxonomy->term->metaValue('metaKey')))
                                    <li><i class="fab fa fa-check"></i> {{ $taxonomy->term->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="title">Guts</div>
                    <div class="info-list">
                        <ul>
                            @foreach(\App\TermTaxonomy::where('taxonomy', 'car-guts')->get() as $taxonomy)
                                @if ($content->metaValue($taxonomy->term->metaValue('metaKey')))
                                    <li><i class="fab fa fa-check"></i> {{ $taxonomy->term->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="title">Safety</div>
                    <div class="info-list">
                        <ul>
                            @foreach(\App\TermTaxonomy::where('taxonomy', 'car-safety')->get() as $taxonomy)
                                @if ($content->metaValue($taxonomy->term->metaValue('metaKey')))
                                    <li><i class="fab fa fa-check"></i> {{ $taxonomy->term->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="title">Convenience</div>
                    <div class="info-list">
                        <ul>
                            @foreach(\App\TermTaxonomy::where('taxonomy', 'car-convenience')->get() as $taxonomy)
                                @if ($content->metaValue($taxonomy->term->metaValue('metaKey')))
                                    <li><i class="fab fa fa-check"></i> {{ $taxonomy->term->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
