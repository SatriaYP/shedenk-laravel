@extends('layouts.template')
@section('content')
    <button type="button" class="btn-close mt-0" data-bs-dismiss="alert"></button>
</div>
<h1>Master Produk</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <!-- btn_tambah atau modalTambahProduk di ID-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalTambahProduk">+
                    Tambah Data</button>
                <!-- BUTTON BAWAH CONTOH -->
                <div class="modal fade" id="modalTambahProduk" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/produk/store" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Id Produk</label>
                                        <input type="text" class="form-control" value="{{$id_produk}}" name="id_produk"
                                            readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama_produk"
                                            placeholder="Masukkan Nama Produk">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-select" name="id_kategori">
                                            <option>Pilih Kategori</option>
                                            @foreach($data_kategori as $kategori)
                                            <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="harga" class="form-label">Harga</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" name="harga" aria-label="rupiah">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Masukkan deskripsi produk"
                                                id="deskripsi" style="height: 100px" name="deskripsi" value="Deskripsi"></textarea>
                                                <label for="floatingTextarea2">Deskripsi</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" id="foto" name="foto[]" onchange="preview_image();"
                                            multiple />
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="preview" class="form-label">Preview</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="image_preview"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary"
                                        name="simpan_tambahproduk">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END BUTTON BAWAH CONTOH -->
                <!-- <button type="submit" name="btn_tambah" class="btn btn-primary">+ Tambah Data</button> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
                <table class="table">
                    <?php
                        $no=1;
                        ?>
                    <tr align="center">
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <!-- Menampilkan Data -->
                    @foreach($data_produk as $dp)
                    <tr align="center">
                        <td><?php echo $no; ?></td>
                        <td>{{$dp->id}}</td>
                        <td>{{$dp->nama}}</td>
                        <td><?php //echo $kategori?>
                            @foreach($data_kategori as $dk)
                            @if ($dp->id_kategori===$dk->id)
                            {{$dk->nama}}
                            @endif
                            @endforeach
                        </td>
                        <td>Rp. {{$dp->harga}}</td>
                        <td>{{$dp->deskripsi}}</td>
                        <?php if($dp->status=="Tersedia"){
                            echo '<td><button class="btn btn-success btn-sm">Tersedia</button></td>';
                        }else {
                            echo '<td><button class="btn btn-danger btn-sm">Terjual</button></td>';
                        }?>
                        <td>
                            <a href="#"><input type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalGambarProduk<?= $no ?>" value="View"></a>
                        </td>
                        <td>
                            <a href="#"><input type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalEditProduk<?= $no ?>" value="Edit"></a>
                            <a href="#"><input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusProduk<?= $no ?>" value="Hapus"></a>
                        </td>
                        <!-- Modal View -->

                        <div class="modal fade" id="modalGambarProduk<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="col-6">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Gambar Produk
                                            </h1>
                                        </div>
                                        <div class="position-relative">
                                            <div class="col-6 position-relative top-0 end-0">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            @foreach($data_gambar as $dg)
                                            @if($dg->id_produk===$dp->id)
                                            <div class='col-5 m-3'><img src='upload/{{$dg->nama}}'></div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Modal View -->
                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEditProduk<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Produk</h1>
                                    </div>
                                    <form action="/produk/update" method="POST">
                                        @method('POST')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Id</label>
                                                <input type="text" class="form-control" value="{{$dp->id}}"
                                                    name="tid_editproduk" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="tnama_editproduk"
                                                    value="{{$dp->nama}}" placeholder="Masukan Nama Produk" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-select" name="tkategori_editproduk">
                                                    @foreach($data_kategori as $dk)
                                                    @if ($dp->id_kategori===$dk->id)
                                                    <option value="{{$dk->id}}" selected>{{$dk->nama}}</option>
                                                    @else
                                                    <option value="{{$dk->id}}">{{$dk->nama}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="harga" class="form-label">Harga</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rp</span>
                                                <input type="text" class="form-control" name="tharga_editproduk"
                                                    aria-label="rupiah" value="{{$dp->harga}}">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" style="height: 100px"
                                                        name="tdeskripsi_editproduk">{{$dp->deskripsi}}</textarea>
                                                    <label for="floatingTextarea2">Deskripsi</label>
                                                </div>
                                            </div>
                                            <fieldset name="tstatus_editproduk">
                                                <label for="status" class="form-label">Status</label>
                                                @if($dp->status==="Tersedia")
                                                <div>
                                                    <input type='radio' id='tersedia' name='tstatus_editproduk'
                                                        value='Tersedia' checked>
                                                    <label for='tersedia'>Tersedia</label>
                                                </div>
                                                <div>
                                                    <input type='radio' id='terjual' name='tstatus_editproduk'
                                                        value='Terjual'>
                                                    <label for='terjual'>Terjual</label>
                                                </div>
                                                @else
                                                <div>
                                                    <input type='radio' id='tersedia' name='tstatus_editproduk'
                                                        value='Tersedia'>
                                                    <label for='tersedia'>Tersedia</label>
                                                </div>
                                                <div>
                                                    <input type='radio' id='terjual' name='tstatus_editproduk'
                                                        value='Terjual' checked>
                                                    <label for='terjual'>Terjual</label>
                                                </div>
                                                @endif
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="simpan_editproduk"
                                                id="liveAlertBtn">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END Modal Gambar Hapus -->
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="modalHapusProduk<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Produk</h1>
                                    </div>
                                    <form action="/produk/destroy" method="POST">
                                    @method('POST')    
                                    @csrf
                                        <input type="hidden" name="idproduk" value="{{$dp->id}}">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Ingin Menghapus {{$dp->nama}}?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="hapus_produk">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus End -->
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
<script>
function preview_image() {
    var total_file = document.getElementById("foto").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append("<div class='col-4 mt-3'><img src='" + URL.createObjectURL(event.target.files[
            i]) + "'></div>");
    }
}
//     function preview_image() 
// {
//  var total_file=document.getElementById("upload_file").files.length;
//  for(var i=0;i<total_file;i++)
//  {
//   $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
//  }
// }
</script>
@endsection