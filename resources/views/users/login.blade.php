<x-layout>
    <div class="container">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
            <p class="mb-4">Log into your account to post jobs</p>
        </header>

        <div class="row justify-content-md-center">
            <div class="col col-lg-6 col-md-8">
                <form method="POST" action="{{route('users.authenticate')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required  placeholder="Your best email address" />
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

                        @error('email')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" required placeholder="Your best password"/>

                        @error('password')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        Don't have an account? <a href="{{route('users.register')}}" class="text-laravel">Register</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
