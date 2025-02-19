@extends('layouts.main') <!-- Pastikan kamu punya layout utama -->

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="row">
        <!-- Total Students -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Students</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $totalStudents }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Teachers -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Teachers</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $totalTeachers }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Classes -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Classes</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $totalClasses }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
