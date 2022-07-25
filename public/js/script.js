$(function(){

    $('.modalUbah').on('click', function(){
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/mahasiswa/edit');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/mahasiswa/getUbah',
            data : {id : id},
            type : 'POST',
            dataType : 'json',
            success : function(data){
                $('#id').val(data.id)
                $('#nama').val(data.nama)
                $('#nrp').val(data.nrp)
                $('#jurusan').val(data.jurusan)
                $('#email').val(data.email)
                $('#gambar1').attr("src" , "img/" + data.gambar )
                $('#gambarLama').val(data.gambar)
            }
        });
    });

    $('.modalTambah').on('click', function(){
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/mahasiswa/tambah');
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#id').val('');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#gambar1').attr("src", "img/" + '');
    });


});