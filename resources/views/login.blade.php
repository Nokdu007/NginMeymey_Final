<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-page">
    <main class="auth-shell">
        <section class="auth-card" aria-label="Login form">
            <aside class="auth-aside">
                <a class="brand" href="{{ url('/') }}">
                    <span class="brand-mark"><i class="bi bi-mortarboard-fill"></i></span>
                    Student Hub
                </a>
                <div class="aside-content">
                    <h2>Welcome back to campus.</h2>
                    <p>Manage student records, departments, and academic details from one place.</p>
                </div>
            </aside>

            <div class="auth-main">
                <header class="auth-heading">
                    <div class="eyebrow">Secure access</div>
                    <h1>Sign in to your account</h1>
                    <p>Enter your details to continue.</p>
                </header>

                @if (session('success'))
                    <div class="auth-alert">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field-group">
                        <label for="email">Email address</label>
                        <div class="input-wrap">
                            <i class="bi bi-envelope field-icon"></i>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="auth-input @error('email') is-invalid @enderror"
                                   placeholder="name@example.com" required autofocus>
                        </div>
                        @error('email') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <i class="bi bi-lock field-icon"></i>
                            <input type="password" id="password" name="password"
                                   class="auth-input @error('password') is-invalid @enderror"
                                   placeholder="Enter your password" required>
                            <button class="password-toggle" type="button" data-password-toggle="password"
                                    aria-label="Show password" title="Show password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password') <div class="field-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="auth-options">
                        <label class="remember" for="remember">
                            <input type="checkbox" name="remember" id="remember">
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="auth-submit">
                        Sign in <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                </form>

                <p class="auth-footer">
                    Don't have an account?
                    <a href="{{ route('register') }}">Create account</a>
                </p>
            </div>
        </section>
    </main>

    <script>
        document.querySelectorAll('[data-password-toggle]').forEach(function (button) {
            button.addEventListener('click', function () {
                var input = document.getElementById(button.dataset.passwordToggle);
                var icon = button.querySelector('i');
                var show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
                button.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
            });
        });
    </script>
</body>
</html>
