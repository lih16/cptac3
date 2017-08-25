<?php
use Lib\model_base;

class Tumor_Model extends model_base {
	 public function __construct($stable=NULL,$aColumns=NULL, $sIndexColumn=NULL){
       parent::__construct(NULL, NULL, NULL);
    }
	function getTumor(){
        $result="";
	    $this->db = Db::getInstance();
		$sQuery="select distinct cancer from kb_CancerVariant_Curation.CVC_cancer_gene_var";
		$stmt = $this->db->prepare($sQuery);
		try{
		    $stmt->execute();
		}
		catch (PDOException $e){
			//write_log($e->getMessage());
			echo $e->getMessage();
        }
		$rResult = $stmt->fetchAll();
		foreach($rResult as $aRow){
			$result = $result.$aRow[0]."\n";
		}
		return $result;

	}
	function getGenes(){
		$cancer=$_POST["cancer"];


        $result="";
	    $this->db = Db::getInstance();
		$sQuery="select distinct gene from kb_CancerVariant_Curation.CVC_cancer_gene_var where cancer='".$cancer."'";
		$stmt = $this->db->prepare($sQuery);
		try{
		    $stmt->execute();
		}
		catch (PDOException $e){
			//write_log($e->getMessage());
			echo $e->getMessage();
        }
		$rResult = $stmt->fetchAll();
		foreach($rResult as $aRow){
			$result = $result.$aRow[0]."\n";
		}
		return $result;

	}
	function getGeneMutations(){
		$result="";
		$cancer=$_POST["cancer"];
		$gene=$_POST["gene"];
        $this->db = Db::getInstance();
		$sQuery="select distinct var from kb_CancerVariant_Curation.CVC_cancer_gene_var where cancer='".$cancer."' and gene='".$gene."'";
        $stmt = $this->db->prepare($sQuery);
		try{
		    $stmt->execute();
		}
		catch (PDOException $e){
			//write_log($e->getMessage());
			echo $e->getMessage();
        }
		$rResult = $stmt->fetchAll();
		foreach($rResult as $aRow){
			$result = $result.$aRow[0]."\n";
		}
		return $result;

	}
}


?>