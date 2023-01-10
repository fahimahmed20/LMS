<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LMS</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">

    <style>
        body{
            background-color: #f5f5f5;
        }
        .btn-column {
            height: 400px;
            width: 400px;
            background: #ffffff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 50px;
            filter: drop-shadow(5px 10px 4px #eceaea);
        }
        .btn-column h1{
            font-size: 36px;
            text-align: center;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 50px;
        }
        .btn-column a{
            display: block;
            font-size: 22px;
            padding-top: 12px;
            padding-bottom: 12px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="btn-column">
                <h1>welcome</h1>
                <a class="btn btn-primary d-block" href="librarian/">Librarian</a>
                <a class="btn btn-info d-block" href="student/">Student</a>
            </div>
        </div>
    </div>
</body>
</html>