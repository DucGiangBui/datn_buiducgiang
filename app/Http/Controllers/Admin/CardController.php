<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use App\Models\TemplateCard;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::with('templateCard')->paginate(5);
        return view('admin.cards.index', compact('cards'));
    }
    public function handleCardInfo($cardUrl)
    {
        $card = Card::where('card_url', $cardUrl)->first();
        if (!$card) {
            abort(404, 'Card not found');
        }
        $user = User::where('card_id', $card->card_id)->first();
        if (!$user) {
            abort(404, 'User not found');
        }
        return redirect()->route('myInfos', ['linkUrl' => $user->link_url]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templateCards = TemplateCard::all();
        return view('admin.cards.create', compact('templateCards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCreate = $request->only(['card_url', 'template_id']);
        $cards = Card::create($dataCreate);

        if ($cards) {
            return redirect()->route('cards.index')->with('message', 'Thêm mới thẻ thành công!');
        }

        return back()->withErrors(['message' => 'Thêm thẻ thất bại!'])->withInput();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($card_id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cards = Card::findOrFail($id);
        $templateCards = TemplateCard::all();
        return view('admin.cards.edit', compact('cards', 'templateCards'));
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
        $request->validate([
            'card_url' => 'required|string',
            'template_id' => 'required|exists:template_cards,template_id',
        ]);

        $card = Card::findOrFail($id);
        $card->card_url = $request->input('card_url');
        $card->template_id = $request->input('template_id');
        $card->save();

        return redirect()->route('cards.index')->with('message', 'Cập nhật thẻ thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $card = Card::findOrFail($id);
            $card->delete();
            if($card){
                return redirect()->route('cards.index')->with('message', 'Xóa thẻ thành công!');
            }
            return back()->withErrors(['message' => 'Xóa thẻ không thành công!']);
        }
}
