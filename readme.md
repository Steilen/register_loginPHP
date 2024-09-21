# Registration & Login System

## Project Description

This project is a simple user registration and login system built using PHP, MySQL, and JavaScript. It includes features for user registration, authentication, and logout, with form validation and protection against SQL injection.

### Key Features:

1. **User Registration**:
    - Users can create an account by filling out a registration form, which includes fields for username, email, and password.
    - The input data is validated, including checking if the passwords match.
    - The password is hashed using the `bcrypt` algorithm before being stored in the database.
    - After successful registration, the user is redirected to the main page.

2. **User Login**:
    - Users can log in to their account using their registered email and password.
    - The password is verified against the hashed password stored in the database.
    - Upon successful login, a session is activated for the user, and they are redirected to the main page.
    - If the credentials are incorrect, an error message is displayed.

3. **Logout**:
    - Users can log out by clicking the "Logout" link on the main page. This ends the user’s session and redirects them to the login page.

4. **Main Page**:
    - The main page is accessible only to authenticated users. If a user is not logged in, they are redirected to the login page.

### File Structure:

- **index.php**: Main page containing the registration and login forms.
- **db.php**: File for connecting to the MySQL database.
- **logout.php**: Script to end the user session and log them out.
- **style.css**: Styles for the registration and login pages.
- **script.js**: Script that manages form switching (registration/login) and password match validation.
- **main.php**: The main page that is accessible only to logged-in users.

### JavaScript Functionality:

- In `script.js`, the code handles the switching between the registration and login forms when the corresponding buttons are clicked. The container element is assigned a class `right-panel-active` to activate the correct panel.
- JavaScript also handles password matching during registration. If the passwords don't match, a validation error is displayed.

### PHP Functionality:

- **session_start()**: Included in every PHP file to manage sessions.
- Registration is handled in the PHP block, where the data is validated and inserted into the database. The password is hashed before being stored.
- Login is processed by checking the user's password against the hashed password in the database. A session is created upon successful login.
- Authorization check: If the user is not logged in, they are redirected to the login page.

### Form Validation:

- Password validation is done both on the client side (with JavaScript) and on the server side (with PHP).
- Form input data is protected using the `mysqli_real_escape_string()` function to prevent SQL injection attacks.

### Database Integration:

- All user data (username, email, hashed password) is stored in a `users` table in a MySQL database.
- The database connection is handled via the `db.php` file, where the connection parameters (host, username, password, database name) are specified.

## Interface Overview

- **Registration Form**: The user inputs their name, email, password, and password confirmation. An error is shown if the passwords don’t match.
- **Login Form**: The user inputs their email and password to log in.
- **Main Page**: Upon successful login, the user is welcomed and given the option to log out.
