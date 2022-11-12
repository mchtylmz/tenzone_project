<div class="modal fade" id="modalAddActivity{{$week}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="mb-2">Add Activity</h4>
                <p class="mb-3">{{$weekTitle}}</p>
                <hr>
                <form action="{{ route(($prefix ?? 'teacher').'.add.activity', $week) }}" method="post" enctype="multipart/form-data" class="loading">
                    @csrf
                    <div class="mb-3">
                        <label>Activity Title</label>
                        <textarea class="form-control" placeholder="Activity Title" name="title" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Activity Type</label>
                        <select name="type" class="form-select" required>
                            <option selected disabled>Select type</option>
                            <option value="homework">Homework</option>
                            <option value="child">Child</option>
                            <option value="06_10">6 - 10 Age</option>
                            <option value="10_12">10 - 12 Age</option>
                            <option value="12_18">12 - 18 Age</option>
                            <option value="18">18+ Age</option>
                            <option value="general">General</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Upload Watch / Video</label>
                        <div class="fileUploadWrap tm-upload mb-3 border">
                            <input type="file" class="tm-file-input file_input" data-content="Upload Watch" name="watch">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Upload Document</label>
                        <div class="fileUploadWrap tm-upload border">
                            <input type="file" class="tm-file-input file_input2" data-content="Upload Document" name="document">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>

            </div>
        </div>
    </div>
</div>
