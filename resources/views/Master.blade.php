<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>Dashboard Ideasi Edii</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <link rel="icon" href="images/icon.png" type="image/png">
    

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/m9p8474tex0nofv17x2l5mcesiaqwfqegoaseltw21xh581n/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="ideasi edii" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{ route('home') }}">
                                <i class="fas fa-home"></i>Home</a>
                        </li>

                        <li>
                            <a href="{{ route('overview') }}">
                                <i class="fas fa-star"></i>Overview</a>
                        </li>

                        <li>
                            <a href="{{ route('my.ideasi') }}">
                                <i class="fas fa-clone"></i>My Ideasi</a>
                        </li>
                        <li>
                            <a href="{{ route('Neighborhood') }}">
                                <i class="fas fa-user"></i>Neighborhood</a>
                        </li>

                        <li>
                            <a href="{{ route('message') }}">
                                <i class="fas fa-envelope"></i>Message</a>
                        </li>
                        
                       
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/logo.png" style="max-width: 120px; alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('home') }}">
                                <i class="fas fa-home"></i>Home</a>

                        </li>
                        <li>
                            <a href="{{ route('overview') }}">
                                <i class="fas fa-star"></i>Overview</a>
                        </li>

                        <li>
                            <a href="{{ route('my.ideasi') }}">
                                <i class="fas fa-clone"></i>My Ideasi</a>
                        </li>
                        <li>
                        
                            <a href="{{ route('Neighborhood') }}">
                            <i class="fas fa-user"></i>Neighborhood</a>

                        </li>

                        <li>
                            <a href="{{ route('message') }}">
                                <i class="fas fa-envelope"></i>Message</a>
                        </li>
                        
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>

                          
                            <div class="header-button">
                                <div class="noti-wrap">
                              
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">{{ count($comments) }} </span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have {{ count($comments) }} New message</p>
                                            </div>
                                            @foreach ($comments as $index => $idea)
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                <img src="{{ $idea->image ? asset('images/profile/'.$idea->image) : asset('images/profile/user-1.jpg') }}" alt="alt img" />
                                                </div>
                                                <div class="content">
                                                    <p>{{ $idea->comment }}</p>
                                                    <span>{{ $idea->commentator_name }}, {{ $idea->created_date }}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="email__footer">
                                                <a href="#">See all message</a>
                                            </div>
                                        </div>
                                    </div>

                                    @if (count($data ?? []) > 0)

                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>

                                     
                                          <span class="quantity">{{ count($notif) }}</span>
                                          <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have {{ count($notif) }} Notifications</p>
                                            </div>
                                       

                                            @foreach ($notif as $item)
                                            @if ($item->type === 'comment')

                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p><strong>{{ $item->actor_name }}</strong> berkomentar:</p>
                                                    <p>{{ $item->content }}</p>
                                                    <span class="date">{{ $item->created_date }}</span>
                                                </div>
                                            </div>

                                            @else

                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-thumb-up"></i>
                                                </div>
                                                <div class="content">
                                                p><strong>{{ $item->actor_name }}</strong> menyukai postingan ini.</p>
                                                    <!-- <p>{{ $item->content }}</p> -->
                                                    <span class="date">{{ $item->created_date }}</span>
                                                </div>
                                            </div>


                                            @endif 
                                            @endforeach


                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>

                                           

                                        </div>
                                    </div>
                                    @else
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>

                                     
                                          <span class="quantity">0</span>
                                          <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 0 Notifications</p>
                                            </div>
                                       

                                        

                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p><strong></strong> Belum ada komentar</p>
                                                    <p></p>
                                                    <span class="date"></span>
                                                </div>
                                            </div>
 
                                         


                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>

                                           

                                        </div>
                                    </div>


                                               
                                    @endif


                          

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ auth()->user()->profile_picture ? asset('images/profile/'.$profile->profile_picture) : asset('images/profile/user.png') }}" alt="User profile"  class="rounded-circle" />
                                        </div>
                                     
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                                        </div>
                                        <!-- Dropdown -->

                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                   <h4 class="name">
                                                        <a href="#">{{ auth()->user()->name }}</a>
                                                    </h4>
                                                    <span class="email">{{ auth()->user()->email }}</span>

                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{route('profile')}}">
                                                    <i class="zmdi zmdi-account"></i>Profile</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{route('password')}}">
                                                    <i class="zmdi zmdi-key"></i>Change Password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    @session('success')
                            <div class="alert alert-success alert-sm" role="alert"> 
                            {{ $value }}
                            </div>
                            @endsession

                     
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('isi')
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2024. All rights reserved by <a href="https://edi-indonesia.co.id">PT Edi Indonesia</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<script>
    tinymce.init({
        selector: '#content',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | ' +
                 'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
                 'link image media | forecolor backcolor removeformat | ' +
                 'insertdatetime charmap table | fullscreen preview code | help',
        menubar: 'file edit view insert format tools table help',
    });

   
    tinymce.init({
        selector: '#content_en',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | ' +
                 'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
                 'link image media | forecolor backcolor removeformat | ' +
                 'insertdatetime charmap table | fullscreen preview code | help',
        menubar: 'file edit view insert format tools table help',
    });
    </script>




<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('d-none'); // Menampilkan gambar
            };

            reader.readAsDataURL(file); // Membaca file sebagai data URL
        } else {
            imagePreview.src = "#";
            imagePreview.classList.add('d-none'); // Sembunyikan jika tidak ada gambar
        }
    });
</script>

<script>
    // Event listener untuk tombol delete
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-form'); // Ambil form terdekat
            
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Kirim form jika pengguna konfirmasi
                }
            });
        });
    });
</script>
