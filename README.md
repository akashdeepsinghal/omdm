omdm
====

Online Movie Database Management System based on PHP


--------------------------------------------------------------------------------------------------------------------------------------------------------------------
Deployment Instructions
--------------------------------------------------------------------------------------------------------------------------------------------------------------------




--------------------------------------------------------------------------------------------------------------------------------------------------------------------
Description
--------------------------------------------------------------------------------------------------------------------------------------------------------------------
The Database Management System is based on PHP. The database is made in MySQL.
The website starts with the index.php file where intially the login status is checked. If the person is not logged in, the page is rediected to the login page.
The user has to login to access the information on the webpage. The files 'login.php' and 'checklogin.php' are used to get the username and password of the user and redirect it to the page according to the role of the person, i.e., Manager or Guest.



--------------------------------------------------------------------------------------------------------------------------------------------------------------------
Manager Role
--------------------------------------------------------------------------------------------------------------------------------------------------------------------After login, the manager chooses to 'Manage Movies' or 'Manage Theatres'. If 'Manage Movie' is chosen, a list of all the movies in the database is shown along with two button, "Edit" for editing the movie details and "Delete" for deleting the movie from the database. The files edit_movie.php and deletemovie.php are used for the purpose respectively.
If 'Manage Theatres' is chosen, the user can edit the details of the Theatre, Add or delete movies to a theatre and change the prices of movie tickets.
For inserting a new show for a movie, the insertshow.php file inserts the threatre id in the movies table and adds an entry in the shows table for the given show time.


--------------------------------------------------------------------------------------------------------------------------------------------------------------------
Guest Role
--------------------------------------------------------------------------------------------------------------------------------------------------------------------After login, the list of all the movies in the Database will be shown. Along with two button, "Edit" for editing the movie details and "Delete" for deleting the movie from the database. The files edit_movie.php and deletemovie.php are used for the purpose respectively.
The Guest can book a ticket of a movie by selecting a suitable theatre.
When the guest books the ticket, the number is seats available is reduced by the number of tickets booked and the amount corresponding to these tickets is added to the net profit of the Movie.


--------------------------------------------------------------------------------------------------------------------------------------------------------------------
File Description
--------------------------------------------------------------------------------------------------------------------------------------------------------------------
index.php : The main page where the movie list is shown.
connect.php : This page connects to the server and selects the database.
login.php : Takes the username and password input from the user and sends it to the checklogin.php for verification
checklogin.php : Checks the username and password and identifies its role, i.e., Manager or Guest and accordingly redirects it to the pages.
manager.php : After manager login it redirects the user to 'Manage Movie' page or 'Manage Theatre' page, according to the users choice.
manage_movies.php : A list of all the movies from the Database is shown. This page allows the manager to 'Add', 'Edit' or 'Delete' a movie.
edit_movie.php : This page allows to edit the attirbutes of a movie in the database except its 'Name' and 'Year'.
updatemovie.php : Takes the entires from the edit_movie.php page and updates in the database.
add_movie.php : This page allows the user to add a new movie in the database and fill in the movie's attribute information.
deletemovie.php : This page deletes the movie entry from the database, corresponding to the Movie selected.
register.php : This page allows the user to register in the database as a 'Manager' or 'Guest'. The details of the person are inputted along with his selected username and password.
insertshow.php : This page let the manager to add a new show for a movie in the selected theatre.
bookmyshow.php : This page allows the guest to book one to at max (4) to the tickets. This wil update the 
