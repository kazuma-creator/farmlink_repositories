<x-guest-layout>
    <div class="login-container mx-auto items-center">
        <h2 class="login-title">ログイン</h2>
        <p class="login-description">FARMLINK にログインして始めましょう</p>

        <!-- セッションステータス -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('メールアドレス')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="error-message" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('パスワード')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>

            <!-- Remember Me -->
            <div class="form-group remember-me">
                <label for="remember_me" class="checkbox-label">
                    <input id="remember_me" type="checkbox" name="remember" class="checkbox-custom">
                    {{ __('ログイン状態を保持する') }}
                </label>
            </div>

            <!-- Buttons -->
            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password-link">パスワードをお忘れですか？</a>
                @endif

                <x-primary-button class="primary-button">ログイン</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
