@push('modals')
<div class="modal fade" id="modalAddWishlist" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-wish">
            @csrf
            <div class="modal-body px-7">
                <div class="maz-modal-title">Авахыг хүсэж буй машина оруулна уу</div>
                <div class="maz-modal-desc">Та авахыг хүсэж буй машиныхаа зарыг оруулсанаар машин худалдаалагч нар танруу таны хайж буй машиныг тань санал болгох болно. Хүсэж буй машинаа олоход тань амжилт хүсье</div>
                <div class="form-row mt-5">
                    <div class="form-group col-md-6">
                        <label for="Manufacturer">Manufacturer:</label>
                        <select id="addWishMark" name="markName" class="form-control">
                            <option value="0">Manufacturer</option>
                            @foreach(App\TermTaxonomy::where('taxonomy', 'car-manufacturer')->get() as $taxonomy)
                            <option value="{{$taxonomy->term->name}}">{{$taxonomy->term->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Model">Model:</label>
                        <select id="addWishModel" name="modelName" class="form-control">
                            <option value="0">Model</option>
                            
                            @foreach(App\TermTaxonomy::where('taxonomy', 'car-manufacturer')->get() as $taxonomy)
                                @foreach(App\TermTaxonomy::where('taxonomy', 'car-'.strtolower($taxonomy->term->name))->get() as $model)
                                <option title="{{$taxonomy->term->name}}" value="{{$model->term->name}}">{{$model->term->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>   
            </div>
            <div class="modal-footer pb-5">
                <button type="button" id="btnSendWish" class="btn btn-danger btn-round px-5 py-2 shadow-red" onClick="postWish()">Send</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endpush
@push('scripts')
<script>
    $(document).ready(function(){
    $('#addWishMark').change(function (){
      var val = $(this).val();
      console.log($(this).val());

      $('#addWishModel option[title!='+val+']').css('display', 'none');
      
      $('#addWishModel option[title='+val+']').css('display', 'block');
    });
  });
</script>
<script>
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

function postWish() {
    var manuName = $('#addWishMark').val();
    var modelName = $('#addWishModel').val();

    var data = {
        'title': manuName + ' ' + modelName,
        'slug': '{{ \Str::uuid() }}',
        'type': 'wanna-buy',
        'status': '{{ \App\Content::STATUS_PUBLISHED }}',
        'visibility': '{{ \App\Content::VISIBILITY_PUBLIC }}',
        'author_id': '{{ Auth::user()->id }}'
    };

    $.ajax({
        type: 'POST',
        url: '/ajax/contents',
        data: data
    }).done(function(data) {
        var carId = data['id'];
        var paramObjs = {
            "markName": manuName,
            "modelName": modelName
        };
        $.ajax({
            type: 'POST',
            url: '/ajax/contents/' + carId + '/metas',
            data: paramObjs
        }).done(function(data) {
            $("#demo-spinner").css({'display': 'none'});
            window.location.href = "/wishlist";
        }).fail(function(err) {
        });
    }).fail(function(err) {
        console.log(err);
        alert(err.responseJSON.message);
    });
}
</script>
@endpush