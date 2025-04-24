<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Assessment2Controller extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('assessment2.index', compact('categories'));
    }

    public function create()
    {
        $parentOptions = Category::getParentOptions();
        return view('assessment2.create', compact('parentOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:1,2',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($validated);

        return redirect()->route('assessment2.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('assessment2.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $parentOptions = Category::getParentOptions($category->id);
        return view('assessment2.edit', compact('category', 'parentOptions'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:1,2',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Prevent setting a child category as parent
        if ($validated['parent_id'] && $this->isChildCategory($category, $validated['parent_id'])) {
            return back()->withErrors(['parent_id' => 'Cannot set a child category as parent.'])->withInput();
        }

        $category->update($validated);

        return redirect()->route('assessment2.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Move children to parent category
        if ($category->children()->exists()) {
            $category->children()->update(['parent_id' => $category->parent_id]);
        }

        $category->delete();

        return redirect()->route('assessment2.index')->with('success', 'Category deleted successfully.');
    }

    protected function isChildCategory(Category $category, $parentId)
    {
        $parent = Category::find($parentId);
        
        while ($parent) {
            if ($parent->id === $category->id) {
                return true;
            }
            $parent = $parent->parent;
        }
        
        return false;
    }
}