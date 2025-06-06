CREATE TABLE user_(
    id int auto_increment primary key not null,
	first_name varchar(50) not null,
	last_name varchar(50) not null,
	email varchar(50)not null,
	telephone int,
	gender varchar(50) not null
);