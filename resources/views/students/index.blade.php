@extends('layouts.main')
@section('content')
  <div class="container-fluid px-4">
    <h1 class="mt-4">Siswa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Siswa</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
          <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th width="280px">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Action</th>
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
                        <td>{{ $student->class->name ?? 'Belum Ditentukan' }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                         </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
@endsection
