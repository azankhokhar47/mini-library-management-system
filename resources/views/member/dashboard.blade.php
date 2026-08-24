<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Member Dashboard</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        /* ================================
           BODY
        ================================= */

        body {
            min-height: 100vh;

            background: #ddd0c3;

            color: #44352e;
        }


        /* Soft Yellow Glow */

        body::before {
            content: "";

            position: fixed;

            width: 400px;
            height: 400px;

            background: #e1b951;

            filter: blur(160px);

            opacity: .10;

            top: -180px;
            left: -150px;

            pointer-events: none;
        }


        /* Soft Red Glow */

        body::after {
            content: "";

            position: fixed;

            width: 350px;
            height: 350px;

            background: #cf776e;

            filter: blur(160px);

            opacity: .09;

            bottom: -160px;
            right: -120px;

            pointer-events: none;
        }



        /* ================================
           SIDEBAR
        ================================= */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

            width: 235px;

            height: 100vh;

            background:
                linear-gradient(
                    160deg,
                    #cdbbaa,
                    #bfa99a
                );

            border-right: 1px solid #b9a496;

            padding: 25px 16px;

            z-index: 10;
        }



        /* BRAND */

        .brand {

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 5px 10px 30px;
        }


        .brand-icon {

            width: 44px;

            height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 13px;

            background: #edc75f;

            font-size: 22px;

            box-shadow:
                0 7px 18px
                rgba(60, 42, 28, .18);
        }


        .brand h2 {

            font-size: 20px;

            color: #403129;
        }


        .brand h2 span {

            color: #bd7167;
        }



        /* MENU TITLE */

        .menu-title {

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1px;

            color: #806d61;

            padding: 0 12px;

            margin-bottom: 10px;
        }



        /* MENU */

        .menu {

            list-style: none;
        }


        .menu li {

            margin-bottom: 5px;
        }


        .menu a {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border-radius: 10px;

            text-decoration: none;

            color: #5d4c43;

            font-size: 14px;

            transition: .2s;
        }


        .menu a:hover {

            background:
                rgba(255, 248, 238, .35);

            transform: translateX(2px);
        }


        .menu a.active {

            background: #edc75f;

            color: #49351e;

            font-weight: 600;

            box-shadow:
                0 6px 15px
                rgba(190, 145, 55, .18);
        }


        .menu-icon {

            width: 22px;

            text-align: center;

            font-size: 16px;
        }



        /* LOGOUT */

        .logout {

            position: absolute;

            left: 16px;

            right: 16px;

            bottom: 25px;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            color: #b65f58;

            text-decoration: none;

            border-radius: 10px;

            font-size: 14px;

            transition: .2s;
        }


        .logout:hover {

            background:
                rgba(213, 123, 114, .12);
        }



        /* ================================
           MAIN
        ================================= */

        .main {

            margin-left: 235px;

            min-height: 100vh;

            padding: 30px 35px;

            position: relative;

            z-index: 2;
        }



        /* ================================
           TOP
        ================================= */

        .top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .top h1 {

            font-size: 28px;

            color: #44352e;

            margin-bottom: 5px;
        }


        .top p {

            font-size: 13px;

            color: #88766d;
        }



        /* USER */

        .user {

            display: flex;

            align-items: center;

            gap: 10px;

            background: #eadfd4;

            border: 1px solid #cdbbae;

            padding: 7px 12px;

            border-radius: 30px;
        }


        .avatar {

            width: 38px;

            height: 38px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #d47b72;

            color: white;

            font-weight: bold;
        }


        .user strong {

            display: block;

            font-size: 13px;

            color: #4a3931;
        }


        .user span {

            display: block;

            font-size: 11px;

            color: #8b7970;
        }



        /* ================================
           WELCOME CARD
        ================================= */

        .welcome {

            background:
                linear-gradient(
                    135deg,
                    #e7c875,
                    #d99b88
                );

            border-radius: 19px;

            padding: 27px 30px;

            margin-bottom: 22px;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 12px 30px
                rgba(100, 70, 45, .14);
        }


        .welcome::after {

            content: "📚";

            position: absolute;

            right: 40px;

            top: 12px;

            font-size: 85px;

            opacity: .17;
        }


        .welcome h2 {

            font-size: 23px;

            color: #44352e;

            margin-bottom: 7px;
        }


        .welcome p {

            max-width: 540px;

            font-size: 13px;

            line-height: 1.6;

            color: #5e4c42;
        }



        /* ================================
           STATISTICS
        ================================= */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 17px;

            margin-bottom: 22px;
        }


        .stat {

            background: #eadfd4;

            border: 1px solid #cdbbae;

            border-radius: 16px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 14px;

            box-shadow:
                0 8px 20px
                rgba(70, 50, 38, .07);

            transition: .2s;
        }


        .stat:hover {

            transform: translateY(-3px);
        }


        .stat-icon {

            width: 47px;

            height: 47px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 13px;

            background: #edc75f;

            font-size: 21px;
        }


        .stat:nth-child(2)
        .stat-icon {

            background: #d98b80;
        }


        .stat:nth-child(3)
        .stat-icon {

            background: #d5b7a0;
        }


        .stat small {

            display: block;

            color: #8a786e;

            font-size: 11px;

            margin-bottom: 4px;
        }


        .stat strong {

            font-size: 23px;

            color: #44352e;
        }



        /* ================================
           LOWER CONTENT
        ================================= */

        .content {

            display: grid;

            grid-template-columns: 1.6fr 1fr;

            gap: 18px;
        }


        .card {

            background: #eadfd4;

            border: 1px solid #cdbbae;

            border-radius: 17px;

            padding: 21px;

            box-shadow:
                0 8px 20px
                rgba(70, 50, 38, .07);
        }


        .card-head {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 16px;
        }


        .card-head h3 {

            font-size: 16px;

            color: #44352e;
        }


        .view {

            font-size: 12px;

            color: #c36d65;

            text-decoration: none;
        }



        /* ================================
           TABLE
        ================================= */

        table {

            width: 100%;

            border-collapse: collapse;
        }


        th {

            text-align: left;

            padding: 9px 5px;

            font-size: 10px;

            color: #8a786e;

            border-bottom:
                1px solid #d4c5b8;
        }


        td {

            padding: 13px 5px;

            font-size: 12px;

            color: #5d4c43;

            border-bottom:
                1px solid #ddd0c4;
        }


        tr:last-child td {

            border-bottom: none;
        }


        .status {

            padding: 5px 9px;

            border-radius: 20px;

            background: #e7c875;

            color: #60491f;

            font-size: 10px;
        }


        .returned {

            background: #d5b7a0;

            color: #5a4034;
        }



        /* ================================
           QUICK ACTIONS
        ================================= */

        .actions {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 11px;
        }


        .action {

            padding: 17px 10px;

            text-align: center;

            text-decoration: none;

            color: #55443b;

            background: #dfd1c5;

            border: 1px solid #cdbbae;

            border-radius: 13px;

            transition: .2s;
        }


        .action:hover {

            transform: translateY(-3px);

            background: #e5d7cb;
        }


        .action-icon {

            font-size: 23px;

            margin-bottom: 7px;
        }


        .action span {

            font-size: 11px;

            font-weight: 600;
        }



        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 950px) {

            .stats {

                grid-template-columns:
                    1fr 1fr;
            }

            .content {

                grid-template-columns: 1fr;
            }
        }


        @media (max-width: 700px) {

            .sidebar {

                width: 70px;

                padding: 20px 10px;
            }

            .brand {

                justify-content: center;
            }

            .brand h2,
            .menu-title,
            .menu a span,
            .logout span {

                display: none;
            }

            .menu a,
            .logout {

                justify-content: center;
            }

            .main {

                margin-left: 70px;

                padding: 20px;
            }

            .stats {

                grid-template-columns: 1fr;
            }

            .user div:not(.avatar) {

                display: none;
            }
        }

    </style>

</head>


<body>


    <!-- =====================================
         SIDEBAR
    ====================================== -->

    <aside class="sidebar">


        <div class="brand">

            <div class="brand-icon">
                📚
            </div>

            <h2>
                Mini <span>Library</span>
            </h2>

        </div>



        <div class="menu-title">
            Member Menu
        </div>



        <ul class="menu">


            <li>

                <a href="#" class="active">

                    <span class="menu-icon">
                        🏠
                    </span>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        📖
                    </span>

                    <span>
                        Books
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        🔄
                    </span>

                    <span>
                        My Loans
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        ⭐
                    </span>

                    <span>
                        My Reviews
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        👤
                    </span>

                    <span>
                        Profile
                    </span>

                </a>

            </li>


        </ul>



        <a href="#" class="logout">

            <span class="menu-icon">
                🚪
            </span>

            <span>
                Logout
            </span>

        </a>


    </aside>



    <!-- =====================================
         MAIN
    ====================================== -->

    <main class="main">


        <!-- TOP -->

        <div class="top">


            <div>

                <h1>
                    Dashboard
                </h1>

                <p>
                    Welcome to your Mini Library
                </p>

            </div>



            <div class="user">

                <div class="avatar">
                    M
                </div>

                <div>

                    <strong>
                        Member
                    </strong>

                    <span>
                        Library Member
                    </span>

                </div>

            </div>


        </div>



        <!-- WELCOME -->

        <div class="welcome">

            <h2>
                Good Morning, Member 👋
            </h2>

            <p>
                Welcome back to Mini Library.
                Explore books, keep track of your loans
                and share your thoughts through reviews.
            </p>

        </div>



        <!-- STATS -->

        <div class="stats">


            <div class="stat">

                <div class="stat-icon">
                    📖
                </div>

                <div>

                    <small>
                        Available Books
                    </small>

                    <strong>
                        12
                    </strong>

                </div>

            </div>



            <div class="stat">

                <div class="stat-icon">
                    🔄
                </div>

                <div>

                    <small>
                        My Active Loans
                    </small>

                    <strong>
                        3
                    </strong>

                </div>

            </div>



            <div class="stat">

                <div class="stat-icon">
                    ⭐
                </div>

                <div>

                    <small>
                        My Reviews
                    </small>

                    <strong>
                        5
                    </strong>

                </div>

            </div>


        </div>



        <!-- LOWER CONTENT -->

        <div class="content">


            <!-- RECENT LOANS -->

            <div class="card">


                <div class="card-head">

                    <h3>
                        Recent Loans
                    </h3>

                    <a href="#" class="view">
                        View All
                    </a>

                </div>



                <table>

                    <thead>

                        <tr>

                            <th>
                                Book
                            </th>

                            <th>
                                Due Date
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <tr>

                            <td>
                                Laravel Basics
                            </td>

                            <td>
                                25 Aug 2026
                            </td>

                            <td>

                                <span class="status">
                                    Active
                                </span>

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Clean Code
                            </td>

                            <td>
                                28 Aug 2026
                            </td>

                            <td>

                                <span class="status">
                                    Active
                                </span>

                            </td>

                        </tr>


                        <tr>

                            <td>
                                PHP & MySQL
                            </td>

                            <td>
                                18 Aug 2026
                            </td>

                            <td>

                                <span class="status returned">
                                    Returned
                                </span>

                            </td>

                        </tr>


                    </tbody>

                </table>


            </div>



            <!-- QUICK ACTIONS -->

            <div class="card">


                <div class="card-head">

                    <h3>
                        Quick Actions
                    </h3>

                </div>



                <div class="actions">


                    <a href="#" class="action">

                        <div class="action-icon">
                            📚
                        </div>

                        <span>
                            Browse Books
                        </span>

                    </a>


                    <a href="#" class="action">

                        <div class="action-icon">
                            🔄
                        </div>

                        <span>
                            My Loans
                        </span>

                    </a>


                    <a href="#" class="action">

                        <div class="action-icon">
                            ⭐
                        </div>

                        <span>
                            Write Review
                        </span>

                    </a>


                    <a href="#" class="action">

                        <div class="action-icon">
                            👤
                        </div>

                        <span>
                            My Profile
                        </span>

                    </a>


                </div>


            </div>


        </div>


    </main>


</body>

</html>
