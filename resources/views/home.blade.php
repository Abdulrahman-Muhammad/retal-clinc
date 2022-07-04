<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css">


    <style>
        .alert-tags .window h2 {
            font-size: 22px;

        }

        .pop_up_sucsess .body_alert #error_code p {
            margin: 0;
            margin-top: 10px
        }

        .navbar-light {
            background-color: black;
        }

        .ic-table_container {
            height: 100vh;
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;

        }

        .table-holder {
            width: 100%;
            /* padding: 0 100px; */
        }

        .navbar {
            background-color: #ab3c31;
            color: #fff;
        }

        .navbar-light .navbar-brand {
            text-transform: capitalize;
            color: #fff;
            font-size: 28px;

        }

        .navbar-light .navbar-brand:hover {
            color: #fff;
        }

        .ic-table {
            width: 100%;
        }

        /*edit navber*/
        .navbar-light .navbar-nav .nav-link {
            color: #fff;
            font-size: 18px;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: rgba(255, 255, 255, 0.764);
        }

        .navbar-expand-lg .navbar-collapse {
            justify-content: flex-end;
        }

        footer {
            background-color: rgb(20, 20, 20);
            padding: 15px 0;

        }

        footer h4 {
            color: #fff;
            font-size: 18px;
        }
    </style>
    <link rel="stylesheet" href="css/table.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">retal clinc</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="ic-table_container">
        <div class="container">
            <div class="ic-table " id="transaction_lists">
                <div class="table-holder">

                    <div class="header ">
                        <h3>
                            Patients
                        </h3>
                        <form class="search">

                            <input type="hidden" name="_token" value="PNko7ZLgRfiFolKPpiTKRj3kX3mFFdxE0tV1Fg7o">
                            <div class="up-input">

                                <div class="input">
                                    <input type="text" id="product_id_search" placeholder="Search By name"
                                        onkeyup="nosearch()"">
                                </div>

                            </div>
                            <button type="button" onclick="search()" class="btn btn-primary">Search</button>
                        </form>

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col"> phone number</th>
                                <th scope="col">Date</th>
                                <th scope="col">category</th>
                                <th scope="col">actions</th>

                        </thead>
                        <tbody id="body-table"></tbody>
                    </table>

                    <ul id="page-number">
                    </ul>
                    <div class="load" id="load_first"><i class="fas fa-spinner"></i></div>
                </div>
            </div>
        </div>
    </div>


    <!--success window-->
    <div class="pop_up_sucsess d-none" id="pop_up_sucsess">
        <div class="rgba" id="rgba"></div>
        <div class="body_alert">
            <div class="icone">
                <i class="fas fa-check"></i>
            </div>
            <h5>success</h5>
            <p id="mes_suc"></p>
            <div class="buttons_confirm">
                <button class="ok" onclick="rgba()">ok</button>

            </div>
        </div>
    </div>
    <!--pop_up form-->
    <div class="popup_form d-none" id="popup_form">
        <div class="rgba" id="rgba" onclick="rgba()"></div>

        <div class="body_form">
            <div class="header">
                <h2>Create a Gif card </h2>
            </div>
            <form action="">
                <div class="input">
                    <p class="error_form d-none" id="code" class=""></p>
                    <input type="text" placeholder="Code" id="input_code" class="inputs">
                </div>
                <div class="input">
                    <p class="error_form d-none" id="name"></p>

                    <input type="text" placeholder="Name" id="input_name" class="inputs">
                </div>
                <div class="input">
                    <p class="error_form d-none" id="description"></p>
                    <input type="text" placeholder="Description" id="input_description" class="inputs">
                </div>
                <button onclick="createAgift()" type="button">add</button>
            </form>
        </div>
    </div>


    <!--pop_up charge-->
    <div class="popup_form d-none" id="charge">
        <div class="rgba" id="charge" onclick="rgba()"></div>

        <div class="body_form">
            <div class="header">
                <h2>Charge GiftCard
                </h2>
            </div>
            <form action="">
                <div class="input">
                    <p class="error_form d-none" id="Amount" class=""></p>
                    <input type="number" placeholder="Amount" id="amount" class="inputs">
                </div>

                <button onclick="SubCharge()" type="button">add</button>
            </form>
        </div>
    </div>
    <div class="loading d-none" id="loading">
        <div class="in_load"><i class="fas fa-spinner"></i></div>
    </div>
    <div class="pop_up_sucsess error d-none" id="pop_up_error">
        <div class="rgba" id="rgba" onclick="rgba()"></div>
        <div class="body_alert">
            <div class="icone">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h5>Error</h5>
            <div id="error_code">
                <p id="mes_error"> </p>

            </div>
            <div class="buttons_confirm">
                <button class="ok" onclick="rgba()">ok</button>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <h4>© 2022 Retal clinic. All rights reserved.</h4>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>
