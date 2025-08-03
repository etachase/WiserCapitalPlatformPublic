# Wiser Capital Modern Platform

A modern cross-platform solar energy financing platform supporting web, iOS, and Android applications.

## Architecture Overview

This is a monorepo containing:
- **Backend API** (Node.js + TypeScript + Express)
- **Web Application** (Next.js + React + TypeScript)
- **Mobile Application** (React Native + TypeScript)
- **Shared Libraries** (Common utilities, UI components, types)

## Project Structure

```
modern-platform/
├── apps/
│   ├── api/              # Node.js backend API
│   ├── web/              # Next.js web application
│   └── mobile/           # React Native mobile app
├── libs/
│   ├── shared/           # Shared utilities and business logic
│   ├── ui/               # Shared UI components
│   ├── types/            # TypeScript type definitions
│   └── database/         # Database schema and migrations
├── tools/
│   ├── build/            # Build and deployment scripts
│   ├── scripts/          # Development scripts
│   └── docker/           # Docker configurations
├── docs/
│   ├── api/              # API documentation
│   ├── architecture/     # System architecture docs
│   └── deployment/       # Deployment guides
└── config/
    ├── environments/     # Environment configurations
    └── ci/               # CI/CD configurations
```

## Technology Stack

### Backend
- **Runtime:** Node.js 18+
- **Language:** TypeScript
- **Framework:** Express.js
- **Database:** PostgreSQL
- **ORM:** Prisma
- **Authentication:** JWT + Role-based access control
- **File Storage:** AWS S3
- **Caching:** Redis

### Frontend Web
- **Framework:** Next.js 13+
- **Language:** TypeScript
- **Styling:** Tailwind CSS
- **State Management:** React Query + Zustand
- **UI Components:** Radix UI + Custom components
- **Charts:** Chart.js / Recharts

### Mobile
- **Framework:** React Native 0.72+
- **Language:** TypeScript
- **Navigation:** React Navigation 6
- **UI Components:** React Native Paper
- **State Persistence:** AsyncStorage
- **Maps:** React Native Maps

### DevOps
- **Containerization:** Docker
- **CI/CD:** GitHub Actions
- **Infrastructure:** AWS (ECS/EKS)
- **Monitoring:** DataDog + Sentry
- **Package Manager:** pnpm (workspace support)

## Getting Started

### Prerequisites
- Node.js 18+
- pnpm 8+
- Docker & Docker Compose
- PostgreSQL (or use Docker)

### Installation

1. Clone the repository
```bash
git clone <repository-url>
cd modern-platform
```

2. Install dependencies
```bash
pnpm install
```

3. Set up environment variables
```bash
cp .env.example .env
# Edit .env with your configuration
```

4. Start development databases
```bash
docker-compose up -d postgres redis
```

5. Run database migrations
```bash
pnpm run db:migrate
```

6. Start development servers
```bash
# Start all applications
pnpm run dev

# Or start individually
pnpm run dev:api     # Backend API
pnpm run dev:web     # Web application
pnpm run dev:mobile  # Mobile application
```

## Development Workflow

### Code Quality
- **Linting:** ESLint with TypeScript rules
- **Formatting:** Prettier
- **Pre-commit:** Husky + lint-staged
- **Testing:** Jest + React Testing Library

### Package Scripts
```bash
# Development
pnpm run dev           # Start all apps in development
pnpm run dev:api       # Start API server
pnpm run dev:web       # Start web application
pnpm run dev:mobile    # Start mobile application

# Building
pnpm run build         # Build all applications
pnpm run build:api     # Build API server
pnpm run build:web     # Build web application
pnpm run build:mobile  # Build mobile application

# Testing
pnpm run test          # Run all tests
pnpm run test:api      # Run API tests
pnpm run test:web      # Run web tests
pnpm run test:mobile   # Run mobile tests

# Database
pnpm run db:migrate    # Run database migrations
pnpm run db:seed       # Seed database with sample data
pnpm run db:studio     # Open Prisma Studio

# Code Quality
pnpm run lint          # Lint all code
pnpm run format        # Format all code
pnpm run type-check    # TypeScript type checking
```

## Migration from Legacy PHP Application

This platform is being migrated from a Laravel-based PHP application. Key migration considerations:

### Data Migration
- User accounts and authentication
- Solar project data and assets
- Financial agreements and documents
- Portfolio and investment data

### Business Logic Migration
- WSAR (Wiser Solar Asset Rating) scoring algorithm
- PPA (Power Purchase Agreement) generation
- Financial modeling and calculations
- Document management workflows

### Feature Parity
- Role-based access control (Solar Installers, Investors, Host Facilities)
- Project management and tracking
- Document upload and management
- Reporting and analytics
- Map-based project visualization

## Deployment

### Development
```bash
# Using Docker Compose
docker-compose up -d

# Access applications
# API: http://localhost:3001
# Web: http://localhost:3000
# Mobile: Use Expo Go app
```

### Production
- Backend: AWS ECS/EKS
- Web: Vercel or AWS CloudFront + S3
- Mobile: Expo EAS Build
- Database: AWS RDS PostgreSQL
- Cache: AWS ElastiCache Redis
- Files: AWS S3

## Contributing

1. Create a feature branch from `main`
2. Make your changes following the coding standards
3. Write tests for new functionality
4. Run the full test suite
5. Create a pull request

## License

Private - Wiser Capital Platform