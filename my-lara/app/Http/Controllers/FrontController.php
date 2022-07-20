<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    private $itemsInPage = 5;

    public function index(Request $request)
    {
        $offset = $this->itemsInPage * ($request->page - 1);

        if (isset($request->s)) {

            list($w1, $w2) = explode(' ', $request->s . ' ');
            $allCount = DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->where('animals.name', 'like', '%' . $w1 . '%')
                ->where('colors.title', 'like', '%' . $w2 . '%')
                // ->orWhere(function ($query) use ($w1, $w2) {
                //     $query->where('animals.name', 'like', '%' . $w2 . '%')
                //         ->where('colors.title', 'like', '%' . $w1 . '%');
                // })
                ->orWhere(fn ($query) => $query->where('animals.name', 'like', '%' . $w2 . '%')->where('colors.title', 'like', '%' . $w1 . '%'))
                ->orWhere(fn ($query) => $query->where('animals.name', 'like', '%' . $w2 . '%')->where('animals.name', 'like', '%' . $w1 . '%'))
                ->count();
            $animalsDir = [DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->select('colors.*', 'animals.*')
                ->where('animals.name', 'like', '%' . $w1 . '%')
                ->where('colors.title', 'like', '%' . $w2 . '%')
                ->orWhere(fn ($query) => $query->where('animals.name', 'like', '%' . $w2 . '%')->where('colors.title', 'like', '%' . $w1 . '%'))
                ->orWhere(fn ($query) => $query->where('animals.name', 'like', '%' . $w2 . '%')->where('animals.name', 'like', '%' . $w1 . '%'))
                ->orderBy('animals.id')
                ->offset($offset)
                ->limit($this->itemsInPage)
                ->get(), 'default'];
            $filter = 0;
        } else {

            if (!$request->color_id) {
                $animalsDir = match ($request->sort) {
                    'color-asc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('colors.title')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'color-asc'],
                    'color-desc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('colors.title', 'desc')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'color-desc'],
                    'animals-asc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('animals.name')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'animals-asc'],
                    'animals-desc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('animals.name', 'desc')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'animals-desc'],
                    default => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('*')
                        ->orderBy('animals.id')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get()/*->shuffle()*/, 'default']
                };
                $allCount = match ($request->sort) {
                    'color-asc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->count(),
                    'color-desc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->count(),
                    'animals-asc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->count(),
                    'animals-desc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->count(),
                    default => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('*')
                        ->orderBy('animals.id')
                        ->count()
                };

                $filter = 0;
            } else {
                $allCount = match ($request->sort) {
                    'color-asc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->count(),
                    'color-desc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->count(),
                    'animals-asc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->count(),
                    'animals-desc' => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->count(),
                    default => DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->count()
                };

                $animalsDir = match ($request->sort) {
                    'color-asc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->orderBy('colors.title')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'color-asc'],
                    'color-desc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->orderBy('colors.title', 'desc')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'color-desc'],
                    'animals-asc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->orderBy('animals.name')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'animals-asc'],
                    'animals-desc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->orderBy('animals.name', 'desc')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get(), 'animals-desc'],
                    default => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('*')
                        ->where('animals.color_id', '=', $request->color_id)
                        ->orderBy('animals.id')
                        ->offset($offset)
                        ->limit($this->itemsInPage)
                        ->get()/*->shuffle()*/, 'default']
                };
                $filter = $request->color_id;
            }
        }
        // $parsedUrl = parse_url(url()->full());
        // parse_str($parsedUrl['query'] ?? '', $query);
        $query = $request->query();

        return view('front.index', [
            'animals' => $animalsDir[0],
            'sort' => $animalsDir[1],
            'filter' => $filter,
            's' => $request->s,
            'count' => ceil($allCount / $this->itemsInPage),
            'perPage' => $this->itemsInPage,
            'colors' => Color::all(),
            'page' => $request->page ?? 1,
            'pagesLimit' => 5,
            'query' => $query
        ]);
    }
}
