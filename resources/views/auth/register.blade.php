<x-layout>
    <div class="container w-50">
        <div class="row">
            <form method="post" action="{{ route('auth.register') }}">
                @csrf

                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="email" class="form-control" />
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="key">Secret key</label>
                    <input type="password" name="key" id="key" class="form-control" />
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Register</button>
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
