<?php include 'includes/auth.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="content">

<h2 class="mb-4">Add New Blog</h2>

<div class="card">
<form action="save-blog.php" method="post" enctype="multipart/form-data" id="blogForm">

<div class="mb-3">
<label class="form-label">Blog Title</label>
<input type="text" name="title" id="title" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">URL Slug</label>
<div class="form-check mb-2">
<input class="form-check-input" type="checkbox" id="autoSlug" checked>
<label class="form-check-label" for="autoSlug">
Auto-generate from title
</label>
</div>
<input type="text" name="slug" id="slug" class="form-control" placeholder="my-first-blog" required>
<div id="slugFeedback" class="mt-1"></div>
</div>

<div class="mb-3">
<label class="form-label">Blog Date</label>
<input type="date" name="blog_date" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Blog Content</label>
<div id="editor" style="height:300px;"></div>
<input type="hidden" name="content" id="content">
</div>

<div class="mb-3">
<label class="form-label">Featured Image</label>
<input type="file" name="image" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Meta Title</label>
<input type="text" name="meta_title" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Meta Description</label>
<textarea name="meta_description" class="form-control" rows="3"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-control">
<option value="published">Publish</option>
<option value="draft">Save as Draft</option>
</select>
</div>

<button type="submit" name="publish" class="btn btn-primary" id="submitBtn">
Publish Blog
</button>

</form>
</div>

</div>

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
var quill = new Quill('#editor', {
  theme: 'snow'
});

document.querySelector('form').onsubmit = function (e) {
  document.querySelector('#content').value = quill.root.innerHTML;
  
  // Check if slug is available before submitting
  if (!isSlugAvailable) {
    e.preventDefault();
    alert('This slug is already in use. Please change the slug.');
    return false;
  }
};

// Function to convert text to slug format
function convertToSlug(text) {
  return text
    .toLowerCase()
    .trim()
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars except -
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
}

// Get elements
const titleInput = document.getElementById('title');
const slugInput = document.getElementById('slug');
const autoSlugCheckbox = document.getElementById('autoSlug');
const slugFeedback = document.getElementById('slugFeedback');
const submitBtn = document.getElementById('submitBtn');

let isSlugAvailable = true;
let checkTimeout;

// Function to check slug availability
function checkSlugAvailability(slug) {
  if (slug.length < 2) {
    slugFeedback.innerHTML = '';
    isSlugAvailable = false;
    return;
  }

  // Clear previous timeout
  clearTimeout(checkTimeout);

  // Show checking status
  slugFeedback.innerHTML = '<small class="text-muted">Checking availability...</small>';

  // Debounce the check
  checkTimeout = setTimeout(function() {
    // Make AJAX request to check slug
    fetch('check-slug.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'slug=' + encodeURIComponent(slug)
    })
    .then(response => response.json())
    .then(data => {
      if (data.available) {
        slugFeedback.innerHTML = '<small class="text-success">✓ Slug is available</small>';
        isSlugAvailable = true;
        submitBtn.disabled = false;
      } else {
        slugFeedback.innerHTML = '<small class="text-danger">✗ This slug is already in use. Please change it.</small>';
        isSlugAvailable = false;
        submitBtn.disabled = true;
      }
    })
    .catch(error => {
      console.error('Error:', error);
      slugFeedback.innerHTML = '<small class="text-warning">Could not check availability</small>';
      isSlugAvailable = true; // Allow submission if check fails
      submitBtn.disabled = false;
    });
  }, 500); // Wait 500ms after user stops typing
}

// Auto-generate slug from title when checkbox is checked
titleInput.addEventListener('input', function() {
  if (autoSlugCheckbox.checked) {
    slugInput.value = convertToSlug(this.value);
    checkSlugAvailability(slugInput.value);
  }
});

// When checkbox state changes
autoSlugCheckbox.addEventListener('change', function() {
  if (this.checked) {
    slugInput.value = convertToSlug(titleInput.value);
    slugInput.setAttribute('readonly', true);
    checkSlugAvailability(slugInput.value);
  } else {
    slugInput.removeAttribute('readonly');
  }
});

// Handle keydown for space key
slugInput.addEventListener('keydown', function(e) {
  if (!autoSlugCheckbox.checked && e.key === ' ') {
    e.preventDefault();
    const start = this.selectionStart;
    const end = this.selectionEnd;
    const value = this.value;
    
    // Insert hyphen at cursor position
    this.value = value.substring(0, start) + '-' + value.substring(end);
    
    // Move cursor after the hyphen
    this.selectionStart = this.selectionEnd = start + 1;
    
    // Trigger input event to check availability
    this.dispatchEvent(new Event('input'));
  }
});

// Format slug when manually typed
slugInput.addEventListener('input', function() {
  if (!autoSlugCheckbox.checked) {
    const cursorPosition = this.selectionStart;
    const originalValue = this.value;
    const newValue = convertToSlug(this.value);
    
    if (originalValue !== newValue) {
      this.value = newValue;
      // Try to maintain cursor position
      this.selectionStart = this.selectionEnd = cursorPosition;
    }
  }
  
  // Check slug availability
  checkSlugAvailability(this.value);
});

// Set initial state
if (autoSlugCheckbox.checked) {
  slugInput.setAttribute('readonly', true);
}
</script>

</body>
</html>