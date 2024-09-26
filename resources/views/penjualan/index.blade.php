@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin</th>
                    <th>Pembeli</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Harga satuan</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
  var dataUser = $("#table_penjualan").DataTable({
    // serverSide: true, jika ingin menggunakan server side processing
    serverSide: true,
    ajax: {
      url: "{{ url('penjualan/list') }}",
      dataType: "json",
      type: "GET",
    },
    columns: [
      {
        // nomor urut dari laravel datatable addIndexColumn()
        data: "DT_RowIndex",
        className: "text-center",
        orderable: false,
        searchable: false,
      },
      {
        data: "penjualan.penjualan_kode",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "penjualan.pembeli",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "penjualan.penjualan_kode",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "penjualan.penjualan_tgl",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "barang.barang_nama",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "harga",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "jumlah",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "total",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        data: "aksi",
        className: "",
        orderable: false,
        searchable: false,
      },
    ],
  });
});

</script>
@endpush