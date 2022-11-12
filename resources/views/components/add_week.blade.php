<div class="modal fade" id="modalAddWeek" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="mb-3">Add Week</h4>
                <form action="{{ route(($prefix ?? 'teacher').'.add.week') }}" method="post" class="loading">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $child }}">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label>Select Start Date</label>
                        <input type="text" class="form-control datepicker" placeholder="YYYY-AA-GG" id="start_date"
                               name="start_date" autocomplete="off" required/>
                    </div>

                    <div class="mb-3">
                        <label>Select End Date</label>
                        <input type="text" class="form-control datepicker" placeholder="YYYY-AA-GG" id="end_date"
                               name="end_date" autocomplete="off" required/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
