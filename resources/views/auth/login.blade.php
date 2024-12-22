<section class="auth-section">
        <div class="container">
            <div class="forms-wrapper">
                <!-- Login Form -->
                <div class="form-box login-box">
                    <h2 class="form-title">Log In Your Account</h2>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="email" 
                               class="input-field" 
                               name="email" 
                               placeholder="Username or email address"
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        
                        <input type="password" 
                               class="input-field" 
                               name="password"
                               placeholder="Password"
                               required 
                               autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        
                        <div class="remember-row">
                            <div class="remember-check">
                                <input id="remember_me" 
                                       type="checkbox" 
                                       name="remember">
                                <label for="remember_me">{{ __('Remember me') }}</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-link">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                        
                        <button type="submit" class="submit-btn">{{ __('Log in') }}</button>
                    </form>
                </div>

                <!-- Register Form -->
                <div class="form-box register-box">
                    <h2 class="form-title">Create Your Account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="text" 
                               class="input-field" 
                               name="name"
                               placeholder="Complete Name"
                               value="{{ old('name') }}" 
                               required 
                               autofocus 
                               autocomplete="name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        
                        <input type="email" 
                               class="input-field" 
                               name="email"
                               placeholder="Username or email address"
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        
                        <input type="password" 
                               class="input-field" 
                               name="password"
                               placeholder="Password"
                               required 
                               autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        
                        <input type="password" 
                               class="input-field" 
                               name="password_confirmation"
                               placeholder="Confirm Password"
                               required 
                               autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        
                        <p class="privacy-text">
                            Your personal data will be used to support your experience throughout this website, 
                            to manage access to your account, and for other purposes described in our privacy policy.
                        </p>
                        
                        <button type="submit" class="submit-btn">{{ __('Register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
        .auth-section {
            padding: 80px 0;
            background-color: #f5f5f5;
            min-height: 100vh;
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
        }

        .form-box {
            flex: 1;
            min-width: 300px;
            padding: 40px;
            border-radius: 12px;
        }

        .login-box {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .register-box {
            background: #8e44ad;
            color: white;
        }

        .form-title {
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .input-field {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 25px;
            font-size: 14px;
            outline: none;
        }

        .input-field:focus {
            border-color: #ff5722;
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
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #f4511e;
        }

        .privacy-text {
            font-size: 14px;
            margin: 20px 0;
            line-height: 1.5;
            opacity: 0.9;
        }

        /* Error messages styling */
        .mt-2 {
            margin-top: 0.5rem;
            color: #ef4444;
            font-size: 0.875rem;
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