<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $html=$this->menuRecusive->menuRecusiveAdd();
        return view('admin.menus.create', compact('html'));
    }

    public function store(Request $request)
    {
        $slug=uniqid();
        $this->menu->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        // $menus = new Menu(array(
        //     'name' => $request->get('name'),
        //     'parent_id' => $request->get('parent_id')
        // ));
        // $menus->save();
        return redirect()->route('menus.index');
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $selected = $this->menuRecusive->menuRecusiveEdit($menu->parent_id);
        return view('admin.menus.edit', compact('menu', 'selected'));
    }

    public function update(Request $request, $id)
    {
        $this->menu->find($id)->update([
            'name'=>$request->get('name'),
            'parent_id'=>$request->get('parent_id')
        ]);
        return redirect()->route('menus.index');
    }

    public function destroy($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
