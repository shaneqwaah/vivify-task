# Task Management System with Laravel and Livewire

This is a simple web-based task management system built using Laravel and Livewire. It allows users to perform CRUD operations on tasks, manage their status, and interact with them in real-time.

## Features

- Create, Read, Update, and Delete (CRUD) operations for tasks
- Interactive task management with real-time updates using Livewire
- Validation for task creation and updates
- Task status management (To Do, In Progress, Done)

## Technologies Used

- Laravel 8.x
- Livewire
- Tailwind CSS
- MySQL

## Installation

1. Clone the repository to your local machine:

   ```bash
   git clone <repository-url>


Navigate to the project directory:

bash
Copy code
cd task-management-system
Install PHP dependencies using Composer:

bash
Copy code
composer install
Copy the .env.example file to .env and configure your environment variables, including your database settings.

Generate an application key:

bash
Copy code
php artisan key:generate
Run database migrations:

bash
Copy code
php artisan migrate
Serve the application:

bash
Copy code
php artisan serve
Access the application in your browser at http://localhost:8000.

Usage
Navigate to the Task Management System dashboard.
Create tasks by entering a title, description, and selecting a status.
View tasks in a list format with options to edit, delete, and mark as complete.
Edit tasks by clicking the "Edit" button and making changes to the task details.
Delete tasks by clicking the "Delete" button.
Mark tasks as complete by clicking the checkbox icon.
Contributing
Contributions are welcome! Please follow the GitHub Flow when submitting pull requests.

Fork the repository
Create a new branch (git checkout -b feature/new-feature)
Commit your changes (git commit -am 'Add new feature')
Push to the branch (git push origin feature/new-feature)
Create a new Pull Request
