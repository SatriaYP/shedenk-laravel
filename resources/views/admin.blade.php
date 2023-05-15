@extends('layouts.template')
@section('content')
<h1>Data Admin</h1>
<br>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalTambahAdmin">+
                    Tambah Data</button>
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
                        <th>Email</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php
                        $no=1;
                        ?>
                    <!-- Menampilkan Data Admin -->
                    @foreach($data_admin as $da)
                    <tr align="center">
                        <td><?php echo $no; ?></td>
                        <td>{{$da->id}}</td>
                        <td>{{$da->nama}}</td>
                        <td>{{$da->email}}</td>
                        <td>
                            <a href="#"><input type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalEditAdmin<?= $no ?>" value="Edit"></a>
                            <a href="#"><input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusAdmin<?= $no ?>" value="Hapus"></a>
                        </td>

                        <!-- Modal Edit Admin -->
                        <div class="modal fade" id="modalEditAdmin<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Admin</h1>
                                    </div>
                                    <form action="/admin/update" method="POST">
                                    @method('POST')    
                                    @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Id Admin</label>
                                                <input type="text" class="form-control" value="{{$da->id}}"
                                                    name="tid_editadmin" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Admin</label>
                                                <input type="text" class="form-control" value="{{$da->nama}}"
                                                    name="tnama_editadmin" placeholder="Masukan Nama" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" value="{{$da->email}}"
                                                    name="temail_editadmin" placeholder="Masukan Email" readonly>
                                            </div>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <label class="form-label">Password</label>
                                                    <input type="hidden" name="pass" value="">
                                                    <input type="password" class="form-control"
                                                        value="{{$da->password}}" name=" tpass_editadmin"
                                                        placeholder="Masukan Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="simpan_editadmin">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit Admin -->

                        <!-- Modal Hapus Kategori-->
                        <div class="modal fade" id="modalHapusAdmin<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Admin
                                        </h1>
                                    </div>
                                    <form action="/admin/destroy" method="POST">
                                    @method('POST')    
                                    @csrf
                                        <input type="hidden" name="idadmin" value="{{$da->id}}">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Ingin Menghapus {{$da->nama}}?
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="hapus_admin">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Hapus Kategori -->
                    </tr>
                    </tr>
                    <?php
                            $no++;
                        ?>
                    @endforeach
                </table>
            </div>
            <!-- Modal Tambah Admin -->
            <div class="modal fade" id="modalTambahAdmin" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Admin</h1>
                        </div>

                        <form action="/admin/store" method="POST">
                        @method('POST')
                        @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Id Admin</label>
                                    <input type="text" class="form-control" value="{{$id_admin}}"
                                        name="tid_tambahadmin" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Admin</label>
                                    <input type="text" class="form-control" name="tnama_tambahadmin"
                                        placeholder="Masukan Nama" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="temail_tambahadmin"
                                        placeholder="Masukan Email" required>
                                </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name=" tpass_tambahadmin" placeholder="Masukan Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary"
                                    name="simpan_tambahadmin">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Admin -->
        </div>
    </div>
</div>
</div>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
@endsection