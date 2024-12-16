<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Issues;

class IssuesController extends Controller
{

    public function index()
    {
        $issues = Issues::with('computer')->paginate(5);
        return view('issues.index', compact('issues'));
    }


    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }


    public function store(Request $request)
{
    // Xác thực dữ liệu từ form
    $request->validate([
        'computer_id' => 'required|exists:computers,id', // Kiểm tra máy tính có tồn tại không
        'reported_date' => 'required|date',
        'description' => 'required',
        'urgency' => 'required',
        'status' => 'required',
    ]);

    // Tạo một issue mới và lưu vào database
    Issues::create([
        'computer_id' => $request->computer_id,
        'reported_by' => $request->reported_by,
        'reported_date' => $request->reported_date,
        'description' => $request->description,
        'urgency' => $request->urgency,
        'status' => $request->status,
    ]);

    // Chuyển hướng người dùng về trang danh sách các issues với thông báo thành công
    return redirect()->route('issues.index')->with('success', 'Issue created successfully!');
}

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $issues = Issues::findOrFail($id);
        $computers = Issues::all();
        return view('issues.edit', compact('issues', 'computers'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        $issues = Issues::find($id);

        $issues->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề được cập nhật thành công');
    }

    public function destroy($id)
    {
        $issue = Issues::findOrFail($id);  // Tìm issue theo ID
        $issue->delete();  // Xóa issue
    
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công!');
    }
}