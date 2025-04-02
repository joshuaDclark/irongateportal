# IronGate Portal Demo

This is a demonstration Laravel + Livewire application designed to showcase scalable architecture, role-based authentication, performance-aware data handling, and a production-ready deployment process.

## Live Demo

The live version of this demo application is published at [xtechnologies.pro](https://xtechnologies.pro)

## Built With
- Laravel 11 + Jetstream (Livewire stack)
- MySQL (via Laravel Sail)
- Tailwind CSS
- Livewire (role-based dashboards)
- Laravel Forge + Envoyer (for zero-downtime deploys)

---

## Core Features

### Authentication & Roles
- Dealer and Admin roles with gated dashboards
- Custom user attributes for firearms compliance:
  - `can_sell_handguns`
  - `can_sell_nfa_items`
  - `is_high_capacity_magazine_allowed`
- Jetstream-powered login/registration with session-based role redirection

### SKU Management
- Dealer Dashboard:
  - Livewire-powered SKU table with pagination
  - Automatically filters SKUs based on user’s permissions (state/firearm type restrictions)
- Admin Dashboard:
  - Unrestricted access to full SKU inventory
  - Same Livewire-powered structure

### Deployment
- Managed by Laravel Forge (AWS EC2 instance)
- Zero-downtime deployments via Envoyer
- Custom deployment command: `php artisan deploy:demo`
  - Migrates + seeds demo data
  - Runs Laravel optimization (`config`, `routes`, `events`, `views`)
  - Installs and builds Vite assets

### Performance Optimized
- All data fetching is server-side
- Paginated queries return in ~3–5ms (confirmed via Laravel Debugbar)
- Livewire component render times consistently under 150ms

---

## Local Setup (Dev)
```bash
git clone [repo-url] && cd irongateportal
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail composer install
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail npm install && ./vendor/bin/sail npm run build
```

Login credentials:
- Admin: `admin@example.com` / `password`
- Dealer: `dealer@example.com` / `password`

---

## Future Improvements
- Add SKU search & sort functionality
- Region/state filtering for compliance logic
- External data sync or product feeds
- Performance logging exposed in UI
- CSV/PDF export

---

## 🙌 Special Considerations
- This app was built under time constraints for demo purposes on short notice.
- Focus was placed on:
  - Clear code structure
  - Practical Livewire use
  - Realistic deployment pipeline
  - Demonstrating f project delivery

---
