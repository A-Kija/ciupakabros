<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Tag;
use App\Models\Order;
use App\Models\ProductTag;
use Barryvdh\DomPDF\Facade\Pdf;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        $products->map(function($p) use ($request) {

            //VOTES
            if (!$request->user()) {
                $showVoteButton = false;
            } else {
                $rates = collect($p->rates);
                $showVoteButton = $rates->first(fn($r) => $r['userId'] == $request->user()->id) ? false : true;
            }
            $p->votes = count($p->rates);
            $p->showVoteButton = $showVoteButton;

            // TAGS
            $tagsId = $p->productTag->pluck('tag_id')->all();
            $tags = Tag::whereIn('id', $tagsId)->get();
            $p->tags = $tags;

        });



        return view('front.index', [
            'products' => $products
        ]);
    }

    public function getTagsList(Request $request)
    {
        $tag = $request->t ?? '';

        if ($tag) {
            $tags = Tag::where('title', 'like', '%'.$tag.'%')
            ->limit(5)
            ->get();
        } else {
            $tags = [];
        }
        

        $html = view('front.tag-search-list')->with(['tags' => $tags])->render();
        
        return response()->json([
            'tags' => $html,
        ]);
    }

    public function addNewTag(Request $request, Product $product)
    {
        $title = $request->tag ?? '';

        if (strlen($title) < 3) {
            return response()->json([
                'message' => 'Invalid tag title',
                'status' => 'error'
            ]);
        }

        $tag = Tag::where('title', $title)->first();

        if (!$tag) {

            $tag = Tag::create([
                'title' => $title
            ]);
        }


        $tagsId = $product->productTag->pluck('tag_id')->all();
        
        if (in_array($tag->id, $tagsId)) {
            return response()->json([
                'message' => 'Tag exists',
                'status' => 'error'
            ]);
        }

        ProductTag::create([
            'tag_id' => $tag->id,
            'product_id' => $product->id
        ]);


        return response()->json([
            'message' => 'Tag added',
            'status' => 'ok',
            'tag' => $tag->title,
            'id' => $tag->id,
        ]);


    }

    public function deleteTag(Request $request, Product $product)
    {
        $tagId = $request->tag ?? 0;

        $tag = Tag::find($tagId);

        if (!$tag) {
            return response()->json([
                'message' => 'Invalid tag id',
                'status' => 'error'
            ]);
        }

        $productTag = ProductTag::where('product_id', $product->id)
        ->where('tag_id', $tag->id)->first();

        $productTag->delete();
        return response()->json([
            'message' => 'Tag removed',
            'status' => 'ok',
            'tag' => $tag->title,
            'id' => $tag->id,
        ]);


    }

    public function addTag(Request $request, Product $product)
    {
        $tagId = $request->tag ?? 0;

        $tag = Tag::find($tagId);

        if (!$tag) {
            return response()->json([
                'message' => 'Invalid tag id',
                'status' => 'error'
            ]);
        }

        $tagsId = $product->productTag->pluck('tag_id')->all();
        
        if (in_array($tagId, $tagsId)) {
            return response()->json([
                'message' => 'Tag exists',
                'status' => 'error'
            ]);
        }

        ProductTag::create([
            'tag_id' => $tagId,
            'product_id' => $product->id
        ]);


        return response()->json([
            'message' => 'Tag added',
            'status' => 'ok',
            'tag' => $tag->title,
            'id' => $tag->id,
        ]);
    }

    public function catColors(Cat $cat)
    {
        $products = $cat->product;

        return view('front.cat-index', [
            'products' => $products,
            'cat' => $cat
        ]);
    }

    public function showProduct(Product $product)
    {
        return view('front.product', [
            'product' => $product,
        ]);
    }

    public function orders(Request $request)
    {
        $orders = $request->user()->order;

        return view('front.orders', [
            'orders' => $orders,
            'status' => Order::STATUS
        ]);
    }

    public function download(Order $order)
    {


        $productNames = array_map(fn($p) => $p['title'], $order->products);

        $products = Product::whereIn('title', $productNames)->get();

        // return view('front.pdf',[
        //         'order' => $order,
        //         'products' => $products,
        // ]);

        $pdf = Pdf::loadView('front.pdf',[
            'order' => $order,
            'products' => $products,
        ]);

        return $pdf->download('order-'.$order->id.'.pdf');
    }

    public function vote(Request $request, Product $product)
    {
        if ($request->user()) {
            $userId = $request->user()->id;
            $rates = collect($product->rates);

            if (!$rates->first(fn($r) => $r['userId'] == $userId) && $request->star) {
                $stars = count($request->star);
                $userRate = [
                    'userId' => $userId,
                    'rate' => $stars
                ];
                $rates->add($userRate);
                $rate = round($rates->sum('rate') / $rates->count(), 2);

                $product->update([
                    'rate' => $rate,
                    'rates' => $rates,
                ]);
            }

            return redirect()->back();
        }
        
    }

}
