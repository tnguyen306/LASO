/*User*/
CREATE TABLE User (
  `Id` int not null auto_increment,
  `Login` varchar(32) not null unique,
  `Email` varchar(64) not null unique,
  `Credentials`  varchar(64) not null,
  `CredType` varchar(32) not null default 'SHA256',
  `ApiKey` char(64) not null unique,
  Primary Key(ID)
);
/*Bill*/
CREATE TABLE Bill (
  `State` char(2) not null,
  `Session` varchar(16) not null,
  `Prefix` varchar(8) not null,
  `Number` varchar(16) not null, /* number can include letters sometimes, so need varchar */
  `Revised` timestamp not null,
  `Authors` JSON,
  `Title` varchar(128) not null, /* Consider normalizing out text and title */
  `Text` text, /* Consider normalizing out text and title */
   Primary Key(State,Session,Prefix,Number,Revised)
);
/*State*/
CREATE TABLE State(
  `Name` varchar(32) not null,
  `Abbreviation` char(2) not null,
  `ApiMethod` varchar(16) not null,
  `Options` json default null, /* options for render, search, and api */
  primary key (`Abbreviation`)
);
/*Legislator*/
CREATE TABLE Legislator(
  `Name` varchar(64) not null,
  `Photo` varchar(64),
  `ID` , varchar(32) not null,
  `Session` varchar(16) not null
  `State` char(2) not null,
  `Position` ,
  foreign key `State` references State(Abbreviation),
  primary key (`State`, `Session`, 'ID')
);
/*Favorite*/
CREATE TABLE Favorite(
  `Owner` int not null,
  `Type` varchar(16) not null,
  `Id` varchar(32) not null,
  `Weight` int not null default 0,
  foreign key `Owner` references User(Id),
  primary key (`Owner`,`Type`,`ID`)
);
/*Tag*/
CREATE TABLE Favorite(
  `Owner` int not null,
  `Type` varchar(16) not null,
  `Id` varchar(32) not null,
  `Tag` varchar(32) not null default 'Important',
  `Weight` int not null default 0,
  foreign key `Owner` references User(Id),
  primary key (`Owner`,`Type`,`ID`)
);
/*Document*/
CREATE TABLE Document (
  `ID` int auto_increment not null,
  `Revised` timestamp not null,
  `Owner` int not null,
  `Permissions` JSON not null,
  `Title` text not null, /* Consider normalizing out text and title */
  `Text` varchar(128), /* Consider normalizing out text and title */
  Primary Key(State,Session,Prefix,Number,Revised),
  foreign key `Owner` references User(Id)
);
/*FetchLog*/
create table FetchLog
  `Id` int auto_increment not null,
  `RecordsAdded` int not null default 0,
  `State` char(2) not null,
  `TimeStamp` timestamp not null default CURRENT_TIMESTAMP,
  `Detail` text,
  foreign key `State` references State(Abbreviation),
  primary key (Id)
);
