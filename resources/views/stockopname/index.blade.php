<!doctype html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Stock Count Apps</title>
    <meta name="description" content="Stock Opname Apps">
    <meta name="keywords"
        content="stock, opname" />
    <link rel="icon" type="image/png" href="{{ asset ('asset_so/img/favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset ('asset_so/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset ('asset_so/css/style.css') }}">
    <!-- <link rel="manifest" href="__manifest.json"> -->

    <style>
        @keyframes blink {
          0% { opacity: 1; }
          50% { opacity: 0; }
          100% { opacity: 1; }
        }
        .blink {
          animation: blink 1s infinite;
          color: red;
        }
      </style>

</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="{{ asset ('asset_so/img/loading-icon.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <img src="{{ asset ('asset_so/img/logo.png') }}" alt="logo" class="logo">
        </div>
        <div class="right">
            <!--  -->
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Hello!</span>
                        <h1 class="total">{{ $Nama }}</h1>
                        <input type="hidden" class="form-control" id="level" name="level" value="{{ Auth::user()->level}}"" readonly> 
                    </div>
                    <div class="righ">
                        <span class="title">{{$Plant}}</span>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                {{-- <div class="wallet-footer"> --}}
                <div class="center">
                    <a href="#" class="btn btn-outline-primary rounded shadowed btn-block btn-lg" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                        <i class="icon ion-md-keypad"></i>
                        <center>
                            <div class="blink">Start Here!!</div>
                        
                        </center>
                    </a>
                    
                </div>
                {{-- </div> --}}
                <br>
                <!-- * Wallet Footer -->

                {{-- <div class="wallet-footer"> --}}
                    <div class="carousel-multiple splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($TS as $ts)
                                <li class="splide__slide">
                                    <a href="#">
                                    <div class="bill-box btn-outline-primary" style="border: 1px solid rgb(113, 8, 233);">
                                        <div class="price" id="target">{{$ts->done}}/{{$ts->total}}</div>
                                        <h5>Batch - {{date('d M', strtotime($ts->batch_so)) }} </h5>
                                        <a href="#" class="btn btn-primary btn-block btn-sm" id="checknow">REFRESH</a>
                                    </div>
                                    </a>
                                </li>
                                @endforeach
                        </ul>
                    </div>
                    
                </div>
                {{-- </div> --}}
            

            </div>
        </div>
        <!-- Wallet Card -->
    

        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Perhatian!!</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <p>Pastikan Anda melakukan penghitungan stock dengan <b>Sesuai</b> dengan stock Fisik.</p>
                            <p>Terimakasih 
                                <i class="icon ion-md-happy"></i>
                            </p>
                            <div class="form-group basic">
                                <button type="button" class="btn btn-primary btn-block btn-lg"
                                data-bs-toggle="modal" id="mulaicek">Mulai {{$level}}</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Deposit Action Sheet -->

        <!-- Dialog Form -->
        <div class="modal fade dialogbox" id="DialogForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Stock Count</h5>
                    </div>
                    <form id="formTransactions">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="modal-body text-start mb-2">

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">Bin No.</label>
                                    <input type="text" class="form-control" id="bin_no" name="bin_no" readonly> 
                                    <input type="hidden" class="form-control" id="id" name="id" readonly> 
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">Item No.</label>
                                    <input type="text" class="form-control" id="item_no" name="item_no" readonly>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">Description.</label>
                                    <textarea name="description" id="description" class="form-control" readonly></textarea>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">Variant.</label>
                                    <input type="text" class="form-control" id="variant" name="variant" readonly>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">Quantity.</label>
                                    <input type="number" step="any" class="form-control" name="qty_count1" id="qty_count1" value="0" autofocus>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">UoM.</label>
                                    <input type="text" class="form-control" id="uom" name="uom" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="btn-inline">
                                <button type="button" class="btn btn-text-secondary"
                                    data-bs-dismiss="modal">TUTUP</button>
                                {{-- <button type="button" class="btn btn-text-primary" data-bs-toggle="modal" data-bs-target="#DialogIconedDanger">KONFIRMASI</button> --}}
                                <button type="button" class="btn btn-text-primary" data-bs-toggle="modal" data-bs-target="#AndaYakin">KONFIRMASI</button>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
        <!-- * Dialog Form -->
        
         <!-- DialogIconedDanger -->
         <div class="modal fade dialogbox" id="AndaYakin" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Apakah Anda Yakin</h5>
                        
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            {{-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#DialogForm">Tutup</a> --}}
                            <a href="#" class="btn" data-bs-dismiss="modal">Tidak</a>
                            <button type="submit" class="btn btn-text-primary" data-bs-toggle="modal" data-bs-target="#DialogIconedDanger">Yakin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedDanger -->
    </form>

        <!-- DialogIconedDanger -->
        <div class="modal fade dialogbox" id="DialogIconedDanger" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Data Disimpan!</h5>
                        
                    </div>
                    <div class="modal-body">
                        Silahkan Hitung untuk Item Selanjutnya
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            {{-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#DialogForm">Tutup</a> --}}
                            <a href="#" class="btn" id="lanjut">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedDanger -->

        <!-- DialogIconedDanger -->
        <div class="modal fade dialogbox" id="Kosong" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Tidak ada data yang ditampilkan</h5>
                        
                    </div>
                    <div class="modal-body">
                        Sepertinya sudah selesai.
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            {{-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#DialogForm">Tutup</a> --}}
                            <button type="button" class="btn btn-text-secondary"
                                    data-bs-dismiss="modal">SELESAI</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedDanger -->

        <div class="modal fade dialogbox" id="downloadReports" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                {!! Form::open(['url' => 'reportso', 'id' => 'formReport']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Password</h5>
                        
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="default_pass" name="default_pass" value="falcon">
                        <input type="password" class="form-control" id="pass" name="pass">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="selectPlant">Select Plant</label>
                                <select class="form-control custom-select" id="plant" name="plant">
                                    <option value="CFMC">CFMC</option>
                                    <option value="CFMM">CFMM</option>
                                    <option value="AFIM">AFIM</option>
                                    <option value="HFMG">HFMG</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            {{-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#DialogForm">Tutup</a> --}}
                            <a href="#" class="btn" data-bs-dismiss="modal">Tutup</a>
                            <a href="#" class="btn" id="download"><i class="icon ion-md-download"></i> Download</a>
                            {{-- <button type="submit" class="btn" id="excel"><i class="icon ion-md-download"></i> Download</button> --}}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="modal fade dialogbox" id="passwordSalah" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Password Salah!</h5>
                        
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" data-bs-dismiss="modal">OK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <!-- * App Capsule -->
    <!-- app footer -->
    
    <!-- * app footer -->

        <!-- App Bottom Menu -->
        <div class="appBottomMenu">
            {{-- <a href="{{ url('reportso') }}" class="item" > --}}
            <a href="" class="item" data-bs-toggle="modal" data-bs-target="#downloadReports">
                <div class="col">
                    <i class="icon ion-md-download"></i>
                    <strong>Reports</strong>
                </div>
            </a>
            <a href="{{ url('logout') }}" class="item">
                <div class="col">
                    <i class="icon ion-md-log-out"></i>
                    <strong>Logout</strong>
                </div>
            </a>
        </div>
        <!-- * App Bottom Menu -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{ asset ('asset_so/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="{{ asset ('asset_so/unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.js') }}"></script>
    
    <!-- Splide -->
    <script src="{{ asset ('asset_so/js/plugins/splide/splide.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset ('asset_so/js/base.js') }}"></script>

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>

    <script src="{{ asset ('asset_so/data/data.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#DialogForm').on('shown.bs.modal', function() {
                $('#qty_count1').focus().select();
            });

            $(document).on('click', '#mulaicek', function (event) {
                event.preventDefault();

                let level = $('#level').val();
                let target;

                if(level === 'Counter'){
                    target = '{{route('mulai')}}';
                }
                else{
                    target = '{{route('verifikasi')}}';
                }

                    $.ajax({
                    url: target,
                    // dataType: "json",
                    type: "GET",
                    // data: {id:id, filter_month_year:filter_month_year},
                    success: function (result) {
                        if (result.data.transactions && result.data.transactions.id) {
                            // console.log(result.transactions);
                            // console.log(result.data.transactions);
                            let transactions = result.data.transactions;

                            $('#id').val(transactions.id);
                            $('#bin_no').val(transactions.bin_no);
                            $('#item_no').val(transactions.item_no);
                            $('#description').val(transactions.description);
                            $('#variant').val(transactions.variant);
                            $('#uom').val(transactions.uom);
                            $('#qty_count1').val(0);

                            $('#DialogForm').modal('show');
                            // $('#qty_count1').focus();
                        }
                        else{
                            $('#Kosong').modal('show');
                        }
                    },
                    
                });
            });

            $(document).on('click', '#checknow', function (event) {
                event.preventDefault();

                location.reload();
            });

            $('#formTransactions').on('submit', function(event) {
                event.preventDefault();
                
                let target = '{{route('simpan')}}';
                $.ajax({
                    url: target,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        // console.log(data);
                        // $('#DialogForm').modal('hide');
                        // $('#DialogIconedDanger').modal('hide').delay(3000);
                        // $('#DialogForm').modal('show');
                        $('#formTransactions')[0].reset();
                        // $('#mulaicek').trigger('click');
                    }
                });

            });

            $(document).on('click', '#lanjut', function (event) {
                $('#mulaicek').trigger('click');
                
                $('#DialogIconedDanger').modal('hide');
            });

            $(document).ready(function() {
                $('#download').on('click', function(event) {
                    let pass = $('#pass').val();
                    let default_pass = $('#default_pass').val();
                    let plant = $('#selectPlant').val();

                    if (pass !== default_pass) {
                        $('#downloadReports').modal('hide');
                        $('#passwordSalah').modal('show');
                        $('#pass').val('');
                    } else {
                    // Trigger the form submission
                        $('#formReport').submit();
                        $('#downloadReports').modal('hide');
                        $('#pass').val('');
                    }
                });
                
                });




        });
    </script>


</body>

</html>