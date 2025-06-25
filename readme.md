**Masomo School Management System** 

**SMS** this school management system is developed for educational institutions like schools and colleges built on Laravel 8

There are 7 types of user accounts. They include:
 
Administrators (Super Admin & Admin)
- Accountant
- Teacher
- Student
- Parent


**1. Requirements**
Before you begin, make sure the following are installed on your PC:

PHP ≥ 8.0

Composer – Dependency manager for PHP

MySQL – Database

Node.js & NPM – For frontend assets

Git (optional, for version control)

Laravel Installer (optional but recommended)

**2. Installation Guide**

**1. Download the Project**
Download and extract this project (lav_sms.zip) on your computer.

Open the extracted folder in your preferred code editor (e.g., VS Code).

**2. Install PHP Dependencies**
Open your terminal in the project directory and run:

bash
Copy
Edit
composer install

**3. Set Up Environment File**
Copy the example environment file:

cp .env.example .env
Open .env and set your database configuration:
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

**4. Generate App Key**
php artisan key:generate

**5. Create the Database**
Create a MySQL database manually using phpMyAdmin or CLI.

**6. Run Migrations and Seeders**
php artisan migrate --seed
This will create tables and insert some default data including users.

**7. Install Node Modules and Compile Assets**
npm install
npm run dev

**8. Serve the Project**
php artisan serve
Visit http://127.0.0.1:8000 in your browser.

🔐 Default Login Credentials
You can log in using any of these default users:

➤ Super Admin
Email: jeff@super.com

Password: 123456789

➤ Admin
Email: jeff@admin.com

Password: 123456789

➤ Teacher
Email: jeff@teacher.com

Password: 123456789

➤ Parent
Email: jeff@parent.com

Password: 123456789

➤ Accountant
Email: jeff@accountant.com

Password: 123456789

➤ Student
Email: jeff@student.com

Password: 123456789

You can change or add more users via the admin dashboard after login.

**3. Project Structure Highlights**
app/ – Core app logic (models, controllers)

resources/views/ – Blade templates (HTML)

routes/web.php – Web routes

database/seeders/ – Default data setup