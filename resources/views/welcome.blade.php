<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Library | Login</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* =====================================
           BODY
        ===================================== */

        body {
            min-height: 100vh;

            background: #f4f8fc;

            color: #1e293b;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        /* Soft Blue Glow */

        body::before {
            content: "";

            position: fixed;

            width: 450px;
            height: 450px;

            background: #3b82f6;

            filter: blur(170px);

            opacity: .10;

            top: -180px;
            left: -150px;

            pointer-events: none;
        }

        /* Light Blue Glow */

        body::after {
            content: "";

            position: fixed;

            width: 400px;
            height: 400px;

            background: #60a5fa;

            filter: blur(170px);

            opacity: .09;

            bottom: -180px;
            right: -120px;

            pointer-events: none;
        }

        /* =====================================
           MAIN BOX
        ===================================== */

        .wrapper {
            width: 1000px;

            min-height: 600px;

            display: grid;

            grid-template-columns: 1fr 0.9fr;

            background: #ffffff;

            border: 1px solid #dbe5f0;

            border-radius: 26px;

            overflow: hidden;

            box-shadow:
                0 25px 65px rgba(30, 64, 175, .14);

            position: relative;

            z-index: 2;
        }

        /* =====================================
           LEFT SIDE
        ===================================== */

        .left {
            position: relative;

            min-height: 600px;

            background:
                linear-gradient(
                    145deg,
                    #2563eb,
                    #1e40af
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 50px;

            overflow: hidden;
        }

        /* Decorative Blue Circle */

        .left::before {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: #93c5fd;

            opacity: .15;

            top: -150px;
            left: -120px;
        }

        /* Decorative White Circle */

        .left::after {
            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            border-radius: 50%;

            background: #ffffff;

            opacity: .08;

            bottom: -130px;
            right: -100px;
        }

        /* =====================================
           LIBRARY CONTENT
        ===================================== */

        .library-content {
            position: relative;

            z-index: 2;

            text-align: center;

            max-width: 390px;
        }

        /* Library Icon */

        .library-icon {
            width: 90px;
            height: 90px;

            margin: 0 auto 25px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 24px;

            background: #ffffff;

            color: #2563eb;

            font-size: 45px;

            box-shadow:
                0 15px 35px rgba(15, 23, 42, .18);
        }

        /* Mini Library Heading */

        .library-content h1 {
            font-size: 46px;

            font-weight: 700;

            letter-spacing: -1.5px;

            color: #ffffff;

            margin-bottom: 15px;
        }

        .library-content h1 span {
            color: #bfdbfe;
        }

        /* Description */

        .library-content p {
            color: #dbeafe;

            font-size: 15px;

            line-height: 1.7;

            margin-bottom: 25px;
        }

        /* Small Line */

        .library-line {
            width: 75px;
            height: 4px;

            margin: 0 auto 28px;

            border-radius: 20px;

            background:
                linear-gradient(
                    90deg,
                    #ffffff,
                    #bfdbfe
                );
        }

        /* Small Information */

        .library-note {
            display: inline-block;

            padding: 10px 18px;

            border-radius: 30px;

            background: rgba(255, 255, 255, .12);

            border: 1px solid rgba(255, 255, 255, .20);

            color: #eff6ff;

            font-size: 12px;

            letter-spacing: .3px;
        }

        /* =====================================
           RIGHT SIDE
        ===================================== */

        .right {
            padding: 65px 55px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            background: #ffffff;
        }

        /* Login Heading */

        .login-title {
            font-size: 31px;

            color: #172554;

            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #64748b;

            font-size: 14px;

            margin-bottom: 35px;
        }

        /* =====================================
           INPUTS
        ===================================== */

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;

            margin-bottom: 9px;

            font-size: 13px;

            color: #334155;
        }

        .input-group input {
            width: 100%;

            padding: 15px 16px;

            background: #f8fafc;

            border: 1px solid #dbe3ec;

            border-radius: 12px;

            color: #1e293b;

            outline: none;

            font-size: 14px;

            transition: .25s;
        }

        .input-group input::placeholder {
            color: #94a3b8;
        }

        .input-group input:focus {
            border-color: #3b82f6;

            background: #ffffff;

            box-shadow:
                0 0 0 3px
                rgba(59, 130, 246, .12);
        }

        /* =====================================
           OPTIONS
        ===================================== */

        .options {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin: 5px 0 25px;

            font-size: 13px;
        }

        .remember {
            display: flex;

            align-items: center;

            gap: 8px;

            color: #64748b;
        }

        .remember input {
            accent-color: #2563eb;
        }

        .forgot {
            color: #2563eb;

            text-decoration: none;

            transition: .2s;
        }

        .forgot:hover {
            color: #1d4ed8;

            text-decoration: underline;
        }

        /* =====================================
           LOGIN BUTTON
        ===================================== */

        .login-btn {
            width: 100%;

            padding: 15px;

            border: none;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #3b82f6,
                    #2563eb
                );

            color: #ffffff;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 10px 25px
                rgba(37, 99, 235, .22);

            transition: .25s;
        }

        .login-btn:hover {
            transform: translateY(-2px);

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            box-shadow:
                0 14px 30px
                rgba(37, 99, 235, .30);
        }

        /* =====================================
           LOGIN ERROR
        ===================================== */

        .login-error {
            margin-top: 18px;

            padding: 12px 14px;

            background: #eff6ff;

            border: 1px solid #bfdbfe;

            border-radius: 10px;

            color: #1d4ed8;

            font-size: 13px;
        }

        /* =====================================
           FOOTER
        ===================================== */

        .footer-text {
            text-align: center;

            margin-top: 25px;

            color: #94a3b8;

            font-size: 12px;
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 850px) {

            .wrapper {
                width: 92%;

                grid-template-columns: 1fr;
            }

            .left {
                min-height: 360px;

                padding: 40px 25px;
            }

            .library-content h1 {
                font-size: 38px;
            }

            .right {
                padding: 45px 35px;
            }
        }

    </style>

</head>


<body>


    <div class="wrapper">


        <!-- =================================
             LEFT: MINI LIBRARY
        ================================== -->

        <div class="left">


            <div class="library-content">


                <!-- Library Icon -->

                <div class="library-icon">
                    📚
                </div>


                <!-- Heading -->

                <h1>
                    Mini <span>Library</span>
                </h1>


                <!-- Description -->

                <p>
                    A simple and organized place to
                    discover books, manage lending,
                    and keep your library experience
                    smooth and enjoyable.
                </p>


                <!-- Decorative Line -->

                <div class="library-line"></div>


                <!-- Small Note -->

                <div class="library-note">
                    📖 Read • Learn • Discover
                </div>


            </div>


        </div>


        <!-- =================================
             RIGHT: LOGIN
        ================================== -->

        <div class="right">


            <h2 class="login-title">
                Welcome Back
            </h2>


            <p class="login-subtitle">
                Sign in to continue to Mini Library
            </p>


            <!-- LOGIN FORM -->

            <form
                action="{{ route('login.submit') }}"
                method="POST"
            >

                @csrf


                <!-- EMAIL -->

                <div class="input-group">

                    <label>
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                    >

                </div>


                <!-- PASSWORD -->

                <div class="input-group">

                    <label>
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <!-- OPTIONS -->

                <div class="options">


                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        Remember me

                    </label>


                    <a
                        href="#"
                        class="forgot"
                    >
                        Forgot password?
                    </a>


                </div>


                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="login-btn"
                >
                    Sign In
                </button>


            </form>


            <!-- Login Error -->

            @if ($errors->any())

                <div class="login-error">

                    {{ $errors->first() }}

                </div>

            @endif


            <!-- Footer -->

            <p class="footer-text">
                © 2026 Mini Library
            </p>


        </div>


    </div>


</body>

</html>
