<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="icon" href="{{ asset('frontend/img/icon-web/icon.png') }}" type="image/png">
    <title>Otomod - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        /* .row{
            padding: 0 !important;
        } */
        #header {
            transition: top 0.3s;
        }

        .p5px {
            padding: 5px !important;
        }

        .h-420 {
            height: 420px !important;
        }

        .h-205 {
            height: 205px !important;
            padding: 20px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .top-kat h4 {
            font-size: 18px;
        }

        .profile-section .nama-profile .h5 {
            font-size: 21px;
        }

        .nav-pills .nav-link {
            background: 0 0;
            border: 0;
            border-radius: .25rem;
            color: black;
            font-weight: bold;
            font-size: 12px;
            border: 2px solid #EDEDED;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 0px;
            border-top-right-radius: 0px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #0d0d0d;
            background-color: white;
            font-size: 12px;
            border: 2px solid #ffc107;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 0px;
            border-top-right-radius: 0px;
        }

        .kategori-merah {
            width: 14px !important;
            height: 22px !important;
            background-color: #DC3545 !important;
        }

        .kategori-abu {
            flex-grow: 1 !important;
            height: 22px !important;
            background-color: #EDEDED !important;
        }

        .badge {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1),
                0 1px 3px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s ease-in-out;
            display: inline !important;
        }

        .badge-kategori .badge {
            /* border-inline: 3px solid #ffc107;
            margin-right: 4px; */
            padding: 2px 4px !important;
        }

        .crown {
            /* border-inline: 3px solid #ffc107;*/
            margin-right: 4px;
        }

        .crown .fa-crown {
            margin-left: 2px;
        }

        .badge:hover {
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15),
                0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .link-detail {
            text-decoration: none !important;
            color: #212529;
        }

        .link-detail:hover {
            color: #212529 !important;
        }

        .carousel-item {
            height: 100% !important;
        }

        .carousel-item img {
            object-fit: cover;
            object-position: center;
            height: 100%;
        }

        .footer {
            background-color: #2d2f34;
            color: #ffffff;
            padding: 40px 0;
            margin-top: 50px;
            font-weight:  100 !important;
        }

        .footer a{
            color: #bfbfbf;
            text-decoration: none;
            font-weight: 300;
        }
        .footer p{
            color: #bfbfbf;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .social-icons a {
            margin: 0 10px;
            color: #ffffff;
        }

        @media (max-width: 575.98px) {

            /* Aturan CSS untuk ukuran ekstra kecil (xs) */
            .profile-section .nama-profile .h5 {
                /* Properti CSS yang ingin Anda terapkan di sini */
                font-size: 18px !important;
                /* Contoh properti lainnya */
            }
        }

        .checkmark {
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: center;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid green;
        }

        .checkmark i {
            font-size: 60px;
            color: green;
        }

        .checkmarks {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: center;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid red;
        }

        .checkmarks i {
            font-size: 120px;
            color: red;
        }

        .animate__animated.animate__rotateIn {
            --animate-duration: 1s;
        }

        :root {
            --animate-duration: 800ms;
            --animate-delay: 0.9s;
        }
    </style>
</head>

<body>
    @include('frontend.partials.navbar')

    @php
        $countBerita = 0;
    @endphp

    <div class="container">

        @yield('contents')

    </div>

    @include('frontend.partials.footer')

    @include('frontend.modals.modal')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        let lastScrollTop = 0;
        const header = document.getElementById('header');

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                header.style.top = '-76px';
            } else {
                header.style.top = '0';
            }
            lastScrollTop = scrollTop;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend/js/tanggal.js') }}"></script>
    <script src="{{ asset('frontend/js/profile.js') }}"></script>
    <script src="{{ asset('backend/js/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'undo', 'redo']
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
    @yield('scripts')
</body>

</html>
