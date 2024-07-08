@extends('adminlte::page')

@section('title', 'Data Program Studi')

@section('content_header')
    <h1>Program Studi</h1>
@stop

@section('content')

<div class="container mt-5">
    <div class="row">
                    <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAMA PRODI</th>
                                <th scope="col">FAKULTAS</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->kode_prodi }}</td>
                                    <td>{{ $post->nama_prodi }}</td>
                                    <td>{!! $post->fakultas ? $post->fakultas->nama_fakultas : '<span class="text-danger">Tidak ada fakultas</span>' !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger">Data Post belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>

@endsection

@section('js')
    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
