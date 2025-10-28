@extends('admin.dashboard.layouts.app')

@section('title') Create @endsection

@section('content')
    <div class="container">
        <div class="course-form-container card">
            <div class="card-header text-white">
                <h2 class="card-title mb-0"><i class="fas fa-book me-2"></i>Create New Course</h2>
            </div>

            <form class="" action="{{route('admin.courses.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill"/>
                        </svg>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill"/>
                        </svg>
                        <div>
                            <strong>Validation failed!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="card-body p-4">
                    <!-- Course Information -->
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="courseTitle" class="form-label fw-bold">Title</label>
                            <input type="text" class="form-control form-control-lg" id="courseTitle" name="course_title" placeholder="Enter title" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id">
                                <option selected>Category</option>
                                <option value="1">Web Development</option>
                                <option value="2">Data Science</option>
                                <option value="3">Design</option>
                                <option value="4">Business</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="courseDescription" class="form-label fw-bold">Course Description</label>
                            <textarea class="form-control" id="courseDescription" rows="4" placeholder="Enter description" name="course_description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Features Video</label>
                                <input class="form-control form-control-sm" id="formFileSm" name="video_path" type="file">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="courseTitle" class="form-label fw-bold">Price</label>
                            <input type="number" class="form-control form-control-lg" id="coursePrice" name="price" placeholder="Enter Price" required>
                        </div>
                    </div>

                    <!-- Modules Section -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0 text-primary">Modules</h4>
                            <button type="button" class="btn btn-success" id="addModuleBtn">
                                <i class="fas fa-plus me-1"></i> Add Module
                            </button>
                        </div>

                        <div id="modulesContainer">
                            <!-- Initial Module -->
                            <div class="module-card" id="module-1">
                                <div class="module-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <h5 class="mb-0">Module 1</h5>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="collapse" data-bs-target="#module-1-body">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-remove remove-module-btn">

                                        </button>
                                    </div>
                                </div>

                                <div class="collapse show module-body" id="module-1-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control module-title" name="modules[0][title]" placeholder="Module Title" required>
                                        <input type="hidden" class="module-order" name="modules[0][order]" value="0">
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-outline-primary content-collapse-btn" type="button" data-bs-toggle="collapse" data-bs-target="#module-1-contents-collapse">
                                            Add Contents <span class="badge bg-primary ms-1" id="module-1-content-count">1</span>
                                        </button>

                                        <div class="collapse" id="module-1-contents-collapse">
                                            <div class="content-collapse-body">
                                                <div class="contents-container" id="module-1-contents">
                                                    <!-- Initial Content -->
                                                    <div class="content-item" id="content-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge bg-primary content-badge me-2"><i class="fas fa-video me-1"></i> Video</span>
                                                                <h6 class="mb-0">Welcome to the Course</h6>
                                                            </div>
                                                            <button type="button" class="btn btn-sm btn-remove remove-content-btn">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">Content Title</label>
                                                            <input type="text" class="form-control content-title" value="Welcome to the Course" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">Video URL</label>
                                                            <input type="url" class="form-control content-video-url" value="https://example.com/video1" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">Video Duration (minutes)</label>
                                                            <input type="number" class="form-control content-duration" value="10" min="1">
                                                        </div>
                                                        <button type="button" class="btn btn-sm btn-add-content" >
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary" id="saveBtn">
                            <i class="fas fa-save me-1"></i> Save Course
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Content Type Modal -->
    <div class="modal fade" id="contentTypeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted mb-3">Select the type of content you want to add to this module:</p>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-primary content-type-btn py-3" data-type="video">
                            <i class="fas fa-video me-2 fa-lg"></i> Video
                        </button>
                        <button type="button" class="btn btn-outline-primary content-type-btn py-3" data-type="article">
                            <i class="fas fa-file-alt me-2 fa-lg"></i> Article
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection