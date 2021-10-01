@include('manso.header')

@if (AUth::user() == false)
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 pb-md-5" id="bgimage">
                <div class="overlay"></div>
                <div class="row pb-md-5 pt-sm-5 mt-sm-5">
                    <div class=" offset-md-2 col-md-6 pt-md-5 pt-sm-5 mt-md-5">
                        <h1 class="pt-md-5 mt-5 text-white">Make Your Dream <br> Home a Reality</h1>
                        <h5 class="mt-4 mb-4 text-white-50">
                            Find inspiration, products and the pros to make it happen — all in one place
                        </h5>
                        <div class="row pt-md-4">
                            <div class="col-md-9">
                                <form method="POST" action="{{ route('store.customer') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group mt-5">
                                        <input type="email" class="form-control form-control-lg font-weight-lighter"
                                            id="exampleInputEmail1" name="email" aria-describedby="emailHelp"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg font-weight-lighter"
                                            id="exampleInputPassword1" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg font-weight-lighter"
                                            id="exampleInputPassword1" placeholder="Confirm Password">
                                    </div>

                                    <button type="submit"
                                        class="btn btn_color text-white btn-block mb-3 mb-md-2">Submit</button>
                                    <small class="decoratio text-white">
                                        By signing up, signing in or continuing, I agree to Houzz's <a href="#"
                                            class="border-bottom border-white text-white">Terms of Use</a> and <a
                                            href="#" class="border-bottom border-white text-white">Privacy Policy</a>.
                                    </small>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ml-md-0 pl-md-0 col-6 mt-4">
                                <ul class="list-inline text-sm-center ml-md-0 pl-md-0">
                                    <li class="list-inline-item text-white">Hire a Pro:</li>
                                    <li class="list-inline-item"><a class="btn-outline-success text-white rounded btn"
                                            href="#">Interior Designer</a></li>
                                    <li class="list-inline-item"><a
                                            class="btn-outline-success btn mt-2 text-white rounded mt-md-0 pl-md-2 pr-md-2 pl-4 pr-4"
                                            href="#">Contactor</a></li>
                                    <li class="list-inline-item"><a
                                            class="btn-outline-success btn mt-2 mt-md-0 text-white rounded pl-md-2 pr-md-2 pl-4 pr-4"
                                            href="#">Architects</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-md-5 pb-md-5" style="background: #113350;">
                <div class="container pt-md-4">
                    <div class="row pt-md-4">
                        <div class="col-md-12 pl-md-4">
                            <h1 class="font-weight-bolder pb-md-4 pt-md-4 pt-5" style="color: rgb(255, 208, 0);">M a s o
                                n e
                                r s</h1>
                            <h1 class="text-white pb-2">
                                Join Millions of Home Professionals
                            </h1>
                            <h5 class="text-white pt-md-4 pt-5 pb-2">
                                Get the all-in-one tool for marketing, CRM and project management
                            </h5>
                            <div class="row pb-4 pb-md-4">
                                <div class="col-md-9 pt-md-3">
                                    <form class="mb-4 mb-md-0" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group pt-md-4">
                                            <input type="text" name="name"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-lg pl-md-1 font-weight-lighter"
                                                required autofocus placeholder="{{ trans('global.user_name') }}"
                                                value="{{ old('name', null) }}" placeholder="Name">
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg pl-md-1 font-weight-lighter"
                                                required placeholder="{{ trans('global.login_email') }}"
                                                value="{{ old('email', null) }}">
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg pl-md-1 font-weight-lighter"
                                                required placeholder="{{ trans('global.login_password') }}">
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group pb-md-4">
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-lg pl-md-1 font-weight-lighter"
                                                required placeholder="{{ trans('global.login_password_confirmation') }}">
                                        </div>

                                        <button class="btn btn-block btn-primary">
                                            {{ trans('global.register') }}
                                        </button>
                                    </form>
                                    <small class="text-white decoratio">
                                        By signing up, signing in or continuing, I agree to Houzz's <a href="#"
                                            class="text-white border-bottom">Terms of Use</a> and <a href="#"
                                            class="text-white border-bottom">Privacy Policy</a>.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container-fluid pl-md-5 pr-md-5">
    <div class="row">
        <div class="col-md-10 text-center justify-content-center h1 pt-5 pb-5">
            Here’s what you can do on Houzz
        </div>
    </div>
    <div class="row mb-md-5 pl-md-5 pr-md-5 ml-md-5 mr-md-5">
        <div class="col-md-3 mb-3 mb-md-0">
            <a href="{{ route('getideas.open') }}"
                class="btn btn-block homebtn pl-md-3 pr-md-3 pt-md-3 pb-md-3 text-success text-left">
                <img src="{{ asset('images/mosoners/house-icon.png') }}" alt="">
                Discover Design Idea
            </a>
        </div>
        <div class="col-md-3 mb-3 mb-md-0">
            <a href="#" class="btn btn-block homebtn pl-md-3 pr-md-3 pt-md-3 pb-md-3 text-success text-left">
                <img src="{{ asset('images/mosoners/sofa.png') }}" alt="">
                Shop Product
            </a>
        </div>
        <div class="col-md-3 mb-3 mb-md-0">
            <a href="{{ route('findprofessional.open') }}"
                class="btn btn-block homebtn pl-md-3 pr-md-3 pt-md-3 pb-md-3 text-success text-left">
                <img src="{{ asset('images/mosoners/builder-icon.png') }}" alt="">
                Browse Pro
            </a>
        </div>
        <div class="col-md-3 mb-3 mb-md-0">
            <a href="#" class="btn btn-block homebtn pl-md-3 pr-md-3 pt-md-3 pb-md-3 text-success text-left">
                <img src="{{ asset('images/mosoners/architect-discussion.png') }}" alt="">
                Suggest Pros for me
            </a>
        </div>
    </div>
    <div class="container-fluid pl-md-5 pr-md-5">
        <div class="row">
            <div class="col-md-12 mb-2 mt-5 mb-md-0 mt-md-0">
                <h2 class="ml-md-5 mr-md-5">Shop By Department</h2>
            </div>
        </div>
        <div class="owl-carousel owl-theme pb-md-5 pl-md-5 pr-md-5">
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>

                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card w-100">
                    <img class="card-img-top" src="images/17.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Room</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg_color">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 text-center mt-md-4 mb-md-4">
                <p class="h5">Are you a quality professional?</p>
                <a href="#">Join our professional network</a>
            </div>
        </div>
    </div>
</footer>
<!-- Optional JavaScript 3505 -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/vendor/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/fontawesome.js') }}"></script>
<script src="{{ asset('js/vendor/wow.min.js') }}"></script>
<!-- Including Javascript -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/lazysizes.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<script>
    $('.owl-carousel').owlCarousel({
        //    loop:true,
        margin: 10,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>
</body>

</html>
