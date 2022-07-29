<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Pricing page</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">

</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300');
    body{
      margin: 0;
      padding: 0;
     font-family: 'Roboto', sans-serif !important;
    }
    section{
      width: 100%;
      height: 100vh;
      -webkit-box-sizing: border-box;
              box-sizing: border-box;
              padding: 140px 0;
    }
    .card{
      position: relative;
      max-width: 300px;
      height: auto;
      background: linear-gradient(-45deg,#fe0847,#feae3f);
      border-radius: 15px;
      margin: 0 auto;
      padding: 40px 20px;
      -webkit-box-shadow: 0 10px 15px rgba(0,0,0,.1) ;
              box-shadow: 0 10px 15px rgba(0,0,0,.1) ;
    -webkit-transition: .5s;
    transition: .5s;
    }
    .card:hover{
      -webkit-transform: scale(1.1);
              transform: scale(1.1);
    }
    .col-sm-4:nth-child(1) .card ,
    .col-sm-4:nth-child(1) .card .title .fa{
      background: linear-gradient(-45deg,#f403d1,#64b5f6);

    }
    .col-sm-4:nth-child(2) .card,
    .col-sm-4:nth-child(2) .card .title .fa{
      background: linear-gradient(-45deg,#ffec61,#f321d7);

    }
    .col-sm-4:nth-child(3) .card,
    .col-sm-4:nth-child(3) .card .title .fa{
      background: linear-gradient(-45deg,#24ff72,#9a4eff);

    }
    .card::before{
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 40%;
      background: rgba(255, 255, 255, .1);
    z-index: 1;
    -webkit-transform: skewY(-5deg) scale(1.5);
            transform: skewY(-5deg) scale(1.5);
    }
    .title .fa{
      color:#fff;
      font-size: 60px;
      width: 100px;
      height: 100px;
      border-radius:  50%;
      text-align: center;
      line-height: 100px;
      -webkit-box-shadow: 0 10px 10px rgba(0,0,0,.1) ;
              box-shadow: 0 10px 10px rgba(0,0,0,.1) ;

    }
    .title h2 {
      position: relative;
      margin: 20px  0 0;
      padding: 0;
      color: #fff;
      font-size: 28px;
     z-index: 2;
    }
    .price,.option{
      position: relative;
      z-index: 2;
    }
    .price h4 {
    margin: 0;
    padding: 20px 0 ;
    color: #fff;
    font-size: 60px;
    }
    .option ul {
      margin: 0;
      padding: 0;

    }
    .option ul li {
    margin: 0 0 10px;
    padding: 0;
    list-style: none;
    color: #fff;
    font-size: 16px;
    }
    .card a {
      position: relative;
      z-index: 2;
      background: #fff;
      color : black;
      width: 150px;
      height: 40px;
      line-height: 40px;
      border-radius: 40px;
      display: block;
      text-align: center;
      margin: 20px auto 0 ;
      font-size: 16px;
      cursor: pointer;
      -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
              box-shadow: 0 5px 10px rgba(0, 0, 0, .1);

    }
    .card a:hover{
        text-decoration: none;
    }
    </style>
<body class="theme-cyan">

    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
<!-- Page Loader -->
{{-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48" alt="Compass"></div>
        <p>Please wait...</p>
    </div>
</div> --}}


<!-- Overlay For Sidebars -->
<div class="overlay"></div>



<div class="container-fluid">
    <div class="container mt-5">
      <div class="row">

        <div class="col-sm-4">
            @if ($basic)
          <div class="card text-center mt-5">

            <div class="title">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>
              <h2>{{$basic->name}}</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>{{$basic->price}}</h4>
            </div>
            <div class="option">
              <ul>
              <li> <i class="fa fa-check" aria-hidden="true"></i> 10 GB Space </li>
              <li> <i class="fa fa-check" aria-hidden="true"></i> 3 Domain Names </li>
              <li> <i class="fa fa-check" aria-hidden="true"></i> 20 Email Address </li>
              <li> <i class="fa fa-times" aria-hidden="true"></i> Live Support </li>
              </ul>
            </div>
            <a href="{{ route('plans.checkout', $basic->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
          </div>
          @endif
        </div>
        @if ($professional)
        <div class="col-sm-4">
            <div class="card text-center  mt-5">
              <div class="title">
                <i class="fa fa-plane" aria-hidden="true"></i>
                <h2>{{$professional->name}}</h2>
              </div>
              <div class="price">
                <h4><sup>$</sup>{{$professional->price}}</h4>
              </div>
              <div class="option">
                <ul>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 50 GB Space </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 5 Domain Names </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> Unlimited Email Address </li>
                <li> <i class="fa fa-times" aria-hidden="true"></i> Live Support </li>
                </ul>
              </div>
              <a href="{{ route('plans.checkout', $professional->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
            </div>
          </div>
        @endif
        @if ($enterprise)
          <div class="col-sm-4">
            <div class="card text-center  mt-5">
              <div class="title">
                <i class="fa fa-rocket" aria-hidden="true"></i>
                <h2>{{$enterprise->name}}</h2>
              </div>
              <div class="price">
                <h4><sup>$</sup>{{$enterprise->price}}</h4>
              </div>
              <div class="option">
                <ul>
                <li> <i class="fa fa-check" aria-hidden="true"></i> Unlimited GB Space </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 30 Domain Names </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> Unlimited Email Address </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> Live Support </li>
                </ul>
              </div>
              <a href="{{ route('plans.checkout', $enterprise->plan_id) }}" class="pricing-action l-amber">Choose plan</a>            </div>
          </div>
          @endif
    </div>

</div>
</div>

</section>

{{-- <section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="pricing pricing-palden">
                    @if ($basic)
                        <div class="pricing-item">
                            <div class="pricing-deco l-slategray">
                                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                </svg>
                                <div class="pricing-price"><span class="pricing-currency">$</span>{{ $basic->price/100 }}
                                <span class="pricing-period">/ mo</span>
                                </div>
                                <h3 class="pricing-title">BASIC</h3>
                            </div>
                            <ul class="feature-list">
                                <li>5GB Disk Space</li>
                                <li>10 Domain Names</li>
                                <li>5 E-Mail Address</li>
                                <li>Fully Support</li>
                            </ul>

                            <a href="{{ route('plans.checkout', $basic->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
                        </div>
                    @endif

                    @if ($professional)
                        <div class="pricing-item pricing__item--featured">
                            <div class="pricing-deco l-blush">
                                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                </svg>
                                <div class="pricing-price"><span class="pricing-currency">$</span>{{ $professional->price/100 }}
                                <span class="pricing-period">/ mo</span>
                                </div>
                                <h3 class="pricing-title">GOLD</h3>
                            </div>
                            <ul class="feature-list">
                                <li>10GB Disk Space</li>
                                <li>20 Domain Names</li>
                                <li>10 E-Mail Address</li>
                                <li>Fully Support</li>
                            </ul>
                            <a href="{{ route('plans.checkout', $professional->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
                        </div>
                    @endif

                    @if ($enterprise)
                        <div class="pricing-item">
                            <div class="pricing-deco l-slategray">
                                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                </svg>
                                <div class="pricing-price"><span class="pricing-currency">$</span>{{ $enterprise->price/100 }}
                                <span class="pricing-period">/ mo</span>
                                </div>
                                <h3 class="pricing-title">PREMIUM</h3>
                            </div>
                            <ul class="feature-list">
                                <li>50GB Disk Space</li>
                                <li>50 Domain Names</li>
                                <li>20 E-Mail Address</li>
                                <li>Fully Support</li>
                            </ul>
                            <a href="{{ route('plans.checkout', $enterprise->plan_id) }}" class="pricing-action l-amber">Choose plan</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
</body>
</html>
