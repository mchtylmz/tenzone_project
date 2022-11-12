<div class="modal fade" id="modalEdit{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="mb-3">Your Connect</h4>
                <form action="{{ route(($prefix ?? 'teacher').'.meet.update', $id) }}" method="post" class="loading">
                    @csrf

                    <div class="mb-3">
                        <label>Select Date</label>
                        <input type="text" name="date" class="form-control datepicker" autocomplete="off" placeholder="YYYY-MM-DD" value="{{$date}}" required>
                    </div>

                    <div class="mb-3">
                        <label>Select time</label>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acEndDate" aria-expanded="false" aria-controls="acEndDate">
                                {{ $time }}
                            </button>
                            <div id="acEndDate" class="accordion-collapse collapse" data-bs-parent="#acEndDate">
                                <div class="accordion-body">
                                    <div class="btn-group tm-btn-group" role="group">

                                        <input type="radio" class="btn-check" name="time" id="time{{$id}}1" autocomplete="off" value="11:00" {{$time == '11:00' ? 'checked':''}}>
                                        <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time{{$id}}1">11:00</label>

                                        <input type="radio" class="btn-check" name="time" id="time{{$id}}2" autocomplete="off" value="13:00" {{$time == '13:00' ? 'checked':''}}>
                                        <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time{{$id}}2">13:00</label>

                                        <input type="radio" class="btn-check" name="time" id="time{{$id}}3" autocomplete="off" value="15:00" {{$time == '15:00' ? 'checked':''}}>
                                        <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time{{$id}}3">15:00</label>

                                        <input type="radio" class="btn-check" name="time" id="time{{$id}}4" autocomplete="off" value="18:00" {{$time == '18:00' ? 'checked':''}}>
                                        <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time{{$id}}4">18:00</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Meet Link</label>
                        <input type="url" name="link" class="form-control" placeholder="Meet Link" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update Connect</button>
                </form>

            </div>
        </div>
    </div>
</div>
