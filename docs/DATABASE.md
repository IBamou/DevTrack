# Database Schema

## MLD Diagram

```mermaid
erDiagram
    USERS }o--o{ COLLABORATORS : ""
    USERS ||--o{ TASKS : "creates"
    PROJECTS }o--o{ COLLABORATORS : ""
    PROJECTS ||--o{ TASKS : "has"
    PROJECTS ||--o{ ARCHIVES : "archived_to"
    COLLABORATORS ||--o{ TASKS : "assigned_to"
    TASKS ||--o{ ARCHIVES : "archived_from"

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

    COLLABORATORS {
        bigint id
        bigint user_id
        bigint project_id
        enum role
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

    ARCHIVES {
        bigint id
        bigint task_id
        bigint project_id
        timestamp archived_at
    }
```

## Relationships

| Table | Related To | Type |
|-------|------------|------|
| users | projects | Many-to-Many |
| users | tasks | One-to-Many |
| users | collaborators | Many-to-Many |
| projects | collaborators | Many-to-Many |
| projects | tasks | One-to-Many |
| projects | archives | One-to-Many |
| collaborators | tasks | One-to-Many |
| tasks | archives | One-to-Many |

## Notes

- **PK**: Primary Key
- **UK**: Unique Key
- **FK**: Foreign Key
- **Soft Deletes**: projects, collaborators, tasks use `deleted_at`
- **Cascading**: When user is deleted, related records are deleted
- **Nullable**: tasks.project_id and tasks.collaborator_id are nullable
- **Archives**: Stores old_project_id when task is archived
