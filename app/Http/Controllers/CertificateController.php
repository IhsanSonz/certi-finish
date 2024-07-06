<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'certificate' => 'required|mimes:jpg,png|max:2048',
        ]);

        $file = $request->file('certificate');
        $path = $file->store('uploads', 'public');

        $certificate = new Certificate;
        $certificate->title = $request->title;
        $certificate->description = $request->description;
        $certificate->layout = $path;
        $certificate->save();

        return redirect()->route('certificate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = Certificate::find($id);
        return view('certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    $certificate = Certificate::find($id); // Menggunakan find dengan parameter $id
    $certificate->title = $request->title;
    $certificate->description = $request->description;


    $certificate->save();

    return redirect()->route('certificate.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = Certificate::find($id);
        $certificate->delete();

        return redirect()->route('certificate.index');
    }
}
