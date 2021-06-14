<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeCollection;
use App\Models\Employe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function get(Request $request, $department = null)
    {
        $count = $request->input('count') ?? 10;
        if (is_null($department)) {
            $employee = Employe::with('department')->paginate($count);
        } else {
            $employee = Employe::with('department')->where('department_id', $department)->paginate($count);
        }

        return new EmployeCollection($employee);
    }
}
