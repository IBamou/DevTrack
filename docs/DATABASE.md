# Database Schema

## MLD Diagram

```mermaid
erDiagram
    USERS }o--o{ PROJECTS : "collaborators (pivot)"
    PROJECTS ||--o{ TASKS : "has"
    USERS ||--o{ TASKS : "creates"
    COLLABORATORS ||--o{ TASKS : "assigned_to"

    USERS {
        bigint id
        string name
        string email
        string password
        timestamp created_at
        timestamp updated_at
    }

    PROJECTS {
        bigint id
        string title
        text description
        bigint created_by
        timestamp created_at
        timestamp updated_at
        timestamp deleted_at
    }

    TASKS {
        bigint id
        string title
        text description
        bigint project_id
        bigint collaborator_id
        bigint created_by
        enum status
        enum priority
        date due_date
        timestamp created_at
        timestamp updated_at
        timestamp deleted_at
    }
```

## Relationships

| Table | Related To | Type |
|-------|------------|------|
| users | projects | Many-to-Many (via collaborators) |
| projects | collaborators | One-to-Many |
| projects | tasks | One-to-Many |
| collaborators | tasks | One-to-Many |
| users | tasks | One-to-Many |

## Notes

- **PK**: Primary Key
- **UK**: Unique Key
- **FK**: Foreign Key
- **Pivot Table**: collaborators (users ↔ projects)
- **Soft Deletes**: projects, collaborators, tasks use `deleted_at`
