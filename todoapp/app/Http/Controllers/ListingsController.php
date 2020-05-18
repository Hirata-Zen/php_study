<?php

namespace App\Http\Controllers;
use App\Listing;
use Auth;
use Validator;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

    //===ここからリストの一覧表示をするための処理追加===
    public function index()
    {
        // Listingモデルを介してデータベースからデータを取得。whereで取得したデータは配列になっている。
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
	//eval(\Psy\Sh());
        // コントローラからビューへの値の受け渡しをview関数を使って実施
        return view('listing/index', ['listings' => $listings]);
    }
    // ===ここまでリストの一覧表示をするための処理追加===

    // ===ここからリストを新規作成する処理の追加（フォームへの遷移）===
    public function new()
    {
        return view('listing/new');
        // テンプレート「listing/new.blade.php」を表示します。
    }
    // ===ここまでリストを新規作成する処理の追加（フォームへの遷移）===
    // ===ここからリストを新規作成する処理の追加（データベースへの保存）===
    public function store(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['list_name' => 'required|max:255', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }

        // 入力に問題がなければListingモデルを介して、作ったユーザーidとタイトルをlistingsテーブルに保存
        $listings = new Listing;
        $listings->title = $request->list_name;
        $listings->user_id = Auth::user()->id;
        $listings->save();
        
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    // ===ここまでリストを新規作成する処理の追加（データベースへの保存）===
    //===ここから編集画面への遷移===
    public function edit($listing_id)
    {
	$listings = Listing::find($listing_id);
        return view('listing/edit', ['listings' => $listings]); 
    }

    public function update(Request $request) {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['list_name' => 'required|max:255', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }
        $listings = Listing::find($request->id);
        $listings->title = $request->list_name;
        $listings->save();
        return redirect('/');
    }

    public function destroy($listing_id) {
        Listing::destroy($listing_id);
        return redirect('/');
    }
}
