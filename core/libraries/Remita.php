<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -----------------------------------------------------
| Description: 	    Remita Payment Gateway Integration Library
| -----------------------------------------------------
| Language :        PHP - CodeIgniter Framework
| -----------------------------------------------------
| AUTHOR:			Dennis Obi
| -----------------------------------------------------
| Contributor:		Sunday Okoi, Emmanuel Etti
| -----------------------------------------------------
| EMAIL:			cobidennis@yahoo.com
| -----------------------------------------------------
| LICENCE:			MIT Licence
| -----------------------------------------------------
*/


	class Remita{

		//These url are for the live server and to be used after all testing has been done and you are ready to go live
		private $SPLIT_GATEWAYURL = "https://login.remita.net/remita/ecomm/split/init.reg"; //split payment url

		private $GATEWAYRRRPAYMENTURL = "https://login.remita.net/remita/ecomm/finalize.reg";//split payment gateway url

		private $SPLIT_CHECKSTATUSURL= "https://login.remita.net/remita/ecomm";//SPLIT PAYMENT CHECK STATUS URL

		private $CHECKSTATUSURL = "https://login.remita.net/remita/ecomm/merchantId/RRR/hash/status.reg";//normal payment check status url

		private $GATEWAYURL = "http://www.remitademo.net/remita/ecomm/v2/init.reg";//normal payment url


		/* This is the demo url.......to be used for demo purposes only
		private $SPLIT_GATEWAYURL = "http://www.remitademo.net/remita/ecomm/v2/init.reg"; //split payment url

		private $GATEWAYRRRPAYMENTURL = "http://www.remitademo.net/remita/ecomm/finalize.reg";//split payment gateway url

		private $SPLIT_CHECKSTATUSURL= "http://www.remitademo.net/remita/ecomm";//SPLIT PAYMENT CHECK STATUS URL

		private $CHECKSTATUSURL = "http://www.remitademo.net/remita/ecomm";//normal payment check status url

		private $GATEWAYURL = "http://www.remitademo.net/remita/ecomm/v2/init.reg";//normal payment url
		*/


		private $status_msg = "";

		private $status_code = "";

		//get the merchant ID
		private function get_merchantID(){
			return $this->merchantID;
		}

		//set the merchant ID
		public function set_merchantID($id){
			$this->merchantID = $id;
		}

		//get the merchant ID
		private function get_api_key(){
			return $this->api_key;
		}

		//set the merchant ID
		public function set_api_key($key){
			$this->api_key = $key;
		}

		//get the merchant ID
		private function get_service_typeID(){
			return $this->service_typeID;
		}

		//set the merchant ID
		public function set_service_typeID($id){
			$this->service_typeID = $id;
		}

		//get method for amount
		private function get_total_amount()
		{
			return $this->total_amount;
		}

		//set method for the total amount
		public function set_total_amount($amt)
		{
			$this->total_amount = $amt;
		}
		//get method for payer name
		private function get_payer_name()
		{
			return $this->payer_name;
		}

		//set method for the payer_name
		public function set_payer_name($name)
		{
			$this->payer_name = $name;
		}
		//get method for payer email
		private function get_payer_email()
		{
			return $this->payer_email;
		}

		//set method for the payer email
		public function set_payer_email($email)
		{
			$this->payer_email = $email;
		}

		//get method for payer phone
		private function get_payer_phone()
		{
			return $this->payer_phone;
		}

		//set method for the payer details
		public function set_payer_phone($phone)
		{
			$this->payer_phone = $phone;
		}

		//get method for number of beneficiaries
		private function get_beneficiary_number(){
			return $this->beneficiary_number;
		}

		public function set_beneficiary_number($bn){
			$this->beneficiary_number = $bn;
		}

		//get method for beneficiaries
		private function get_beneficiaries(){
			return $this->beneficiaries;
		}

		public function set_beneficiaries($ben){
			$this->beneficiaries = $ben;
		}

		//get method for payment type
		private function get_payment_type()
		{
			return $this->payment_type;
		}

		//set method for the payment type
		public function set_payment_type($type)
		{
			$this->payment_type = $type;
		}
		//get method for payment type
		private function get_responseurl()
		{
			return $this->responseurl;
		}

		//set method for the payment type
		public function set_responseurl($url)
		{
			$this->responseurl = $url;
		}

		//get method for order ID
		private function get_orderID()
		{
			return $this->orderID;
		}

		//set method for the orderID
		public function set_orderID($orderID)
		{
			$this->orderID = $orderID;
		}

		//get method for payment description
		private function get_payment_descr()
		{
			return $this->descr;
		}

		//set method for the payment description
		public function set_payment_descr($descr)
		{
			$this->descr = $descr;
		}


		function line_items($ben_num, $orderID, $ben){
			$lines = array();
			for($i=0; $i<$ben_num; $i++){
				$id = $i + 1;
				$lines[] = '{"lineItemsId":"' . $id . $orderID  . '","beneficiaryName":"' . $ben[$i]['account_name'] . '","beneficiaryAccount":"' . $ben[$i]['account_number'] . '","bankCode":"' . $ben[$i]['bank_code'] . '","beneficiaryAmount":"' . $ben[$i]['amount'] . '","deductFeeFrom":"' . $ben[$i]['deduct'] .'"}';
			}
			$lines = implode(',', $lines);
			return $lines . ']}';
		}


		/*
		* intval() was removed. This function rounded up decimals for total amount
		* e.etti
		* 23/8/2016
		*/
		public function get_content(){

			$beneficiaries = $this->get_beneficiaries();
			$beneficiary_number = $this->get_beneficiary_number();
			$totalAmount = $this->get_total_amount();
			$orderID = $this->get_orderID();
			$description = $this->get_payment_descr();
			$responseurl = $this->get_responseurl();
			$merchant_id = $this->get_merchantID();
			$api_key = $this->get_api_key();
			$service_typeID = $this->get_service_typeID();
			$hash_string = $merchant_id . $service_typeID . $orderID . $totalAmount . $responseurl . $api_key;
			$hash = hash('sha512', $hash_string);

			//The JSON data.
			$part = '{"merchantId":"'. $merchant_id
			.'"'.',"serviceTypeId":"'.$service_typeID
			.'"'.",".'"totalAmount":"'.$totalAmount
			.'","hash":"'. $hash
			.'","description":"'. $description
			.'"'.',"orderId":"'.$orderID
			.'"'.",".'"responseurl":"'.$responseurl
			.'","payerName":"'. $this->get_payer_name()
			.'"'.',"payerEmail":"'.$this->get_payer_email()
			.'"'.",".'"payerPhone":"'.$this->get_payer_phone()
			.'","lineItems":[';

			$line_items = $this->line_items($beneficiary_number, $orderID, $beneficiaries);

			return (string)$part . $line_items;
		}

		public function execute_remita(){

			$params = $this->get_content();
			//return $params; exit;
			//var_dump($params); die;
			//exit;
			$response = $this->remita_connect($params);
			$type = $this->get_payment_type();

			return $this->remita_response($response);
		}

		private function remita_response($res){
			$jsonData = substr($res, 6, -1);
			$response = json_decode($jsonData, true);
			//return trim($response['RRR']);
			return $response;
		}

		public function remita_connect($content){

			$curl = curl_init($this->SPLIT_GATEWAYURL);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

			// var_dump($json_response); die; //= 400;
			if($status == 200){
				return $json_response;
			}else{
				return false;
			}

		}

		public function remita_status(){

			$curl = curl_init($this->SPLIT_GATEWAYURL);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
			curl_setopt($curl, CURLOPT_POST, true);
			//curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

			//return $status;

			$jsRes = substr($json_response, 6, -1);
			$res = json_decode($jsRes,true);
			// var_dump($status);

			$alert = trim($res['statuscode']," ");
			//var_dump($alert);
			curl_close($curl);

			if($alert == "025"){
				if($status == 200)
					return $json_response;
				elseif($status == 404)
					return $status;
			}elseif($alert != "025" || $status == "404"){
				//return 'status='.$status.'&statuscode='.$alert;
				return $json_response;
			}

		}

		//This functions confirms that the transaction was succesful
		public function remita_transaction_details($orderId){

			$concatString = $orderId . $this->get_api_key() . $this->get_merchantID();
			$hash = hash('sha512', $concatString);
			$url 	= $this->SPLIT_CHECKSTATUSURL . '/' . $this->get_merchantID()  . '/' . $orderId . '/' . $hash . '/' . 'orderstatus.reg';
			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$result=curl_exec($ch);
			// Closing
			curl_close($ch);
			$response = json_decode($result, true);
			return $response;
		}

		public function remita_rrr_transaction_details($rrr){

			//http://www.remitademo.net/remita/ecomm/merchantId/RRR/hash/status.reg

			$concatString = $rrr . $this->get_api_key() . $this->get_merchantID();
			$hash = hash('sha512', $concatString);
			$url 	= $this->SPLIT_CHECKSTATUSURL . '/' . $this->get_merchantID()  . '/' . $rrr . '/' . $hash . '/' . 'status.reg';
			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$result=curl_exec($ch);
			// Closing
			curl_close($ch);
			$response = json_decode($result, true);
			return $response;
		}

	}

/* End of file Remita.php */
