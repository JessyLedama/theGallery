<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Flyer;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listings = Flyer::with('photo')->get();

        if (count($listings)) {
            return view('flyers.index', compact('listings'));
        } else {
            return "no photos to display!! Please create a new gallery";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flyer = new Flyer($request->all());
        $flyer->user_id = Auth::user()->id;

        $flyer->save();

        flash()->success('Success', 'New Gallery created successfully!');

        return redirect("/$flyer->area");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($area)
    {
        $flyer = Flyer::locatedAt($area);

        return view('flyers.show', compact('flyer'));
    } 

    public function addPhoto($area, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $flyer = Flyer::locatedAt($area);

        if (! $flyer->ownedBy(\Auth::user())) {
            return $this->unauthorized($request);
        }

        $photo = $this->makePhoto($request->file('photo'));

        $flyer->addPhoto($photo);
    }

    protected function unauthorized(Request $request)
    {
        if ($request->ajax()) {
            return response(['message'=>'This is not your gallery'], 403);
        }

        flash('This is not your gallery');

        return redirect('/');
    }

    public function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalname())->move($file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
