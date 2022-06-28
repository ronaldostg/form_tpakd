<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{url('')}}/logo_bank_sumut.jpg">
    <title>

        Form Pengajuan KUR</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('')}}/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="{{url('')}}/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href={{ asset('style/main.css')}}>
    <link rel="stylesheet" href="{{ url('') }}/datepicker/bootstrap-datepicker.min.css" />
   <link rel="stylesheet" href="{{ url('') }}/js/ui/jquery-ui.min.css" />
   {{-- <link rel="stylesheet" href="{{ url('') }}/select2/select2.min.css" /> --}}

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
                <a class="navbar-brand text-light " href="{{url('')}}"><b>Form Pengajuan KUR dan KMSB</b></a>
            </div>
        </nav>
    </header>
    
    
    <section id="cover">
    
        <div id="cover-caption">

            <div id="container" class="container mt-5 text-light">
            {{-- <div id="container" class="container mt-5"> --}}


                <div class="row mb-5">


                    <form id="check_form" method="post" action="/form-tpakd" enctype="multipart/form-data"  class="needs-validation" novalidation>
                    {{-- <form id="check_form"  enctype="multipart/form-data"  class="needs-validation" novalidation> --}}
                    {{-- <form class="needs-validation" novalidate> --}}



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

                                {{-- @if (session()->has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif --}}

                              {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                

                                <h3>Nama Pemohon</h3>
                                <div class="row mt-3">

                                    <div class="col-md-4 xs-6 my-2">

                                        <div class="form-group">
                                            <label class="sr-only error">Nama <span
                                                    class="text-light">*</span></label>
                                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                        
                                                placeholder="Nama Lengkap" value="{{ old('nama') }}" id="nama"> 
                                               @error('nama')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror 
                                         
                                        </div>

                                             
                                        
                                    </div>
                                    <div class="col-md-4 xs-6   my-2">
                                        <div class="form-group">
                                            <label class="sr-only">NIK <span
                                                    class="text-light">*</span></label>

                                            <input placeholder="NIK Sesuai KTP" maxlength="16" type="text" name="noNIK" class="form-control @error('noNIK') is-invalid @enderror"
                                                    id="nik" value="{{ old('noNIK') }}" >
                                                @error('noNIK')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Email </label>
                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" placeholder="Masukkan Email" value="{{ old('email') }}" >
                                                <small>(opsional)</small>
                                                @error('email')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">No. Telepon 1 <span
                                                    class="text-light">*</span></label>
                                            <input type="text" name="notelp1" id="notelp1" class="form-control @error('notelp1') is-invalid @enderror"
                                                placeholder="mis: 08xx-xxxx-xxxx"    id="notelp"  value="{{ old('notelp1') }}" >
                                                @error('notelp1')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">

                                            <label class="sr-only">Jenis Kelamin <span
                                                    class="text-light">*</span></label>
                                            <select class="form-select @error('jenisKelamin') is-invalid @enderror" name="jenisKelamin"
                                                aria-label="Default select example"    id="jenisKelamin">
                                                <option value="" selected>----Jenis Kelamin-----</option>
                                                <option value="laki-laki" @if (old('jenisKelamin') == "laki-laki") {{ 'selected' }} @endif>Laki-laki</option>
                                                <option value="perempuan"  @if (old('jenisKelamin') == "perempuan") {{ 'selected' }} @endif>Perempuan</option>
                                            </select>
                                            {{-- {{old('jenisKelamin')}} --}}
                                            
                                            @error('jenisKelamin')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>  
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="sr-only">No. Telepon 2</label>
                                            <input type="text" name="notelp2" class="form-control @error('notelp2') is-invalid @enderror"
                                                placeholder="mis: 08xx-xxxx-xxxx" id="notelp2" value="{{ old('notelp2') }}">
                                                <small>(opsional)</small>
                                                @error('notelp2')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label class="sr-only">Tanggal Lahir <span
                                                    class="text-light">*</span></label>
                                            <input type="text" name="tgl_lahir" class="form-control"
                                                placeholder="Masukkan tanggal lahir anda" id="tanggalLahir" value="{{ old('tgl_lahir') }}" readonly>
                                                @error('notelp2')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Foto KTP <span
                                                    class="text-light">*</span></label>
                                                     <img class="img-preview-ktp img-fluid mb-3 col-sm-5"  />
                                            <input type="file" name="fotoKTP" class="form-control @error('fotoKTP') is-invalid @enderror"
                                                      accept=".jpg, .jpeg, .png" id="fotoKTP" onchange="previewImageKTP()" value="{{old('fotoKTP')}}">
                                            <small>File dalam bentuk JPG,PNG,JPEG </small>
                                            {{old('fotoKTP')}}
                                                @error('fotoKTP')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                       

                                    </div>

                                </div>






                            </div>

                            <hr>
                             
                            <div class="info-form mt-2">
                                <h3>Alamat Usaha</h3>
                                <div class="row mt-3">




                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Kabupaten / Kota <span
                                                    class="text-light">*</span></label>
                                            <select class="form-control @error('usahaKabupaten') is-invalid @enderror" name="usahaKabupaten" id="kota"   >
                                                <option value="" selected>==Pilih Kabupaten / Kota==</option>

                                            </select>

                                            
                                            {{-- {{old('usahaKabupaten')}} {{request('usahaKabupaten')}} --}}
                                                @error('usahaKabupaten')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror



                                        </div>
                                    </div>



                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Kecamatan <span
                                                    class="text-light">*</span></label>
                                            <select class="form-control @error('usahaKecamatan') is-invalid @enderror" name="usahaKecamatan" id="kecamatan"
                                                aria-label="Default select example"   >
                                                <option value=" ">==Pilih Kecamatan==</option>
                                                

                                            </select>
                                             @error('usahaKecamatan')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Desa / Kelurahan <span
                                                    class="text-light">*</span></label>
                                            <select class="form-control @error('usahaDesaKel') is-invalid @enderror" name="usahaDesaKel" id="desakel"
                                                aria-label="Default select example"   >
                                                <option value=" ">==Pilih Desa / Kelurahan==</option>

                                            </select>
                                            @error('usahaDesaKel')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Alamat <span
                                                    class="text-light">*</span></label>
                                            <textarea class="form-control @error('detailAlamat') is-invalid @enderror" name="detailAlamat" id="detailAlamat" rows="3"   ></textarea>
                                            <small>Sesuai dengan lokasi tempat usaha</small>
                                            @error('detailAlamat')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                </div>





                              
                            </div>
                            <hr>




                            <div class="info-form mt-4">
                                {{-- <form action="" class="form-inline"> --}}
                                <h3>Pengajuan</h3>
                                 
                                 
                                <div class="row mt-3">



                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Jenis Pembiayaan <span
                                                    class="text-light">*</span></label>
                                            <select name="ketIzinUsaha" class="form-red bussiness form-select @error('ketIzinUsaha') is-invalid @enderror"
                                                id="jenisPembiayaan">
                                                <option value="" selected>----Jenis Pembiayaan---</option>
                                                <option value="KUR" @if (old('ketIzinUsaha') == "KUR") {{ 'selected' }} @endif>KUR</option>
                                                <option value="KMSB" @if (old('ketIzinUsaha') == "KMSB") {{ 'selected' }} @endif >KMSB</option>
                                            </select>
                                            @error('ketIzinUsaha')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label">Jumlah Pengajuan (Rp.)
                                            <span class="text-light">*</span></label>
                                        {{-- <div class="input-group"> --}}
                                            {{-- <span class="input-group-text" id="inputGroupPrepend2">Rp.</span> --}}
                                        
                                                    <div class="row">
                                                        <div class="col-2 ">
                                                            <input type="button" class="btn btn-danger" id="minus" value="-" />
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control " name="jlhPengajuan" id="jlhPengajuan"
                                                             placeholder="Masukkan Jumlah Nominal"    max="500" value="1.000.000" readonly
                                                               oninput="this.form.amountRange.value=this.value" step="1" 
                                                             >
                                                            <input type="range" name="amountRange" id="points" value="1" min="1" max="500"  
                                                            oninput="this.form.jlhPengajuan.value=this.value" step="1" /> 
                                                        
                                                        </div>
                                                        <div class="col-2">
                                                             <input type="button" id="plus" class="btn btn-success" value="+" />
                                                        </div>
                                                       
                                                            
                                                    </div>
                                            
                                            {{-- <input type="text" class="uang"> --}}


                                        {{-- </div> --}}
                                    </div>



                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Jangka waktu <span
                                                    class="text-light">*</span></label>

                             

                                            <select id="jangkaWaktu" name="jangkaWaktu"
                                            class="col-sm-6 custom-select custom-select-sm form-select @error('jangkaWaktu') is-invalid @enderror"
                                                placeholder="Pilih Jangka waktu"   
                                            >
                                                <option value="" selected>---Pilih Jangka Waktu---</option>
                                                <option value="1" @if (old('jangkaWaktu') == "1") {{ 'selected' }} @endif>1 tahun</option>
                                                <option value="2" @if (old('jangkaWaktu') == "2") {{ 'selected' }} @endif>2 tahun</option>
                                                <option value="3" @if (old('jangkaWaktu') == "3") {{ 'selected' }} @endif>3 tahun</option>
                                                <option value="4" @if (old('jangkaWaktu') == "4") {{ 'selected' }} @endif>4 tahun</option>
                                                <option value="5" @if (old('jangkaWaktu') == "5") {{ 'selected' }} @endif>5 tahun</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">Tujuan Kredit <span
                                                    class="text-light">*</span></label>

                                            {{-- <select name=""
                                            class="col-sm-6 custom-select custom-select-sm form-control"
                                                placeholder="Pilih Jangka waktu"   
                                            >
                                                <option value="">---Pilih Tujuan---</option>
                                                <option value="1">Modal Usaha</option>
                                                <option value="1">Menabung</option>
                                                <option value="1">Pembelian Lahan/Tapak</option>
                                                <option value="1">Pembelian Rumah/Bangunan</option>
                                                <option value="1">Pembelian Kendaraan</option>
                                                <option value="1">Pembelian Perlengkapan Usaha</option>
                                                <option value="1">Pembelian Elektronik</option>
                                                <option value="1">Kebutuhan Rumah Tangga</option>
                                                <option value="1">Kebutuhan Pendidikan</option>
                                                <option value="1">Kebutuhan Kesehatan</option>
                                                <option value="1">Kebutuhan Kesehatan</option>
                                                
                                            </select> --}}
                                            {{-- <input list="listUsaha" name="jnsUsaha"
                                                class="col-sm-6 custom-select custom-select-sm form-control"
                                                placeholder="Pilih Jenis Usaha"     id="jnsUsaha">
                                            <datalist>
                                                <option>Lainnya</option>
                                                <option>Tenaga Kerja Indonesia</option>
                                                <option>Industri Rumahan</option>
                                                <option>Perkebunan</option>
                                                <option>Perikanan</option>
                                                <option>Kuliner</option>
                                                <option>Perdagangan</option>
                                            </datalist> --}}
                                            <select class="form-control @error('jnsUsaha') is-invalid @enderror" name="jnsUsaha" id="listTujuanKredit"   >
                                                <option value=" ">==Pilih Tujuan Kredit==</option>
                                                 
                                            </select>
                                             @error('npwp')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>


                                    
                                    <div class="col-md-4 my-2">
                                        <div class="form-group">
                                            <label class="sr-only">NPWP </label>
                                            <input maxlength="15" type="text" name="npwp" class="form-control  @error('npwp') is-invalid @enderror" value="{{ old('npwp') }}"
                                                placeholder="Masukkan Nomor NPWP" id="npwp" >
                                                <small>(opsional)</small>
                                                @error('npwp')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                @enderror

                                                {{-- {{ Form::select('experience', $experience, $selected, ['class' => 'form-control']) }} --}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="sr-only">Upload Foto Tempat Usaha <span
                                                    class="text-light">*</span></label>
                                                    <img class="img-preview-tempat-usaha img-fluid mb-3 col-sm-5"  />
                                                     
                                                <input type="file" name="fotoTempatUsaha" class="form-control @error('fotoTempatUsaha') is-invalid @enderror"
                                                name="fotoTempatUsaha" accept="image/*" id="fotoTempatUsaha" onchange="previewImageTempatUsaha()">
                                                    <small>File dalam bentuk JPG,PNG,JPEG</small>
                                                    @error('fotoTempatUsaha')
                                                    <div class="invalid-feedback ">
                                                        <div class="alert-warning px-2 mt-1">{{ $message }}</div>
                                                    </div>
                                                     @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox" id="setujuKirim"  value=""  name="cekPengajuan" required >
                                            <label class="form-check-label px-1" for="flexCheckDefault" id="labelSetujuKirim"  >
                                            Dengan ini saya menyetujui memberikan data tersebut diatas untuk dipergunakan dalam proses pengajuan KUR melalui <b>PT Bank Sumut</b>
                                            </label>
                                            

                                                    

                                            <div class="mt-3">

                                                * Pengajuan melalui website ini gratis<br>
                                                * Proses analisa dan persetujuan dilakukan bank penyalur KUR<br>
                                                * Pastikan no. HP Anda sudah benar dan aktif. Pastikan alamat usaha Anda sudah benar.<br>
                                                
                                            </div>
                                            @error('cekPengajuan')
                                            <div class="px-2 mt-2 alert-warning" >
                                            {{-- <span class="badge badge-danger"> --}}
                                                {{$message}}
                                            </span>
                                            @enderror
                                                    
                                        </div>
                                      
                                      
                                    </div>


                                </div>
                            </div>
                            {{-- <button  type="button" id="checkFormData" class="btn btn-success btn-lg" onClick='checkFormValidation()'>Ajukan</button> --}}
                            <button  type="button" id="checkFormData" class="btn btn-success btn-lg" onClick='checkFormValidation()'>Ajukan</button>

                            {{-- <input type="submit" value="Ajukan" class="btn btn-success btn-lg"/> --}}


                        </div>

                    </form>

                </div>
                            

                
            </div>
        </div>
    </section>
                

    <script src="{{url('')}}/js/jquery.min.js" ></script>
    <script src="{{url('')}}/js/jquery.mask.min.js"></script>
    <script src="{{  url('') }}/datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ url('') }}/js/ui/jquery-ui.min.js"></script>
     <script src="{{ url('') }}/js/app.js"></script>
     
  




</body>



</html>
