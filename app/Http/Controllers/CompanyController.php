<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Validators\CompanyValidator;
use App\Models\Company;
use App\Helper\Common;
use Yajra\Datatables\Facades\Datatables;

class CompanyController extends BaseController
{
    public function index(Request $request)
    {
        $messages = Common::getMessage($request);
        return view('backend.modules.company.index', compact('messages'));
    }

    public function getAjaxData()
    {
        $data = Company::all();
        foreach ($data as &$_data) {
            $id = $_data['id'];
            $edit_url = route('company.getEdit', [$id]);

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
        $company = Company::find($id);
        if (!$company) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.common.id_not_found')]);
            return redirect(route('company.index'))->withInput();
        }
        $route = 'company.postEdit';
        $breadcrumb = trans('labels.label.company.breadcrumb.edit');
        $messages = Common::getMessage($request);

        return view('backend.modules.company.add_edit', compact('company', 'route', 'breadcrumb', 'messages'));
    }

    public function getAdd(Request $request)
    {
        $company = new Company();
        $route = 'company.postAdd';
        $breadcrumb = trans('labels.label.company.breadcrumb.add');
        $messages = Common::getMessage($request);

        return view('backend.modules.company.add_edit', compact('company', 'route', 'breadcrumb', 'messages'));
    }

    public function postEdit(Request $request)
    {
        try {
            $companyValidator = new CompanyValidator();
            $validator = $this->checkValidator($request->all(), $companyValidator->validateCompany());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('company.getEdit', [$request->id]))->withInput();
            }

            $company = Company::find($request->id);
            $company->fill($request->input())->save();

            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.company.edit_success')]);
            return redirect()->intended(route('company.index'))->withInput();
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.company.edit_fail')]);
            return redirect(route('company.getEdit', [$request->id]))->withInput();
        }
    }

    public function postAdd(Request $request)
    {
        try {
            $companyValidator = new CompanyValidator();
            $validator = $this->checkValidator($request->all(), $companyValidator->validateCompany());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('company.getAdd', [$request->id]))->withInput();
            }

            $company = new Company();
            $company->fill($request->input())->save();

            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.company.create_success')]);
            return redirect()->intended(route('company.index'))->withInput();
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.company.create_fail')]);
            return redirect(route('company.getAdd', [$request->id]))->withInput();
        }
    }

    public function delete(Request $request) {
        try {
            $id = $request->id;
            $company = explode(",", $id);
            Company::whereIn('id', $company)->delete();
            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.company.delete_success')]);
            return redirect()->intended(route('company.index'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.company.delete_fail')]);
            return redirect(route('company.index'));
        }
    }
}
