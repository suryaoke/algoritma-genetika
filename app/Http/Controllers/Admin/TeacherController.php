<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teacher::orderBy('id', 'desc');

        if (!empty($request->searchname)) {
            $teachers = $teachers->where('name', 'LIKE', '%' . $request->searchname . '%');
        }

        if (!empty($request->searchnip)) {
            $teachers = $teachers->where('nip', 'LIKE', '%' . $request->searchnip . '%');
        }

        $teachers = $teachers->paginate(10);

        return view('admin.teacher.index', compact('teachers'));
    }
    public function create(Request $request)
    {
        return view('admin.teacher.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'code_teachers' => 'unique:teachers,code_teachers|required',
            'nipteacher'   => 'required',
            'name'           => 'required',
            'emailteacher'  => 'required',

        ]);

        $params = [
            'code_teachers' => $request->input('code_teachers'),
            'nip'           => $request->input('nipteacher'),
            'name'           => $request->input('name'),
            'email'          => $request->input('emailteacher'),
        ];

        $teachers = Teacher::create($params);

        return redirect()->route('admin.teachers');
    }

    public function edit($id)
    {
        $teachers = Teacher::find($id);

        if ($teachers == null) {
            return view('admin.layouts.404');
        }

        return view('admin.teacher.edit', compact('teachers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code_teachers' => 'unique:teachers,code_teachers,' . $id . '|required',
            'nipteacher'   => 'required',
            'name'           => 'required',
            'emailteacher'  => 'required',

        ]);

        $teachers                 = Teacher::find($id);
        $teachers->code_teachers = $request->input('code_teachers');
        $teachers->nip           = $request->input('nipteacher');
        $teachers->name           = $request->input('name');
        $teachers->email          = $request->input('emailteacher');
        $teachers->save();

        return redirect()->route('admin.teachers');
    }

    public function destroy($id)
    {
        Teacher::find($id)->delete();

        return redirect()->route('admin.teachers')->with('success', 'Dosen berhasil dihapus');
    }
}
