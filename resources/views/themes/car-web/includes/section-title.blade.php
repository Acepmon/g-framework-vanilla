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
                                <h1 class="vehicle-title">{{ $content->title }}</h1>
                                <p class="vehicle-meta text-muted">{{ implode(' | ', $content->metaArray('advantages')->toArray()) }}</p>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-price"> <i class="icon-tag"></i> Price: <span>{{ number_format($content->metaValue('priceAmount')) }} {{ $content->metaValue('priceUnit') }}</span> </div>
                                    <div class="vehicle-id">ID: <span>#{{ $content->id }}</span></div>
                                </div>
                            </div>
                            <div class="col-md-5 text-right d-flex justify-content-between flex-column">
                                <div class="vehicle-brand">{{ $content->metaValue('markName') }}</div>
                                <div class="control-ad">
                                    @auth
                                        @if ($content->metaValue('publishType') == 'free' && Auth::user()->id == $content->author_id)
                                            <a href="{{ url('/my-page/premiums') }}" class="btn btn-warning btn-round shadow-soft-blue btn-icon-left px-3">
                                                <svg id="corona" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 14.632 15">
                                                    <defs>
                                                        <style>
                                                            .cls-1,
                                                            .yellow {
                                                            fill: #D68418;
                                                            }

                                                            .dark-yellow {
                                                            fill: #D68418;
                                                            }

                                                            .dark-yellow,
                                                            .yellow {
                                                            fill-rule: evenodd;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <rect id="Rectangle-29" class="cls-1" width="11.651" height="2.88"
                                                    transform="translate(1.605 12.12)" />
                                                    <path id="Path-3" class="dark-yellow" d="M1.377,9.627,7.239.061l5.969,9.566Z"
                                                    transform="translate(0.063 -0.061)" />
                                                    <path id="Path-4" class="yellow" d="M14.586,10.97l1.567-8.5L2.822,10.635Z"
                                                    transform="translate(-1.521 -0.495)" />
                                                    <path id="Path-5" class="yellow" d="M1.469,10.924.075,2.433l11.54,8.491Z"
                                                    transform="translate(-0.075 -0.488)" />
                                                </svg>
                                                Make premium ad
                                            </a>
                                        @endif

                                        @if (!$content->metaValue('doctorVerified') && Auth::user()->id == $content->author_id)
                                            <a href="#modalVerifyCar" id="modalVerifyCarLabel" data-toggle="modal" class="btn btn-light btn-round shadow-soft-blue px-3 ml-3">Verify car</a>
                                        @endif

                                        @if (Auth::user()->id == $content->author_id)
                                            <a href="{{ url($content->slug . '/edit') }}" class="btn btn-light btn-round shadow-soft-blue px-3 ml-3">edit</a>
                                        @endif
                                    @endauth
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
