<?php 

namespace App\Models;
use CodeIgniter\Model;

class Ibu_Hamil_Model extends Model {

    protected $db, $builder;

    public function __construct() {
        
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('ibu_hamil');
    }

    public function getData ($nik_ibu_hamil = false) {
        if ($nik_ibu_hamil === false) {
            return $this->table('ibu_hamil')
                        ->get()
                        ->getResultArray();    
        }
        else {
            return $this->table('ibu_hamil')
                        ->where('nik_ibu_hamil', $nik_ibu_hamil)
                        ->get()
                        ->getRowArray();
        }
    }

    public function addData($data) {
       
        $this->builder->insert($data);
     }
     
     public function updateData($nik_ibu_hamil, $data) {
        
        $this->builder->where('nik_ibu_hamil', $nik_ibu_hamil);
        $this->builder->update($data);
 
     }
 
     public function deleteData($nik_ibu_hamil) {
        
        $this->builder->where('nik_ibu_hamil', $nik_ibu_hamil);
        $this->builder->delete();
 
     }
}

?>