<?php
include 'includes/auth.php';
include 'includes/db.php';

if (!isset($_GET['id'])) {
    header("Location: blog-list.php");
    exit;
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM blogs WHERE id='$id'");
$blog = mysqli_fetch_assoc($result);

if (!$blog) {
    echo "Blog not found";
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="content">

<h2 class="mb-4">Edit Blog</h2>

<div class="card">
<form action="update-blog.php" method="post" enctype="multipart/form-data" id="blogForm">

<input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
<input type="hidden" id="originalSlug" value="<?php echo htmlspecialchars($blog['slug']); ?>">

<div class="mb-3">
<label class="form-label">Blog Title</label>
<input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($blog['title']); ?>" required>
</div>

<div class="mb-3">
<label class="form-label">URL Slug</label>
<div class="form-check mb-2">
<input class="form-check-input" type="checkbox" id="autoSlug">
<label class="form-check-label" for="autoSlug">
Auto-generate from title
</label>
</div>
<input type="text" name="slug" id="slug" class="form-control" value="<?php echo htmlspecialchars($blog['slug']); ?>" required>
<div id="slugFeedback" class="mt-1"></div>
</div>

<div class="mb-3">
<label class="form-label">Blog Date</label>
<input type="date" name="blog_date" class="form-control" value="<?php echo $blog['blog_date']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Blog Content</label>
<div id="editor" style="height:300px;"><?php echo $blog['content']; ?></div>
<input type="hidden" name="content" id="content">
</div>

<div class="mb-3">
<label class="form-label">Current Image</label><br>
<?php if($blog['featured_image']){ ?>
<img 
  src="/admin/uploads/blog-images/<?php echo $blog['featured_image']; ?>" 
  width="120"
  style="border-radius:6px"
>

<?php } ?>
</div>

<div class="mb-3">
<label class="form-label">Change Image (optional)</label>
<input type="file" name="image" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Meta Title</label>
<input type="text" name="meta_title" class="form-control" value="<?php echo htmlspecialchars($blog['meta_title']); ?>">
</div>

<div class="mb-3">
<label class="form-label">Meta Description</label>
<textarea name="meta_description" class="form-control" rows="3"><?php echo $blog['meta_description']; ?></textarea>
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-control">
<option value="published" <?php if($blog['status']=='published') echo 'selected'; ?>>Published</option>
<option value="draft" <?php if($blog['status']=='draft') echo 'selected'; ?>>Draft</option>
</select>
</div>

<button type="submit" class="btn btn-primary" id="submitBtn">Update Blog</button>

</form>
</div>

</div>

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
var quill = new Quill('#editor', { theme: 'snow' });

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
const originalSlug = document.getElementById('originalSlug').value;

let isSlugAvailable = true;
let checkTimeout;

// Function to check slug availability
function checkSlugAvailability(slug) {
  if (slug.length < 2) {
    slugFeedback.innerHTML = '';
    isSlugAvailable = false;
    return;
  }

  // If slug is same as original, it's available (same blog)
  if (slug === originalSlug) {
    slugFeedback.innerHTML = '<small class="text-success">✓ Current slug (no change)</small>';
    isSlugAvailable = true;
    submitBtn.disabled = false;
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

// Check initial slug on page load
checkSlugAvailability(slugInput.value);
</script>

</body>
</html>