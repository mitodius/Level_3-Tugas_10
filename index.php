<?php
    require_once "conn.php";
    $result = mysqli_query($connect, "SELECT * FROM produk");
?>

<html>
    <head>
        <title>HALAMAN AWAL</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".edit").click(function(event) {
                    event.preventDefault();
                    var currentRow=$(this).closest("tr"); 
                    var nama_produk=currentRow.find("td:eq(0)").text();
                    var ket=currentRow.find("td:eq(1)").text();
                    var harga=currentRow.find("td:eq(2)").text(); 
                    var jumlah=currentRow.find("td:eq(3)").text(); 
                    document.getElementById("editproduk").value = nama_produk;
                    document.getElementById("editketerangan").value = ket;
                    document.getElementById("editharga").value = harga;
                    document.getElementById("editjumlah").value = jumlah;
                })
                $("#add").click(function(event) {
                    event.preventDefault(); 
                    var namaproduk = document.getElementById("editproduk").value;
                    var ktr=document.getElementById("editketerangan").value;
                    var harga = document.getElementById("editharga").value;
                    var jumlah= document.getElementById("editjumlah").value;
                    $.ajax({
                        type:'post',
                        url:'add.php',
                        data:{
                            nama:namaproduk,
                            ktr:ktr,
                            harga:harga,
                            jumlah:jumlah
                        },
                        success:function(data){
                            location.reload();
                        }
                    })
                })
                $("#update").click(function(event) {
                    event.preventDefault(); 
                    var namaproduk = document.getElementById("editproduk").value;
                    var ktr=document.getElementById("editketerangan").value;
                    var harga = document.getElementById("editharga").value;
                    var jumlah= document.getElementById("editjumlah").value;
                    $.ajax({
                        type:'post',
                        url:'update.php',
                        data:{
                            nama:namaproduk,
                            ktr:ktr,
                            harga:harga,
                            jumlah:jumlah
                        },
                        success:function(data){
                            location.reload();
                        }
                    })
                })
                $("#delete").click(function(event) {
                    event.preventDefault(); 
                    var namaproduk = document.getElementById("editproduk").value;
                    var ktr=document.getElementById("editketerangan").value;
                    var harga = document.getElementById("editharga").value;
                    var jumlah= document.getElementById("editjumlah").value;
                    $.ajax({
                        type:'post',
                        url:'delete.php',
                        data:{
                            nama:namaproduk,
                            ktr:ktr,
                            harga:harga,
                            jumlah:jumlah
                        },
                        success:function(data){
                            location.reload();
                        }
                    })
                })
            })
        </script>
        <style>
            .footer{
                position:absolute;
                bottom: 80px;
                right: 150px;
                left: 150px;
                width: 80%;
            }
        </style>
        <h1 class="h1 text-center text-blue">TABEL PRODUK</h1>
    </head>
    <body>
        <table class="table table-dark table-bordered table-hover text-center" style="margin:auto; width:75%">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Update/Hapus</th>
                </tr>
            </thead>
            <?php  
                while($data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$data['nama_produk']."</td>";
                    echo "<td>".$data['keterangan']."</td>";
                    echo "<td>".$data['harga']."</td>";    
                    echo "<td>".$data['jumlah']."</td>";    
                    echo "<td><button class='edit'>Edit</button></td></tr>";        
                }
            ?>
        </table>
    </body>
    <div class="footer" >
        <div class="row">
            <div class="col"><label for="editproduk">Nama Produk</label><input type="text" id="editproduk"></div>
            <div class="col"><label for="editketerangan">Keterangan</label><input type="text" id="editketerangan"></div>
            <div class="col"><label for="editharga">Harga</label><input type="text" id="editharga"></div>
            <div class="col"><label for="editjumlah">Jumlah</label><input type="text" id="editjumlah"></div>
            <div class="col"><label for="add" >Aksi</label><br><button id="add">Add</button><button id="update">Update</button><button id="delete">Delete</button></div>
        </div>
    </div>

    
</html>