# Library Management System

Welcome to our Library Management System! This repository contains the source code for a comprehensive library management system that includes features for user authentication, book borrowing, membership management, and book registration. Below is a detailed description of each feature and how it works.

## Features

### 1. User Login and Registration
**Developed by Sahansara**

#### `login.php`
- **Purpose**: Handles user login.
- **Functionality**:
  - Starts a session and checks if a user is already logged in.
  - Redirects to the admin panel if the user is already logged in.
  - Validates the username and password when the login form is submitted.
  - Sets a session variable for the user and redirects to the admin panel upon successful login.
  - Displays an error message if the credentials are incorrect.

#### `signup.php`
- **Purpose**: Handles user registration.
- **Functionality**:
  - Starts a session and checks if a user is already logged in.
  - Redirects to the admin panel if the user is already logged in.
  - Captures the username and password from the sign-up form.
  - (Placeholder for saving the credentials to a database).
  - Sets a session variable for the user and redirects to the admin panel upon successful registration.

### 2. Admin Section
**Developed by Gayantha**

#### `admin.php`
- **Purpose**: Displays the admin panel.
- **Functionality**:
  - Starts a session and checks if a user is logged in.
  - Redirects to the login page if the user is not logged in.
  - Displays a welcome message with the username and provides a logout link.

#### `user_delete.php`
- **Purpose**: Deletes a user from the system.
- **Functionality**:
  - Checks if the user ID to be deleted is provided.
  - Connects to the database.
  - Executes an SQL query to delete the user.
  - Closes the database connection and provides feedback on success or failure.

#### `user_update.php`
- **Purpose**: Updates user details.
- **Functionality**:
  - Checks if the user ID, name, and email are provided.
  - Connects to the database.
  - Executes an SQL query to update the user's details.
  - Closes the database connection and provides feedback on success or failure.

### 3. Book Registration
**Developed by Pasindu Lakruwan**

#### `book_registration_index.php`
- **Purpose**: Main page for registering new books.
- **Functionality**:
  - Provides a form to enter Book ID, Book Name, and Book Category.
  - Uses Bootstrap for styling and responsiveness.
  - Includes JavaScript to validate the Book ID format and update the hidden category ID.

#### `process.php`
- **Purpose**: Processes the book registration form submission.
- **Functionality**:
  - Retrieves form data and validates the Book ID format.
  - Adds the book data to the 'books' table in the database.
  - Displays error messages for any issues during registration, such as duplicate Book IDs.

#### `database_details.php`
- **Purpose**: Manages and displays registered books.
- **Functionality**:
  - Shows books in a table format.
  - Allows users to search for specific Book IDs, update book details, or delete records.
  - Ensures borrowed books cannot be deleted to maintain data integrity.

### 4. Membership Management
**Developed by Nipun**

#### Register Member
- **UI**: Provides a form for registering new members.
  - Uses Bootstrap and custom CSS for styling.
  - Includes JavaScript validation for member ID and email fields.
- **PHP**: Handles database connection and inserts data into the 'member' table.

#### Update Member
- **UI**: Similar to the registration form, used for updating member details.
  - Uses the same styles and JavaScript validation as the registration form.
- **PHP**: Handles database connection and updates member details in the 'member' table.

#### Delete Member
- **Functionality**:
  - HTML form allows library staff to enter the member ID.
  - JavaScript confirms deletion.
  - PHP script deletes the member from the database.

#### View Members
- **Functionality**:
  - Displays a table with member ID, first name, last name, birthday, and email address.
  - Uses HTML, PHP, and JavaScript to fetch and display member details.

## How to Use

1. **Clone the Repository**:
   ```sh
   git clone https://github.com/your-username/library-management-system.git
