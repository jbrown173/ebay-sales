<?php
namespace App\Http\Controllers;

use App\Models\whetstones;
use Illuminate\Http\Request;

class WhetstonesCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['whetstones'] = whetstones::orderBy('id', 'desc')->paginate(5);
        return view('whetstones.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('whetstones.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gritEstimate' => 'required'
        ]);
        $whetstone = new whetstones;
        $whetstone->name = $request->name;
        $whetstone->description = $request->description;
        $whetstone->gritEstimate = $request->gritEstimate;
        $whetstone->save();
        return redirect()->route('whetstones.index')
            ->with('success', 'Razor record has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\whetstones  $whetstone
     * @return \Illuminate\Http\Response
     */
    public function show(whetstones $whetstone)
    {
        return view('whetstones.show', compact('whetstone'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\whetstones  $whetstone
     * @return \Illuminate\Http\Response
     */
    public function edit(whetstones $whetstone)
    {
        return view('whetstones.edit', compact('whetstone'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\whetstones  $razor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gritEstimate' => 'required'
        ]);
        $whetstone = new whetstones;
        $whetstone->name = $request->name;
        $whetstone->description = $request->description;
        $whetstone->gritEstimate = $request->gritEstimate;
        $whetstone->save();
        return redirect()->route('whetstones.index')
            ->with('success', 'Razor Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\whetstones  $whetstone
     * @return \Illuminate\Http\Response
     */
    public function destroy(whetstones $whetstone)
    {
        $whetstone->delete();
        return redirect()->route('whetstones.index')
            ->with('success', 'Razor has been deleted successfully');
    }
}
