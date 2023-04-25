# Naveksoft Test

## Table of contents
* [Technologies](#technologies)
* [General info](#general-info)
* [Requirements](#requirements)
* [Installation Guide](#installation-guide)
* [Usage](#usage)

## Technologies
Project is created with:
* PHP
* Laravel
* MySql
* Docker
* Composer
* Redis

## General info
The project is a Rest API that implements guestbook functionality.

## Requirements
* Composer
* Docker

## Installation Guide
* Clone the repository
```sh
git clone https://github.com/Pavel2906/ns-test.git
```

* Move into the ns-test directory:
```sh
cd ~/ns-test
```

* Run the following command from the terminal:
```sh
./run.sh
```

The API can now be accessed at http://localhost:8085/api

## Usage
#### Admin Credentials: email - admin@admin.com, password - admin123

* Api Endpoints

The API can now be accessed at http://localhost:8085

| HTTP Verbs | Endpoints            | Action                                                                                            |
|------------|----------------------|---------------------------------------------------------------------------------------------------|
| GET        | /sanctum/csrf-cookie | First make this request to initialize CSRF protection for the application.                        |
| POST       | /api/auth/register   | New User Registration. The body must contain the following fields: name, email, password.         |
| POST       | /api/auth/login      | Login. The body must contain the following fields: email, password.                               |
| POST       | /api/auth/logout     | Logout.                                                                                           |
| POST       | /api/reviews         | Create review. The body must contain the following fields: review(review description).            |
| POST       | /api/answers         | Create answer. The body must contain the following fields: answer(answer description), review_id. |
| GET        | /api/reviews         | Get paginated list of reviews.                                                                    | 
