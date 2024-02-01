## Test Requirements ##

PHP version > 7

## Test requisites ##

You'll find the 3 tasks required for test completion in writeScript.php

You need to install the external packages listed inside composer.json

You'll find the database sample records that you need to use for this test in the root folder. Make sure you edit the OrderEmail with your own email during testing.

To send the email notifications through the php mailer package you can either use your local mail server, a free smtp relay or if you have a gmail account they provide a outgoing smtp server for your account.

## Optional technologies - using these is preferred ##

MongoDB (see database.json)

## Test Details ##

/**
 * 1. Get all orders from the database that are from Weltpixel
 * Hint: Utilize the Database implementation to connect and retrieve data;
 *
 * 2. Send an email notification to the OrderEmail field for the items with status Item Shipped that includes a total amount and the order details(name, date, item id, item price)
 * Hints: A) Make use of Presenter model classes to put the order&item data into objects;
 *      B) Write a presenter class(that implements PresenterInterface) to format the order;
 *      C) Create a email notifier implementation to use along with PHPmailer package;
 *
 * 3. Update the order records that you sent notification for and set the item statuses to ItemStatus = 'Notification sent & 'ItemStatusId = 10;
 **/