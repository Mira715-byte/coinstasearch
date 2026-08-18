<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>SmartJobs Admin - Companies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="/img/icons/suitcase.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div id="main" class="container-fluid">
    <ul class="nav nav-pills" role="tablist">
        <li role="presentation" class="active"><a href="/admin">Admin Index</a></li>
        <li role="presentation"><a href="/admin/companies">Companies</a></li>
        <li role="presentation"><a href="/admin/users">Users</a></li>
        <li role="presentation"><a href="/admin/contactform">Contact Form</a></li>
    </ul>
    <br/>
    <div><a href="{{ url('/logout') }}"> Ieși din cont</a></div>
</div>
</body>
</html>
