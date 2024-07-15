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
    if ($request->hasFile('front') && $request->hasFile('behind')) {
        $fileFront = $request->file('front');
        $fileNameFront = time() . '_' . $fileFront->getClientOriginalName();
        $fileFront->move(public_path('client/assets/imgs/template_cards/front'), $fileNameFront);

        $fileBack = $request->file('behind');
        $fileNameBack = time() . '_' . $fileBack->getClientOriginalName();
        $fileBack->move(public_path('client/assets/imgs/template_cards/behind'), $fileNameBack);

        TemplateCard::create([
            'template_id' => $request->template_id,
            'front' => 'client/assets/imgs/template_cards/front/' . $fileNameFront,
            'behind' => 'client/assets/imgs/template_cards/behind/' . $fileNameBack,
            'description' => $request->description,
            'cost' => $request->cost,
        ]);

        return redirect()->route('templateCards.index')
                         ->with('message', 'Thêm thành công mẫu thẻ!');
    } else {
        return redirect()->route('templateCards.index')
                         ->with('error', 'Vui lòng tải lên cả hai mặt của thẻ.');
    }
}


    public function edit($id)
    {
        $templates = TemplateCard::findOrFail($id);
        return view('admin.templateCards.edit', compact('templates'));
    }

    public function update(Request $request, $id)
    {
        $templates = TemplateCard::findOrFail($id);

        if ($request->hasFile('front')) {
            $oldFrontPath = public_path($templates->front);
            if (file_exists($oldFrontPath)) {
                if (is_writable($oldFrontPath)) {
                    if (!unlink($oldFrontPath)) {
                        return redirect()->route('templateCards.index')
                                        ->with('message', 'Không thể xóa ảnh mặt trước cũ.');
                    }
                } else {
                    return redirect()->route('templateCards.index')
                                    ->with('message', 'Ảnh mặt trước cũ không có quyền ghi.');
                }
            } else {
                return redirect()->route('templateCards.index')
                                ->with('message', 'Ảnh mặt trước cũ không tồn tại.');
            }
            $fileFront = $request->file('front');
            $fileNameFront = time() . '_' . $fileFront->getClientOriginalName();
            $fileFront->move(public_path('client/assets/imgs/template_cards/front'), $fileNameFront);
            $templates->front = 'client/assets/imgs/template_cards/front/' . $fileNameFront;
        }

        if ($request->hasFile('behind')) {
            $oldBehindPath = public_path($templates->behind);
            if (file_exists($oldBehindPath)) {
                if (is_writable($oldBehindPath)) {
                    if (!unlink($oldBehindPath)) {
                        return redirect()->route('templateCards.index')
                                        ->with('message', 'Không thể xóa ảnh mặt sau cũ.');
                    }
                } else {
                    return redirect()->route('templateCards.index')
                                    ->with('message', 'Ảnh mặt sau cũ không có quyền ghi.');
                }
            } else {
                return redirect()->route('templateCards.index')
                                ->with('message', 'Ảnh mặt sau cũ không tồn tại.');
            }
            $fileBehind = $request->file('behind');
            $fileNameBehind = time() . '_' . $fileBehind->getClientOriginalName();
            $fileBehind->move(public_path('client/assets/imgs/template_cards/behind'), $fileNameBehind);
            $templates->behind = 'client/assets/imgs/template_cards/behind/' . $fileNameBehind;
        }

        $templates->description = $request->description;
        $templates->cost = $request->cost;
        $templates->save();

        return redirect()->route('templateCards.index')
                        ->with('message', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $templates = TemplateCard::findOrFail($id);

        $fileFrontPath = public_path($templates->front);
        if (file_exists($fileFrontPath)) {
            unlink($fileFrontPath);
        }
        $fileBehindPath = public_path($templates->behind);
        if (file_exists($fileFrontPath)) {
            unlink($fileFrontPath);
        }
        $templates->delete();

        return redirect()->route('templateCards.index')
                        ->with('message', 'Xoá thành công.!');
        }
}
