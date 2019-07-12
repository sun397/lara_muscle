<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingRecord;
use App\TrainingSelect;
use App\User;
use Auth;

class TrainingRecordController extends Controller
{
    protected $record;
    protected $select;

    public function __construct(TrainingRecord $record, TrainingSelect $select)
    {
        $this->middleware('auth');
        $this->record = $record;
        $this->select = $select;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->get('training_time');
        if (empty($input)) {
            $records = $this->record->orderBy('training_time', 'desc')->get();
        } else {
            $records = $this->record->where('training_time', 'LIKE', "%{$input}%")->get();
        }
        return view('training_record.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selects = $this->select->all();
        return view('training_record.create', compact('selects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->record->fill($input)->save();
        return redirect()->route('training_record.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selects = $this->select->all();
        $record = $this->record->find($id);
        return view('training_record.edit', compact('record', 'selects'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->record->find($id)->fill($input)->save();
        return redirect()->route('training_record.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->record->find($id)->delete();
        return redirect()->route('training_record.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myPage($id)
    {
        $records = $this->record->getByUserId($id);
        return view('training_record.mypage', compact('records'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        $records = $this->record->getByUserId(Auth::id());
        return view('training_record.detail', compact('records'));
    }
}
