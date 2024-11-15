<?php

namespace App\Http\Controllers\API;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    // Lấy danh sách tất cả các contact
    public function index()
    {
        return response()->json(Contact::all());
    }

    // Lấy chi tiết một contact theo ID
    public function show($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        return response()->json($contact);
    }

    // Tạo mới một contact
    public function store(Request $request)
    {
        $request->validate([
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contact,email',
            'telephone' => 'nullable|string|max:20',
            'responsible' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
        ]);

        $contact = Contact::create($request->all());

        return response()->json($contact, 201);
    }

    // Cập nhật một contact theo ID
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'.$id], 404);
        }

        $request->validate([
            'contact_name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string|max:20',
            'responsible' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:255',
        ]);

        $contact->update($request->all());

        return response()->json($contact);
    }
    // Cập nhật nhiều contact cùng lúc
    public function updateMultiple(Request $request)
    {
        // Xác nhận rằng 'ids' là mảng và chứa ít nhất một ID
        $request->validate([
            'ids' => 'required|array',  // Mảng các ID cần cập nhật
            'ids.*' => 'exists:contact,id',  // Kiểm tra từng ID có tồn tại trong bảng contact
            'data' => 'required|array',  // Dữ liệu cập nhật
            'data.contact_name' => 'nullable|string',  // Đảm bảo các trường có thể cập nhật
            'data.email' => 'nullable|email',
            'data.telephone' => 'nullable|string',
            'data.responsible' => 'nullable|string',
            'data.tag' => 'nullable|string',
        ]);

        // Lấy các contact cần cập nhật theo ID
        $contacts = Contact::whereIn('id', $request->ids)->get();
        
        // Nếu không có contact nào được tìm thấy, trả về lỗi
        if ($contacts->isEmpty()) {
            return response()->json(['message' => 'No contacts found for the provided IDs'], 404);
        }
        
        // Cập nhật từng contact với dữ liệu mới
        foreach ($contacts as $contact) {
            $contact->update($request->data);
        }

        return response()->json(['message' => 'Contacts updated successfully']);
    }
    // Xóa một contact theo ID
    public function destroy($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully']);
    }

    // Xóa nhiều contact cùng lúc
    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'ids' => 'required|array', // yêu cầu truyền mảng ID
            'ids.*' => 'exists:contact,id' // kiểm tra tất cả ID có tồn tại trong bảng contact không
        ]);

        Contact::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'contact deleted successfully']);
    }
    public function filter(Request $request)
    {
        // Lấy tất cả tham số lọc từ request
        $filters = $request->only(['created_at', 'contact_name', 'email', 'manager', 'search', 'tag', 'list']);

        // Query cơ bản
        $query = DB::table('contact')->select('*');

        // Lọc theo ngày tạo
        if (!empty($filters['created_at'])) {
            $query->whereDate('created_at', $filters['created_at']);
        }

        // Lọc theo người tạo
        if (!empty($filters['contact_name'])) {
            $query->where('contact_name', $filters['contact_name']);
        }

        // Lọc theo email
        if (!empty($filters['email'])) {
            $query->where('email', 'like', '%' . $filters['email'] . '%');
        }

        // Lọc theo manager
        if (!empty($filters['manager'])) {
            $query->where('manager', $filters['manager']);
        }

        // Tìm kiếm theo text (áp dụng trên nhiều cột)
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('contact_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('telephone', 'like', '%' . $search . '%');
            });
        }

        // Lọc theo tag
        if (!empty($filters['tag'])) {
            $query->where('tag', $filters['tag']);
        }

        // Lọc theo list
        if (!empty($filters['list'])) {
            $query->where('list', $filters['list']);
        }

        // Lấy kết quả cuối cùng
        $contacts = $query->get();

        // Trả về JSON
        return response()->json($contacts);
    }
}
