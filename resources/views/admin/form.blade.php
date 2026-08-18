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
<body>
<div id="main" class="container-fluid">
    <ul class="nav nav-pills" role="tablist">
        {{--<li role="presentation"><a href="/admin">Admin Index</a></li>--}}
        <li role="presentation"><a href="/admin/companies">Companies</a></li>
        <li role="presentation"><a href="/admin/users">Users</a></li>
        <li role="presentation" class="active">
            <a href="#">Contact Form <span class="badge">{{ count($submits) }}</span></a>
        </li>
    </ul>
    <br/>
    <table class="table table-striped table-bordered table-condensed fixed">
        <thead>
        <th>Time</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th></th>
        </thead>
        <tbody>
        @foreach( $submits as $submit )
            <tr>
                <td>{{ $submit->created_at }}</td>
                <td>{{ $submit->name }}</td>
                <td>{{ $submit->email }}</td>
                <td>{{ $submit->message }}</td>
                <td><a href="/admin/do-delete-contactform?id={{$submit->id}}" onclick="return confirm('Are you sure?')">[delete]</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
