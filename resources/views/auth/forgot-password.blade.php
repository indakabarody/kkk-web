@extends('layouts.auth')

@section('title')
    Lupa Kata Sandi
@endsection

@section('content')
    {{-- begin::Content --}}
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        {{-- begin::Logo --}}
        {{-- <a href="{{ url('') }}" class="mb-12">
            <h1 class="text-dark">{{ config('app.name') }}</h1>
        </a> --}}
        {{-- end::Logo --}}
        {{-- begin::Wrapper --}}
        <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
            {{-- begin::Form --}}
            <form class="form w-100" action="{{ route('password.email') }}" method="POST">
                @csrf
                {{-- begin::Heading --}}
                <div class="text-center mb-10">
                    {{-- begin::Title --}}
                    <h1 class="text-dark mb-3">@yield('title')</h1>
                    {{-- end::Title --}}
                    {{-- begin::Link --}}
                    <div class="text-gray-400 fw-bold fs-4">Masukkan email untuk reset password.</div>
                    {{-- end::Link --}}
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- begin::Heading --}}
                {{-- begin::Input group --}}
                <div class="fv-row mb-10">
                    <label class="form-label text-gray-900 fs-6">Email
                        <span class="text-danger">*</span></label>
                    <input class="form-control form-control-solid @error('email') is-invalid @enderror" type="email"
                        placeholder="" value="{{ old('email') }}" name="email"required autocomplete="email" autofocus />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end::Input group --}}
                {{-- begin::Actions --}}
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary me-4">
                        <span class="indicator-label">Kirim</span>
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Batal</a>
                </div>
                {{-- end::Actions --}}
            </form>
            {{-- end::Form --}}
        </div>
        {{-- end::Wrapper --}}
    </div>
    {{-- end::Content --}}
@endsection
