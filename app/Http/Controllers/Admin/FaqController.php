<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $faqs = Faq::all();

        $active = 'faq';

        $sub_active = 'faq_list';
        
        return view('admin.faqs.index', compact(['faqs', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'faq';

        $sub_active = 'create_faq';

        return view('admin.faqs.create.main', compact(['active', 'sub_active']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
        ]);

        $faq = new Faq;

        $faq->title_en  = $request->title_en;
        $faq->title_ar  = $request->title_ar;
        $faq->content_en = $request->content_en;
        $faq->content_ar = $request->content_ar;
        
        // Shows  message
        if($faq->save()){

            session()->flash('message', 'The FAQ has been updated successfully');
            //Redirect to another page
		    return redirect()->route('faq.index');
        }

        session()->flash('message', 'Error the FAQ was not updated');
        //Redirect to another page
	    return redirect()->route('faq.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        
        $active = 'faq';

        $sub_active = 'faq_list';

        return view('admin.faqs.edit.main', compact(['faq', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        //validation
        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
        ]);

        $faq->title_en  = $request->title_en;
        $faq->title_ar  = $request->title_ar;
        $faq->content_en = $request->content_en;
        $faq->content_ar = $request->content_ar;

        // Shows  message
        if($faq->save()){

            session()->flash('message', 'The FAQ has been updated successfully');
            //Redirect to another page
		    return redirect()->route('faq.index');
        }

        session()->flash('message', 'Error the FAQ was not updated');
        //Redirect to another page
	    return redirect()->route('faq.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        
        // Shows .toaster message
        if($faq->delete()){

            session()->flash('message', 'The FAQ has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('faq.index');
        }

        session()->flash('message', 'Error the FAQ was not deleted');
        //Redirect to another page
	    return redirect()->route('faq.index');
    }
}
