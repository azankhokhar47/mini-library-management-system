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

            background: #ddd0c3;

            color: #44352e;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;
        }


        body::before {

            content: "";

            position: fixed;

            width: 450px;

            height: 450px;

            background: #e1b951;

            filter: blur(170px);

            opacity: .13;

            top: -180px;

            left: -150px;
        }


        body::after {

            content: "";

            position: fixed;

            width: 400px;

            height: 400px;

            background: #cf776e;

            filter: blur(170px);

            opacity: .11;

            bottom: -180px;

            right: -120px;
        }



        /* =====================================
           MAIN BOX
        ===================================== */

        .wrapper {

            width: 1000px;

            min-height: 600px;

            display: grid;

            grid-template-columns: 1fr 0.9fr;

            background: #eadfd4;

            border: 1px solid #cdbbae;

            border-radius: 26px;

            overflow: hidden;

            box-shadow:
                0 25px 65px rgba(65, 47, 37, .24);

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
                    #a19a93,
                    #d3c1b2
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 50px;

            overflow: hidden;
        }


        .left::before {

            content: "";

            position: absolute;

            width: 350px;

            height: 350px;

            border-radius: 50%;

            background: #5f0f66;

            opacity: .15;

            top: -150px;

            left: -120px;
        }


        .left::after {

            content: "";

            position: absolute;

            width: 280px;

            height: 280px;

            border-radius: 50%;

            background: #971b0d;

            opacity: .12;

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


        .library-icon {

            width: 90px;

            height: 90px;

            margin: 0 auto 25px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 24px;

            background: #edc75f;

            font-size: 45px;

            box-shadow:
                0 15px 35px rgba(75, 54, 35, .20);
        }


        .library-content h1 {

            font-size: 46px;

            font-weight: 700;

            letter-spacing: -1.5px;

            color: #3f3028;

            margin-bottom: 15px;
        }


        .library-content h1 span {

            color: #bd7167;
        }


        .library-content p {

            color: #66554c;

            font-size: 15px;

            line-height: 1.7;

            margin-bottom: 25px;
        }


        .library-line {

            width: 75px;

            height: 4px;

            margin: 0 auto 28px;

            border-radius: 20px;

            background:
                linear-gradient(
                    90deg,
                    #e5bd59,
                    #d47b72
                );
        }


        .library-note {

            display: inline-block;

            padding: 10px 18px;

            border-radius: 30px;

            background: rgba(255, 248, 238, .45);

            border: 1px solid rgba(120, 91, 70, .12);

            color: #715e54;

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

            background:
                linear-gradient(
                    145deg,
                    #eadfd4,
                    #e3d6ca
                );
        }


        .login-title {

            font-size: 31px;

            color: #44352e;

            margin-bottom: 8px;
        }


        .login-subtitle {

            color: #88766d;

            font-size: 14px;

            margin-bottom: 35px;
        }



        /* =====================================
           ERROR MESSAGE
        ===================================== */

        .error-box {

            background: #f2d2cd;

            border: 1px solid #dda69e;

            color: #914f49;

            padding: 11px 13px;

            border-radius: 10px;

            font-size: 13px;

            margin-bottom: 20px;
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

            color: #5d4d45;
        }


        .input-group input {

            width: 100%;

            padding: 15px 16px;

            background: #dcd0c4;

            border: 1px solid #c5b3a5;

            border-radius: 12px;

            color: #44352e;

            outline: none;

            font-size: 14px;

            transition: .25s;
        }


        .input-group input::placeholder {

            color: #95837a;
        }


        .input-group input:focus {

            border-color: #d0a946;

            background: #e7dbd0;

            box-shadow:
                0 0 0 3px
                rgba(208, 169, 70, .13);
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

            color: #817067;
        }


        .remember input {

            accent-color: #dcb452;
        }


        .forgot {

            color: #c36d65;

            text-decoration: none;

            transition: .2s;
        }


        .forgot:hover {

            color: #a9544d;
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
                    #e9c45f,
                    #d7aa45
                );

            color: #49351e;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 10px 25px
                rgba(190, 145, 55, .22);

            transition: .25s;
        }


        .login-btn:hover {

            transform: translateY(-2px);

            box-shadow:
                0 14px 30px
                rgba(190, 145, 55, .30);
        }



        /* =====================================
           FOOTER
        ===================================== */

        .footer-text {

            text-align: center;

            margin-top: 25px;

            color: #96847a;

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


                <div class="library-icon">

                    📚

                </div>


                <h1>

                    Mini <span>Library</span>

                </h1>


                <p>

                    A simple and organized place to
                    discover books, manage lending,
                    and keep your library experience
                    smooth and enjoyable.

                </p>


                <div class="library-line"></div>


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



            <!-- LOGIN ERROR -->

            @if ($errors->any())

                <div class="error-box">

                    {{ $errors->first() }}

                </div>

            @endif



            <!-- SUCCESS MESSAGE -->

            @if (session('success'))

                <div class="error-box">

                    {{ session('success') }}

                </div>

            @endif



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



            <p class="footer-text">

                © 2026 Mini Library

            </p>


        </div>


    </div>


</body>

</html>
