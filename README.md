
# Order Management

This system allows users to submit their requests and display them to the managers in the company.
It allows managers to view the submitted requests, study their status, and approve or reject these requests.
The site administrator can add new users (managers - users) or deactivate the accounts of current users and monitor the application in general.


## Getting Started

### Prerequisites

Before you begin, ensure you have met the following requirements:
- [Composer](https://getcomposer.org/) installed
- PHP version >= 7.x
- MySQL server or any other supported database

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Ghaith-Zabadneh/order_management.git
   ```

2. Navigate to the project directory:

   ```bash
   cd order_management
   ```

3. Install the project dependencies using Composer:

   ```bash
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the database connection settings and other configuration options as needed:

   ```bash
   cp .env.example .env
   ```

5. Generate a new application key:

   ```bash
   php artisan key:generate
   ```

6. Run database migrations and seeders:

   ```bash
   php artisan migrate --seed
   ```

7. Start the development server:

   ```bash
   php artisan serve
   ```

The project should now be accessible at `http://127.0.0.1:8000`.

## Usage


Upon completing these steps, three accounts will be generated:

User account:
Email: user@user.com
Password: password

Manager account:
Email: employee@employee.com
Password: password

Application administrator account:
Email: admin@admin.com
Password: password

Additionally, five experimental dummy requests will be generated.

Go ahead and enjoy exploring the application, and please let me know your feedback if you have any observations.

