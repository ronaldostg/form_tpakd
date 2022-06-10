<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <img src="https://www.banksumut.co.id/wp-content/uploads/2019/04/sinergi-budaya.jpg"> --}}
    <title>

        Form Pengajuan KUR</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href={{ asset('style/main.css')}}>

</head>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
        /* Firefox */
    }

</style>

<body>

    <!-- Modal -->


    <header class="">

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ED7E2C">
            <div class="container-fluid">
                <a class="navbar-brand text-light " href="#"><b>Form Pengajuan KUR dan KMSB</b></a>
            </div>
        </nav>
    </header>
    
    
    <section id="cover">
    
        <div id="cover-caption">

            <div id="container" class="container mt-5 text-light">


                <div class="row mb-5">


                    <form method="post" action="/form-tpakd" enctype="multipart/form-data" >



                        @csrf
                        <div class="col-sm-10 offset-sm-1">
                            <h3 class="display-3 text-center"><b>Pengajuan KUR dan KMSB</b> </h3>


                            {{-- nama pengguna --}}
                            <div class="info-form mt-3 mb-5">
                                {{-- <form action="" class="form-inline"> --}}

                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}


                                        <ul>
                                            @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>


                                    </div>
                                @endif
                                

                                <h3>Nama Pemohon</h3>
                                <div class="row mt-3">

                                    <div class="col-md-4 xs-6 my-2">

                                        <div class="form-group">
                                            <label class="sr-only">Nama <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Nama Lengkap" required>
                                               
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4 xs-6   my-2">
                                        <div class="form-group">
                                            <label class="sr-only">NIK <span
                                                    class="text-danger">*</span></label>

                                            <input type="number" name="noNIK" class="form-control"
                                                placeholder="Masukkan NIK" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Email </label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Masukkan Email">
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">No. Telepon 1 <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="notelp1" class="form-control"
                                                placeholder="Masukkan No. Telepon" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">

                                            <label class="sr-only">Jenis Kelamin <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="jenisKelamin"
                                                aria-label="Default select example" required>
                                                <option selected value="">----Jenis Kelamin-----</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Foto KTP <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" name="fotoKTP" class="form-control"
                                                    id="inputGroupFile02"  accept="image/*" required>
                                            <small>File dalam bentuk JPG,PNG,JPEG </small>
                                        </div>
                                       

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="sr-only">No. Telepon 2</label>
                                            <input type="number" name="notelp2" class="form-control"
                                                placeholder="(opsional)">
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label class="sr-only">Tanggal Lahir <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="tgl_lahir" class="form-control"
                                                placeholder="Jane Doe" required>
                                        </div>
                                    </div>

                                </div>






                            </div>

                            <hr>
                            {{-- alamat usaha --}}


                            <div class="info-form mt-2">
                                <form action="" class="form-inline">
                                <h3>Alamat Usaha</h3>
                                <div class="row mt-3">




                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Kabupaten / Kota <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" name="usahaKabupaten" id="kota" required>
                                                <option value=" ">==Pilih Kabupaten / Kota==</option>
                                                {{-- @foreach ($cities as $item)
                                                    <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}
                                                    </option>
                                                @endforeach --}} 
                                            </select>



                                        </div>
                                    </div>



                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Kecamatan <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="usahaKecamatan" id="kecamatan"
                                                aria-label="Default select example" required>
                                                <option value=" ">==Pilih Kecamatan==</option>
                                                

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Desa / Kelurahan <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="usahaDesaKel" id="desakel"
                                                aria-label="Default select example" required>
                                                <option value=" ">==Pilih Desa / Kelurahan==</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Jalan <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="detailAlamat" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>





                              
                                </form>
                            </div>
                            <hr>




                            <div class="info-form mt-4">
                                {{-- <form action="" class="form-inline"> --}}
                                <h3>Pengajuan</h3>
                                <div class="row mt-3">



                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Jenis Pembiayaan <span
                                                    class="text-danger">*</span></label>
                                            <select name="ketIzinUsaha" class="form-red bussiness form-control"
                                                >
                                                <option value="">----Jenis Pembiayaan---</option>
                                                <option value="KUR">KUR</option>
                                                <option value="KMSB">KMSB</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationDefaultUsername" class="form-label">Jumlah Pengajuan
                                            <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">Rp.</span>

                                            <input type="text" class="form-control uang" name="jlhPengajuan" required>
                                            {{-- <input type="text" class="uang"> --}}


                                        </div>
                                    </div>



                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Jangka waktu <span
                                                    class="text-danger">*</span></label>

                                            <input list="jangkaWaktu" name="jangkaWaktu"
                                                class="col-sm-6 custom-select custom-select-sm form-control"
                                                placeholder="Pilih Jenis Usaha" required>
                                            <datalist id="jangkaWaktu">
                                                <option>1 tahun</option>
                                                <option>2 tahun</option>
                                                <option>3 tahun</option>
                                                <option>4 tahun</option>
                                                <option>5 tahun</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Jenis Usaha <span
                                                    class="text-danger">*</span></label>

                                            <input list="listUsaha" name="jnsUsaha"
                                                class="col-sm-6 custom-select custom-select-sm form-control"
                                                placeholder="Pilih Jenis Usaha" required>
                                            <datalist id="listUsaha">
                                                <option>Lainnya</option>
                                                <option>Tenaga Kerja Indonesia</option>
                                                <option>Industri Rumahan</option>
                                                <option>Perkebunan</option>
                                                <option>Perikanan</option>
                                                <option>Kuliner</option>
                                                <option>Perdagangan</option>
                                            </datalist>
                                        </div>
                                    </div>


                                    
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">NPWP </label>
                                            <input type="number" name="npwp" class="form-control"
                                                placeholder="Masukkan Nomor NPWP">
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Upload Foto Tempat Usaha <span
                                                    class="text-danger">*</span></label>
                                                <input type="file" name="fotoTempatUsaha" class="form-control"
                                                    id="inputGroupFile02" name="fotoTempatUsaha" accept="image/*" >
                                                    <small>File dalam bentuk JPG,PNG,JPEG</small>
                                        </div>

                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="checkPengajuan" >
                                            <label class="form-check-label" for="flexCheckDefault">
                                            Dengan ini saya menyetujui memberikan data tersebut diatas untuk dipergunakan dalam proses pengajuan KUR melalui <b>PT Bank Sumut</b>
                                            </label><br>
                                            <div class="mt-3">

                                                * Pengajuan melalui website ini gratis<br>
                                                * Proses analisa dan persetujuan dilakukan bank penyalur KUR<br>
                                                * Pastikan no. HP Anda sudah benar dan aktif. Pastikan alamat usaha Anda sudah benar.<br>
                                                
                                            </div>
                                        </div>
                                        <br>

                                      
                                    </div>


                                </div>
                            </div>

                            <button onclick="return confirm('Apakah anda yakin untuk mengirim data pengajuan?')" type="submit" class="btn btn-success btn-lg ">Ajukan</button>
                            {{-- <button type="submit" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">Ajukan</button> --}}


                        </div>

                    </form>

                </div>

                
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
         
        $(document).ready(function() {

            
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
                    url: '{{ route('kecamatan') }}',
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

                // console.log('kode kecamatan');
                // console.log(kdKec);
                // return false;
                $.ajax({
                    type: 'GET',
                    url: '{{ route('desakel') }}',
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

        function loadDataKabupaten(){

            $.ajax({
                type: 'GET',
                url: '{{ route('kabupaten') }}',
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

        loadDataKabupaten();


      
        
    </script>




</body>



</html>
