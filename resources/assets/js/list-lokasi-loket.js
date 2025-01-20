document.addEventListener('DOMContentLoaded', function () {
  const selectAllCheckbox = document.getElementById('selectAll');
  const itemCheckboxes = document.querySelectorAll('.select-item');

  // Event Listener for Select All Checkbox
  selectAllCheckbox.addEventListener('change', function () {
      const isChecked = this.checked;
      itemCheckboxes.forEach(checkbox => {
          checkbox.checked = isChecked;
      });
  });

  // Event Listener for Individual Item Checkboxes
  itemCheckboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function () {
          if (!this.checked) {
              selectAllCheckbox.checked = false; // Uncheck Select All if any item is unchecked
          } else if ([...itemCheckboxes].every(cb => cb.checked)) {
              selectAllCheckbox.checked = true; // Check Select All if all items are checked
          }
      });
  });
});
