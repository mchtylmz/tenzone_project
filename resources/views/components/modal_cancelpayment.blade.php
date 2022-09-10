<div class="modal fade tm-modal-cancel" id="modalCancelPayment{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-430">
        <div class="modal-content">
            <div class="modal-body px-3">
                <div class="text-center">
                    <img src="{{ asset('images/icon-cancel.svg') }}" alt="cancel" class="mb-3">
                    <h4>{{ __('Are you sure you want to Cancel?') }}</h4>
                    <p class="text-5e fs-14 mb-4">Lorem Ipsum is simply printing and typesetting industry. </p>
                </div>
                <div class="tm-cancel-info flex-between items-center">
                    <div class="text-with-icon"><i class="ri-calendar-2-fill text-main"></i> {{ $name }}y</div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-6 pe-1">
                        <button type="button" class="btn btn-white btn-block fw-500 br-4" style="position:initial !important; width: 100%" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6 ps-1">
                        <form action="{{ route('parent.subscription_cancel', $id) }}" method="post" onsubmit="return confirm('{{ __('Are you sure you want to Cancel?') }}')">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block fw-500 br-4" style="position:initial !important; width: 100%">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
