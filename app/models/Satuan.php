<?php
Class Satuan{
	function getSatuan(){
        try {
            $sql = "SELECT 
                   	* 
                    FROM 
                    satuan";
            $prep = DB::connection()->prepare($sql);
            $prep->execute();

            if($prep->rowCount()){
                return $prep->fetchAll(PDO::FETCH_OBJ);
            }

            return false;

        } catch (PDOException $e) {
            return false;
        }
    }
}
?>