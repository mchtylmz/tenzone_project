<div class="modal fade" id="modalBookPayment{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">

                <h4 class="mb-3">{{ __('Booking Payment') }} - £{{ number_format($price, 0) }}</h4>

                <form action="{{ route('payment.therapy', [$id, $service, $user]) }}" method="post" class="loading">
                    @csrf
                    <div class="mb-4 position-relative">
                        <label for="">Card Holder Name</label>
                        <input type="text" name="cardname" class="form-control" placeholder="XXXXXXX" required>
                    </div>

                    <div class="mb-4 position-relative">
                        <label>Card Number</label>
                        <div class="input-img">
                            <input type="text" name="cardnumber" minlength="14" maxlength="21" class="form-control" placeholder="124246237921239" required>
                            <img src="{{ asset('images/banks.png') }}" alt="banks" class="img-banks">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="mb-4">
                                <label for="">Month (MM)</label>
                                <select name="expmonth" class="form-control" required>
                                    @for($month = 1; $month <= 12; $month++)
                                        @if($month <= 9)
                                            <option value="0{{$month}}">0{{$month}}</option>
                                        @else
                                            <option value="{{$month}}">{{$month}}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-4">
                                <label for="">Year (YY)</label>
                                <select name="expyear" class="form-control" required>
                                    @for($year = 0; $year <= 10; $year++)
                                        <option value="{{ date('y', strtotime($year . ' years')) }}">
                                            {{ date('Y', strtotime($year . ' years')) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <div class="mb-4">
                                <label for="">CVC</label>
                                <input type="text" name="cvc" maxlength="4" class="form-control" placeholder="CVC" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                </form>

            </div>
        </div>
    </div>
</div>
