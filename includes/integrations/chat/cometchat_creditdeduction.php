<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Credits{

	function __construct(){

	}

	function getCredits(){
		/**
			The function returns the current value of the credits for a loggedin user.
			The developers can modify the SQL query to retrieve the credits available with the user.
		**/
		global $userid;
		$credits = 0;

		/** TODO: Modifiable SQL query START **/
		/* The SQL query should return the credits for $userid */
		$sql = ("SELECT `credits` FROM `".TABLE_PREFIX.DB_USERTABLE."` WHERE `".DB_USERTABLE_USERID."` = '".sql_real_escape_string($userid)."'");
		/** Modifiable SQL query END **/

		$result = sql_query($sql, array(), 1);
		if($user = sql_fetch_assoc($result)){
			$credits = $user['credits'];
		}
		return $credits;
	}

	function getCreditsToDeduct($params=array()){
		/**
		    The function returns the returns the credit to deduct and the deduction interval.
			It is not recommended for the developers to modify the function.
		**/
		global $userid;
		$creditsinfo = array(
			'creditsToDeduct'=>0,
			'deductionInterval'=>0
		);

		$defaultParams = array(
			'type'=>'',
			'name'=>''
		);
		$params =  array_merge($defaultParams,$params);
		$role = !empty($params['role'])?$params['role']:$this->getRole($userid);
		$type = $params['type'];
		$name = $params['name'];
		if(!empty($role) && !empty($type) && !empty($name)){
			$rolefeature = $GLOBALS[$role.'_'.$type.($type!='core'?'s':'')];
			if(!empty($rolefeature) && !empty($rolefeature[$name]) && !empty($rolefeature[$name]['credit'])){
				$creditsinfo['creditsToDeduct'] =  $rolefeature[$name]['credit']['creditsToDeduct'];
				$creditsinfo['deductionInterval'] = $rolefeature[$name]['credit']['deductionInterval'];
			}
		}
		return $creditsinfo;
	}

	function deductCredits($params){

		/**
			The function deducts the credits in database.
			The developers can modify the query to update the deducted credits to database.
		**/

		if(!defined('ENABLED_CREDIT') && ENABLED_CREDIT==0){
			return array('errorcode'=>1,'message'=>'Credit Deduction is disabled by the Administrator.');
		}
		global $userid;
		$defaultParams = array(
			'to'=>0,
			'isGroup'=>0
		);
		$params =  array_merge($defaultParams,$params);
		$response = array('success'=> false);
		$to = $params['to'];
		$isGroup = $params['isGroup'];
		$type = $params['type'];
		$name = $params['name'];

		if(!empty($params['creditsToDeduct']) && !empty($params['deductionInterval'])){
			$creditsToDeduct = abs($params['creditsToDeduct']);
			$deductionInterval = $params['deductionInterval'];
		}else{
			$creditsinfo =  $this->getCreditsToDeduct($params);
			$creditsToDeduct = abs($creditsinfo['creditsToDeduct']);
			$deductionInterval = $creditsinfo['deductionInterval'];
		}

		/*** Set credit deduction timer ***/
		if(empty($_SESSION['cometchat'])){
			$_SESSION['cometchat'] = array();
		}
		if(empty($_SESSION['cometchat']['creditsdeductiontimer'])){
			$_SESSION['cometchat']['creditsdeductiontimer'] = array();
		}
		if(empty($_SESSION['cometchat']['creditsdeductiontimer'][$type.$name.$to.$isGroup])){
			$_SESSION['cometchat']['creditsdeductiontimer'][$type.$name.$to.$isGroup] = 0;
		}


		$availableCredits = $this->getCredits();

		if($creditsToDeduct==0){
			$response['errorcode'] = '2';
			$response['message'] = 'The Credit Deduction is not enabled for the '.$name.' '.$type.' for the '.$role.' role';
			$response['balance'] = $availableCredits;
		}elseif($creditsToDeduct > $availableCredits){
			$response['errorcode'] = '3';
			$response['message'] = $GLOBALS['language']['insufficient_credits'];
			$response['balance'] = $availableCredits;
		}elseif($_SESSION['cometchat']['creditsdeductiontimer'][$type.$name.$to.$isGroup]>time()-$deductionInterval*60){
			$response['errorcode'] = '4';
			$response['message'] = 'Already deducted '.$creditsToDeduct.' credits for the '.$type.' '.$name.' for the interval of '.$deductionInterval.' minutes';
			$response['balance'] = $availableCredits;
		}else{
			/** TODO: Modifiable SQL query START **/
			/* The SQL query should update the deducted credits for $userid */
			$sql = ("UPDATE `".TABLE_PREFIX.DB_USERTABLE."` SET credits = credits - ".sql_real_escape_string($creditsToDeduct)." WHERE `".DB_USERTABLE_USERID."`='".sql_real_escape_string($userid)."'");
			/** Modifiable SQL query END **/
			$result = sql_query($sql, array(), 1);
			if(sql_affected_rows()>0){
				$_SESSION['cometchat']['creditsdeductiontimer'][$type.$name.$to.$isGroup] = time();
				$response['success'] = true;
				$response['message'] = 'Deducted '.$creditsToDeduct.' credits for using the '.$name.' '.$type.' for the interval of '.$deductionInterval.' minutes';
				$response['balance'] = $this->getCredits();
			}else{
				$response['errorcode'] = '5';
				$response['message'] = 'An error occurred while deducting credits from the database';
			}
		}
		return $response;
	}



}
