<div class="modal fade" id="modalHelpEdit{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="mb-3">Help #{{ $id }}</h4>
                <form action="{{ route('admin.help.save', $id) }}" method="post" class="loading">
                    @csrf

                    <div class="mb-3">
                        <label>{{ __('Category') }}</label>
                        <input type="text" name="category" class="form-control" autocomplete="off" placeholder="{{ __('Category') }}" value="{{$category}}" required>
                    </div>

                    <div class="mb-3">
                        <label>{{ __('Title') }}</label>
                        <textarea rows="3" name="title" class="form-control" autocomplete="off" placeholder="{{ __('Title') }}" required>{{$title}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>{{ __('Content') }}</label>
                        <textarea rows="7" name="content" class="form-control" autocomplete="off" placeholder="{{ __('Content') }}" required>{{$content}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
