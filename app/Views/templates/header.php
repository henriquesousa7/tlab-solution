<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de Eventos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            background-color: blanchedalmond;
        }
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn{        
            font-size: 15px;
            font-weight: bold;
        }
        .login-form a {
            margin-bottom: 15px;
            padding: 30px;
            transform: translateY(50%);
        }
        .search{
            margin-top: 10px;
            margin-bottom: 2px;
            text-align: center;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; } 
        }
        .fadeIn {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body class="fadeIn">