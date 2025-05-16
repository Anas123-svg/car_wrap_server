<style>
  #vehicle-images-slider img {
    height: 100px;
    border-radius: 6px;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  #vehicle-images-slider img:hover {
    transform: scale(1.1);
  }

  .modal-body {
    display: flex !important;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
    padding: 0 !important;
  }
</style>
<div class="modal fade" id="user-form-modal" tabindex="-1" aria-labelledby="user-form-modalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content" style="max-width: 800px;">
      <div class="modal-header">
        <h5 class="modal-title" id="user-form-modalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="user-update-form">
          <input type="hidden" name="id" id="user-id">

        <div class="mb-3 col-md-4" style="max-width: 700px;">
            <label for="user-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="user-name" name="name" placeholder="Enter Name" required>
          </div>

          <div class="mb-3 col-md-4" style="max-width: 500px;">
            <label for="user-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="user-email" name="email" placeholder="Enter Email" required>
          </div>

          <div class="mb-3 col-md-4" style="max-width: 500px;">
            <label for="user-phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="user-phone" name="phone" placeholder="Enter Phone" required>
          </div>

          <div class="mb-3 col-md-4" style="max-width: 500px;">
            <label for="user-status" class="form-label">Status</label>
            <select class="form-select" id="user-status" name="status">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
<div class="row justify-content-center">
  <div class="mb-3 col-md-4" style="max-width: 500px;">
    <label class="form-label">Licence Photo</label><br>
    <img id="licence-preview" src="" alt="Licence Photo" class="img-thumbnail" style="max-height: 100px;">
  </div>

  <div class="mb-3 col-md-4" style="max-width: 500px;">
    <label class="form-label">Profile Photo</label><br>
    <img id="profile-preview" src="" alt="Profile Photo" class="img-thumbnail" style="max-height: 100px;">
  </div>
</div>
          <div class="mb-3 col-md-4" style="max-width: 500px;">
            <label for="vehicle-name" class="form-label">Vehicle Name</label>
            <input type="text" class="form-control" id="vehicle-name" name="vehicle_name"
              placeholder="Enter Vehicle Name">
          </div>

          <div class="mb-3 col-md-4" style="max-width: 500px;">
            <label for="vehicle-no" class="form-label">Vehicle Number</label>
            <input type="text" class="form-control" id="vehicle-no" name="vehicle_no"
              placeholder="Enter Vehicle Number">
          </div>

          <div class="mb-3 col-md-4" style="max-width: 500px;">
            <label for="vehicle-type" class="form-label">Vehicle Type</label>
            <input type="text" class="form-control" id="vehicle-type" name="vehicle_type"
              placeholder="Enter Vehicle Type">
          </div>

          <div class="mb-3 col-md-4" style="max-width: 500px;">
            <label class="form-label">Vehicle Images</label>
            <div id="vehicle-images-slider"
              style="display: flex; overflow-x: auto; gap: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; max-height: 120px;">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="image-preview-modal" tabindex="-1" aria-labelledby="imagePreviewModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body p-0 position-relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
          data-bs-dismiss="modal" aria-label="Close"></button>
        <img src="" id="preview-image" class="img-fluid rounded" alt="Preview Image" />
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const previewModalEl = document.getElementById('image-preview-modal');
    const previewModal = new bootstrap.Modal(previewModalEl);
    const previewImage = document.getElementById('preview-image');

    function openImagePreview(src) {
      previewImage.src = src;
      previewModal.show();
    }

    document.getElementById('profile-preview').addEventListener('click', (e) => {
      if (e.target.src) openImagePreview(e.target.src);
    });

    document.getElementById('licence-preview').addEventListener('click', (e) => {
      if (e.target.src) openImagePreview(e.target.src);
    });

    document.getElementById('vehicle-images-slider').addEventListener('click', (e) => {
      if (e.target.tagName === 'IMG' && e.target.src) {
        openImagePreview(e.target.src);
      }
    });

    previewModalEl.querySelector('.modal-body').addEventListener('click', (e) => {
      const clickedOnImage = e.target.tagName === 'IMG';
      if (!clickedOnImage) {
        previewModal.hide();
      }
    });
    previewModalEl.addEventListener('hidden.bs.modal', () => {
      const isUserModalOpen = document.getElementById('user-form-modal').classList.contains('show');
      if (isUserModalOpen) {
        document.body.classList.add('modal-open');
      }
    });

  });

</script>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('user-form-modal');
    const editButtons = document.querySelectorAll('.edit-driver-btn');

    editButtons.forEach(button => {
      button.addEventListener('click', function () {
        // Store dataset on modal for access on show event
        modal.dataset.id = this.dataset.id || '';
        modal.dataset.name = this.dataset.name || '';
        modal.dataset.email = this.dataset.email || '';
        modal.dataset.phone = this.dataset.phone || '';
        modal.dataset.vehicleName = this.dataset.vehicleName || '';
        modal.dataset.vehicleNo = this.dataset.vehicleNo || '';
        modal.dataset.vehicleType = this.dataset.vehicleType || '';
        modal.dataset.vehicleImages = this.dataset.vehicleImages || '';

        modal.dataset.status = this.dataset.status || 'active';
        modal.dataset.licencePhoto = this.dataset.licencePhoto || '';
        modal.dataset.profilePhoto = this.dataset.profilePhoto || '';
      });
    });

    modal.addEventListener('show.bs.modal', () => {
      document.getElementById('user-id').value = modal.dataset.id;
      document.getElementById('user-name').value = modal.dataset.name;
      document.getElementById('user-email').value = modal.dataset.email;
      document.getElementById('user-phone').value = modal.dataset.phone;
      document.getElementById('user-status').value = modal.dataset.status;

      document.getElementById('licence-preview').src = modal.dataset.licencePhoto
        ? modal.dataset.licencePhoto
        : '{{ asset("build/assets/images/defaults/default-licence.jpg") }}';
      document.getElementById('profile-preview').src = modal.dataset.profilePhoto
        ? modal.dataset.profilePhoto
        : '{{ asset("build/assets/images/drivers/default.jpg") }}';
    });
  });
</script>