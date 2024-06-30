<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemplateCard;
use Illuminate\Http\Request;

class TemplateCardController extends Controller
{
    public function index()
    {
        $templates = TemplateCard::latest('template_id')->paginate(5); // Hoặc phương thức lấy dữ liệu khác nếu cần
        return view('admin.templateCards.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.templateCards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('template_url');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('client/assets/imgs/template_cards'), $fileName);

        TemplateCard::create([
            'template_id' => $request->template_id,
            'template_url' => 'client/assets/imgs/template_cards/' . $fileName,
            'description' => $request->description,
            'cost' => $request->cost,
        ]);
        return redirect()->route('templateCards.index')
                         ->with('message', 'Thêm thành công mẫu thẻ.!');
    }
    public function edit($id)
    {
        $templates = TemplateCard::findOrFail($id);
        return view('admin.templateCards.edit', compact('templates'));
    }

    public function update(Request $request, $id)
    {
        $templates = TemplateCard::findOrFail($id);

        if ($request->hasFile('template_url')) {
            // Xóa icon cũ
            $oldFilePath = public_path($templates->template_url);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            // Lưu icon mới
            $file = $request->file('template_url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('client/assets/imgs/template_cards'), $fileName);
            $socialInfo->template_url = 'client/assets/imgs/template_cards/' . $fileName;
        }

        $templates->description = $request->description;
        $templates->cost = $request->cost;
        $templates->save();

        return redirect()->route('templateCards.index')
                         ->with('message', 'Cập nhật thành công.!');
    }

    public function destroy($id)
    {
        $templates = TemplateCard::findOrFail($id);

        // Xóa icon khỏi hệ thống
        $filePath = public_path($templates->template_url);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $templates->delete();

        return redirect()->route('templateCards.index')
                        ->with('message', 'Xoá thành công.!');
        }
}
