const urlMain = "http://192.168.177.27:8000/";

function checkFormValidation() {

    var x = confirm("Apakah anda yakin untuk mengirim pengajuan ?");


    if (x == true) {
        //console.log('kirimkan');

        $('#check_form').submit();
    } else {
        return false;
    }

}


document.getElementById('notelp1').addEventListener('keyup', function(evt) {
    var phoneNumber = document.getElementById('notelp1');
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    phoneNumber.value = phoneFormat(phoneNumber.value);
});
document.getElementById('notelp2').addEventListener('keyup', function(evt) {
    var phoneNumber = document.getElementById('notelp2');
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    phoneNumber.value = phoneFormat(phoneNumber.value);
});

// We need to manually format the phone number on page load
document.getElementById('notelp1').value = phoneFormat(document.getElementById('notelp1').value);
document.getElementById('notelp2').value = phoneFormat(document.getElementById('notelp2').value);

// A function to determine if the pressed key is an integer
function numberPressed(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 36 || charCode > 40)) {
        return false;
    }
    return true;
}

// A function to format text to look like a phone number
function phoneFormat(input) {
    // Strip all characters from the input except digits
    input = input.replace(/\D/g, '');

    // Trim the remaining input to ten characters, to preserve phone number format
    input = input.substring(0, 13);

    // Based upon the length of the string, we add formatting as necessary
    var size = input.length;
    if (size == 0) {
        input = input;
    } else if (size < 5) {
        input = '' + input;
    } else if (size < 8) {
        input = '' + input.substring(0, 4) + '-' + input.substring(4, 8);
    } else {
        input = '' + input.substring(0, 4) + '-' + input.substring(4, 8) + '-' + input.substring(8, 14);
    }
    return input;
}


$(document).ready(function() {


    $('#setujuKirim').on('click', function() {

        if ($(this).is(":checked")) {
            $(this).val('1');

        } else {
            $(this).val('');

        }

        // else {

        //     alert('Beri tanda ceklist pada bagian ini ');

        // }
    })






    var rangePenghasilan = $('.input-range-penghasilan'),
        valuePenghasilan = $('.range-penghasilan');
    valuePenghasilan.html(rangePenghasilan.attr('value'));
    rangePenghasilan.on('input', function() {
        valuePenghasilan.html(this.value);
    });


    //$("#checkValidation").focus();tanggalLahir
    var date = new Date();
    $('#tanggalLahir').datepicker({
        yearRange: '1900:2022',
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        //minDate:new Date(limitDatePicker),
        maxDate: new Date()
    }).datepicker("setDate", date);




    $('#email').on('input', function() {
        var val = $(this).val();

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!emailReg.test(val)) {
            $(this).addClass("is-invalid");
            if ($(this).next("#lengthCharacter").length) {

            } else {

                $(this).after('<div class="text-white font-weight-bold alert-warning px-2 mt-1" id="lengthCharacter"><label>Email anda tidak sesuai format</label></div>');
            }


        } else {
            $(this).removeClass("is-invalid");
            $(this).next("#lengthCharacter").remove();
        }



    });

    $('#points').on('input', function() {

        var counter = $(this).val();
        $('#jlhPengajuan').val(counter + ".000.000");

        //console.log(counter);
    });

    $("#plus").click(function() {

        var newValuePlus = parseInt($("#jlhPengajuan").val()) + 1;
        if (newValuePlus > 500) return;

        $("#jlhPengajuan").val(newValuePlus.toString() + ".000.000");

    });


    $("#minus").click(function() {

        var newValueMinus = parseInt($("#jlhPengajuan").val()) - 1;
        if (newValueMinus < 1) return;

        $("#jlhPengajuan").val(newValueMinus.toString() + ".000.000");
    });





    $('#nik').on('input', function() {
        //var len = max_length - $(this).val().length;
        var c = this.selectionStart,
            r = /[^0-9]/gi,
            v = $(this).val();

        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }

        if (v.length < 16) {
            if ($(this).next("#lengthCharacter").length) {

                $(this).addClass("is-invalid");
            } else {
                if ($(this).next("#lengthCharacter").length) {
                    $(this).next("#lengthCharacter").remove();
                } else {

                    $(this).addClass("is-invalid");
                    $(this).after('<div class="text-white font-weight-bold alert-warning px-2 mt-1" id="lengthCharacter"><label>Wajib minimal 16 angka</label></div>');
                }

            }
            //$(this).after('<div class="text-white font-weight-bold" id="alertwarning"><label><b>Wajib 16 karakter</b></label></div>');

        } else {
            $(this).next("#lengthCharacter").remove();
            $(this).removeClass("is-invalid");
            return true;
        }
        //$(this).next("#lengthCharacter").remove();


        this.setSelectionRange(c, c);

    });

    $('#npwp').on('input', function() {
        //var len = max_length - $(this).val().length;
        var c = this.selectionStart,
            r = /[^0-9]/gi,

            v = $(this).val();

        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }

        if (v.length < 15) {
            if ($(this).next("#lengthCharacter").length) {
                //$(this).next("#lengthCharacter").remove();
            } else {
                $(this).addClass("is-invalid");
                $(this).after('<div class="text-white font-weight-bold alert-warning px-2 mt-1" id="lengthCharacter"><label>Wajib 15 karakter</label></div>');
            }

        } else {
            $(this).removeClass("is-invalid");
            $(this).next("#lengthCharacter").remove();


        }




        this.setSelectionRange(c, c);

    });



    $('#email').on('input', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9@_.]/gi,
            v = $(this).val();

        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }


        this.setSelectionRange(c, c);


    });

    $('#nama').on('input', function() {
        var c = this.selectionStart,
            r = /[^a-z ]/gi,
            v = $(this).val();

        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }


        this.setSelectionRange(c, c);


    });

    $('#detailAlamat').on('input', function() {

        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();

        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }


        this.setSelectionRange(c, c);

    });






    $("#nama, #nik, #notelp1,#jenisKelamin, #fotoKTP,#tanggalLahir,#detailAlamat,#jenisPembiayaan,#jlhPengajuan,#jangkaWaktu, #jnsUsaha,#fotoTempatUsaha,#kota,#kecamatan,#desakel ").on('blur', function() {

        var value = $(this).val();

        if (value.length == 0) {
            $(this).next("#lengthCharacter").remove();

            if ($(this).next("#alertwarning").length) {

            } else {
                if ($(this).next("#lengthCharacter").length) {
                    $(this).next("#lengthCharacter").remove();

                }
                $(this).addClass("is-invalid");

                $(this).after('<div class="text-white font-weight-bold alert-warning px-2 mt-1" id="alertwarning"><label>Wajib diisi</label></div>');
            }
        } else {
            $(this).removeClass("is-invalid");
            $(this).next("#alertwarning").remove();
            $(this).next("#checkFormat").remove();


            return true;
        }

        return false;
    });




    $('.uang').mask('000.000.000', {
        reverse: true

    });

    $('#kota').on('change', function() {

        document.getElementById('kecamatan').disabled = false;
        // console.log()
        kdKotaKab = this.value;
        const kec = document.querySelector('#kecamatan');
        kec.innerHTML = '';
        // console.log(kdKotaKab);
        $.ajax({
            type: 'GET',
            url: urlMain + 'kecamatan',
            data: {
                kabkota: this.value,
            },
            // cache: false,
            success: function(data) {
                // alert(string);
                // const datas = JSON.parse(data);
                const items = data.items;
                const kecamatan = document.querySelector('#kecamatan');
                // console.log(kecamatan);
                // console.log(items);
                // return false;
                items.forEach((item) => {

                    kecamatan.innerHTML += `
                    <option value='${item.wilayah}'>${item.wilayah}</option>
                    `;

                });
            },

        });
    });



    $('#kecamatan').on('change', function() {

        document.getElementById('desakel').disabled = false;

        kdKec = this.value;
        const kel = document.querySelector('#desakel');
        kel.innerHTML = '';

        $.ajax({
            type: 'GET',
            url: urlMain + 'desakel',
            data: {
                kecamatan: this.value,
            },

            success: function(data) {
                // alert(string);
                // const datas = JSON.parse(data);
                const items = data.items;
                const desa = document.querySelector('#desakel');

                // console.log(desa);
                // console.log(items);
                // return false
                items.forEach((item) => {

                    desa.innerHTML += `
                    <option value='${item.wilayah}'>${item.wilayah}</option>
                    `;


                });

            }
        });


    });







});

function loadDataKabupaten() {

    $.ajax({
        type: 'GET',
        url: urlMain + 'kabupaten',
        data: {

            provinsi: 'sumatera utara',
        },

        success: function(data) {

            // return false;
            // const datas = JSON.parse(data);
            const items = data.items;
            const kota = document.querySelector('#kota');

            // console.log(items);
            items.forEach((item) => {

                kota.innerHTML += `
                <option value='${item.wilayah}'>${item.wilayah}</option>
                `;
            });
            // console.log(data);

        }
    });


}

function loadTujuanKredit() {
    $.ajax({
        type: 'GET',
        url: urlMain + 'tujuankredit',


        success: function(data) {

            // return false;
            // const datas = JSON.parse(data);
            const items = data.data;
            const kota = document.querySelector('#listTujuanKredit');

            // console.log(items);
            items.forEach((item) => {

                kota.innerHTML += `
                <option value='${item.nama_tujuan}'>${item.nama_tujuan}</option>
                `;
            });
            // console.log(data);

        }
    });
}

loadDataKabupaten();
loadTujuanKredit();


function previewImageKTP() {
    const image = document.querySelector('#fotoKTP');

    const imgPreview = document.querySelector('.img-preview-ktp')


    imgPreview.style.display = 'block'

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }

}

function previewImageTempatUsaha() {
    const image = document.querySelector('#fotoTempatUsaha');

    const imgPreview = document.querySelector('.img-preview-tempat-usaha')


    imgPreview.style.display = 'block'

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }

}