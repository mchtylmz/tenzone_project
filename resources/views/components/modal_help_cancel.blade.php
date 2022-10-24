<div class="modal fade tm-modal-cancel" id="modalHelpDelete{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-430">
        <div class="modal-content">
            <div class="modal-body px-3">
                <div class="text-center">
                    <img src="{{ asset('images/icon-cancel.svg') }}" alt="cancel" class="mb-3">
                    <h4>{{ __('Are you sure you want to Delete?') }}</h4>
                    <p class="text-5e fs-14 mb-4">Lorem Ipsum is simply printing and typesetting industry. </p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-6 pe-1">
                        <button type="button" class="btn btn-white btn-block fw-500 br-4" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6 ps-1">
                        <form action="{{ route('admin.help.delete', $id) }}" method="post" onsubmit="return confirm('{{ __('Are you sure you want to delete?') }}')">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block fw-500 br-4">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
