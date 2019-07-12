<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeightRecord;
use App\User;
use Auth;

class WeightRecordController extends Controller
{
    protected $weight;
    protected $user;

    public function __construct(WeightRecord $weight, User $user)
    {
        $this->middleware('auth');
        $this->weight = $weight;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();
        $weights = $this->weight->all();
        return view('weight_record.index', compact('users', 'weights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weight_record.create');
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
        $this->weight->fill($input)->save();
        return redirect()->route('training_record.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $input = $request->get('weight_time');
        $user = $this->user->find($id);
        if (empty($input)) {
            $weights = $this->weight->where('user_id', $id)->get();
        } else {
            $weights = $this->weight->where('user_id', $id)->where('weight_time', 'LIKE', "%{$input}%")->get();
        }
        return view('weight_record.show', compact('user', 'weights'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weight = $this->weight->find($id);
        return view('weight_record.edit', compact('weight'));
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
        $this->weight->find($id)->fill($input)->save();
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
        $this->weight->find($id)->delete();
        return redirect()->route('training_record.index');
    }
}
