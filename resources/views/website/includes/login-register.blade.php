<!-- This is the login-register modal -->
<div id="login-register" uk-modal>
    <div class="uk-modal-dialog uk-modal-body" style="background: none">
        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
            <ul id="login-register-switch" class="uk-tab uk-flex-center" uk-grid uk-switcher="animation: uk-animation-fade">
                <li><a href="#" class="uk-text-large">Log In</a></li>
                <li><a href="#" class="uk-text-large">Sign Up</a></li>
                <li class="uk-hidden">Forgot Password?</li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <li>
                    <h3 class="uk-card-title uk-text-center">Welcome back!</h3>

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <input type="hidden" name="modal" value="login-register">

                        @if ($errors->has('identity'))
                            <div class="uk-text-danger">{{ $errors->first('identity') }}</div>
                        @endif

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input {{ $errors->has('identity') ? ' uk-form-danger' : '' }}" type="text" name="identity" value="@if(!is_null(old('phone'))) {{ old('phone') }} @elseif(!is_null(old('email'))) {{ old('email') }} @endif" placeholder="Phone or E-mail" required autofocus>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input class="uk-input {{ $errors->has('identity') ? ' uk-form-danger' : '' }}" type="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="uk-margin uk-text-right@s uk-text-center uk-text-small">
                            <a href="#" uk-switcher-item="2">Forgot Password?</a>
                        </div>
                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit">Login</button>
                        </div>
                        <div class="uk-text-small uk-text-center">
                            Not registered? <a href="#" uk-switcher-item="1">Create an account</a>
                        </div>
                    </form>
                </li>
                <li>
                    <h4 class="uk-card-title uk-text-center">Sign up today. It's free!</h4>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <input type="hidden" name="modal" value="login-register">
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input {{ $errors->has('name') ? ' uk-form-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" placeholder="First and last name" required>
                            </div>
                            @if ($errors->has('name'))
                                <div class="uk-text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input class="uk-input {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="Email address" required>
                            </div>
                            @if ($errors->has('email'))
                                <div class="uk-text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: phone"></span>
                                <input class="uk-input {{ $errors->has('phone') ? ' uk-form-danger' : '' }}" type="string" name="phone" value="{{ old('phone') }}" placeholder="Phone number" required>
                            </div>
                            @if ($errors->has('phone'))
                                <div class="uk-text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input class="uk-input {{ $errors->has('password') ? ' uk-form-danger' : '' }}" type="password" name="password" placeholder="Set a password" required>
                            </div>
                            @if ($errors->has('password'))
                                <div class="uk-text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input class="uk-input {{ $errors->has('password') ? ' uk-form-danger' : '' }}" type="password" name="password_confirmation" placeholder="Confirm password" required>
                            </div>
                            @if ($errors->has('password'))
                                <div class="uk-text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                            <label><input class="uk-checkbox" type="checkbox" name="toc" required> I agree the Terms and Conditions.</label>
                        </div>
                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit">Create an account</button>
                        </div>
                        <div class="uk-text-small uk-text-center">
                            Already have an account? <a href="#" uk-switcher-item="0">Log in</a>
                        </div>
                    </form>
                </li>
                <li>
                    <h3 class="uk-card-title uk-text-center">Forgot your password?</h3>
                    <p class="uk-text-center uk-width-medium@s uk-margin-auto">Enter your phone number and we will send you a code to reset your password.</p>
                    <form action="{{ route('password.phone') }}" method="post">
                        @csrf
                        <input type="hidden" name="modal" value="login-register">
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: phone"></span>
                                <input class="uk-input {{ $errors->has('phone') ? ' uk-form-danger' : '' }}" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone number" required>
                            </div>
                            @if ($errors->has('phone'))
                                <div class="uk-text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit">Send Code</button>
                        </div>
                        <div class="uk-text-small uk-text-center">
                            <a href="#" uk-switcher-item="0">Back to login</a>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
