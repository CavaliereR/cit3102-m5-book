# CIT3102 M5 — Book API

**Project:** `cit3102-m5-book`
**Section:** IT-2E
**Partners:** Sedilla, Robb Jason G. and Gacutan, Kevin Perez 
**Claimed resource:** Book

## 1. Project Setup

### Requirements

* PHP and Composer
* Laravel-compatible environment
* Git
* Bruno API client for running the API tests

### Installation

1. Clone the public GitHub repository:

   ```bash
   git clone https://github.com/YOUR-GITHUB-USERNAME/cit3102-m5-book.git
   ```

2. Enter the project directory:

   ```bash
   cd cit3102-m5-book
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Create your environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows PowerShell, use `Copy-Item .env.example .env` if needed.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure the database in `.env` to use SQLite. Ensure the SQLite database file exists at the configured path. For Laravel's default SQLite configuration, create `database/database.sqlite` if it is missing.

7. Run the database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the local development server:

   ```bash
   php artisan serve
   ```

9. The API will be available at `http://127.0.0.1:8000`.

## 2. API Routes

All Book CRUD routes require a valid Sanctum bearer token. Registration and login are public.

METHOD	PATH		    DESCRIPTION					                        TOKEN REQUIRED

POST	/api/register	    Register a user and issue an API token          No
POST	/api/login	        Authenticate a user and issue an API token	    No
POST	/api/logout	        Revoke the current API token			        Yes
GET	    /api/me	            Return the authenticated user				    Yes
GET	    /api/books	        List books; supports title and author filters	Yes
POST	/api/books	        Create a book					                Yes
GET	    /api/books/{book}	Retrieve a specific book		                Yes
PUT	    /api/books/{book}	Update a book				                    Yes
DELETE	/api/books/{book}	Delete a book				                    Yes

## 3. Bruno Test Screenshots



1. Registration — expected `201 Created`
![alt text](image.png)
2. Login — expected `200 OK`
![alt text](image-1.png)
3. List books without a token — expected `401 Unauthorized`
![alt text](image-2.png)
4. List books with a token — expected `200 OK`
![alt text](image-5.png)
5. Create a valid book — expected `201 Created`
![alt text](image-4.png)
6. Create a book with missing required fields — expected `422 Unprocessable Content`
![alt text](image-3.png)
7. Retrieve a book by ID — expected `200 OK`
![alt text](image-6.png)
8. Retrieve a nonexistent book — expected `404 Not Found`
![alt text](image-7.png)
9. Update a book — expected `200 OK`
![alt text](image-8.png)
10. Delete a book — expected `204 No Content`
![alt text](image-9.png)

## 4. Why DELETE Returns 204 Instead of 200

The difference between the two codes is quite simple. 200 OK is a response that includes a message body with data. All while a 204 No Content returns no body at all.
