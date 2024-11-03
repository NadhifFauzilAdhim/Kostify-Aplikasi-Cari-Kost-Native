<div align="center">
  <img height="200" src="https://i.ibb.co.com/Gf6PnKW/Kostifyop.png" alt="Kostify logo" />
</div>

<h2 align="center">Kostify Native MVC</h2>

<div align="center">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40" alt="JavaScript logo" />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="PHP logo" />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" height="40" alt="Bootstrap logo" />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40" alt="HTML5 logo" />
</div>

---

## Features

- Login
- Register
- Forgot Password
- Email Verification with SMTP
- Dashboard
- Post, Edit, Delete Property
- Manage Resident
- Manage Payment
- Property Request
- Upload Images
- Payment Management

<div align="center" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
   <img height="300" src="https://i.ibb.co.com/74HfgNy/kostifyadv.png" alt="Kostify dashboard screenshot 1" />
   <img height="300" src="https://i.ibb.co.com/M126LT8/kostifyadv1.png" alt="Kostify dashboard screenshot 2" />
   <img height="300" src="https://i.ibb.co.com/jfjv2T5/kostifyadv2.png" alt="Kostify dashboard screenshot 3" />
</div>

---

## Installation

1. **Clone the Project**
   ```bash
   git clone https://github.com/yourusername/kostify.git
   ```
   
## Import Database

2. **Import Database MySql**
   ```bash
   kostifymaindatabase.sql
   ```
   For database access, please contact us at <a href="https://ndfproject.my.id">ndfproject.my.id</a>
   
## Modify Setting

3. **Modify the database settings in app/config/config.php as follows:**
   ```bash
   
    define('BASEURL','http://kostifynative.test/'); // BASE URL
    define('DB_HOST','localhost');                  // DB HOST
    define('DB_USER','root');                       // DB USERNAME
    define('DB_PASS','');                           // DB PASSWORD
    define('DB_NAME','kostifymaindatabase');        // DB NAME

   ```
## App Structure

```
└── 📁app
    └── 📁config
        └── config.php
    └── 📁controllers
        └── Dashboard.php
        └── ErrorController.php
        └── Home.php
        └── Login.php
        └── Logout.php
        └── Profile.php
        └── Register.php
    └── 📁core
        └── App.php
        └── Controller.php
        └── Database.php
        └── Flasher.php
        └── Mailer.php
    └── 📁models
        └── Dashboard_model.php
        └── Listing_model.php
        └── User_dashboard_model.php
        └── User_model.php
    └── 📁views
        └── 📁alllist
            └── listing.php
        └── 📁auth
            └── forgot_password.php
            └── login.php
            └── register.php
            └── reset_password.php
        └── 📁components
            └── 📁dashboard
                └── footer.php
                └── header.php
                └── sidebarnav.php
            └── footer.php
            └── header.php
            └── navbar.php
        └── 📁dashboard
            └── createpost.php
            └── editpost.php
            └── index.php
            └── payment.php
            └── paymentdetail.php
            └── post.php
            └── request.php
            └── resident.php
            └── residentdetail.php
            └── residentmgm.php
        └── 📁detail
            └── detail.php
        └── 📁error
            └── error403.php
            └── error404.php
        └── 📁home
            └── index.php
        └── 📁profile
            └── index.php
        └── 📁userdashboard
            └── myrent.php
            └── paymentoverview.php
            └── paymentprocess.php
            └── rent.php
            └── userindex.php
            └── userpayment.php
            └── userrequest.php
    └── .htaccess
    └── init.php
```


