@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kelas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Kelas</li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
 
        <div class="card mb-4">
            <div class="card-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama :</label>
                        <input disabled type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $schoolClass->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="grade">Kelas :</label>
                        <input disabled type="grade" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ $schoolClass->grade }}">
                        @error('grade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">
            <p>Data Guru</p>
          </div>
          <div class="card-body">
            @if ($teachers->isNotEmpty()) 
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Mapel</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Mapel</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->subject }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-center">
                <p class="text-muted">Tidak ada data guru tersedia</p>
            </div>
            @endif
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">
            <p>Data Siswa</p>
          </div>
          <div class="card-body">
            @if ($students->isNotEmpty()) 
            <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-center">
                <p class="text-muted">Tidak ada data siswa tersedia</p>
            </div>
            @endif
          </div>
        </div>
    </div>
@endsection 