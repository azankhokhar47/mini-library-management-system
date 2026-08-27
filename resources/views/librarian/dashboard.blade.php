<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Librarian Dashboard</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* =========================
           BODY
        ========================= */

        body {
            min-height: 100vh;
            background: #f5f9ff;
            color: #1e293b;
        }

        body::before {
            content: "";
            position: fixed;

            width: 420px;
            height: 420px;

            background: #3b82f6;

            filter: blur(170px);

            opacity: .08;

            top: -180px;
            left: -160px;

            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;

            width: 380px;
            height: 380px;

            background: #60a5fa;

            filter: blur(170px);

            opacity: .07;

            bottom: -180px;
            right: -150px;

            pointer-events: none;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;

            left: 0;
            top: 0;

            width: 235px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #dbe7f5;

            padding: 25px 16px;

            z-index: 10;

            box-shadow:
                5px 0 20px rgba(30, 64, 175, .05);
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

            background: #2563eb;

            color: white;

            font-size: 22px;

            box-shadow:
                0 7px 18px rgba(37, 99, 235, .20);
        }

        .brand h2 {
            font-size: 20px;

            color: #1e3a8a;
        }

        .brand h2 span {
            color: #2563eb;
        }


        /* =========================
           MENU
        ========================= */

        .menu-title {
            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1px;

            color: #7b8da5;

            padding: 0 12px;

            margin-bottom: 10px;
        }

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

            color: #52657d;

            font-size: 14px;

            transition: .2s;
        }

        .menu a:hover {
            background: #eff6ff;

            color: #2563eb;

            transform: translateX(2px);
        }

        .menu a.active {
            background: #2563eb;

            color: white;

            font-weight: 600;

            box-shadow:
                0 6px 15px
                rgba(37, 99, 235, .18);
        }

        .menu-icon {
            width: 22px;

            text-align: center;

            font-size: 16px;
        }


        /* =========================
           LOGOUT
        ========================= */

        .logout {
            position: absolute;

            left: 16px;
            right: 16px;

            bottom: 25px;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            color: #dc2626;

            text-decoration: none;

            border-radius: 10px;

            font-size: 14px;

            transition: .2s;
        }

        .logout:hover {
            background: #fef2f2;

            color: #b91c1c;
        }


        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 235px;

            min-height: 100vh;

            padding: 30px 35px;

            position: relative;

            z-index: 2;
        }


        /* =========================
           TOP
        ========================= */

        .top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }

        .top h1 {
            font-size: 28px;

            color: #1e3a8a;

            margin-bottom: 5px;
        }

        .top p {
            font-size: 13px;

            color: #71839a;
        }


        /* =========================
           USER
        ========================= */

        .user {
            display: flex;

            align-items: center;

            gap: 10px;

            background: #ffffff;

            border: 1px solid #dbe7f5;

            padding: 7px 12px;

            border-radius: 30px;

            box-shadow:
                0 5px 15px rgba(30, 64, 175, .05);
        }

        .avatar {
            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #2563eb;

            color: white;

            font-weight: bold;
        }

        .user strong {
            display: block;

            font-size: 13px;

            color: #1e3a8a;
        }

        .user span {
            display: block;

            font-size: 11px;

            color: #7b8da5;
        }


        /* =========================
           WELCOME
        ========================= */

        .welcome {
            background:
                linear-gradient(
                    135deg,
                    #dbeafe,
                    #eff6ff
                );

            border: 1px solid #bfdbfe;

            border-radius: 19px;

            padding: 27px 30px;

            margin-bottom: 22px;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 12px 30px
                rgba(37, 99, 235, .08);
        }

        .welcome::after {
            content: "📚";

            position: absolute;

            right: 40px;
            top: 12px;

            font-size: 85px;

            opacity: .13;
        }

        .welcome h2 {
            font-size: 23px;

            color: #1e3a8a;

            margin-bottom: 7px;
        }

        .welcome p {
            max-width: 560px;

            font-size: 13px;

            line-height: 1.6;

            color: #52657d;
        }


        /* =========================
           STATS
        ========================= */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 17px;

            margin-bottom: 22px;
        }

        .stat {
            background: #ffffff;

            border: 1px solid #dbe7f5;

            border-radius: 16px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 13px;

            box-shadow:
                0 8px 20px
                rgba(30, 64, 175, .06);

            transition: .2s;
        }

        .stat:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 25px
                rgba(30, 64, 175, .10);
        }

        .stat-icon {
            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: #dbeafe;

            color: #2563eb;

            font-size: 20px;
        }

        .stat:nth-child(2) .stat-icon {
            background: #e0edff;

            color: #1d4ed8;
        }

        .stat:nth-child(3) .stat-icon {
            background: #eaf3ff;

            color: #3b82f6;
        }

        .stat:nth-child(4) .stat-icon {
            background: #dbeafe;

            color: #2563eb;
        }

        .stat small {
            display: block;

            color: #7b8da5;

            font-size: 10px;

            margin-bottom: 4px;
        }

        .stat strong {
            font-size: 22px;

            color: #1e3a8a;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            display: grid;

            grid-template-columns: 1.6fr 1fr;

            gap: 18px;
        }

        .card {
            background: #ffffff;

            border: 1px solid #dbe7f5;

            border-radius: 17px;

            padding: 21px;

            box-shadow:
                0 8px 20px
                rgba(30, 64, 175, .06);
        }

        .card-head {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 16px;
        }

        .card-head h3 {
            font-size: 16px;

            color: #1e3a8a;
        }

        .view {
            font-size: 12px;

            color: #2563eb;

            text-decoration: none;

            font-weight: 600;
        }

        .view:hover {
            color: #1d4ed8;

            text-decoration: underline;
        }


        /* =========================
           TABLE
        ========================= */

        table {
            width: 100%;

            border-collapse: collapse;
        }

        th {
            text-align: left;

            padding: 9px 5px;

            font-size: 10px;

            color: #71839a;

            border-bottom:
                1px solid #dbe7f5;
        }

        td {
            padding: 13px 5px;

            font-size: 12px;

            color: #52657d;

            border-bottom:
                1px solid #edf2f7;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr {
            transition: .2s;
        }

        tr:hover td {
            background: #f8fbff;
        }


        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;

            padding: 5px 9px;

            border-radius: 20px;

            background: #dbeafe;

            color: #1d4ed8;

            font-size: 10px;

            font-weight: 600;
        }

        .pending {
            background: #e0edff;

            color: #2563eb;
        }


        /* =========================
           QUICK ACTIONS
        ========================= */

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

            color: #52657d;

            background: #f8fbff;

            border: 1px solid #dbe7f5;

            border-radius: 13px;

            transition: .2s;
        }

        .action:hover {
            transform: translateY(-3px);

            background: #eff6ff;

            border-color: #bfdbfe;

            color: #2563eb;
        }

        .action-icon {
            font-size: 23px;

            margin-bottom: 7px;
        }

        .action span {
            font-size: 11px;

            font-weight: 600;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1050px) {

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

            .top {
                align-items: flex-start;

                gap: 15px;
            }

            .user {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .welcome {
                padding: 22px;
            }

            .welcome::after {
                right: 15px;
            }
        }

    </style>

</head>


<body>


    <!-- =================================
         SIDEBAR
    ================================== -->

    <aside class="sidebar">


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-icon">
                📚
            </div>

            <h2>
                Mini <span>Library</span>
            </h2>

        </div>


        <!-- MENU -->

        <div class="menu-title">
            Librarian Menu
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
                        ✍️
                    </span>

                    <span>
                        Authors
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        🏷️
                    </span>

                    <span>
                        Categories
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        👥
                    </span>

                    <span>
                        Members
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        🔄
                    </span>

                    <span>
                        Loans
                    </span>

                </a>

            </li>


            <li>

                <a href="#">

                    <span class="menu-icon">
                        ⭐
                    </span>

                    <span>
                        Reviews
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


        <!-- LOGOUT -->

        <a href="#" class="logout">

            <span class="menu-icon">
                🚪
            </span>

            <span>
                Logout
            </span>

        </a>


    </aside>



    <!-- =================================
         MAIN
    ================================== -->

    <main class="main">


        <!-- TOP -->

        <div class="top">

            <div>

                <h1>
                    Librarian Dashboard
                </h1>

                <p>
                    Manage books, members and lending activity
                </p>

            </div>


            <div class="user">

                <div class="avatar">
                    L
                </div>

                <div>

                    <strong>
                        Librarian
                    </strong>

                    <span>
                        Library Staff
                    </span>

                </div>

            </div>

        </div>



        <!-- WELCOME -->

        <div class="welcome">

            <h2>
                Welcome, Librarian 👋
            </h2>

            <p>
                Manage the library collection, keep track of
                members and handle book lending from one place.
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
                        Total Books
                    </small>

                    <strong>
                        120
                    </strong>

                </div>

            </div>


            <div class="stat">

                <div class="stat-icon">
                    🔄
                </div>

                <div>

                    <small>
                        Active Loans
                    </small>

                    <strong>
                        18
                    </strong>

                </div>

            </div>


            <div class="stat">

                <div class="stat-icon">
                    👥
                </div>

                <div>

                    <small>
                        Members
                    </small>

                    <strong>
                        45
                    </strong>

                </div>

            </div>


            <div class="stat">

                <div class="stat-icon">
                    ⏰
                </div>

                <div>

                    <small>
                        Pending Returns
                    </small>

                    <strong>
                        7
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
                                Member
                            </th>

                            <th>
                                Book
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <tr>

                            <td>
                                Ali Khan
                            </td>

                            <td>
                                Laravel Basics
                            </td>

                            <td>

                                <span class="status">
                                    Active
                                </span>

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Sara Ahmed
                            </td>

                            <td>
                                Clean Code
                            </td>

                            <td>

                                <span class="status pending">
                                    Pending
                                </span>

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Hamza Ali
                            </td>

                            <td>
                                PHP & MySQL
                            </td>

                            <td>

                                <span class="status">
                                    Active
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
                            📖
                        </div>

                        <span>
                            Manage Books
                        </span>

                    </a>


                    <a href="#" class="action">

                        <div class="action-icon">
                            👥
                        </div>

                        <span>
                            Members
                        </span>

                    </a>


                    <a href="#" class="action">

                        <div class="action-icon">
                            🔄
                        </div>

                        <span>
                            Manage Loans
                        </span>

                    </a>


                    <a href="#" class="action">

                        <div class="action-icon">
                            🏷️
                        </div>

                        <span>
                            Categories
                        </span>

                    </a>


                </div>

            </div>


        </div>


    </main>


</body>

</html>
