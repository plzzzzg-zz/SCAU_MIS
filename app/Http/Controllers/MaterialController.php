<?php

namespace App\Http\Controllers;

use App\Lend_Info;
use App\Material;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Requests;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class MaterialController extends Controller
{
//      概览、主页
    public function index()
    {
        $materials = Material::latest()->get();
        return view('material.index',compact('materials'));
    }

//      增加物资品类
    public function add_material_type(Request $request)
    {
        $input = $request->all();
        $input['available'] = $input['total'];
        Material::create($input);
        return redirect('/material');
    }
//      增加品类表单页面
    public function add()
    {
        return view('material.add');
    }
//      某物资详情
    public function detail($id)
    {
        $material = Material::findorfail($id);
        $lend_infos = Lend_Info::latest()->get();
        $lend_infos = $lend_infos->where('name',$material->name);
        return view('material.detail',compact('material','lend_infos'));
    }
//      保存借出信息
    public function store_lend_info(Request $request){
//        $this->validate($request,[
//            'lend_to'=>'required',
//            'lend_contact'=>'required',
//            'lend_num'=>'required|max:',
//            'should_return_time'=>'required|date',
//            'lend_from_contact'=>'required',
//            'lend_from'=>'required',
//        ]);
        $input = $request->all();
        Lend_Info::create($input);
        $material = Material::find($input['redirect']);
        $material->available=$material->available-$input['lend_num'];
        $material->lend_num=$material->lend_num+$input['lend_num'];
        $material->save();
        return redirect()->action('MaterialController@detail',$input['redirect']);
    }
//      借出填写页面
    public function add_lend_info($id){
        $material = Material::findorfail($id);
        return view('material.add_lend_info',compact('material'));
    }
//      确认归还
    public function return_confirm(Request $confirm)
    {
        $input = $confirm->all();
        $material = Material::find($input['id']);
        $material->available=$input['lend_num']+$material->available;
        $material->lend_num=-$input['lend_num']+$material->lend_num;
        $lend_info =Lend_Info::all()->where('id',$input['lend_id'])->first();
        $lend_info->status='已归还';
        $lend_info->returned_time=Carbon::now()->toDateString();
        $material->save();
        $lend_info->save();
        return redirect()->action('MaterialController@detail',$material->id);
    }
//      删除借出记录
    public function delete_lend_info(Request $delete)
    {
        $delete_confirm = $delete->all();
        $material = Material::find($delete_confirm['id']);
        $lend_info = Lend_Info::where('id',$delete_confirm['lend_id'])->delete();
        return redirect()->action('MaterialController@detail',$material->id);
    }
}
