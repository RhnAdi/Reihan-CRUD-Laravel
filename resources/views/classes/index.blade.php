@extends('layouts.main')
@section('content')
  <div class="container-fluid px-4">
    <h1 class="mt-4">Kelas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Kelas</li>

    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
          <a href="{{ route('classes.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th width="280px">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($classes as $class)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->grade }}</td>
                        <td>
                            <a href="{{ route('classes.edit', $class) }}" class=" btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('classes.destroy', $class) }}" method="POST" style="display:inline;">
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
