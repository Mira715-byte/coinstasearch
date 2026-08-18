<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CoInstaSearch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div id="main" class="container-fluid">
    <ul class="nav nav-pills meniu-admin" role="tablist">
        {{--<li role="presentation"><a href="/admin">Admin Index</a></li>--}}
        <li role="presentation" class="active">
            <a href="#">Companii <span class="badge">{{ count($companies) }}</span></a>
        </li>
        <li role="presentation"><a href="/admin/users">Users</a></li>
        <li role="presentation"><a href="/admin/contactform">Formular de contact</a></li>
        <li role="presentation"><a href="{{ url('/logout') }}"> Ieși din cont</a></li>
    </ul>
    <br/>
    <table class="table table-striped table-bordered table-condensed fixed">
        <thead>
        <th>ID</th>
        <th>Nume companie</th>
        <th>Telefon</th>
        <th>Oraș</th>
        <th>Descrierea companiei</th>
        <th></th>
        </thead>
        <tbody>
        @foreach( $companies as $company )
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->CUI }}</td>
                <td>{{ $company->phone }}</td>
                <td>{{ $company->web }}</td>
                <td>{{ $company->company_description }}</td>
                <td><a href="/admin/do-delete-company?id={{$company->id}}" onclick="return confirm('Are you sure?')">[șterge]</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
