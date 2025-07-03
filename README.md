# Team Winning Percentage Simulator

project to simulate matches between 4 teams. Each team has 1–4 players, and each player's status (alive, knocked, eliminations, zone) affects the team's calculated winning percentage.

---

---

- **Backend**: Laravel 10+
- **Frontend**: Vue 3 + Vite + Inertia.js
- **Styling**: TailwindCSS
- **Database**: MySQL or SQLite
- **API**: RESTful + Axios

---

## 📦 Installation

1. **Clone the repo**

```bash
git clone https://github.com/yourusername/team-winning-simulator.git
cd team-winning-simulator
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve
```
