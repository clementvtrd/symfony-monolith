# Symfony Monolith Project

This project is a monolithic Symfony application that can be easily bootstrapped using Docker Compose.

## Prerequisites

Before getting started, make sure you have the following installed on your machine:

- Docker
- Docker Compose

## Getting Started

To bootstrap the project, follow these steps:

1. Clone the repository:

  ```bash
  git clone https://github.com/clementvtrd/symfony-monolith.git
  ```

2. Navigate to the project directory:

  ```bash
  cd symfony-monolith
  ```

3. Build and start the Docker containers:

  ```bash
  docker-compose up -d
  ```

4. Install project dependencies:

  ```bash
  docker-compose exec php composer install
  ```

5. Access the application in your browser:

  Open your browser and visit `https://localhost`.

## Additional Configuration

If you need to customize any configuration settings, you can modify the `.env` file located in the project root directory.
