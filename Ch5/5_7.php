<?php

$this->app->bind(‘SlackExceptionNotifier’, function($app) {
	$notificationContext = new ExceptionNotification();
	$notificationContext->setNotificationHandler (new
		SlackNotificationHandler());
	return $notificationContext;
});

