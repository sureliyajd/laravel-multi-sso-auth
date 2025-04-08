# Laravel SSO Integration

A real-world Laravel application that demonstrates how to implement Single Sign-On (SSO) using popular identity providers such as Microsoft, Google, and Okta.

## 🚀 Overview

This project showcases how to integrate OAuth2/OpenID Connect-based authentication into a Laravel application using Socialite and custom SSO drivers. It provides a flexible structure to support multiple enterprise-grade authentication providers for seamless user login.

## 🔐 Features

- SSO login with:
  - Microsoft (Azure AD)
  - Google
  - Okta
- Dynamic provider-based routing
- Custom OAuth2 driver support
- Secure token validation and user session management
- Middleware-based route protection
- Clean separation of auth logic per provider

## 🧩 Tech Stack

- Laravel 10.x
- Laravel Socialite
- PHP 8.2
- MySQL
- OAuth2 / OpenID Connect

## 🗂️ Folder Highlights

- `app/Services/SSO/` — Handles provider-specific logic (Microsoft, Google, Okta)
- `routes/web.php` — Auth routes using dynamic SSO endpoints
- `config/services.php` — Provider credentials and configuration
- `app/Http/Controllers/Auth/SSOController.php` — Main login and callback handler

## 📌 Use Cases

- Enterprise-grade applications requiring federated login
- B2B SaaS apps targeting corporate clients using SSO
- Internal tools needing secure identity provider integration

## 📸 Demo Screenshots

*Login screen with multiple SSO provider options*  
![Login Screen](screenshots/login-options.png)

*Redirect to Microsoft login*  
![Microsoft SSO](screenshots/microsoft-login.png)

*Successful login callback with user info*  
![Callback](screenshots/sso-callback.png)
