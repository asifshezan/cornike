<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = TeamMember::where('team_status',1)->orderBy('team_id','DESC')->get();
        return view('admin.teammember.all', compact('all'));
    }

    public function add(){
        return view('admin.teammember.add');
    }

    public function edit($team_id){
        $data = TeamMember::where('team_status',1)->where('team_id',$team_id)->firstOrFail();
        return view('admin.teammember.edit', compact('data'));
    }


    public function view($team_id){
        $data = TeamMember::where('team_status',1)->where('team_id',$team_id)->firstOrFail();
        return view('admin.teammember.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'team_name' => ['required', 'string', 'max:100'],
            'team_designation' => ['required', 'string', 'max:100'],
        ],[
            'team_name.required' => 'Please enter TeamMember name.',
            'team_designation.required' => 'Please enter team designation name.',
        ]);

        $creator = Auth::user()->id;
        $slug = 'Team'.'-'. uniqid();

        $insert = TeamMember::insertGetId([
            'team_name' => $request['team_name'],
            'team_designation' => $request['team_designation'],
            'team_facebook' => $request['team_facebook'],
            'team_twitter' => $request['team_twitter'],
            'team_linkedin' => $request['team_linkedin'],
            'team_instragram' => $request['team_instragram'],
            'team_remarks' => $request['team_remarks'],
            'team_order' => $request['team_order'],
            'team_creator' => $creator,
            'team_slug' => $slug,
            'team_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '-' . rand(100,200) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/teammembers/'.$imageName);

            TeamMember::where('team_id',$insert)->update([
                'team_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully insert team member information.');
            return redirect('dashboard/teammember/add');
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect('dashboard/teammember/add');
        }
    }


    public function update(Request $request){
        $this->validate($request,[
            'test_name' => ['required', 'string', 'max:100'],
            'test_company' => ['required', 'string', 'max:100'],
        ],[
            'test_name.required' => 'Please enter testimonial name.',
            'test_company.required' => 'Please enter company name.',
        ]);

        $test_id = $request['test_id'];
        $editor = Auth::user()->id;
        $update = Testimonial::where('test_id',$test_id)->update([
            'test_name' => $request['test_name'],
            'test_designation' => $request['test_designation'],
            'test_company' => $request['test_company'],
            'test_order' => $request['test_order'],
            'test_feedback' => $request['test_feedback'],
            'test_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $test_id . time() . '_' . rand(1000,2000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/testimonials/'.$imageName);

            Testimonial::where('test_id',$test_id)->update([
                'test_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        }

        if($update){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/testimonial');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/testimonial/edit');
        }
    }

    public function softdelete(){
        $test_id = $_POST['modal_id'];
        $softdelete = Testimonial::where('test_status',1)->where('test_id',$test_id)->update([
            'test_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully update.');
            return redirect('dashboard/testimonial');
        }else{
            Session::flash('error','Opps! Failed update.');
            return redirect('dashboard/testimonial');
        }

    }

    public function restore(){

    }

    public function delete(){

    }
}
