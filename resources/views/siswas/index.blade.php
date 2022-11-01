@extends('adminlte::page')

@section('title', 'Kelola Siswa')

@section('content_header')
    <h1>Kelola data Siswa</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah</a>
                    <table class="table table-bordered" id="siswa-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 3rem">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->kelas }}</td>
                                <td>
                                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-success m-1">Edit</a>
                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $('#siswa-table').DataTable({
        responsive: true,
        scrollX: true
    });

    const Toast = Swal.mixin({
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false,
        toast: true
    });
</script>

@if(session('info'))
<script>
    Toast.fire({
        title: "{{ session('info')['message'] }}",
        icon: "{{ session('info')['type'] }}"
    });
</script>
@endif
@endsection
