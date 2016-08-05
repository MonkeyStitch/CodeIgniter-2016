
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * This model contain common function used in any module, any other model
 * extend from this model and this model extend from CI_Model
 * 
 * Example
 * 
 * class Home_model extends MM_Model {
 * 
 * 		function ...()
 * 		{
 * 
 * 		}
 * }
 * 
 */

class MY_Model extends CI_Model {
	
	function __construct()
    {
    	
        parent::__construct();
    }
    
	/*
	 * @param	$sTableName		string		table name
	 * @param	$aInsertData	array		array add data (ex. $aData = array('Column1'=>'Value1', 'Column2'=>'Value2')
	 * @return					int
	 */
	function insert($sTableName, $aInsertData)
	{
		#Trim all input data
		foreach ($aInsertData as $key => $value) {
			$aInsertData[$key] = trim($value);
		}
		
		$this->db->insert($sTableName, $aInsertData);
		return $this->db->insert_id();
	}
}

/* End of file Module_model.php */
/* Location: ./application/libraries/Module_model.php */