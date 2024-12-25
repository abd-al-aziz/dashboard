<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <style>
        .auth-section {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        }
        
        /* Update login box shadow for better contrast */
        .login-box {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        /* Update register box background for better harmony */
        .register-box {
            background: rgba(142, 68, 173, 0.9);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .auth-section {
            padding: 80px 0;
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .forms-wrapper {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .form-box {
            flex: 1;
            min-width: 350px;
            max-width: 450px;
            padding: 40px;
            border-radius: 12px;
            transition: transform 0.5s, box-shadow 0.5s;
            animation: fadeIn 1s ease-out;
        }

        .form-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .login-box { 
            flex: 1; 
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            animation-delay: 0.2s;
            padding: 20px;
            max-height: 350px;
        }

        .register-box { 
            background: #8e44ad;
            color: white;
            animation-delay: 0.4s;
        }

        .form-title {
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .register-box .form-title,
        .register-box .privacy-text {
            color: white;
        }

        .input-field {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 25px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s;
        }

        .input-field:focus {
            border-color: #ff5722;
            transform: scale(1.02);
        }

        .remember-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .remember-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .forgot-link {
            color: #ff5722;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #ff5722;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: #f4511e;
            transform: translateY(-2px);
        }

        .submit-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .submit-btn:active::after {
            width: 300px;
            height: 300px;
        }

        .privacy-text {
            font-size: 14px;
            margin: 20px 0;
            line-height: 1.5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .forms-wrapper {
                flex-direction: column;
            }
            
            .form-box {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <section class="auth-section">
        <div class="container">
            <div class="forms-wrapper">
                <div class="form-box login-box">
                    <h2 class="form-title">Log In Your Account</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="email" 
                               class="input-field" 
                               name="email" 
                               placeholder="Username or email address"
                               required>
                        
                        <input type="password" 
                               class="input-field" 
                               name="password"
                               placeholder="Password"
                               required>
                        
                        <div class="remember-row">
                            <div class="remember-check">
                                <input id="remember_me" 
                                       type="checkbox" 
                                       name="remember">
                                <label for="remember_me">Remember me</label>
                            </div>
                            <a href="#" class="forgot-link">Forgot password?</a>
                        </div>
                        
                        <button type="submit" class="submit-btn">Log in</button>
                    </form>
                </div>

                <div class="form-box register-box">
                    <h2 class="form-title">Create Your Account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="text" 
                               class="input-field" 
                               name="name"
                               placeholder="Username"
                               required>
                        
                        <input type="email" 
                               class="input-field" 
                               name="email"
                               placeholder="Email address"
                               required>
                        
                        <input type="password" 
                               class="input-field" 
                               name="password"
                               placeholder="Password"
                               required>
                        
                        <input type="password" 
                               class="input-field" 
                               name="password_confirmation"
                               placeholder="Confirm Password"
                               required>
                        
                        <p class="privacy-text">
                            Your personal data will be used to support your experience throughout this website, 
                            to manage access to your account, and for other purposes described in our privacy policy.
                        </p>
                        
                        <button type="submit" class="submit-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>