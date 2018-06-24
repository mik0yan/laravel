<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="健康">
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <meta content="black" name="apple-mobile-web-app-status-bar-style" />
        <meta content="telephone=no" name="format-detection" />
        <link rel="stylesheet" type="text/css" href="/css/lib.css" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/999.css" />
        <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/js/org1470120033.js" data-main="indexMain"></script>
        <!-- <meta http-equiv="mobile-agent" content="format=xhtml;url=/m/index.php">
          <script type="text/javascript">
            if(window.location.toString().indexOf('pref=padindex') != -1){}
            else{
                if(/AppleWebKit.*Mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent)))
                {
                    if(window.location.href.indexOf("?mobile")<0){
                        try{
                            if(/Android|Windows Phone|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)){window.location.href="/m/index.php";}
                            else if(/iPad/i.test(navigator.userAgent)){}
                            else{}
                        }
                        catch(e){}
                    }
                }
            }
          </script> -->

        <title>翌健康</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="home-template">
        <div id="header">
            <div class="content">
            <a href="/" id="logo"><img src="/images/logo.png" height="40" /></a>
            <ul id="nav">
            @if (Route::has('login'))
                <li class="navitem"><a class="active" href="/" target="_self">首页</a></li>
                <li class="navitem"><a class='' href="{{ url('/shop') }}">商城</a></li>

                @auth
                <li class="navitem"><a class="" href="{{ url('/home') }}" target="_self">我的</a></li>
                @else
                <li class="navitem"><a class="" href="{{ route('login') }}" target="_self">登录</a></li>
                <li class="navitem"><a class="" href="{{ route('register') }}" target="_self">注册</a></li>
                @endauth
            @endif
            </ul>
            </div>
        </div>
        <div id="sitecontent">
            <!-- <div id="mslider" class="module">
                <ul class="slider" data-options-height="660" data-options-auto="1" data-options-mode="0" data-options-pause="6" data-options-ease="ease-out">
                    <li style="background-image:url(/images/application-3399516_1920.jpg)" class="active">
                        <div id="tempImage_0"></div><video width="100%" height="100%" autoplay="" loop="" preload="auto" class="slider-video" style="width:100%; height:auto;"><source src="" type="video/mp4"></source></video>
                        <div class="mask"></div>
                        <a target="_blank">
                            <div>
                                <p class="title ellipsis"></p>
                            </div>
                            <div class="sliderArrow fa fa-angle-down"></div>
                        </a>
                    </li>
                    <li style="background-image:url(/images/rawpixel-577480-unsplash.jpg)" class="active">
                        <div id="tempImage_1"></div><video width="100%" height="100%" autoplay="" loop="" preload="auto" class="slider-video" style="width:100%; height:auto;"><source src="" type="video/mp4"></source></video>
                        <div class="mask"></div>
                        <a target="_blank">
                            <div>
                                <p class="title ellipsis"></p>
                            </div>
                            <div class="sliderArrow fa fa-angle-down"></div>
                        </a>
                    </li>
                    <li style="background-image:url(/images/medic-563425_1920.jpg)" class="active">
                        <div id="tempImage_2"></div><video width="100%" height="100%" autoplay="" loop="" preload="auto" class="slider-video" style="width:100%; height:auto;"><source src="" type="video/mp4"></source></video>
                        <div class="mask"></div>
                        <a target="_blank">
                            <div>
                                <p class="title ellipsis"></p>
                            </div>
                            <div class="sliderArrow fa fa-angle-down"></div>
                        </a>
                    </li>
                </ul>
            </div> -->

            <div id="mservice" class="module">
                <div class="bgmask"></div>
                <div class="content layoutnone">
                    <div class="header wow fw" data-wow-delay=".1s">
                        <p class="title">产品特色</p>
                        <p class="subtitle">Feature</p>
                    </div>
                    <div class="module-content fw" id="servicelist">
                        <div class="wrapper">
                            <ul class="content_list" data-options-sliders="3" data-options-margin="10" data-options-ease="1" data-options-speed="1">
                                <li id="serviceitem_0" class="serviceitem wow">
                                    <a href="/a/yiliaotese/9.html" target="_blank">
                                        <img src="/images/1478684211495.png" height="120" />
                                            <div>
                                                <p class="title">权威机构</p>
                                                <p class="description">多家国内顶级三甲医院合作伙伴:301医院、北京协和医院、四川华西医院、湖南湘雅医院、上海第六人民医院、广东医科大学附一医院</p>
                                            </div>
                                    </a>
                                    <a href="/a/yiliaotese/9.html" target="_blank" class="details">more<i class="fa fa-angle-right"></i></a>
                                </li>
                                <li id="serviceitem_1" class="serviceitem wow">
                                    <a href="/a/yiliaotese/8.html" target="_blank"><img src="/images/14786828997.png" height="120" />
                                        <div>
                                            <p class="title">特色服务</p>
                                            <p class="description">国际领先医疗机构合作:瑞士席勒顶级心肺功能监测设备，加拿大健康管家服务，可穿戴健康指标集采设备。</p>
                                        </div>
                                    </a>
                                    <a href="/a/yiliaotese/8.html" target="_blank" class="details">more<i class="fa fa-angle-right"></i></a>
                                </li>
                                <li id="serviceitem_2" class="serviceitem wow">
                                    <a href="/a/yiliaotese/7.html" target="_blank"><img src="/images/1478682180536.png" height="120" />
                                        <div>
                                        <p class="title">非药理念</p>
                                        <p class="description">打破传统健康模式，利用运动康复、精准康复，实现非药干预康复模式完善健康管理闭环</p>
                                        </div>
                                    </a>
                                    <a href="/a/yiliaotese/7.html" target="_blank" class="details">more<i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <a href="/" class="more wow">MORE<i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </body>
</html>
