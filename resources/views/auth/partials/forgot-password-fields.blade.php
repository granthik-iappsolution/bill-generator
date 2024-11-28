@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">

    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
      <div class="w-100 d-flex justify-content-center">
        <img src="{{asset('assets/img/illustrations/girl-unlock-password-'.$configData['style'].'.png')}}" class="img-fluid" alt="Login image" width="600" data-app-dark-img="illustrations/girl-unlock-password-dark.png" data-app-light-img="illustrations/girl-unlock-password-light.png">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Forgot Password -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-5 d-flex justify-content-center align-items-center">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
              <img src="{{asset('img.png')}}" width="70" height="60"  alt="">
              <span class="nav-link" style="font-family: 'Poppins', sans-serif; color:black; font-size: 15px; letter-spacing: -1px;">CODIKSH</span>

          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Forgot Password? 🔒</h4>
        <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>

        @include('_partials.alerts')

        <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div>
                <x-label for="email" :value="__('Email')" class="form-label" />
                <x-input id="email"  class="form-control" type="email" placeholder="Enter your email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="btn btn-primary d-grid w-100">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
        <div class="text-center">
          <a href="{{url('login')}}" class="d-flex align-items-center justify-content-center">
            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
            Back to login
          </a>
        </div>
      </div>
    </div>
    <!-- /Forgot Password -->
  </div>
</div>
@endsection
