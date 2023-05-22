@extends('layouts.template')
@section('content')
<h1>Antrian Transaksi</h1>
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
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no=1;
                    ?>
                    @foreach($data_antrian as $da)
                    <tr align="center">
                        <td><?php echo $no; ?></td>
                        <td>{{$da->id_transaksi}}</td>
                        <td>{{$da->tgl_transaksi}}</td>
                        <td>{{$da->total_harga}}</td>
                        <td>{{$da->nama}}</td>
                        <td>
                            <a href="#"><input type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalDetailTransaksi" onclick="dataId('{{$da->id_transaksi}}')"
                                    value="Detail">
                            </a>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-4">
                                <input type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalTambahAntrian<?= $no ?>" value="Tambah">
                                </div>
                                <div class="modal fade" id="modalTambahAntrian<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Antrian
                                        </h1>
                                    </div>
                                    <form action="/antrian/store" method="POST">
                                    @method('POST')    
                                    @csrf
                                    <?php
                                    // $dataantrian[] = array(
                                    //     for(int )
                                    // )
                                    ?>
                                        <input type="hidden" name="id_antrian" value="{{$da->id_transaksi}}">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Ingin Menambah {{$da->id_transaksi}}?
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="tambah_antrian">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                                <div class="col-4">
                                    <input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalHapusAntrian<?= $no ?>" value="Hapus">
                                </div>
                                <div class="modal fade" id="modalHapusAntrian<?= $no ?>" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Antrian
                                                </h1>
                                            </div>
                                            <form action="/antrian/destroy" method="POST">
                                                @method('POST')
                                                @csrf
                                                <input type="hidden" name="idtransaksi" value="{{$da->id_transaksi}}">
                                                <div class="modal-body">
                                                    <h5 class="text-center">Apakah Anda Ingin Menghapus {{$da->id_transaksi}}?
                                                    </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        name="hapus_kategori">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        url: 'antrian.php',
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