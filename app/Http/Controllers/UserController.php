<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function showUser()
    {
        // Lấy danh sách toàn bộ user (select * from users)
        $listUsers = DB::table('users')->get();

        // Lấy thông tin users có id = 4
        // $result = DB::table('users')->where('id', '=', '4')->first();
        // $result = DB::table('users')->find('4');

        // Lấy thuộc tính 'name' của user có id = 16
        // $result = DB::table('users')->where('id', '=', '16')->value('name');
        // dd($result);

        // Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
        // $result = DB::table('phongban')->where('ten_donvi', 'like', '%Ban giám hiệu%')->pluck('id');
        // dd($result);
        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban giám hiệu%')->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->pluck('id');
        // dd($result);

        // Tìm user có độ tuổi lớn nhất trong công ty
        // $result = DB::table('users')->where('tuoi', DB::table('users')->max('tuoi'))->first();
        // dd($result);

        // Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table('users')->where('tuoi', DB::table('users')->min('tuoi'))->first();
        // dd($result);

        // Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban gián hiệu%')->value('id');
        // $result = DB::table('users', $idPhongBan)->count('id');
        // dd($result);

        // Lấy danh sách tuổi các user
        // $result = DB::table('users')->distinct()->pluck('tuoi');
        // dd($result);

        // Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')->where('name', 'like', '%Khải')->orWhere('name', 'like', '%Thanh')->get();
        // dd($result);

        // Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban đào tạo%')->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->select('id', 'name', 'email')->get();
        // dd($result);

        // Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')
        //     ->where('tuoi', '>=', '30')
        //     ->select('id', 'name', 'email', 'tuoi')
        //     ->orderBy('tuoi', 'asc')
        //     ->get();
        // dd($result);

        // Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')
        //     ->select('id', 'name', 'email', 'tuoi')
        //     ->orderBy('tuoi', 'asc')
        //     ->offset(5)
        //     ->limit(10)
        //     ->get();
        // dd($result);

        // Thêm một user mới vào công ty
        // $data = [
        //     'name' => 'Nguyễn Viết Nhật',
        //     'email' => 'vietnhaths@gmail.com',
        //     'phongban_id' => '1',
        //     'songaynghi' => '0',
        //     'tuoi' => '21',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ];
        // DB::table('users')->insert($data);

        // Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        // $idPhongBan = DB::table('phongban')
        //     ->where('ten_donvi', 'like', '%Ban đào tạo%')
        //     ->value('id');

        // $result = DB::table('users')
        //     ->where('phongban_id', $idPhongBan)
        //     ->select('id', 'name', 'email')
        //     ->get();
        // foreach ($result as $value) {
        //     DB::table('users')
        //         ->where('id', $value->id)
        //         ->update([
        //             'name' => $value->name . ' PĐT'
        //         ]);
        // }
        // dd($result);

        // Xóa user nghỉ quá 15 ngày
        DB::table('users')
            ->where('songaynghi', '<', '15')
            ->delete();
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

    // Users
    public function listUsers()
    {
        $listUser = DB::table('users')->join('phongban', 'phongban.id', '=', 'users.phongban_id')
            ->select('users.id', 'users.name', 'users.email', 'users.tuoi', 'users.phongban_id', 'phongban.ten_donvi')
            ->get();

        return view('users/listUsers')->with([
            'listUsers' => $listUser
        ]);
    }

    public function addUsers()
    {
        $phongban = DB::table('phongban')
            ->select('id', 'ten_donvi')
            ->get();

        return view('users/addUsers')->with([
            'phongban' => $phongban
        ]);
    }

    public function postUsers(Request $req)
    {
        $data = [
            'name' => $req->nameUsers,
            'email' => $req->emailUsers,
            'tuoi' => $req->tuoiUsers,
            'phongban_id' => $req->phongbanUsers,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.listUsers');
    }

    public function deleteUsers($idUsers)
    {
        DB::table('users')->where('id', $idUsers)->delete();
        return redirect()->route('users.listUsers');
    }

    public function editUsers($idUsers)
    {
        $users = DB::table('users')->where('id', $idUsers)->first();
        $phongban = DB::table('phongban')->select('id', 'ten_donvi')->get();
        return view('users.editUsers', compact('users', 'phongban'));
    }

    public function updateUsers(Request $req, $idUsers)
    {
        $data = [
            'name' => $req->nameUsers,
            'email' => $req->emailUsers,
            'tuoi' => $req->tuoiUsers,
            'phongban_id' => $req->phongbanUsers,
            'updated_at' => Carbon::now(),
        ];

        DB::table('users')->where('id', $idUsers)->update($data);
        return redirect()->route('users.listUsers');
    }

}
