<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function list()
    {
        $abouts= About::all();

        return view('pages/abouts/list',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/abouts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title1' => 'required|string',
            'title2' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
        ]);

        $abouts = new About();
        $abouts->title1 = $request->title1;
        $abouts->title2 = $request->title2;
        $abouts->description = $request->description;


        $img_file = $request->file('image');
        Storage::putFile('public/img/', $img_file);
        $abouts->image = "storage/img/".$img_file->hashName();



        $abouts->save();

        return redirect()->route('admin.abouts.create')->with('success','New About Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts=About::find($id);

        return view('pages/abouts/edit',compact('abouts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string',

        ]);

        $abouts = About::find($id);
        $abouts->title1 = $request->title1;
        $abouts->title2 = $request->title2;
        $abouts->description = $request->description;


        if($request->file('big_image')){
            $img_file = $request->file('big_image');
            Storage::putFile('public/img/', $img_file);
            $abouts->image = "storage/img/".$img_file->hashName();
        }



        $abouts->save();

        return redirect()->route('admin.abouts.list')->with('success','Abouts Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $abouts=About::find($id);
        if($abouts !=null) {
            @unlink(public_path($abouts->image));


            $abouts->delete();
            return redirect()->route('admin.abouts.list')->with('success', 'Successfully deleted');
        }
        return redirect()->route('admin.abouts.create')->with('error', 'Wrond Id!');
    }
}

