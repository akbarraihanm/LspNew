<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.bootstrap4.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <title>Toko Kesehatan</title>
  </head>
  <body>
    <div class="container">
      <br><br>
      <h1>Halo Admin {{Session::get('username')}} !</h1>
      <a href="{{url('/adminlogout')}}" class="btn btn-danger">Keluar</a>
      <br><br>
      <table id="example" class="table table-hover table-striped table-bordered style="width:100%"">
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
              <form action="{{url('/delete',$p->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{url('/admin/edit',$p->id)}}" class="btn-primary btn">Ubah</a>
                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{url('/admin/addproduk')}}" class="btn btn-primary">Tambah Data</a>
      <a href="{{url('/admin/manageuser')}}" class="btn btn-primary">Atur Data Pelanggan</a>
    </div>
  </body>
</html>
