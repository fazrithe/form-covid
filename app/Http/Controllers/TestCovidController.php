<?php

namespace App\Http\Controllers;

use App\Models\TestCovid;
use App\Models\TestMethod;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class TestCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:testcovid-list|testcovid-create|testcovid-edit|testcovid-delete', ['only' => ['index','show']]);
         $this->middleware('permission:testcovid-create', ['only' => ['create','store']]);
         $this->middleware('permission:testcovid-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:testcovid-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TestCovids = TestCovid::with('TestMethod')->latest()->paginate(5);
        // return $TestCovids;
        return view('test_covid.index',compact('TestCovids'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('test_covid.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nik' => 'required',
            'name' => 'required',
        ]);

        $TestCovid = TestCovid::create($request->all());
        $TestMethod = new TestMethod();
        $TestMethod->test_id = $TestCovid->id;
        $TestMethod->test_name = $request->post('test_name');
        $TestMethod->result = $request->post('result');
        $TestMethod->normal_range = $request->post('normal_range');
        $TestMethod->method = $request->post('method');
        $TestMethod->save();


        return redirect()->route('test_covids.index')
                        ->with('success','Test Covid created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function show(TestCovid $TestCovid)
    {
        $TestCovidValue = TestCovid::with('TestMethod','user')->find($TestCovid->id);

        return view('test_covid.show',compact('TestCovidValue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCovid $TestCovid)
    {

        $TestCovidValue = TestCovid::with('TestMethod')->find($TestCovid->id);
        $gender = ['Male','Famale'];
        $result = ['NEGATIVE','POSITIVE'];
        $method = ['SWAB ANTIGEN','SWAB PCR'];
        return view('test_covid.edit',compact('TestCovidValue','gender','result','method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestCovid $TestCovid)
    {
         request()->validate([
            'nik' => 'required',
            'name' => 'required',
        ]);

        $TestCovid->update($request->all());
        $TestMethod = TestMethod::find($request->post('method_id'));
        $TestMethod->test_id = $request->post('id');
        $TestMethod->test_name = $request->post('test_name');
        $TestMethod->result = $request->post('result');
        $TestMethod->normal_range = $request->post('normal_range');
        $TestMethod->method = $request->post('method');
        $TestMethod->save();

        return redirect()->route('test_covids.index')
                        ->with('success','Test Covid updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestCovid $TestCovid)
    {

        $TestCovid->delete();
        $testCovidMethod = TestMethod::where('test_id', $TestCovid->id);
        $testCovidMethod->delete();
        return redirect()->route('test_covids.index')
                        ->with('success','Test Covid deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function pdf($id)
    {


        $TestCovidValue = TestCovid::with('TestMethod')->find($id);
        // return $TestCovidValue->user->signature;
        foreach($TestCovidValue->TestMethod as $value){
            $test_name = $value->test_name;
            $result = $value->result;
            $normal_range = $value->normal_range;
            $method = $value->method;
        }
        $data = [
            'id' => $TestCovidValue->id,
            'nik' => $TestCovidValue->nik,
            'name' => $TestCovidValue->name,
            'date_of_birth' => $TestCovidValue->date_of_birth,
            'address' => $TestCovidValue->address,
            'gender' => $TestCovidValue->gender,
            'sampling_date' => $TestCovidValue->sampling_date,
            'time_of_test' => $TestCovidValue->time_of_test,
            'checkpoint' => $TestCovidValue->checkpoint,
            'test_name' => $test_name,
            'result' => $result,
            'normal_range' => $normal_range,
            'method' => $method,
            'user_name' => $TestCovidValue->user->name,
            'signature' => $TestCovidValue->user->signature,
        ];

        $pdf = PDF::loadView('test_covid/pdf', $data)->setPaper('a4', 'potrait');

        Storage::put('pdf/result_pdf_'.$id.'.pdf', $pdf->output());

        return $pdf->download('result_pdf_'.$id.'.pdf');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function view_pdf($id)
    {
        return view('test_covid.view_pdf',compact('id'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function print_test($id)
    {
        $data = TestCovid::with('TestMethod','user')->find($id);
        $dataMethod = TestMethod::where('test_id',$id)->first();
        // return $data->user->signature;
        return view('test_covid.print',compact('data','dataMethod'));
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\TestCovid  $TestCovid
     * @return \Illuminate\Http\Response
     */
    public function view_result($id)
    {
       $data = TestCovid::with('TestMethod')->find($id);
       $dataMethod = TestMethod::where('test_id',$id)->first();
        return view('test_covid.view_result',compact('data','dataMethod'));
    }

}
