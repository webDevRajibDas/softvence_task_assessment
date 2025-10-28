/* globals Chart:false */

(() => {
  'use strict'


})()



document.addEventListener('DOMContentLoaded', function() {
  const modulesContainer = document.getElementById('modulesContainer');
  const addModuleBtn = document.getElementById('addModuleBtn');
  const contentTypeModal = new bootstrap.Modal(document.getElementById('contentTypeModal'));


  let currentModuleIndex = null;
  let currentModuleId = null;
  let moduleCounter = 1; // Start with 1 since we have an initial module
  let contentCounter = 1; // Start with 1 since we have initial content

  // Initialize stats
  updateStats();

  // Add a new module
  addModuleBtn.addEventListener('click', function() {
    moduleCounter++;

    const moduleId = `module-${moduleCounter}`;
    const moduleIndex = moduleCounter - 1;

    const moduleCard = document.createElement('div');
    moduleCard.className = 'module-card';
    moduleCard.id = moduleId;

    moduleCard.innerHTML = `
                    <div class="module-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Module ${moduleCounter}</h5>
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="collapse" data-bs-target="#${moduleId}-body">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-remove remove-module-btn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="collapse show module-body" id="${moduleId}-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" class="form-control module-title" name="modules[${moduleIndex}][title]" placeholder="Enter module title" required>
                            <input type="hidden" class="module-order" name="modules[${moduleIndex}][order]" value="${moduleIndex}">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-outline-primary content-collapse-btn" type="button" data-bs-toggle="collapse" data-bs-target="#${moduleId}-contents-collapse">
                                <i class="fas fa-list me-1"></i> Contents <span class="badge bg-primary ms-1" id="${moduleId}-content-count">0</span>
                            </button>

                            <div class="collapse" id="${moduleId}-contents-collapse">
                                <div class="content-collapse-body">
                                    <div class="contents-container" id="${moduleId}-contents">
                                        <!-- Contents will be added here -->
                                    </div>
                                    <button type="button" class="btn btn-sm btn-add-content" data-module-id="${moduleId}">
                                        <i class="fas fa-plus me-1"></i> Add Content
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

    modulesContainer.appendChild(moduleCard);

    // Add event listener for the remove module button
    const removeModuleBtn = moduleCard.querySelector('.remove-module-btn');
    removeModuleBtn.addEventListener('click', function() {
      if (confirm('Are you sure you want to remove this module?')) {
        moduleCard.remove();
        updateModuleNumbers();
        updateStats();
      }
    });

    // Add event listener for the add content button
    const addContentBtn = moduleCard.querySelector('.btn-add-content');
    addContentBtn.addEventListener('click', function() {
      currentModuleId = moduleId;
      contentTypeModal.show();
    });

    updateStats();
  });

  // Add event listeners to initial module
  const initialModule = document.getElementById('module-1');
  const initialRemoveBtn = initialModule.querySelector('.remove-module-btn');
  const initialAddContentBtn = initialModule.querySelector('.btn-add-content');

  initialRemoveBtn.addEventListener('click', function() {
    if (confirm('Are you sure you want to remove this module?')) {
      initialModule.remove();
      updateModuleNumbers();
      updateStats();
    }
  });

  initialAddContentBtn.addEventListener('click', function() {
    currentModuleId = 'module-1';
    contentTypeModal.show();
  });

  // Handle content type selection
  document.querySelectorAll('.content-type-btn').forEach(button => {
    button.addEventListener('click', function() {
      const contentType = this.getAttribute('data-type');
      addContentToModule(currentModuleId, currentModuleIndex, contentType);
      contentTypeModal.hide();
    });
  });

  // Add content to a module
  function addContentToModule(moduleId, moduleIndex, contentType) {
    contentCounter++;
    const contentId = `content-${contentCounter}`;
    const contentsContainer = document.getElementById(`${moduleId}-contents`);
    const contentCount = contentsContainer.querySelectorAll('.content-item').length;

    let contentHTML = '';
    let badgeClass = 'bg-primary';
    let icon = 'fas fa-video';
    let title = 'New Video';

    switch(contentType) {
      case 'video':
        contentHTML = `
                            <div class="content-item" id="${contentId}">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="d-flex align-items-center">
                                        <span class="badge ${badgeClass} content-badge me-2"><i class="${icon} me-1"></i> Video</span>
                                        <h6 class="mb-0">${title}</h6>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-remove remove-content-btn">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Content Title</label>
                                    <input type="text" class="form-control content-title" name="modules[${moduleIndex}][contents][${contentCount}][title]" value="${title}" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Video URL</label>
                                    <input type="url" class="form-control content-video-url" name="modules[${moduleIndex}][contents][${contentCount}][video_url]" placeholder="Enter video URL" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Video Duration (minutes)</label>
                                    <input type="number" class="form-control content-duration" name="modules[${moduleIndex}][contents][${contentCount}][duration]" value="10" min="1">
                                </div>
                                <input type="hidden" class="content-type" name="modules[${moduleIndex}][contents][${contentCount}][type]" value="video">
                                <input type="hidden" class="content-order" name="modules[${moduleIndex}][contents][${contentCount}][order]" value="${contentCount}">
                            </div>
                        `;
        break;
      case 'article':
        badgeClass = 'bg-info';
        icon = 'fas fa-file-alt';
        title = 'New Article';
        contentHTML = `
                            <div class="content-item" id="${contentId}">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="d-flex align-items-center">
                                        <span class="badge ${badgeClass} content-badge me-2"><i class="${icon} me-1"></i> Article</span>
                                        <h6 class="mb-0">${title}</h6>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-remove remove-content-btn">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Article Title</label>
                                    <input type="text" class="form-control content-title" name="modules[${moduleIndex}][contents][${contentCount}][title]" value="${title}" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control content-text" name="modules[${moduleIndex}][contents][${contentCount}][text]" rows="4" placeholder="Enter article content" required></textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Estimated Reading Time (minutes)</label>
                                    <input type="number" class="form-control content-duration" name="modules[${moduleIndex}][contents][${contentCount}][duration]" value="5" min="1">
                                </div>
                                <input type="hidden" class="content-type" name="modules[${moduleIndex}][contents][${contentCount}][type]" value="article">
                                <input type="hidden" class="content-order" name="modules[${moduleIndex}][contents][${contentCount}][order]" value="${contentCount}">
                            </div>
                        `;
        break;

    }

    contentsContainer.insertAdjacentHTML('beforeend', contentHTML);

    // Add event listener for the remove content button
    const removeContentBtn = document.getElementById(contentId).querySelector('.remove-content-btn');
    removeContentBtn.addEventListener('click', function() {
      if (confirm('Are you sure you want to remove this content?')) {
        document.getElementById(contentId).remove();
        updateModuleContentCount(moduleId);
        updateStats();
      }
    });

    updateModuleContentCount(moduleId);
    updateStats();
  }

  // Update module numbers after deletion or reordering
  function updateModuleNumbers() {
    const modules = modulesContainer.querySelectorAll('.module-card');
    modules.forEach((module, index) => {
      const header = module.querySelector('.module-header h5');
      header.textContent = `Module ${index + 1}`;
    });
    moduleCounter = modules.length;
  }

  // Update module content count badge
  function updateModuleContentCount(moduleId) {
    const contentsContainer = document.getElementById(`${moduleId}-contents`);
    const contentCount = contentsContainer.querySelectorAll('.content-item').length;
    const badge = document.getElementById(`${moduleId}-content-count`);
    if (badge) {
      badge.textContent = contentCount;
    }
  }

  // Update stats
  function updateStats() {
    const modules = modulesContainer.querySelectorAll('.module-card');
    let totalContents = 0;
    let totalVideos = 0;
    let totalDuration = 0;

    modules.forEach(module => {
      const contentsContainer = module.querySelector('.contents-container');
      if (contentsContainer) {
        const contents = contentsContainer.querySelectorAll('.content-item');
        totalContents += contents.length;

        contents.forEach(content => {
          // Count videos
          const videoBadge = content.querySelector('.badge.bg-primary');
          if (videoBadge && videoBadge.textContent.includes('Video')) {
            totalVideos++;
          }

          // Calculate duration
          const durationInput = content.querySelector('.content-duration');
          if (durationInput && durationInput.value) {
            totalDuration += parseInt(durationInput.value) || 0;
          }
        });
      }
    });


    // Update content counts for each module
    modules.forEach(module => {
      const moduleId = module.id;
      updateModuleContentCount(moduleId);
    });
  }





  // Add event listeners to update stats when inputs change
  document.getElementById('courseTitle').addEventListener('input', updateStats);
  document.getElementById('courseDescription').addEventListener('input', updateStats);

  // Update stats when duration inputs change
  modulesContainer.addEventListener('input', function(e) {
    if (e.target.classList.contains('content-duration') ||
        e.target.classList.contains('module-title') ||
        e.target.classList.contains('content-title')) {
      updateStats();
    }
  });
});