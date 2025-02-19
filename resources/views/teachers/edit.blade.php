@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Guru</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item">Guru</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
 
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit data
            </div>
            <div class="card-body">
                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $teacher->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $teacher->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone :</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $teacher->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject">Mata Pelajaran:</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ $teacher->subject }}">
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="class_ids">Pilih Kelas:</label>
                        <select class="form-control @error('class_ids') is-invalid @enderror" id="class_ids" name="class_ids[]" multiple>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{  $teacher->classes->contains($class->id) ? 'selected' : '' }}>
                                    {{ $class->name }} (Grade {{ $class->grade }})
                                </option>
                            @endforeach
                        </select>
                        @error('class_ids')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Gunakan CTRL + Klik untuk memilih lebih dari satu kelas.</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection 