document.addEventListener("DOMContentLoaded", function () {
  // Event listener untuk role dropdown
  const roleDropdown = document.getElementById("role");
  if (roleDropdown) {
      roleDropdown.addEventListener("change", function () {
          const role = this.value;

          // Toggle email field visibility
          const emailField = document.getElementById("emailField");
          if (emailField) {
              emailField.style.display = ['admin', 'management', 'mitra'].includes(role) ? '' : 'none';
          }

          // Toggle contact field visibility
          const contactField = document.getElementById("contactField");
          if (contactField) {
              contactField.style.display = ['customer', 'operational'].includes(role) ? '' : 'none';
          }

          // Toggle operational-specific fields visibility
          const operationalFields = document.getElementById("operationalFields");
          if (operationalFields) {
              operationalFields.style.display = role === 'operational' ? '' : 'none';
          }
      });

      // Inisialisasi state awal jika ada nilai pada dropdown role
      const initialRole = roleDropdown.value;
      if (initialRole) {
          roleDropdown.dispatchEvent(new Event("change"));
      }
  }

  // Event listener untuk konfirmasi delete
  document.querySelectorAll('.delete-record').forEach(button => {
      button.addEventListener('click', function (e) {
          e.preventDefault(); // Mencegah form langsung dikirimkan
          const form = this.closest('form');

          Swal.fire({
              title: 'Konfirmasi!',
              text: "Apakah anda yakin menghapus data ini?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#88a9c3',
              cancelButtonColor: '#e76f51',
              confirmButtonText: 'Ya',
              cancelButtonText: 'Tidak'
          }).then((result) => {
              if (result.isConfirmed) {
                  form.submit();
              }
          });
      });
  });
});
