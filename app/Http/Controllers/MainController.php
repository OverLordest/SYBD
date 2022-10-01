<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function main() {/*функция возврата на главную*/
        return view('main');
    }

    public function ShowUnitedTable(){/*функция получения данных из 2х таблц*/
        $query = DB::select("SELECT
        torg_date, F_usd.kod, REPLACE(quotation, ',', '.') as quotation, num_contr, exec_data
        FROM F_usd
        INNER JOIN dataisp ON dataisp.kod = F_usd.kod");
        return json_encode($query);
    }
}
