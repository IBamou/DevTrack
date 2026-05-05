# Routes

## Web Routes

### Public Routes

| Method | URI | Name | Controller |
|--------|-----|------|-------------|
| GET | / | welcome | Closure |
| GET | /dashboard | dashboard | Closure |

### Auth Routes

| Method | URI | Name | Controller |
|--------|-----|------|-------------|
| GET | register | register | RegisteredUserController |
| POST | register | - | RegisteredUserController |
| GET | login | login | AuthenticatedSessionController |
| POST | login | - | AuthenticatedSessionController |
| GET | forgot-password | password.request | PasswordResetLinkController |
| POST | forgot-password | password.email | PasswordResetLinkController |
| GET | reset-password/{token} | password.reset | NewPasswordController |
| POST | reset-password | password.store | NewPasswordController |

### Protected Routes (auth)

#### Project Routes

| Method | URI | Name | Controller |
|--------|-----|------|-------------|
| GET | /projects | project.index | ProjectController |
| GET | /projects/archives | projects.archives | ProjectController |
| GET | /projects/create | project.create | ProjectController |
| POST | /projects/store | project.store | ProjectController |
| GET | /projects/{project} | project.show | ProjectController |
| POST | /projects/{project}/edit | project.edit | ProjectController |
| PUT | /projects/{project}/update | project.update | ProjectController |
| PATCH | /projects/{project}/archive | projects.archive | ProjectController |
| PATCH | /projects/{project}/restore | projects.restore | ProjectController |
| DELETE | /projects/{project}/forceDelete | projects.forceDelete | ProjectController |

#### Task Routes

| Method | URI | Name | Controller |
|--------|-----|------|-------------|
| GET | /projects/{project}/task/create | projects.tasks.create | TaskController |
| POST | /projects/{project}/task/store | projects.tasks.store | TaskController |
| GET | /projects/{project}/task/{task}/edit | projects.tasks.edit | TaskController |
| PATCH | /projects/{project}/task/{task}/update | projects.tasks.update | TaskController |
| PATCH | /projects/{project}/task/{task}/archive | projects.tasks.archive | TaskController |
| PATCH | /projects/{project}/task/{task}/restore | projects.tasks.restore | TaskController |
| DELETE | /projects/{project}/task/{task}/forceDelete | projects.tasks.forceDelete | TaskController |

## Middleware

- `auth` - Requires authentication
- `verified` - Requires verified email
- `guest` - Redirects authenticated users
- `signed` - Requires valid signed URL
- `throttle` - Rate limiting