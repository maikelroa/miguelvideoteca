/* Create Database */
CREATE DATABASE userlitdb;
 
/* Create Table */
 CREATE TABLE userlitdb.usertbl (
 id int NOT NULL auto_increment,
 full_name varchar(32) NOT NULL default '',
 email varchar(32) NOT NULL default '',
 username varchar(20) NOT NULL default '',
 password varchar(32) NOT NULL default '',
 PRIMARY KEY (id),
 UNIQUE KEY username (username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;