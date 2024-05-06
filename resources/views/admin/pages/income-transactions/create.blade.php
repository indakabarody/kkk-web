@extends('admin.layouts.app')

@section('title')
    Tambah Transaksi Masuk
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{-- begin::Container --}}
        <div class=" container-xxl " id="kt_content_container">
            {{-- begin::Tables Widget 9 --}}
            <div class="card mb-5 mb-xl-10">
                {{-- begin::Content --}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{-- begin::Form --}}
                    <form class="form" action="{{ route('admin.income-transactions.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="date" name="date"
                                        class="form-control form-control-lg form-control-solid @error('date') is-invalid @enderror"
                                        placeholder="Masukkan Tanggal Transaksi" value="{{ old('date') }}" />
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Mahasiswa</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <select name="student_id"
                                        class="form-select form-select-lg form-select-solid @error('student_id') is-invalid @enderror"
                                        data-control="select2" data-placeholder="-Pilih Mahasiswa-">
                                        <option></option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->nim }} - {{ $student->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('student_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nominal (Rp.)</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="amount_idr"
                                        class="form-control form-control-lg form-control-solid @error('amount_idr') is-invalid @enderror"
                                        placeholder="Masukkan Nominal Transaksi" value="{{ old('amount_idr') }}" />
                                    @error('amount_idr')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Kategori</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid @error('category') is-invalid @enderror"
                                        aria-label="Select example" name="category">
                                        <option value="">-Pilih Kategori-</option>
                                        <option value="Iuran">Iuran</option>
                                        <option value="Denda">Denda</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Catatan</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{!! old('notes') !!}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                        </div>
                        {{-- end::Card body --}}
                        {{-- begin::Actions --}}
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-white btn-active-light-primary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary"
                                id="kt_account_profile_details_submit">Simpan</button>
                        </div>
                        {{-- end::Actions --}}
                    </form>
                    {{-- end::Form --}}
                </div>
                {{-- end::Content --}}
            </div>
            {{-- end::Tables Widget 9 --}}
        </div>
        {{-- end::Container --}}
    </div>
@endsection

@section('page_styles')
    <link href="{{ asset('themes/admin/plugins/custom/summernote/summernote-lite.css') }}" rel="stylesheet"
        type="text/css">
@endsection

@section('page_scripts')
    <script src="{{ asset('themes/admin/plugins/custom/summernote/summernote-lite.js') }}"></script>
    <script>
        $('#notes').summernote({
            fontNames: ['Inter', 'Inter-Bold', 'Inter-Black', 'Inter-Extrabold', 'Inter-Extralight',
                'Inter-Light', 'Inter-Medium', 'Inter-Semibold', 'Inter-Thin'
            ],
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
