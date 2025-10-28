```mermaid
erDiagram
    COURSES {
        bigint id PK
        string title
        text description
        string thumbnail
        timestamps created_at
        timestamps updated_at
    }

    MODULES {
        bigint id PK
        bigint course_id FK
        string title
        int order_index
        timestamps created_at
        timestamps updated_at
    }

    CONTENTS {
        bigint id PK
        bigint module_id FK
        string title
        enum type (video, text, quiz)
        text body
        string video_url
        timestamps created_at
        timestamps updated_at
    }

    COURSES ||--o{ MODULES : "has many"
    MODULES ||--o{ CONTENTS : "has many"
