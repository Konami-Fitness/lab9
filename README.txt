# lab9

To start off the lab, we used phpmyadmin's SQL text editor to make some initial database edits. We were able to create a database named websyslab9, along with a
table named courses and a table named students as per the specifications listed in Part 1. Using these tables, we then came up with SQL commands to add certain
columns, create a grades table, insert courses, insert students, insert grades, list students based on lexicographical order, list all students who had a grade in
any course above a 90, list out average grade in each course, and list out the number of students in each course based on the part 2 specifications. The grades
table enables courses and students to be matched together as it employs two foreign keys, one to crn of the courses table and one to rin of the students table. This
is convenient because whenever any changes are made to the foreign keys in their respective databases, the changes are cascaded to the grades table. (Michael)

Part 3:
1,2: For steps 1 and 2, we made an alter table function which would be able to add a single column given the parameters of table name, column name, column
type, not null decision, and autoincrement decision along with the PDO object. These parameter values were picked up in the form fields of the html and then on
submit of the alter button, the form field values are set to variables and the alterTable function is called. (Michael)

3: To allow the user to create a grades table, we put the sql code to create the table in a function which is called by clicking a button on the page. When clicked,
this function will create the grades table without the user needing to type in any information from a form. This was to ensure that the user correctly input
information for the table which was needed for later parts of the lab all in an extemely convenient manner. (Michael & Teddy)

4,5,6: For the insert functions, we added insert form fields for each of the tables because they have different numbers of fields. The user can type in the data in
each field and click the submit button when done to add their changes to the database. Our php file takes the post value from the form and based on that, assigns
the appropriate number of variables based on the number of input fields. Then those variables are concatenated into a SQL query which is executed to perform the
change to the database. (Teddy & Shane)

7,8,9,10: For each of the lists, we put the sql code into a function, followed by foreach and print_r statements for the output. Then, we called these functions in
our HTML to output the lists onto the page. (Shane & Michael)

Creativity
For creativity, we created functions for each button operation for the benefits of separations of concerns which also helped us to better organize our code.
(Michael, Teddy, Shane) We also used a try catch block to check if submit buttons were clicked wth the proper values to make sure that only a single operation would
run (Shane). If the user failed to input the proper data types, php would throw an exception, rather than crashing the site or corrupting the database. We also used
CSS to display the forms in a clear column with respective headers so the user could easily identify which information was needed for each command. Finally, we left
list the databases at the top of the page so users can see how each button impacts the database tables. (Teddy)
