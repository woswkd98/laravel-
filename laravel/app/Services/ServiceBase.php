<?php



namespace App\Services;
interface ServiceBase {
    public function create(array $datas) ;
    public function update($id);
    public function delete($id);
    public function findByKey($id);
}
?>
