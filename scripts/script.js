function cekForm(isEdit) {
    var judul     = document.getElementById('judul').value;
    var pengarang = document.getElementById('pengarang').value;
    var tahun     = document.getElementById('tahun').value;
    var file      = document.getElementById('foto').files[0];

    if (!judul || !pengarang || !tahun) { alert('Semua field wajib diisi!'); return false; }
    if (tahun < 1000 || tahun > 9999)  { alert('Tahun tidak valid!');        return false; }
    if (!isEdit && !file)               { alert('Foto wajib dipilih!');       return false; }

    if (file) {
        if (!['image/jpeg','image/jpg','image/png'].includes(file.type)) { alert('Foto harus JPG/PNG!'); return false; }
        if (file.size > 2097152)                                          { alert('Foto max 2MB!'); return false; }
    }
    return true;
}

function cekHapus() {
    return confirm('Yakin hapus?');
}
