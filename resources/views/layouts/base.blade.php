<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORTAL PELAPORAN eGUMIS MOBILE APPS</title>
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/vendor/choices/choices.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">
    <link href="/vendor/fullcalendar/main.min.css" rel="stylesheet">
    <link href="/vendor/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="/vendor/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script src="/assets/js/config.js"></script>
    <script src="/vendor/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="/vendor/choices/choices.min.js"></script>

</head>

<body>

    <style>
        .button {
            background-color: #1A7FE5;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .logo .mobile {
            display: none;
        }

        @media (max-width: 600px) {
            .logo .mobile {
                display: block;
            }

            .logo .desktop {
                display: none;
            }
        }

        .header {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 20px 10px;
        }

        .header a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }

        .form {
            display: inline;
        }

        .form-group {
            display: inline-block;
        }

        .form-select {
            border-color: #1A7FE5;
            box-shadow: inset 2px 2px 5px 2px lightgrey;
        }

        /* .card-body{
            background: #003478;
        } */
        .form-control {
            border-color: #1A7FE5;
            box-shadow: inset 2px 2px 5px 2px lightgrey;
        }

        .text-primary {
            color: #EB5500 !important;
        }

        .bg-primary {
            background-color: #EB5500 !important;
            color: white;
        }

        .text-dark-green-jkr {
            color: #1A7FE5;
        }

        .btn-green-jkr {
            color: white;
            background-color: #5B8E7D;
        }

        .btn-green-jkr:hover {
            color: white;
            background-color: #335349;
        }

        .btn-outline-green-jkr {
            color: #5B8E7D;
            background-color: white;
            border-color: #5B8E7D;
        }

        .btn-outline-green-jkr:hover {
            color: white;
            background-color: #335349;
        }

        .btn-orange-jkr {
            color: white;
            background-color: #EB5500;
        }

        .btn-orange-jkr:hover {
            color: white;
            background-color: #be4803;
        }

        .btn-outline-orange-jkr:hover {
            color: white;
            background-color: #be4803;
        }

        .bg-orange-jkr {
            background-color: #EB5500;
        }

        .line-table {
            border-color: #1A7FE5;
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            background: none repeat scroll 0 0 #ffffff75;
        }

        .word {
            position: absolute;
            margin-top: 120px;
            margin-left: 25px;
            font-weight: bold;
        }

        .spinner {
            border: 1px solid transparent;
            border-radius: 3px;
            position: relative;
        }

        .spinner:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 45px;
            height: 45px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 5px solid #1A7FE5;
            border-top-color: #ffffff00;
            animation: spinner 0.9s linear infinite;
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }
    </style>


    @include('sweetalert::alert')



    <style>
        /* .form-control {
            border-color: #1A7FE5;
        } */

        .nav-link-egumis.active {
            background-color: #003478;
            color: white;
        }

        .nav-link.active {
            background-color: #003478;
            border-radius: 2px;
            color: black;
        }

        .nav-link.active-main {
            background-color: #003478;
            border-radius: 5px;
            color: white;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #003478;
        }

        .nav-link {
            display: block;
            padding: 0.5rem 1rem;
            color: #003478;
            -webkit-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
            -o-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #fff;
            background-color: #003478;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-primary,
        .navbar-vertical .btn-purchase,
        .tox .tox-menu__footer .tox-button:last-child,
        .tox .tox-dialog__footer .tox-button:last-child {
            color: #003478;
            background-color: #FFFFFF;
            border-color: #FFFFFF;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }

        .btn-primary:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #fff;
            background-color: #003478;
            border-color: #FFF;
        }

        .btn-check:focus+.btn-primary,
        .navbar-vertical .btn-check:focus+.btn-purchase,
        .tox .tox-menu__footer .btn-check:focus+.tox-button:last-child,
        .tox .tox-dialog__footer .btn-check:focus+.tox-button:last-child,
        .btn-primary:focus,
        .navbar-vertical .btn-purchase:focus,
        .tox .tox-menu__footer .tox-button:focus:last-child,
        .tox .tox-dialog__footer .tox-button:focus:last-child {
            color: #fff;
            background-color: #003478;
            border-color: #003478;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%), 0 0 0 0 rgb(76 143 233 / 50%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%), 0 0 0 0 rgb(76 143 233 / 50%);
        }

        .btn-secondary {
            color: #FFF;
            background-color: #1A7FE5;
            border-color: #FFF;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }

        .btn-secondary:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #003478;
            background-color: #fff;
            border-color: #003478;
        }

        .btn-outline-primary {
            color: #F4A258;
            border-color: #F4A258;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #FFF;
            border-color: #FFF;
        }


        .nav-link-side {
            /* display: block; */
            padding: 0.5rem 1rem;
            color: #fff;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .nav-link-side {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .nav-link-side:hover,
        .nav-link-side:focus {
            color: #fff;
            background-color: #003478;
            text-decoration: none;
            border-radius: 5px;
        }

        .nav-link-side.disabled {
            color: #748194;
            pointer-events: none;
            cursor: default;
        }

        li {
            display: list-item;
            color: #003478;
            text-align: -webkit-match-parent;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: var(--falcon-pagination-active-color);
            background-color: #003478;
            border-color: #003478;
        }

        .dropdown-indicator:after {
            content: "";
            display: block;
            position: absolute;
            right: 5 px;
            height: 0.4 rem;
            width: 0.4 rem;
            border-right: 1 px solid white;
            border-bottom: 1 px solid white;
            top: 50%;
            -webkit-transform: translateY(-50%) rotate(45deg);
            -ms-transform: translateY(-50%) rotate(45deg);
            transform: translateY(-50%) rotate(45deg);
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            -webkit-transform-origin: center;
            -ms-transform-origin: center;
            transform-origin: center;
            -webkit-transition-property: border-color, -webkit-transform;
            transition-property: border-color, -webkit-transform;
            -o-transition-property: transform, border-color;
            transition-property: transform, border-color;
            transition-property: transform, border-color, -webkit-transform;
        }

        @media (min-width: 100px) {

            /* @media only screen and (max-width: 600px) and (min-width: 400px)  {  */
            .navbar-vertical.navbar-expand-xl {
                max-width: 350px;
                top: 0;
                height: 100%;
                margin: 0;
            }

            .navbar-vertical.navbar-expand-xl .navbar-collapse {
                margin-top: 50px;
                width: 100%;
                /* height: 100%; */
                background: #1A7FE5;
            }

            .navbar-vertical.navbar-expand-xl .navbar-vertical-content {
                width: 100%;
                height: 100%;
                padding: 0.5rem 0 0 0;
            }

            .navbar-vertical {
                position: absolute;
                background: #1A7FE5;
                max-width: 350px;
            }

            .navbar-vertical-content {
                background: #1A7FE5;
                width: 350px;
            }

            .navbar-nav {
                background: #1A7FE5;
                width: 350px;
            }

            .egumis-m {
                margin-left: 350px;
            }

            .navbar-vertical .navbar-collapse .navbar-vertical-content {
                padding: 0 1rem;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                max-height: 100%;
            }
        }

        @media only screen and (max-width: 1024px) {
            .egumis-m {
                margin-left: 0px;
            }

            .navbar-vertical {
                position: absolute;
                background: #1A7FE5;
                max-width: 100%;
            }

            .navbar-vertical.navbar-expand-xl {
                max-width: 100%;
                top: 40px;
                height: auto;
                margin: 0;

            }

            .navbar-vertical.navbar-expand-xl .navbar-collapse {
                width: 100%;
                height: auto;
                background: #003478;
            }

            .navbar-vertical.navbar-expand-xl .navbar-vertical-content {
                width: 100%;
                height: auto;
                padding: 0.5rem 0 0 0;
            }

            .navbar-vertical {
                position: absolute;
                background: #1A7FE5;
                max-width: 100%;
            }

            .navbar-vertical-content {
                background: #1A7FE5;
                width: 100%;
            }
        }

        .form-check-input:checked {
            background-color: #1A7FE5;
            border-color: #1A7FE5;
        }

        /* @media screen and (max-width: 480px) {
            .background-pg, .navbar-atas {
                width: auto;
            }
        } */

        /* @media screen and (max-width: 375px) {
            .background-pg, .navbar-atas {
                width: 50%;
            }
        } */

        /* Screen Resolution for body*/
        @media screen and (min-width: 320px) {

            body,
            .background-pg,
            .navbar-atas {
                /* width: auto; */
                float: none;
            }
        }

        @media screen and (min-width: 320px) and (max-device-width : 480px) {
            .egumis-logo {
                max-width: 20px;
                height: auto;
            }
        }

        input {
            max-width: 200x;
            width: 80%;
            min-width: 50px;
        }
    </style>
    <?php
    use Illuminate\Support\Facades\Auth;
    ?>

    <main class="main" id="top">
        <nav class="navbar-atas navbar navbar-expand p-3"
            style="box-shadow: 0px 2px 2px 1px lightgrey; background-image: url('/assets/img/header.png'); z-index: 2;">

            <div class="col-3 text-center" style="filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));">
                <img src="/assets/img/IOS-eGUMIS_1024px_1.png" alt="EGUMIS">
            </div>

            <div class="col">
                <h1 class="text-white">PORTAL PELAPORAN eGUMIS MOBILE APPS</h1>
                <h4 class="text-white">JABATAN AKAUNTAN NEGARA MALAYSIA (JANM)</h4>
            </div>
        </nav>
        <div class="container-fluid ps-0" data-layout="container">
            @include('layouts.side-bar')
            <div class="row">
                <div class="content py-5 background-pg" style="background: white">
                    <div class="egumis-m">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="/vendor/popper/popper.min.js"></script>
    <script src="/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/vendor/anchorjs/anchor.min.js"></script>
    <script src="/vendor/is/is.min.js"></script>
    <script src="/vendor/chart/chart.min.js"></script>
    <script src="/vendor/echarts/echarts.min.js"></script>
    <script src="/vendor/fullcalendar/main.min.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script src="/vendor/fontawesome/all.min.js"></script>
    <script src="/vendor/lodash/lodash.min.js"></script>
    <script src="/assets/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    @yield('scripts')

    <!--JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>


    <script>
        var buttonConfig = [];
        var exportTitle = "ExportTableData"
        buttonConfig.push({
            extend: 'copyHtml5',
            title: exportTitle
        });
        buttonConfig.push({
            extend: 'copyHtml5',
            title: exportTitle,
            className: 'btn-success'
        });
        buttonConfig.push({
            extend: 'copyHtml5',
            title: exportTitle,
            className: 'btn-warning'
        });

        $.fn.dataTable.Buttons.defaults.dom.button.className = 'button';
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                scrollX: true,
                "bInfo": false,
                "language": {
                    "sLengthMenu": "PAPAR _MENU_ REKOD",
                    search: "",
                    searchPlaceholder: "Carian",
                    "emptyTable": "Tiada maklumat yang dipaparkan",
                    "zeroRecords": "Tiada pencarian yang dijumpai",
                    "paginate": {
                        "previous": "Kembali",
                        "next": "Seterusnya"
                    }
                },
                dom: 'lfBrtip',
                buttons: buttonConfig,
                stripeClasses: ['stripe-1', 'stripe-2'],
                buttons: [{
                        extend: 'pdf',
                        text: 'PDF <i class="fa fa-download" aria-hidden="true"></i>',
                        download: 'open',
                        pageSize: 'LEGAL',
                        orientation: 'landscape',
                        init: function(api, node, config) {
                            $(node).removeClass('btn-default')
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'EXCEL <i class="fa fa-download" aria-hidden="true"></i>',
                        download: 'open',
                    }
                ]
            });
        });
    </script>
</body>

</html>
