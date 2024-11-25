# API Users

API Users is an API built with Laravel 11.31, allowing for user management. It exposes endpoints for performing CRUD (Create, Read, Update, Delete) operations on users.

## Prerequisites

Before you begin, make sure you have the following tools installed:

- **PHP 8.x or higher**
- **Composer** (for managing PHP dependencies)
- **Node.js and npm** (for managing JavaScript dependencies)
- **MySQL or another database management system compatible with Laravel**

## Installation

Follow the steps below to install and set up the API:

1. **Clone this repository**:
   ```bash
   git clone https://github.com/your-username/api_users.git

2. **Install PHP dependencies** :
   ```bash
   composer install

3. **Install the JavaScript packages** :
   ```bash
   npm install

4. **Create your .env file from the .env.example file:** :

5. **Run the migrations and seed the database** :
   ```bash
   php artisan migrate:fresh --seed

## Endpoints

Here are the available routes to interact with the API:

- **GET | HEAD** `/api/users` : Retrieves the list of all users.  
  **Action**: `users.index`  
  **Method**: `UserController@index`


- **POST** `/api/users` : Creates a new user.  
  **Action**: `users.store`  
  **Method**: `UserController@store`


- **GET | HEAD** `/api/users/{user}` : Retrieves information for a specific user.  
  **Action**: `users.show`  
  **Method**: `UserController@show`


- **PUT | PATCH** `/api/users/{user}` : Updates a specific user's information.  
  **Action**: `users.update`  
  **Method**: `UserController@update`


- **DELETE** `/api/users/{user}` : Deletes a specific user.  
  **Action**: `users.destroy`  
  **Method**: `UserController@destroy`

## Testing

If you wish to test the API, you can use tools like **Postman** or **cURL** to send HTTP requests.

Example requests:

- **Retrieve all users (GET)**:
  ```bash
  curl -X GET http://localhost:8000/api/users
