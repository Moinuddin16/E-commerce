<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.partials.head")
    <title>Admin | Log In </title>
    <style>
        body {
            background-image: url("public/assets/images/login-bg.jpg");
            background-color: #cccccc;
        }
        .invalid-feedback{
            display: block; !important;
        }

    </style>
</head>



<body>
    <!-- container -->
    <div class="container d-flex flex-column ">
        <div class="row align-items-center justify-content-center g-0
        min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4 text-center">
                        
                            <h3 class="mb-6">Registration</h3>
                        </div>
                        <!-- Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="username" id="username" class="form-control" name="username"
                                    placeholder="Insert an unique Username" required="true" value="{{old('username')}}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Insert your password" required="true">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" id="password" class="form-control" name="password_confirmation"
                                    placeholder="Please confirm your password" required="true">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="justify-content-between text-right align-items-centermb-4 mb-2">
                                <a href="{{route('login')}}">Login</a>
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Registration</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    @include("admin.partials.scripts")
</body>

</html>
