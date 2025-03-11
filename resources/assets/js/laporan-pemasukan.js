document.getElementById("clearFilters").addEventListener("click", function () {
  // Reset semua input teks
  document.querySelectorAll("input[type='text']").forEach(input => input.value = "");

  // Reset dropdown
  document.querySelectorAll("select").forEach(select => select.selectedIndex = 0);

  // Reload halaman untuk hapus filter URL
  window.location.href = window.location.pathname;
});

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
