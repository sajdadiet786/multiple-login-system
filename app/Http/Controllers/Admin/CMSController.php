<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CMSPage;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function index()
    {
        $cmsPages = CMSPage::paginate(10);
        return view('admin.cms.index', compact('cmsPages'));
    }

    public function create()
    {
        return view('admin.cms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        CMSPage::create($request->all());
        return redirect()->route('admin.cms.index')->with('success', 'CMS Page created successfully.');
    }

    public function edit(CMSPage $cmsPage)
    {
        return view('admin.cms.edit', compact('cmsPage'));
    }

    public function update(Request $request, CMSPage $cmsPage)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $cmsPage->update($request->all());
        return redirect()->route('admin.cms.index')->with('success', 'CMS Page updated successfully.');
    }

    public function destroy(CMSPage $cmsPage)
    {
        $cmsPage->delete();
        return redirect()->route('admin.cms.index')->with('success', 'CMS Page deleted successfully.');
    }
}
