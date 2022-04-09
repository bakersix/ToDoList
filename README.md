<div id="top"></div>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

<div align="center">

<h3 align="center">To-Do List</h3>

  <p align="center">
    To-Do List is a simple auth application designed to allow users to create and assign tasks
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li>
      <a href="#api-reference">API Documentation</a>
      <ul>
	<li><a href="#authentication">Authentication</a></li>
	<li><a href="#task-management">Managing Tasks</a></li>
      </ul>
    </li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

### Built With

* [Laravel](https://laravel.com)
* [Bootstrap](https://getbootstrap.com)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* Apache
  ```sh
	sudo apt install apahce2
  ```
* MySQL
  ```sh
	sudo apt install mysql
  ```
* PHP
  ```sh
	sudo apt install openssl php-common php-curl php-json php-mbstring php-mysql php-xml php-zip
  ```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/bakersix/ToDoList.git
   ```
2. Configure the .env file
   ```sh
   APP_URL=

   DB_CONNECTION=mysql
   DB_HOST=
   DB_PORT=
   DB_DATABASE=
   DB_USERNAME=
   DB_PASSWORD=    
   ```
3. Populate the Database
   ```sh
   php artisan migrate
   ```
<p align="right">(<a href="#top">back to top</a>)</p>

## API Documentation

This project also includes simple api endpoints for all task operations on the site

### Authentication

API Authentication is completed via an Auth Bearer Token. This token can be retrieved with a valid Email/Password that has been registered with the site.

   ```sh
   curl --location --request POST 'http://{your_server}/api/login?email={email}&password={password}'
   Response:
      {"access_token":"{your_token}","token_type":"Bearer"}
   ```
### Managing Tasks

The following endpoints are allowed:
   ```sh
   GET: /api/tasks (Returns a list of all tasks for the authenticated user)
   POST: /api/tasks {Required Parameters: title, user_id} {Optional Parameters: description, due_date} (Creates a new task assigned to the user_id)
   PUT: /api/tasks/{task_id}  {Required Parameters: title, user_id} {Optional Parameters: description, due_date} (Modifies the specified task)
   DELETE: /api/tasks/{task_id} (Deletes the specified task)  
   ```
<p align="right">(<a href="#top">back to top</a>)</p>
