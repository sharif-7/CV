<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $portfolios = $user->portfolios;
        $categories = Category::all();


        return view('admin.portfolio.index', compact('portfolios', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', // Ensure the selected category exists in the categories table
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and maximum size as needed
        ]);
        $image = $request->file('image'); // Get the uploaded file

        if ($image) {
            $portfolio = new Portfolio([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $this->storeImage($image, 'images', 'portfolio'),
            ]);

            $user->portfolios()->save($portfolio);

            $portfolio->category()->associate(Category::findOrFail($request->input('category_id')));
            $portfolio->save();

            return redirect()->route('portfolio.index')->with('success', 'Portfolio created successfully.');
        }

        return back()->withErrors(['image' => 'Please upload a valid image.'])->withInput();
    }


    private function storeImage($image, $folder, $namePrefix): ?string
    {
        if ($image) {
            $imageName = $namePrefix . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $imageName);
            return '/' . $folder . '/' . $imageName;
        }

        return null;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.show', compact('portfolio'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $categories = Category::all();

        return view('admin.portfolio.edit', compact('portfolio', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $portfolio = Portfolio::where('id', $id)->where('user_id', $user->id)->first();

        if (!$portfolio) {
            return redirect()->route('portfolio.index')->withErrors(['error' => 'Portfolio not found.']);
        }

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', // Ensure the selected category exists in the categories table
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and maximum size as needed
        ]);

        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');

        // Check if a new image is uploaded and update it
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $portfolio->image = $this->storeImage($image, 'images', 'portfolio');
        }

        $portfolio->category()->associate(Category::findOrFail($request->input('category_id')));

        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio deleted successfully.');

    }

}
