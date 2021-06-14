<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function get()
    {
        $department = Department::get();

        return response()->json($department);
    }
}
