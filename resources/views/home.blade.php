@extends('layouts.main')
@section('content')
<div>
    @if(Auth::check() && Auth::user()->role == 'masyarakat')
    <a href="/pengaduan/add"><button class="btn btn-warning">Buat Pengaduan</button></a>
    @endif
@if($pengaduan->count() <= 0)
            <div class="d-flex justify-content-center">
                <h3>Belum Membuat Pengaduan</h3>
            </div>
@else
<table class="">
    <tbody>
       
        @foreach($pengaduan as $pengad)

        <tr class="p-5">
            <td class="p-5">
                {{$pengad->isi_laporan}}
                <small class="text-muted"><sub>Diadukan pada tanggal {{$pengad->tgl_pengaduan}}</sub> </small>
            </td>
            <td class="p-5">
            @if(!Auth::check())    
                @if($pengad->status == '0')
                Belum Di Verifikasi
                @elseif($pengad->status == 'proses')
                Sedang Diperoses
                @elseif($pengad->status == 'selesai')
                Telah Ditanggapi
                @endif
            @elseif(Auth::check() && Auth::user()->role == 'masyarakat')    
                @if($pengad->status == '0')
                Belum Di Verifikasi
                @elseif($pengad->status == 'proses')
                Sedang Diperoses
                @elseif($pengad->status == 'selesai')
                Telah Ditanggapi
                @endif
            @elseif(Auth::check() && Auth::user()->role == 'admin' OR Auth::user()->role == 'petugas')
                @if($pengad->status == '0')
                <a href="/pengaduan/detail/{{$pengad->id_pengaduan}}"><button class="btn btn-success">Verifikasi</button></a>
                @elseif($pengad->status == 'proses')
                <a href="/tanggapan/add/{{$pengad->id_pengaduan}}"><button class="btn btn-success">Beri Tanggapan</button></a>
                @elseif($pengad->status == 'selesai')
                Telah Diproses
                @endif
            
            @endif
            </td>
            <td>
                <a href="/pengaduan/detail/{{$pengad->id_pengaduan}}"><button class="btn btn-outline-danger">Lihat Lebih Lengkap</button></a>
            </td>
            
            
            <!-- <td>
                @if($pengad->foto != null)
                    <img class="img-fluid pengaduan-preview" src="/storage/pengaduan/{{$pengad->foto}}" alt="{{$pengad->foto}}">
                @else
                    <b>tidak ada foto</b>
                @endif
            </td> -->
        </tr>
        @endforeach
        @endif
    </tbody>
</table>


</div>
@endsection