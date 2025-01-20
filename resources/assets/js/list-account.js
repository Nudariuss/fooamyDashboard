document.addEventListener('DOMContentLoaded', function () {
  const selectAllCheckbox = document.getElementById('selectAll');
  const itemCheckboxes = document.querySelectorAll('.select-item');

  selectAllCheckbox.addEventListener('change', function () {
      itemCheckboxes.forEach(function (checkbox) {
          checkbox.checked = selectAllCheckbox.checked;
      });
  });

  itemCheckboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
          const allChecked = Array.from(itemCheckboxes).every(cb => cb.checked);
          selectAllCheckbox.checked = allChecked;
      });
  });
});
