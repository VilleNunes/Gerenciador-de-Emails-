<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Email;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EmailList $emailList)
    {
        
        $search = request()->query('search', '');
        $subscribers = $emailList->subscribers()->when($search,function($q) use($search){
            $q->where(function($q) use ($search){
                $q->where('name','like',"%{$search}%")->orWhere('email','like',"%$search%");
            });
        })->paginate(10);
        return view('subscriber.index',compact('subscribers','search','emailList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return back()->with('success',__('subscriber successfully deleted'));
    }
}
