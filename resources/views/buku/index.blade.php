@extends('layouts.app')

@section('judul', 'Daftar Buku')

@section('konten')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <h1 class="text-2xl font-bold">Daftar Buku</h1>

        {{-- Form pencarian --}}
        <form action="{{ route('buku.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari judul atau penulis..."
                class="w-64 rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Cari</button>
        </form>
    </div>

    {{-- Daftar buku dalam bentuk kartu --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($daftarBuku as $buku)
            <div class="bg-white rounded-xl shadow p-4 flex flex-col justify-between">
                <div>
                    <a href="{{ route('buku.show', $buku) }}" class="text-lg font-semibold text-indigo-700 hover:underline">
                        {{ $buku->judul }}
                    </a>
                    <p class="text-sm text-slate-500 mt-1">{{ $buku->penulis }}</p>
                    <p class="text-sm text-slate-500">
                        {{ $buku->penerbit ?: 'Penerbit belum diisi' }} &middot; {{ $buku->tahun_terbit }}
                    </p>
                </div>

                @auth
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('buku.edit', $buku) }}"
                            class="px-3 py-1 rounded bg-amber-100 text-amber-800 hover:bg-amber-200">Ubah</a>

                        <form action="{{ route('buku.destroy', $buku) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200">Hapus</button>
                        </form>
                    </div>
                @endauth
            </div>
        @empty
            <div class="md:col-span-2 py-8 text-center text-slate-500">
                Belum ada buku.
            </div>
        @endforelse
    </div>

    {{-- Navigasi halaman (pagination) --}}
    <div class="mt-6">
        {{ $daftarBuku->links() }}
    </div>
@endsection