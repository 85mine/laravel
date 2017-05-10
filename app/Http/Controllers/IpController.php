<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Ip;

class IpController extends Controller
{
    public function index()
    {
        return view('backend.modules.ips.index');
    }

    public function getAjaxData()
    {
        $data = Ip::all();
        foreach ($data as &$_data) {
            $id = $_data['id'];
            $edit_url = route('ips.edit', [$id]);

            // Checkbox
            $_data['checkbox'] = '<div class="checkbox checkbox-success">
                                        <input id="checkbox' . $id . '" type="checkbox" class="check" value="' . $id . '">
                                        <label for="checkbox' . $id . '"></label>
                                  </div>';
            $_data['buttons'] = '<div class="btn-group">';
            $_data['buttons'] .= '<a href="' . $edit_url . '" class="btn btn-warning edit" title="' . trans('labels.label.common.btnEdit') . '"><i class="fa fa-edit"></i></a>';
            $_data['buttons'] .= '<a href="javascript:;" class="btn btn-danger delete" title="' . trans('labels.label.common.btnDelete') . '" data-delete="' . $id . '"><i class="fa fa-remove"></i></a>';
            $_data['buttons'] .= '</div>';
        }
        return Datatables::of($data)->make(true);
    }

    public function getEdit($id)
    {

    }
}
