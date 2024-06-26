<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser()
    {
        $users = [
            [
                'id' => '1',
                'name' => 'nhat'
            ],
            [
                'id' => '2',
                'name' => 'long'
            ],
        ];

        return view('list-user')->with([
            'users' => $users
        ]);
    }

    function getUser($id, $name = 'null')
    {
        echo $id;
        echo $name;
    }

    function updateUser(Request $request)
    {
        echo $request->id;
        echo $request->name;
    }

    function thongtinsv()
    {
        $thongtinsv = [
            [
                'id' => '1',
                'name' => 'nhat',
                'interest' => 'du day dien',
                'study major' => 'lap trinh web',
                'age' => '21',
                'address' => 'Son Dong - Hoai Duc',
            ]
        ];

        return view('thongtinsv')->with([
            'users' => $thongtinsv
        ]);
    }

}
