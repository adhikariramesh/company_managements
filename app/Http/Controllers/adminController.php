<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class adminController extends Controller
{
   public function company(){
    return view("backend.companys");
   }

   public function addCompany(Request $request){


            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'web' => 'required',
                'image' => 'required'
            ]);

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move('public/images', $fileName);

            $company = new Company;
            $company->name = $request['name'];
            $company->email = $request['email'];
            $company->website = $request['web'];
            $company->logo = $fileName;
            $company->save();
            return redirect()->back()->with('message','Added successfully');
   }

   public function showCompany(){
            $company = Company::all();
            return view('backend.showCompany',compact('company'));
   }


   public function deleteCompany($id){
        Company::find($id)->delete();
        return redirect()->back()->with('message',"deleted successfully");
   }

   public function editCompany($id){
         $data =Company::find($id);
         return view('backend.updateCompany', compact('data'));
   }

   public function updateCompany(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'web' => 'required',
        ]);




        $data =Company::find($id);
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->website = $request['web'];

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move('public/images', $fileName);

            $data->logo = $fileName;
        }
        $data->save();
        return redirect('/show_details_company')->with('message',"update successfully");

   }
}
