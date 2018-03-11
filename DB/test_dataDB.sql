INSERT INTO User (firstName, prefix, lastName, birthdate, email, userName, userPassword, themePreferences, quote)
    VALUES

userID                  int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName               varchar(100) NULL,
    prefix                  varchar(30) NULL,
    lastName                varchar(100) NULL,
    birthdate               date NULL,
    userImage               varchar(255) NULL,
    email                   varchar(255) NULL,
    userName                varchar(255) NULL,
    userPassword            varchar(50) NULL,
    themePreferences        varchar(255) NULL,
    quote    