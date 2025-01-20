document.addEventListener('DOMContentLoaded', function () {
  const checkboxes = document.querySelectorAll('.select-item');
  const totalPriceElement = document.getElementById('totalPrice');
  const selectAll = document.getElementById('selectAll');

  function updateTotalPrice() {
      let totalPrice = 0;

      checkboxes.forEach((checkbox) => {
          if (checkbox.checked) {
              totalPrice += parseFloat(checkbox.dataset.price || 0);
          }
      });

      totalPriceElement.textContent = totalPrice.toLocaleString('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0,
      }).replace("Rp", ""); // Menghilangkan double "Rp" jika dibutuhkan
  }

  // Update total price when a checkbox is clicked
  checkboxes.forEach((checkbox) => {
      checkbox.addEventListener('change', updateTotalPrice);
  });

  // Select/Deselect all items
  selectAll.addEventListener('change', function () {
      checkboxes.forEach((checkbox) => {
          checkbox.checked = selectAll.checked;
      });
      updateTotalPrice();
  });
});
