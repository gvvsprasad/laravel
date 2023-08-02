<?php

namespace App\Http\Controllers; 

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables; 

/**
 * Class UserHobbiesController
 */
class UserHobbiesController extends Controller 
{ 

    /**
    * Display the specified resource.
    *
    * @param Request $request
    * @return Response
    */
    public function show(Request $request)
    {
        if ($request->ajax()) { 
            
            $users = User::get(); 
            
            return DataTables::of($users)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) { 
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';  
                            $btn .= '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>'; 
                            return $btn;
                    }) 
                    ->rawColumns(['hobbies', 'action'])
                    ->make(true);
        }
          
        return view('user-hobbies');
    } 

    /**
    * Show the form for editing the specified resource.
    *
    * @param User $user
    * @return Response
    */
    public function edit(User $user)
    {
        // edit form
    }

    /**
    * Update the specified resource in storage.
    *
    * @param User $user
    * @return Response
    */
    public function update(Request $request, User $user)
    {
        
//        $user->hobbies()->save([
//            'hobby_id' => ,
//        ]);
        
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);
              
        return true;
    } 

} 
