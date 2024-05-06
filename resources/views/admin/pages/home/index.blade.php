@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{-- begin::Container --}}
        <div class=" container-xxl " id="kt_content_container">
            {{-- begin::Row --}}
            <div class="row g-5 g-xl-8 mb-6">
                <div class="col-xl-6">
                    {{-- begin::Statistics Widget 5 --}}
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        {{-- begin::Body --}}
                        <div class="card-body">
                            {{-- begin::Svg Icon | path: icons/duotone/Communication/Group.svg --}}
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M14 3V20H2V3C2 2.4 2.4 2 3 2H13C13.6 2 14 2.4 14 3ZM11 13V11C11 9.7 10.2 8.59995 9 8.19995V7C9 6.4 8.6 6 8 6C7.4 6 7 6.4 7 7V8.19995C5.8 8.59995 5 9.7 5 11V13C5 13.6 4.6 14 4 14V15C4 15.6 4.4 16 5 16H11C11.6 16 12 15.6 12 15V14C11.4 14 11 13.6 11 13Z"
                                        fill="currentColor" />
                                    <path
                                        d="M2 20H14V21C14 21.6 13.6 22 13 22H3C2.4 22 2 21.6 2 21V20ZM9 3V2H7V3C7 3.6 7.4 4 8 4C8.6 4 9 3.6 9 3ZM6.5 16C6.5 16.8 7.2 17.5 8 17.5C8.8 17.5 9.5 16.8 9.5 16H6.5ZM21.7 12C21.7 11.4 21.3 11 20.7 11H17.6C17 11 16.6 11.4 16.6 12C16.6 12.6 17 13 17.6 13H20.7C21.2 13 21.7 12.6 21.7 12ZM17 8C16.6 8 16.2 7.80002 16.1 7.40002C15.9 6.90002 16.1 6.29998 16.6 6.09998L19.1 5C19.6 4.8 20.2 5 20.4 5.5C20.6 6 20.4 6.60005 19.9 6.80005L17.4 7.90002C17.3 8.00002 17.1 8 17 8ZM19.5 19.1C19.4 19.1 19.2 19.1 19.1 19L16.6 17.9C16.1 17.7 15.9 17.1 16.1 16.6C16.3 16.1 16.9 15.9 17.4 16.1L19.9 17.2C20.4 17.4 20.6 18 20.4 18.5C20.2 18.9 19.9 19.1 19.5 19.1Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            {{-- end::Svg Icon --}}
                            <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">0</div>
                            <div class="fw-bold text-inverse-warning fs-7">Event</div>
                        </div>
                        {{-- end::Body --}}
                    </a>
                    {{-- end::Statistics Widget 5 --}}
                </div>
                <div class="col-xl-6">
                    {{-- begin::Statistics Widget 5 --}}
                    <a href="#"
                        class="card bg-success hoverable card-xl-stretch mb-xl-8">
                        {{-- begin::Body --}}
                        <div class="card-body">
                            {{-- begin::Svg Icon | path: icons/duotone/Communication/Group.svg --}}
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z"
                                            fill="currentColor" fill-rule="nonzero" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                            {{-- end::Svg Icon --}}
                            <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">0</div>
                            <div class="fw-bold text-inverse-warning fs-7">Pelatihan</div>
                        </div>
                        {{-- end::Body --}}
                    </a>
                    {{-- end::Statistics Widget 5 --}}
                </div>
            </div>
            {{-- end::Row --}}
        </div>
    </div>
@endsection

@section('page_scripts')
@endsection
