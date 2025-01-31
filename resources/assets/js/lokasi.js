document.addEventListener('DOMContentLoaded', function () {
  const selectAll = document.querySelector('#selectAll');

  // Select/Deselect semua checkbox
  document.addEventListener('change', function (e) {
    if (e.target && e.target.matches('#selectAll')) {
      // Jika checkbox "Select All" berubah
      const checkboxes = document.querySelectorAll('.select-item');
      checkboxes.forEach(checkbox => {
        checkbox.checked = e.target.checked;
      });
    }

    if (e.target && e.target.matches('.select-item')) {
      // Jika checkbox individu berubah
      if (!e.target.checked) {
        selectAll.checked = false; // Hapus centang "Select All" jika salah satu checkbox tidak dicentang
      } else {
        const allChecked = [...document.querySelectorAll('.select-item')].every(checkbox => checkbox.checked);
        selectAll.checked = allChecked; // Centang "Select All" jika semua checkbox individu dicentang
      }
    }
  });

  // SweetAlert Konfirmasi Hapus
  document.querySelectorAll('.delete-record').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault(); // Mencegah form langsung dikirimkan
      const form = this.closest('form'); // Mengambil form yang terkait dengan tombol ini

      Swal.fire({
        title: 'Konfirmasi!',
        text: 'Apakah anda yakin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#88a9c3', // Warna tombol konfirmasi
        cancelButtonColor: '#e76f51', // Warna tombol batal
        confirmButtonText: 'Ya', // Teks pada tombol konfirmasi
        cancelButtonText: 'Tidak' // Teks pada tombol batal
      }).then(result => {
        if (result.isConfirmed) {
          form.submit(); // Submit form jika pengguna mengkonfirmasi
        }
      });
    });
  });

  // SweetAlert Flash Session untuk Notifikasi Sukses
  const flashSuccess = document.querySelector("meta[name='flash-success']");
  if (flashSuccess && flashSuccess.content) {
    Swal.fire({
      title: 'Berhasil!',
      text: flashSuccess.content,
      icon: 'success',
      confirmButtonText: 'OK',
      confirmButtonColor: '#88a9c3'
    });
  }

  // Menampilkan/Menyembunyikan Field HQ Berdasarkan Tipe Lokasi
  const typeField = document.querySelector('#type');
  const hqField = document.querySelector('#hqField');

  if (typeField) {
    typeField.addEventListener('change', function () {
      const type = this.value;

      // Jika tipe lokasi adalah "locket", tampilkan field HQ
      if (type === 'locket') {
        hqField.style.display = 'block';
        hqField.querySelector('select').required = true; // Tambahkan required
      } else {
        hqField.style.display = 'none';
        hqField.querySelector('select').required = false; // Hapus required
      }
    });

    // Inisialisasi awal (jika form diisi ulang)
    const initialType = typeField.value;
    if (initialType === 'locket') {
      hqField.style.display = 'block';
      hqField.querySelector('select').required = true;
    } else {
      hqField.style.display = 'none';
      hqField.querySelector('select').required = false;
    }
  }
});
