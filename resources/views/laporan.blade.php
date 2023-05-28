@extends('layouts.template')
@section('content')
<h1>Cetak Transaksi</h1>
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
                        $no=1;
                    ?>
                    @foreach($data_laporan as $dr)
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