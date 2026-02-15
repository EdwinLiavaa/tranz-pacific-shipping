# Tranz Pacific Shipping

A comprehensive shipping and inventory management system built for Pacific logistics operations. This application streamlines container shipping, order management, invoicing, and inventory tracking with a modern, intuitive interface.

<p align="center">
  <img width="1000" src="https://github.com/EdwinLiavaa/tranz-pacific-shipping/blob/main/welcome.png" alt="Welcome Screen">
</p>

## Dashboard

<p align="center">
  <img width="1000" src="https://github.com/EdwinLiavaa/tranz-pacific-shipping/blob/main/dashboard.png" alt="Dashboard">
</p>

## Features

- **Shipping Management** - Track manifests, shipments, and containers
- **Customer & Supplier Management** - Maintain detailed records for all business partners
- **Product Inventory** - Manage products with categories, units, and barcode generation
- **Quotations** - Create and manage customer quotations
- **Order Processing** - Handle orders from creation to completion with due tracking
- **Purchase Management** - Track purchases with approval workflows and reporting
- **Point of Sale (POS)** - Integrated POS system with shopping cart functionality
- **Invoicing** - Generate and download invoices
- **User Management** - Role-based user accounts with profile settings
- **Import/Export** - Bulk product import and export via spreadsheets

## Tech Stack

- **Framework**: Laravel 10
- **Frontend**: Livewire 3, Tabler UI, Tailwind CSS
- **Database**: MySQL
- **Build Tool**: Vite
- **Key Packages**:
  - `livewire/livewire` - Reactive components
  - `power-components/livewire-powergrid` - Data tables
  - `phpoffice/phpspreadsheet` - Excel import/export
  - `picqer/php-barcode-generator` - Barcode generation

## Requirements

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/EdwinLiavaa/tranz-pacific-shipping.git
   cd tranz-pacific-shipping
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database** - Update `.env` with your MySQL credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tranz_pacific_shipping
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

## Development

For local development with hot reloading:

```bash
npm run dev
```

## Testing

```bash
php artisan test
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

**Edwin Liava'a** - [GitHub](https://github.com/EdwinLiavaa)

---

<p align="center">Built with ❤️ for the Pacific</p>
