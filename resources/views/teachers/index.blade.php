@extends('layouts.main')
@section('content')
  <div class="container-fluid px-4">
    <h1 class="mt-4">Guru</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Guru</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
          <a href="{{ route('teachers.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Mapel</th>
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
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Action</th>
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
                        {{-- <td>{{ implode(', ', $teacher->classes->pluck('name')->toArray()) ?: 'Belum Ditentukan' }}</td> --}}
                        <td>{{ $teacher->classes->map(fn($class) => "{$class->grade}({$class->name})")->implode(', ') ?: 'Belum Ditentukan' }}</td>

                        <td>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
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
