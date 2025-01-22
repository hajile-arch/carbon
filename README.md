# 🍵 Kopitiam Management System

A modern web-based platform for managing traditional coffee shop operations, featuring online ordering, secure payments, and comprehensive admin controls.

![GitHub](https://img.shields.io/github/license/hajile-7/Assignment2)
![XAMPP](https://img.shields.io/badge/XAMPP-v7.4+-orange)

## ✨ Features

- 🛒 **Online Ordering**
  - Digital menu browsing
  - Real-time cart updates
  - Streamlined checkout process

- 💳 **Secure Payments**
  - Stripe integration
  - Multiple payment methods
  - Encrypted transactions

- 📱 **Responsive Design**
  - Mobile-optimized interface
  - Cross-platform compatibility
  - Intuitive user experience

- ⚙️ **Admin Dashboard**
  - Order management
  - Inventory control
  - Analytics reporting

## 🚀 Quick Start

### Prerequisites

- XAMPP (v7.4 or higher)
- Web browser (Chrome, Firefox, or Safari recommended)
- Stripe API keys

### Installation

1. Clone the repo
   ```bash
   git clone https://github.com/hajile-7/Assignment2.git
   ```

2. Set up XAMPP
   - Install XAMPP from [official website](https://www.apachefriends.org/)
   - Start Apache and MySQL services from XAMPP Control Panel

3. Project Setup
   - Copy project folder to `xampp/htdocs/` directory
   - Create database using phpMyAdmin
   - Import database file from `database/kopitiam.sql`

4. Configuration
   - Update database credentials in `config/database.php`
   - Configure Stripe API keys in payment settings

5. Access Application
   - Open web browser
   - Navigate to `http://localhost/Assignment2`

## 💻 Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL (via XAMPP)
- **Server**: Apache (via XAMPP)
- **Payments**: Stripe API

## 📖 Documentation

### For Customers
- Browse menu items
- Add to cart
- Complete checkout with Stripe

### For Administrators
- Access admin panel at `http://localhost/Assignment2/admin`
- Default admin credentials:
  - Username: `admin`
  - Password: `password123`
- Manage orders
- Update menu
- View analytics

## 🔧 Troubleshooting

Common issues and solutions:
- **Database Connection Error**: Verify database credentials in config file
- **404 Error**: Ensure project folder is in correct htdocs directory
- **XAMPP Services**: Confirm both Apache and MySQL are running
- **Permission Issues**: Check folder permissions in htdocs

## 🤝 Contributing

1. Fork it
2. Create feature branch
   ```bash
   git checkout -b feature/YourFeature
   ```
3. Commit changes
   ```bash
   git commit -m 'Add YourFeature'
   ```
4. Push to branch
   ```bash
   git push origin feature/YourFeature
   ```
5. Create Pull Request

## 📝 License

MIT License - see [`LICENSE.md`](LICENSE.md)

## 🆘 Support

Need help? 
- 📧 Email: support@kopitiam.com
- 🐛 Issues: Submit via GitHub Issues
- 💬 Discussions: Use GitHub Discussions tab

---
Made with ☕ by [hajile-7](https://github.com/hajile-7)
