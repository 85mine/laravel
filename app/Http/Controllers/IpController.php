<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Ip;
use App\Helper\Common;
use App\Validators\IpValidator;

class IpController extends BaseController
{
    public function index(Request $request)
    {
        $messages = Common::getMessage($request);
        return view('backend.modules.ips.index', compact('messages'));
    }

    public function getAjaxData()
    {
        $data = Ip::all();
        foreach ($data as &$_data) {
            $id = $_data['id'];
            $edit_url = route('ips.getEdit', [$id]);

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

    public function getEdit(Request $request, $id)
    {
        $ips = Ip::find($id);
        if (!$ips) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.common.id_not_found')]);
            return redirect(route('ips.index'));
        }
        $route = 'ips.postEdit';
        $breadcrumb = trans('labels.label.ips.breadcrumb.edit');
        $messages = Common::getMessage($request);

        return view('backend.modules.ips.add_edit', compact('ips', 'route', 'breadcrumb', 'messages'));
    }

    public function getAdd(Request $request)
    {
        $ips = new Ip();
        $route = 'ips.postAdd';
        $breadcrumb = trans('labels.label.ips.breadcrumb.add');
        $messages = Common::getMessage($request);

        return view('backend.modules.ips.add_edit', compact('ips', 'route', 'breadcrumb', 'messages'));
    }

    public function postEdit()
    {
        
    }

    public function postAdd(Request $request)
    {
        try {
            $ipValidator = new IpValidator();
            $validator = $this->checkValidator($request->all(), $ipValidator->validateIps());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('ips.getAdd'))->withInput();
            }

            $ip = new Ip();
            $ip->ip_address = $request->ip_address;
            $ip->description = $request->description;
            $ip->save();

            return redirect()->intended(route('ips.index'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('ips.getAdd'))->withInput();
        }
    }
}
