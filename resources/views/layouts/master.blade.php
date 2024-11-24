<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <style>
        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 7%
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .table th {
            background-color: #f8f9fa;
            color: #333;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #ffc107;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #5a6268;
            color: #fff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .alert {
            padding: 10px 15px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .ttt{
            display: inline;

          padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 5px;
            transition: background-color 0.3s ease;

         }
         .bt{
            display: inline;
            margin-left: 30.5%;


         }
         .btn-danger{
     border-color:#FFEFC0 ; background-color:#FFEFC0 ;
    }
    .btn-danger:hover{
     background-color: black;
     border-color: black;
    }


    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

    @stack('styles')
</head>
<body>
    @include('includes.sidebar')

    <div class="main-content">
        @include('includes.header')

        @yield('content')


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ url('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
