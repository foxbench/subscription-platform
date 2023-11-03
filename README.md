# Laravel Subscription Platform

This is a simple subscription platform implemented in Laravel, allowing users to subscribe to different websites and receive email notifications when new posts are published.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/subscription-platform.git
    ```

2. Install dependencies:

    ```bash
    cd subscription-platform
    composer install
    ```

3. Copy the `.env.example` file to create your own `.env` file:

    ```bash
    cp .env.example .env
    ```

4. Configure the database settings in the `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=your-database-host
    DB_PORT=your-database-port
    DB_DATABASE=your-database-name
    DB_USERNAME=your-database-username
    DB_PASSWORD=your-database-password
    ```

   Make sure to update the `MAIL_*` settings for email configuration.

5. Run migrations to set up the database:

    ```bash
    php artisan migrate
    ```

6. Seed the `websites` table with sample data:

    ```bash
    php artisan db:seed
    ```

7. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

   The application will be accessible at `http://127.0.0.1:8000`.

8. Run the queue worker to process background jobs:

    ```bash
    php artisan queue:work
    ```

## Usage

### Creating a Post

Use the following endpoint to create a new post for a specific website:

```bash
POST /posts/create

Parameters:
- website_id: (integer) The ID of the website
- title: (string) The title of the post
- description: (string) The description of the post
```

### Subscribing a User

Use the following endpoint to subscribe a user to a specific website:

```bash
POST /subscribe

Parameters:
- website_id: (integer) The ID of the website
- email: (string) The email address of the subscriber
```

### Postman Collection

https://documenter.getpostman.com/view/361951/2s9YXe7Pnk

## Additional Information

- Laravel version: 8.*
- PHP version: 7.* or 8.*
- Queue driver: Database (configured in `.env`)

---

Make sure to replace placeholders like `your-username`, `your-database-host`, etc., with your actual values. This README provides a basic guide for setting up and using the subscription platform. You can expand and customize it based on your specific requirements.
