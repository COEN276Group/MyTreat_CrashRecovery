COEN 276
Web Programming
Prof Navid Shaghaghi
Class Project Front-End Package
Submit Date: Feb 23, 2016

Team Members:
	Yiqiao Li
	Qi Zhao
	Xiaosu Ye
	Juntao Zhang
	Hairong Wang

Project Overview:
	The website is a social network website designed for users to organize social meet-up events with strangers or friends. Users can host or join events in various categories. Users will be able to browse lists of incoming events, create events according to his/her own taste and view other people's profiles pages. Once users find out about an event that they want to join, they can send an application with comments to the organizer. The organizer will be able to selectively accept these event application after reviewing the applicants' profiles.

Package Contents:

		images/
		scripts/
		stylesheets/

	Graphic resources are stored in the "images" folder. Javascript files are stored in the "scripts" folder. CSS files are in the "stylesheets" folder.

Key Features:
	In the home page, events from various categories are displayed with a title and a event theme picture. When users click on the photo, the photo will flip over and show additional info: organizer info, event description and two buttons: "more info" and "I want in". The "more info" button will take the user to the specific page for the even (Since we do not have the back end PHP, it is not efficient to create dozens of event page htmls, therefore we link all event links to one single event. The same happends for profile pages and category page). Once the user click on "I want in", a pop-up window will prompt users to put in a comment to send to the organizer.

	In the my_events_management_page.html, users will be able to access the events they created and be able to modify the contents of the event: location, time, description and event picture. In addition, event organizers will be able to see who are already allowed to join the event, and all pending applicaitons. Organizers can kick people out of the event after they have been admitted, approve applications so they appear in the "already in" section and reject applications. These are all done with animation. These actions will link with the backend once database gets involved.

References:
	We borrowed either original codes or revised versions of codes from the following sources:

	1) The flip jQuery library that creats the flipping effect of images in our home_page.html. Their contents can be found at https://nnattawat.github.io/flip/

	2) The modal jQuery library that generates the modal login pop-up is borrowed and modified to fit our design. Their original contents can be found at: http://leanmodal.finelysliced.com.au

	All image contents are downloaded from google image search.


How to Use:
	Before opening up the home page, make sure to set up the back end MySQL database.

	In MySQL, run database/createtb.sql first and then run database/inserttb.sql. The first file will create a user,
	grant permission and create tables for the website. The second file will populate the database with some initial
	data.

	Once this is done, open up the home_page.php file in the browser through the url: localhost/MyTreat/home_page.php

	Since we do not have the technology to capture the actual images that users upload for profile and event creation, we can only
	support choosing event pictures or profile pictures that are already in the image folders: images/contents/ for events and
	images/profile_pics for profiles. Otherwise the pictures will not be properly loaded.
