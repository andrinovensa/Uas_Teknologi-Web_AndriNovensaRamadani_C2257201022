const jumlahInput = document.getElementById('jumlah');
  const hargaTotal = document.getElementById('harga-total');
  const hargaPerPcs = 8000;

  jumlahInput.addEventListener('input', function () {
    const jumlah = parseInt(jumlahInput.value) || 0;
    const total = jumlah * hargaPerPcs;
    hargaTotal.value = "Rp " + total.toLocaleString('id-ID');
  });