# Fruitkha

Fruitkha is an E-commerce project using the MVC (Model-View-Controller) architecture for online food product sales. The project aims to provide a comprehensive platform for selling food products, allowing shop owners and producers to showcase and sell their products easily online.

## Goal
The main goal of the "Fruitkha" project is to provide a complete online store for selling food products, making it easier for shop owners and producers to display and sell their products online, reaching a wide range of customers.

## Target Audience
- Food shop owners.
- Producers looking to showcase their food products online.
- Customers searching for a reliable platform to purchase food products.

## Key Features
- **User-Friendly Interface**: Provides a dedicated version for regular users to easily purchase products.
- **Product Categorization**: Products are divided into categories for easy browsing.
- **Comprehensive Admin Panel**: A dedicated version for project owners to manage products, categories, and users (admins).
- **High Security**: Uses Fortify Auth to secure the login and identity verification process.

## Technologies Used
- **Backend:** Laravel, MySQL
- **Frontend:** HTML, CSS, JavaScript, Bootstrap (using a pre-designed template called "Fruitkha" with custom modifications)
- **Admin Dashboard:** AdminLTE
- **Security:** Fortify Auth

## Project Status
The project is ready for use, and you can start displaying and selling food products through the platform.

## Getting Started
1. Clone the repository:
    ```bash
    git clone https://github.com/2yousefreda/fruitkha
    ```
2. Install dependencies:
    ```bash
    cd fruitkha
    composer install
    npm install
    ```
3. Set up the database:
    - Create a new database and update the database settings in the `.env` file.
    - Run the migrations:
    ```bash
    php artisan migrate
    ```

4. Run the application:
    ```bash
    php artisan serve
    ```



