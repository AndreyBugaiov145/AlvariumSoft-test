<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeCollection;
use App\Models\Employe;
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

    public function AddData(Request $request)
    {
        $xml = $request->text;
        $dataArray = simplexml_load_string($xml);

        foreach ($dataArray as $data) {
            $data->birth_at = strtotime($data->birth_at);
            try {
                Employe::create((array)$data);
            } catch (\Exception $e) {
                return response()->json($e);
            }
        }

        return response()->json('good');
    }
}
