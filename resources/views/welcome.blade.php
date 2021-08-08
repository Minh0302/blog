<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Coffee Break Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <title>Blogs Tiền Ảo</title>
        <meta property="og:url" content="{{$url_canonical}}" />

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!-- Styles -->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' /> -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        
    </head>
    <body>
    <!--header-top-starts-->
    <div class="header-top">
        <div class="container">
            <div class="head-main">
                <style type="text/css">
                    h3.logo{
                        font-size: 50px;
                        font-weight: bold;
                        font-family: sans-serif;
                        color: #3d1a1b;
                    }
                </style>
                <a href="{{url('/')}}"><h3 class="logo">Blog Tiền Ảo</h3></a>
            </div>
        </div>
    </div>
    <!--header-top-end-->
    <!--start-header-->
    <div class="header">
        <div class="container">
            <div class="head">
            <div class="navigation">
                 <span class="menu"></span> 
                    <ul class="navig">
                        <li><a href="{{url('/')}}" class="active">Trang chủ</a></li>
                        @foreach($category as $key => $cate)
                        <li><a href="{{route('danh-muc.show',['id'=>$cate->id,'slug'=>Str::slug($cate->title)])}}">{{$cate->title}}</a></li>
                        @endforeach
                        <!-- <li><a href="about.html">Về chúng tôi</a></li> -->
                    </ul>
            </div>
            <div class="header-right">
                <form action="{{url('tim-kiem')}}" method="GET">
                    @csrf
                    <div class="search-bar" style="padding-left: 10px;">
                        <input type="text" name="keywords" placeholder="Tìm kiếm...">
                        <input type="submit" value="" name="timkiem">
                    </div>
                </form>

                <!-- <ul style="padding-right: 20px;">
                    <li><a href="#"><span class="fb"> </span></a></li>
                     <li><a href="#"><span class="gg"> </span></a></li> 
                </ul> -->
            </div>
                <div class="clearfix"></div>
            </div>
            </div>
        </div>  
    <!-- script-for-menu -->
    <!-- script-for-menu -->
        <script>
            $("span.menu").click(function(){
                $(" ul.navig").slideToggle("slow" , function(){
                });
            });
        </script>
    <!-- script-for-menu -->

    <!--main-starts-->
    @yield('content')
    <!--main-end-->
    <!--slide-starts-->
    <div class="slide">
        <div class="container">
            <div class="fle-xsel">
            <ul id="flexiselDemo3">
                @foreach($category as $key => $cate)
                <li>
                    <a href="#">
                        <div class="banner-1">
                            <img src="{{asset('public/uploads/'.$cate->image)}}" class="img-responsive" alt="" width="100%" height="50px">
                        </div>
                    </a>
                </li>
                @endforeach               
            </ul>
                            
                             <script type="text/javascript">
                                $(window).load(function() {
                                    
                                    $("#flexiselDemo3").flexisel({
                                        visibleItems: 5,
                                        animationSpeed: 1000,
                                        autoPlay: true,
                                        autoPlaySpeed: 3000,            
                                        pauseOnHover: true,
                                        enableResponsiveBreakpoints: true,
                                        responsiveBreakpoints: { 
                                            portrait: { 
                                                changePoint:480,
                                                visibleItems: 2
                                            }, 
                                            landscape: { 
                                                changePoint:640,
                                                visibleItems: 3
                                            },
                                            tablet: { 
                                                changePoint:768,
                                                visibleItems: 3
                                            }
                                        }
                                    });
                                    
                                });
                                </script>
                                <script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>
                    <div class="clearfix"> </div>
            </div>
        </div>
    </div>  
    <!--slide-end-->
    <!--footer-starts-->
    <div class="footer">
        <div class="container">
            <div class="footer-text">
                <p>© 2021 Blog Tiền Ảo. All Rights Reserved | Design by  <a href="" target="_blank">Me</a> </p>
            </div>
        </div>
    </div>
    <!--footer-end-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=473681730393854&autoLogAppEvents=1" nonce="lmQyL1Fk"></script>
</body>
</html>
