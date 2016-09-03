<?php
class Idcard_model extends CI_Model {


        public function __construct()
        {
                parent::__construct();
        }

		public function check_idcard($id)
		{
			$client = new SoapClient('https://rdws.rd.go.th/serviceRD3/checktinpinservice.asmx?wsdl');
 
			$params = array(
				'sequence' => array(
					'username' => 'anonymous',
					'password' => 'anonymous',
					'TIN' => $id,
					),
			);
			 
			$ret = $client->__call('ServiceTIN', $params);
			 
			if( !isset( $ret->ServiceTINResult->vMessageErr->anyType ) ){
				return true;
			}  else {
				return false;
			}
		}

		public function check_idcard2($idcard)
		{
			$url="http://eservice.dopa.go.th/Election/Elecenter/interenqabs/detailList.php";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS,"eletype=&subtype=&flagEletype=&eledate=&rcode=&rcode_desc=&emp_name=&emp_pid=&PID=&ELETYPE=&ELEDATE=&TITLE=&FNAME=&MNAME=&LNAME=&SEX=&DOB=&HID=&RCODE=&CCAATT_DESC=&EAREA=&EUNIT=&VRCODE=&INF_DOCNO=&INF_DATE=&INF_FLAG=&INF_CAUSE=&VERIFY_ID=&SELECT_FLAG=&UPD_DATETIME=&DB_FOUND=&txtPid=".$idcard."&cntRec=1");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			curl_close($ch);

			$data=explode("</table>",$response);
			$content=trim(strip_tags($data[0]));
			$contents=explode("&nbsp;",$content);
			$result=array();
			if(isset($contents[8]))
			{
				$result["code"]="success";
				$result["id"]=$contents[2];
				$result["name"]=$contents[8];
			}
			else
			{
				$result["code"]="error";
				$result["msg"]="not found ID Card.";
			}
			return $result;
		}


}