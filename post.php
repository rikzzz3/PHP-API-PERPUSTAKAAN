<?php
header('Content-Type: application/json; charset=utf8');
include "./koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['language']) && isset($_POST['copiesavailable'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $language = $_POST['language'];
        $copiesavailable = $_POST['copiesavailable'];
        $sql = "INSERT INTO databuku (title, author, language, copiesavailable) VALUES ('$title', '$author', '$language', '$copiesavailable')";
        $cek = mysqli_query($koneksi, $sql);

        if ($cek) {
            $data = [
                'status' => "berhasil"
            ];
            echo json_encode([$data]);
        } else {
            $data = [
                'status' => "gagal"
            ];
            echo json_encode([$data]);
        }
    } else {
        $data = [
            'status' => "invalid_request"
        ];
        echo json_encode([$data]);
        exit;
    }
    
}
?>