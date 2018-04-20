#TO DO
- connection in function en call the the function instead of global $connection
- connection in the presistance layer

- alle users linken naar profilepage. Maar daar mag je alleen komen als je member bent. anders not a member pagina. 

- meer testdata

#POST
maken nieuwe post. imagePost vullen met blank.png

#USER
- check welke acces level de user heeft (alleen relevant voor de back-end)

# Sign up
- sign in -- authentication if the email is a real email (boolean) add a column in the database 
- geef de user ook een acceslevel by default. 
- geef de user ook een proflepic0.png by default 

# Log in
- build the code for remember my email for the login (logIn_form.php)
- if the user doesn't exsits send a message
- expire log in session after... https://stackoverflow.com/questions/20516969/automatic-logout-after-15-minutes-of-inactive-in-php?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa

#logout
- adding a logout page

#posts
- getdate() for new posts and getTime()
# category overview site.
- Number of threads/discussions (loaded from database)
- A newest discussions section (loaded from database)


#The front page must contain (loaded from database):
- Hot Discussions
- Create a new discussion - Latest Posts
- About the Forum
- Sticky posts
# Forum post with text styling and image upload
# A User profile page with all data stored in a Database, as advanced as you can build it. 
Could be:
- Simple user display with email, name, birthdate and rank/access level, badges.
- An advanced graphic representation of the user data.

Must include:
- User editable settings and information







# Information
PDO is also for diffrent databases
mysqli is only for MYSQL 


- put your logic in different files 
- insert into variable = back practice put it in a stored procedure. 
- topic en category omgedraaid
- post = discussion
- post->topic->category / category->topic->post

# Verslag
login
signup

login in popup modal
switch the button on navbar to login logout

- maked the user profile
- only give acces to the user profile if the user is logged in

- changed birthdate into birthday

- put all the queries into stored procedures to prefent SQL injection
- make the user information read only unless you are additing
- function for switching the submit and edit button
- resize the uploaded picture in uploadImage.php

- I add replyDate and replyTime to the reply table. Because the user want to know when somebody writes a reply.






