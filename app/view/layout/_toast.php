<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="globalToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
  const toastElement = document.getElementById('globalToast');
  const toastBody = toastElement.querySelector('.toast-body');

  <?php if (isset($_SESSION['toast'])): ?>
    const toastData = <?php echo json_encode($_SESSION['toast']); ?>;
    toastBody.textContent = toastData.message;

    var toast = new bootstrap.Toast(toastElement);
    toast.show();

    <?php unset($_SESSION['toast']); ?>
  <?php endif; ?>
});
</script>