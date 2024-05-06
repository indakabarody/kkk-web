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
                <div class="col-xl-4">
                    {{-- begin::Statistics Widget 5 --}}
                    <a href="{{ route('admin.students.index') }}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        {{-- begin::Body --}}
                        <div class="card-body">
                            {{-- begin::Svg Icon | path: icons/duotone/Communication/Group.svg --}}
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                        fill="currentColor" />
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2"
                                        fill="currentColor" />
                                    <path
                                        d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                        fill="currentColor" />
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            {{-- end::Svg Icon --}}
                            <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{ $studentCount }}</div>
                            <div class="fw-bold text-inverse-warning fs-7">Mahasiswa</div>
                        </div>
                        {{-- end::Body --}}
                    </a>
                    {{-- end::Statistics Widget 5 --}}
                </div>
                <div class="col-xl-4">
                    {{-- begin::Statistics Widget 5 --}}
                    <a href="{{ route('admin.income-transactions.index') }}"
                        class="card bg-success hoverable card-xl-stretch mb-xl-8">
                        {{-- begin::Body --}}
                        <div class="card-body">
                            {{-- begin::Svg Icon | path: icons/duotone/Communication/Group.svg --}}
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M13 14.4V3.00003C13 2.40003 12.6 2.00003 12 2.00003C11.4 2.00003 11 2.40003 11 3.00003V14.4H13Z"
                                        fill="currentColor" />
                                    <path
                                        d="M5.7071 16.1071C5.07714 15.4771 5.52331 14.4 6.41421 14.4H17.5858C18.4767 14.4 18.9229 15.4771 18.2929 16.1071L12.7 21.7C12.3 22.1 11.7 22.1 11.3 21.7L5.7071 16.1071Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            {{-- end::Svg Icon --}}
                            <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{ $incomeTransactionCount }}</div>
                            <div class="fw-bold text-inverse-warning fs-7">Transaksi Masuk</div>
                        </div>
                        {{-- end::Body --}}
                    </a>
                    {{-- end::Statistics Widget 5 --}}
                </div>
                <div class="col-xl-4">
                    {{-- begin::Statistics Widget 5 --}}
                    <a href="{{ route('admin.outcome-transactions.index') }}"
                        class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                        {{-- begin::Body --}}
                        <div class="card-body">
                            {{-- begin::Svg Icon | path: icons/duotone/Communication/Group.svg --}}
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z"
                                        fill="currentColor" />
                                    <path
                                        d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            {{-- end::Svg Icon --}}
                            <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{ $outcomeTransactionCount }}</div>
                            <div class="fw-bold text-inverse-warning fs-7">Transaksi Keluar</div>
                        </div>
                        {{-- end::Body --}}
                    </a>
                    {{-- end::Statistics Widget 5 --}}
                </div>
            </div>
            {{-- end::Row --}}
            {{-- begin::Row --}}
            <div class="row g-5 g-xl-8 mb-6">
                {{-- begin::Card --}}
                <div class="card">
                    {{-- begin::Card header --}}
                    <div class="card-header border-0 pt-6">
                        {{-- begin::Card title --}}
                        <div class="card-title">
                            Grafik Pemasukan Bulanan
                        </div>
                        {{-- begin::Card title --}}
                    </div>
                    {{-- end::Card header --}}
                    {{-- begin::Card body --}}
                    <div class="card-body pt-0">
                        <div class="card card-bordered">
                            <div class="card-body">
                                <div class="mb-5">
                                    @php
                                        if ($incomeChartItems[5] >= $incomeChartItems[4]) {
                                            $color = 'success';
                                            if ($incomeChartItems[5] > 0) {
                                                $percentage =
                                                    100 - ($incomeChartItems[4] / $incomeChartItems[5]) * 100;
                                            } else {
                                                $percentage = 0;
                                            }

                                            if ($percentage == 0) {
                                                $color = 'warning';
                                            }
                                        } else {
                                            $color = 'danger';
                                            $percentage = 100 - ($incomeChartItems[5] / $incomeChartItems[4]) * 100;
                                        }
                                    @endphp
                                    {{-- begin::Statistics --}}
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">Rp.</span>
                                        <span
                                            class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ number_format($incomeChartItems[5], 2, ',', '.') }}</span>
                                        <span class="badge badge-light-{{ $color }} fs-base">
                                            {{-- begin::Svg Icon | path: icons/duotune/arrows/arr066.svg --}}
                                            <span class="svg-icon svg-icon-5 svg-icon-{{ $color }} ms-n1">
                                                @if ($color == 'success')
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                            rx="1" transform="rotate(90 13 6)"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                @else
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="11" y="18" width="13" height="2"
                                                            rx="1" transform="rotate(-90 11 18)"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                @endif
                                            </span>
                                            {{-- end::Svg Icon --}}
                                            {{ round($percentage, 2) }}%
                                        </span>
                                    </div>
                                    {{-- end::Statistics --}}
                                    {{-- begin::Description --}}
                                    <span class="fs-6 fw-semibold text-gray-400">Pemasukan bulan ini</span>
                                    {{-- end::Description --}}
                                </div>
                                {{-- end::Statistics --}}
                                <div id="income_chart" style="height: 350px;"></div>
                            </div>
                        </div>
                    </div>
                    {{-- end::Card body --}}
                </div>
                {{-- end::Card --}}
            </div>
            {{-- end::Row --}}
        </div>
    </div>
@endsection

@section('page_scripts')
    <script>
        var e = document.getElementById("income_chart"),
            t = (parseInt(KTUtil.css(e, "height")), KTUtil.getCssVariableValue("--bs-gray-500")),
            a = KTUtil.getCssVariableValue("--bs-gray-200"),
            o = KTUtil.getCssVariableValue("--bs-info"),
            s = KTUtil.getCssVariableValue("--bs-light-info");

        var options = {
            series: [{
                name: 'Pemasukan',
                data: {!! json_encode($incomeChartItems) !!},
            }],
            chart: {
                fontFamily: "inherit",
                type: "area",
                height: 350,
                toolbar: {
                    show: true
                },
                defaultLocale: 'id',
                locales: [{
                    name: 'id',
                    options: {
                        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                            'September', 'Oktober', 'November', 'Desember'
                        ],
                        shortMonths: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt',
                            'Nov', 'Des'
                        ],
                        days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                        shortDays: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                        toolbar: {
                            download: 'Unduh SVG',
                            selection: 'Seleksi',
                            selectionZoom: 'Zoom Seleksi',
                            zoomIn: 'Perbesar',
                            zoomOut: 'Perkecil',
                            pan: 'Geser',
                            reset: 'Atur Ulang Zoom',
                        }
                    },
                }],
            },
            plotOptions: {},
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: "solid",
                opacity: 1
            },
            stroke: {
                curve: "smooth",
                show: true,
                width: 3,
                colors: [o]
            },
            xaxis: {
                type: 'datetime',
                categories: {!! json_encode($chartMonths) !!},
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: t,
                        fontSize: "12px"
                    }
                },
                crosshairs: {
                    position: "front",
                    stroke: {
                        color: o,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: void 0,
                    offsetY: 0,
                    style: {
                        fontSize: "12px"
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: t,
                        fontSize: "12px"
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: "none",
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: "12px"
                },
                y: {
                    formatter: function(e) {
                        var reverse = e.toString().split('').reverse().join(''),
                            e = reverse.match(/\d{1,3}/g);
                        e = e.join('.').split('').reverse().join('');
                        return "Rp." + e;
                    }
                }
            },
            colors: [s],
            grid: {
                borderColor: a,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: o,
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(e, options);
        chart.render();
    </script>
@endsection
