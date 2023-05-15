@extends('layouts.template')
@section('content')
<h1>Data User</h1>
<br>
<div class="card">
    <div class="card-body">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tr align="center">
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Hobi</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <!-- Menampilkan Data User -->
                    <?php
                    $no = 1;
                    ?>
                    @foreach($data_user as $du)
                    <tr align="center">
                        <td><?php echo $no; ?></td>
                        <td>{{$du->id}}</td>
                        <td>{{$du->nama}}</td>
                        <td>{{$du->email}}</td>
                        <td>{{$du->hobi}}</td>
                        <td>
                            <a href="#"><input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusUser<?= $no ?>" value="Hapus"></a>
                        </td>


                        <!-- Modal Hapus Kategori-->
                        <div class="modal fade" id="modalHapusUser<?= $no ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus User
                                        </h1>
                                    </div>
                                    <form action="/user/destroy" method="POST">
                                    @method('POST')    
                                    @csrf
                                        <input type="hidden" name="iduser" value="{{$du->id}}">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Ingin Menghapus {{$du->nama}}
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary"
                                                name="hapus_user">Hapus</button>
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
        </div>
    </div>
</div>
</div>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
</body>

</html>
@endsection