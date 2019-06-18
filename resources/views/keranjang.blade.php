<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Toko Kesehatan</title>
  </head>
  <body>
    <div class="container">
      <br><br>
      <h1>Halo, {{Session::get('nama')}} !</h1>
      <h1>Ini daftar pesananmu !</h1>
      <br><br>
      <table class="table table-striped table-bordered ">
        <thead class="thead-dark">
          <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah Pemesanan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum = 0;?>
          @foreach($list as $k)
          <tr>
            <td>{{$k->nama}}</td>
            <td>Rp. {{$k->harga}}</td>
            <td>{{$k->jumlah_barang}} buah</td>
            <td>Rp. {{$k->total_harga}}</td>
            <td>
              <form action="{{url('/deletecart',$k->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-secondary" type="submit" onclick="return confirm('Yakin ingin menghapus pesanan?')">Hapus</button>
              </form>
            </td>
            <?php $sum += $k['total_harga'];?>
          </tr>
          @endforeach
        </tbody>
      </table>

      <br>
      <h1 align="center">Total yang dibayarkan = Rp. {{$sum}}</h1>
      <br>
      <a href="{{url('/user/belanja')}}" class="btn btn-secondary">Kembali</a>
    </div>
  </body>
</html>
