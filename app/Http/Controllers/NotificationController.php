<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //send
        $notificationSend = Notification::where('sender_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get(); // Execute the query to retrieve the results
    
    // foreach ($notificationSend as $notifySend) {
    //     $receiverUser = User::findOrFail($notifySend->receiver_id);
    //     dd($receiverUser);
    //     // Do something with $receiverUser
    // }
    

        $notificationReceive = Notification::where('receiver_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('notifications.index',['notificationSend' => $notificationSend, 'notificationReceive' => $notificationReceive]);
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
       
        $userId = Auth::user()->id;
        $receiverId = (int)$request->input('receiver_id'); // Corrected the way of accessing request parameter
        // Create a new notification
        $notification = new Notification();
        $notification->sender_id = $userId;
        $notification->receiver_id = $receiverId;
        $notification->message = $request->input('message');
        $notification->approval = $request->input('approval');
        $notification->save();
    
        // Retrieve the psychologist with the provided receiver_id
        $psychologist = User::find($receiverId);
    
        // Check if the psychologist exists
        if (!$psychologist) {
            // Handle the case where the psychologist doesn't exist
            // For example, redirect back with an error message
            return redirect()->back()->with('error', 'Health professional not found.');
        }
    
        // If everything is successful, return the view with success message
        return redirect()->back()->with('success', 'Health professional requested successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $userId = Auth::user()->id;
        $notId = (int)$request->input('id'); // Corrected the way of accessing request parameter
        // Create a new notification
        $notification = Notification::findOrFail($notId);
       
        Session::put('chatName', $notification->sender->name);
       

        $notification->approval = $request->input('approval');
        $notification->update();
        // If everything is successful, return the view with success message
        return redirect()->back()->with('success', 'Requested accepted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
    
        // Optionally, you can redirect the user back to the index page
        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }
}
