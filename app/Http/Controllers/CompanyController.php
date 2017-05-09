<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Validators\CompanyValidator;
use App\Models\Company;
use App\Helper\Common;

class CompanyController extends BaseController
{
    public function getAllCompanies()
    {
        $companies = Company::paginate(2);
        return view('backend.modules.company.company', compact('companies'));
    }

    public function getAddNewCompany(Request $request)
    {
        $messages = Common::getMessage($request);
        return view('backend.modules.company.add_new')->with([
            'messages' => $messages
        ]);
    }

    public function postAddNewCompany(Request $request)
    {
        try {
            $companyValidator = new CompanyValidator();
            $validator = $this->checkValidator($request->all(), $companyValidator->validateCompany());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('company.addNew'))->withInput();
            }

            $company = new Company();
            $company->company_name = $request->company_name;
            $company->company_address = $request->company_address;
            $company->company_mobile = $request->company_mobile;
            $company->company_email = $request->company_email;
            $company->company_website = $request->company_website;
            $company->representative_name = $request->representative_name;
            $company->representative_mobile = $request->representative_mobile;
            $company->save();

            return redirect()->intended(route('company.getAllCompanies'));

        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('company.addNew'))->withInput();
        }
    }

    public function getCompany($id)
    {
        $company = Company::find($id);
        return view('backend.modules.company.detail', compact('company'));
    }

    public function editCompany(Request $request, $id)
    {
        $company = Company::find($id);
        $messages = Common::getMessage($request);
        return view('backend.modules.company.add_new', compact('company'))->with([
            'messages' => $messages
        ]);
    }

    public function deleteCompany(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = $request->get('id');
                $isDeleted = Company::destroy($id);
                if ($isDeleted) {
                    return response(['msg' => 'Company deleted', 'status' => 'success']);
                }
                return response(['msg' => 'Failed deleting the company', 'status' => 'failed']);
            } catch (\Exception $e) {
                die;
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
                return redirect(route('company.getAllCompanies'))->withInput();
            }
        }
    }
}
