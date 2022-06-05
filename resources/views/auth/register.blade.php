<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{!! asset(settings()->site_favicon) !!}">

    <title>{{ __('Register') }} - {{ config('app.name', 'Laravel') }}</title>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/remixicon/remixicon.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        const lang = {
            unknown_error: '{{ __('message.unknown_error') }}',
        }
        const ruleMessages = {
            name: '{{ __('validation.required', ['attribute' => __('Name')]) }}',
            surname: '{{ __('validation.required', ['attribute' => __('Surname')]) }}',
            email: {
                required: '{{ __('validation.required', ['attribute' => __('Email')]) }}',
                emailCustom: '{{ __('validation.email', ['attribute' => __('Email')]) }}'
            },
            phone: {
                required: '{{ __('validation.required', ['attribute' => __('Phone Number')]) }}',
                number: '{{ __('validation.numeric', ['attribute' => __('Phone Number')]) }}',
                minlength: '{{ __('validation.min.string', ['attribute' => __('Phone Number'), 'min' => 6]) }}'
            },
            password: {
                required: '{{ __('validation.required', ['attribute' => __('Password')]) }}',
                minlength: '{{ __('validation.min.string', ['attribute' => __('Password'), 'min' => 6]) }}'
            },
            password_confirmation: {
                required: '{{ __('validation.required', ['attribute' => __('Confirm Password')]) }}',
                minlength: '{{ __('validation.min.string', ['attribute' => __('Confirm Password'), 'min' => 6]) }}',
                equalTo: '{{ __('validation.confirmed', ['attribute' => __('Password')]) }}'
            },
            child_name: '{{ __('validation.required', ['attribute' => __('Child Name')]) }}',
            child_surname: '{{ __('validation.required', ['attribute' => __('Child Surname')]) }}',
            child_email: {
                required: '{{ __('validation.required', ['attribute' => __('Child Email')]) }}',
                emailCustom: '{{ __('validation.email', ['attribute' => __('Child Email')]) }}'
            },
            child_password: {
                required: '{{ __('validation.required', ['attribute' => __('Child Password')]) }}',
                minlength: '{{ __('validation.min.string', ['attribute' => __('Child Password'), 'min' => 6]) }}'
            },
            child_dob: '{{ __('validation.required', ['attribute' => __('Child Date Of Birth')]) }}',
            child_gender: '{{ __('validation.required', ['attribute' => __('Child Gender')]) }}',
        };
    </script>
    <script src="{{ asset('assets/js/auth.js') }}" defer></script>
</head>
<body class="">
<main class="tm-auth page-100-center">
    <div class="center">
        <form method="POST" action="{{ route('register', $plan->slug) }}" id="register">
            @csrf
            <!-- Step 1 -->
            <div class="step-content" id="step1">
                <a href="{{ route('index') }}">
                    <img src="{{asset('images/logo.svg')}}" alt="{{ __('Register') }}" class="logo">
                </a>

                <div class="tm-auth-head flex-between">
                    <div class="left">
                        <h1 class="title">{{ __('Create parent account.') }}</h1>
                        <p class="mb-0">{{ __('Create parent account description') }}</p>
                    </div>
                    <div class="right">
                        <div class="step">{{ __('Step 1') }}</div>
                    </div>
                </div>

                <div class="tm-programme">
                    <h2 class="title">{{ $plan->name }}</h2>
                    <h3 class="price">
                        £{{ number_format($plan->price, 0) }}
                        @if($plan->type == 'monthly')
                            <span>/month</span>
                        @else
                            <span>/yearly</span>
                        @endif
                    </h3>
                </div>

                <div class="tm-auth-form">

                    <div class="mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-user-line"></i>
                            </div>
                            <input class="form-control" placeholder="{{ __('Name') }}" id="name" type="text"
                                   name="name" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="surname">{{ __('Surname') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-user-line"></i>
                            </div>
                            <input class="form-control" placeholder="{{ __('Surname') }}" id="surname"
                                   type="text" name="surname" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">{{ __('Email') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-mail-open-line"></i>
                            </div>
                            <input type="email" class="form-control" placeholder="example@example.com"
                                   id="email" name="email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">{{ __('Phone Number') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-smartphone-line"></i>
                            </div>
                            <input type="tel" class="form-control" placeholder="XXXXXXXX" id="phone"
                                   name="phone" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password">{{ __('Password') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-lock-password-line"></i>
                            </div>
                            <input type="password" class="form-control" minlength="6" placeholder="********" id="password"
                                   name="password" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-lock-password-line"></i>
                            </div>
                            <input type="password" class="form-control" minlength="6" placeholder="********"
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" value="1" name="terms" id="terms" class="form-check-input"/>
                            <label for="terms" class="form-check-label text-black">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                   'terms_of_service' => '<a target="_blank" href="terms" class="text-underline">'.__('Terms of Service').'</a>',
                                   'privacy_policy' => '<a target="_blank" href="policy" class="text-underline">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-block btn-primary btn-next" id="btn-step2" data-next="step2"
                            type="button">
                        {{ __('Next') }} <i class="d-none ml-3 fa fa-spinner fa-pulse"></i>
                    </button>
                </div>
            </div>
            <!-- Step 1 -->
            <!-- Step 2 -->
            <div class="step-content" style="display: none" id="step2">
                <a href="{{ route('index') }}">
                    <img src="{{asset('images/logo.svg')}}" alt="{{ __('Register') }}" class="logo">
                </a>

                <div class="tm-auth-head flex-between">
                    <div class="left">
                        <h1 class="title">{{ __('Create child account.') }}</h1>
                        <p class="mb-0">{{ __('Create child account description') }}</p>
                    </div>
                    <div class="right">
                        <div class="step">{{ __('Step 2') }}</div>
                    </div>
                </div>

                <div class="tm-auth-form">
                    <div class="mb-3">
                        <label for="child_name">{{ __('Child Name') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-user-line"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="{{ __('Child Name') }}"
                                   id="child_name" name="child_name" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="child_surname">{{ __('Child Surname') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-user-line"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="{{ __('Child Surname') }}"
                                   id="child_surname" name="child_surname" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="child_email">{{ __('Child Email') }}</label>
                        <div class="tm-input">
                            <div class="icon">
                                <i class="ri-mail-open-line"></i>
                            </div>
                            <input type="email" class="form-control" placeholder="child@example.com"
                                   id="child_email" name="child_email" required/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="child_password">{{ __('Child Password') }}</label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-lock-password-line"></i>
                            </div>
                            <input type="password" class="form-control" minlength="6" placeholder="*******"
                                   id="child_password" name="child_password" required/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="child_dob">{{ __('Child Date Of Birth') }}</label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-calendar-2-fill"></i>
                            </div>
                            <input type="text" class="form-control datepicker" placeholder="YYYY-AA-GG" id="child_dob"
                                   name="child_dob" autocomplete="off" required/>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="child_gender">{{ __('Child Gender') }}</label>
                        <div class="btn-group tm-btn-group" role="group" aria-label="{{ __('Gender') }}">

                            <input type="radio" class="btn-check" name="child_gender" id="child_male"
                                   value="male" autocomplete="off" required>
                            <label class="tm-checkbtn btn btn-light" for="child_male">{{ __('Male') }}</label>

                            <input type="radio" class="btn-check" name="child_gender" id="child_female"
                                   value="female" autocomplete="off" required>
                            <label class="tm-checkbtn btn btn-light" for="child_female">{{ __('Female') }}</label>

                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <button class="btn btn-block btn-prev btn-secondary" type="button" id="btn-step1"
                                data-prev="step1">
                            {{ __('Back') }}
                        </button>

                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Register') }} <i class="d-none ml-3 fa fa-spinner fa-pulse"></i>
                        </button>
                    </div>

                </div>
            </div>
            <!-- Step 2 -->
        </form>
    </div>
</main>
</body>
</html>

