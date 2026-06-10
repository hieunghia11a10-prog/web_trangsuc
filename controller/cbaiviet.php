<?php
include_once("model/mBaiviet.php");

class cBaiviet {

    function getAll() {
        $m = new mBaiviet();
        return $m->getAll();
    }

    function getById($id) {
        $m = new mBaiviet();
        return $m->getById($id);
    }

    function insert($tieude, $noidung, $hinhanh) {
        $m = new mBaiviet();
        return $m->insert($tieude, $noidung, $hinhanh);
    }

    function update($id, $tieude, $noidung, $hinhanh) {
        $m = new mBaiviet();
        return $m->update($id, $tieude, $noidung, $hinhanh);
    }

    function delete($id) {
        $m = new mBaiviet();
        return $m->delete($id);
    }
}
?>