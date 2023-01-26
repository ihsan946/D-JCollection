<!-- footer -->
<div class="container-fluid" id="footer">
  <div class="row">
    <div class="col-xs-3 text-white">
      <img src="../asset/img/Halamandepan.jpg" height="200" width="300">
    </div>

    <div class="col-xs-3 col-xs-offset-1 text-white">
      <h3 style="font-family:Cooper Std Black">Hubungi Kami</h3>
      <hr>
      <a href="" target="_blank"><img style="width: 40px; height: 40px; margin-right: 1vw;" src="../asset/img/facebook.png"></a>
      <a href="" target="_blank"><img style="width: 40px; height: 40px; margin-right: 1vw;" src="../asset/img/instagram.png"></a>

      <style type="text/css">
        .element {
          position: absolute;
          left: 500px;
          top: 0px;
          width: 200px;
        }
      </style>
      <div class="element">
        <h3 style="font-family:Cooper Std Black">Komentar </h3>
        <hr>
        <form action="./proses/komentar.php" method="post" role="form">
          <div class="">
            <label for="nama">Nama : </label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
          </div>
          <div class="">
            <label for="email">Email : </label>
            <input type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="">
            <label for="pesan">Pesan : </label>
            <textarea class="form-control" name="pesan" placeholder="Masukkan pesan"></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
      <div class="row" id="cpy">
        <div class="col-xs-12">
          <p style="color : white; text-align: center;">@Copy Right Reserved</p>
        </div>
      </div>
    </div>
  </div>
  <!-- end of footer -->