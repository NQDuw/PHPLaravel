<?php

namespace App\Http\Controllers;
use App\Models\TheLoai;
use App\Models\Slide;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function __construct(){
        $theloais=TheLoai::get();
        $slides=Slide::get();
        view()->share('theloais',$theloais);
        view()->share('slides',$slides);
    }
    public function trangchu(){
        $theloais=TinTuc::get();
        return view('pages.trangchu');
    }
    public function chitiet(string $id){
            $tintucs=TinTuc::find($id);
            $tinnoibat=TinTuc::where('NoiBat',1)->take(4)->get();
            $tinlienquan = TinTuc::where('idLoaiTin',$tintucs->idLoaiTin)->take(4)->get();
            $comment=Comment::where('idTinTuc',$id)->get();
            $userId = $comment->pluck('idUser')->unique();
            $usersname = User::whereIn('id', $userId)->get()->keyBy('id');
            return view('pages.chitiet',['tintucs'=>$tintucs,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan,'comment'=>$comment,'usersname'=>$usersname]);
        }
    public function lienhe(){
        $theloais=TheLoai::get();
        return view('pages.lienhe');
    }
   
    public function tintheoloai(string $id){
        if(Auth::check()){
        $loaitins=LoaiTin::find($id);
        $tintucs=TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.tintheoloai',['tintucs'=>$tintucs,'loaitins'=>$loaitins]);
        }else{
            return redirect()->route('view.dangnhap');
        }
    }
    public function dangky()
    {
        return view('pages.dangky');
    }
    public function postDangKy(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6'
            ],
            [
                "name.required" => 'Tên người dùng không được bỏ trống',
                "password.required" => 'Password không được bỏ trống',
                "email.required" => 'Email không được bỏ trống',
                "email.email" => 'Email nhập không hợp lệ',
                "email.unique" => 'Email đã được sử dụng',
                "password.confirmed" => 'mật khẩu không chính xác',
                "password.min" => 'mật khẩu phải từ 6 ký tự trở lên',       
            ]
        );
        $user = User::create($data);
        if($user){
            return redirect()->route('view.dangky')->with('message','Đăng ký thành công');
        }else{
            return redirect()->route('view.dangky')->with('message','Đăng ký thất bại');
        }
        
    }

    public function dangnhap()
    {
        return view('pages.dangnhap'); 
    }
    public function postDangNhap(Request $request)
    {
        $user = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ],
            [
                "password.required" => 'Password không được bỏ trống',
                "email.required" => 'Email không được bỏ trống',
                "email.email" => 'Email nhập không hợp lệ',
                "password.min" => 'mật khẩu phải từ 6 ký tự trở lên',       
            ]
        );
        if (Auth::attempt($user)) {
            return redirect()->route('view.trangchu');
        }else{
            return redirect()->route('view.dangnhap')->with('message','đăng nhập thất bại');
        }
        
    }

    public function dangxuat()
    {
        Auth::logout();
        return view('pages.trangchu'); 
    }

    public function postComment(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'noidung' => 'required',
            'idtintuc' => 'required',
            'iduser' => 'required',
        ]);

        // Create the comment in the database
        Comment::create([
            'noidung' => $validatedData['noidung'],
            'idtintuc' => $validatedData['idtintuc'],
            'iduser' => $validatedData['iduser'],
        ]);

        // Redirect back to the detailed post view
        return redirect()->route('view.tinchitiet', ['id' => $validatedData['idtintuc']]);
    }
    public function search( Request $request)
    {
        $search = $request->input('search');
    
        // Tìm kiếm trong bảng LoaiTin theo tên loại tin và ID thể loại
        $results = TinTuc::where('TieuDe', 'LIKE', "%{$search}%")
            ->paginate(5);
        // Truyền kết quả tìm kiếm vào view
        return view('pages.tintimkiem', ['results' => $results, 'search' => $search]);
    }
    public function getThongTin(string $id){
        $user=User::find($id);
        return view('pages.thongtinuser',['user'=>$user]);
    }
    public function postUpdate(Request $request,string $id){
        $request->validate(
            [
                'name' => 'required',
                'password' => 'required|min:6'
            ],
            [
                "name.required" => 'Tên người dùng không được bỏ trống',
                "password.required" => 'Password không được bỏ trống',
                "password.min" => 'mật khẩu phải từ 6 ký tự trở lên',       
            ]);
        $user = User::find($id)->update([
            'name' => $request->name,
            'password' => $request->password,
        ]);
        if($user){
            return redirect()->route('postupdate',[$id])->with('message','Cập nhật thành công');
        }else{
            return redirect()->route('postupdate',[$id])->with('message','Cập nhật thất bại');
        }
    }
}
