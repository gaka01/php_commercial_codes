<?php
// file sus funkcii koito se include-vat vuv nqkoi php script-ove kato


function sqlfilter($string) {
	$data = str_split($string);
	$out = true;
	foreach($data as $d) {
		$t=ord($d);
		if(($t>96 && $t<123) || ($t>63 && $t < 91) || ($t>47 && $t<58) || $t==46) {
			null;
		} else {
			$out = false;
		}
	}
	return $out;
}

function check_session() {
	if(isset($_COOKIE['session'])) {
		$data = explode("_",$_COOKIE['session']);
		$id = $data[0];
		$sess=$data[1];
		
		if (sqlfilter((string)$id)) {
			$con=mysqli_connect("localhost","root","ilovesql","anelia");
			try {
				$result=mysqli_query($con,"SELECT password FROM users WHERE id=".$id);
				$hpass = mysqli_fetch_row($result);
			} catch (Exception $e) {
				$hpass=[];
			}
			
			$result=mysqli_query($con,"SELECT * FROM sessions WHERE id=".$id);
			while($row = mysqli_fetch_array($result)) {
				if ($row['id'] == $id && $row['session'] == $sess && strpos($sess, md5($_SERVER['REMOTE_ADDR'].$hpass[0]))>0) {
					setcookie("session",$_COOKIE['session'],time()+86400);
					return true;
				}
			}
		}
	}
	return false;
}

function current_username() {
	if(check_session()) {
		$data = explode("_",$_COOKIE['session']);
		$id = $data[0];
		if (sqlfilter((string)$id)) {
			$con=mysqli_connect("localhost","root","ilovesql","anelia");
			try {
				$result=mysqli_query($con,"SELECT name FROM users WHERE id=".$id);
				$user = mysqli_fetch_row($result);
				return $user[0];
			} catch (Exception $e) {
				null;
			}
		}
	}
	return "";

}

function current_id() {
	if(check_session()) {
		$data = explode("_",$_COOKIE['session']);
		return $data[0];
	}
	return "";
}

function is_moderator() {
	if(check_session()) {
		$id = current_id();
		$con=mysqli_connect("localhost","root","ilovesql","anelia");
		$result=mysqli_query($con,"SELECT * FROM moderators WHERE id=".$id);
		$row=mysqli_fetch_row($result);
		if($row!=null) {
			return true;
		} else {
			return false;
		}
	}
	return false;
}


?>