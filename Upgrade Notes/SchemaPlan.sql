/*User*/
CREATE TABLE User (
  `ID` int not null auto_increment,
  `Login` varchar(32) not null unique,
  `Email` varchar(64) not null unique,
  `Credentials`  varchar(64) not null,
  `CredType` varchar(32) not null default 'SHA256',
  `APIKey` char(64) not null unique,
  Primary Key(ID));
/*Bill*/
CREATE TABLE Bill (
`State` char(2) not null,
`Session` varchar(16) not null,
`Prefix` varchar(8) not null,
`Number` varchar(16) not null, /* number can include letters sometimes, so need varchar */
`Revised` timestamp not null,
`Authors` JSON,
`Title` text not null, /* Consider normalizing out text and title */
`Text` text, /* Consider normalizing out text and title */
 Primary Key(State,Session,Prefix,Number,Revised));
/*State*/
Name
Abbreviation
API URL
API Method
Options
/*Legislator*/
Name
Photo URL
ID
District
/*Favorite*/
Owner
Type
ID
Weight(?)
/*Document*/
Name
Title
Text
Owner
Permissions
