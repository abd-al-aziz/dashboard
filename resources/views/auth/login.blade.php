<style>
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
    }

    .auth-section {
        padding: 80px 0;
        background-color: white;
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
        padding: 50px;
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
        background: #f0f0f0;
        border-radius: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        animation-delay: 0.2s;
        padding: 20px;
        max-height: 350px;
        margin-bottom: 20px;
    }

    .register-box { 
        background: #fa441d;
        color: white;
        animation-delay: 0.4s;
    }

    .form-title {
        font-size: 24px;
        margin-bottom: 30px;
        margin-left: 30px;
        font-weight: bold;
    }

    .register-box .form-title,
    .register-box .privacy-text {
        color: white;
    }

    .input-field {
        height: 60px;
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
        color: #ffc107;
        text-decoration: none;
        transition: color 0.3s;
    }

    .forgot-link:hover {
        text-decoration: underline;
    }

    .submit-btn {
        width: 100%;
        height: 50px;
        padding: 15px;
        background: #ffc107 !important;
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
        background: #ffc107 !important;
        /* transform: translateY(-2px); */
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

<body>
@extends('custumer.master')
@section('Contact')
<section class="banner" style="background-color: #fff8e5; background-image:url(assets/img/banner.png)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Login</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                      </li>
                        <li class="breadcrumb-item active" aria-current="page">login</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <div class="banner-img-1">
                        <svg width="260" height="260" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="assets/img/cat-1.jpg" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <svg width="320" height="320" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="assets/img/cat-0.jpg" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-2">
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-4">
</section>
    <section class="auth-section">
        <div class="container">
            <div class="forms-wrapper">
                <div class="form-box login-box">
                    <h2 class="form-title">Log In Your Account</h2>
                    <form method="POST" action="{{ route('login') }}" onsubmit="return validateLoginForm()">
                        @csrf
                        <input type="email" 
                               class="input-field" 
                               name="email" 
                               id="loginEmail"
                               placeholder="Username or email address"
                               required>
                        
                        <input type="password" 
                               class="input-field" 
                               name="password"
                               id="loginPassword"
                               placeholder="Password"
                               required>
                        
                        <div class="remember-row">
                            <div class="remember-check">
                                <input id="remember_me" 
                                       type="checkbox" 
                                       name="remember" 
                                       value="1">
                                <label for="remember_me">Remember Me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                        </div>
                        <button type="submit" class="submit-btn">Login</button>
                    </form>
                </div>

                <div class="form-box register-box">
                    <h2 class="form-title">Create Account</h2>
                    <form method="POST" action="{{ route('register') }}" onsubmit="return validateRegisterForm()">
                        @csrf
                        <input type="text" 
                               class="input-field" 
                               name="name" 
                               placeholder="User Name" 
                               required>

                        <input type="email" 
                               class="input-field" 
                               name="email" 
                               placeholder="Email Address" 
                               required>

                        <input type="password" 
                               class="input-field" 
                               name="password" 
                               id="registerPassword"
                               placeholder="Password"
                               required>

                        <input type="password" 
                               class="input-field" 
                               name="password_confirmation" 
                               id="confirmPassword"
                               placeholder="Confirm Password"
                               required>
                        
                        <p class="privacy-text">By signing up, you agree to our <a href="#">Terms & Conditions</a></p>
                        <button type="submit" class="submit-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<script>
    function validateLoginForm() {
        let email = document.getElementById('loginEmail').value;
        let password = document.getElementById('loginPassword').value;
        if (!email || !password) {
            alert('Please fill in all fields');
            return false;
        }
        return true;
    }

    function validateRegisterForm() {
        let password = document.getElementById('registerPassword').value;
        let confirmPassword = document.getElementById('confirmPassword').value;

        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return false;
        }
        return true;
    }
</script>
@endsection
</body>
