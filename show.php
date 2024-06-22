<?php
header('Content-Type: application/json; charset=utf8');
include "./koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM databuku WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $array_data = array();
        while($data = $result->fetch_assoc()){
            $array_data[] = $data;
        }
        echo json_encode($array_data);
    } else {
        $sql = "SELECT * FROM databuku";
        $query = mysqli_query($koneksi, $sql);
        $array_data = array();
        while($data = mysqli_fetch_assoc($query)){
            $array_data[] = $data;
        }
        echo json_encode($array_data);
    }
}
?>