@push('styles')
    <style>
        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed #ddd;
            border-image: none;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endpush

@if ($content)
    <section class="section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card vehicle-info-top shadow-soft-blue">
                        <div class="card-body text-left">
                            <div class="row">
                                <div class="col-md-7">
                                    @if ($content->title)
                                        <h1 class="vehicle-title">{{ $content->title }}</h1>
                                    @endif

                                    @if ($content->metaArray('advantages'))
                                        <p class="vehicle-meta text-muted">{{ implode(' | ', $content->metaArray('advantages')->toArray()) }}</p>
                                    @endif

                                    <div class="d-flex align-items-center">
                                        @if ($content->metaValue('priceAmount'))
                                            <div class="vehicle-price"> <i class="icon-tag"></i> Price: <span>{{ numerizePrice($content->metaValue('priceAmount')) }} {{ $content->metaValue('priceUnit') }}</span> </div>
                                        @endif

                                        <div class="vehicle-id">ID: <span>#{{ $content->id }}</span></div>
                                    </div>
                                </div>
                                <div class="col-md-5 text-right d-flex justify-content-between flex-column">
                                    @if ($content->metaValue('markName'))
                                        <div class="vehicle-brand">
                                            <img src="{{ url(asset('images/manufacturers/' . \Str::slug($content->metaValue('markName')) . '.png')) }}" alt="" width="80" class="mr-2 mt-2" style="vertical-align: top">
                                            {{ $content->metaValue('markName') }}
                                        </div>
                                    @endif

                                    <div class="control-ad">
                                        @if (Auth::check())
                                            @if ($content->metaValue('publishType') == 'free' && Auth::user()->id == $content->author_id)
                                                <a class="btn btn-warning btn-round shadow-soft-blue btn-icon-left px-3" href="{{ url('/my-page/premiums') }}">
                                                    @include('themes.car-web.includes.premium-svg')
                                                    Make premium ad
                                                </a>
                                            @endif

                                            @if (!$content->metaValue('doctorVerified') && Auth::user()->id == $content->author_id)
                                                <a class="btn btn-light btn-round shadow-soft-blue px-3 ml-3" href="#modalVerifyCar" id="modalVerifyCarLabel" data-toggle="modal">Verify car</a>
                                            @endif

                                            @if (Auth::user()->id == $content->author_id)
                                                <a class="btn btn-light btn-round shadow-soft-blue px-3 ml-3" href="{{ url($content->slug . '/edit') }}">edit</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('modals')
        <div class="modal fade" id="modalVerifyCar" tabindex="-1" role="dialog" aria-labelledby="modalVerifyCarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="maz-modal-title">Машинаа баталгаажуулах</div>
                        <div class="maz-modal-desc">Та авахыг хүсэж буй машиныхаа зарыг оруулсанаар машин худалдаалагч нар танруу таны хайж буй машиныг тань санал болгох болно.<br>Хүсэж буй машинаа олоход тань амжилт хүсье.</div>
                        <form>
                            <input type="doctorVerificationRequest" value="true" hidden>
                            <div class="form-group mt-4">
                                <label for="doctorVerificationFile" class="col-form-label">Doctor Verify
                                    <span data-toggle="tooltip" data-placement="top" title="I don't know what to say here!" class="ml-2 icon-question"></span>
                                </label>

                                <div class="dropzone">
                                    <input type="file" name="doctorVerificationFile" id="doctorVerificationFile" hidden>
                                    <span>Upload</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer pb-5">
                        <button type="button" class="btn btn-danger btn-round px-5 py-2 shadow-red">Send</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
    @endpush()

@endif
