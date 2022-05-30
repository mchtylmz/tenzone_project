<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Carts')  }}</x-slot>

    <section class="tz-page-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="head-title">Personal Details</h2>
                    <div class="tz-payment-box mb-4">
                        <div class="head">
                            <h3 class="title">Shipping</h3>
                            <img src="{{ asset('images/icons/user.svg') }}" alt="user">

                        </div>

                        <form action="{{route('cart.checkout')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">First Name *</label>
                                        <input type="text" name="firstname" class="form-control" placeholder="Michael"required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">Last Name *</label>
                                        <input type="text" name="lastname" class="form-control" placeholder="Smith"required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="">Email Address *</label>
                                        <input type="email" name="email" class="form-control" placeholder="Michael"required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">Address *</label>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="2715 Ash Dr. San Jose, South Dakota 83475"required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">Phone *</label>
                                        <input type="text" name="phone" class="form-control" placeholder="+90 625 86 89"required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">City *</label>
                                        <input type="text" name="city" class="form-control" placeholder="Royal Ln. Mesa"required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">Country *</label>
                                        <input type="text" name="country" class="form-control" placeholder=" New Jersey" required>
                                    </div>
                                </div>
                            </div>


                            <div class="head">
                                <h3 class="title">Payment</h3>
                                <img src="{{ asset('images/icons/bank-card.svg') }}" alt="bank">
                            </div>

                            <div class="mb-4 position-relative">
                                <label for="">Card Holder Name</label>
                                <input type="text" name="cardname" class="form-control" placeholder="XXXXXXX" required>
                            </div>

                            <div class="mb-4 position-relative">
                                <label for="">Card Number</label>
                                <input type="text" name="cardnumber" minlength="14" maxlength="21" class="form-control" placeholder="124246237921239" required>
                                <img src="{{ asset('images/banks.png') }}" alt="banks" class="img-banks">
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-4">
                                        <label for="">Expiry Month (MM)</label>
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
                                <div class="col-3">
                                    <div class="mb-4">
                                        <label for="">Expiry Year (YY)</label>
                                        <select name="expyear" class="form-control" required>
                                            @for($year = 0; $year <= 10; $year++)
                                                <option value="{{ date('y', strtotime($year . ' years')) }}">
                                                    {{ date('Y', strtotime($year . ' years')) }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-3">
                                    <div class="mb-4">
                                        <label for="">CVC</label>
                                        <input type="text" name="cvc" maxlength="4" class="form-control" placeholder="CVC" required>
                                    </div>
                                </div>
                            </div>

                                <button id="submit" type="submit" class="btn btn-primary opacity btn-block mt-4">Confirm Payment</button>

                        </form>

                    </div>

                </div>

                <div class="col-lg-4">
                    <h2 class="head-title z-1">Your Order</h2>
                    <div class="tz-payment-box mb-4">

                        @foreach($products as $product)
                            <div class="tz-product-item">
                                <div class="img"><img src="{{ $product->image }}" alt="image"></div>
                                <div class="content">
                                    <h2 class="name">{{ $product->title }}</h2>
                                    <h3 class="price">£{{$product->price}}</h3>
                                    <span class="quantity">Quantity: 1</span>
                                </div>
                                <form action="{{ route('cart.delete', $product->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="delete" style="background: transparent; border:none">
                                        <img src="{{ asset('images/icons/delete.svg') }}" alt="{{ $product->title }}">
                                    </button>
                                </form>
                            </div>
                        @endforeach


                        <table class="table table-summary mb-0">
                            <tfoot>
                            <tr>
                                <td>Total</td>
                                <td>£{{$total}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-site-layout>
