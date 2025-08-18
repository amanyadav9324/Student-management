
# 🎓 Student Record Management System (PHP)

A web-based application to manage students, courses, and subjects efficiently.  
This system provides role-based access for administrators to handle student records, add/edit courses, manage subjects, and monitor student data.

---

## 🚀 Features

- 🔐 **Authentication**
  - Admin login, registration, password recovery
  - Session handling and secure logout

- 👩‍🎓 **Student Management**
  - Add, edit, delete, and manage student records
  - Assign students to courses and subjects

- 📚 **Course & Subject Management**
  - Add, edit, delete courses
  - Add and manage subjects linked with courses

- 📊 **Dashboard**
  - Overview of students, courses, and subjects
  - Quick navigation via sidebar

- ⚡ **User Profile**
  - Admin profile management
  - Password change functionality

---

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP (Core PHP)
- **Database**: MySQL
- **Dependencies**: Bootstrap (via Bower components)

---

## 📂 Project Structure

```
Student-Record-Management-System-PHP/
│── SQL File/
│   └── studentrecorddb.sql        # Database schema
│
│── studentrecordms/
│   ├── add-course.php             # Add new course
│   ├── add-subject.php            # Add new subject
│   ├── admin-profile.php          # Admin profile management
│   ├── change-password.php        # Change password
│   ├── dashboard.php              # Dashboard
│   ├── edit-course.php            # Edit course details
│   ├── edit-student.php           # Edit student details
│   ├── edit-subject.php           # Edit subject details
│   ├── index.php                  # Login page
│   ├── logout.php                 # Logout logic
│   ├── manage-courses.php         # Manage all courses
│   ├── manage-students.php        # Manage all students
│   ├── manage-subjects.php        # Manage all subjects
│   ├── register.php               # Admin registration
│   ├── password-recovery.php      # Forgot password
│   ├── session.php                # Session handling
│   ├── leftbar.php                # Sidebar UI
│   └── bower_components/          # Bootstrap & dependencies
```

---

## 🔎 Detailed Modules

### 1. Authentication & Session
- `index.php` → Login page  
- `register.php` → Register a new admin  
- `password-recovery.php` → Forgot password functionality  
- `session.php` → Manages session authentication  
- `logout.php` → Secure logout  

### 2. Admin Profile
- `admin-profile.php` → Admin can update personal details  
- `change-password.php` → Change password securely  

### 3. Student Management
- `manage-students.php` → View, edit, and delete student records  
- `edit-student.php` → Update student details  

### 4. Course & Subject Management
- `add-course.php` → Add new courses  
- `edit-course.php` → Update course details  
- `manage-courses.php` → List all courses  
- `add-subject.php` → Add subjects under courses  
- `edit-subject.php` → Modify subject details  
- `manage-subjects.php` → View and manage subjects  

### 5. Dashboard
- `dashboard.php` → Displays summary of students, courses, and subjects  

### 6. UI & Design
- Bootstrap-based responsive design  
- `leftbar.php` → Sidebar navigation for quick access  

### 7. Database
- SQL file: `studentrecorddb.sql`  
- Includes tables for:
  - Admins (`tbladmin`)
  - Students (`tblstudents`)
  - Courses (`tblcourses`)
  - Subjects (`tblsubjects`)  

---

## ⚙️ Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/Student-Record-Management-System-PHP.git
   ```

2. **Move the project to server directory**
   For XAMPP/WAMP/LAMP:
   ```
   htdocs/Student-Record-Management-System-PHP
   ```

3. **Import the Database**
   - Open **phpMyAdmin**
   - Create a database (e.g., `studentrecorddb`)
   - Import `SQL File/studentrecorddb.sql`

4. **Configure Database Connection**
   Update credentials in `includes/dbconnection.php`:
   ```php
   $con = mysqli_connect("localhost", "root", "", "studentrecorddb");
   ```

5. **Run the Project**
   Open in browser:
   ```
   http://localhost/Student-Record-Management-System-PHP/studentrecordms/
   ```

--- 

---

## 🤝 Contribution

Feel free to fork the project, raise issues, and submit pull requests.

---

## 📜 License

This project is open-source and available under the [Aman License](LICENSE).
