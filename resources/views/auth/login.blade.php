@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    {{-- begin::Content --}}
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        {{-- begin::Wrapper --}}
        <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
            {{-- begin::Form --}}
            <form class="form w-100" action="" method="POST">
                @csrf
                {{-- begin::Heading --}}
                <div class="text-center mb-10">
                    {{-- begin::Title --}}
                    <h1 class="text-dark mb-3">@yield('title')</h1>
                    {{-- end::Title --}}
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- begin::Heading --}}
                {{-- begin::Input group --}}
                <div class="fv-row mb-10">
                    {{-- begin::Label --}}
                    <label class="form-label fs-6 text-dark">Email
                        <span class="text-danger">*</span></label>
                    {{-- end::Label --}}
                    {{-- begin::Input --}}
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                        type="email" name="email" value="{{ old('email') }}" autofocus required />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    {{-- end::Input --}}
                </div>
                {{-- end::Input group --}}
                {{-- begin::Input group --}}
                <div class="fv-row mb-10">
                    {{-- begin::Wrapper --}}
                    <div class="d-flex flex-stack mb-2">
                        {{-- begin::Label --}}
                        <label class="form-label text-dark fs-6 mb-0">Kata Sandi
                            <span class="text-danger">*</span></label>
                        {{-- end::Label --}}
                        @if (Route::has('password.request'))
                            {{-- begin::Link --}}
                            <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Lupa
                                Kata Sandi ?</a>
                            {{-- end::Link --}}
                        @endif
                    </div>
                    {{-- end::Wrapper --}}
                    {{-- begin::Input --}}
                    <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                        name="password" type="password" autocomplete="current-password" required />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    {{-- end::Input --}}
                </div>
                {{-- end::Input group --}}
                {{-- begin::Input group --}}
                <div class="fv-row mb-10">
                    <label class="form-check form-check-custom form-check-solid mb-5">
                        <input class="form-check-input" type="checkbox" name="remember" />
                        <span class="form-check-label fw-bold text-gray-700 fs-6">Ingat Saya
                    </label>
                </div>
                {{-- end::Input group --}}
                {{-- begin::Actions --}}
                <div class="text-center">
                    {{-- begin::Submit button --}}
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">Log In</span>
                    </button>
                    {{-- end::Submit button --}}
                    {{-- begin::Separator --}}
                    <div class="text-center text-muted text-uppercase fw-bolder mb-5">atau</div>
                    {{-- end::Separator --}}
                    {{-- begin::Google link --}}
                    <a href="{{ route('social-auth', 'google') }}"
                        class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                        <img alt="Logo" src="{{ asset('themes/admin/media/svg/brand-logos/google-icon.svg') }}"
                            class="h-20px me-3" />Login dengan Google
                    </a>
                    {{-- end::Google link --}}
                </div>
                {{-- end::Actions --}}
            </form>
            {{-- end::Form --}}
        </div>
        {{-- end::Wrapper --}}
    </div>
    {{-- end::Content --}}
@endsection
