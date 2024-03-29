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
      <h1>Masukkan Pemesanan</h1>
      <form action="{{url('/keranjangpost')}}" method="post">
        @csrf
        {{ method_field('post') }}
        <div class="form-group">
          <input type="hidden"class="form-control" name="idProduk" value="{{$produk->id}}">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" name="idPengguna" value="{{Session::get('id')}}">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" name="total_harga" value="{{$produk->harga}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Produk</label>
          <h4 class="form-control">{{$produk->nama}}</h4>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Harga</label>
          <h4 class="form-control">{{$produk->harga}}</h4>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Masukkan Jumlah Pemesanan</label>
          <input type="text" class="form-control"name="jumlah_barang">
        </div>
        <button type="submit" class="btn btn-primary">Masukkan Keranjang</button>
        <a href="{{url('/user/belanja')}}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </body>
</html>
