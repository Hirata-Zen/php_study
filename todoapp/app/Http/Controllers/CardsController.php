<?php

namespace App\Http\Controllers;
use App\Card;
use App\Listing;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    //===カード追加画面遷移
    public function new($listing_id){
 	return view('card/new', ['listing_id' => $listing_id]);
    }

    // ===ここからリストを新規作成する処理の追加（データベースへの保存）===
    public function store(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['title_name' => 'required|max:255', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }
        // 入力に問題がなければcardモデルを介して、作ったユーザーidとタイトルをcardsテーブルに保存
        $cards = new Card;
        $cards->title = $request->title_name;
	$cards->memo = $request->memo;
        $cards->listing_id = $request->listing_id;
        $cards->save();
	//eval(\Psy\Sh());
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }

    // ===ここまでリストを新規作成する処理の追加（データベースへの保存

    //===カードの詳細画面に遷移
    public function show($listing_id,$card_id)
    {
        $cards = Card::find($card_id);
	$listings=Listing::find($listing_id);
        return view('card/show',['cards' => $cards,'listings'=>$listings]);
    }

    //===カードの編集画面に遷移
    public function edit($listing_id,$card_id)
    {
        $card = Card::find($card_id);
        $listing = Listing::find($listing_id);
	$listings = Listing::where('user_id', Auth::user()->id)->get();
	
        return view('card/edit', ['card' => $card, 'listing' => $listing, 'listings' => $listings]);
    }

    //カードの更新
    public function update(Request $request) {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['title_name' => 'required|max:255', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }
        $cards = Card::find($request->id);
        $cards->title = $request->title_name;
	$cards->memo=$request->memo;
	$cards->listing_id = $request->listing_id;
        $cards->save();

        return redirect('/');
    }
    //===カードの削除
    public function destroy($listing_id,$card_id) {
        Card::destroy($card_id);
        return redirect('/');
    }
}

