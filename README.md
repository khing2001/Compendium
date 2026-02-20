# 📚 Compendium

A lightweight, custom-built web application focused on structured content delivery, interactive logic handling, and modular architecture. **Compendium** is a "CMS-free" system designed to demonstrate the ability to build and maintain robust, non-WordPress websites from the ground up.



---

## 🚀 Quick Start

To test the application locally, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/your-username/compendium.git](https://github.com/your-username/compendium.git)
   cd compendium
Backend Setup:
In your first terminal, start the PHP server:

Bash
php artisan serve
Frontend Setup:
In a second terminal, start the development server:

Bash
npm run dev
Access the App:
Open your browser to http://localhost:8000 to create your account and explore the system.

🧐 Project Overview
Compendium is a modular front-end web system built without CMS frameworks. It focuses on:

Clean Semantic Structure: Utilizing HTML5 for accessibility and SEO.

Responsive Layouts: CSS3 designs powered by Flexbox and Grid.

State-Based Interactivity: JavaScript-driven logic for dynamic UI updates.

Form Handling: Robust validation and event-driven architecture.

Email Workflows: Logic prepared for integration with services like SendGrid or Mailchimp.

🛠 Technical Stack
Framework: Laravel 12.x

Frontend: HTML5, CSS3, Vanilla JavaScript (ES6+)

Build Tools: NPM / Vite

Architecture: Modular file structure with client-side state logic

💡 Core Capabilities Demonstrated
1. Interactive Logic Handling
Multi-Step Inputs: Handling complex user journeys and multi-stage forms.

Conditional Calculation: JavaScript-driven results based on user selection.

Dynamic DOM Updates: Real-time interface updates without full page reloads.

Defensive Programming: Robust error handling to ensure a smooth user experience.

2. Secure Content Access Patterns
Gated Content: Logic for email-gated or token-based download flows.

File Access Control: Patterns for preventing direct asset exposure and securing PDF delivery.

3. Maintainability Focus
Clean Naming Conventions: Intuitive file and variable naming.

Logical Folder Separation: Decoupled frontend assets and backend logic.

Documentation: Code is comment-documented for easy debugging and scaling.

📂 Folder Structure
/app - Backend logic, Models, and Controllers

/resources - Frontend assets, templates, and JavaScript modules

/routes - API and Web endpoint definitions

/public - Compiled assets and entry points
