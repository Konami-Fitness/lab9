# lab9
# lab9

To start off the lab, we used phpmyadmin's SQL text editor to make some initial database edits. We were able to create a database named websyslab9, along with a table named courses and a table named students as per the specifications listed in Part 1. Using these tables, we then came up with SQL commands to add certain columns, create a grades table, insert courses, insert students, insert grades, list students based on lexicographical order, list all students who had a grade in any course above a 90, list out average grade in each course, and list out the number of students in each course based on the part 2 specifications. The grades table enables courses and students to be matched together as it employs two foreign keys, one to crn of the courses table and one to rin of the students table. This is convenient because whenever any changes are made to the foreign keys in their respective databases, the changes are cascaded to the grades table. 


Part 3:
4,5: For the insert functions, we added insert form fields for each of the tables because they have different numbers of fields. The user can type in the data in each field and 
click the submit button when done to add their changes to the database. Our php file takes the post value from the form and based on that, assigns the appropriate number of 
vairables based on the number of input fields. Then those variables are concatenated into a SQL query which is executed to perform the change to the database. 

1,2: For steps 1 and 2, we simply made an alter table function which would be able to add a single column given the parameters of table name, column name, column type, not null decision, and autoincrement decision along with the PDO object. These parameter values were picked up in the form fields of the html and then on submit of the alter button, the form field values are set to variables and the alterTable function is called. 

3: 


6:

7,8,9,10: For each of the lists, we put the sql code into a function, followed by foreach and print_r statements for the output. Then, we called these functions in our HTML to output the lists onto the page.


