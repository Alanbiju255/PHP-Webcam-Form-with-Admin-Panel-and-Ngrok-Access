# PHP Webcam Form with Admin Panel and Ngrok Access

## 📁 Project Structure
```
/html
├── index.html           ← Form for user input
├── upload.php           ← Handles data & image upload
├── admin.php            ← Admin dashboard
├── login.php            ← Admin login
├── logout.php           ← Admin logout
├── style.css            ← Styling
├── script.js            ← JS for image access
├── users/               ← Stored folders per user
├── admin/               ← Admin folder with credentials
│   └── creds.json
├── .htaccess            ← Apache config (optional)
└── backup.sh            ← Backup script
```

---

## 📌 Project Overview
This project allows users to submit their Name, Age, Number, Email, and a webcam image via browser. The data is saved locally in a Linux Apache server, structured into folders per user. Admin can log in securely to view/download all entries. Ngrok or port forwarding enables remote access.

---

## 🧰 Technologies Used
- HTML5/CSS3 (Frontend Form)
- JavaScript (Webcam API)
- PHP (Backend logic)
- Apache Web Server
- Ngrok (Remote Access)
- Crontab & Shell Script (Backups)


Use sessions to protect `admin.php`. Logout destroys session.

---

## 🖥️ admin.php (Admin Dashboard)
Lists all folders under `/users/`, reads `details.txt`, displays image, and offers download options.

---

## 🎨 style.css
Contains layout, buttons, form styling.

---

## ⚙️ script.js
Handles image capture from webcam and form submission.

---

## 🔁 Ngrok Setup
```bash
ngrok config add-authtoken <YOUR_TOKEN>
ngrok http 80
```
Use public URL like `https://abcd.ngrok.io`

---

## 🔒 .htaccess (Optional)
Deny access to sensitive folders like `/admin/` or `.json` files.

---

## 💾 backup.sh (Shell Backup Script)
```bash
#!/bin/bash
tar -czf backup_$(date +%F).tar.gz users/
```
Automate with crontab:
```bash
0 2 * * * /path/to/backup.sh
```

---

## 🌍 Port Forwarding (Alternative)
Configure via your router admin page:
- External Port: 8080 → Internal Port: 80
- Internal IP: 192.168.1.x

---

## 📝 License & Author
 Developed by  alan. Contributions welcome.
