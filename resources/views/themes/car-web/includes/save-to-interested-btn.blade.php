<button type="button" id="saveToInterested" data-target="{{ $content->id }}" class="btn btn-light btn-round btn-block my-4 shadow-soft-blue p-3 btn-icon-left">
    <i class="icon-heart"></i>
    Save to interested
</button>

@push('scripts')
<script>
$(document).ready(function () {
    $("#saveToInterested").click(function () {
        console.log($(this).data('target'));
    });
});
</script>
@endpush
