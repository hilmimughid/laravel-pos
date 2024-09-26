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
        <div class="row mb-3">
            <div class="col">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_stok_barang">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Admin</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @endsection

    @push('js')
    <script>
        $(document).ready(function () {
  var dataUser = $("#table_stok_barang").DataTable({
    // serverSide: true, jika ingin menggunakan server side processing
    serverSide: true,
    ajax: {
      url: "{{ url('stok/list') }}",
      dataType: "json",
      type: "GET",
      data: function (d) {
        d.level_id = $("#level_id").val();
      }
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
        data: "barang.barang_nama",
        className: "",
        // orderable: true, jika ingin kolom ini bisa diurutkan
        orderable: true,
        // searchable: true, jika ingin kolom ini bisa dicari
        searchable: true,
      },
      {
        data: "user.nama",
        className: "",
        orderable: true,
        searchable: true,
      },
      {
        // mengambil data level hasil dari ORM berelasi
        data: "stok_tanggal",
        className: "",
        orderable: false,
        searchable: false,
      },
      {
        // mengambil data level hasil dari ORM berelasi
        data: "stok_jumlah",
        className: "",
        orderable: false,
        searchable: false,
      },
      {
        data: "aksi",
        className: "",
        orderable: false,
        searchable: false,
      },
    ],
  });

  $("#level_id").on("change", function () {
    dataUser.ajax.reload();
  });
});

    </script>
    @endpush