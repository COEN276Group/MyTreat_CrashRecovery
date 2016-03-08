create table users(
	id int auto_increment,
	f_name char(30),
	l_name char(30),
	DOB date,
	age int,
	gender char(1),
	occupation varchar(100),
	hobbies varchar(500),
	description varchar(500),
	email varchar(100),
	psw varchar(20),
	pic_url varchar(100),
	primary key(id)
);


create table events(
	id int auto_increment,
	organizer_id int,
	event_time timestamp,
	street varchar(100),
	city varchar(50),
	state char(2),
	zip char(5),
	pic_url varchar(100),
	title varchar(50),
	short_desc varchar(500),
	long_desc varchar(2000),
	category char(20),
	mytreat char(20),
	tag varchar(500),
	primary key(id),
	foreign key(organizer_id) references users(id)
);


create table applications(
	user_id int NOT NULL,
	event_id int NOT NULL,
	foreign key(user_id) references users(id),
	foreign key(event_id) references events(id)
);

create table participants(
	user_id int NOT NULL,
	event_id int NOT NULL,
	foreign key(user_id) references users(id),
	foreign key(event_id) references events(id)
);


ALTER TABLE events AUTO_INCREMENT = 2134778;
ALTER TABLE users AUTO_INCREMENT = 10039;
