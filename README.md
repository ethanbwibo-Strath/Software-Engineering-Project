# Travel Management System

A comprehensive web-based travel management system that facilitates interaction between travelers, travel agents, administrators, and finance management.

## Project Overview

This system provides a platform for managing travel-related activities with different user roles and functionalities. The application is built using PHP, JavaScript, and CSS, with a MySQL database backend.

## Features

### User Roles

- **Traveller Module**
  - User registration and authentication
  - Trip browsing and booking
  - Account management
  - Personal travel history

- **Travel Agent Module**
  - Trip management
  - Booking handling
  - Client communication
  - AI-assisted travel planning

- **Admin Module**
  - User management
  - System monitoring
  - Content management
  - Access control

- **Finance Module**
  - Payment processing
  - Financial reporting
  - Transaction management

## Technical Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Dependencies**: Composer for PHP package management

## Directory Structure

```
├── Admin Module/          # Administrative functionality
├── Finance Module/        # Financial management system
├── Travel Agent Module/   # Travel agent interface
├── Traveller Module/      # Traveller user interface
├── database tables/       # Database structure and schemas
├── layouts/              # Shared layout templates
├── img/                  # Image assets
├── vendor/               # Composer dependencies
└── uploads/              # User uploaded files
```

## Setup Instructions

1. Install XAMPP or similar PHP development environment
2. Clone the repository to your web server directory
3. Import the database schema from the `database tables` directory
4. Configure database connection in `dbConnection.php`
5. Run `composer install` to install dependencies
6. Access the application through your web browser

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache recommended)
- Composer for dependency management

## Contributing

Please read our contributing guidelines before submitting pull requests to the project.

## License

This project is proprietary software. All rights reserved.

## Support

For support and queries, please contact the system administrators or raise an issue in the project repository.
