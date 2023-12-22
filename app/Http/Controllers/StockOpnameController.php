<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\User;
use App\Transactions;
use App\Mapping;


use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArray2DValue;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StockOpnameController extends Controller
{
    public function index()
    {
        $level = Auth::user()->level;
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $Plant = Auth::user()->plant;

        $Nama = $level . ' - ' . $username;


        if ($level == 'Counter') {
            
            $TS = DB::select(DB::raw("
                    select ifnull(GROUP_CONCAT(w.total), 0) as total, ifnull(GROUP_CONCAT(w.done),0) as done, w.batch_so as batch_so from
                    (select count(*) as total,null as done, a.batch_so from (
                    SELECT
                    transactions.*, mapping.batch_so
                    from transactions
                    left join mapping
                    on mapping.bin_no = transactions.bin_no
                    where transactions.plant = '" . $Plant . "'
                    and mapping.username = '" . $username . "'
                    and transactions.bin_no in 
                    (select bin_no from mapping where username = '" . $username . "')
                    )a
                    group by a.batch_so
                    union
                    select null as total, count(*) as done, b.batch_so from (
                    SELECT
                    transactions.*, mapping.batch_so
                    from transactions
                    left join mapping
                    on mapping.bin_no = transactions.bin_no
                    where transactions.plant = '" . $Plant . "'
                    and mapping.username = '" . $username . "'
                    and transactions.date_count1 is not null
                    and transactions.bin_no in 
                    (select bin_no from mapping where username = '" . $username . "')
                    )b
                    group by b.batch_so)w
                    group by w.batch_so
            "));

            // dd($TS);

            // $Item = $TS->groupBy('transactions.')->count('transactions.id');
            // $Batch = $Mapping->groupBy('batch_so')->get();

        } else {

            $TS = DB::select(DB::raw("
                    select ifnull(GROUP_CONCAT(w.total), 0) as total, ifnull(GROUP_CONCAT(w.done),0) as done, w.batch_so as batch_so from
                    (
                    select count(*) as total,null as done, a.batch_so from (
                    SELECT
                    transactions.*, mapping.batch_so
                    from transactions
                    left join mapping
                    on mapping.bin_no = transactions.bin_no
                    where transactions.plant = '" . $Plant . "'
                    and mapping.username in 
                    (select username from users where plant = '" . $Plant . "')
                    and date_count1 is not null
                    and qty_nav <> qty_count1
                    )a
                    group by a.batch_so
                    union
                    select null as total, count(*) as done, b.batch_so from (
                    SELECT
                    transactions.*, mapping.batch_so
                    from transactions
                    left join mapping
                    on mapping.bin_no = transactions.bin_no
                    where transactions.plant = '" . $Plant . "'
                    and mapping.username in 
                    (select username from users where plant = '" . $Plant . "')
                    and date_count1 is not null
                    and qty_nav <> qty_count1
                    and date_count2 is not null
                    )b
                    group by b.batch_so)w
                    where w.batch_so != ''
                    group by w.batch_so
                "));
        }


        return view('stockopname.index', compact('Nama', 'Plant', 'TS', 'level'));
    }

    public function cek()
    {
        $level = Auth::user()->level;
        $username = Auth::user()->username;
        $Plant = Auth::user()->plant;

        if ($level == 'Counter') {
            $TS = DB::select(DB::raw("
                    select ifnull(GROUP_CONCAT(w.total), 0) as total, ifnull(GROUP_CONCAT(w.done),0) as done, w.batch_so as batch_so from
                    (select count(*) as total,null as done, a.batch_so from (
                    SELECT
                    transactions.*, mapping.batch_so
                    from transactions
                    left join mapping
                    on mapping.bin_no = transactions.bin_no
                    where transactions.plant = '" . $Plant . "'
                    and mapping.username = '" . $username . "'
                    and transactions.bin_no in 
                    (select bin_no from mapping where username = '" . $username . "')
                    )a
                    group by a.batch_so
                    union
                    select null as total, count(*) as done, b.batch_so from (
                    SELECT
                    transactions.*, mapping.batch_so
                    from transactions
                    left join mapping
                    on mapping.bin_no = transactions.bin_no
                    where transactions.plant = '" . $Plant . "'
                    and mapping.username = '" . $username . "'
                    and transactions.date_count1 is not null
                    and transactions.bin_no in 
                    (select bin_no from mapping where username = '" . $username . "')
                    )b
                    group by b.batch_so)w
                    group by w.batch_so
            "));

            $data = [];
            $data['TS'] = $TS;
            return response()->json(['data' => $data]);
        } else {
        }
    }

    public function mulai()
    {
        $username = Auth::user()->username;
        $plant = Auth::user()->plant;
        $Bin = Mapping::where('username', $username)->get()->pluck('bin_no');

        $Transactions = Transactions::leftJoin('mapping', function ($leftJoin) {
            $leftJoin->on('mapping.bin_no', '=', 'transactions.bin_no')
                ->where('mapping.plant', '=', 'transactions.plant');
        })
            ->select('transactions.*')
            ->whereNull('date_count1')
            ->where('transactions.plant', $plant)
            ->whereIn('transactions.bin_no', $Bin)
            ->orderBy('mapping.no_urut', 'asc')
            ->first();
        $data = [];
        $data['transactions'] = $Transactions;
        return response()->json(['data' => $data]);
     }

    public function verifikasiold()
    {
        $plant = Auth::user()->plant;
        $Transactions = Transactions::where('plant', $plant)->whereRaw('qty_nav != qty_count1')
            ->whereNotNull('date_count1')
            ->whereNull('date_count2')
            ->first();
        $data = [];
        $data['transactions'] = $Transactions;
        return response()->json(['data' => $data]);
    }

    public function verifikasi()
    {
        $plant = Auth::user()->plant;
        if ($plant == 'HFMG') {
            $username = Auth::user()->username;
            $Bin = Mapping::where('username', $username)->get()->pluck('bin_no');
            $Transactions = Transactions::leftjoin('mapping', 'mapping.bin_no', '=', 'transactions.bin_no')
                ->select('transactions.*')
                ->whereNotNull('date_count1')
                ->whereNull('date_count2')
                ->where('transactions.plant', $plant)
                ->whereIn('transactions.bin_no', $Bin)
                ->whereRaw('transactions.qty_nav != transactions.qty_count1')
                ->orderBy('mapping.no_urut', 'asc')
                ->first();
        } else {
            $Transactions = Transactions::where('plant', $plant)->whereRaw('qty_nav != qty_count1')
                ->whereNotNull('date_count1')
                ->whereNull('date_count2')
                ->first();
        }
        $data = [];
        $data['transactions'] = $Transactions;
        return response()->json(['data' => $data]);
    }

    public function simpan(Request $request)
    {
        // cek level / type
        $level = Auth::user()->level;
        if ($level == 'Counter') {
            $updatedata = Transactions::findOrFail($request->id);
            $updatedata->update([
                'qty_count1' => $request['qty_count1'],
                'date_count1' => date('Y-m-d H:i:s'),
                'username1' => Auth::user()->username
            ]);
        } elseif ($level == 'Verifier') {
            $updatedata = Transactions::findOrFail($request->id);
            $updatedata->update([
                'qty_count2' => $request['qty_count1'],
                'date_count2' => date('Y-m-d H:i:s'),
                'username2' => Auth::user()->username
            ]);
        }
    }

    public function reportSO(Request $request)
    {
        $level = Auth::user()->level;
        $pla = $request->plant;
        if ($level == 'Verifier') {
            $Report = DB::select(DB::raw("
                        SELECT
                        transactions.*, mapping.batch_so
                        from transactions
                        left join mapping
                        on mapping.bin_no = transactions.bin_no
                        where transactions.plant = '" . $pla . "'
                        and mapping.username in 
                        (select username from users where plant = '" . $pla . "')
                        GROUP BY transactions.id
                    "));

            foreach ($Report as $report) :
                $BatchSO[]      = $report->batch_so;
                $Plant[]          = $report->plant;
                $UserName1[]    = $report->username1;
                $BinNo[]        = $report->bin_no;
                $ItemNo[]       = $report->item_no;
                $Variant[]      = $report->variant;
                $Description[]  = $report->description;
                $Value[]        = $report->value;
                $QtyNav[]       = $report->qty_nav;
                $QtyCount1[]    = $report->qty_count1;
                $DateCount1[]   = $report->date_count1;
                $UserName2[]    = $report->username2;
                $QtyCount2[]    = $report->qty_count2;
                $DateCount2[]   = $report->date_count2;
            endforeach;

            $params = [
                '[batch_so]'    => $BatchSO,
                '[plant]'       => $Plant,
                '[username1]'    => $UserName1,
                '[bin_no]'      => $BinNo,
                '[item_no]'     => $ItemNo,
                '[variant]'     => $Variant,
                '[description]' => $Description,
                '[value]'       => $Value,
                '[qty_nav]'     => $QtyNav,
                '[qty_count1]'  => $QtyCount1,
                '[date_count1]' => $DateCount1,
                '[username2]'  => $UserName2,
                '[qty_count2]'  => $QtyCount2,
                '[date_count2]' => $DateCount2
            ];

            $templateFile = './TemplateSO.xlsx';
            $fileName = './Stock Opname MRO.xlsx';
            $spreadsheet = IOFactory::load($templateFile);
            $templateVarsArr = $spreadsheet->getActiveSheet()->toArray();
            $callbacks = [];
            $events = [];

            $sheet1 = $spreadsheet->getSheet(0);
            PhpExcelTemplator::renderWorksheet($sheet1, $templateVarsArr, $params, $callbacks, $events);
            PhpExcelTemplator::outputSpreadsheetToFile($spreadsheet, $fileName);
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
