<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js
    "></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"
         crossorigin="anonymous">
    
     <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet"
         crossorigin="anonymous">
         <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    

   
	</head>
<body>
    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>

                @php
                use App\Http\Controllers\Helper\HelperController;

                @endphp
                @foreach($datas as $item)
                <tr>
                    <td>{{$item->nama}}</td>
                    <td>{{HelperController::decryptData($item->noNIK)}}</td>
                    <td>{{$item->notelp1}}</td>
                    <td>{{$item->detailAlamat}}</td>
                    <td>{{$item->jlhPengajuan}}</td>
                    <td>{{$item->jangkaWaktu}}</td>
                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>

                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
    </div>



    
    @foreach($datas as $item)
        <p>{{$item->nama}}</p>
        <p>{{  
            

            HelperController::decryptData($item->noNIK)
        
        
        
        }}</p>
        <p>{{$item->email}}</p>
        <p>{{$item->notelp1}}</p>

        <p>{{$item->tgl_lahir}}</p>
        
        
        
        <p>{{(int)str_replace(".", "", $item->jlhPengajuan)}}</p>
        
{{--         
        <p>{{$item->kabupaten->name}}</p>
        <p>{{$item->kecamatan->name}}</p>
        <p>{{$item->desa->name}}</p> --}}


        <p>{{$item->usahaKabupaten}}</p>
        <p>{{$item->usahaKecamatan}}</p>
        <p>{{$item->usahaDesaKel}}</p>
        <p>{{$item->created_at}}</p>





      <img src="data:image;base64,{{$item->fotoKTP}}" alt="Foto KTP" /> 
      <img src="data:image;base64,{{$item->fotoTempatUsaha}}" alt="Foto KTP"/> 
    

      
      <form action="/form-tpakd/{{ $item->id }}" method="post" class="d-inline">
        {{-- memperkenalkan method delete --}}
        @method('delete')
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
          <button onclick="return confirm('Are you sure ?')"> Hapus</span>

          </button>
        
      </form>

    @endforeach

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    

      <script>
          $(document).ready(function() {
                $('#example').DataTable();
            } );


      </script>
    
    {{-- <script type="text/javascript">
        $(document).ready(function(){

            // Format mata uang.
            $( '.uang' ).mask('000.000.000', {reverse: true});

        })
    </script> --}}
</body>
</html>