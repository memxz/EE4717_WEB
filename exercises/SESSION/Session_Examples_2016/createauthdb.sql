use f37ee;
create table authorized_users ( name varchar(20), 
                                password varchar(40),
                                        primary key     (name)
                              );
insert into authorized_users values ( 'username', 
                                      'password' );

insert into authorized_users values ( 'testuser', 
                                      sha1('password') );
grant select on f37ee.* 
             to 'webauth' 
             identified by 'webauth';
flush privileges;



CREATE TABLE users 
(
	username varchar(20), 
	password varchar(40)
);


insert into users values
(
	
)