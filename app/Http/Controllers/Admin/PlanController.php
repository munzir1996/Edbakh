<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Week;
use Storage;
use File;
class PlanController extends Controller
{

    public function index()
    {

        $plans = Plan::where('trash', 0)->get();

        $active = 'plans';

        $sub_active = 'plans_list';

        return view('admin.plans.index', compact(['plans', 'active', 'sub_active']));
    }

    public function trash()
    {

        $plans = Plan::where('trash', 1)->get();

        $active = 'plans';

        $sub_active = 'trash';

        return view('admin.plans.trash', compact(['plans', 'active', 'sub_active']));

    }

    public function send_to_trash($id){

        $plan = Plan::find($id);

        $plan->trash = 1;
        $plan->save();

        return redirect(route('plans.index'));

    }

    public function remove_from_trash($id){

        $plan = Plan::find($id);

        $plan->trash = 0;
        $plan->save();

        return redirect(route('plans.index'));

    }

    public function create()
    {
        $active = 'plans';

        $sub_active = 'create_plan';

        return view('admin.plans.create.main', compact(['active', 'sub_active']));

    }


    public function store(Request $request)
    {

        //validation
        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'serve' => 'required|integer',
            'price_per_serve' => 'required|numeric',
            'week1' => 'required|integer',
            'week1_shipping' => 'required|numeric',
            'week2' => 'required|integer',
            'week2_shipping' => 'required|numeric',
            'picture' => 'required|image'
        ]);

        //insert
        $per_week[] = $request->week1;
        $per_week[] = $request->week2;
        $shipping_cost[] = $request->week1_shipping;
        $shipping_cost[] = $request->week2_shipping;
    
        if(isset($request->week3) && $request->week3 != '' && isset($request->week3_shipping) && $request->week3_shipping != ''){
            
            $this->validate($request, [
                'week3' => 'numeric',
                'week3_shipping' => 'numeric',
                ]);
                
            $per_week[] = $request->week3;
            $shipping_cost[] = $request->week3_shipping;
        }
        
        $plan = new Plan;

        $plan->title_en  = $request->title_en;
        $plan->title_ar  = $request->title_ar;
        $plan->description_en = $request->description_en;
        $plan->description_ar = $request->description_ar;
        $plan->serve = $request->serve;
        $plan->price_per_serve = $request->price_per_serve;
        $plan->active = $request->active;

        //Save our image
        if($request->hasFile('picture')){
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/' . $filename);
            Image::make($image)->resize(460.5, 225)->save($location);
            
            $plan->image = $filename;
        }
        if ($plan->save()) {
            
            foreach ($per_week as $index => $weeks) {
                
                $week = new Week;
                $week->week = $weeks;
                $week->shipping_cost = $shipping_cost[$index];
                $week->plan_id = $plan->id;
                $week->save();
    
            }
        }

        //redirect
        return redirect(route('plans.index'));

    }


    public function show(Plan $plan)
    {
        //
    }


    public function edit($id)
    {

        $plan = Plan::find($id);
        $week = Week::where('plan_id', $id)->get();

        $active = 'plans';

        $sub_active = 'plans_list';

        return view('admin.plans.edit.main', compact(['plan', 'week', 'active' , 'sub_active', 'per_week']));

    }


    public function update(Request $request, $id)
    {

        $plan = Plan::find($id);

        //validation
        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'serve' => 'required|integer',
            'price_per_serve' => 'required|numeric',
            'week1' => 'required|integer',
            'week1_shipping' => 'required|numeric',
            'week2' => 'required|integer',
            'week2_shipping' => 'required|numeric',
            'picture' => 'image',
        ]);

        
        //insert
        $per_week[] = $request->week1;
        $per_week[] = $request->week2;
        $shipping_cost[] = $request->week1_shipping;
        $shipping_cost[] = $request->week2_shipping;

        if(isset($request->week3) && $request->week3 != '' && isset($request->week3_shipping) && $request->week3_shipping != ''){
            
            $this->validate($request, [
                'week3' => 'numeric',
                'week3_shipping' => 'numeric',
            ]);
            
            $per_week[] = $request->week3;
            $shipping_cost[] = $request->week3_shipping;
        }
        
        $plan->title_en  = $request->title_en;
        $plan->title_ar  = $request->title_ar;
        $plan->description_en = $request->description_en;
        $plan->description_ar = $request->description_ar;
        $plan->serve = $request->serve;
        $plan->price_per_serve = $request->price_per_serve;
        $plan->active = $request->active;
        if($request->hasFile('picture')){
            
            //Add the new photo
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/' . $filename);
            Image::make($image)->resize(460.5, 225)->save($location);
            $oldFilename = $plan->image;
            //Update the database
            $plan->image = $filename;
            //Delete the image
            File::delete('public/uploads/'.$oldFilename);
        }
        
        if ($plan->save()) {
            //Delete weeks table
            DB::table('weeks')->where('plan_id', $id)->delete();

            foreach ($per_week as $index => $weeks) {
                
                $week = new Week;
                $week->week = $weeks;
                $week->shipping_cost = $shipping_cost[$index];
                $week->plan_id = $plan->id;
                $week->save();
    
            }
        }
        //redirect
        return redirect(route('plans.index'));
        
    }
    

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        
        File::delete('public/uploads/'.$plan->image);
        // Shows .toaster message
        if($plan->delete()){

            session()->flash('message', 'The plan has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('plans.index');
        }

        session()->flash('message', 'Error the plan was not deleted');
        //Redirect to another page
	    return redirect()->route('plans.index');
    }

    // public function client_pricing_page(){
    // }
}