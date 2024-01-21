# PHP Web Application

This is a PHP web application with authentication and age verification features.

## Project Structure

The project has the following structure:

├── docker-compose.yaml 
├── php/ │ 
├── assets/ │ 
│ ├── auth/ │ 
│ │ ├── goback.php │ 
│ │ ├── search.php │ 
│ │ └── verify.php │ 
│ ├── css/ │ 
│ │ ├── style.css │ 
│ │ └── underAge.css │ 
│ ├── images/ │ 
│ ├── js/ │ 
│ │ └── preloader.js │ 
│ └── php/ │ 
│ ├── dbConfig.php │
│ ├── head.php │ 
│ ├── modals.php │ 
│ ├── navbar.php │ 
│ └── preloader.php │ 
├── Dockerfile │ 
└── index.php 
├── login/ │ 
├── login.php │ 
├── logout.php │ 
├── passwordReset.php │ 
└── register.php │ 
├── underAge.php │ 
└── verifyAge.php│ 

## Setup

To set up the project, you need to have Docker installed. Run the following command to start the application:

```sh
docker-compose up
```

Features
User authentication (login, logout, password reset, registration)
Age verification
```
