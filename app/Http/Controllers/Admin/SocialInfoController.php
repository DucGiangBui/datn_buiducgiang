<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialInfoController extends Controller
{
    public function index()
    {
        $socialInfos = SocialInfo::all();
        return view('admin.socialInfos.index', compact('socialInfos'));
    }

    public function create()
    {
        return view('admin.socialInfos.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('social_icon');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('client/assets/imgs/icon_social'), $fileName);

        SocialInfo::create([
            'social_id' => $request->social_id,
            'platform' => $request->platform,
            'social_icon' => 'client/assets/imgs/icon_social/' . $fileName,
        ]);
        return redirect()->route('socialInfos.index')
                         ->with('message', 'Thêm thành công Icon.!');
    }

    public function edit($id)
    {
        $socialInfo = SocialInfo::findOrFail($id);
        return view('admin.socialInfos.edit', compact('socialInfo'));
    }

    public function update(Request $request, $id)
    {
        $socialInfo = SocialInfo::findOrFail($id);

        if ($request->hasFile('social_icon')) {
            // Xóa icon cũ
            $oldFilePath = public_path($socialInfo->social_icon);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            // Lưu icon mới
            $file = $request->file('social_icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('client/assets/imgs/icon_social'), $fileName);
            $socialInfo->social_icon = 'client/assets/imgs/icon_social/' . $fileName;
        }

        $socialInfo->social_id = $request->social_id;
        $socialInfo->platform = $request->platform;
        $socialInfo->save();

        return redirect()->route('socialInfos.index')
                         ->with('message', 'Cập nhật thành công.!');
    }

    public function destroy($id)
    {
        $socialInfo = SocialInfo::findOrFail($id);

        // Xóa icon khỏi hệ thống
        $filePath = public_path($socialInfo->social_icon);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $socialInfo->delete();

        return redirect()->route('socialInfos.index')
                        ->with('message', 'Xoá thành công.!');
        }
}
