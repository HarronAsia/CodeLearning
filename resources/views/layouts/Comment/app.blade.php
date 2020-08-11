<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HomePage</title>

    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

    <style>
        @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

        .navbar-icon-top .navbar-nav .nav-link>.fa {
            position: relative;
            width: 36px;
            font-size: 24px;
        }

        .navbar-icon-top .navbar-nav .nav-link>.fa>.badge {
            font-size: 0.75rem;
            position: absolute;
            right: 0;
            font-family: sans-serif;
        }

        .navbar-icon-top .navbar-nav .nav-link>.fa {
            top: 3px;
            line-height: 12px;
        }

        .navbar-icon-top .navbar-nav .nav-link>.fa>.badge {
            top: -10px;
        }

        @media (min-width: 576px) {
            .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link>.fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link>.fa>.badge {
                top: -7px;
            }
        }

        @media (min-width: 768px) {
            .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link>.fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link>.fa>.badge {
                top: -7px;
            }
        }

        @media (min-width: 992px) {
            .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link>.fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link>.fa>.badge {
                top: -7px;
            }
        }

        @media (min-width: 1200px) {
            .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link>.fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link>.fa>.badge {
                top: -7px;
            }
        }

        body {
            background: #eee;
        }

        span {
            font-size: 15px;
        }


        .box {
            padding: 60px 0px;
        }

        .box-part {
            background: #FFF;
            border-radius: 0;
            padding: 60px 10px;
            margin: 30px 0px;
        }

        .text {
            margin: 20px 0px;
        }

        .fa {
            color: #4183D7;
        }

        /*footer*/
        .col_white_amrc {
            color: #FFF;
        }

        footer {
            width: 100%;
            background-color: #263238;
            min-height: 250px;
            padding: 10px 0px 25px 0px;
        }

        .pt2 {
            padding-top: 40px;
            margin-bottom: 20px;
        }

        footer p {
            font-size: 13px;
            color: #CCC;
            padding-bottom: 0px;
            margin-bottom: 8px;
        }

        .mb10 {
            padding-bottom: 15px;
        }

        .footer_ul_amrc {
            margin: 0px;
            list-style-type: none;
            font-size: 14px;
            padding: 0px 0px 10px 0px;
        }

        .footer_ul_amrc li {
            padding: 0px 0px 5px 0px;
        }

        .footer_ul_amrc li a {
            color: #CCC;
        }

        .footer_ul_amrc li a:hover {
            color: #fff;
            text-decoration: none;
        }

        .fleft {
            float: left;
        }

        .padding-right {
            padding-right: 10px;
        }

        .footer_ul2_amrc {
            margin: 0px;
            list-style-type: none;
            padding: 0px;
        }

        .footer_ul2_amrc li p {
            display: table;
        }

        .footer_ul2_amrc li a:hover {
            text-decoration: none;
        }

        .footer_ul2_amrc li i {
            margin-top: 5px;
        }

        .bottom_border {
            border-bottom: 1px solid #323f45;
            padding-bottom: 20px;
        }

        .foote_bottom_ul_amrc {
            list-style-type: none;
            padding: 0px;
            display: table;
            margin-top: 10px;
            margin-right: auto;
            margin-bottom: 10px;
            margin-left: auto;
        }

        .foote_bottom_ul_amrc li {
            display: inline;
        }

        .foote_bottom_ul_amrc li a {
            color: #999;
            margin: 0 12px;
        }

        .social_footer_ul {
            display: table;
            margin: 15px auto 0 auto;
            list-style-type: none;
        }

        .social_footer_ul li {
            padding-left: 20px;
            padding-top: 10px;
            float: left;
        }

        .social_footer_ul li a {
            color: #CCC;
            border: 1px solid #CCC;
            padding: 8px;
            border-radius: 50%;
        }

        .social_footer_ul li i {
            width: 20px;
            height: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    @include('layouts.Comment.navbar')
    <!--- Content -->
    <div class="box">
        <div class="container-fluid">
            <div class="row">
                @yield('content')

            </div>
        </div>
    </div>
    <!--- Content -->

    @include('layouts.footer')



    <!--Latest JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
    <!--Latest JS, Popper.js, and jQuery -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            function PreviewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_preview_container').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            
            $(".camera #comment_image").change(function() {
                PreviewImage(this);
            });

            $(".camera #comment_image2").change(function() {
                PreviewImage(this);
            });

            $("[data-toggle=tooltip]").tooltip();

        });
    </script>

</body>

</html>