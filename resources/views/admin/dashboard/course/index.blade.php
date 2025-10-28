@extends('admin.dashboard.layouts.app')

@section('title') Courses  @endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-2">Course Management</h1>
                    <p class="lead mb-0">Create, manage, and organize your learning materials</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-light btn-lg px-4 py-2 rounded-pill fw-semibold">
                        <i class="bi bi-plus-circle me-2"></i> Create New Course
                    </a>
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
                            <div class="course-actions">
                                <button class="btn-icon btn-edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-icon btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                            <div class="course-actions">
                                <button class="btn-icon btn-edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-icon btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                            <div class="course-actions">
                                <button class="btn-icon btn-edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-icon btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                            <div class="course-actions">
                                <button class="btn-icon btn-edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-icon btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                            <div class="course-actions">
                                <button class="btn-icon btn-edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-icon btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
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
                            <div class="course-actions">
                                <button class="btn-icon btn-edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn-icon btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection


