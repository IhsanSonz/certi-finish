<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use App\Models\Certificate;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssesmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assesments = DB::select("
            SELECT a.id, c.title, b.name, a.value, a.keterangan
            FROM assesments a
            INNER JOIN participants b ON a.participants_id = b.id
            INNER JOIN certificates c ON a.certificates_id = c.id
        ");

        return view('assesment.index', compact('assesments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificates = Certificate::select('title', 'id')->get();
        return view('assesment.create', compact('certificates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $birth_date = date('Y-m-d', strtotime($request->birth_date));
        $participant = Participant::where('name', $request->name)->where('birth_date', $birth_date)->first();

        $participants_id = null;
        if ($participant) {
            $participants_id = $participant->id;
        } else {
            $participant = new Participant;
            $participant->name = $request->name;
            $participant->birth_date = $birth_date;
            $participant->save();
            $participants_id = $participant->id;
        }

        $assesment = new Assesment;
        $assesment->certificates_id = $request->certificates_id;
        $assesment->participants_id = $participants_id;
        $assesment->value = $request->value;
        $assesment->save();

        return redirect()->route('assesment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assesment = DB::selectOne("SELECT c.layout, b.name
            FROM assesments a
            INNER JOIN participants b ON a.participants_id = b.id
            INNER JOIN certificates c ON a.certificates_id = c.id
            WHERE a.id = ?", [$id]);

        $pdf = app('Fpdf');
        $pdf->AddPage('L', 'A5');
        $pdf->SetFont('Arial', 'I', 18);

        // Add the background image
        $pdf->Image(storage_path('app/public/'.$assesment->layout), 0, 0, 210, 150);

        $pdf->SetY(64);
        $pdf->Cell(0, 0, $assesment->name, 0, 0, 'C');

        //save file
        $filename = 'certificate_'.$id.'.pdf';
        // $pdf->Output('', 'I');
        $pdf_file = $pdf->Output('S');
        Storage::put('pdf/'.$filename, $pdf_file);

        return response()->file(storage_path('app/pdf/'.$filename), $headers = [
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $assesment = Assesment::find($id); // Ambil data assesment dengan id yang sesuai
    return view('assesment.edit', compact('assesment'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $assesment = assesment::find($id);
        $assesment->value = $request->value;
        $assesment-> certificates_id= $request->certificates_id;
        $assesment-> participants_id= $request->participants_id;
        $assesment-> keterangan= $request->keterangan;
        $assesment->save();

        return redirect()->route('assesment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assesment = Assesment::find($id);
        $assesment->delete();

        return redirect()->route('assesment.index');
    }
}
