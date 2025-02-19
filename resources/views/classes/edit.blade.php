@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kelas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Kelas</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
 
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit data
            </div>
            <div class="card-body">
                <form action="{{ route('classes.update', $schoolClass->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <div class="form-group">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $schoolClass->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="grade">Kelas :</label>
                        <input type="grade" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ $schoolClass->grade }}">
                        @error('grade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection 