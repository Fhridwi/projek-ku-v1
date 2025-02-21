@extends('layouts.app')

@section('title')
  Dashboard
@endsection

@section('title2')
    Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Total Santri -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-people-fill"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Pendaftar</span>
                    <span class="info-box-number">{{ $totalSantri }}</span>
                </div>
            </div>
        </div>

        <!-- Santri Putra -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-success shadow-sm">
                    <i class="bi bi-gender-male"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Santri Putra</span>
                    <span class="info-box-number">{{ $santriPutra }}</span>
                </div>
            </div>
        </div>

        <!-- Santri Putri -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-danger shadow-sm">
                    <i class="bi bi-gender-female"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Santri Putri</span>
                    <span class="info-box-number">{{ $santriPutri }}</span>
                </div>
            </div>
        </div>

        <!-- Kuota Pendaftaran -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-warning shadow-sm">
                    <i class="bi bi-list-check"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Kuota Pendaftaran</span>
                    <span class="info-box-number">{{ $kouta->kouta }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid">
        <div class="row">
            <!-- Chart (Col-9) -->
            <div class="col-lg-9">
                <div class="card mb-4 h-100">
                    <div class="container-fluid mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Laporan Pendaftaran</h5>
                            <select id="tahunAjaran" class="form-select w-auto">
                                @for ($i = date('Y'); $i >= 2020; $i--)
                                    <option value="{{ $i }}" {{ $tahunAjaran == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pendaftarChart"></canvas>
                    </div>
                </div>
            </div>
    
            <!-- Status Pendaftaran & Santri Terbaru (Col-3) -->
            <div class="col-lg-3">
                <div class="d-flex flex-column gap-3 h-100">
                    <!-- Status Pendaftaran -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Status Pendaftaran</h5>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="mb-2">Tahun Ajaran: <span class="fw-bold">{{ $kouta->nama_tahun }}</span></h6>
                            <h6 class="mb-2">Kuota: <span class="fw-bold">{{ $totalSantri }} / {{ $kouta->kouta }}</span></h6>
                            <h6 class="mb-2">Status: <span class="badge bg-success">{{ $kouta->status == 'aktif' ? 'Dibuka' : 'Ditutup' }}</span></h6>
                        </div>
                    </div>
    
                    <!-- Daftar Santri Terbaru -->
                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <h5 class="card-title">Santri Terbaru</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($santriTerbaru as $santri)
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="{{ asset('storage/' . ($santri->FilePendaftaran->pas_foto ?? 'default.png')) }}"
                                            class="rounded-circle me-2"
                                            alt="Profil"
                                            width="50"
                                            height="50"
                                            style="object-fit: cover;">
                                      <div>
                                            <strong>{{ $santri->nama_santri }}</strong><br>
                                            <small>{{ $santri->orangTua->no_hp ?? '-' }}</small>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div> 
        </div>
    </div>
    
    

    <!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('pendaftarChart').getContext('2d');

        var pendaftarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($bulanLabels) !!},
                datasets: [{
                    label: 'Total Pendaftaran Tahun {{ $tahunAjaran }}',
                    data: {!! json_encode($dataChart) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Event listener untuk perubahan tahun ajaran
        document.getElementById('tahunAjaran').addEventListener('change', function () {
            var selectedYear = this.value;
            window.location.href = "{{ route('admin.dashboard') }}?tahun_ajaran=" + selectedYear;
        });
    });
</script>

@endsection