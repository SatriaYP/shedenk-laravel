<html>

<?php
$id = $_POST['id'];
echo $id;
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <tr align="center">
                <th>No</th>
                <th>Id Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
            </tr>

            <?php
            
            $server = "localhost";
            $username = "root";
            $password = "";
            $db = "db_shedenk";
            $koneksi = mysqli_connect($server, $username, $password, $db);
            
            if (mysqli_connect_errno()) {
                echo "Koneksi gagal : " . mysqli_connect_error();
            }
            $detail = "SELECT * FROM detail_transaksi WHERE id_transaksi = '$id' ";
            $result = mysqli_query($koneksi, $detail);
            $no = 1;
            while ($row = mysqli_fetch_array($result)) {

                $idpr = $row['id_produk'];

                $produk = "SELECT * FROM produk WHERE id = '$idpr' ";
                $result2 = mysqli_query($koneksi, $produk);
                while ($row = mysqli_fetch_array($result2)) {
                    $nampro = $row['nama'];
                    $katpro = $row['id_kategori'];
                    $hrg = $row['harga'];

                    $kate = "SELECT * FROM kategori WHERE id = '$katpro' ";
                    $result3 = mysqli_query($koneksi, $kate);
                    while ($row = mysqli_fetch_array($result3)) {
                        $namkat = $row['nama'];
            ?>
            <tr align="center">
                <td><?php echo $no; ?></td>
                <td><?php echo $idpr; ?></td>
                <td><?php echo $nampro; ?></td>
                <td><?php echo $namkat; ?></td>
                <td><?php echo "Rp. ".$hrg; ?></td>
            </tr>
            <?php
                        $no++;
                    }
                }
            } ?>

        </table>
    </div>
</div>
</div>

</html>