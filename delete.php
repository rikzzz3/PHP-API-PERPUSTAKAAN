<?php
header('Content-Type: application/json; charset=utf8');
include "./koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM databuku WHERE id='$id'";
        $cek = mysqli_query($koneksi, $sql);

        if ($cek && mysqli_affected_rows($koneksi) > 0) {
            $data = [
                'status' => "berhasil"
            ];
            echo json_encode([$data]);
        } else {
            $data = [
                'status' => "gagal",
                'message' => "ID $id tidak ditemukan"
            ];
            echo json_encode([$data]);
        }
    } else {
        $data = [
            'status' => "gagal",
            'message' => "Missing required parameter: id"
        ];
        echo json_encode([$data]);
    }
}
?>