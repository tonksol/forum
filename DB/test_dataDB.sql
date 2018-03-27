USE boardgames_db;

INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthdate`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (1, NULL, NULL, NULL, NULL, NULL, 'frederik@somnet.dk', 'FrederikTheAlmighty', 'passit', NULL, NULL);


INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthdate`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (2, NULL, NULL, NULL, NULL, NULL, 'fred3331@easv365.dk', 'Freddy', '$2y$15$Ka17cApL3pLwFpHYMfrab.AuzrpNvG.9FSZOr3VP92z', NULL, NULL);

INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthdate`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (3, NULL, NULL, NULL, NULL, NULL, 'some@email.dk', 'Friedrich', '$2y$15$mx0VIdJrtzw8j46iRcVeru1hOrsM9jfoyC0OLCFmoa69R2sstAdQi', NULL, NULL);

INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthdate`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (4, 'Arthur', 'the', 'King', NULL, '', 'arthur@king.com', 'THE_KING', '$2y$15$6V/JfNLVBS4tAXX2wb7t6.vbwfrik7DRAWn6tsQOwJkokKxaV0qvu', '', 'I have knights at my round table!');



INSERT INTO `topic` (`topicID`, `topicName`, `topicDescription`) 
VALUES
    (1, 'TopicTestOne', 'The first sample topic');

INSERT INTO `topic` (`topicID`, `topicName`, `topicDescription`) 
VALUES
    (2, 'TopicTestTwo', 'A second topic test');

INSERT INTO `topic` (`topicID`, `topicName`, `topicDescription`) 
VALUES
    (3, 'TopicTestThree', 'A third topic test');


    

INSERT INTO `category` (`categoryID`, `topicID`, `categoryName`, `categoryDescription`, `img_path1`, `img_path2`, `img_path3`) 
VALUES
    (1, 1, 'Dungeons and Dragons', 'Venture into the dangerous world of dungeons and dragons!', 'images/dnd1.jpg', 'images/dnd2.jpg', 'images/dnd3.jpg');
    
INSERT INTO `category` (`categoryID`, `topicID`, `categoryName`, `categoryDescription`, `img_path1`, `img_path2`, `img_path3`) 
VALUES        
    (2, 2, 'CategoryTwo', 'CategoryTwo is here!', 'images/dummy.jpg', 'images/dummy.jpg', 'images/dummy.jpg');
    
INSERT INTO `category` (`categoryID`, `topicID`, `categoryName`, `categoryDescription`, `img_path1`, `img_path2`, `img_path3`) 
VALUES
    (3, 3, 'Category 3', 'Category Three is here!', 'images/dummy.jpg', 'images/dummy.jpg', 'images/dummy.jpg');




