<!DOCTYPE html>
<html>
<body>
 <form action="">
<input type="text" id="nama" value="aku" onchange="cetak()"/>
<input type="text" id="hasil">
<button type="button" onclick="cetak()">Cetak</button>
</form>
<script>
function cetak() {
    var nama = document.getElementById("nama").value ;
    document.getElementById("hasil").value=nama;
}
</script>
</body>
</html>