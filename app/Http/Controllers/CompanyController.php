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
        $companies = Company::paginate(10);
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
            dd($validator);

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('company.addNew'))->withInput();
            }

            return redirect()->intended(route('company.getAllCompanies'));

        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('company.addNew'))->withInput();
        }
    }
}
