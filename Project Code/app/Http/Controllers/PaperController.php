<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if(session()->has('success')) {
            Alert::success('Success', session()->get('success'));
        }


        return view('paper.index');
    }

    public function filter(Request $request) {
        
        $query = Paper::query();

        if( $request->user_id != null ) {$query->where('user_id', $request->user_id);}

        $papers = $query->get();

        return view('paper.index', compact('papers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        if(session()->has('success')) {
            Alert::success('نجاح', session()->get('success'));
        }

        return view('paper.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $fileSource = $request->file('src');
        
        $inputs = $request->all();

        $inputs['user_id'] = Auth::id();
        
        $inputs['src'] = $this->saveUploadedFile($fileSource);

        Paper::create($inputs);

        Session()->flash('success' , 'تم إنشاء بحث بنجاح!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper $paper
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(session()->has('success')) {
            Alert::success('نجاح', session()->get('success'));
        }

        $paper = Paper::findOrFail($id);

        return view('paper.form', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper $paper
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $paper = Paper::findOrFail($id);

        return view('paper.view', compact('paper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $paper = Paper::findOrFail($id);

        $oldFileSource = $paper->src;

        $fileSource = $request->file('src');

        if($request->file('src')) {
           
            $inputs = $request->all();
            $inputs['src'] = $this->saveUploadedFile($fileSource);

        } else {
            
            $inputs = $request->all();
            $inputs['src'] = $oldFileSource;
        }


        $paper->fill($inputs)->save();

        Session()->flash('success' , 'تم تعديل البحث بنجاح!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paper::destroy(array('id', $id));

        return response()->json(['status'=>'تم حذف البحث بنجاح']);
    }

    public function saveUploadedFile($fileSource) {

        $sourceName = time().rand(1,100).'.'.$fileSource->extension();

        Storage::putFileAs('fileUploads', $fileSource, $sourceName);
        
        return $sourceName;
        
    }
}
