<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{ asset ('bootstrap/hatoban/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('bootstrap/hatoban/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('bootstrap/hatoban/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('bootstrap/style.css') }}">

    <style>
            /* @media (min-width: 768px) {
            .modal-xl {
            width: 90%;
            max-width:1200px;
            }
        } */
        .text1
            {
                font-size: 12px;
            }

        .modal-dialog {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        }

        .modal-content {
        height: auto;
        min-height: 100%;
        border-radius: 0;
        }
    </style>
    
    <script src="{{ asset ('bootstrap/hatoban/jquery.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/hatoban/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/hatoban/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/hatoban/dataTables.select.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#empTable').DataTable({

                dom: 'Blfrtip',
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                },
                ],
                pageLength: 25,
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                order: [
                    [1, 'asc']
                ]
            });

            table.on( 'select', function ( e, dt, type, ix ) {
                if (type === 'row') {
                    var rows = table.rows(ix).nodes().to$();
                    //var ignore = node.hasClass( 'ignoreme' );
                    $.each(rows, function() {
                    if ($(this).hasClass('ignore')) table.row($(this)).deselect();
                    })
                }

                var selected = dt.rows({selected: true});
                if ( selected.count() > 15 ) {
                    dt.rows(ix).deselect();
                }

            } );
            //
            // table.buttons().container()
            //     .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

            $('#modal1').on('hidden.bs.modal', function () {
                $(this).find("input,textarea,select").val('').end();

            });


            $('#btnPrint').on('click', function() {

                var tblData = table.rows('.selected').data();

                // var Item1 = tblData[0][2].concat(', ',  tblData[0][3], ', ',  tblData[0][4], ', ',  tblData[0][5], ', ',  tblData[0][6], ', ',  tblData[0][7], ', ',  tblData[0][8]);
                var Item1 = tblData[0][3].concat(', ',  tblData[0][4], ', ',  tblData[0][5], ', ',  tblData[0][6], ', ',  tblData[0][7], ', ',  tblData[0][8], ', ',  tblData[0][9]);
                
                $('#no_item1').val(tblData[0][1]);
                $('#item1').val(Item1.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom1').val(tblData[0][11]);
                $('#bin1').val(tblData[0][2]);
                $('#kode1').val(tblData[0][14]);

                var Item2 = tblData[1][3].concat(', ',  tblData[1][4], ', ',  tblData[1][5], ', ',  tblData[1][6], ', ',  tblData[1][7], ', ',  tblData[1][8], ', ',  tblData[1][9]);

                $('#no_item2').val(tblData[1][1]);
                $('#item2').val(Item2.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom2').val(tblData[1][11]);
                $('#bin2').val(tblData[1][2]);
                $('#kode2').val(tblData[1][14]);

                var Item3 = tblData[2][3].concat(', ',  tblData[2][4], ', ',  tblData[2][5], ', ',  tblData[2][6], ', ',  tblData[2][7], ', ',  tblData[2][8], ', ',  tblData[2][9]);
                $('#no_item3').val(tblData[2][1]);
                $('#item3').val(Item3.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom3').val(tblData[2][11]);
                $('#bin3').val(tblData[2][2]);
                $('#kode3').val(tblData[2][14]);

                var Item4 = tblData[3][3].concat(', ',  tblData[3][4], ', ',  tblData[3][5], ', ',  tblData[3][6], ', ',  tblData[3][7], ', ',  tblData[3][8], ', ',  tblData[3][9]);
                $('#no_item4').val(tblData[3][1]);
                $('#item4').val(Item4.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom4').val(tblData[3][11]);
                $('#bin4').val(tblData[3][2]);
                $('#kode4').val(tblData[3][14]);

                var Item5 = tblData[4][3].concat(', ',  tblData[4][4], ', ',  tblData[4][5], ', ',  tblData[4][6], ', ',  tblData[4][7], ', ',  tblData[4][8], ', ',  tblData[4][9]);
                $('#no_item5').val(tblData[4][1]);
                $('#item5').val(Item5.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom5').val(tblData[4][11]);
                $('#bin5').val(tblData[4][2]);
                $('#kode5').val(tblData[4][14]);

                var Item6 = tblData[5][3].concat(', ',  tblData[5][4], ', ',  tblData[5][5], ', ',  tblData[5][6], ', ',  tblData[5][7], ', ',  tblData[5][8], ', ',  tblData[5][9]);
                $('#no_item6').val(tblData[5][1]);
                $('#item6').val(Item6.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom6').val(tblData[5][11]);
                $('#bin6').val(tblData[5][2]);
                $('#kode6').val(tblData[5][14]);

                var Item7 = tblData[6][3].concat(', ',  tblData[6][4], ', ',  tblData[6][5], ', ',  tblData[6][6], ', ',  tblData[6][7], ', ',  tblData[6][8], ', ',  tblData[6][9]);
                $('#no_item7').val(tblData[6][1]);
                $('#item7').val(Item7.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom7').val(tblData[6][11]);
                $('#bin7').val(tblData[6][2]);
                $('#kode7').val(tblData[6][14]);

                var Item8 = tblData[7][3].concat(', ',  tblData[7][4], ', ',  tblData[7][5], ', ',  tblData[7][6], ', ',  tblData[7][7], ', ',  tblData[7][8], ', ',  tblData[7][9]);
                $('#no_item8').val(tblData[7][1]);
                $('#item8').val(Item8.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom8').val(tblData[7][11]);
                $('#bin8').val(tblData[7][2]);
                $('#kode8').val(tblData[7][14]);

                var Item9 = tblData[8][3].concat(', ',  tblData[8][4], ', ',  tblData[8][5], ', ',  tblData[8][6], ', ',  tblData[8][7], ', ',  tblData[8][8], ', ',  tblData[8][9]);
                $('#no_item9').val(tblData[8][1]);
                $('#item9').val(Item9.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom9').val(tblData[8][11]);
                $('#bin9').val(tblData[8][2]);
                $('#kode9').val(tblData[8][14]);

                var Item10 = tblData[9][3].concat(', ',  tblData[9][4], ', ',  tblData[9][5], ', ',  tblData[9][6], ', ',  tblData[9][7], ', ',  tblData[9][8], ', ',  tblData[9][9]);
                $('#no_item10').val(tblData[9][1]);
                $('#item10').val(Item10.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom10').val(tblData[9][11]);
                $('#bin10').val(tblData[9][2]);
                $('#kode10').val(tblData[9][14]);

                var Item11 = tblData[10][3].concat(', ',  tblData[10][4], ', ',  tblData[10][5], ', ',  tblData[10][6], ', ',  tblData[10][7], ', ',  tblData[10][8], ', ',  tblData[10][9]);
                $('#no_item11').val(tblData[10][1]);
                $('#item11').val(Item11.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom11').val(tblData[10][11]);
                $('#bin11').val(tblData[10][2]);
                $('#kode11').val(tblData[10][14]);

                var Item12 = tblData[11][3].concat(', ',  tblData[11][4], ', ',  tblData[11][5], ', ',  tblData[11][6], ', ',  tblData[11][7], ', ',  tblData[11][8], ', ',  tblData[11][9]);
                $('#no_item12').val(tblData[11][1]);
                $('#item12').val(Item12.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom12').val(tblData[11][11]);
                $('#bin12').val(tblData[11][2]);
                $('#kode12').val(tblData[11][14]);

                var Item13 = tblData[12][3].concat(', ',  tblData[12][4], ', ',  tblData[12][5], ', ',  tblData[12][6], ', ',  tblData[12][7], ', ',  tblData[12][8], ', ',  tblData[12][9]);
                $('#no_item13').val(tblData[12][1]);
                $('#item13').val(Item13.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom13').val(tblData[12][11]);
                $('#bin13').val(tblData[12][2]);
                $('#kode13').val(tblData[12][14]);

                var Item14 = tblData[13][3].concat(', ',  tblData[13][4], ', ',  tblData[13][5], ', ',  tblData[13][6], ', ',  tblData[13][7], ', ',  tblData[13][8], ', ',  tblData[13][9]);
                $('#no_item14').val(tblData[13][1]);
                $('#item14').val(Item14.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom14').val(tblData[13][11]);
                $('#bin14').val(tblData[13][2]);
                $('#kode14').val(tblData[13][14]);

                var Item15 = tblData[14][3].concat(', ',  tblData[14][4], ', ',  tblData[14][5], ', ',  tblData[14][6], ', ',  tblData[14][7], ', ',  tblData[14][8], ', ',  tblData[14][9]);
                $('#no_item15').val(tblData[14][1]);
                $('#item15').val(Item15.replace("&amp;", "&").replaceAll(" ,", ""));
                $('#uom15').val(tblData[14][11]);
                $('#bin15').val(tblData[14][2]);
                $('#kode15').val(tblData[14][14]);

                var tmpData;
                $.each(tblData, function(i, val) {
                    // tmpData = tblData[i];
                    // alert(tmpData);
                    // console.log(kode);
                    // console.log(desc);
                    // var kode = tblData[i][1];
                    // var desc = tblData[i][4];



                });
            });

        });

        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                event.preventDefault();
                return false;
                }
            });
        });
    </script>
</head>

<main>
    <div class="container">
        {{--        <h1>AFI CENTRAL STORE</h1>--}}
        <h1>
            <img src="http://localhost/dev/wbapps/public/logo-small.png">
        </h1>

        <h1>Central Store - Item List</h1>
        <div class="search-box">
            <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
            <form action="" class="search-form">
                <input type="text" placeholder="Ask Me......." id="search" autocomplete="off">
            </form>
            <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
            </svg>
            <div class="go-icon"><i class="fa fa-arrow-right"></i></div>
            <br>
            <input type="button" class="btn btn-primary btn-user btn-block" id="btnPrint" value="Print MR" data-toggle="modal" data-target="#modal1" />
        </div>

        <br>
        <div class="col-xl-3" align="center">
        </div>
        <div align="right">
            <?php foreach ($item_list as $items): ?>
            <?php endforeach; ?>
            Last Updates {{ $items->lastupdate }} <br>
            Last Item No. <b> {{ $Max}} </b> {{ link_to('refresh', 'Refresh', ['class' => 'btn btn-primary']) }}
        </div>
        <table class="table table-bordered dataTable display" id='empTable'>
            <thead>
            <tr>
                <th></th>
                <th>No.</th>
                <th>Default Bin</th>
                <th>Description</th>
                <th>Description 2</th>
                <th>Material</th>
                <th>Specification</th>
                <th>Feature</th>
                <th>Manufacturer</th>
                <th>Part NO</th>
                <th>Inventory</th>
                <th>UOM</th>
                <th style="display:none;">Search Description</th>
                <th>Status</th>
                <th hidden>Uom kode</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($item_list as $item): ?>
            @if ($item->blocked == "OPEN")
            <tr>
            @else
            <tr class="ignore">
            @endif
                <td></td>
                <td>{{ $item->no_item }}</td>
                <td>{{ $item->shelf_no }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->description_2 }}</td>
                <td>{{ $item->material }}</td>
                <td>{{ $item->spec }}</td>
{{--                <td>{{ htmlentities ($item->spec, ENT_QUOTES | ENT_IGNORE, "UTF-8") }}</td>--}}
{{--                <td>{{ (str_replace(array('"', '\u'), array('','&#x'), json_encode($item->spec))) }}</td>--}}
                <td>{{ $item->feature }}</td>
                <td>{{ $item->manufacturer }}</td>
                <td>{{ $item->part_no }}</td>
                <td>{{ number_format($item->inventory) }}</td>
                <td>{{ $item->uom }}</td>
                <td style="display:none;">{{ $item->search_description }}</td>
                @if ($item->blocked == "OPEN")
                <td align="center"> <span class="badge alert-success"> {{ $item->blocked }} </span> </td>
                @else
                <td align="center"> <span class="badge alert-danger"> {{ $item->blocked }} </span></td>
                @endif
                <td hidden>{{ $item->kode }}</td>
            </tr>
            <?php endforeach ?>
            </tbody>

        </table>

    </div>

    <!-- <script>
    $(document).ready(function() {
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script> -->

    <script>
        $(document).ready(function() {
            oTable = $('#empTable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
            $('#search').keyup(function() {
                oTable.search($(this).val()).draw();
            });

        });
    </script>

    </div>
    <br><br><br><br><br>
</main>

<!-- Modals Customer -->
{!! Form::open(['url' => 'ReportHatoban']) !!}
@csrf
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  id="modal1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center">
                <b> List Item </b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="md-form mb-2">
                                <label class="col-form-label">Material Req. No</label>
                                <input type="text" class="form-control" name="req_no">
                            </div> <br>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form mb-2">
                                <label class="col-form-label">Requested By</label>
                                <input type="text" class="form-control" name="user">
                            </div> <br>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form mb-2">
                                <label class="col-form-label">Approved By</label>
                                <input type="text" class="form-control" name="approve">
                            </div> <br>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form mb-2">
                                <label class="col-form-label">Date</label>
                                <input type="text" class="form-control" name="tgl" value="{{ date('d M Y')}}" disabled> 
                            </div> <br>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form mb-2">
                                <label class="col-form-label">Position (Requester) </label>
                                <input type="text" class="form-control" name="position_user">
                            </div> <br>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form mb-2">
                                <label class="col-form-label">Position (Approver)</label>
                                <input type="text" class="form-control" name="position_approve">
                            </div> <br>
                        </div>
                        
                        
                        
                        <div class="col-md-4">
                            <div class="md-form mb-2">
                                <label class="col-form-label">Purpose</label>
                                <textarea name="purpose" cols="10" rows="1" maxlength="50" class="form-control"></textarea>
                                {{--                                <input type="textarea" class="form-control" name="purpose">--}}
                            </div> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 row gy-5">
                            <div class="md-form mb-2">
                                <center><b>Department</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <select name="dept1" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept2" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept3" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept4" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept5" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept6" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept7" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept8" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept9" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept10" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <select name="dept11" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept12" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept13" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept14" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dept15" class="form-control text1">
                                    <option value="">Department</option>
                                    @foreach ($Dept as $Depts)
                                        <option value="{{ $Depts->dept_code }}">{{ $Depts->dept_code }} - {{ $Depts->dept_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br> --}}
                        </div>
                        <div class="col-md-1">
                            <div class="md-form mb-2">
                                <center><b>Job No.</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job1" name="job1" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job2" name="job2" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job3" name="job3" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job4" name="job4" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job5" name="job5" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job6" name="job6" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job7" name="job7" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job8" name="job8" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job9" name="job9" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job10" name="job10" maxlength="10">
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job11" name="job11" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job12" name="job12" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job13" name="job13" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job14" name="job14" maxlength="10">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" placeholder="Job No." id="job15" name="job15" maxlength="10">
                            </div> <br> --}}
                        </div>
                        <div class="col-md-2 row gy-5">
                            <div class="md-form mb-2">
                                <center><b>Required Date</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal1" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal2" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal3" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal4" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal5" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal6" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal7" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal8" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal9" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal10" placeholder="Required Date">
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal11" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal12" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal13" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal14" placeholder="Required Date">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="date" class="form-control" name="tanggal15" placeholder="Required Date">
                            </div> <br> --}}
                        </div>
                        <div class="col-md-2">
                            <div class="md-form mb-2">
                                <center><b>Dimension</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <select name="dimension1" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension2" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension3" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension4" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension5" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension6" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension7" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension8" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension9" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension10" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <select name="dimension11" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension12" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension13" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension14" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br>
                            <div class="md-form mb-2">
                                <select name="dimension15" class="form-control text1">
                                    <option value="">Dimension</option>
                                    @foreach ($Dimension as $dimension)
                                        <option value="{{ $dimension->code }}">{{ $dimension->code }} - {{ $dimension->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div> <br> --}}
                        </div>
                        <div class="col-md-1 row gy-5">
                            <div class="md-form mb-2">
                                <center><b>Item No.</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item1" name="no_item1" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item2" name="no_item2" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item3" name="no_item3" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item4" name="no_item4" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item5" name="no_item5" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item6" name="no_item6" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item7" name="no_item7" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item8" name="no_item8" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item9" name="no_item9" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item10" name="no_item10" readonly>
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item11" name="no_item11" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item12" name="no_item12" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item13" name="no_item13" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item14" name="no_item14" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="no_item15" name="no_item15" readonly>
                            </div> <br> --}}
                        </div>
                        <div class="col-md-2">
                            <div class="md-form mb-2">
                                <center><b>Description</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item1" name="item1" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item2" name="item2" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item3" name="item3" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item4" name="item4" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item5" name="item5" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item6" name="item6" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item7" name="item7" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item8" name="item8" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item9" name="item9" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item10" name="item10" readonly>
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item11" name="item11" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item12" name="item12" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item13" name="item13" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item14" name="item14" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="item15" name="item15" readonly>
                            </div> <br> --}}
                        </div>
                        <div class="col-md-1 row gy-5">
                            <div class="md-form mb-2">
                                <center><b>Qty</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty1" name="qty1">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty2" name="qty2">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty3" name="qty3">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty4" name="qty4">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty5" name="qty5">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty6" name="qty6">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty7" name="qty7">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty8" name="qty8">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty9" name="qty9">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty10" name="qty10">
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty11" name="qty11">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty12" name="qty12">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty13" name="qty13">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty14" name="qty14">
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" placeholder="Qty" class="form-control text1" id="qty15" name="qty15">
                            </div> <br> --}}
                        </div>
                        <div class="col-md-1">
                            <div class="md-form mb-2">
                                <center><b>UoM</b></center>
                            </div><br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom1" name="uom1" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom2" name="uom2" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom3" name="uom3" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom4" name="uom4" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom5" name="uom5" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom6" name="uom6" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom7" name="uom7" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom8" name="uom8" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom9" name="uom9" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom10" name="uom10" readonly>
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom11" name="uom11" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom12" name="uom12" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom13" name="uom13" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom14" name="uom14" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="uom15" name="uom15" readonly>
                            </div> <br> --}}
                        </div>

                        <div class="col-md-1" hidden>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin1" name="bin1" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin2" name="bin2" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin3" name="bin3" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin4" name="bin4" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin5" name="bin5" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin6" name="bin6" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin7" name="bin7" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin8" name="bin8" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin9" name="bin9" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin10" name="bin10" readonly>
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin11" name="bin11" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin12" name="bin12" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin13" name="bin13" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin14" name="bin14" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="bin15" name="bin15" readonly>
                            </div> <br> --}}
                        </div>

                        <div class="col-md-1" hidden>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode1" name="kode1" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode2" name="kode2" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode3" name="kode3" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode4" name="kode4" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode5" name="kode5" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode6" name="kode6" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode7" name="kode7" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode8" name="kode8" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode9" name="kode9" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode10" name="kode10" readonly>
                            </div> <br>
                            {{-- <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode11" name="kode11" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode12" name="kode12" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode13" name="kode13" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode14" name="kode14" readonly>
                            </div> <br>
                            <div class="md-form mb-2">
                                <input type="text" class="form-control text1" id="kode15" name="kode15" readonly>
                            </div> <br> --}}
                        </div>

                    </div>

                    <div class="row" align="center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-file-pdf"></i> Preview
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}


</html>