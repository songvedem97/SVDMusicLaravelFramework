<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{url('public/site')}}/image/Logo-mini.png" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('public/site')}}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{url('public/site')}}/css/responsive.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <script src="{{url('public/site')}}/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://kit.fontawesome.com/f9275dded9.js" crossorigin="anonymous"></script>
    @yield('css')
</head>

<body>
  
    <!--POP UP LOGIN-->
    <div class="login-form" id="login-form">
        <div class="modal-body">
            <div id="overlay"></div>
            <div class="container" id="container_login">
                <img class="bg-login" src="{{url('public/site')}}/image/bg-login.PNG" />
                <button data-dismiss="modal" id="close_login_popup" class="close_login_popup"><span
                        class="btn material-icons-outlined">
                        close
                    </span></button>
                <div class="form-container sign-up-container">
                    <form action="#">
                        <h2>Tạo Tài Khoản</h2>
                        <input type="text" placeholder="Username" />
                        <input type="email" placeholder="Email" />
                        <input type="password" placeholder="Password" />
                        <input type="password" placeholder="Repeat Password" />
                        <button class="btn btn-sign-up">Đăng Kí</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form action="#">
                        <h2>Đăng Nhập</h2>
                        <input type="email" placeholder="Username" />
                        <input type="password" placeholder="Password" />
                        <a href="#">Quên mật khẩu?</a>
                        <button class="btn">Đăng Nhập</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h2>Chào mừng quay trở lại!</h2>
                            <p>Khám phá và tận hưởng nhiều âm nhạc hơn</p>
                            <button class="ghost btn" id="signIn">Đăng Nhập</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h2>Xin chào!</h2>
                            <p>Tham gia với chúng tôi</p>
                            <button class="ghost btn" id="signUp">Đăng Kí</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!--CONTROL PLAYER-->
 <div class="ms-play-control-container">
    <div class="ms-play-control-container-bg"></div>
    <div class="ms-play-control-wrapper">
        <div class="ms-play-control-info">

            <div class="ms-play-control-img-song">
                <button class="equalizer">
                    <span class="eq1"></span>
                    <span class="eq2"></span>
                    <span class="eq3"></span>
                </button>

                <img onerror="this.src='{{url('public/uploads/image_song/song_default.jpg')}}'" class="play-control-img-song" />
            </div>
            <div class="ms-control-info-song">
                <div class="name-song"></div>
                <div class="creator"></div>
            </div>
        </div>
        <div class="ms-play-control-player">
            <div class="ms-control-player-button-control">
                <i class="fas fa-step-backward btn-prev"></i>
                <a class="play-button">
                    <i class="fas fa-play btn-play"></i>
                </a>
                <i class="fas fa-step-forward btn-next"></i>

            </div>
            <div class="ms-player-progress-bar">
                <div class="wrapper-proggress-bar">
                    <div class=" time current-time">00:00</div>
                    <input class="progress-bar" value="0" step="1" min="0" max="100" type="range" />
                    <div class="time duration-time"></div>
                </div>
            </div>
        </div>
        <div class="ms-play-control-right">
            <div class="ms-play-control-random">
                <span class="material-icons-outlined btn-random">
                    shuffle
                </span>
            </div>
            <div class="ms-play-control-loop "><span class="material-icons-outlined btn-loop">
                    loop
                </span></div>
            <div class="ms-play-control-add-play-list">
                <span class="material-icons-outlined">
                    playlist_add
                </span>
            </div>
            <div class="ms-play-control-volume">
                <i class="fas fa-volume-up btn-volume"></i>
                <input class="volume" type="range" value="50" min="0" max="100" />
            </div>

        </div>
    </div>
</div>
    <div id="app" class="container-app">
        <div class="overlay-nav-bar-mobile"></div>
        <!--NAVBAR-->
        <div class="ms-nav-bar" id="nav-bar">
            <div id="logo" class="ms-logo">
                <img class="logo-desktop" src="{{url('public/site')}}/image/Logo.png" width="150" />
                <img class="logo-mobile" src="{{url('public/site')}}/image/Logo-mini.png" width="50" height="50" />
                <img class="logo-tablet" src="{{url('public/site')}}/image/Logo-mini.png" width="50" height="50" />
            </div>
            <ul class="nav-bar-top">
                <a href="{{route('home.user')}}"  class="{{'user' == request()->path() ? 'is-active' : ''}}">
                    <li><span class="material-icons-outlined">album</span>
                        <p>Cá Nhân</p>
                    </li>
                </a>
                
                <a href="{{route('home.index')}}" class="{{'/' == request()->path() ? 'is-active' : ''}}">
                    
                    <li>
                        <span class="material-icons-outlined">graphic_eq</span>
                        <p>Trang Chủ</p>
                    </li>
                </a>
                <a href="{{route('home.bxh')}}"  class="{{'bxh' == request()->path() ? 'is-active' : ''}}">
                    <li><span class="material-icons-outlined">equalizer</span>
                        <p>BXH</p>
                    </li>
                </a>
                <a href="{{route('home.newsong')}}" class="{{'newsong' == request()->path() ? 'is-active' : ''}}">
                    <li><span class="material-icons-outlined">music_note</span>
                        <p>Nhạc Mới</p>
                    </li>
                </a>
                <a href="{{route('home.artist')}}" class="{{'artist' == request()->path() ? 'is-active' : ''}}">
                    <li><span class="material-icons-outlined">people_outline</span>
                        <p>Nghệ Sĩ</p>
                    </li>
                </a>
            </ul>
            <div class="hr-nav-bar"></div>
            <ul class="nav-bar-bottom">
                <a href="{{route('home.top100')}}" class="{{'top100' == request()->path() ? 'is-active' : ''}}">
                    <li><span class="material-icons-outlined">show_chart</span>
                        <p>Top 100</p>
                    </li>
                </a>
                <a href="{{route('home.category')}}" class="{{'category' == request()->path() ? 'is-active' : ''}}">
                    <li><span class="material-icons-outlined">library_books</span>
                        <p>Thể loại</p>
                    </li>
                </a>
                <a href="#">
                    <li><span class="material-icons-outlined login-mobile">
                            login
                        </span>
                    </li>
                </a>
            </ul>
            <div class="suggesstion-login">
                <p>Tham gia ngay để khám phá những playlist dành riêng cho chính bạn.</p>
                <button id="join-now" class="btn btn-gradient">Tham Gia</button>

            </div>
        </div>
        <!--CONTENT APP-->
        <div class="ms-content">
            <!--HEADER -->
            <div id="header" class="ms-wrapper-header">
                <div class="ms-header">
                    <div id="search" class="search-container">
                        <button class="ms-btn-search">
                            <span class="material-icons-outlined">
                                search
                            </span></button>
                        <div class="input-wrapper"><input type="text" id="input-search" class="form-control"
                                placeholder="Nhập tên bài hát, nghệ sĩ…" value=""></div>
                    </div>
                    <div class="ms-header-control">
                        <div class="wrapper-header-control">
                            <a id="signUpHeader" class="btn sign-up-trigger" href="#" data-target="#login"
                                data-toggle="modal">Đăng Ký</a>
                            <a id="signInHeader" class="btn login-trigger" href="#" data-target="#login"
                                data-toggle="modal">Đăng Nhập</a>
                            <img src="{{url('public/site')}}/image/default.jpg" />
                        </div>
                    </div>
                </div>
            </div>
            @yield('main')
            <!--FOOTER-->
            <div class="ms-footer">
                <div class="footer-contact">
                    <div class="wrapper-bg-contact">
                        <div class="wrapper-item-contact">
                            <div class="bg-footer-alpha"></div>
                            <div class="wrapper-item-footer">
                                <div class="about-us item-contact">
                                    <ul>
                                        <li>
                                            <p class="title-footer">Về chúng tôi</p>
                                        </li>
                                        <li>
                                            <div class="hr-footer"></div>
                                        </li>
                                        <li><span class="material-icons-outlined">
                                                stay_primary_portrait
                                            </span>036-282-3931</li>
                                        <li><span class="material-icons-outlined">
                                                lightbulb
                                            </span>info@iamrocklee.org</li>
                                        <li><span class="material-icons-outlined">
                                                school
                                            </span>TayNguyen University, Buon Ma Thuot, DakLak.</li>
                                    </ul>
                                </div>
                                <div class="support-client item-contact">


                                    <ul>
                                        <li>
                                            <p class="title-footer">Hỗ trợ khách hàng</p>
                                        </li>
                                        <li>
                                            <div class="hr-footer"></div>
                                        </li>
                                        <li>Email: hotro@svdmusic.com</li>
                                        <li>Đường dây nóng: 1900 1997</li>
                                    </ul>
                                </div>
                                <div class="contact-adv item-contact">
                                    <ul>
                                        <li>
                                            <p class="title-footer">Liên hệ quảng cáo</p>
                                        </li>
                                        <li>
                                            <div class="hr-footer"></div>
                                        </li>
                                        <li>Hotline: (036) 282 3931</li>
                                        <li>Email: hoangducbmt1997@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="footer-copyright">
                    <div class="wrapper-footer-copyright container-content">
                        <div class="wrapper-footer-info footer-item">
                            <p>© 2021 SVD Music. Copyright by<a href="#"> songvedem</a>
                            </p>
                        </div>
                        <div class="wrapper-icon-footer footer-item">
                            <ul>
                                <li>
                                    <img src="{{url('public/site')}}/image/t_ic_facebook.png" width="25px" />
                                </li>
                                <li>
                                    <img src="{{url('public/site')}}/image/t_ic_instagram.png" width="25px" />
                                </li>
                                <li>
                                    <img src="{{url('public/site')}}/image/t_ic_tiktok.png" width="25px" />
                                </li>
                                <li>
                                    <img src="{{url('public/site')}}/image/t_ic_twitter.png" width="25px" />
                                </li>
                            </ul>
                        </div>
                        <div class="wrapper-privacy footer-item">
                            <p>© SVD Corp. All rights reserved</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="{{url('public/site')}}/js/control.js"></script>
    <script src="{{url('public/site')}}/js/app.js"></script>
    @yield('js')
</body>

</html>
