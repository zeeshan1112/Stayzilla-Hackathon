<?php
session_start();
require 'autoload.php';
define( 'PARSE_SDK_DIR', './Parse/' );
use Parse\ParseObject;
use Parse\ParseClient;
use Parse\ParseQuery;
ParseClient::initialize( 'aYq62CWD75ItwlYxl4KoNqYGLaUpJVdsIEMfJBB9', '30BMVndrYuDZCXpTWibvmJB6C8eX9OiKRtS7wbsd', 'Q1Hwtei0ZcbS00jsH6iSOUpZjFEJOaZDOYnjKxC6' );

$query = new ParseQuery("UserInfo");
try {
	$objectId = $_SESSION["objectId"];
  $user = $query->get($objectId);
  // The object was retrieved successfully.
} catch (ParseException $ex) {
  // The object was not retrieved successfully.
  // error is a ParseException with an error code and message.
}

	echo "Name: ".$user->get("name")."<br>";
	echo "Link:".$user->get("link")."<br>";
	echo "Email:".$user->get("email")."<br>";
	echo "ObjectId:".$user->getObjectId()."<br>";
	echo "UpdatedAt:".$user->getUpdatedAt()->format('Y-m-d H:i:s')."<br>";
	echo "CreatedAt:".$user->getCreatedAt()->format('Y-m-d H:i:s')."<br>";
?>

