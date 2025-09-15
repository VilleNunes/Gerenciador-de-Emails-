<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emailLists = EmailList::all();
        return view('emailList.index', ['emailLists' => $emailLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emailList.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:csv'
        ]);

        $pathList = $request->file('file')->getRealPath();


        DB::transaction(function () use($request,$pathList){
            $emailList = EmailList::create([
                'title' => $request->title
            ]);

            $items = $this->readListEmailFromCsv($pathList);

            $emailList->subscribers()->createMany($items);
        });


        return to_route('emailList.index')->with('success', 'Email List created successfully.');
    }

    public function readListEmailFromCsv($pathList)
    {

        $fileHandler = fopen($pathList, 'r');

        $items = [];

        while (($line = fgetcsv($fileHandler, null, ',')) !== false) {
            if ($line[0] === 'nome' && $line[1] === "email") {
                continue;
            }

            $items[] = [
                'name' => $line[0],
                'email' => $line[1]
            ];
        }

        fclose($fileHandler);

        return $items;
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailList $emailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailList $emailList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailList $emailList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailList $emailList)
    {
        //
    }
}
