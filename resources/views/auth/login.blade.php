<x-guest-layout>
    <svg class="background-pattern" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
        <defs>
            <pattern id="pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                <circle cx="20" cy="20" r="8" fill="none" stroke="#ffffff" stroke-width="1"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#pattern)" />
    </svg>

    <div class="container">
        <h1>ログイン</h1>
        <p class="login-description">FARMLINK にログインして始めましょう</p>

        <!-- セッションステータス -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- ログインフォーム -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- メールアドレス -->
            <div>
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="error-message" />
            </div>

            <!-- パスワード -->
            <div>
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    ログイン状態を保持する
                </label>
            </div>

            <!-- ボタンとリンク -->
            <button type="submit">ログイン</button>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password-link">パスワードをお忘れですか？</a>
            @endif
        </form>
    </div>
</x-guest-layout>
