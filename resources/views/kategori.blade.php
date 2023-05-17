@extends('layouts.template')
@section('content')
<?php
// dd(session()->all());
?>
<h1>Master Kategori</h1>
<br>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalTambahKategori">+ Tambah Data</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tr align="center">
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    
                    <?php
                    $no = 1;
                    // dd($data_kategori);
                    ?>
                    @foreach($data_kategori as $dk)
                    <tr align="center">
                        <td><?php echo $no; ?></td>
                        <td>{{$dk->id}}</td>
                        <td>{{$dk->nama}}</td>
                        <td>
                            <a href="#"><input type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalEditKategori<?= $no ?>" value="Edit"></a>
                            <a href="#"><input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusKategori<?= $no ?>" value="Hapus"></a>
                        </td>
                        <!-- Modal Edit Kategori-->
                        <div class="modal fade" id="modalEditKategori<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kategori</h1>
                                    </div>
                                    <form action="/kategori/update" method="post">
                                    @method('POST')    
                                    @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Id Kategori</label>
                                                <input type="text" class="form-control" value='{{$dk->id}}'
                                                    name="tid_editkategori" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kategori</label>
                                                <input type="text" class="form-control" name="tnama_editkategori"
                                                    value="{{$dk->nama}}" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="simpan_editkategori">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit Kategori -->

                        <!-- Modal Hapus Kategori-->
                        <div class="modal fade" id="modalHapusKategori<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kategori
                                        </h1>
                                    </div>
                                    <form action="/kategori/destroy" method="POST">
                                    @method('POST')    
                                    @csrf
                                        <input type="hidden" name="idkategori" value="{{$dk->id}}">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Ingin Menghapus {{$dk->nama}}?
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
                        <!-- End Modal Hapus Kategori -->
                    </tr>
                    <?php
                    $no++;
                    ?>
                    @endforeach
                </table>
            </div>

            <!-- Modal Tambah Kategori-->
            <div class="modal fade" id="modalTambahKategori" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
                        </div>

                        <!-- Auto Generate Id Kategori-->
                        <form action="/kategori/store" method="POST">
                            @method('POST')
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Id Kategori</label>
                                    <input type="text" class="form-control" value="{{$id_kategori}}"
                                        name="tid_tambahkategori" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" name="tnama_tambahkategori"
                                        placeholder="Masukan Nama" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary"
                                    name="simpan_tambahkategori">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Kategori -->
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
@endsection