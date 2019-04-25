<!-- This is the login-register modal -->
<div id="verify-phone" uk-modal>
    <div class="uk-modal-dialog uk-modal-body" style="background: none">
        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
            <ul id="login-register-switch" class="uk-tab uk-flex-center" uk-grid uk-switcher="animation: uk-animation-fade">
                <li><a href="#" class="uk-text-large">Verify Phone</a></li>
                <li><a href="#" class="uk-text-large">Edit phone</a></li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <li>
                    <h3 class="uk-card-title uk-text-center">Verify phone to continue!</h3>

                    <form action="{{ route('verify.phone') }}" method="post">
                        @csrf
                        <input type="hidden" name="modal" value="verify-phone">

                        @if ($errors->has('email'))
                            <div class="uk-text-danger">{{ $errors->first('email') }}</div>
                        @endif

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: phone"></span>
                                <input class="uk-input {{ $errors->has('code') ? ' uk-form-danger' : '' }}" type="text" name="code" value="{{ old('code') }}" placeholder="Verification code" required autofocus>
                            </div>
                        </div>
                        <div class="uk-margin uk-text-right@s uk-text-small">
                            <a href="{{ route('verify.phone.resend') }}" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">Resend verification code.</a>
                        </div>
                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit">Verify</button>
                        </div>
                        <div class="uk-margin uk-text-center uk-text-small">
                            <a href="#" uk-switcher-item="1">Used the wrong number? Edit it</a>
                        </div>
                    </form>
                    <form id="resend-form" action="{{ route('verify.phone.resend') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li>
                    <h4 class="uk-card-title uk-text-center">Edit phone number!</h4>
                    <form action="{{ route('verify.edit.phone') }}" method="post">
                        @csrf
                        <input type="hidden" name="modal" value="verify-phone">
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: phone"></span>
                                <input class="uk-input {{ $errors->has('phone') ? ' uk-form-danger' : '' }}" type="text" name="phone" value="{{ auth()->user()->phone }}" placeholder="Your phone number" required>
                            </div>
                            @if ($errors->has('phone'))
                                <div class="uk-text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit">Edit number</button>
                        </div>
                        <div class="uk-text-small uk-text-center">
                            Already have a verification code? <a href="#" uk-switcher-item="0">Verify number</a>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
