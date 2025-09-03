# Cybersalt Userback Admin (Joomla Plugin)

A Joomla 5 System Plugin that injects the [Userback](https://userback.io) feedback widget into the **Joomla Administrator (backend)**.  
This makes it easy for administrators to capture feedback, report bugs, and share suggestions directly from the backend interface.

---

## ✨ Features

- Adds the Userback widget to Joomla's administrator area.
- Allows team members to submit visual feedback without leaving the backend.
- Configuration via plugin parameters — no template editing required.
- Safe guards to prevent backend crashes if no token is configured.

---

## 📦 Installation

1. **Download** this repository by:
   ```
   Code → Download ZIP
   ```

2. In Joomla Administrator, go to:
   ```
   System → Extensions → Install
   ```

3. Upload and install the zip file.
4. Go to:
   ```
   System → Manage → Plugins
   ```
   and search for **Cybersalt Userback Admin**.
5. Open the plugin, enter your **Userback Access Token**, and enable it.

---

## ⚙️ Configuration

- **Access Token**: Get your project access token from your Userback dashboard. Paste it into the plugin's **Access Token** field.
- **Enabling the Plugin**:
  - If you try to save the plugin without an access token, Joomla will block it and display an error message.
  - Once enabled with correct Acces token, the Userback widget will appear in your backend automatically.

---

## 🚀 Usage

1. Log into your Joomla Administrator.
2. The **Userback widget** should appear on the right-hand side of the screen.
3. Use the widget to:
   - Report bugs
   - Share screenshots
   - Annotate issues
   - Provide feedback
4. Submissions go directly into your Userback project.

---


## 🛠 Development

This plugin consists of:
- `userbackadmin.php` — main PHP logic
- `userbackadmin.xml` — manifest file for installation and configuration

Clone, fork, or contribute on GitHub!

---


## 📜 License

MIT License — feel free to use and modify.

---

## 👨‍💻 Author

Developed by **Cybersalt Consulting Ltd.**  
Helping Joomla sites gather feedback more efficiently.
