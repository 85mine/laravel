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
        $messages = "";
        $companies = Company::paginate(2);
        return view('backend.modules.company.company', compact('companies'))->with([
            'messages' => $messages
        ]);
    }

    public function getAddNewCompany()
    {
        $messages = "";
        $company = new Company();
        return view('backend.modules.company.add_new', ['company' => $company, 'option' => 'add'])->with([
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

    public function getEditCompany($id)
    {
        $company = Company::find($id);
        $messages = "";
        $option = 'edit';
        return view('backend.modules.company.add_new', compact('company', 'option'))->with([
            'messages' => $messages
        ]);
    }

    public function postEditCompany(Request $request, $id) {
        try {
            var_dump($id);
            $companyValidator = new CompanyValidator();
            $validator = $this->checkValidator($request->all(), $companyValidator->validateCompany());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('company.addNew'))->withInput();
            }

            $company = Company::find($id);
            var_dump($company);die;
            $company->company_name = $request->company_name;
            $company->company_address = $request->company_address;
            $company->company_mobile = $request->company_mobile;
            $company->company_email = $request->company_email;
            $company->company_website = $request->company_website;
            $company->representative_name = $request->representative_name;
            $company->representative_mobile = $request->representative_mobile;
            $company->update();

            return redirect()->intended(route('company.getAllCompanies'));

        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('company.addNew'))->withInput();
        }
    }

    public function deleteCompany(Request $request, $id)
    {
        try {
            $isDeleted = Company::destroy($id);
            var_dump($isDeleted);
            if ($isDeleted > 0) {
                Common::setMessage($request, MESSAGE_STATUS_SUCCESS, ["Deleted the company successfully!"]);
                return redirect()->route('company.getAllCompanies');
            }
            Common::setMessage($request, MESSAGE_STATUS_ERROR, ["Failed delete the company!"]);
            return redirect()->route('company.getAllCompanies');
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('company.getAllCompanies'));
        }
//        //use Ajax
//        if ($request->ajax()) {
//            try {
//                $id = $request->get('id');
//                $isDeleted = Company::destroy($id);
//                if ($isDeleted > 0) {
//                    return response(['msg' => 'Company deleted', 'status' => 'success']);
//                }
//                return response(['msg' => 'Failed deleting the company', 'status' => 'failed']);
//            } catch (\Exception $e) {
//                Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
//                return redirect(route('company.getAllCompanies'))->withInput();
//            }
//        }
    }
}
