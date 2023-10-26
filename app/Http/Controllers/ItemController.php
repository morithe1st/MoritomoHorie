<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        $items = Item::orderBy('updated_at','desc')->paginate(10);

        return view('item.index',[
            'items' => $items,
        ]);
    }

    /**
     * 商品検索
     */
    public function search(Request $Request)
    {
        $search1 = $Request->input("keyword");
        $search2 = $Request->input("category_id");
        if($Request->has("keyword") && !empty($search2) ) {
            $items = Item::where('name' ,'LIKE','%'.$search1.'%')->where('type' ,'=',$search2)->paginate(10);
            } elseif($Request->has("keyword")) {
            $items = Item::where('name' ,'LIKE','%'.$search1.'%')->paginate(10);
            } elseif(!empty($search2)) {
            $items = Item::where('type' ,'=',$search2)->paginate(10);
            }else {
            //itemsテーブルからデータを取得
            $items = Item::orderBy('id')->paginate(10);
            }
        $category = ["テーブル","デスク","チェア・椅子","ソファ","収納家具","ベッド","照明器具","カーテン","ラグ・マット・カーペット","ファブリック・クッション","インテリア雑貨","その他"];

        return view('item.index',[
            'items' => $items, "category" => $category
        ]);
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        return view('item.add');
    }

    public function store(Request $request)
    {
        // バリデーション
        $rules = [
            'name' => 'required|string|max:100',
            'type' => 'required|',
            'detail' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,jpg|max:50',
        ];

        $request->validate($rules ,
        [
            'name.required' => '商品名は必須です。',
            'name.string' => '使用できない文字が含まれています。',
            'name.max' => '商品名は100文字以内です。',
            'type.required' => '商品種別を選択してください。' ,
            'detail.required' => '商品詳細は必須です。',
            'detail.string' => '使用できない文字が含まれています。',
            'detail.max' => '詳細は500文字以内です。',
            'image.image' => 'imageにはファイルを指定してください。',
            'image.mimes' => 'jpeg／jpg以外のファイルは添付できません。',
            'image.max' => '50KBを超えるファイルは添付できません。',
        ]);

        //新しいレコードを追加する
        $item = new Item;
        $item->name = $request->name;
        $item->user_id = Auth::id();
        $item->type = $request->type;
        $item->detail = $request->detail;

        
        // 画像アップロード
        if ($request->has('image')) {
            $item->image = base64_encode(file_get_contents($request->image));
        }

        $item->save();

        return redirect('/items')->with('message', '商品の登録が完了しました');
    }

    public function edit(Request $request)
    {
        //itemsテーブルからデータを取得
        $item = Item::find($request->id);

        return view('item.edit',[
            'item' => $item,
        ]);
    }

    public function update(Request $request)
    {
        // バリデーション
        $rules = 
        [
            'name' => 'required|string|max:100',
            'type' => 'required|',
            'detail' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,jpg|max:50',
        ];

        $request->validate($rules ,
        [
            'name.required' => '商品名は必須です。',
            'name.string' => '使用できない文字が含まれています。',
            'name.max' => '商品名は100文字以内です。',
            'type.required' => '商品種別を選択してください。' ,
            'detail.required' => '商品詳細は必須です。',
            'detail.string' => '使用できない文字が含まれています。',
            'detail.max' => '詳細は500文字以内です。',
            'image.image' => 'imageにはファイルを指定してください。',
            'image.mimes' => 'jpeg／jpg以外のファイルは添付できません。',
            'image.max' => '50KBを超えるファイルは添付できません。',
        ]);

        //既存のレコードを編集
        $item = Item::where('id', '=' , $request->id)->first();
        $item->name = $request->name;
        $item->user_id = Auth::id();
        $item->type = $request->type;
        $item->detail = $request->detail;

        if ($request->hasFile('image')) 
        {
        // 新しい画像がアップロードされた場合、古いバイナリデータを削除（存在する場合）
        if ($item->image) {
            $item->image = null;
        }

        $image = $request->file('image');
        $imageData = base64_encode(file_get_contents($image->getRealPath()));

        // 新しいバイナリデータを更新
        $item->image = $imageData;
        }

    $item->save();

    return redirect('/items')->with('message', '商品情報の編集が完了しました');

    }

    public function delete(Request $request)
    {
        //既存のレコードを取得して、削除する
        $item = Item::find($request->id);
        $item->delete();

        return redirect('/items')->with('message', '商品が削除されました。');
    }


}
