<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <title>Toko Kesehatan</title>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>

  </head>
  <body>
    <div class="container">
      <br><br>
      <h1>Halo, {{Session::get('nama')}} !</h1>
      <h1>Selamat berbelanja !</h1>
      <br><br>
      <table id="example"class="table table-striped table-bordered ">
        <thead class="thead-dark">
          <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($produk as $p)
          <tr>
            <td>{{$p->nama}}</td>
            <td>Rp. {{$p->harga}}</td>
            <td>
              <a href="{{url('/user/beli', $p->id)}}" class="btn btn-danger">Beli</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <br>
      <a href="{{url('/user/keranjang')}}" class="btn btn-primary">Lihat Keranjang</a>
      <a href="{{url('/user/home')}}" class="btn btn-secondary">Kembali</a>
    </div>
  </body>
</html>
