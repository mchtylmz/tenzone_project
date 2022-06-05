<div class="modal fade" id="modalSendSubmission{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="mb-2">Add Submission File</h4>
                <p class="mb-2">{{ $title }}</p>
                <hr>
                <form action="{{ route('send.submission', $id) }}" method="post" enctype="multipart/form-data" class="loading">
                    @csrf

                    <div class="mb-3">
                        <label>Activity name</label>
                        <textarea type="text" class="form-control bg-light" name="description" placeholder="Activity description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Activity submission file</label>
                        <div class="fileUploadWrap tm-upload mb-3 border">
                            <input type="file" class="tm-file-input file_input" data-content="Upload File" name="fileToUpload" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block activite">Create</button>
                </form>

            </div>
        </div>
    </div>
</div>
