// File: resources/assets/js/detail-account-order.js

document.addEventListener('DOMContentLoaded', () => {
  console.log('Detail Account Order Page Loaded');

  // Example: Event Listener for a search box
  const searchInput = document.querySelector('.form-control[placeholder="Search orders..."]');
  searchInput?.addEventListener('input', (e) => {
      console.log('Search Query:', e.target.value);
  });
});
