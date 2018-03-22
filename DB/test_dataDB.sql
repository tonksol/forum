INSERT INTO `user` (`userID`, `firstName`, `prefix`, `lastName`, `birthdate`, `userImage`, `email`, `userName`, `userPassword`, `themePreferences`, `quote`) 
VALUES
    (1, NULL, NULL, NULL, NULL, NULL, 'frederik@somnet.dk', 'FrederikTheAlmighty', 'passit', NULL, NULL),
    (2, NULL, NULL, NULL, NULL, NULL, 'fred3331@easv365.dk', 'Freddy', '$2y$15$Ka17cApL3pLwFpHYMfrab.AuzrpNvG.9FSZOr3VP92z', NULL, NULL),
    (3, NULL, NULL, NULL, NULL, NULL, 'some@email.dk', 'Friedrich', '$2y$15$mx0VIdJrtzw8j46iRcVeru1hOrsM9jfoyC0OLCFmoa69R2sstAdQi', NULL, NULL),
    (4, 'Arthur', 'the', 'King', NULL, '', 'arthur@king.com', 0, 'THE_KING', '$2y$15$6V/JfNLVBS4tAXX2wb7t6.vbwfrik7DRAWn6tsQOwJkokKxaV0qvu', '', 'I have knights at my round table!'');

    INSERT INTO `category` (`categoryID`, `topicID`, `categoryName`, `categoryDescription`, `imgpath1`, `imgpath2`, `imgpath3`) 
    VALUES
        (1, 1, 'Dungeons and Dragons', 'Venture into the dangerous world of dungeons and dragons!', 'images/dnd1.jpg', 'images/dnd2.jpg', 'images/dnd3.jpg'),
        (2, 2, 'CategoryTwo', 'CategoryTwo is here!', 'images/dummy.jpg', 'images/dummy.jpg', 'images/dummy.jpg'),
        (3, 3, 'Category 3', 'Category Three is here!', 'images/dummy.jpg', 'images/dummy.jpg', 'images/dummy.jpg');


INSERT INTO `topic` (`topicID`, `topicName`, `topicDescription`) 
VALUES
    (1, 'TopicTestOne', 'The first sample topic'),
    (2, 'TopicTestTwo', 'A second topic test'),
    (3, 'TopicTestThree', 'A third topic test');