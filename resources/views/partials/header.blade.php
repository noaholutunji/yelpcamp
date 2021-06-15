<!DOCTYPE html>
<html>
    <head>
        <title>YelpCamp</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/stylesheets/main.css">
        <script src="https://code.jquery.com/jquery-git2.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">YelpCamp</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Signed In As {{ Auth::user()->name }} </a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    </body>
