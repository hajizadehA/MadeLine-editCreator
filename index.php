<?php
require_once '/vendor/autoload.php';
$MadelineProto = new \danog\MadelineProto\API("session.madeline");
$MadelineProto->start();

$channel = "-10044";
$user = "152468";
$2fa = "123654";

try {
    $info = (array)$MadelineProto->account->getPassword();
    $hasher = new \danog\MadelineProto\MTProtoTools\PasswordCalculator($MadelineProto->API->logger);
    $hasher->addInfo($info);
    $Updates = $MadelineProto->channels->editCreator(['channel' => $channel, 'user_id' => $user, 'password' => $hasher->getCheckPassword($2fa)]);
    print_r($Updates);
   
} catch (Exception $e) {
    print_r($e);
}
