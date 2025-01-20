document.addEventListener('DOMContentLoaded', function () {
  const selectAll = document.querySelector('#selectAll');
  const checkboxes = document.querySelectorAll('.form-check-input');

  selectAll?.addEventListener('change', function () {
      checkboxes.forEach((checkbox) => {
          checkbox.checked = selectAll.checked;
      });
  });
});
