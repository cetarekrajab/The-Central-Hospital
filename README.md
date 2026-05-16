# The Central Hospital Web Portal

## Overview

The Central Hospital is a full-stack hospital web portal developed to provide patients and visitors with an easy-to-use healthcare platform. The website includes hospital information pages, doctor search functionality, appointment booking, and contact forms integrated with a MySQL database.

This project demonstrates frontend and backend web development using HTML, CSS, JavaScript, PHP, and MySQL.

---

## Features

* Multi-page responsive hospital website
* Doctor search by name or department
* Dynamic appointment booking system
* Contact and message forms
* Secure PHP backend using prepared statements
* MySQL database integration
* Interactive frontend using JavaScript
* Tailwind CSS-based appointment booking interface

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

```sql id="d1h9r2"
central_hospital
```

Main Tables:

* messages
* appointments

---

## Project Structure

```bash id="w2l6xn"
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

1. Install XAMPP
2. Start Apache and MySQL
3. Place the project folder inside:

```bash id="n8j4kp"
htdocs
```

4. Import the SQL database using phpMyAdmin
5. Open the project in your browser:

```bash id="a4s9tm"
http://localhost/The-Central-Hospital
```

---

## Key Functionalities

### Doctor Search

Users can search doctors by:

* Name
* Department

### Appointment Booking

* Multi-step booking interface
* Dynamic time slot selection
* Client-side validation
* Database storage

### Contact Form

* Stores user messages in MySQL
* Uses secure prepared statements

---

## Future Improvements

* Admin dashboard
* Real-time appointment availability
* User authentication system
* Online patient profiles
* External CSS refactoring
* Email notification system

---

## Author

Tarek Rajab

---

## License

This project is licensed under the MIT License.
