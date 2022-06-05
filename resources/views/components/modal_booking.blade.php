<div class="modal fade tm-modal-cancel" id="modalBooking{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-430">
        <div class="modal-content">
            <div class="modal-body px-3">
                <div class="text-center">
                    <img src="{{ asset('images/check.png') }}" alt="check" class="mb-3">
                    <h4>{{ __('Are you sure you want to Booking Teacher?') }}</h4>
                    <p class="text-5e fs-14 mb-4">Lorem Ipsum is simply printing and typesetting industry. </p>
                </div>
                <div class="tm-cancel-info flex-between items-center">
                    <div class="text-with-icon"><i class="ri-calendar-2-fill text-main"></i> {{ $date }}y</div>
                    <div class="text-with-icon"><i class="ri-calendar-2-fill text-main"></i> {{ $time }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-6 pe-1">
                        <button type="button" class="btn btn-white btn-block fw-500 br-4" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-6 ps-1">
                        <form action="{{ route('meet.book', $id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block fw-500 br-4">
                                Approve (1 Credit)
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
