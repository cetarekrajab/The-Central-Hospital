# The Central Hospital Web Portal

## Overview

The Central Hospital is a full-stack hospital web portal developed using HTML, CSS, JavaScript, PHP, and MySQL. The project provides patients and visitors with an easy-to-use healthcare platform that includes hospital information, doctor search, appointment booking, and contact form functionality.

The system demonstrates frontend and backend web development concepts along with database integration and dynamic client-side functionality.

---

## Features

* Multi-page hospital website
* Doctor search by name or department
* Appointment booking system
* Contact and message forms
* PHP backend integration
* MySQL database connectivity
* Dynamic JavaScript functionality
* Tailwind CSS appointment interface
* Form validation and database storage

---

## Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript (ES6+)
* Tailwind CSS

### Backend

* PHP 8

### Database

* MySQL

### Development Environment

* XAMPP

---

## Pages Included

* Home.html
* AboutUs.html
* OurServices.html
* FindADoctor.html
* ContactUs.html
* SendUsAMessage.html
* BookAnAppointment.html

---

## Backend Files

* contact.php
* book_appointment.php

These files handle:

* Contact form submissions
* Appointment booking requests
* Database communication
* Data validation and insertion

---

## Database Structure

Database Name:

```sql id="v5l9ks"
central_hospital
```

Main Tables:

* messages
* appointments

---

## Project Structure

```bash id="b4p7xr"
The-Central-Hospital/
│
├── README.md
├── LICENSE
├── .gitignore
│
├── Home.html
├── AboutUs.html
├── OurServices.html
├── FindADoctor.html
├── ContactUs.html
├── SendUsAMessage.html
├── BookAnAppointment.html
│
├── contact.php
├── book_appointment.php
│
├── database/
│   ├── schema.sql
│   └── insert_queries.sql
│
├── assets/
├── screenshots/
│
└── report/
    └── The_Central_Hospital_Report.pdf
```

---

## How to Run the Project

1. Install XAMPP on your system.

2. Start both:

* Apache
* MySQL

from the XAMPP Control Panel.

3. Put all project files in the same folder inside:

```bash id="s9x3mt"
htdocs
```

Example:

```bash id="j2w8qp"
xampp/htdocs/The-Central-Hospital
```

4. Open phpMyAdmin and create a database named:

```sql id="n6f1zd"
central_hospital
```

5. Import the SQL database file into the database.

6. Open your browser and run:

```bash id="q3r7vl"
http://localhost/The-Central-Hospital
```

7. The website should now run locally with:

* Doctor search
* Appointment booking
* Contact forms
* PHP backend integration
* MySQL database support

---

## Key Functionalities

### Doctor Search

Users can search doctors by:

* Name
* Department

### Appointment Booking

* Multi-step booking interface
* Dynamic time slot selection
* Form validation
* Database storage

### Contact Form

* Stores user messages in MySQL
* Uses PHP backend handling

---

## Future Improvements

* Admin dashboard
* Real-time appointment availability
* User authentication system
* Patient account management
* External CSS refactoring
* Email notification system

---

## Author

Tarek Rajab

---

## License

This project is licensed under the MIT License.
