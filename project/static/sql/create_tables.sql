CREATE DATABASE MixAndMatch;

create table Categories
( 
	id int unsigned not null auto_increment primary key,
	name ENUM('Jacket','Shirt','Pants','Shoes','Tie') not null,
	description char(100) not null,
	image char(50)
);

create table Colours
( 
	id int unsigned not null auto_increment primary key,
	name char(20) not null
);

create table Style
( 
	id int unsigned not null auto_increment primary key,
	name char(30) not null
);

create table Products
( 
	id int unsigned not null auto_increment primary key,
	cat_id int unsigned not null,
	colour_id int unsigned not null,
	style_id int unsigned not null,
	name char(100) not null,
	description char(200) not null,
	image char(50),
	price float not null,
	FOREIGN KEY(cat_id) REFERENCES Categories(id),
	FOREIGN KEY(colour_id) REFERENCES Colours(id),
	FOREIGN KEY(style_id) REFERENCES Style(id)
);

create table Measurements
( 
	id int unsigned not null auto_increment primary key,
	torsolength float,
	armlength float,
	shoulderwidth float,
	chest float,
	waist float,
	hips float,
	bicep float,
	pantslength float,
	thigh float,
	neck float
);

create table Customers
(  
	id int unsigned not null auto_increment primary key,
	measure_id int unsigned,
	firstname varchar(50),
	lastname varchar(50),
	phone int,
	email varchar(100),
	address varchar(100),
	paymentinfo varchar(50),
	FOREIGN KEY(measure_id) REFERENCES Measurements(id)
); 

create table Login
( 
	id int unsigned not null auto_increment primary key,
	customer_id int unsigned not null,
 	username varchar(50) not null,
 	password varchar(50) not null,
 	FOREIGN KEY(customer_id) REFERENCES Customers(id)
);

create table Enquiries
( 
	id int unsigned not null auto_increment primary key,
	customer_id int unsigned,
 	firstname varchar(50) not null,
 	lastname varchar(50) not null,
 	email varchar(50) not null,
 	phone varchar(50),
	type ENUM('general','product','shipping','order', 'website') not null,
 	comment varchar(500) not null,
 	FOREIGN KEY(customer_id) REFERENCES Customers(id)
);

create table Delivery_Addresses
(
	id int unsigned not null auto_increment primary key,
	addr char(100),
	postalcode int unsigned
);

create table Orders
( 
	id int unsigned not null auto_increment primary key,
	customer_id int unsigned not null,
	thedate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	delivery_add_id int unsigned,
	status ENUM('Pending','Processing','Shipped','Arrived'),
	totalcost float not null,
	FOREIGN KEY(customer_id) REFERENCES Customers(id),
	FOREIGN KEY(delivery_add_id) REFERENCES Delivery_Addresses(id)
);

create table Order_items
( 
	id int unsigned not null auto_increment primary key,
	order_id int unsigned not null,
	product_id int unsigned not null,
	quantity int unsigned not null,
	FOREIGN KEY(order_id) REFERENCES Orders(id),
	FOREIGN KEY(product_id) REFERENCES Products(id)
);









