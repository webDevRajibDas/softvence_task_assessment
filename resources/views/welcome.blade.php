<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses || Task</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --success-color: #4ade80;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            --gradient-secondary: linear-gradient(135deg, #4cc9f0 0%, #4361ee 100%);
            --gradient-accent: linear-gradient(135deg, #7209b7 0%, #3a0ca3 100%);
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
            --shadow-xl: 0 20px 25px rgba(0,0,0,0.15);
        }

        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: #334155;
            line-height: 1.6;
        }

        .page-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2.5rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 1.5rem 1.5rem;
            box-shadow: var(--shadow-lg);
        }

        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary-color);
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 500;
        }

        .course-card {
            background: white;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .course-image {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }

        .course-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 0.75rem;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
        }

        .course-content {
            padding: 1.5rem;
        }

        .course-title {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            color: var(--dark-color);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .course-stats {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .course-stat {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.875rem;
            color: #64748b;
        }

        .course-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-primary-custom {
            background: var(--gradient-primary);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .btn-edit:hover {
            background: #3b82f6;
            color: white;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 1.25rem;
            box-shadow: var(--shadow-sm);
        }

        .empty-state-icon {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .filter-bar {
            background: white;
            border-radius: 1rem;
            padding: 1.25rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
        }

        .search-box {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-input {
            padding-left: 2.75rem;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
        }

        .filter-select {
            border-radius: 50px;
            border: 1px solid #e2e8f0;
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem 0;
                border-radius: 0 0 1rem 1rem;
            }

            .stat-card {
                margin-bottom: 1rem;
            }

            .course-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .course-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body>
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Course Management</h1>
                <p class="lead mb-0">Create, manage, and organize your learning materials</p>
            </div>

        </div>
    </div>
</div>

<div class="container py-4">
    <!-- Statistics Cards -->
    <div class="row mb-5">
        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(67, 97, 238, 0.1); color: var(--primary-color);">
                    <i class="bi bi-collection-play"></i>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-label">Total Courses</div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(76, 201, 240, 0.1); color: var(--accent-color);">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-value">1,248</div>
                <div class="stat-label">Active Students</div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(74, 222, 128, 0.1); color: var(--success-color);">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-value">86%</div>
                <div class="stat-label">Completion Rate</div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warning-color);">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-value">4.8</div>
                <div class="stat-label">Avg. Rating</div>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <div class="row g-3 align-items-center">
            <div class="col-md-6">
                <div class="search-box">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search courses...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select filter-select">
                    <option selected>All Categories</option>
                    <option>Web Development</option>
                    <option>Data Science</option>
                    <option>Design</option>
                    <option>Business</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select filter-select">
                    <option selected>Sort by: Newest</option>
                    <option>Sort by: Popularity</option>
                    <option>Sort by: Rating</option>
                    <option>Sort by: Name</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <h2 class="section-title">Your Courses</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Course Card 1 -->
        <div class="col">
            <div class="course-card">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="course-image" alt="Advanced Web Development">
                    <span class="course-badge bg-primary">PRO</span>
                </div>
                <div class="course-content d-flex flex-column">
                    <h5 class="course-title">Advanced Web Development</h5>
                    <p class="course-description">Master modern web development with Laravel, Vue.js, and advanced JavaScript techniques. Build full-stack applications from scratch.</p>
                    <div class="course-meta">
                        <div class="course-stats">
                            <div class="course-stat">
                                <i class="bi bi-play-circle"></i>
                                <span>24 Lessons</span>
                            </div>
                            <div class="course-stat">
                                <i class="bi bi-clock"></i>
                                <span>18h</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Course Card 2 -->
        <div class="col">
            <div class="course-card">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="course-image" alt="Data Science Fundamentals">
                    <span class="course-badge bg-success">BEGINNER</span>
                </div>
                <div class="course-content d-flex flex-column">
                    <h5 class="course-title">Data Science Fundamentals</h5>
                    <p class="course-description">Learn data analysis, visualization, and machine learning basics with Python, Pandas, and Scikit-learn in this comprehensive course.</p>
                    <div class="course-meta">
                        <div class="course-stats">
                            <div class="course-stat">
                                <i class="bi bi-play-circle"></i>
                                <span>18 Lessons</span>
                            </div>
                            <div class="course-stat">
                                <i class="bi bi-clock"></i>
                                <span>14h</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Course Card 3 -->
        <div class="col">
            <div class="course-card">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1164&q=80" class="course-image" alt="UI/UX Design Mastery">
                    <span class="course-badge bg-warning">INTERMEDIATE</span>
                </div>
                <div class="course-content d-flex flex-column">
                    <h5 class="course-title">UI/UX Design Mastery</h5>
                    <p class="course-description">Create stunning user interfaces and experiences. Learn design principles, prototyping, and user research methodologies.</p>
                    <div class="course-meta">
                        <div class="course-stats">
                            <div class="course-stat">
                                <i class="bi bi-play-circle"></i>
                                <span>22 Lessons</span>
                            </div>
                            <div class="course-stat">
                                <i class="bi bi-clock"></i>
                                <span>16h</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Course Card 4 -->
        <div class="col">
            <div class="course-card">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1115&q=80" class="course-image" alt="Digital Marketing Strategy">
                    <span class="course-badge bg-info">POPULAR</span>
                </div>
                <div class="course-content d-flex flex-column">
                    <h5 class="course-title">Digital Marketing Strategy</h5>
                    <p class="course-description">Develop comprehensive digital marketing campaigns. Master SEO, social media, content marketing, and analytics.</p>
                    <div class="course-meta">
                        <div class="course-stats">
                            <div class="course-stat">
                                <i class="bi bi-play-circle"></i>
                                <span>20 Lessons</span>
                            </div>
                            <div class="course-stat">
                                <i class="bi bi-clock"></i>
                                <span>15h</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Course Card 5 -->
        <div class="col">
            <div class="course-card">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1164&q=80" class="course-image" alt="Mobile App Development">
                    <span class="course-badge bg-primary">NEW</span>
                </div>
                <div class="course-content d-flex flex-column">
                    <h5 class="course-title">Mobile App Development</h5>
                    <p class="course-description">Build cross-platform mobile applications with React Native. Learn to publish to both iOS and Android app stores.</p>
                    <div class="course-meta">
                        <div class="course-stats">
                            <div class="course-stat">
                                <i class="bi bi-play-circle"></i>
                                <span>26 Lessons</span>
                            </div>
                            <div class="course-stat">
                                <i class="bi bi-clock"></i>
                                <span>20h</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Course Card 6 -->
        <div class="col">
            <div class="course-card">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="course-image" alt="Business Analytics">
                    <span class="course-badge bg-secondary">COMING SOON</span>
                </div>
                <div class="course-content d-flex flex-column">
                    <h5 class="course-title">Business Analytics</h5>
                    <p class="course-description">Transform data into business insights. Learn to use analytics tools to drive strategic decisions and improve performance.</p>
                    <div class="course-meta">
                        <div class="course-stats">
                            <div class="course-stat">
                                <i class="bi bi-play-circle"></i>
                                <span>16 Lessons</span>
                            </div>
                            <div class="course-stat">
                                <i class="bi bi-clock"></i>
                                <span>12h</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Simple animation for cards on page load
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.course-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';

            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>
</body>
</html>