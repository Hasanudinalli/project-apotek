@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0"><b><i>Data Kategori</i></b></h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <b>Data Kategori</b>
                    <a href="{{route('kategori.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Transaksi</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th><i>Id</i></th>
                                <th><i>Kode Transaksi</i></th>
                                <th><i>Total</i></th>
                                <th><i>Jumlah Uang</i></th>
                                <th><i>Kembalian</i></th>
                                <th><i>PPN</i></th>


                            </tr>
                            @php $no=1; @endphp
                            @foreach ($transaksi as $data)
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->kode_transaksi}}</td>
                                 <td>{{$data->total}}</td>
                                 <td>{{$data->kd_kategori}}</td>
                                 <td>{{$data->jumlah_uang}}</td>
                                 <td>{{$data->kembalian}}</td>
                                 <td>{{$data->ppn}}</td>




                                 <td>
                                     <form action="{{route('kategori.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapusnya')">HAPUS</button>
                                        </form>
                                 </td>
                             </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
