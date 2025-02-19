@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Siswa</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Siswa</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
 
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit data
            </div>
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $student->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $student->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone :</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $student->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address :</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $student->address }}">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="class_id">Kelas:</label>
                        <select class="form-control @error('class_id') is-invalid @enderror" id="class_id" name="class_id">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }} (Grade {{ $class->grade }})
                                </option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection 