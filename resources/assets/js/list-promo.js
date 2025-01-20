document.addEventListener('DOMContentLoaded', function () {
  const selectAllCheckbox = document.getElementById('selectAll');
  const itemCheckboxes = document.querySelectorAll('.select-item');

  selectAllCheckbox.addEventListener('change', function () {
      itemCheckboxes.forEach(checkbox => {
          checkbox.checked = selectAllCheckbox.checked;
      });
  });
});
