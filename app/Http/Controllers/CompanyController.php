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
            $id = $request->s_ids;
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
