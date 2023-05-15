@extends('layouts.template')
include 'sesautu.php'
@section('content')
<h1>Riwayat Transaksi</h1>
<br>
<div class="card">
    <div class="card-body">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tr align="center">
                        <th>No</th>
                        <th>Id Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Total Harga</th>
                        <th>Nama Pembeli</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        // include 'database/koneksi.php';
                        // $transaksi = "SELECT * FROM transaksi JOIN detail_transaksi ON transaksi.id=detail_transaksi.id_transaksi GROUP BY transaksi.id";
                        // $result = mysqli_query($koneksi, $transaksi);
                        // $no = 1;
                        // while ($row = mysqli_fetch_array($result)) {
                        //     $id = $row['id'];
                        //     $tgl = $row['tgl_transaksi'];
                        //     $total = $row['total_harga'];
                        //     $iduser = $row['id_akun'];

                        //     $akun = "SELECT * FROM akun WHERE id = '$iduser'";
                        //     $result2 = mysqli_query($koneksi, $akun);
                        //     while ($row = mysqli_fetch_array($result2)) {
                        //         $namauser = $row['nama'];
                        //         $color = ($no % 2 == 1) ? "white" : "#eee";

                        // 
                        $server = "localhost";
                        $username = "root";
                        $password = "";
                        $db = "db_shedenk";
                        $koneksi = mysqli_connect($server, $username, $password, $db);
                        
                        if (mysqli_connect_errno()) {
                            echo "Koneksi gagal : " . mysqli_connect_error();
                        }
                        ?>
                    <?php
                        $no=1;
                    ?>
                    @foreach($data_riwayat as $dr)
                    <tr align="center">
                        <td><?php echo $no; ?></td> 
                        <td>{{$dr->id_transaksi}}</td>
                        <td>{{$dr->tgl_transaksi}}</td>
                        <td>{{$dr->total_harga}}</td>
                        <td>{{$dr->nama}}</td>
                        <td>
                            <a href="#"><input type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalDetailTransaksi" onclick="dataId('{{$dr->id_transaksi}}')"
                                    value="Detail">
                            </a>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
</body>
<!-- Modal Detail Transaksi -->
<div class="modal fade" id="modalDetailTransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Transaksi</h1>
            </div>
            <div class="modal-body">
                <div id="data_id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Detail Transaksi -->
<script type="text/javascript">
function dataId(a) {
    $.ajax({
        type: 'POST',
        url: 'transaksi.php',
        data: {
            id: a
        },
        success: function(response) {
            $('#data_id').html(response);
        }
    });
}
</script>
@endsection