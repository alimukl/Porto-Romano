# Secure Employee Data System

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)  
![Spatie](https://img.shields.io/badge/Spatie-Activity%20Log-blue?style=for-the-badge&logo=laravel&logoColor=white)  
![Encryption](https://img.shields.io/badge/Laravel-Crypt-green?style=for-the-badge&logo=laravel&logoColor=white)  
![OTP](https://img.shields.io/badge/Google%20OTP-2FA-yellow?style=for-the-badge&logo=google&logoColor=white)

This project is built using the **Laravel** PHP framework and focuses on securely managing employee information.  
It integrates multiple security components such as **Laravel Crypt** for encryption, **Google OTP** for two-factor authentication, and **Spatie Activity Log** for tracking user and system activities.  
**Role-Based Access Control (RBAC)** is implemented manually to maintain a lightweight and customized access control system.

> ⚠️ **USE BRANCH NAMED: ALIM**  
> This is the finalized and complete version of the system.

---

## 🛠 Framework & Tools Used

- **Laravel** – PHP Web Application Framework
- **Spatie Activity Log** – For logging actions and tracking activities
- **Laravel Crypt** – For encrypting sensitive data
- **Google OTP** – For two-factor authentication (2FA)
- **Custom RBAC** – Manually implemented Role-Based Access Control
- **Composer** – Dependency management

---

## 🚀 Installation

### 1. Prerequisites

Make sure you have the following installed:

- PHP >= 8.0
- Composer
- MySQL or any compatible database
- Git

---

### 2. Install Laravel (If not installed globally)

#### a. Install Laravel globally via Composer:

```bash
composer global require laravel/installer
