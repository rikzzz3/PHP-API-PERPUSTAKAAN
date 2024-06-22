<?php
header('Content-Type: application/json; charset=utf8');
include "./koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $author = $_GET['author'];
    $language = $_GET['language'];
    $copiesavailable = $_GET['copiesavailable'];

    $sql = "UPDATE databuku SET title='$title', author='$author', language='$language', copiesavailable='$copiesavailable' WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if ($cek) {
        if (mysqli_affected_rows($koneksi) > 0) {
            $data = [
                'status' => "berhasil"
            ];
            echo json_encode([$data]);
        } else {
            $data = [
                'message' => "ID $id tidak ditemukan"
            ];
            echo json_encode([$data]);
        }
    } else {
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}
?>