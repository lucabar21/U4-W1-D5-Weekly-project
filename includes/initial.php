<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Weekly project U4-W3-D5</title>
    <style>
        body {
            font-family: "Roboto", sans-serif;
        }

        #btn:hover {
            transform: scale(1.1);
            box-shadow: 0px 3px 2px 0px rgba(0, 0, 0, 0.3);
        }

        #btn-top {
            background-color: #0B5ED7;
            width: 200px;
            height: 30px;
            border-radius: 15px;
            cursor: pointer;
        }

        #btn-top:hover {
            transform: scale(1.05);
            transition: 0.1s;
            box-shadow: 0px 0px 0px 1px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>
    <nav style="background-color: #0B5ED7; height:50px" class="d-flex justify-content-center align-items-center">
        <div class="container-fluid">
            <div id="btn-top" class="d-flex justify-content-center align-items-center mx-auto">
                <a style="color:#fff" class="nav-link active" href="add.php/"> <i class="bi bi-plus-circle"></i>
                    Aggiungi libro</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">