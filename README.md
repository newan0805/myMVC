# PHP MVC Framework

## Overview

This is a basic implementation of the Model-View-Controller (MVC) design pattern using PHP and MySQL. The structure aims to provide a clean separation of concerns, making it easier to manage and scale your web application.

## Project Structure

The project directory is organized as follows:

- `assets/`  
  Contains static assets like CSS, JavaScript, and images.

- `controllers/`  
  Holds the PHP files responsible for handling the user input, interacting with the model, and passing data to the views.

- `db/`  
  Includes database connection files and configuration.

- `includes/`  
  Contains common files included across the application, such as configuration files and utility functions.

- `models/`  
  Contains the PHP classes that represent the data structure and handle data operations, such as fetching and storing data in the database.

- `views/`  
  Holds the PHP files responsible for rendering the output to the user. These files are responsible for displaying the data passed from the controllers.

- `index.php`  
  The entry point of the application. This file initializes the framework and routes requests to the appropriate controllers.

- `README.md`  
  This file. Provides an overview and documentation for the project.

## Setup

1. **Clone the Repository:**

   ```bash
   git clone <repository_url>
