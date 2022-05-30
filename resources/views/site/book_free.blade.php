<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Understanding your requirement') }}</x-slot>

    <section class="tz-page">
        <div class="container containerarea">

            <div class="head-title text-center">
                <h1>Understanding your requirement</h1>
                <img src="{{ asset('images/line.svg') }}" alt="line" class="line">
            </div>

            <form action="{{ route('book.free') }}" method="post" class="form-question">
                @csrf
                <div class="mb-4">
                    <label for="input1">Google Anlytics reads like a seismic chart lately</label>
                    <input type="hidden" name="question" value="Google Anlytics reads like a seismic chart lately">
                    <input type="text" name="answer" class="form-control" placeholder="Activity Sheets">
                </div>

                <div class="mb-4">
                    <label for="input1">Google Anlytics reads like a seismic chart lately</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                            <label class="btn btn-light zt-checkbtn btn-block" for="option1">Activity Sheets</label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                            <label class="btn btn-light zt-checkbtn btn-block" for="option2">Activity Sheets</label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                            <label class="btn btn-light zt-checkbtn btn-block" for="option3">Activity Sheets</label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                            <label class="btn btn-light zt-checkbtn btn-block" for="option4">Activity Sheets</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="input1">Google Anlytics reads like a seismic chart lately</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Activity Sheets</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="input1">Google Anlytics reads like a seismic chart lately</label>
                    <input type="text" class="form-control" placeholder="Activity Sheets">
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-icon-hover">Book a session for free <i class="fa fa-arrow-right"></i></button>
            </form>

        </div>
    </section>
</x-site-layout>
