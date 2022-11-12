<div class="modal fade" id="modalAddReport" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="mb-2">Add Report</h4>
                <p class="mb-3">{{$fullname}}</p>
                <hr>
                <form action="{{ route(($prefix ?? 'teacher').'.add.report', $child) }}" method="post" enctype="multipart/form-data" class="loading">
                    @csrf
                    <div class="mb-3">
                        <label>Report Title</label>
                        <input type="text" class="form-control" placeholder="Report Title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label>Report Description</label>
                        <textarea class="form-control" placeholder="Report Description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Upload Watch / Video</label>
                        <div class="fileUploadWrap tm-upload mb-3 border">
                            <input type="file" class="tm-file-input file_input" data-content="Upload Watch" name="report_watch">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Upload Document</label>
                        <div class="fileUploadWrap tm-upload border">
                            <input type="file" class="tm-file-input file_input2" data-content="Upload Document" name="report_document">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>

            </div>
        </div>
    </div>
</div>
