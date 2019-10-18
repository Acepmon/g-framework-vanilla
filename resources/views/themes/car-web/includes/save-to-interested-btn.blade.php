@if ($content)
    <button type="button" id="saveToInterested" data-target="{{ $content->id }}" class="btn btn-light btn-round btn-block my-4 shadow-soft-blue p-3 btn-icon-left" disabled>
        Loading...
    </button>
@endif

@push('scripts')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/ajax/user/interested_cars/{{ $content->id }}',
                dataType: 'json',
                success: function (data) {
                    $("#saveToInterested").html('<span class="text-danger"><i class="fas fa-heart"></i> Added to interest list</span>');
                    $("#saveToInterested").prop('disabled', false);
                },
                error: function (data) {
                    $("#saveToInterested").html('<span class=""><i class="far fa-heart"></i> Add to interest list</span>')
                    $("#saveToInterested").prop('disabled', false);
                }
            });

            $("#saveToInterested").click(function () {
                $("#saveToInterested").html('Loading...');
                $("#saveToInterested").prop('disabled', true);

                $.ajax({
                    url: '/ajax/user/interested_cars',
                    dataType: 'json',
                    method: 'PUT',
                    data: {
                        'content_id': '{{ $content->id }}'
                    },
                    success: function (data) {
                        if (data.status == 'added') {
                            $("#saveToInterested").html('<span class="text-danger"><i class="fas fa-heart"></i> Added to interest list</span>');
                            $("#saveToInterested").prop('disabled', false);
                        } else if (data.status == 'removed') {
                            $("#saveToInterested").html('<span class=""><i class="far fa-heart"></i> Add to interest list</span>')
                            $("#saveToInterested").prop('disabled', false);
                        }
                    },
                    error: function (error) {
                        if (error.status == 401) {
                            window.location.href = "{{ route('login') }}";
                        }
                    }
                });
            });
        });
    </script>
@endpush
