@extends('admin.layouts.admin_master')

@section('title', 'Dashboard')
@section('content')

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
    </div>

    {{-- BAGIAN KARTU STATISTIK (Total Users, Income, dll) --}}
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Users</p>
                            <h6 class="mb-0">20,000</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                        <span class="d-inline-flex align-items-center gap-1 text-success-main">
                            <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +5000
                        </span>
                        Last 30 days users
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-2 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Jumlah Kelompok Tani</p>
                            <h6 class="mb-0">15,000</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="fa-solid:award" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                        <span class="d-inline-flex align-items-center gap-1 text-danger-main">
                            <iconify-icon icon="bxs:down-arrow" class="text-xs"></iconify-icon> -800
                        </span>
                        Last 30 days subscription
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-3 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Jumlah Supplier</p>
                            <h6 class="mb-0">5,000</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="fluent:people-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                        <span class="d-inline-flex align-items-center gap-1 text-success-main">
                            <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +200
                        </span>
                        Last 30 days users
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- BAGIAN GRAFIK DAN TABEL --}}
    <div class="row gy-4 mt-1">
       <div class="row g-4">

    {{-- Sales Statistic Chart --}}
    <div class="col-xxl-8 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h6 class="text-lg mb-0">Sales Statistic</h6>
                    <select class="form-select form-select-sm w-auto">
                        <option>Yearly</option>
                        <option>Monthly</option>
                        <option>Weekly</option>
                        <option>Today</option>
                    </select>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
                    <h6 class="mb-0">$27,200</h6>
                    <span class="badge bg-success">
                        10% ↑
                    </span>
                    <span class="text-muted small">+ $1500 Per Day</span>
                </div>

                <div id="chart" class="mt-4"></div>
            </div>
        </div>
    </div>

    {{-- Users Overview Donut Chart --}}
    <div class="col-xxl-4 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold mb-0">Users Overview</h6>
                    <select class="form-select form-select-sm w-auto">
                        <option>Today</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>Yearly</option>
                    </select>
                </div>

                <div id="userOverviewDonutChart" class="mt-4"></div>

                <ul class="list-unstyled mt-3 mb-0">
                    <li class="d-flex justify-content-between">
                        <span>New Users</span>
                        <strong>500</strong>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>Subscribed</span>
                        <strong>300</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

    </div>
</div>

@endsection
