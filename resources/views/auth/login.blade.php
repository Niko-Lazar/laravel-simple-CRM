<x-layout>
    <div class="container w-50">
        <div class="row">
            <h1 class="mb-4">Login</h1>
            <form method="post" action="{{ route('auth.login') }}">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control" />
                    <label class="form-label" for="email">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" name="rememberMe" type="checkbox" value="" id="rememberMe" />
                            <label class="form-check-label" for="rememberMe"> Remember me </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
            @if($errors->any())
                <ul class="mt-3">
                    @foreach($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-layout>
