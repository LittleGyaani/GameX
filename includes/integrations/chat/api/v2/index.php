<?php

if(!empty($_POST['userid'])){
	$_POST['basedata'] = $_POST['userid'];
}
$route = '';
if(!empty($_GET['route'])){
	$route = trim($_GET['route']);
	$route =  stripslashes($route);
	$route = str_replace('/','',$route);
}

if (!empty($route)) {
	$_POST['action'] = $route;
}

include_once(dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."config.php");

if(!empty($client) && file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."api.php")) {
	include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."api.php");
}

function checkAPIKEY($keyvalue) {
	global $apikey;
	if(!empty($keyvalue) && !empty($apikey)) {
		if($apikey == $keyvalue) {
			return 1;
		}
		$msg = 'Incorrect API KEY.';
		$response = array('failed' => array('status' => '1011', 'message' => $msg));
		echo json_encode($response); exit;
	}
	$msg = 'Invalid API KEY.';
	$response = array('failed' => array('status' => '1010', 'message' => $msg));
	echo json_encode($response); exit;
}

/*
* Handel Logic of Create User
* Created On : April-2018
* return boolean
*/
function createUser($dataArray) {
	$api_response 	= array();
	$UID		 	= $dataArray['UID'];
	$name 			= $dataArray['name'];
	$avatarURL 		= $dataArray['avatarURL'];
	$profileURL 	= $dataArray['profileURL'];
	$role			= $dataArray['role'];

	if($UID == false) {
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID.');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){
			$api_response['failed'] = array('status' => '2001','message' => 'User already exists');
		} else {
			$columns = array('username' => $name, 'link' => $profileURL, 'displayname' => $name,
							'avatar' => $avatarURL, 'uid' => $UID, DB_USERTABLE_ROLE   => $role);

			// Create New User Function. Return true if user added in database successfuly.
			$isUserCreated = fn_ccCreateNewUser($columns);
			if($isUserCreated) {
				$api_response['success'] = array('status' => '2000', 'message' => 'User created successfully!');
			} else {
				$api_response['failed'] = array('status' => '2001', 'message' => 'Someething Went Wrong. Please try after some time');
			}
		}
	}
	return $api_response;
}

function deleteUser($dataArray) {
	$api_response 	= array();
	$UID		 	= $dataArray['UID'];

	if($UID == false) {
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID.');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){
			//  Remove User From Cloud Database
			$isUserDelete = sql_query('cloudapi_removeUserUsingUID',array('uid'=>$UID));

			if($isUserDelete) {
				// Remove User from Other Friend's List
				$result = sql_query('removeIdsFromOtherFriendListUsingUID',array('uid' => $UID));
				while($row = sql_fetch_assoc($result)) {
					$friendsArray = explode(',', $row['friends']);
					$key = array_search($UID, $friendsArray);
					unset($friendsArray[$key]);
					$friendsString = implode(',', $friendsArray);

					// Update User Friend List
					sql_query('cloudapi_updatefriends',array('friends'=>$friendsString, 'uid'=>$UID,'fieldname'=>'uid'));
				}
				$api_response['success'] = array('status' => '2000','message' => 'User deleted successfully!');
			}
		} else {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
		}
	}
	return $api_response;
}

function updateUser($dataArray) {
	$api_response 	= array();
	$UID 		= $dataArray['UID'];
	if($UID == false) {
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID.');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){

			$name 			= $dataArray['name'];
			$avatarURL 		= $dataArray['avatarURL'];
			$profileURL 	= $dataArray['profileURL'];
			$role 			= $dataArray['role'];

			// Set All Variables in Update
			$set .= "";
			$set .=  "`username`= '".sql_real_escape_string($name)."', ";
			$set .=  "`link`= '".sql_real_escape_string($profileURL)."', ";
			$set .=  "`avatar`= '".sql_real_escape_string($avatarURL)."', ";
			$set .=  "`displayname`= '".sql_real_escape_string($name)."', ";
			$set .=  "`role`= '".sql_real_escape_string($role)."' ";
			sql_query('cloudapi_updateuserUsingUID',array('set'=>$set, 'uid'=>$UID));
			$api_response['success'] = array('status' => '2000','message' => 'User updated successfully');
		} else {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
		}
	}
	return $api_response;
}

function blockUser($dataArray) {
	$api_response 	= array();
	$senderUID 		= $dataArray['senderUID'];
	$receiverUID 	= $dataArray['receiverUID'];

	if($senderUID == false || $receiverUID == false){
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid Sender or Receiver UID');
	} else {
		// Check if sender User Id & Receiver User Id Is Present in Database
		$queryUniqueUserSender 		= fn_ccIsUserExist($senderUID);
		$queryUniqueUserReceiver 	= fn_ccIsUserExist($receiverUID);

		if($queryUniqueUserSender == false || $queryUniqueUserReceiver == false) {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid Sender or Receiver UID');
		} else {
			/* Get Sender CometChat Id Details */
			$resultSender = sql_query('cloudapi_getData',array('fetchfield'=>'userid','fieldname'=>'uid','value'=>$senderUID));
			$userSender = sql_fetch_array($resultSender);
			$ccSenderId = $userSender['userid'];

			/* Get Receiver CometChat Id Details */
			$resultReceiver = sql_query('cloudapi_getData',array('fetchfield'=>'userid','fieldname'=>'uid','value'=>$receiverUID));
			$userReceiver = sql_fetch_array($resultReceiver);
			$ccReceiverId = $userReceiver['userid'];

			$query = sql_query('isUserBlocked',array('fromuserid'=>$ccSenderId, 'touserid'=>$ccReceiverId));

			if($result = sql_fetch_assoc($query)){
				$api_response['failed'] = array('status' => '2001', 'message' => "User already Blocked.");
			} else {
				$query = sql_query('blockUser',array('fromid'=>$ccSenderId, 'toid'=>$ccReceiverId));
				$error = sql_error($GLOBALS['dbh']);
				$api_response['success'] = array('status' => '2000', 'message' => "User blocked successfully");
			}
		}
	}
	return $api_response;
}

function unblockUser($dataArray) {
	$api_response 	= array();
	$senderUID 		= $dataArray['senderUID'];
	$receiverUID 	= $dataArray['receiverUID'];

	if($senderUID == false || $receiverUID == false){
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid Sender or Receiver UID');
	} else {
		// Check if sender User Id & Receiver User Id Is Present in Database
		$queryUniqueUserSender 		= fn_ccIsUserExist($senderUID);
		$queryUniqueUserReceiver 	= fn_ccIsUserExist($receiverUID);

		if($queryUniqueUserSender == false || $queryUniqueUserReceiver == false) {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid Sender or Receiver UID');
		} else {
			/* Get Sender CometChat Id Details */
			$resultSender = sql_query('cloudapi_getData',array('fetchfield'=>'userid','fieldname'=>'uid','value'=>$senderUID));
			$userSender = sql_fetch_array($resultSender);
			$ccSenderId = $userSender['userid'];

			/* Get Receiver CometChat Id Details */
			$resultReceiver = sql_query('cloudapi_getData',array('fetchfield'=>'userid','fieldname'=>'uid','value'=>$receiverUID));
			$userReceiver = sql_fetch_array($resultReceiver);
			$ccReceiverId = $userReceiver['userid'];

			$queryIsUserBlocked = sql_query('isUserBlocked',array('fromuserid'=>$ccSenderId, 'touserid'=>$ccReceiverId));
			if($result = sql_fetch_assoc($queryIsUserBlocked)){
				$query = sql_query('unblockUser',array('fromid'=>$ccSenderId, 'toid'=>$ccReceiverId));
				$error = sql_error($GLOBALS['dbh']);
				if (!empty($error)) {
					$api_response['error'] = sql_error($GLOBALS['dbh']);
					$api_response['failed'] = array('status' => '2001', 'message' => "Failed to unblocked user.");
				}else{
					$api_response['success'] = array('status' => '2000', 'message' => "User unblocked successfully.");
				}
			}else{
				$api_response['failed'] = array('status' => '1014', 'message' => "User already unblocked.");
			}
		}
	}
	return $api_response;
}

function addFriends($dataArray) {
	$api_response 		= array();
	$newFriendsArray 	= array();
	$dbFriendList 		= array();
	$UID 				= $dataArray['UID'];
	$friendsUID 		= $dataArray['friendsUID'];

	if($UID == false) {
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID.');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){
			if($friendsUID == false) {
				$api_response['failed'] = array('status' => '2001','message' => 'Invalid Friends UID');
			} else {
				$newFriendsArray = explode(',',$friendsUID);

				/* Get Logedin Users Details */
				$result = sql_query('cloudapi_getData',array('fetchfield'=>'friends','fieldname'=>'uid','value'=>$UID));
				$user = sql_fetch_array($result);

				if(!empty($user['friends']) && $clearExisting == 0) {
					$dbFriendList = explode(",",$user['friends']);
				}

				$finalFriendsList = array_merge($dbFriendList,$newFriendsArray);
				$newFriendsList = trim(implode(',',$finalFriendsList),',');

				sql_query('cloudapi_updateFriendsUsingUID',array('friends'=>$newFriendsList, 'uid'=>$UID));
				$api_response['success'] = array('status' => '2000','message' => 'Friends updated successfully!');
			}
		} else {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
		}
	}
	return $api_response;
}

function deleteFriends($dataArray){
	$UID 					= $dataArray['UID'];
	$friendsUID 			= $dataArray['friendsUID'];
	$api_response 			= array();
	$newFriendsList    		= array();
	$dbFriendList 	   		= array();
	$finalFriendsList  		= array();
	$finalFriendsListStr 	= "";

	if($UID == false) {
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){
			if($friendsUID == false) {
				$api_response['failed'] = array('status' => '2001','message' => 'Invalid Friends UID');
			} else {
				$removeFriendsArray = explode(',',$friendsUID);

				/* Get Logedin Users Details */
				$result = sql_query('cloudapi_getData',array('fetchfield'=>'friends','fieldname'=>'uid','value'=>$UID));
				$user = sql_fetch_array($result);

				if(!empty($user['friends'])) {
					$dbFriendList = explode(",",$user['friends']);
				}
				$finalFriendsList = array_diff($dbFriendList, $removeFriendsArray);
				$finalFriendsListStr = trim(implode(',',$finalFriendsList),',');

				sql_query('cloudapi_updateFriendsUsingUID',array('friends'=>$finalFriendsListStr, 'uid'=>$UID));
				$api_response['success'] = array('status' => '2000','message' => 'Friends updated successfully!');
			}
		} else {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
		}
	}
	return $api_response;
}

function listUsers($dataArray) {
	$api_response 			= array();
	$offset 				= $dataArray['offset'];
	$limit 					= $dataArray['limit'];

	$start = ($offset - 1) * $limit;
	$userlist = array();
	$result = sql_query('cloudapi_getUsersDetails', array('limit'=>$limit,'offset'=>$offset));

	while($row = sql_fetch_assoc($result)){
		$userlist[] = $row;
	}
	$api_response['success'] = array('status' => '2000', 'message' => "List fetched successfully", 'data' => $userlist);

	return $api_response;
}

function updateCredits($dataArray) {

	$UID 		= $dataArray['UID'];
	$credits 	= $dataArray['credits'];
	$set = "";

	if($UID == false || $credits == false) {
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID or Invalid Credit.');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){
			$set .=  "`credits`= credits + '".sql_real_escape_string($credits)."' ";
			sql_query('cloudapi_updateuserUsingUID',array('set'=>$set, 'uid'=>$UID));
			$api_response['success'] = array('status' => '2000', 'message' => "Credits Updated Successfully.");
		} else {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID.');
		}
	}
	return $api_response;
}
function getCredits($dataArray) {
	$credits = 0;
	$UID = $dataArray['UID'];
	$returnData = array();
	if($UID  == false){
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){
			$result = sql_query('cloudapi_getCredits',array('uid'=>$UID));
			$row = sql_fetch_assoc($result);
			$returnData['credits'] = $row['credits'];
			$api_response['success'] = array('status' => '2000', 'message' => "Credits Points.", 'data' => $returnData);
		} else {
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
		}
	}
	return $api_response;
}
/*
* Create New User Into Database
* Created On : April-2018
* return boolean
*/
function fn_ccCreateNewUser($userDataColumnsArr) {
	sql_query('cloudapi_createuser', $userDataColumnsArr);
	$userid = sql_insert_id(TABLE_PREFIX.DB_USERTABLE, DB_USERTABLE_USERID);
	return ($userid > 0 ? true : false);
}

/*
* Get User Details Query Using UID
* Created On : 23-April-2018
* return boolean
*/
function fn_ccIsUserExist($UID) {
	$sql = sql_getQuery('selectUser');
	$sql .= (" where `uid` = '".$UID."'");
	$query = sql_query($sql, array(), 1);

	if($query->num_rows > 0){
		return true;
	}
	return false;
}

function getGroupList(){
	$result = sql_query('cloudapi_getChatroomsList',array());
	$groupslist = array();
	while($row = sql_fetch_assoc($result)){
		$groupslist[] = $row;
	}
	$api_response['success'] = array('status' => '2000', 'message' => "Groups list fetched successfully.", 'data' => $groupslist);
	return $api_response;
}

function deleteGroups($dataArray){
	$GroupsList = '';
	if(!empty($dataArray['GroupsList'])){
		$GroupsList = $dataArray['GroupsList'];
	}else {
		$api_response['failed'] = array('status' => '2001','message' => 'Please enter group ids');
		return $api_response;
	}
	$result = sql_query('cloudapi_deleteGroups',array('GroupsList'=>$GroupsList));
	$api_response['success'] = array('status' => '2000', 'message' => "Groups deleted successfully.");
	return $api_response;
}

function loginWithUID($dataArray) {
	global $currentversion;
	$api_response 		= array();
	$UID 				= $dataArray['UID'];

	if($UID == false) {
		$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID.');
	} else {
		$queryUniqueUser = fn_ccIsUserExist($UID);
		if($queryUniqueUser){
			$sql = ("select * from `".TABLE_PREFIX.DB_USERTABLE."` WHERE uid = '".$UID."'");
			$result = sql_query($sql, array(), 1);
			$row = sql_fetch_assoc($result);
			if(!empty($row['userid'])) {
				$userid = $row['userid'];
			}
			if ($userid != 0){
	    		$sql = ("insert into cometchat_status (userid,isdevice) values ('".sql_real_escape_string($userid)."','1') on duplicate key update isdevice = '1'");
	    		sql_query($sql, array(), 1);

				$data = array(
					'id'=> 	$row['uid'],
					'n'	=> 	$row['username'],
					'a'	=> 	$row['avatar'],
					'l'	=> 	$row['link']
				);
				$api_response['version'] = $currentversion;
				$api_response['basedata'] = base64_encode(json_encode($data));
			}
		}else{
			$api_response['failed'] = array('status' => '2001','message' => 'Invalid UID');
		}
	}
	return $api_response;
}
function createGroup($dataArray){
	if(!empty($dataArray['GUID'])){
		if(empty($dataArray['name'])){
			$api_response['failed'] = array('status' => '2001', 'message' => 'Group name is not defined.');
			echo json_encode($api_response); exit;
		}
		if(!empty($dataArray['type'])){
			if($dataArray['type']==1 && empty($dataArray['password'])){
				$api_response['failed'] = array('status' => '2001', 'message' => 'Password required for Password Protected Group.');
				echo json_encode($api_response); exit;
			}
		}
		else if($dataArray['type']=0 && empty($dataArray['name'])){
			$response['failed'] = array('status' => '2001', 'message' => 'Group name or type required: Type list 0: Public, 1:Password Protected, 2: Invitation only.');
			echo json_encode($api_response); exit;
		}

		$name = str_replace("%27","'", $dataArray['name']);
		$query = sql_query('getGroup', array('guid'=>$dataArray['GUID']));

		if(sql_num_rows($query) == 0) {
			$time = getTimeStamp();
			if (!empty($dataArray['password'])) {
				$dataArray['password'] = sha1($dataArray['password']);
			} else {
				$dataArray['password'] = '';
			}

			$query = sql_query('api_creategroup', array('name'=>sanitize_core($name), 'createdby'=>'0', 'lastactivity'=>getTimeStamp(), 'password'=>sanitize_core($dataArray['password']), 'type'=>sanitize_core($dataArray['type']), 'guid'=>sanitize_core($dataArray['GUID'])));
			$currentroom = sql_insert_id('cometchat_chatrooms');

			$api_response['success'] = array('status'=>'2000','roomid' => $currentroom, 'message' => 'Group created successfully', 'guid'=>$dataArray['GUID']);
			echo json_encode($api_response);
		} else {
			$api_response['failed'] = array('status' => '2001', 'message' => 'GUID must be unique.');
			echo json_encode($api_response); exit;
		}
	}else{
		$api_response['failed'] = array('status' => '2001', 'message' => 'GUID is not defined.');
		echo json_encode($api_response); exit;

	}
}

function deleteGroup($dataArray){
	if(empty($dataArray['GUID'])){
		$api_response['failed'] = array('status' => '2001', 'message' => 'Group GUID or type required: Type list 0: Public, 1:Password Protected, 2: Invitation only');
		echo json_encode($api_response); exit;
	}

	$query = sql_query('getGroup', array('guid'=>$dataArray['GUID']));
	if(sql_num_rows($query) > 0) {
		$result = sql_fetch_assoc($query);
		$currentroom = $result['id'];
		$time = getTimeStamp();
		$query = sql_query('deleteGroupApi', array('guid'=>$dataArray['GUID']));
		$query = sql_query('deleteGroupUserApi', array('chatroomid'=>$currentroom));
		$api_response['success'] = array('status'=>'2000', 'message' => 'Group deleted successfully.');
		echo json_encode($api_response);
	} else {
		$api_response['failed'] = array('status' => '2001', 'message' => 'GUID does not exist.');
		echo json_encode($api_response); exit;
	}
}

function addUsersToGroup($dataArray){
	$GUID = $dataArray['GUID'];
	$UIDs = $dataArray['UIDs'];
	if(!empty($GUID) && !empty($UIDs)){
		$query = sql_query('cloud_getGroupId', array('GUID'=>$GUID));/* check if group exists*/
		$result = sql_fetch_assoc($query);
		$roomId = $result['id'];
		if(!empty($roomId)){
			$uids = explode(',',$UIDs);
			foreach ($uids as $key => $value) {
				if(!empty($value)) {
					$result = sql_query('cloud_checkUserExists', array('value'=>$value));/*check whether the requested users exists or not */
					$touser = sql_fetch_assoc($result);
					if(!empty($touser['userid'])) {
						$result = sql_query('checkGroupUserExists', array('chatroomid'=>$roomId, 'userid'=>$touser['userid']));
						$dbUserArray = sql_fetch_assoc($result);
						if(!empty($dbUserArray['userid'])){
							/*check if user already in group*/
							$failedUsers[] = $touser['userid'];
						}else {
							/*Users to be added in group*/
							$addedUsers[] = $touser['userid'];
						}
					}else {
						$failedUsers[] = $touser['userid'];
					}
				}
			}
			if(!empty($addedUsers)) {
				$list = implode(',',$addedUsers);
				foreach($addedUsers as $user){
					sql_query('cloudapi_addGroupUser', array('GUID'=>$roomId, 'userid'=>$user));
				}
				$api_response['success'] = array('status' => '2000', 'message' => "Users added successfully.");
				return $api_response;
			}
			if(!empty($failedUsers)){
				$list = implode(",",$failedUsers);
				$api_response['failed'] = array('status' => '2001','message' => 'Users already part of group.', 'data' => $failedUsers);
				return $api_response;
			}
		} else{
			$api_response['failed'] = array('status' => '2001','message' => 'GUID does not exist.');
			return $api_response;
		}
	}
}

function removeUsersFromGroup($dataArray){
	$GUID = $dataArray['GUID'];
	$UIDs = $dataArray['UIDs'];
	if(!empty($GUID) && !empty($UIDs)){
		$query = sql_query('cloud_getGroupId', array('GUID'=>$GUID));/* check if group exists*/
		$result = sql_fetch_assoc($query);
		$roomId = $result['id'];
		if(!empty($roomId)){
			$uids = explode(',',$UIDs);
			foreach ($uids as $key => $value) {
				if(!empty($value)) {
					$result = sql_query('cloud_checkUserExists', array('value'=>$value));/*check whether the requested users exists or not */
					$touser = sql_fetch_assoc($result);
					if(!empty($touser['userid'])) {
						$result = sql_query('checkGroupUserExists', array('chatroomid'=>$roomId, 'userid'=>$touser['userid']));
						$dbUserArray = sql_fetch_assoc($result);
						if(empty($dbUserArray['userid'])){
							/*check if does not exist already in group*/
							$api_response['failed'] = array('status' => '2001', 'message' => "Users not part of group.");
							echo json_encode($api_response); exit;
						}else {
							$addedUsers[] = $touser['userid'];
						}
					}else {
						$failedUsers[] = $touser['userid'];
					}
				}
			}
			if(!empty($addedUsers)) {
				$list = implode(',',$addedUsers);
				foreach($addedUsers as $user){
					sql_query('cloudapi_removeGroupUser', array('roomId'=>$roomId, 'userid'=>$user));
				}

				$api_response['success'] = array('status' => '2000', 'message' => "Users removed successfully.");
				return $api_response;
			}
		} else{
			$api_response['failed'] = array('status' => '2001','message' => 'GUID does not exist.');
			return $api_response;
		}
	}
}

function messageSend($dataArray){
	global $userid;
	$to = 0;
	$isGroup = 0;
	$message = '';
	$dir = 0;
	$senderUID = $dataArray['senderUID'];
	$receiverUID = $dataArray['receiverUID'];
	$isGroup = $dataArray['isGroup'];
	$message = $dataArray['message'];
	$visibility = $dataArray['visibility'];
	$invalidResponse = 0;

	if(!empty($dataArray['visibility'])){
		$dir = $dataArray['visibility'];
	}

	$InvalidUser = array('status' => '2001','message' => 'Invalid Sender or Receiver UID');

	if(empty($senderUID)){
		$api_response['failed'] = $InvalidUser;
		$invalidResponse = 1;
	} else {
		// Check if sender User Id Is Present in Database
		$queryUniqueUserSender 		= fn_ccIsUserExist($senderUID);
		if($queryUniqueUserSender == false) {
			$api_response['failed'] = $InvalidUser;
			$invalidResponse = 1;
		}
	}

	if(empty($isGroup)){
		if(empty($receiverUID)){
			$api_response['failed'] = $InvalidUser;
			$invalidResponse = 1;
		} else {
			// Check if sender User Id Is Present in Database
			$queryUniqueUserSender 		= fn_ccIsUserExist($receiverUID);
			if($queryUniqueUserSender == false) {
				$api_response['failed'] = $InvalidUser;
				$invalidResponse = 1;
			}else{
				$query = sql_query('getUserByUID',array('fromuserid'=>0, 'touserid'=>$receiverUID));

				if($result = sql_fetch_assoc($query)){
					$to = $result['userid'];
				}
			}
		}
	}else{
		$query = sql_query('getGroup',array('guid'=>$receiverUID));
		if($query->num_rows == 0){
			$api_response['failed'] = array('status' => '2001', 'message' => "Group does not exist.");
			$invalidResponse = 1;
		}
	}

	if(empty($message)){
		$api_response['failed'] = array('status' => '2001','message' => 'Message is required');
	}

	if(!empty($senderUID)){
		$query = sql_query('getUserByUID',array('fromuserid'=>0, 'touserid'=>$senderUID));
		if($result = sql_fetch_assoc($query)){
			$userid = $result['userid'];
		}
	}

	if(empty($invalidResponse)){
		if(empty($isGroup)) {
			sendMessage($to, $message, 0, '');
			$api_response['success'] = array('status' => '2000', 'message' => "Message Sent Successfully.");
		} else{
			if(!empty($senderUID)){
				$query = sql_query('getUserByUID',array('fromuserid'=>$senderUID, 'touserid'=>$to));
				if($result = sql_fetch_assoc($query)){
					$userid = $result['userid'];
				}
			}
			if(!empty($receiverUID)){
				$query = sql_query('getGroupId',array('guid'=>$receiverUID));
				if($result = sql_fetch_assoc($query)){
					$to = $result['id'];
					$query = sql_query('getGroupId',array('guid'=>$receiverUID));
				}
				sendChatroomMessage($to, $message, 0, '');
				$api_response['success'] = array('status' => '2000', 'message' => "Message Send to Group Successfully.");
			}
		}
	}
	return $api_response;
}

function getUser($dataArray){
	$UID = $dataArray['UID'];
	$getfriends = $dataArray['getfriends'];
	$joinedgroups = $dataArray['joinedgroups'];

	if(!empty($UID)){
		$where = 'where `uid`="'.$UID.'"';
		if($cms == 'mssql'){
			$where = 'where `uid`="'.$UID.'"';
		}
	}
	if(is_array($userdetails = getCache('getUser'))){
		$api_response['success'] = array(
			'status' => '2000',
			'message' => 'User details accessed successfully',
			'data' => $userdetails
		);
		return $api_response;
	}
	$result = sql_query('cloudapi_getUser',array('where'=>$where));
	if($result->num_rows > 0){
		$userdetails 				= array();
		$row 						= sql_fetch_assoc($result);
		$userdetails['user'] = $row;
		$userid 					= $row['cid'];
		$friendDetails 				= array();
		if($getfriends == 1){
			$friendsIds 			= $row['friends'];
			$friendsArray 			= explode(',', $friendsIds);
			$userdetails['friends'] = getFriendDetails($friendsArray);
		}
		if ($joinedgroups == 1){
			$userdetails['groups'] = getUserJoinedGroupDetails($userid);
		}
		setCache('getUser',$userdetails,3600);
		$api_response['success'] = array('status' => '2000','message' => 'User details accessed successfully','data' => $userdetails);
	}else{
		$api_response['failed'] = array('status' => '2001','message' => 'User not registered');
	}
	return $api_response;
}


function getFriendDetails($friendIds){
	$details = array();
	if(is_array($friendIds)){
		foreach ($friendIds as $key => $value) {
			$where = 'where `uid`='."'".$value."'";
			$result = sql_query('cloudapi_getUser',array('where'=>$where));
			if($result->num_rows > 0){
				$userdetails = array();
				$row 		 = sql_fetch_assoc($result);
				$details[] 	 = $row;
			}
		}
	}
	return $details;
}

function getUserJoinedGroupDetails($id){
	$groupDetails = array();
	if(!empty($id)){
		$result = sql_query('getUserJoinedGroupDetails',array('id'=>$id));
		if($result->num_rows > 0){
			while($row = sql_fetch_assoc($result))
			{
				$temp = array();
				$temp['guid'] 	= $row['guid'];
				$temp['name'] 	= $row['name'];
				if($row['type'] == 0){
					$row['type'] = 'Public Group';
				}
				if($row['type'] == 1){
					$row['type'] = 'Password Protected Group';
				}
				if($row['type'] == 2){
					$row['type'] = 'Private Group';
				}
				$temp['type'] 	= $row['type'];
				$groupDetails[] 	= $temp;
			}
		}
	}
	return $groupDetails;
}
