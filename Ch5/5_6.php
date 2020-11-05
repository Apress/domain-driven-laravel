<?php

// example of using the above design 
$context = $request->notification->isError() ? ‘exception’ 
					: ‘info’;

$notificationType = $request->notification->type;

switch ($notificationType) {
	case ‘sms’: 
		$notificationHandler = new SmsNotifierHandler();
		break;
	case ‘email’:
		$notificationHandler = new EmailNotificationHandler();
		break;
	case ‘slack’:
		$notificationHandler = new SlackNotificationHandler();
		break;
	default: 
		throw new InvalidNotificationTypeException();
}

if ($context == ‘exception’) {
	$notificationContext = new ExceptionNotification();
} else if ($context == ‘info’) {
	$notificationContext = new InfoNotification();
}	

//finally, send our message
$notificationContext->setNotificationHandler($notificationHandler)->
	send($request->notification->message);

