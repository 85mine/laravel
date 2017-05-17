<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Ip;
use App\Models\Config;
use App\Helper\Common;
use App\Validators\IpValidator;

class IpController extends BaseController
{
    public function index(Request $request)
    {
        $messages = Common::getMessage($request);
        $config = Config::first();
        $ips_enable = $config ? $config->ips_enable : 0;
        return view('backend.modules.ips.index', compact('messages', 'ips_enable'));
    }

    public function getAjaxData()
    {
        $data = Ip::all();
//        foreach ($data as &$_data) {
//            $id = $_data['id'];
//            $edit_url = route('ips.getEdit', [$id]);
//
//            // Checkbox
//            $_data['checkbox'] = '<div class="checkbox checkbox-success">
//                                        <input id="checkbox' . $id . '" type="checkbox" class="check" value="' . $id . '">
//                                        <label for="checkbox' . $id . '"></label>
//                                  </div>';
//            $_data['buttons'] = '<div class="btn-group">';
//            $_data['buttons'] .= '<a href="' . $edit_url . '" class="btn btn-warning edit" title="' . trans('labels.label.common.btnEdit') . '"><i class="fa fa-edit"></i></a>';
//            $_data['buttons'] .= '<a href="javascript:;" class="btn btn-danger delete" title="' . trans('labels.label.common.btnDelete') . '" data-delete="' . $id . '"><i class="fa fa-remove"></i></a>';
//            $_data['buttons'] .= '</div>';
//        }
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

    public function postEdit(Request $request)
    {
        try {
            $ipValidator = new IpValidator();
            $validator = $this->checkValidator($request->all(), $ipValidator->validateIps($request->id, true));

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('ips.getEdit', [$request->id]))->withInput();
            }

            $ip = Ip::find($request->id);
            $ip->fill($request->input())->save();
            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.ips.edit_success')]);
            return redirect(route('ips.index'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.ips.edit_fail')]);
            return redirect(route('ips.getEdit', [$request->id]))->withInput();
        }
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
            $ip->fill($request->input())->save();
            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.ips.add_success')]);
            return redirect()->intended(route('ips.index'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.ips.add_fail')]);
            return redirect(route('ips.getAdd'))->withInput();
        }
    }

    public function postDelete(Request $request)
    {
        try {
            $id = $request->s_ids;
            $ids = explode(",", $id);
            Ip::whereIn('id', $ids)->delete();
            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.ips.delete_success')]);
            return redirect()->intended(route('ips.index'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.ips.delete_fail')]);
            return redirect(route('ips.index'));
        }

    }

    public function postSetIpsConnection(Request $request)
    {
        try {
            $ips_enable = $request->ips_enable;
            $config = Config::firstOrNew([]);
            $config->ips_enable = ($ips_enable == 'true') ? 1 : 0;
            $config->save();
            echo json_encode(['status' => 'success']);
        } catch (\Exception $e) {
            echo json_encode(['status' => 'fail']);
        }
    }
}
