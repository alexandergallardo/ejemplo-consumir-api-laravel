<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test - Alexander Gallardo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Mis CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- bootstrap - css datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

    <!-- jquery - bootstrap - datatable-->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

    <script src="/js/app.js"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('#datatableUsers').DataTable({
                order: [[6, 'desc']],
            });
        });
    </script>
</head>
<body class="antialiased">
    <div class="container">
        @if($users)
            <table id="datatableUsers" class="table table-striped table-bordered table-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>SEGMENTATION_ID</th>
                        <th>USER_ID</th>
                        <th>IDENTIFICATION_NUMBER</th>
                        <th>MOBILE_NUMBER</th>
                        <th>BIRTH_DATE</th>
                        <th>CREATED_AT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th><a href="/users/{{ $user->id }}">{{ $user->id }}</a></th>
                            <th>{{ $user->segmentation_id }}</th>
                            <th>{{ $user->user_id }}</th>
                            <th>{{ $user->identification_number }}</th>
                            <th>{{ $user->mobile_number }}</th>
                            <th>{{ $user->birth_date }}</th>
                            <th>{{ $user->created_at }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="post-preview">
                <h2 class="post-title"> 401 - Token incorrecto</h2>
            </div>
        @endif
    </div>
</body>
</html>
