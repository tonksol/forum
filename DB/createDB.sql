 DROP DATABASE IF EXISTS boardgames_db;
 CREATE DATABASE boardgames_db;
 USE boardgames_db;
-- GRANT ALL PRIVILEGES ON EmployeeDB. * To ''@'localhost' .....

USE boardgames_db;


CREATE TABLE Badge (
    badgeID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    badgeName               varchar(100) NULL, 
    badgeImage              varchar(255) NULL,
    badgeDescription        varchar(255) NULL
);

CREATE TABLE User (
    userID                  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName               varchar(100) NULL,
    prefix                  varchar(30) NULL,
    lastName                varchar(100) NULL,
    birthdate               date NULL,
    userImage               varchar(255) NULL,
    email                   varchar(255) NULL,
    realEmail               boolean 0,
    userName                varchar(255) NULL,
    userPassword            varchar(50) NULL,
    themePreferences        varchar(255) NULL,
    quote                   varchar(255)
);

CREATE TABLE UserBadge (
    badgeID                 int NOT NULL,
    userID                  int NOT NULL,
    CONSTRAINT pk_UserBadge PRIMARY KEY (userID, badgeID),
    FOREIGN KEY (badgeID) REFERENCES Badge (badgeID),
    FOREIGN KEY (userID) REFERENCES User (userID)
);

CREATE TABLE ForumPage (
    forumPageID             int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    forumPageName           varchar(100) NULL,
    forumPageContent        varchar(1000) NULL,
    forumPageLastModifiedDate   date NULL,
    FOREIGN KEY (userID) REFERENCES User (userID)
);

CREATE TABLE Topic (
    topicID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    topicName               varchar(100) NULL,
    topicDescription        varchar(255) NULL
);

CREATE TABLE Category (
    categoryID              int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    topicID                 int NULL,
    categoryName            varchar(100),
    categoryDescription     varchar(255),
    FOREIGN KEY (topicID) REFERENCES Topic (topicID)
);

CREATE TABLE Post (
    postID                  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    categoryID              int NULL,
    postName                varchar(100),
    postContent             varchar(1000),
    postImage               varchar(255),
    lastModifiedPostDate    date NULL,
    lastModifiedPostTime    time NULL,
    backgroundColor         varchar(30),
    fontColor               varchar(30),
    fontType                varchar(30),
    stickyPost              boolean,
    FOREIGN KEY (userID) REFERENCES User (userID),
    FOREIGN KEY (categoryID) REFERENCES Category (categoryID)
);

CREATE TABLE Reply (
    replyID                 int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userID                  int NULL,
    postID                  int NULL,
    replyContent            varchar(1000) NULL,
    FOREIGN KEY (userID) REFERENCES User (userID),
    FOREIGN KEY (postID) REFERENCES Post (postID)
);

CREATE TABLE Tag (
    tagID                   int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    postID                  int NULL,
    replyID                 int NULL,
    tagName                 varchar(100),
    FOREIGN KEY (postID) REFERENCES Post (postID),
    FOREIGN KEY (replyID) REFERENCES Reply (replyID)
);

CREATE TABLE AccesLevel (
    accesLevelID            int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesName               varchar(100) NULL,
    accesDescription        varchar(255) NULL
);

CREATE TABLE UserAccesLevel (
    userID                  int NOT NULL,
    accesLevelID            int NOT NULL,
    CONSTRAINT pk_userAccesLevel PRIMARY KEY (userID, accesLevelID),
    FOREIGN KEY (userID) REFERENCES User (userID),
    FOREIGN KEY (accesLevelID) REFERENCES AccesLevel (accesLevelID)
);