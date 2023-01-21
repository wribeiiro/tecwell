<x-layout>
    <div class="container">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
            <p class="mb-4">Create an account to post job</p>
        </header>

        <div class="row justify-content-md-center">
            <div class="col col-lg-6 col-md-8">
                <form method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label"> Name </label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your best name" />

                        @error('name')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your best email address" />

                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Your best password"/>

                        @error('password')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Your comfirm best password"/>

                        @error('password_confirmation')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                    Already have an account? <a href="{{route('users.login')}}" class="text-laravel">Login</a>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
