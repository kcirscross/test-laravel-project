<?php

namespace App\Http\Controllers\API;

use App\Models\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string|max:20',
        ]);

        $manager = Manager::create($request->all());
        return response()->json($manager, 201);
    }

    // 2. Lấy danh sách tất cả Managers
    public function index()
    {
        return response()->json(Manager::all());
    }

    // 3. Lấy thông tin chi tiết của một Manager
    public function show($id)
    {
        $manager = Manager::find($id);
        if (!$manager) {
            return response()->json(['message' => 'Manager not found'], 404);
        }
        return response()->json($manager);
    }

    // 4. Cập nhật thông tin của Manager
    public function update(Request $request, $id)
    {
        $manager = Manager::find($id);
        if (!$manager) {
            return response()->json(['message' => 'Manager not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string|max:20', // Đổi phone thành telephone
        ]);

        $manager->update($request->all());
        return response()->json($manager);
    }

    // 5. Xóa một Manager
    public function destroy($id)
    {
        $manager = Manager::find($id);
        if (!$manager) {
            return response()->json(['message' => 'Manager not found'], 404);
        }

        $manager->delete();
        return response()->json(['message' => 'Manager deleted successfully']);
    }
}
