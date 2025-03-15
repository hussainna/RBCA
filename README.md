# Laravel Roles and Permissions API

This Laravel project provides a robust implementation of roles and permissions with advanced features such as dynamic role assignment, audit trail, and API documentation. The system is designed to store roles and permissions in the database, and users can have multiple roles with immediate updates to their roles and permissions.

## Features

- **Roles & Permissions**: Stored in the database and manageable via API endpoints.
  - Permissions support CRUD operations at the record level.
- **Dynamic Role Assignment**: Users can have multiple roles, and changes take immediate effect without re-authentication.
- **Audit Trail**: Comprehensive auditing of who made each change, the before-and-after state, and timestamps.
- **API Documentation**: Clear and concise documentation via Swagger/OpenAPI.
- **Security & Validation**: Includes rate-limiting and protection against unauthorized access.

## Prerequisites

Before you get started, ensure you have the following installed:

- PHP (8.0 or higher)
- Composer
- Laravel (latest stable version)
- MySQL or another compatible database
- Node.js (for running front-end assets)
- Swagger (for API documentation)

## Setup Instructions

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/yourusername/laravel-roles-permissions.git
cd laravel-roles-permissions
